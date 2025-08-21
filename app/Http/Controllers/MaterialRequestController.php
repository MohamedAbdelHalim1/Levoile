<?php

namespace App\Http\Controllers;

use App\Models\DesignMaterial;
use App\Models\DesignMaterialColor;
use App\Models\MaterialRequest;
use App\Models\MaterialRequestItem;
use App\Models\MaterialActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialRequestController extends Controller
{
    public function index()
    {
        $requests = MaterialRequest::with(['material', 'items.color', 'items.receiptItems'])
            ->orderByDesc('id')
            ->paginate(30);

        return view('requests.index', compact('requests'));
    }

    public function create(DesignMaterial $material)
    {
        $material->load('colors');
        return view('requests.create', compact('material'));
    }

    public function store(Request $request, DesignMaterial $material)
    {
        $data = $request->validate([
            'colors' => ['required', 'array'],
            'colors.*.id' => ['required', 'integer', 'exists:design_material_colors,id'],
            'colors.*.required_quantity' => ['nullable', 'numeric', 'min:0.0001'],
            'colors.*.unit' => ['nullable', 'in:kg,meter'],
            'colors.*.delivery_date' => ['nullable', 'date'],
            'notes' => ['nullable', 'string', 'max:500'],
        ]);

        // نجهّز صفوف صالحة فقط (كمية > 0 + وحدة إمّا مختارة أو fallback لوحدة اللون)
        $cleanRows = [];
        foreach ($data['colors'] as $row) {
            $qty = isset($row['required_quantity']) ? (float)$row['required_quantity'] : null;
            if ($qty !== null && $qty > 0) {
                $color = \App\Models\DesignMaterialColor::find($row['id']);
                $unit  = $row['unit'] ?: ($color->unit_of_current_quantity ?? null); // fallback
                if ($unit) {
                    $cleanRows[] = [
                        'color_id' => (int)$row['id'],
                        'qty' => $qty,
                        'unit' => $unit,
                        'delivery_date' => $row['delivery_date'] ?? null,
                    ];
                }
            }
        }

        // لو مفيش صف واحد صالح، ارجع بخطأ واضح
        if (count($cleanRows) === 0) {
            return back()
                ->withErrors(['colors' => 'لازم تدخل كمية ووحدة على الأقل لبند واحد'])
                ->withInput();
        }

        DB::beginTransaction();
        try {
            $req = \App\Models\MaterialRequest::create([
                'design_material_id' => $material->id,
                'user_id' => optional(auth()->user())->id,
                'notes' => $data['notes'] ?? null,
                'status' => 'open',
            ]);

            foreach ($cleanRows as $cr) {
                $item = \App\Models\MaterialRequestItem::create([
                    'request_id' => $req->id,
                    'design_material_color_id' => $cr['color_id'],
                    'required_quantity' => $cr['qty'],
                    'unit' => $cr['unit'],
                    'delivery_date' => $cr['delivery_date'],
                    'status' => 'pending',
                ]);

                $this->logActivity(
                    $material->id,
                    'request_item_created',
                    'تم إنشاء بند طلب كمية',
                    $item->design_material_color_id,
                    null,
                    $item->only(['id', 'required_quantity', 'unit', 'delivery_date', 'status'])
                );
            }

            $this->logActivity(
                $material->id,
                'request_created',
                "تم إنشاء طلب جديد به " . count($cleanRows) . " بند",
                null,
                null,
                $req->only(['id', 'notes', 'status'])
            );

            DB::commit();
            return redirect()->route('requests.index')->with('success', __('messages.saved_successfully'));
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'خطأ أثناء إنشاء الطلب: ' . $e->getMessage());
        }
    }


    private function logActivity(int $materialId, string $action, ?string $notes = null, ?int $colorId = null, $before = null, $after = null): void
    {
        MaterialActivity::create([
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
