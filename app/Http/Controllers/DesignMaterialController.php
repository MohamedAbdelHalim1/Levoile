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
        $materials = DesignMaterial::with('colors')->get();
        return view('design-materials.index', compact('materials'));
    }

    // شاشة التفاصيل (الخامة + كل الألوان)
    public function show($id)
    {
        $material = DesignMaterial::with('colors')->findOrFail($id);
        return view('design-materials.show', compact('material'));
    }

    // شاشة إنشاء خامة (وفيها إضافة ألوان فورية)
    public function create()
    {
        return view('design-materials.create');
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

            // إضافة الألوان
            if ($request->colors) {
                foreach ($request->colors as $color) {
                    $colorData = [
                        'design_material_id'   => $material->id,
                        'name'                 => $color['name'] ?? null,
                        'code'                 => $color['code'] ?? null,
                        'required_quantity'    => $color['required_quantity'] ?? null,
                        'received_quantity'    => $color['received_quantity'] ?? null,
                        'delivery_date'        => $color['delivery_date'] ?? null,
                    ];
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
        return view('design-materials.edit', compact('material'));
    }

    // تعديل خامة وكل ألوانها (إضافة، تحديث، حذف)
    public function update(Request $request, $id)
    {
        $material = DesignMaterial::findOrFail($id);

        // تحديث بيانات الخامة الأساسية
        $material->update([
            'name' => $request->input('name'),
        ]);

        // حفظ الصورة لو تم رفعها
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/materials'), $imageName);
            $material->image = 'images/materials/' . $imageName;
            $material->save();
        }

        // تحديث أو إضافة الألوان
        $inputColors = $request->input('colors', []);
        $colorIdsInRequest = [];

        foreach ($inputColors as $colorData) {
            // لو فيه id يبقى update
            if (!empty($colorData['id'])) {
                $color = $material->colors()->find($colorData['id']);
                if ($color) {
                    $color->update([
                        'name' => $colorData['name'] ?? null,
                        'code' => $colorData['code'] ?? null,
                        'required_quantity' => $colorData['required_quantity'] ?? 0,
                        'received_quantity' => $colorData['received_quantity'] ?? 0,
                        'delivery_date' => $colorData['delivery_date'] ?? null,
                    ]);
                    $colorIdsInRequest[] = $color->id;
                }
            } else {
                // جديد
                $newColor = $material->colors()->create([
                    'name' => $colorData['name'] ?? null,
                    'code' => $colorData['code'] ?? null,
                    'required_quantity' => $colorData['required_quantity'] ?? 0,
                    'received_quantity' => $colorData['received_quantity'] ?? 0,
                    'delivery_date' => $colorData['delivery_date'] ?? null,
                ]);
                $colorIdsInRequest[] = $newColor->id;
            }
        }

        // حذف أي لون لم يتم إرساله في الفورم (تم حذفه من الواجهة)
        $material->colors()
            ->whereNotIn('id', $colorIdsInRequest)
            ->delete();

        return redirect()->route('design-materials.index')
            ->with('success', 'تم تحديث الخامة بنجاح');
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

        // لو طلب AJAX رجع JSON
        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        // غير كده redirect عادي
        return redirect()->back()->with('success', 'تم حذف اللون بنجاح');
    }
}
