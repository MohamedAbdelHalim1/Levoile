<?php

namespace App\Http\Controllers;

use App\Models\EditSession;
use App\Models\ReadyToShoot;
use App\Models\ShootingDelivery;
use App\Models\ShootingDeliveryContent;
use App\Models\ShootingGallery;
use App\Models\ShootingProduct;
use App\Models\ShootingProductColor;
use App\Models\ShootingSession;
use App\Models\SocialMediaProduct;
use App\Models\SocialMediaProductPlatform;
use App\Models\User;
use App\Models\WayOfShooting;
use App\Models\WebsiteAdminProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;


class ShootingProductController extends Controller
{
    public function index(Request $request)
    {
        $query = ShootingProduct::with([
            'shootingProductColors.sessions.editSessions',  // eager load
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

    public function saveSizeWeight(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:shooting_products,id',
            'size_name'  => 'required|string',
            'weight'     => 'required|string|max:255',
        ]);

        ShootingProductColor::where('shooting_product_id', $request->product_id)
            ->update([
                'size_name' => $request->size_name,
                'weight'    => $request->weight,
            ]);

        return back()->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم تحديث المقاس والوزن بنجاح' : 'Size and weight updated successfully'
        );
    }



    // public function multiStartPage(Request $request)
    // {
    //     $ids = explode(',', $request->selected_products);
    //     $products = ShootingProduct::whereIn('id', $ids)->get();

    //     $photographers = User::whereHas('role', function ($q) {
    //         $q->where('name', 'photographer');
    //     })->get();

    //     $editors = User::whereHas('role', function ($q) {
    //         $q->where('name', 'editor');
    //     })->get();

    //     return view('shooting_products.multi_start', compact('products', 'photographers', 'editors'));
    // }

    // public function multiStartPage(Request $request)
    // {
    //     $ids = $request->input('selected_products', []);
    //     $products = ShootingProduct::whereIn('id', $ids)
    //         ->with(['readyToShoot', 'shootingProductColors']) // أضف العلاقة دي
    //         ->get();

    //     // جلب نوع التصوير من جدول ready_to_shoot
    //     $type = null;
    //     foreach ($products as $product) {
    //         $readyType = $product->readyToShoot->first()?->type_of_shooting;
    //         if ($type === null) {
    //             $type = $readyType;
    //         } elseif ($readyType !== $type) {
    //             return redirect()->back()->with('error', 'يجب أن يكون لكل المنتجات نفس نوع التصوير');
    //         }
    //     }

    //     $photographers = User::whereHas('role', function ($q) {
    //         $q->where('name', 'photographer');
    //     })->get();

    //     $editors = User::whereHas('role', function ($q) {
    //         $q->where('name', 'editor');
    //     })->get();

    //     $waysOfShooting = WayOfShooting::all();


    //     return view('shooting_products.multi_start', compact('products', 'photographers', 'editors', 'type', 'waysOfShooting'));
    // }

    public function multiStartPage(Request $request)
    {
        $ids = $request->input('selected_products', []);

        // بدال ما نجيب المنتجات وارتباطها بكل الألوان، هنجيب فقط الألوان اللي كانت موجودة في ready_to_shoot
        $readyItems = ReadyToShoot::whereIn('shooting_product_id', $ids)->get()->groupBy('shooting_product_id');

        $productIds = $readyItems->keys();

        $products = ShootingProduct::whereIn('id', $productIds)->get();

        // عشان كل منتج يبقى فيه بس الألوان اللي جاهزة فعلاً
        foreach ($products as $product) {
            $colors = $readyItems[$product->id];
            // نخليها شكل علاقة وهمية على نفس النموذج
            $product->setRelation('shootingProductColors', $colors);
        }

        // النوع لازم يكون متحد
        $type = null;
        foreach ($products as $product) {
            $readyType = $product->shootingProductColors->first()?->type_of_shooting;
            if ($type === null) {
                $type = $readyType;
            } elseif ($readyType !== $type) {
                return redirect()->back()->with('error', 'يجب أن يكون لكل المنتجات نفس نوع التصوير');
            }
        }

        $photographers = User::whereHas('role', fn($q) => $q->where('name', 'photographer'))->get();
        $editors = User::whereHas('role', fn($q) => $q->where('name', 'editor'))->get();
        $waysOfShooting = WayOfShooting::all();

        return view('shooting_products.multi_start', compact('products', 'photographers', 'editors', 'type', 'waysOfShooting'));
    }



