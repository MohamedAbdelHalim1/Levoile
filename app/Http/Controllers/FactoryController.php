<?php
namespace App\Http\Controllers;

use App\Models\Factory;
use Illuminate\Http\Request;

class FactoryController extends Controller
{
    public function index()
    {
        $factories = Factory::all();
        return view('factories.index', compact('factories'));
    }

    public function create()
    {
        return view('factories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Factory::create($request->all());
        return redirect()->route('factories.index')->with('success',
        auth()->user()->current_lang == 'ar' ? 'تم الإضافة بنجاح' : 'Added successfully');
    }

    public function show(Factory $factory)
    {
        return view('factories.show', compact('factory'));
    }

    public function edit(Factory $factory)
    {
        return view('factories.edit', compact('factory'));
    }

    public function update(Request $request, Factory $factory)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $factory->update($request->all());
        return redirect()->route('factories.index')->with('success',
        auth()->user()->current_lang == 'ar' ? 'تم التعديل بنجاح' : 'Edited successfully');
    }

    public function destroy(Factory $factory)
    {
        $factory->delete();
        return redirect()->route('factories.index')->with('success',
        auth()->user()->current_lang == 'ar' ? 'تم الحذف بنجاح' : 'Deleted successfully');
    }
}
