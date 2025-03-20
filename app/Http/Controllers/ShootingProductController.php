<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShootingProduct;

class ShootingProductController extends Controller
{
    public function index()
    {
        $shooting_products = ShootingProduct::all();
        return view('shooting_products.index', compact('shooting_products'));
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