    public function multiStartSave(Request $request)
    {
        $readyIds = $request->selected_colors;

        $selectedColorIds = \App\Models\ReadyToShoot::join('shooting_product_colors', function ($join) {
            $join->on('ready_to_shoot.shooting_product_id', '=', 'shooting_product_colors.shooting_product_id')
                ->on('ready_to_shoot.item_no', '=', 'shooting_product_colors.code');
        })
            ->whereIn('ready_to_shoot.id', $readyIds) // 👈 حل المشكلة هنا
            ->pluck('shooting_product_colors.id')
            ->toArray();


        if (empty($selectedColorIds)) {
            return redirect()->back()->with('error', 'يجب اختيار لون واحد على الأقل');
        }

        try {
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

                        if (in_array($request->type_of_shooting, ['تصوير انفلونسر', 'تصوير منتج', 'تصوير موديل'])) {
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

                        if (in_array($request->type_of_shooting, ['تصوير انفلونسر', 'تصوير منتج', 'تصوير موديل'])) {
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

                \App\Models\ReadyToShoot::whereIn('shooting_product_id', $productIds)
                    ->delete();


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
                    $product->is_reviewed      = 0;

                    if (in_array($request->type_of_shooting, ['تصوير انفلونسر', 'تصوير منتج', 'تصوير موديل'])) {
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

                // ربط طرق التصوير بالـ reference
                if ($request->has('way_of_shooting_ids')) {
                    foreach ($request->way_of_shooting_ids as $wayId) {
                        \App\Models\ShootingSessionWay::create([
                            'reference' => $reference,
                            'way_of_shooting_id' => $wayId,
                        ]);
                    }
                }
            });

            return redirect()->route('shooting-sessions.index')->with(
                'success',
                auth()->user()->current_lang == 'ar' ? 'تم بدء التصوير بنجاح' : 'Started shooting successfully'
            );
        } catch (\Exception $e) {
            dd($e);
        }
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
                // هنا نضيف النوت لو موجودة
                if ($request->filled('note')) {
                    $session->note = $request->note;
                }
                $session->save();
                // ✅ تحديث حالة اللون المرتبط بالسيشن
                $session->color->status = 'completed';
                $session->color->save();
            }
            EditSession::firstOrCreate(
                ['reference' => $request->reference],
                ['photo_drive_link' => $request->drive_link],
                ['status' => 'جديد']
            );


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

                \App\Models\ReadyToShoot::where('shooting_product_id', $productId)
                    ->delete();
            }


            DB::commit();

            return response()->json(['success' => true, 'message' => auth()->user()->current_lang == 'ar' ? 'تم تحديث لينك درايف بنجاح' : 'Drive link updated successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'حدث خطأ أثناء الحفظ: ' . $e->getMessage()], 500);
        }
    }



    public function manual()
    {
        $photographers = \App\Models\User::where('role_id', 7)->get(); // مثال
        $editors = \App\Models\User::where('role_id', 8)->get(); // مثال
        $waysOfShooting = WayOfShooting::all();

        return view('shooting_products.manual', compact('photographers', 'editors', 'waysOfShooting'));
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


                    if (in_array($request->type_of_shooting, ['تصوير انفلونسر', 'تصوير منتج', 'تصوير موديل'])) {
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

                    if (in_array($request->type_of_shooting, ['تصوير انفلونسر', 'تصوير منتج', 'تصوير موديل'])) {
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

            // ربط طرق التصوير بالـ reference
            if ($request->has('way_of_shooting_ids')) {
                foreach ($request->way_of_shooting_ids as $wayId) {
                    \App\Models\ShootingSessionWay::create([
                        'reference' => $reference,
                        'way_of_shooting_id' => $wayId,
                    ]);
                }
            }
        });

        return redirect()->route('shooting-sessions.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم بدء التصوير اليدوي بنجاح' : 'Started manual shooting successfully'
        );
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

        return redirect()->route('shooting-products.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم إضافة المنتج بنجاح' : 'Product added successfully'
        );
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


        return redirect()->route('shooting-products.complete.page', $originalProductId)->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم حفظ بيانات المنتج بنجاح' : 'Product data saved successfully'
        );
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

