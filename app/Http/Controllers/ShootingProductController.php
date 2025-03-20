<?php

namespace App\Http\Controllers;

use App\Models\ShootingProduct;
use App\Models\User;
use Illuminate\Http\Request;

class ShootingProductController extends Controller
{
    public function index()
    {
        $shooting_products = ShootingProduct::all();
        $photographers = User::whereHas('role', function ($query) {
            $query->where('name', 'photographer');
        })->get();
        $editors = User::whereHas('role', function ($query) {
            $query->where('name', 'editor');
        })->get();
                
        return view('shooting_products.index', compact('shooting_products' , 'photographers', 'editors'));
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
            } else {
                $product->date_of_editing = $request->date_of_editing;
                $product->editor = json_encode($request->editor);
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
