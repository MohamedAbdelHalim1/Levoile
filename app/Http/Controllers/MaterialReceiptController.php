<?php

namespace App\Http\Controllers;

use App\Models\MaterialRequest;
use App\Models\MaterialRequestItem;
use App\Models\MaterialReceipt;
use App\Models\MaterialReceiptItem;
use App\Models\MaterialActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialReceiptController extends Controller
{
    public function create(MaterialRequest $request)
    {
        $request->load(['material','items.color','items.receiptItems']);
        return view('receipts.create', ['req' => $request]);
    }

    public function store(Request $http, MaterialRequest $request)
    {
        $data = $http->validate([
            'items' => ['required','array'],
            'items.*.id' => ['required','integer','exists:material_request_items,id'],
            'items.*.received_quantity' => ['nullable','numeric','min:0.0001'],
            'items.*.unit' => ['nullable','in:kg,meter'],
            'increase_current' => ['nullable','boolean'],
            'notes' => ['nullable','string','max:500'],
            'partial_policy' => ['nullable','in:complete,split'],
        ]);

        $policy = $data['partial_policy'] ?? null;

        DB::beginTransaction();
        try {
            $receipt = MaterialReceipt::create([
                'request_id' => $request->id,
                'user_id' => optional(auth()->user())->id,
                'increase_current' => !empty($data['increase_current']),
                'notes' => $data['notes'] ?? null,
            ]);

            $createdCount = 0;

            foreach ($data['items'] as $row) {
                $qty  = isset($row['received_quantity']) ? (float)$row['received_quantity'] : null;
                $unit = $row['unit'] ?? null;
                if ($qty === null || $qty <= 0 || !$unit) continue;

                /** @var MaterialRequestItem $item */
                $item = $request->items()->with('color','receiptItems')->findOrFail($row['id']);

                // لا تسمح بالاستلام على بند مكتمل
                if ($item->status === 'complete') {
                    continue;
                }

                $color = $item->color;

                // إدراج سطر الاستلام
                $recItem = MaterialReceiptItem::create([
                    'receipt_id' => $receipt->id,
                    'request_item_id' => $item->id,
                    'design_material_color_id' => $color->id,
                    'quantity' => $qty,
                    'unit' => $unit,
                ]);
                $createdCount++;

                // زيادة المخزون لو مطلوبة
                if ($receipt->increase_current) {
                    if (!$color->unit_of_current_quantity && $unit) {
                        $color->unit_of_current_quantity = $unit;
                    }
                    if ($color->unit_of_current_quantity === $unit) {
                        $color->current_quantity = (float)($color->current_quantity ?? 0) + $qty;
                        $color->save();
                    }
                }

                // حالة/تقسيم البند
                $sumBefore   = $item->receiptItems->sum('quantity'); // قبل ما نضيف السطر الحالي
                $sumAfter    = $sumBefore + $qty;
                $remaining   = max(($item->required_quantity ?? 0) - $sumBefore, 0);

                if ($item->required_quantity !== null && $item->required_quantity > 0) {
                    if ($qty >= $remaining) {
                        // استلام يغطي المتبقي عادي
                        $item->status = 'complete';
                        $item->save();
                    } elseif ($qty < $remaining) {
                        if ($policy === 'complete') {
                            // اعتبره مكتمل بهذه الكمية: قلّل required ليبقى = المستلم فعلاً
                            $item->required_quantity = $sumAfter;
                            $item->status = 'complete';
                            $item->save();
                        } elseif ($policy === 'split') {
                            // اقفل القديم، وأنشئ بند جديد بالباقي
                            $newRemaining = $remaining - $qty;

                            $item->required_quantity = $sumAfter; // يصبح مساوٍ للمستلم
                            $item->status = 'complete';
                            $item->save();

                            MaterialRequestItem::create([
                                'request_id' => $item->request_id,
                                'design_material_color_id' => $item->design_material_color_id,
                                'required_quantity' => $newRemaining,
                                'unit' => $item->unit,
                                'delivery_date' => $item->delivery_date,
                                'status' => 'pending',
                            ]);
                        } else {
                            // الوضع الافتراضي: partial
                            $item->status = 'partial';
                            $item->save();
                        }
                    }
                }

                $this->logActivity(
                    $request->material->id,
                    'receipt_item_created',
                    "تم استلام كمية لبند طلب",
                    $color->id,
                    null,
                    $recItem->only(['id','quantity','unit'])
                );
            }

            if ($createdCount === 0) {
                $receipt->delete();
                DB::rollBack();
                return back()->with('error', __('messages.N/A'));
            }

            // تحديث حالة الطلب ككل
            $counts = $request->items()->selectRaw("
                SUM(CASE WHEN status='complete' THEN 1 ELSE 0 END) as completed,
                COUNT(*) as total,
                SUM(CASE WHEN status='partial' THEN 1 ELSE 0 END) as partials
            ")->first();

            if ($counts->completed == $counts->total) {
                $request->status = 'complete';
            } elseif ($counts->completed > 0 || $counts->partials > 0) {
                $request->status = 'partial';
            } else {
                $request->status = 'open';
            }
            $request->save();

            $this->logActivity(
                $request->material->id,
                'receipt_created',
                "تم إنشاء عملية استلام بها {$createdCount} بند",
                null,
                null,
                $receipt->only(['id','increase_current','notes'])
            );

            DB::commit();
            return redirect()->route('requests.index')->with('success', __('messages.saved_successfully'));
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'خطأ أثناء الاستلام: '.$e->getMessage());
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
