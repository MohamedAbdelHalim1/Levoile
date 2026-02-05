<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DesignComment;
use App\Models\DesignMaterial;
use App\Models\DesignSample;
use App\Models\DesignSampleMaterial;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DesignSampleController extends Controller
{

    public function index(Request $request)
    {
        $query = DesignSample::query()->with(['season', 'category', 'materials.material']);

        if ($request->filled('season_id')) {
            $query->where('season_id', $request->season_id);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $samples = $query->orderByDesc('id')->get();
        $materials = DesignMaterial::all();
        $patternests = \App\Models\User::where('role_id', 11)->get();

        // إرسال الفلاتر الحالية عشان ترجع البيانات المختارة
        return view('design-sample.index', compact('samples', 'materials', 'patternests'))
            ->with([
                'filters' => $request->only(['season_id', 'category_id', 'status']),
                'seasons' => \App\Models\Season::all(),
                'categories' => \App\Models\Category::all(),
            ]);
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

        return redirect()->route('design-sample-products.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم إضافة العينة بنجاح' : 'Sample added successfully'
        );
    }

    public function show($id)
    {
        $sample = DesignSample::with('season', 'category', 'materials.material')->findOrFail($id);
        $comments = DesignComment::where('design_sample_id', $sample->id)->with('user')->latest()->get();
        return view('design-sample.show', compact('sample', 'comments'));
    }


    public function addComment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = [
            'design_sample_id' => $id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/comment'), $filename);
            $data['image'] = 'images/comment/' . $filename;
        }

        DesignComment::create($data);

        return back()->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم إضافة التعليق بنجاح' : 'Comment added successfully'
        );
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

        return redirect()->route('design-sample-products.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم التعديل بنجاح' : 'Edited successfully'
        );
    }

    public function destroy($id)
    {
        $sample = DesignSample::findOrFail($id);
        $sample->delete();

        return redirect()->route('design-sample-products.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم الحذف بنجاح' : 'Deleted successfully'
        );
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

        $sample->status = 'تم اضافة الخامات';
        $sample->save();

        return redirect()->route('design-sample-products.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم تحديث الخامات بنجاح' : 'Materials updated successfully'
        );
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

        return redirect()->route('design-sample-products.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم تعيين الباترنيست بنجاح' : 'Patternest assigned successfully'
        );
    }

    public function addMarker(Request $request, $id)
    {
        $request->validate([
            'marker_number' => 'required|string|max:100',
            'marker_image' => 'required|image',
            'marker_consumption' => 'nullable|string|max:255',
            'marker_unit' => 'nullable|string|max:50',
            'delivery_date' => 'nullable|date',
        ]);

        $sample = DesignSample::findOrFail($id);


        // رفع الصورة
        $image = $request->file('marker_image');
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/marker'), $imageName);

        // حفظ البيانات
        $sample->update([
            'marker_number' => $request->marker_number,
            'marker_image' => 'images/marker/' . $imageName,
            'marker_consumption' => $request->marker_consumption,
            'marker_unit' => $request->marker_unit,
            'status' => 'قيد المراجعه',
            'delivery_date' => $request->delivery_date,
        ]);

        return redirect()->route('design-sample-products.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم إضافة الماركر بنجاح' : 'Marker added successfully.'
        );
    }

    public function reviewSample(Request $request, $id)
    {
        try {
            $request->validate([
                'status' => 'required',
                'content' => 'nullable|string',
                'image' => 'nullable|image|max:2048'
            ]);

            $sample = DesignSample::findOrFail($id);
            $sample->status = $request->status;
            $sample->is_reviewed = 1;
            $sample->save();

            // حفظ الكومنت
            if ($request->content || $request->hasFile('image')) {
                $commentData = [
                    'design_sample_id' => $sample->id,
                    'user_id' => auth()->id(),
                    'content' => $request->content,
                ];

                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/comment'), $filename);
                    $commentData['image'] = 'images/comment/' . $filename;
                }

                DesignComment::create($commentData);
            }

            return redirect()->route('design-sample-products.index')
                ->with(
                    'success',
                    auth()->user()->current_lang == 'ar' ? 'تم تحديث حالة العينة وحفظ الملاحظات.' : 'Sample status updated and comments saved.'
                );
        } catch (\Exception $e) {
            dd($e);
        }
    }


    public function addTechnicalSheet(Request $request, $id)
    {
        $request->validate([
            'marker_file' => 'required|file',
        ]);

        $sample = DesignSample::findOrFail($id);

        // رفع الملف
        $file = $request->file('marker_file');
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('files/marker'), $fileName);

        // حفظ البيانات
        $sample->update([
            'marker_file' => 'files/marker/' . $fileName,
            'status' => 'تم اضافة التيكنيكال'
        ]);

        return redirect()->route('design-sample-products.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم إضافة التيكنيكال شيت بنجاح.' : 'Technical sheet added successfully.'
        );
    }
}
