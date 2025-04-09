<?php

namespace App\Http\Controllers;

use App\Models\ShootingGallery;
use App\Models\ShootingProduct;
use App\Models\ShootingProductColor;
use App\Models\SocialMediaProduct;
use App\Models\SocialMediaProductPlatform;
use App\Models\User;
use App\Models\WebsiteAdminProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ShootingDelivery;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;




class ShootingProductController extends Controller
{
    public function index(Request $request)
    {
        $query = ShootingProduct::query();

        // Filters
        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('type_of_shooting')) {
            $query->where('type_of_shooting', $request->type_of_shooting);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('date_of_shooting_start') && $request->filled('date_of_shooting_end')) {
            $query->whereBetween('date_of_shooting', [
                $request->date_of_shooting_start,
                $request->date_of_shooting_end
            ]);
        }

        if ($request->filled('date_of_delivery_start') && $request->filled('date_of_delivery_end')) {
            $query->whereBetween('date_of_delivery', [
                $request->date_of_delivery_start,
                $request->date_of_delivery_end
            ]);
        }

        if ($request->filled('date_of_editing_start') && $request->filled('date_of_editing_end')) {
            $query->whereBetween('date_of_editing', [
                $request->date_of_editing_start,
                $request->date_of_editing_end
            ]);
        }

        $user = auth()->user();

        if ($user->role->name !== 'admin') {
            $userId = (string) $user->id;

            $query->where(function ($q) use ($user, $userId) {
                if ($user->role->name == 'photographer') {
                    $q->whereJsonContains('photographer', $userId);
                }

                if ($user->role->name == 'editor') {
                    $q->orWhereJsonContains('editor', $userId);
                }
            });
        }


        $shooting_products = $query->orderBy('created_at', 'desc')->get();

        $photographers = User::whereHas('role', function ($q) {
            $q->where('name', 'photographer');
        })->get();

        $editors = User::whereHas('role', function ($q) {
            $q->where('name', 'editor');
        })->get();

