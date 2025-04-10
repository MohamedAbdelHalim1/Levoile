<?php

namespace App\Http\Controllers;

use App\Models\ShootingDelivery;
use App\Models\ShootingDeliveryContent;
use App\Models\ShootingGallery;
use App\Models\ShootingProduct;
use App\Models\ShootingProductColor;
use App\Models\SocialMediaProduct;
use App\Models\SocialMediaProductPlatform;
use App\Models\User;
use App\Models\WebsiteAdminProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;




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


    public function multiStartPage(Request $request)
    {
        $ids = explode(',', $request->selected_products);
        $products = ShootingProduct::whereIn('id', $ids)->get();

        $photographers = User::whereHas('role', function ($q) {
            $q->where('name', 'photographer');
        })->get();

        $editors = User::whereHas('role', function ($q) {
            $q->where('name', 'editor');
        })->get();

        return view('shooting_products.multi_start', compact('products', 'photographers', 'editors'));
    }

    public function multiStartSave(Request $request)
    {
        $selectedColorIds = $request->selected_colors;
    
        if (empty($selectedColorIds)) {
            return redirect()->back()->with('error', 'يجب اختيار لون واحد على الأقل');
        }
    
        DB::transaction(function () use ($selectedColorIds, $request) {
    
            // Update كل Color بالقيم الجديدة
            foreach ($selectedColorIds as $colorId) {
                $color = ShootingProductColor::findOrFail($colorId);
    
                $dataToUpdate = [
                    'status' => 'in_progress',
                    'type_of_shooting' => $request->type_of_shooting,
                    'date_of_delivery' => $request->date_of_delivery,
                ];
    
                if (in_array($request->type_of_shooting, ['تصوير منتج', 'تصوير موديل'])) {
                    $dataToUpdate['location'] = $request->location;
                    $dataToUpdate['date_of_shooting'] = $request->date_of_shooting;
                    $dataToUpdate['photographer'] = json_encode($request->photographer);
                    $dataToUpdate['editor'] = null;
                    $dataToUpdate['date_of_editing'] = null;
                } else {
                    $dataToUpdate['date_of_editing'] = $request->date_of_editing;
                    $dataToUpdate['editor'] = json_encode($request->editor);
                    $dataToUpdate['photographer'] = null;
                    $dataToUpdate['location'] = null;
                    $dataToUpdate['date_of_shooting'] = null;
                }
    
                $color->update($dataToUpdate);
            }
    
            // جيب ال Products الخاصة بالألوان المختارة
            $productIds = ShootingProductColor::whereIn('id', $selectedColorIds)
                ->pluck('shooting_product_id')
                ->unique()
                ->toArray();
    
            foreach ($productIds as $productId) {
                $product = ShootingProduct::findOrFail($productId);
    
                $totalColors = $product->shootingProductColors()->count();
                $inProgressColors = $product->shootingProductColors()->where('status', 'in_progress')->count();
    
                if ($totalColors == $inProgressColors) {
                    $product->status = 'in_progress';
                } else {
                    $product->status = 'partial';
                }
    
                $product->type_of_shooting = $request->type_of_shooting;
                $product->date_of_delivery = $request->date_of_delivery;
    
                if (in_array($request->type_of_shooting, ['تصوير منتج', 'تصوير موديل'])) {
                    $product->location = $request->location;
                    $product->date_of_shooting = $request->date_of_shooting;
                    $product->photographer = json_encode($request->photographer);
                    $product->editor = null;
                    $product->date_of_editing = null;
                } else {
                    $product->date_of_editing = $request->date_of_editing;
                    $product->editor = json_encode($request->editor);
                    $product->photographer = null;
                    $product->location = null;
                    $product->date_of_shooting = null;
                }
    
                $product->save();
            }
        });
    
        return redirect()->route('shooting-products.index')->with('success', 'تم بدء التصوير بنجاح');
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

            $product->shootingProductColors()->update(['status' => 'completed']);
            

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
            'quantity' => 'required|integer|min:1',
            'custom_id' => 'nullable|integer',
        ]);

        $data = $request->only(['name', 'number_of_colors', 'price', 'quantity', 'custom_id']);
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
            'description' => $request->input('description'),
            'price' => $request->input('price'),
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
                'quantity' => 'required|integer|min:1',
                'custom_id' => 'nullable|integer',
            ]);

            $data = $request->only(['name', 'number_of_colors', 'price', 'quantity', 'custom_id']);

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

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('excel'), $filename);

            $filePath = public_path('excel/' . $filename);
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
            $rows = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            $totalRecords = count($rows) - 1; // عشان اول صف titles

            $delivery = ShootingDelivery::create([
                'filename' => $filename,
                'user_id' => auth()->id(),
                'status' => 'تم الارسال',
                'total_records' => $totalRecords,
                'sent_records' => 0,
            ]);

            foreach (array_slice($rows, 1) as $row) {
                ShootingDeliveryContent::create([
                    'shooting_delivery_id' => $delivery->id,
                    'item_no' => $row['A'],
                    'description' => $row['B'],
                    'quantity' => $row['C'],
                    'unit' => $row['D'],
                    'primary_id' => substr($row['A'], 3, 6),
                    'is_received' => 0,
                ]);
            }

            return redirect()->route('shooting-deliveries.index')->with('success', 'تم رفع الشيت بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حصل خطأ أثناء رفع الشيت: ' . $e->getMessage());
        }
    }


    public function showDelivery($id)
    {
        $delivery = ShootingDelivery::findOrFail($id);
        $contents = ShootingDeliveryContent::where('shooting_delivery_id', $id)->get();
        return view('shooting_products.deliveries.show', compact('delivery', 'contents'));
    }

    public function sendPage($id)
    {
        $delivery = ShootingDelivery::findOrFail($id);
        $filePath = public_path('excel/' . $delivery->filename);
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $rows = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        return view('shooting_products.deliveries.send', compact('rows', 'delivery'));
    }

    public function sendSave(Request $request, $id)
    {
        try {
            $selectedIndexes = $request->input('selected_rows', []);

            if (empty($selectedIndexes)) {
                return redirect()->back()->with('error', 'يجب اختيار منتج واحد على الأقل قبل الارسال');
            }

            DB::transaction(function () use ($selectedIndexes, $request, $id) {
                $delivery = ShootingDelivery::findOrFail($id);
                $rows = $request->input('rows', []);
                $grouped = [];

                foreach ($selectedIndexes as $index) {
                    $row = $rows[$index];
                    $itemNo = $row['item_no'];
                    $description = $row['description'];
                    $quantity = $row['quantity'];
                    $primaryId = substr($itemNo, 3, 6);

                    $grouped[$primaryId][] = [
                        'item_no' => $itemNo,
                        'description' => $description,
                        'quantity' => $quantity,
                    ];
                }

                foreach ($grouped as $primaryId => $items) {
                    $product = ShootingProduct::create([
                        'custom_id' => $primaryId,
                        'name' => $items[0]['description'],
                        'number_of_colors' => count($items),
                        'quantity' => $items[0]['quantity'],
                        'status' => 'new',
                    ]);

                    foreach ($items as $color) {
                        ShootingProductColor::create([
                            'shooting_product_id' => $product->id,
                            'code' => $color['item_no'],
                        ]);

                        // update delivery content
                        ShootingDeliveryContent::where('shooting_delivery_id', $delivery->id)
                            ->where('item_no', $color['item_no'])
                            ->update(['is_received' => 1]);
                    }
                }

                $delivery->update([
                    'sent_by' => auth()->id(),
                    'status' => 'تم الاستلام',
                    'sent_records' => count($selectedIndexes),
                ]);
            });

            return redirect()->route('shooting-deliveries.index')->with('success', 'تم الارسال للتصوير بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حصل خطأ أثناء الارسال: ' . $e->getMessage());
        }
    }
}