            return redirect()->route('shooting-products.index')->with(
                'success',
                auth()->user()->current_lang == 'ar' ? 'تم تحديث المنتج بنجاح' : 'Product updated successfully'
            );
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    public function destroy($id)
    {
        $product = ShootingProduct::findOrFail($id);
        $product->delete();

        return redirect()->route('shooting-products.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم حذف المنتج بنجاح' : 'Product deleted successfully'
        );
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

        return redirect()->route('website-admin.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم نشر المنتج بنجاح' : 'Product published successfully'
        );
    }


    public function reopenWebsiteProduct(Request $request)
    {
        $product = WebsiteAdminProduct::findOrFail($request->id);
        $product->status = 'new';
        $product->note = null;
        $product->save();

        return redirect()->route('website-admin.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تمت إعادة فتح المنتج بنجاح' : 'Product reopened successfully'
        );
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

            return redirect()->route('social-media.index')->with(
                'success',
                auth()->user()->current_lang == 'ar' ? 'تم جدولة النشر بنجاح' : 'Scheduled successfully'
            );
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

        return redirect()->route('social-media.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم إعادة فتح المنتج للنشر.' : 'Product reopened for scheduling.'
        );
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
        $deliveries = ShootingDelivery::withCount([
            'contents as unique_products' => function ($query) {
                $query->select(\DB::raw('COUNT(DISTINCT primary_id)'));
            }
        ])
            ->latest()
            ->get();

        return view('shooting_products.deliveries.index', compact('deliveries'));
    }

    // public function deliveryIndex()
    // {
    //     $deliveries = ShootingDelivery::latest()->get();
    //     return view('shooting_products.deliveries.index', compact('deliveries'));
    // }


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
                if (empty($itemNo)) {
                    continue;
                }
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

            return redirect()->route('shooting-deliveries.index')->with(
                'success',
                auth()->user()->current_lang == 'ar' ? 'تم رفع الشيت بنجاح' : 'File uploaded successfully'
            );
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


    // public function sendSave(Request $request, $id)
    // {
    //     try {
    //         $selectedIndexes = $request->input('selected_rows', []);

    //         if (empty($selectedIndexes)) {
    //             return redirect()->back()->with('error', 'يجب اختيار منتج واحد على الأقل قبل النشر');
    //         }

    //         DB::transaction(function () use ($selectedIndexes, $request, $id) {
    //             $delivery = ShootingDelivery::findOrFail($id);
    //             $rows = $request->input('rows', []);

    //             $grouped = [];
    //             $addedCodes = [];

    //             foreach ($selectedIndexes as $index) {
    //                 $row = $rows[$index];
    //                 $itemNo = $row['item_no'];

    //                 if (isset($addedCodes[$itemNo])) {
    //                     continue;
    //                 }
    //                 $addedCodes[$itemNo] = true;

    //                 $description = $row['description'];
    //                 $quantity = $row['quantity'];
    //                 $primaryId = substr($itemNo, 3, 6);

    //                 $grouped[$primaryId][] = [
    //                     'item_no' => $itemNo,
    //                     'description' => $description,
    //                     'quantity' => $quantity,
    //                 ];
    //             }

    //             foreach ($grouped as $primaryId => $items) {
    //                 $firstItem = $items[0];
    //                 $description = $firstItem['description'];

    //                 $existingProduct = ShootingProduct::where('custom_id', $primaryId)->first();

