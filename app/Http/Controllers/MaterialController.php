<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $materials = Material::all(); 
        return view('materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('materials.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
        ]);

        $material = new Material();
        $material->name = $request->name;

        $material->save();

        return redirect()->route('materials.index')->with('success', 'تم الإضافة بنجاح');
    }

    /**
     * Display the specified category.
     */
    public function show(Material $material)
    {
        return view('materials.show', compact('material'));
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Material $material)
    {
        return view('materials.edit', compact('material'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $material->name = $request->name;

        $material->save();

        return redirect()->route('materials.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('materials.index')->with('success', 'تم الحذف بنجاح');
    }
}
