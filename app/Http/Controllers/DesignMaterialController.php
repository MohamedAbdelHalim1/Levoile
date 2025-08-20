<?php

namespace App\Http\Controllers;

use App\Models\DesignMaterial;
use App\Models\DesignMaterialColor;
use App\Models\MaterialActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesignMaterialController extends Controller
{
    // قائمة كل الخامات
    public function index()
    {
        $materials = DesignMaterial::with('colors')->orderBy('id', 'desc')->get();
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
        $colors = \App\Models\Color::all();
        return view('design-materials.create', compact('colors'));
    }


    public function activities(DesignMaterial $material)
    {
        $activities = MaterialActivity::with(['user', 'color'])
            ->where('design_material_id', $material->id)
            ->orderByAsc('id')
            ->paginate(30);

        return view('design-materials.activities', compact('material', 'activities'));
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

            $colorCount = 0;

            // إضافة الألوان فقط لو فيها بيانات
            if ($request->colors && is_array($request->colors)) {
                foreach ($request->colors as $color) {
                    if (
                        empty($color['name']) &&
                        empty($color['code']) &&
                        empty($color['current_quantity']) &&
                        empty($color['unit'])
                    ) {
                        continue;
                    }

                    $colorData = [
                        'design_material_id'        => $material->id,
                        'name'                      => $color['name'] ?? null,
                        'code'                      => $color['code'] ?? null,
                        'current_quantity'          => $color['current_quantity'] ?? null,
                        'unit_of_current_quantity'  => $color['unit'] ?? null,
                        'status'                    => 'new',
                    ];
                    $newColor = DesignMaterialColor::create($colorData);
                    $colorCount++;

                    // Log: color created
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

            // Log: material created
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
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء الحفظ: ' . $e->getMessage());
        }
    }

    // شاشة تعديل الخامة وكل ألوانها (نفس شاشة الإنشاء)
    public function edit($id)
    {
        $material   = DesignMaterial::with('colors')->findOrFail($id);
        $colorsList = \App\Models\Color::all();
        return view('design-materials.edit', compact('material', 'colorsList'));
    }

    // تعديل خامة وكل ألوانها (إضافة، تحديث، حذف)
    public function update(Request $request, $id)
    {
        $material = DesignMaterial::with('colors')->findOrFail($id);
        $materialBefore = $material->only(['id', 'name', 'image']);

        // تحديث بيانات الخامة الأساسية
        $material->name = $request->input('name');

        // حفظ الصورة لو تم رفعها
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/materials'), $imageName);
            $material->image = 'images/materials/' . $imageName;
        }
        $material->save();

        // تحديث أو إضافة الألوان
        $inputColors        = $request->input('colors', []);
        $colorIdsInRequest  = [];
        $existingIdsBefore  = $material->colors()->pluck('id')->all();

        foreach ($inputColors as $colorData) {
            // لو كل الأعمدة فاضية أو مش متدخلة، كمل
            if (
                empty($colorData['name']) &&
                empty($colorData['code']) &&
                empty($colorData['current_quantity']) &&
                empty($colorData['unit'])
            ) {
                continue;
            }

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

                    // لو حصل تغيير فعلي، سجّل
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
                // جديد
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

        // ألوان اتشالت من الفورم → حذف + لوج
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
            ->with(
                'success',
                auth()->user()->current_lang == 'ar' ? 'تم تحديث الخامة بنجاح' : 'Material updated successfully'
            );
    }

    // حذف خامة (يحذف كل ألوانها برضه)
    public function destroy($id)
    {
        $material = DesignMaterial::with('colors')->findOrFail($id);

        $snapshot = [
            'material' => $material->only(['id', 'name', 'image']),
            'colors'   => $material->colors->map->only(['id', 'name', 'code', 'current_quantity', 'unit_of_current_quantity', 'status'])->values()->all(),
        ];

        $material->delete();

        // Log: material deleted (بسناب شوت قبل الحذف)
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

    // حذف لون واحد (AJAX)
    public function deleteColor($id)
    {
        $color = DesignMaterialColor::findOrFail($id);
        $before = $color->only(['id', 'design_material_id', 'name', 'code', 'current_quantity', 'unit_of_current_quantity', 'status']);
        $materialId = (int) $color->design_material_id;

        $color->delete();

        // Log: color deleted
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

    // ---------- طلب كمية ----------
    public function requestForm(DesignMaterial $material)
    {
        $material->load('colors');
        return view('design-materials.request', compact('material'));
    }

    public function requestStore(Request $request, DesignMaterial $material)
    {
        $data = $request->validate([
            'colors' => ['required', 'array'],
            'colors.*.id' => ['required', 'integer', 'exists:design_material_colors,id'],
            'colors.*.required_quantity' => ['nullable', 'numeric'],
            'colors.*.unit_of_required_quantity' => ['nullable', 'in:kg,meter'],
            'colors.*.delivery_date' => ['nullable', 'date'],
        ]);

        foreach ($data['colors'] as $row) {
            /** @var DesignMaterialColor $color */
            $color = DesignMaterialColor::where('design_material_id', $material->id)
                ->findOrFail($row['id']);

            $before = $color->only([
                'id',
                'name',
                'code',
                'required_quantity',
                'unit_of_required_quantity',
                'delivery_date',
                'status'
            ]);

            $color->required_quantity          = $row['required_quantity'] ?? null;
            $color->unit_of_required_quantity  = $row['unit_of_required_quantity'] ?? null;
            $color->delivery_date              = $row['delivery_date'] ?? null;
            $color->status                     = "ask_for_quantity";
            $color->save();

            $after = $color->only([
                'id',
                'name',
                'code',
                'required_quantity',
                'unit_of_required_quantity',
                'delivery_date',
                'status'
            ]);

            $this->logActivity(
                $material->id,
                'required_quantity_set',
                "تم تسجيل الكمية المطلوبة للون",
                $color->id,
                $before,
                $after
            );
        }

        return redirect()
            ->route('design-materials.index')
            ->with('success', __('messages.saved_successfully'));
    }

    // ---------- استلام كمية ----------
    public function receiveForm(DesignMaterial $material)
    {
        $material->load('colors');
        return view('design-materials.receive', compact('material'));
    }

    public function receiveStore(Request $request, DesignMaterial $material)
    {
        $data = $request->validate([
            'colors' => ['required', 'array'],
            'colors.*.id' => ['required', 'integer', 'exists:design_material_colors,id'],
            'colors.*.received_quantity' => ['nullable', 'numeric'],
            'colors.*.unit_of_received_quantity' => ['nullable', 'in:kg,meter'],
            'colors.*.received_at' => ['nullable', 'date'],
            'increase_current' => ['nullable', 'boolean'],
        ]);

        foreach ($data['colors'] as $row) {
            $color = DesignMaterialColor::where('design_material_id', $material->id)
                ->findOrFail($row['id']);

            $before = $color->only([
                'id',
                'name',
                'code',
                'received_quantity',
                'unit_of_received_quantity',
                'current_quantity',
                'unit_of_current_quantity',
                'required_quantity',
                'unit_of_required_quantity',
                'status'
            ]);

            $rec      = isset($row['received_quantity']) ? (float)$row['received_quantity'] : null;
            $rec_unit = $row['unit_of_received_quantity'] ?? null;

            // حفظ بيانات الاستلام
            $color->received_quantity         = $rec;
            $color->unit_of_received_quantity = $rec_unit;

            // تحديث current_quantity تلقائيًا لو تم تفعيل الزيادة
            if (!empty($data['increase_current']) && $rec !== null && $rec > 0) {
                if (!$color->unit_of_current_quantity && $rec_unit) {
                    $color->unit_of_current_quantity = $rec_unit;
                }

                if ($color->unit_of_current_quantity === $rec_unit) {
                    $color->current_quantity = (float)($color->current_quantity ?? 0) + $rec;
                }
            }

            // تحديد status
            $req      = isset($color->required_quantity) ? (float)$color->required_quantity : null;
            $req_unit = $color->unit_of_required_quantity;

            if ($rec !== null && $rec > 0) {
                $units_match = !$req_unit || !$rec_unit || $req_unit === $rec_unit;

                if ($units_match) {
                    if ($req !== null && $req > 0) {
                        $color->status = ($rec >= $req) ? 'complete_receive' : 'partial_receive';
                    } else {
                        $color->status = 'complete_receive';
                    }
                }
            }

            // لو حابب تضيف تاريخ استلام
            if (!empty($row['received_at'])) {
                // $color->received_at = $row['received_at'];
            }

            $color->save();

            $after = $color->only([
                'id',
                'name',
                'code',
                'received_quantity',
                'unit_of_received_quantity',
                'current_quantity',
                'unit_of_current_quantity',
                'required_quantity',
                'unit_of_required_quantity',
                'status'
            ]);

            $this->logActivity(
                $material->id,
                'quantity_received',
                "تم استلام كمية للون",
                $color->id,
                $before,
                $after
            );
        }

        return redirect()
            ->route('design-materials.index')
            ->with('success', __('messages.saved_successfully'));
    }

    /* ==================== Helper: ORM logger ==================== */
    private function logActivity(
        int $materialId,
        string $action,
        ?string $notes = null,
        ?int $colorId = null,
        $before = null,
        $after  = null
    ): void {
        MaterialActivity::create([
            'design_material_id'       => $materialId,
            'design_material_color_id' => $colorId,
            'user_id'                  => optional(auth()->user())->id,
            'action'                   => $action,
            'notes'                    => $notes,
            'before'                   => $before,   // هتتخزن JSON تلقائيًا لو عامل cast في الموديل
            'after'                    => $after,    // نفس الكلام
        ]);
    }
}
