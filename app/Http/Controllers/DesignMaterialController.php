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
                    // لو كل القيم فاضية/فاضية ميدخلهاش
                    if (
                        empty($color['name']) &&
                        empty($color['code']) &&
                        empty($color['current_quantity']) &&
                        empty($color['unit'])
                    ) {
                        continue;
                    }
                    $colorData = [
                        'design_material_id'   => $material->id,
                        'name'                 => $color['name'] ?? null,
                        'code'                 => $color['code'] ?? null,
                        'current_quantity'    => $color['current_quantity'] ?? null,
                        'unit_of_current_quantity'    => $color['unit'] ?? null
                    ];
                    DesignMaterialColor::create($colorData);
                    $colorCount++;
                }
            }


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
        $material = DesignMaterial::with('colors')->findOrFail($id);
        $colorsList = \App\Models\Color::all();
        return view('design-materials.edit', compact('material', 'colorsList'));
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
                    $color->update([
                        'name' => $colorData['name'] ?? null,
                        'code' => $colorData['code'] ?? null,
                        'current_quantity' => $colorData['current_quantity'] ?? 0,
                        'unit_of_current_quantity' => $colorData['unit'] ?? null

                    ]);
                    $colorIdsInRequest[] = $color->id;
                }
            } else {
                // جديد
                $newColor = $material->colors()->create([
                    'name' => $colorData['name'] ?? null,
                    'code' => $colorData['code'] ?? null,
                    'current_quantity' => $colorData['current_quantity'] ?? 0,
                    'unit_of_current_quantity' => $colorData['unit'] ?? null
                ]);
                $colorIdsInRequest[] = $newColor->id;
            }
        }


        // حذف أي لون لم يتم إرساله في الفورم (تم حذفه من الواجهة)
        $material->colors()
            ->whereNotIn('id', $colorIdsInRequest)
            ->delete();

        return redirect()->route('design-materials.index')
            ->with(
                'success',
                auth()->user()->current_lang == 'ar' ? 'تم تحديث الخامة بنجاح' : 'Material updated successfully'
            );
    }


    // حذف خامة (يحذف كل ألوانها برضه)
    public function destroy($id)
    {
        $material = DesignMaterial::findOrFail($id);
        $material->delete();
        return redirect()->route('design-materials.index')->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم حذف الخامة بنجاح' : 'Material deleted successfully'
        );
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
        return redirect()->back()->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم حذف اللون بنجاح' : 'Color deleted successfully'
        );
    }


    public function requestForm(DesignMaterial $material)
    {
        $material->load('colors');
        return view('design_materials.request', compact('material'));
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

            $color->required_quantity = $row['required_quantity'] ?? null;
            $color->unit_of_required_quantity = $row['unit_of_required_quantity'] ?? null;
            $color->delivery_date = $row['delivery_date'] ?? null;
            $color->save();
        }

        return redirect()
            ->route('design-materials.index')
            ->with('success', __('messages.saved_successfully'));
    }

    // ---------- استلام كمية ----------
    public function receiveForm(DesignMaterial $material)
    {
        $material->load('colors');
        return view('design_materials.receive', compact('material'));
    }

    public function receiveStore(Request $request, DesignMaterial $material)
    {
        $data = $request->validate([
            'colors' => ['required', 'array'],
            'colors.*.id' => ['required', 'integer', 'exists:design_material_colors,id'],
            'colors.*.received_quantity' => ['nullable', 'numeric'],
            'colors.*.unit_of_received_quantity' => ['nullable', 'in:kg,meter'],
            // اختياري: تاريخ الاستلام
            'colors.*.received_at' => ['nullable', 'date'],
            // اختياري: تزود الكمية الحالية تلقائيًا
            'increase_current' => ['sometimes', 'boolean'],
        ]);

        foreach ($data['colors'] as $row) {
            $color = DesignMaterialColor::where('design_material_id', $material->id)
                ->findOrFail($row['id']);

            $color->received_quantity = $row['received_quantity'] ?? null;
            $color->unit_of_received_quantity = $row['unit_of_received_quantity'] ?? null;

            // لو عاوز تزود current_quantity تلقائيًا (بنفس الوحدة)
            if (!empty($data['increase_current']) && isset($row['received_quantity'])) {
                // لو مفيش وحدة حالية، خُد وحدة الاستلام
                if (!$color->unit_of_current_quantity && !empty($row['unit_of_received_quantity'])) {
                    $color->unit_of_current_quantity = $row['unit_of_received_quantity'];
                }

                // نزود بس لما الوحدتين يبقوا نفس النوع علشان متحولش وحدات بدون لوجيك
                if ($color->unit_of_current_quantity === ($row['unit_of_received_quantity'] ?? null)) {
                    $color->current_quantity = (float)($color->current_quantity ?? 0) + (float)$row['received_quantity'];
                }
            }

            // اختياري: save received_at لو عايزه
            if (!empty($row['received_at'])) {
                // لو عندك عمود received_at أضفه في $fillable وخزّنه هنا
                // $color->received_at = $row['received_at'];
            }

            $color->save();
        }

        return redirect()
            ->route('design-materials.index')
            ->with('success', __('messages.saved_successfully'));
    }
}
