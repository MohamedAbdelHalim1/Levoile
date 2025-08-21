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
        $requests = MaterialRequest::with(['material','items.color'])
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
            'colors' => ['required','array'],
            'colors.*.id' => ['required','integer','exists:design_material_colors,id'],
            'colors.*.required_quantity' => ['nullable','numeric','min:0.0001'],
            'colors.*.unit' => ['nullable','in:kg,meter'],
            'colors.*.delivery_date' => ['nullable','date'],
            'notes' => ['nullable','string','max:500'],
        ]);

        DB::beginTransaction();
        try {
            // هيدر الطلب
            $req = MaterialRequest::create([
                'design_material_id' => $material->id,
                'user_id' => optional(auth()->user())->id,
                'notes' => $data['notes'] ?? null,
                'status' => 'open',
            ]);

            $createdCount = 0;

            foreach ($data['colors'] as $row) {
                $qty  = isset($row['required_quantity']) ? (float)$row['required_quantity'] : null;
                $unit = $row['unit'] ?? null;

                // تجاهل السطر الفاضي
                if ($qty === null || $qty <= 0 || !$unit) {
                    continue;
                }

                $item = MaterialRequestItem::create([
                    'request_id' => $req->id,
                    'design_material_color_id' => (int)$row['id'],
                    'required_quantity' => $qty,
                    'unit' => $unit,
                    'delivery_date' => $row['delivery_date'] ?? null,
                    'status' => 'pending',
                ]);
                $createdCount++;

                $this->logActivity($material->id, 'request_item_created', 'تم إنشاء بند طلب كمية', $item->design_material_color_id, null, $item->only(['id','required_quantity','unit','delivery_date','status']));
            }

            // لو مفيش بنود، هنلغي الهيدر
            if ($createdCount === 0) {
                $req->delete();
                DB::rollBack();
                return back()->with('error', __('messages.N/A'));
            }

            $this->logActivity($material->id, 'request_created', "تم إنشاء طلب جديد به {$createdCount} بند", null, null, $req->only(['id','notes','status']));

            DB::commit();
            return redirect()->route('requests.index')->with('success', __('messages.saved_successfully'));
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'خطأ أثناء إنشاء الطلب: '.$e->getMessage());
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