    //                 if ($existingProduct) {
    //                     if (Str::lower(Str::squish($existingProduct->name)) === Str::lower(Str::squish($description))) {
    //                         // المنتج موجود بنفس الاسم
    //                         foreach ($items as $color) {
    //                             $itemNo = $color['item_no'];
    //                             $colorCode = substr($itemNo, -5, 3);
    //                             $sizeCode = substr($itemNo, -2);

    //                             $existingColor = ShootingProductColor::where('code', $itemNo)->first();

    //                             if (!$existingColor) {
    //                                 ShootingProductColor::create([
    //                                     'shooting_product_id' => $existingProduct->id,
    //                                     'code' => $itemNo,
    //                                     'color_code' => $colorCode,
    //                                     'size_code' => $sizeCode,
    //                                 ]);
    //                             }

    //                             ShootingDeliveryContent::where('shooting_delivery_id', $delivery->id)
    //                                 ->where('item_no', $itemNo)
    //                                 ->update([
    //                                     'is_received' => 1,
    //                                     'status' => 'old',
    //                                 ]);
    //                         }

    //                         $existingProduct->number_of_colors = $existingProduct->shootingProductColors()
    //                             ->pluck('color_code')->unique()->count();
    //                         $existingProduct->save();
    //                         $existingProduct->refreshStatusBasedOnColors();
    //                     } else {
    //                         // نفس الرقم لكن باسم مختلف → تجاهل وأعلِم إنه قديم
    //                         foreach ($items as $color) {
    //                             ShootingDeliveryContent::where('shooting_delivery_id', $delivery->id)
    //                                 ->where('item_no', $color['item_no'])
    //                                 ->update([
    //                                     'is_received' => 1,
    //                                     'status' => 'old',
    //                                 ]);
    //                         }
    //                         continue;
    //                     }
    //                 } else {
    //                     // منتج جديد
    //                     $uniqueColors = collect($items)->map(function ($item) {
    //                         return substr($item['item_no'], -5, 3);
    //                     })->unique();

    //                     $product = ShootingProduct::create([
    //                         'custom_id' => $primaryId,
    //                         'name' => $description,
    //                         'number_of_colors' => $uniqueColors->count(),
    //                         'quantity' => $firstItem['quantity'],
    //                         'status' => 'new',
    //                     ]);

    //                     foreach ($items as $color) {
    //                         $itemNo = $color['item_no'];
    //                         $colorCode = substr($itemNo, -5, 3);
    //                         $sizeCode = substr($itemNo, -2);

    //                         ShootingProductColor::create([
    //                             'shooting_product_id' => $product->id,
    //                             'code' => $itemNo,
    //                             'color_code' => $colorCode,
    //                             'size_code' => $sizeCode,
    //                         ]);

    //                         ShootingDeliveryContent::where('shooting_delivery_id', $delivery->id)
    //                             ->where('item_no', $itemNo)
    //                             ->update([
    //                                 'is_received' => 1,
    //                                 'status' => 'old',
    //                             ]);
    //                     }
    //                 }
    //             }

    //             $delivery->update([
    //                 'sent_by' => auth()->id(),
    //                 'status' => 'تم ألنشر',
    //                 'sent_records' => count($addedCodes),
    //             ]);
    //         });

    //         return redirect()->route('shooting-deliveries.index')->with('success', 'تم نشر البيانات الجديدة بنجاح');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'حصل خطأ أثناء النشر: ' . $e->getMessage());
    //     }
    // }

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

                                // ✅ check if this item already exists in ready_to_shoot with "جديد"
                                $alreadyExists = \App\Models\ReadyToShoot::where('shooting_product_id', $existingProduct->id)
                                    ->where('item_no', $itemNo)
                                    ->where('status', 'جديد')
                                    ->exists();

