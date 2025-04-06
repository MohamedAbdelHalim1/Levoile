<?php

namespace App\Http\Controllers;

use App\Models\ShootingProduct;
use App\Models\User;
use Illuminate\Http\Request;

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
        try {
            $request->validate([
                'product_id' => 'required|exists:shooting_products,id',
                'drive_link' => 'required|url',
            ]);

            $product = ShootingProduct::findOrFail($request->product_id);
            $product->drive_link = $request->drive_link;
            $product->status = 'completed';
            $product->save();

            return response()->json(['success' => true, 'message' => 'تم تحديث لينك درايف بنجاح']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'خطأ أثناء تحديث لينك درايف'], 500);
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

    public function completeData(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:shooting_products,id',
            'colors' => 'required|array',
            'colors.*.name' => 'required|string',
            'colors.*.code' => 'required|string',
            'colors.*.image' => 'required|file|image|max:2048',
        ]);

        foreach ($request->colors as $index => $color) {
            $file = $color['image'];
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/shooting');

            // Create the directory if it doesn't exist
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            \App\Models\ShootingProductColor::create([
                'shooting_product_id' => $request->product_id,
                'name' => $color['name'],
                'code' => $color['code'],
                'image' => 'images/shooting/' . $filename, // Save relative path
            ]);
        }

        return response()->json(['message' => 'تم حفظ بيانات الألوان بنجاح']);
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
}
