<?php

namespace App\Http\Controllers;

use App\Models\DesignMaterial;
use App\Models\DesignMaterialColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesignMaterialController extends Controller
{
    // قائمة كل الخامات
    public function index()
    {
        $materials = DesignMaterial::withCount('colors')->get();
        return view('design_materials.index', compact('materials'));
    }

    // شاشة التفاصيل (الخامة + كل الألوان)
    public function show($id)
    {
        $material = DesignMaterial::with('colors')->findOrFail($id);
        return view('design_materials.show', compact('material'));
    }

    // شاشة إنشاء خامة (وفيها إضافة ألوان فورية)
    public function create()
    {
        return view('design_materials.create');
    }

    // حفظ خامة جديدة وكل ألوانها
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $materialData = [
                'name' => $request->name,
            ];

            if ($request->hasFile('image')) {
                $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('images/materials'), $imageName);
                $materialData['image'] = 'images/materials/' . $imageName;
            }

            $material = DesignMaterial::create($materialData);

            // إضافة الألوان (ممكن تيجي فاضيه)
            if ($request->colors) {
                foreach ($request->colors as $color) {
                    $colorData = [
                        'design_material_id' => $material->id,
                        'name' => $color['name'] ?? null,
                        'code' => $color['code'] ?? null,
                    ];

                    if (isset($color['image']) && $color['image'] instanceof \Illuminate\Http\UploadedFile) {
                        $colorImageName = time() . '_' . uniqid() . '.' . $color['image']->getClientOriginalExtension();
                        $color['image']->move(public_path('images/material_colors'), $colorImageName);
                        $colorData['image'] = 'images/material_colors/' . $colorImageName;
                    }

                    DesignMaterialColor::create($colorData);
                }
            }
            DB::commit();
            return redirect()->route('design-materials.index')->with('success', 'تم إضافة الخامة بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء الحفظ: ' . $e->getMessage());
        }
    }

    // شاشة تعديل الخامة وكل ألوانها (نفس شاشة الإنشاء)
    public function edit($id)
    {
        $material = DesignMaterial::with('colors')->findOrFail($id);
        return view('design_materials.edit', compact('material'));
    }

    // تعديل خامة وكل ألوانها (إضافة، تحديث، حذف)
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $material = DesignMaterial::findOrFail($id);

            $material->name = $request->name;
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('images/materials'), $imageName);
                $material->image = 'images/materials/' . $imageName;
            }
            $material->save();

            // تحديث أو إضافة الألوان
            if ($request->colors) {
                foreach ($request->colors as $color) {
                    // لو فيه id: تحديث, مفيش: إضافة
                    if (!empty($color['id'])) {
                        $colorModel = DesignMaterialColor::find($color['id']);
                        if ($colorModel) {
                            $colorModel->name = $color['name'] ?? null;
                            $colorModel->code = $color['code'] ?? null;
                            if (isset($color['image']) && $color['image'] instanceof \Illuminate\Http\UploadedFile) {
                                $colorImageName = time() . '_' . uniqid() . '.' . $color['image']->getClientOriginalExtension();
                                $color['image']->move(public_path('images/material_colors'), $colorImageName);
                                $colorModel->image = 'images/material_colors/' . $colorImageName;
                            }
                            $colorModel->save();
                        }
                    } else {
                        $colorData = [
                            'design_material_id' => $material->id,
                            'name' => $color['name'] ?? null,
                            'code' => $color['code'] ?? null,
                        ];
                        if (isset($color['image']) && $color['image'] instanceof \Illuminate\Http\UploadedFile) {
                            $colorImageName = time() . '_' . uniqid() . '.' . $color['image']->getClientOriginalExtension();
                            $color['image']->move(public_path('images/material_colors'), $colorImageName);
                            $colorData['image'] = 'images/material_colors/' . $colorImageName;
                        }
                        DesignMaterialColor::create($colorData);
                    }
                }
            }
            DB::commit();
            return redirect()->route('design-materials.index')->with('success', 'تم تعديل الخامة بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء التعديل: ' . $e->getMessage());
        }
    }

    // حذف خامة (يحذف كل ألوانها برضه)
    public function destroy($id)
    {
        $material = DesignMaterial::findOrFail($id);
        $material->colors()->delete();
        $material->delete();
        return redirect()->route('design-materials.index')->with('success', 'تم حذف الخامة بنجاح');
    }

    // حذف لون واحد (AJAX)
    public function deleteColor($id)
    {
        $color = DesignMaterialColor::findOrFail($id);
        $color->delete();
        return response()->json(['success' => true, 'message' => 'تم حذف اللون بنجاح']);
    }
}
