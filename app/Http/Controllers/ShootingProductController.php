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
use App\Models\ShootingSession;
use Carbon\Carbon;
use Illuminate\Support\Str;






class ShootingProductController extends Controller
{
    public function index(Request $request)
    {
        $query = ShootingProduct::with([
            'shootingProductColors.sessions',  // eager load
            'shootingProductColors',
        ]);
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
            $finalColorIds = [];

            foreach ($selectedColorIds as $colorId) {
                $color = ShootingProductColor::findOrFail($colorId);

                // Check if it's a clean (first time) record
                $isFirstTime = is_null($color->type_of_shooting) &&
                    is_null($color->date_of_delivery) &&
                    is_null($color->shooting_method) &&
                    is_null($color->location) &&
                    is_null($color->date_of_shooting) &&
                    is_null($color->photographer) &&
                    is_null($color->editor) &&
                    is_null($color->date_of_editing);

                if ($isFirstTime) {
                    // Just update the current one
                    $color->status            = 'in_progress';
                    $color->type_of_shooting  = $request->type_of_shooting;
                    $color->date_of_delivery  = $request->date_of_delivery;
                    $color->shooting_method   = $request->shooting_method;

                    if (in_array($request->type_of_shooting, ['تصوير منتج', 'تصوير موديل'])) {
                        $color->location         = $request->location;
                        $color->date_of_shooting = $request->date_of_shooting;
                        $color->photographer     = json_encode($request->photographer);
                        $color->editor           = null;
                        $color->date_of_editing  = null;
                    } else {
                        $color->date_of_editing  = $request->date_of_editing;
                        $color->editor           = json_encode($request->editor);
                        $color->photographer     = null;
                        $color->location         = null;
                        $color->date_of_shooting = null;
                    }

                    $color->save();
                    $finalColorIds[] = $color->id;
                } else {
                    // Clone and create new record
                    $newColor = $color->replicate();
                    $newColor->status           = 'in_progress';
                    $newColor->type_of_shooting = $request->type_of_shooting;
                    $newColor->date_of_delivery = $request->date_of_delivery;
                    $newColor->shooting_method  = $request->shooting_method;

                    if (in_array($request->type_of_shooting, ['تصوير منتج', 'تصوير موديل'])) {
                        $newColor->location         = $request->location;
                        $newColor->date_of_shooting = $request->date_of_shooting;
                        $newColor->photographer     = json_encode($request->photographer);
                        $newColor->editor           = null;
                        $newColor->date_of_editing  = null;
                    } else {
                        $newColor->date_of_editing  = $request->date_of_editing;
                        $newColor->editor           = json_encode($request->editor);
                        $newColor->photographer     = null;
                        $newColor->location         = null;
                        $newColor->date_of_shooting = null;
                    }

                    $newColor->save();
                    $finalColorIds[] = $newColor->id;
                }
            }

            // Update products status
            $productIds = ShootingProductColor::whereIn('id', $finalColorIds)
                ->pluck('shooting_product_id')
                ->unique()
                ->toArray();

            foreach ($productIds as $productId) {
                $product = ShootingProduct::findOrFail($productId);

                $colors = $product->shootingProductColors;
                $total = $colors->count();
                $completed = $colors->where('status', 'completed')->count();
                $new = $colors->where('status', 'new')->count();

                if ($completed === $total) {
                    $product->status = 'completed';
                } elseif ($new === $total) {
                    $product->status = 'new';
                } else {
                    $product->status = 'partial';
                }


                $product->type_of_shooting = $request->type_of_shooting;
                $product->date_of_delivery = $request->date_of_delivery;
                $product->shooting_method  = $request->shooting_method;

                if (in_array($request->type_of_shooting, ['تصوير منتج', 'تصوير موديل'])) {
                    $product->location         = $request->location;
                    $product->date_of_shooting = $request->date_of_shooting;
                    $product->photographer     = json_encode($request->photographer);
                    $product->editor           = null;
                    $product->date_of_editing  = null;
                } else {
                    $product->date_of_editing  = $request->date_of_editing;
                    $product->editor           = json_encode($request->editor);
                    $product->photographer     = null;
                    $product->location         = null;
                    $product->date_of_shooting = null;
                }

                $product->save();
            }

            // Generate new reference
            $today = Carbon::now()->format('Y-m-d');

            $lastReference = ShootingSession::where('reference', 'LIKE', $today . '%')
                ->orderBy('reference', 'desc')
                ->first();

            $newNumber = $lastReference
                ? str_pad(((int) substr($lastReference->reference, -3)) + 1, 3, '0', STR_PAD_LEFT)
                : '001';

            $reference = $today . '-' . $newNumber;

            foreach ($finalColorIds as $colorId) {
                ShootingSession::create([
                    'reference' => $reference,
                    'shooting_product_color_id' => $colorId,
                ]);
            }
        });

        return redirect()->route('shooting-sessions.index')->with('success', 'تم بدء التصوير بنجاح');
    }



    public function updateDriveLink(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'reference' => 'required|string',
                'drive_link' => 'required|url',
            ]);

            // جيب كل السيشنات اللي ليها نفس الreference
            $sessions = \App\Models\ShootingSession::where('reference', $request->reference)->get();

            // تحديث كل السيشنات بنفس اللينك والحالة
            foreach ($sessions as $session) {
                $session->drive_link = $request->drive_link;
                $session->status = 'completed';
                $session->save();
                // ✅ تحديث حالة اللون المرتبط بالسيشن
                $session->color->status = 'completed';
                $session->color->save();
            }

            // ✅ جيب كل المنتجات المرتبطة بالسيشنات
            $productIds = $sessions->pluck('color.shootingProduct.id')->unique();

            foreach ($productIds as $productId) {
                $product = \App\Models\ShootingProduct::find($productId);

                if (!$product) continue;

                // ✅ تعديل منطقي يعتمد على حالة الألوان نفسها مش السيشنات
                $colorStatuses = $product->shootingProductColors->pluck('status');

                if ($colorStatuses->every(fn($s) => $s === 'completed')) {
                    $product->status = 'completed';
                } elseif ($colorStatuses->contains('completed')) {
                    $product->status = 'partial';
                } else {
                    $product->status = 'new';
                }

                $product->save();
            }


            DB::commit();

            return response()->json(['success' => true, 'message' => 'تم تحديث لينك درايف بنجاح']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'حدث خطأ أثناء الحفظ: ' . $e->getMessage()], 500);
        }
    }



    public function manual()
    {
        $photographers = \App\Models\User::where('role_id', 7)->get(); // مثال
        $editors = \App\Models\User::where('role_id', 8)->get(); // مثال

        return view('shooting_products.manual', compact('photographers', 'editors'));
    }

    public function findColorByCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string'
        ]);

        $color = ShootingProductColor::with('shootingProduct')->where('code', $request->code)->first();

        if (!$color) {
            return response()->json(['found' => false]);
        }

        return response()->json([
            'found' => true,
            'id' => $color->id,
            'code' => $color->code,
            'product' => $color->shootingProduct->name
        ]);
    }

    public function manualSave(Request $request)
    {
        $selectedColorIds = $request->selected_colors;

        if (!$request->has('selected_colors') || empty($request->selected_colors)) {
            return redirect()->back()->with('error', 'يرجى إدخال كود لون واحد على الأقل');
        }


        DB::transaction(function () use ($selectedColorIds, $request) {
            $finalColorIds = [];

            foreach ($selectedColorIds as $colorId) {
                $color = ShootingProductColor::findOrFail($colorId);

                $isFirstTime = is_null($color->type_of_shooting) && is_null($color->date_of_delivery);

                if ($isFirstTime) {
                    $color->status = 'in_progress';
                    $color->type_of_shooting = $request->type_of_shooting;
                    $color->date_of_delivery = $request->date_of_delivery;
                    $color->shooting_method = $request->shooting_method;

                    if (in_array($request->type_of_shooting, ['تصوير منتج', 'تصوير موديل'])) {
                        $color->location = $request->location;
                        $color->date_of_shooting = $request->date_of_shooting;
                        $color->photographer = json_encode($request->photographer);
                    } else {
                        $color->date_of_editing = $request->date_of_editing;
                        $color->editor = json_encode($request->editor);
                    }

                    $color->save();
                    $finalColorIds[] = $color->id;
                } else {
                    $newColor = $color->replicate();
                    $newColor->status = 'in_progress';
                    $newColor->type_of_shooting = $request->type_of_shooting;
                    $newColor->date_of_delivery = $request->date_of_delivery;
                    $newColor->shooting_method = $request->shooting_method;

                    if (in_array($request->type_of_shooting, ['تصوير منتج', 'تصوير موديل'])) {
                        $newColor->location = $request->location;
                        $newColor->date_of_shooting = $request->date_of_shooting;
                        $newColor->photographer = json_encode($request->photographer);
                    } else {
                        $newColor->date_of_editing = $request->date_of_editing;
                        $newColor->editor = json_encode($request->editor);
                    }

                    $newColor->save();
                    $finalColorIds[] = $newColor->id;
                }
            }

            // حفظ السيشن
            $today = Carbon::now()->format('Y-m-d');
            $lastRef = ShootingSession::where('reference', 'LIKE', "$today%")->orderBy('reference', 'desc')->first();
            $newNumber = $lastRef ? str_pad(((int) substr($lastRef->reference, -3)) + 1, 3, '0', STR_PAD_LEFT) : '001';
            $reference = "$today-$newNumber";

            foreach ($finalColorIds as $colorId) {
                ShootingSession::create([
                    'reference' => $reference,
                    'shooting_product_color_id' => $colorId
                ]);
            }
            // ✅ تحديث حالة المنتجات بناءً على حالة الألوان
            $productIds = ShootingProductColor::whereIn('id', $finalColorIds)
                ->pluck('shooting_product_id')
                ->unique();

            foreach ($productIds as $productId) {
                $product = ShootingProduct::find($productId);
                if ($product) {
                    $product->refreshStatusBasedOnColors();
                }
            }
        });

        return redirect()->route('shooting-sessions.index')->with('success', 'تم بدء التصوير اليدوي بنجاح');
    }

    public function show($id)
    {
        $product = ShootingProduct::with(['shootingProductColors.sessions'])->findOrFail($id);
        return view('shooting_products.show', compact('product'));
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


    public function completePage($id)
    {
        $product = ShootingProduct::with('gallery')->findOrFail($id);
    
        $colors = ShootingProductColor::where('shooting_product_id', $product->id)->get();
    
        // هنا بنجمع الألوان حسب color_code
        $groupedColors = $colors->groupBy('color_code');
    
        return view('shooting_products.complete', compact('product', 'colors', 'groupedColors'));
    }
    

    public function saveCompleteData(Request $request, $id)
    {
        $product = ShootingProduct::findOrFail($id);
    
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);
    
        if ($request->hasFile('main_image')) {
            $imageName = time() . '_main.' . $request->main_image->extension();
            $request->main_image->move(public_path('images/shooting'), $imageName);
            $product->main_image = $imageName;
            $product->save();
        }
    
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $imgName = uniqid() . '.' . $image->extension();
                $image->move(public_path('images/shooting'), $imgName);
                $product->gallery()->create(['image' => $imgName]);
            }
        }
    
        $originalProductId = $id;

        foreach ($request->colors as $key => $colorData) {
            $colorCode = $colorData['color_code'];
            $ids = explode(',', $colorData['ids'] ?? '');
            foreach ($ids as $id) {
                $color = ShootingProductColor::find($id);
                if ($color) {
                    $color->update([
                        'name' => $colorData['name'] ?? null,
                        'color_code' => $colorCode,
                        'size_name' => $colorData['sizes'][$id] ?? null,
                    ]);
        
                    $imageField = "colors.{$key}.image";
                    if ($request->hasFile($imageField)) {
                        $img = $request->file($imageField);
                        if ($img && $img->isValid()) {
                            $imgName = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
                            $img->move(public_path('images/shooting'), $imgName);
                            $color->update(['image' => 'images/shooting/' . $imgName]);
                        }
                    }
                }
            }
        }
        
    
        return redirect()->route('shooting-products.complete.page', $originalProductId)->with('success', 'تم حفظ بيانات المنتج بنجاح');
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
            $product->refreshStatusBasedOnColors();

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

    public function markReviewed(Request $request)
    {
        $request->validate(['id' => 'required|exists:shooting_products,id']);

        $product = ShootingProduct::findOrFail($request->id);
        $product->is_reviewed = 1;
        $product->save();

        // ✅ أضفه لموقع الادمن
        WebsiteAdminProduct::updateOrCreate(
            ['shooting_product_id' => $product->id],
            ['name' => $product->name, 'status' => 'new']
        );

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


    // public function deliveryIndex()
    // {
    //     $deliveries = ShootingDelivery::latest()->get();
    //     return view('shooting_products.deliveries.index', compact('deliveries'));
    // }

    public function deliveryIndex()
    {
        $deliveries = ShootingDelivery::latest()->get();
        return view('shooting_products.deliveries.index', compact('deliveries'));
    }


    public function deliveryUploadForm()
    {
        return view('shooting_products.deliveries.upload');
    }

    // public function deliveryUpload(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'file' => 'required|file|mimes:xlsx,xls',
    //         ]);

    //         $file = $request->file('file');
    //         $filename = time() . '_' . $file->getClientOriginalName();
    //         $file->move(public_path('excel'), $filename);

    //         $filePath = public_path('excel/' . $filename);
    //         $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
    //         $rows = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    //         $totalRecords = count($rows) - 1; // عشان اول صف titles

    //         $delivery = ShootingDelivery::create([
    //             'filename' => $filename,
    //             'user_id' => auth()->id(),
    //             'status' => 'تم الارسال',
    //             'total_records' => $totalRecords,
    //             'sent_records' => 0,
    //         ]);

    //         foreach (array_slice($rows, 1) as $row) {
    //             ShootingDeliveryContent::create([
    //                 'shooting_delivery_id' => $delivery->id,
    //                 'item_no' => $row['A'],
    //                 'description' => $row['B'],
    //                 'quantity' => $row['C'],
    //                 'unit' => $row['D'],
    //                 'primary_id' => substr($row['A'], 3, 6),
    //                 'is_received' => 0,
    //             ]);
    //         }

    //         return redirect()->route('shooting-deliveries.index')->with('success', 'تم رفع الشيت بنجاح');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'حصل خطأ أثناء رفع الشيت: ' . $e->getMessage());
    //     }
    // }

    // public function deliveryUpload(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'file' => 'required|file|mimes:xlsx,xls',
    //         ]);

    //         $file = $request->file('file');
    //         $filename = time() . '_' . $file->getClientOriginalName();
    //         $file->move(public_path('excel'), $filename);

    //         $filePath = public_path('excel/' . $filename);
    //         $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
    //         $rows = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    //         $totalRecords = count($rows) - 1;

    //         $delivery = ShootingDelivery::create([
    //             'filename' => $filename,
    //             'user_id' => auth()->id(),
    //             'status' => 'تم ألرفع',
    //             'total_records' => $totalRecords,
    //             'sent_records' => 0,
    //         ]);

    //         $existingItemNos = ShootingDeliveryContent::select('item_no')->distinct()->pluck('item_no')->flip();

    //         foreach (array_slice($rows, 1) as $row) {
    //             $itemNo = $row['A'];
    //             $status = isset($existingItemNos[$itemNo]) ? 'old' : 'new';

    //             ShootingDeliveryContent::create([
    //                 'shooting_delivery_id' => $delivery->id,
    //                 'item_no' => $itemNo,
    //                 'description' => $row['B'],
    //                 'quantity' => $row['C'],
    //                 'unit' => $row['D'],
    //                 'primary_id' => substr($itemNo, 3, 6),
    //                 'is_received' => 0,
    //                 'status' => $status,
    //             ]);
    //         }

    //         return redirect()->route('shooting-deliveries.index')->with('success', 'تم رفع الشيت بنجاح');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'حصل خطأ أثناء رفع الشيت: ' . $e->getMessage());
    //     }
    // }
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

        $totalRecords = count($rows) - 1;

        // إنشاء سجل الشحن بدون new/old records مؤقتًا
        $delivery = ShootingDelivery::create([
            'filename' => $filename,
            'user_id' => auth()->id(),
            'status' => 'تم ألرفع',
            'total_records' => $totalRecords,
            'sent_records' => 0,
        ]);

        // الحصول على كل الـ item_no اللي موجودة من قبل في جدول المحتوى
        $existingItemNos = ShootingDeliveryContent::select('item_no')->distinct()->pluck('item_no')->flip();

        $newCount = 0;
        $oldCount = 0;

        foreach (array_slice($rows, 1) as $row) {
            $itemNo = $row['A'];
            $status = isset($existingItemNos[$itemNo]) ? 'old' : 'new';

            // زيادة العدادات
            if ($status === 'new') {
                $newCount++;
            } else {
                $oldCount++;
            }

            ShootingDeliveryContent::create([
                'shooting_delivery_id' => $delivery->id,
                'item_no' => $itemNo,
                'description' => $row['B'],
                'quantity' => $row['C'],
                'unit' => $row['D'],
                'primary_id' => substr($itemNo, 3, 6),
                'is_received' => 0,
                'status' => $status,
            ]);
        }

        // ✅ تحديث عدد الجديد والقديم في الجدول الرئيسي
        $delivery->update([
            'new_records' => $newCount,
            'old_records' => $oldCount,
        ]);

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
        $rawRows = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        // ربط كل صف بمحتواه من جدول shooting_delivery_contents
        $rows = collect(array_slice($rawRows, 1))
            ->map(function ($row) use ($delivery) {
                $itemNo = $row['A'];
                $content = \App\Models\ShootingDeliveryContent::where('shooting_delivery_id', $delivery->id)
                    ->where('item_no', $itemNo)
                    ->first();

                return array_merge($row, [
                    'is_received' => $content?->is_received ?? 0,
                    'status' => $content?->status ?? null,
                ]);
            })
            ->sortBy('is_received')
            ->values()
            ->toArray();

        return view('shooting_products.deliveries.send', compact('rows', 'delivery'));
    }


    public function sendSave(Request $request, $id)
    {
        try {
            $selectedIndexes = $request->input('selected_rows', []);
    
            if (empty($selectedIndexes)) {
                return redirect()->back()->with('error', 'يجب اختيار منتج واحد على الأقل قبل النشر');
            }
    
            DB::transaction(function () use ($selectedIndexes, $request, $id) {
                $delivery = ShootingDelivery::findOrFail($id);
                $rows = $request->input('rows', []);
    
                $grouped = [];
                $addedCodes = [];
    
                foreach ($selectedIndexes as $index) {
                    $row = $rows[$index];
                    $itemNo = $row['item_no'];
    
                    if (isset($addedCodes[$itemNo])) {
                        continue;
                    }
                    $addedCodes[$itemNo] = true;
    
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
                    $firstItem = $items[0];
                    $description = $firstItem['description'];
    
                    $existingProduct = ShootingProduct::where('custom_id', $primaryId)->first();
    
                    if ($existingProduct) {
                        if (Str::lower(Str::squish($existingProduct->name)) === Str::lower(Str::squish($description))) {
                            // المنتج موجود بنفس الاسم
                            foreach ($items as $color) {
                                $itemNo = $color['item_no'];
                                $colorCode = substr($itemNo, -5, 3);
                                $sizeCode = substr($itemNo, -2);
    
                                $existingColor = ShootingProductColor::where('code', $itemNo)->first();
    
                                if (!$existingColor) {
                                    ShootingProductColor::create([
                                        'shooting_product_id' => $existingProduct->id,
                                        'code' => $itemNo,
                                        'color_code' => $colorCode,
                                        'size_code' => $sizeCode,
                                    ]);
                                }
    
                                ShootingDeliveryContent::where('shooting_delivery_id', $delivery->id)
                                    ->where('item_no', $itemNo)
                                    ->update([
                                        'is_received' => 1,
                                        'status' => 'old',
                                    ]);
                            }
    
                            $existingProduct->number_of_colors = $existingProduct->shootingProductColors()
                                ->pluck('color_code')->unique()->count();
                            $existingProduct->save();
                            $existingProduct->refreshStatusBasedOnColors();
                        } else {
                            // نفس الرقم لكن باسم مختلف → تجاهل وأعلِم إنه قديم
                            foreach ($items as $color) {
                                ShootingDeliveryContent::where('shooting_delivery_id', $delivery->id)
                                    ->where('item_no', $color['item_no'])
                                    ->update([
                                        'is_received' => 1,
                                        'status' => 'old',
                                    ]);
                            }
                            continue;
                        }
                    } else {
                        // منتج جديد
                        $uniqueColors = collect($items)->map(function ($item) {
                            return substr($item['item_no'], -5, 3);
                        })->unique();
    
                        $product = ShootingProduct::create([
                            'custom_id' => $primaryId,
                            'name' => $description,
                            'number_of_colors' => $uniqueColors->count(),
                            'quantity' => $firstItem['quantity'],
                            'status' => 'new',
                        ]);
    
                        foreach ($items as $color) {
                            $itemNo = $color['item_no'];
                            $colorCode = substr($itemNo, -5, 3);
                            $sizeCode = substr($itemNo, -2);
    
                            ShootingProductColor::create([
                                'shooting_product_id' => $product->id,
                                'code' => $itemNo,
                                'color_code' => $colorCode,
                                'size_code' => $sizeCode,
                            ]);
    
                            ShootingDeliveryContent::where('shooting_delivery_id', $delivery->id)
                                ->where('item_no', $itemNo)
                                ->update([
                                    'is_received' => 1,
                                    'status' => 'old',
                                ]);
                        }
                    }
                }
    
                $delivery->update([
                    'sent_by' => auth()->id(),
                    'status' => 'تم ألنشر',
                    'sent_records' => count($addedCodes),
                ]);
            });
    
            return redirect()->route('shooting-deliveries.index')->with('success', 'تم نشر البيانات الجديدة بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حصل خطأ أثناء النشر: ' . $e->getMessage());
        }
    }
    





    public function shootingSessions()
    {
        $sessions = ShootingSession::select('reference')
            ->groupBy('reference')
            ->latest()
            ->get();

        return view('shooting_products.shooting_sessions', compact('sessions'));
    }

    public function showShootingSession($reference)
    {
        $colors = ShootingSession::where('reference', $reference)
            ->with('color.shootingProduct')
            ->get();

        return view('shooting_products.shooting_sessions_show', compact('colors', 'reference'));
    }
}