        return view('shooting_products.index', compact('shooting_products', 'photographers', 'editors'));
    }


    public function startShooting(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:shooting_products,id',
                'type_of_shooting' => 'required|string',
                'location' => 'nullable|string',
                'date_of_shooting' => 'nullable|date',
                'photographer' => 'nullable|array',
                'photographer.*' => 'exists:users,id',
                'date_of_editing' => 'nullable|date',
                'editor' => 'nullable|array',
                'editor.*' => 'exists:users,id',
                'date_of_delivery' => 'required|date',
            ]);

            $product = ShootingProduct::findOrFail($request->product_id);
            $product->type_of_shooting = $request->type_of_shooting;
            $product->status = 'in_progress';

            if (in_array($request->type_of_shooting, ['تصوير منتج', 'تصوير موديل'])) {
                $product->location = $request->location;
                $product->date_of_shooting = $request->date_of_shooting;
                $product->photographer = json_encode($request->photographer);
                // Reset editor fields
                $product->editor = null;
                $product->date_of_editing = null;
            } else {
                $product->date_of_editing = $request->date_of_editing;
                $product->editor = json_encode($request->editor);
                // Reset photographer fields
                $product->photographer = null;
                $product->location = null;
                $product->date_of_shooting = null;
            }

            $product->date_of_delivery = $request->date_of_delivery;
            $product->save();

            return response()->json(['success' => true, 'message' => 'تم بدء التصوير بنجاح']);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    public function updateDriveLink(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'product_id' => 'required|exists:shooting_products,id',
                'drive_link' => 'required|url',
            ]);

            $product = ShootingProduct::findOrFail($request->product_id);
            $product->drive_link = $request->drive_link;
            $product->status = 'completed';
            $product->save();

            WebsiteAdminProduct::updateOrCreate(
                ['shooting_product_id' => $product->id],
                [
                    'name' => $product->name,
                    'status' => 'new'
                ]
            );

            DB::commit();

            return response()->json(['success' => true, 'message' => 'تم تحديث لينك درايف وإضافة المنتج لمسؤول الموقع']);
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return response()->json(['success' => false, 'message' => 'حدث خطأ أثناء الحفظ'], 500);
        }
    }




    public function create()
    {
        return view('shooting_products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number_of_colors' => 'nullable|integer',
            'price' => 'required|numeric|min:0',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'number_of_colors', 'price']);
        $data['status'] = 'new';

        if ($request->hasFile('main_image')) {
            $imageName = time() . '_main.' . $request->main_image->extension();
            $request->main_image->move(public_path('images/shooting'), $imageName);
            $data['main_image'] = $imageName;
        }

        $product = ShootingProduct::create($data);

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $imgName = uniqid() . '.' . $image->extension();
                $image->move(public_path('images/shooting'), $imgName);

                $product->gallery()->create([
                    'image' => $imgName,
                ]);
            }
        }

        return redirect()->route('shooting-products.index')->with('success', 'تم إضافة المنتج بنجاح');
    }


    public function show($id)
    {
        $product = ShootingProduct::findOrFail($id);
        return view('shooting_products.show', compact('product'));
    }

    public function completePage($id)
    {
        $product = ShootingProduct::with('gallery')->findOrFail($id); // eager loading gallery
        $colors = ShootingProductColor::where('shooting_product_id', $product->id)->get();

        return view('shooting_products.complete', compact('product', 'colors'));
    }

    public function saveCompleteData(Request $request, $id)
    {
        $product = ShootingProduct::findOrFail($id);
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        foreach ($request->colors as $color) {
            $data = [
                'shooting_product_id' => $product->id,
                'name' => $color['name'] ?? null,
                'code' => $color['code'] ?? null,
            ];

            // Handle image upload
            if (isset($color['image']) && $color['image']) {
                $imageName = time() . '_' . uniqid() . '.' . $color['image']->getClientOriginalExtension();
                $color['image']->move(public_path('images/shooting'), $imageName);
                $data['image'] = 'images/shooting/' . $imageName;
            }

            ShootingProductColor::updateOrCreate(
                ['id' => $color['id'] ?? null],
                $data
            );
        }

        return redirect()->route('shooting-products.complete.page', $id)->with('success', 'تم حفظ بيانات المنتج بنجاح');
    }



    public function edit($id)
    {
        $product = ShootingProduct::with('gallery')->findOrFail($id);
        return view('shooting_products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {

        try {
            $product = ShootingProduct::findOrFail($id);

            $request->validate([
                'name' => 'required|string|max:255',
                'number_of_colors' => 'nullable|integer',
                'price' => 'required|numeric|min:0',
                'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $data = $request->only(['name', 'number_of_colors', 'price']);

            if ($request->hasFile('main_image')) {
                $imageName = time() . '_main.' . $request->main_image->extension();
                $request->main_image->move(public_path('images/shooting'), $imageName);
                $data['main_image'] = $imageName;
            }

            $product->update($data);

            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $image) {
                    $imgName = uniqid() . '.' . $image->extension();
                    $image->move(public_path('images/shooting'), $imgName);

                    $product->gallery()->create([
                        'image' => $imgName,
                    ]);
                }
            }

            return redirect()->route('shooting-products.index')->with('success', 'تم تحديث المنتج بنجاح');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    public function destroy($id)
    {
        $product = ShootingProduct::findOrFail($id);
        $product->delete();

        return redirect()->route('shooting-products.index')->with('success', 'تم حذف المنتج بنجاح');
    }

    public function deleteGallery(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:shooting_galleries,id',
        ]);

        $gallery = ShootingGallery::findOrFail($request->id);
        $path = public_path('images/shooting/' . $gallery->image);

        if (file_exists($path)) {
            unlink($path);
        }

        $gallery->delete();

        return response()->json(['success' => true]);
    }


    public function indexWebsite()
    {
        $products = WebsiteAdminProduct::orderBy('created_at', 'desc')->get();
        return view('shooting_products.website', compact('products'));
    }

    public function updateWebsiteStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:website_admin_products,id',
            'note' => 'nullable|string',
            'published_at' => 'required|date',
        ]);

        $product = WebsiteAdminProduct::findOrFail($request->id);
        $product->status = 'done';
        $product->note = $request->note;
        $product->published_at = $request->published_at;
        $product->save();

        return redirect()->route('website-admin.index')->with('success', 'تم نشر المنتج بنجاح');
    }


    public function reopenWebsiteProduct(Request $request)
    {
        $product = WebsiteAdminProduct::findOrFail($request->id);
        $product->status = 'new';
        $product->note = null;
        $product->save();

        return redirect()->route('website-admin.index')->with('success', 'تمت إعادة فتح المنتج بنجاح');
    }

    public function indexSocial()
    {
        // Sync all 'done' products from website_admin_products
        $doneProducts = WebsiteAdminProduct::where('status', 'done')->get();

        foreach ($doneProducts as $item) {
            SocialMediaProduct::firstOrCreate(
                ['website_admin_product_id' => $item->id],
                ['status' => 'new']
            );
        }

        $products = SocialMediaProduct::with('websiteAdminProduct')->latest()->get();
        $platforms = SocialMediaProductPlatform::all()->groupBy('social_media_product_id');

        return view('shooting_products.social', compact('products', 'platforms'));
    }


    public function publishSocial(Request $request)
    {
        try {
            $selectedPlatforms = collect($request->platforms)->filter(fn($p) => isset($p['active']));

            if ($selectedPlatforms->isEmpty()) {
                return redirect()->back()->withErrors(['platforms' => 'يجب اختيار منصة واحدة على الأقل'])->withInput();
            }

            $request->merge(['platforms' => $selectedPlatforms->toArray()]);

            $request->validate([
                'id' => 'required|exists:social_media_products,id',
                'platforms' => 'required|array|min:1',
                'platforms.*.publish_date' => 'required|date',
                'platforms.*.type' => 'required|string',
            ]);

            DB::transaction(function () use ($request) {
                $product = SocialMediaProduct::findOrFail($request->id);

                $product->platforms()->delete();

                foreach ($request->platforms as $platformName => $platformData) {
                    SocialMediaProductPlatform::create([
                        'social_media_product_id' => $product->id,
                        'platform' => $platformName,
                        'publish_date' => $platformData['publish_date'],
                        'type' => $platformData['type'],
                    ]);
                }

                $product->status = 'done';
                $product->save();
            });

            return redirect()->route('social-media.index')->with('success', 'تم جدولة النشر بنجاح');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function reopenSocial(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:social_media_products,id',
        ]);

        $product = SocialMediaProduct::findOrFail($request->id);
        $product->status = 'new';
        $product->platforms()->delete(); // remove old publishing schedule
        $product->save();

        return redirect()->route('social-media.index')->with('success', 'تم إعادة فتح المنتج للنشر.');
    }

    public function calendar()
    {
        $platforms = SocialMediaProductPlatform::with('socialMediaProduct.websiteAdminProduct')->get();

        $events = $platforms->map(function ($item) {
            return [
                'title' => $item->socialMediaProduct->websiteAdminProduct->name,
                'start' => \Carbon\Carbon::parse($item->publish_date)->toDateString(), // ✅ يوم فقط بدون وقت
            ];
        });

        return view('shooting_products.calendar', ['events' => $events]);
    }


    public function deliveryIndex()
    {
        $deliveries = ShootingDelivery::latest()->get();
        return view('shooting_products.deliveries.index', compact('deliveries'));
    }

    public function deliveryUploadForm()
    {
        return view('shooting_products.deliveries.upload');
    }

    public function deliveryUpload(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|file|mimes:xlsx,xls',
            ]);
    
            // حفظ الملف في public/excel
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('excel'), $filename);
    
            // قراءة الملف
            $filePath = public_path('excel/' . $filename);
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
            $rows = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
    
            DB::transaction(function () use ($rows, $filename) {
                // سجل في جدول التسليمات
                ShootingDelivery::create([
                    'filename' => $filename,
                ]);
    
                $grouped = [];
    
                foreach ($rows as $index => $row) {
                    if ($index === 1) continue; // أول سطر عبارة عن العناوين
    
                    $itemNo = $row['A'];
                    $description = $row['B'];
                    $quantity = $row['C'];
    
                    if (!$itemNo || !$description) continue;
    
                    $primaryId = substr($itemNo, 3, 6); // استخلاص ID من الرقم
    
                    $grouped[$primaryId][] = [
                        'item_no' => $itemNo,
                        'description' => $description,
                        'quantity' => $quantity,
                    ];
                }
    
                foreach ($grouped as $primaryId => $items) {
                    // إدخال المنتج الأساسي
                    $product = ShootingProduct::create([
                        'id' => $primaryId,
                        'name' => $items[0]['description'],
                        'number_of_colors' => count($items),
                        'quantity' => $items[0]['quantity'],
                        'status' => 'new',
                    ]);
    
                    // إدخال كل لون
                    foreach ($items as $color) {
                        ShootingProductColor::create([
                            'shooting_product_id' => $product->id,
                            'code' => $color['item_no'],
                            'name' => $color['description'],
                        ]);
                    }
                }
            });
    
            return redirect()->back()->with('success', '✅ تم رفع الشيت ومعالجة البيانات بنجاح');
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '❌ حصل خطأ أثناء رفع الشيت: ' . $e->getMessage());
        }
    }
    




}
