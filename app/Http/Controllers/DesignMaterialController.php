<?php

namespace App\Http\Controllers;

use App\Models\DesignMaterial;
use App\Models\DesignMaterialColor;
use App\Models\MaterialActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesignMaterialController extends Controller
{
    public function index()
    {
        $materials = DesignMaterial::with('colors')->orderByDesc('id')->get();
        return view('design-materials.index', compact('materials'));
    }

    public function show($id)
    {
        $material = DesignMaterial::with('colors')->findOrFail($id);
        return view('design-materials.show', compact('material'));
    }

    public function create()
    {
        $colors = \App\Models\Color::all();
        return view('design-materials.create', compact('colors'));
    }

    public function activities(DesignMaterial $material)
    {
        $activities = MaterialActivity::with(['user', 'color'])
            ->where('design_material_id', $material->id)
            ->orderBy('id','asc')
            ->paginate(30);

        return view('design-materials.activities', compact('material', 'activities'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $materialData = ['name' => $request->name];

            if ($request->hasFile('image')) {
                $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('images/materials'), $imageName);
                $materialData['image'] = 'images/materials/' . $imageName;
            }

            $material = DesignMaterial::create($materialData);

            $colorCount = 0;
            if ($request->colors && is_array($request->colors)) {
                foreach ($request->colors as $color) {
                    if (
                        empty($color['name']) &&
                        empty($color['code']) &&
                        empty($color['current_quantity']) &&
                        empty($color['unit'])
                    ) continue;

                    $newColor = DesignMaterialColor::create([
                        'design_material_id'       => $material->id,
                        'name'                     => $color['name'] ?? null,
                        'code'                     => $color['code'] ?? null,
                        'current_quantity'         => $color['current_quantity'] ?? 0,
                        'unit_of_current_quantity' => $color['unit'] ?? null,
                        'status'                   => 'new',
                    ]);
                    $colorCount++;

                    $this->logActivity(
                        $material->id,
                        'color_created',
                        "تمت إضافة لون جديد",
                        $newColor->id,
                        null,
                        $newColor->only(['id', 'name', 'code', 'current_quantity', 'unit_of_current_quantity', 'status'])
                    );
                }
            }

            $this->logActivity(
                $material->id,
                'material_created',
                "تم إنشاء خامة جديدة وبها {$colorCount} لون",
                null,
                null,
                $material->only(['id', 'name', 'image'])
            );

            DB::commit();

            return redirect()->route('design-materials.index')->with(
                'success',
                auth()->user()->current_lang == 'ar' ? 'تم إضافة الخامة بنجاح' : 'Material added successfully'
            );
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء الحفظ: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $material   = DesignMaterial::with('colors')->findOrFail($id);
        $colorsList = \App\Models\Color::all();
        return view('design-materials.edit', compact('material', 'colorsList'));
    }

    public function update(Request $request, $id)
    {
        $material = DesignMaterial::with('colors')->findOrFail($id);
        $materialBefore = $material->only(['id', 'name', 'image']);

        $material->name = $request->input('name');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/materials'), $imageName);
            $material->image = 'images/materials/' . $imageName;
        }
        $material->save();

        $inputColors        = $request->input('colors', []);
        $colorIdsInRequest  = [];
        $existingIdsBefore  = $material->colors()->pluck('id')->all();

        foreach ($inputColors as $colorData) {
            if (
                empty($colorData['name']) &&
                empty($colorData['code']) &&
                empty($colorData['current_quantity']) &&
                empty($colorData['unit'])
            ) continue;

            if (!empty($colorData['id'])) {
                $color = $material->colors()->find($colorData['id']);
                if ($color) {
                    $colorBefore = $color->only(['id', 'name', 'code', 'current_quantity', 'unit_of_current_quantity', 'status']);

                    $color->update([
                        'name'                     => $colorData['name'] ?? null,
                        'code'                     => $colorData['code'] ?? null,
                        'current_quantity'         => $colorData['current_quantity'] ?? 0,
                        'unit_of_current_quantity' => $colorData['unit'] ?? null,
                    ]);

                    $colorIdsInRequest[] = $color->id;

                    $colorAfter = $color->only(['id', 'name', 'code', 'current_quantity', 'unit_of_current_quantity', 'status']);

                    if ($colorAfter != $colorBefore) {
                        $this->logActivity(
                            $material->id,
                            'color_updated',
                            "تم تعديل لون",
                            $color->id,
                            $colorBefore,
                            $colorAfter
                        );
                    }
                }
            } else {
                $newColor = $material->colors()->create([
                    'name'                     => $colorData['name'] ?? null,
                    'code'                     => $colorData['code'] ?? null,
                    'current_quantity'         => $colorData['current_quantity'] ?? 0,
                    'unit_of_current_quantity' => $colorData['unit'] ?? null,
                    'status'                   => 'new',
                ]);
                $colorIdsInRequest[] = $newColor->id;

                $this->logActivity(
                    $material->id,
                    'color_created',
                    "تمت إضافة لون جديد",
                    $newColor->id,
                    null,
                    $newColor->only(['id', 'name', 'code', 'current_quantity', 'unit_of_current_quantity', 'status'])
                );
            }
        }

        $deletedIds = array_values(array_diff($existingIdsBefore, $colorIdsInRequest));
        if (!empty($deletedIds)) {
            $deletedColors = $material->colors()->whereIn('id', $deletedIds)->get();
            foreach ($deletedColors as $del) {
                $before = $del->only(['id', 'name', 'code', 'current_quantity', 'unit_of_current_quantity', 'status']);
                $del->delete();

                $this->logActivity(
                    $material->id,
                    'color_deleted',
                    "تم حذف لون",
                    $before['id'] ?? null,
                    $before,
                    null
                );
            }
        }

        $materialAfter = $material->only(['id', 'name', 'image']);
        if ($materialAfter != $materialBefore) {
            $this->logActivity(
                $material->id,
                'material_updated',
                "تم تعديل بيانات الخامة",
                null,
                $materialBefore,
                $materialAfter
            );
        }

        return redirect()->route('design-materials.index')
            ->with('success', auth()->user()->current_lang == 'ar' ? 'تم تحديث الخامة بنجاح' : 'Material updated successfully');
    }

    public function destroy($id)
    {
        $material = DesignMaterial::with('colors')->findOrFail($id);

        $snapshot = [
            'material' => $material->only(['id', 'name', 'image']),
            'colors'   => $material->colors->map->only(['id', 'name', 'code', 'current_quantity', 'unit_of_current_quantity', 'status'])->values()->all(),
        ];

        $material->delete();

        $this->logActivity(
            $snapshot['material']['id'],
            'material_deleted',
            "تم حذف الخامة وجميع الألوان التابعة",
            null,
            $snapshot,
            null
        );

        return redirect()->route('design-materials.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم حذف الخامة بنجاح' : 'Material deleted successfully'
        );
    }

    public function deleteColor($id)
    {
        $color = DesignMaterialColor::findOrFail($id);
        $before = $color->only(['id', 'design_material_id', 'name', 'code', 'current_quantity', 'unit_of_current_quantity', 'status']);
        $materialId = (int) $color->design_material_id;

        $color->delete();

        $this->logActivity(
            $materialId,
            'color_deleted',
            "تم حذف لون",
            $before['id'] ?? null,
            $before,
            null
        );

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back()->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم حذف اللون بنجاح' : 'Color deleted successfully'
        );
    }

    private function logActivity(
        int $materialId,
        string $action,
        ?string $notes = null,
        ?int $colorId = null,
        $before = null,
        $after  = null
    ): void {
        \App\Models\MaterialActivity::create([
            'design_material_id'       => $materialId,
            'design_material_color_id' => $colorId,
            'user_id'                  => optional(auth()->user())->id,
            'action'                   => $action,
            'notes'                    => $notes,
            'before'                   => $before,
            'after'                    => $after,
        ]);
    }
}