                                if (!$alreadyExists) {
                                    \App\Models\ReadyToShoot::create([
                                        'shooting_product_id' => $existingProduct->id,
                                        'item_no' => $itemNo,
                                        'description' => $color['description'],
                                        'quantity' => $color['quantity'],
                                        'status' => 'جديد',
                                        'type_of_shooting' => null,
                                    ]);
                                }
                            }

                            $existingProduct->number_of_colors = $existingProduct->shootingProductColors()
                                ->pluck('color_code')->unique()->count();
                            $existingProduct->save();
                            $existingProduct->refreshStatusBasedOnColors();
                        } else {
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

                            // إدخال في ready_to_shoot
                            \App\Models\ReadyToShoot::create([
                                'shooting_product_id' => $product->id,
                                'item_no' => $itemNo,
                                'description' => $color['description'],
                                'quantity' => $color['quantity'],
                                'status' => 'جديد',
                                'type_of_shooting' => null, // المستخدم هيحدده بعدين
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

            return redirect()->route('shooting-deliveries.index')->with(
                'success',
                auth()->user()->current_lang == 'ar' ? 'تم نشر البيانات الجديدة بنجاح' : 'New data published successfully'
            );
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

    public function removeColor($sessionId)
    {
        $session = ShootingSession::findOrFail($sessionId);
        $color = $session->color;

        // 1. احذف السيشن نفسه
        $session->delete();

        // 2. عدل حالة اللون لـ new
        if ($color) {
            $color->update(['status' => 'new']);
        }

        return back()->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم حذف اللون من الجلسة وإعادة حالته إلى جديد.' : 'Color removed from session and status changed to new.'
        );
    }


    // public function readyToShootIndex()
    // {
    //     $readyItems = ReadyToShoot::with('shootingProduct')
    //         ->whereNull('deleted_at')
    //         ->latest()
    //         ->get();

    //     return view('shooting_products.ready-to-shoot.index', compact('readyItems'));
    // }
    public function readyToShootIndex(Request $request)
    {
        $query = ReadyToShoot::with('shootingProduct');

        if ($request->filled('type_of_shooting')) {
            $query->where('type_of_shooting', $request->type_of_shooting);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $readyItems = $query->latest()->get();

        return view('shooting_products.ready-to-shoot.index', compact('readyItems'));
    }



    public function assignType(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'type_of_shooting' => 'required|string'
        ]);

        \App\Models\ReadyToShoot::where('shooting_product_id', $request->product_id)
            ->update([
                'type_of_shooting' => $request->type_of_shooting
            ]);

        return redirect()->back()->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم تعيين نوع التصوير بنجاح' : 'Type of shooting assigned successfully'
        );
    }

    public function bulkAssignType(Request $request)
    {
        $request->validate([
            'product_ids' => 'required|string',
            'type_of_shooting' => 'required|string',
        ]);

        $ids = explode(',', $request->product_ids);

        ReadyToShoot::whereIn('shooting_product_id', $ids)
            ->update([
                'type_of_shooting' => $request->type_of_shooting,
                'updated_at' => now(),
            ]);

        return redirect()->back()->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم تعيين نوع التصوير بنجاح للمنتجات المحددة' : 'Type of shooting assigned successfully for the selected products'
        );
    }

    public function refreshVariants(Request $request)
    {
        $productId = $request->shooting_product_id;

        $existingItems = ReadyToShoot::where('shooting_product_id', $productId)
            ->pluck('item_no')
            ->toArray();

        $newVariants = ShootingProductColor::with('shootingProduct') // ضروري جدًا
            ->where('shooting_product_id', $productId)
            ->whereNotIn('code', $existingItems)
            ->get();


        foreach ($newVariants as $variant) {
            ReadyToShoot::create([
                'shooting_product_id' => $variant->shooting_product_id,
                'item_no' => $variant->code,
                'description' => $variant->shootingProduct->description ?? '',
                'quantity' => $variant->shootingProduct->quantity ?? 0,
                'status' => 'جديد',
            ]);
        }

        return response()->json([
            'message' => auth()->user()->current_lang == 'ar' ? 'تم استرجاع المنتجات المشابهة بنجاح' : 'Similar products restored successfully',
            'added_count' => $newVariants->count()
        ]);
    }
}
