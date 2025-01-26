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
        return redirect()->route('factories.index')->with('success', 'تم الإضافة بنجاح');
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
        return redirect()->route('factories.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy(Factory $factory)
    {
        $factory->delete();
        return redirect()->route('factories.index')->with('success', 'تم الحذف بنجاح');
    }
}
