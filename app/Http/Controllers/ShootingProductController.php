<?php

namespace App\Http\Controllers;

use App\Models\ShootingProduct;
use App\Models\ShootingProductColor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\WebsiteAdminProduct;
use Illuminate\Support\Facades\DB;


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
        ]);

        ShootingProduct::create([
            'name' => $request->name,
            'number_of_colors' => $request->number_of_colors,
            'status' => 'new', // Default status
        ]);

        return redirect()->route('shooting-products.index')->with('success', 'تم إضافة المنتج بنجاح');
    }

    public function show($id)
    {
        $product = ShootingProduct::findOrFail($id);
        return view('shooting_products.show', compact('product'));
    }

    public function completePage($id)
    {
        $product = ShootingProduct::findOrFail($id);
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
                'price' => $color['price'] ?? null,
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
        $product = ShootingProduct::findOrFail($id);
        return view('shooting_products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = ShootingProduct::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('shooting-products.index')->with('success', 'تم تحديث المنتج بنجاح');
    }

    public function destroy($id)
    {
        $product = ShootingProduct::findOrFail($id);
        $product->delete();

        return redirect()->route('shooting-products.index')->with('success', 'تم حذف المنتج بنجاح');
    }

    public function indexWebsite()
    {
        $products = WebsiteAdminProduct::orderBy('created_at', 'desc')->get();
        return view('shooting-products.website', compact('products'));
    }

    public function updateWebsiteStatus(Request $request)
    {
        $product = WebsiteAdminProduct::findOrFail($request->id);
        $product->status = 'done';
        $product->note = $request->note;
        $product->save();

        return redirect()->route('website-admin.index')->with('success', 'تم نشر المنتج بنجاح');
    }

}
