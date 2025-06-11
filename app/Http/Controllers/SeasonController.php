<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        $seasons = Season::all();
        return view('seasons.index', compact('seasons'));
    }

    public function create()
    {
        return view('seasons.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255','code' => 'nullable|string|max:255']);
        Season::create($request->all());
        return redirect()->route('seasons.index')->with('success',
        auth()->user()->current_lang == 'ar' ? 'تم الإضافة بنجاح' : 'Added successfully');
    }

    public function show(Season $season)
    {
        return view('seasons.show', compact('season'));
    }

    public function edit(Season $season)
    {
        return view('seasons.edit', compact('season'));
    }

    public function update(Request $request, Season $season)
    {
        $request->validate(['name' => 'required|string|max:255','code' => 'nullable|string|max:255']);
        $season->update($request->all());
        return redirect()->route('seasons.index')->with('success',
        auth()->user()->current_lang == 'ar' ? 'تم التعديل بنجاح' : 'Edited successfully');
    }

    public function destroy(Season $season)
    {
        $season->delete();
        return redirect()->route('seasons.index')->with('success',
        auth()->user()->current_lang == 'ar' ? 'تم الحذف بنجاح' : 'Deleted successfully');
    }
}
