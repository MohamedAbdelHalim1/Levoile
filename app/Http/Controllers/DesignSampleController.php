<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Models\DesignSample;
use App\Models\DesignMaterial;
use App\Models\DesignSampleMaterial;

class DesignSampleController extends Controller
{

    public function index()
    {
        $samples = DesignSample::with(['season', 'category', 'materials.material'])->get();
        $materials = DesignMaterial::all();
        $patternests = \App\Models\User::where('role_id', 11)->get();
        return view('design-sample.index', compact('samples', 'materials', 'patternests'));
    }


    public function create()
    {
        $categories = Category::all();
        $seasons = Season::all();
        return view('design-sample.create', compact('categories', 'seasons'));
    }




    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'season_id' => 'required|exists:seasons,id',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'required|image',
            'materials' => 'nullable|array',
            'materials.*' => 'exists:design_materials,id',
        ]);

        // حفظ الصورة في public/images/sample
        $photo = $request->file('photo');
        $filename = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('images/sample'), $filename);

        $designSample = DesignSample::create([
            'description' => $request->description,
            'season_id' => $request->season_id,
            'category_id' => $request->category_id,
            'image' => 'images/sample/' . $filename,
        ]);

        if ($request->has('materials')) {
            foreach ($request->materials as $materialId) {
                DesignSampleMaterial::create([
                    'design_sample_id' => $designSample->id,
                    'design_material_id' => $materialId,
                ]);
            }
        }

        return redirect()->route('design-sample-products.index')->with('success', 'تم إضافة العينة بنجاح');
    }

    public function show($id)
    {
        $sample = DesignSample::with('season', 'category', 'materials.material')->findOrFail($id);
        return view('design-sample.show', compact('sample'));
    }

    public function edit($id)
    {
        $sample = DesignSample::findOrFail($id);
        $categories = Category::all();
        $seasons = Season::all();
        $materials = DesignMaterial::all();

        return view('design-sample.edit', compact('sample', 'categories', 'seasons', 'materials'));
    }

    public function update(Request $request, $id)
    {
        $sample = DesignSample::findOrFail($id);

        $validated = $request->validate([
            'description' => 'required|string',
            'season_id' => 'required|exists:seasons,id',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image',
        ]);

        // لو في صورة جديدة
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/sample'), $filename);
            $sample->image = 'images/sample/' . $filename;
        }

        $sample->update([
            'description' => $request->description,
            'season_id' => $request->season_id,
            'category_id' => $request->category_id,
            'image' => $sample->image, // هتفضل زي ما هي لو مفيش صورة جديدة
        ]);

        return redirect()->route('design-sample-products.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        $sample = DesignSample::findOrFail($id);
        $sample->delete();

        return redirect()->route('design-sample-products.index')->with('success', 'تم الحذف بنجاح');
    }

    public function attachMaterials(Request $request, $id)
    {
        $request->validate([
            'materials' => 'required|array',
            'materials.*' => 'exists:design_materials,id',
        ]);

        $sample = DesignSample::findOrFail($id);

        // امسح الخامات القديمة
        DesignSampleMaterial::where('design_sample_id', $sample->id)->delete();

        // أضف الجديد
        foreach ($request->materials as $materialId) {
            DesignSampleMaterial::create([
                'design_sample_id' => $sample->id,
                'design_material_id' => $materialId,
            ]);
        }

        return redirect()->route('design-sample-products.index')->with('success', 'تم تحديث الخامات بنجاح');
    }

    public function assignPatternest(Request $request, $id)
    {
        $request->validate([
            'patternest_id' => 'required|exists:users,id',
        ]);

        $sample = DesignSample::findOrFail($id);
        $sample->patternest_id = $request->patternest_id;
        $sample->status = 'تم التوزيع';
        $sample->save();

        return redirect()->route('design-sample-products.index')->with('success', 'تم تعيين الباترنيست بنجاح.');
    }
}
