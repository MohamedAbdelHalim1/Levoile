<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MainCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = Category::with('mainCategory')->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */

    public function create()
    {
        $mainCategories = MainCategory::orderBy('name')->get();
        return view('categories.create', compact('mainCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'main_category_id' => 'required|exists:main_categories,id',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->main_category_id = $request->main_category_id;
        $category->save();

        return redirect()->route('categories.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم الإضافة بنجاح' : 'Added successfully'
        );
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $mainCategories = MainCategory::orderBy('name')->get();
        return view('categories.edit', compact('category', 'mainCategories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'main_category_id' => 'required|exists:main_categories,id',
        ]);

        $category->name = $request->name;
        $category->main_category_id = $request->main_category_id;
        $category->save();

        return redirect()->route('categories.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم التعديل بنجاح' : 'Edited successfully'
        );
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم الحذف بنجاح' : 'Deleted successfully'
        );
    }
}