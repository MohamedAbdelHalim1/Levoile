<?php


namespace App\Http\Controllers;

use App\Models\EditSession;
use App\Models\ProductSessionDriveLink;
use App\Models\ProductSessionEditor;
use App\Models\ShootingProduct;
use App\Models\ShootingProductColor;
use App\Models\ShootingSession;
use App\Models\WebsiteAdminProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class EditSessionController extends Controller
{



    public function index()
    {
        // زي ما هو:
        $sessions = EditSession::where('status', 'جديد')->latest()->get();
        $refs = $sessions->pluck('reference')->unique()->values();

        $ss = ShootingSession::with(['color.shootingProduct:id,name'])
            ->whereIn('reference', $refs)
            ->get();

        // روابط الDrive لكل (product_id|reference) زي ما كنت عامل:
        $links = ProductSessionDriveLink::whereIn(
            'product_id',
            $ss->pluck('color.shootingProduct.id')->filter()->unique()
        )->get()->groupBy(fn($r) => $r->product_id . '|' . $r->reference);

        // تعيينات المحرر لكل (product_id|reference)
        $assignments = ProductSessionEditor::whereIn('reference', $refs)
            ->get()
            ->keyBy(fn($r) => $r->product_id . '|' . $r->reference);

        $items = $ss->filter(fn($row) => optional($row->color)->shootingProduct)
            ->groupBy(fn($row) => $row->reference . '|' . $row->color->shootingProduct->id)
            ->map(function ($group) use ($links, $assignments) {
                $first      = $group->first();
                $reference  = $first->reference;
                $product    = $first->color->shootingProduct;
                $productId  = $product->id;
                $colorCount = $group->pluck('color.color_code')->filter()->unique()->count();

                $lk  = optional($links->get($productId . '|' . $reference))[0] ?? null;
                $asn = $assignments->get($productId . '|' . $reference);

                return (object)[
                    'reference'       => $reference,
                    'product_id'      => $productId,
                    'product'         => $product->name,
                    'colors'          => $colorCount > 0 ? $colorCount : $group->count(),
                    'drive_link'      => $lk->drive_link ?? null,
                    // البيانات الخاصة بالمحرر *لهذا المنتج داخل نفس السيشن*
                    'editor_user_id'  => optional($asn)->user_id,
                    'editor_name'     => optional(optional($asn)->user)->name,
                    'editor_date'     => optional($asn)->receiving_date,
                    'editor_status'   => $asn->status ?? 'جديد',
                ];
            })
            // ⬅️ هنا السطر المهم: هنسيب بس الصفوف اللي "لسه مرفوعش لها لينك"
            ->filter(fn($row) => empty($row->drive_link))
            ->values();

        return view('shooting_products.edit_sessions.index', compact('sessions', 'items'));
    }


    public function assignProductEditor(Request $request)
    {
        $data = $request->validate([
            'reference'      => 'required|string',
            'product_id'     => 'required|exists:shooting_products,id',
            'user_id'        => 'required|exists:users,id',
            'receiving_date' => 'required|date',
        ]);

        ProductSessionEditor::updateOrCreate(
            ['reference' => $data['reference'], 'product_id' => $data['product_id']],
            ['user_id' => $data['user_id'], 'receiving_date' => $data['receiving_date']]
        );

        return back()->with('success', auth()->user()->current_lang == 'ar' ? 'تم تعيين المحرر لهذا المنتج داخل الجلسة' : 'Editor assigned for this product in the session');
    }



    // public function uploadDriveLink(Request $request)
    // {
    //     $request->validate([
    //         'reference'  => 'required|string|exists:edit_sessions,reference',
    //         'product_id' => 'required|integer|exists:shooting_products,id',
    //         'drive_link' => 'required|string',
    //         'note'       => 'nullable|string',
    //     ]);

    //     DB::transaction(function () use ($request) {

    //         // 1) خزن/حدّث لينك هذا (product_id, reference)
    //         ProductSessionDriveLink::updateOrCreate(
    //             [
    //                 'product_id' => $request->product_id,
    //                 'reference'  => $request->reference,
    //             ],
    //             [
    //                 'drive_link' => $request->drive_link,
    //             ]
    //         );

    //         // 2) ملاحظة على الـ EditSession (اختياري)
    //         EditSession::where('reference', $request->reference)
    //             ->update(['note' => $request->note]);

    //         // 3) علّم السيشنات/الألوان الخاصة بهذا المنتج فقط داخل نفس الـ reference "completed"
    //         $sessions = ShootingSession::with('color.shootingProduct')
    //             ->where('reference', $request->reference)
    //             ->get();

    //         $targetColorIds = $sessions
    //             ->filter(fn($s) => optional($s->color?->shootingProduct)->id == $request->product_id)
    //             ->pluck('shooting_product_color_id')
    //             ->unique()
    //             ->values();

    //         if ($targetColorIds->isNotEmpty()) {
    //             ShootingSession::where('reference', $request->reference)
    //                 ->whereIn('shooting_product_color_id', $targetColorIds)
    //                 ->update(['status' => 'completed', 'updated_at' => now()]);

    //             ShootingProductColor::whereIn('id', $targetColorIds)
    //                 ->update(['status' => 'completed', 'updated_at' => now()]);
    //         }

    //         // 4) لو كل ألوان هذا المنتج خلصت، علم المنتج نفسه "completed"
    //         $allStatuses = ShootingProductColor::where('shooting_product_id', $request->product_id)
    //             ->pluck('status');

    //         // if ($allStatuses->count() > 0 && $allStatuses->every(fn($st) => $st === 'completed')) {
    //         //     ShootingProduct::where('id', $request->product_id)
    //         //         ->update(['status' => 'completed', 'updated_at' => now()]);
    //         // }
    //         if ($allStatuses->count() > 0 && $allStatuses->every(fn($st) => $st === 'completed')) {

    //             ShootingProduct::where('id', $request->product_id)
    //                 ->update(['status' => 'completed', 'updated_at' => now()]);

    //             // ✅ خلي المنتج في ready_to_shoot "مكتمل" + امسح نوع التصوير عشان ينفع يتعاد تاني
    //             \App\Models\ReadyToShoot::where('shooting_product_id', $request->product_id)
    //                 ->update([
    //                     'status' => 'مكتمل',
    //                     'type_of_shooting' => null,
    //                     'updated_at' => now(),
    //                 ]);
    //         }


    //         // 5) لو كل المنتجات داخل نفس الـ reference أصبح لها لينك -> حول EditSession إلى "تم التعديل"
    //         $allProductIdsInRef = $sessions
    //             ->pluck('color.shootingProduct.id')
    //             ->filter()
    //             ->unique();

    //         $linkedProductIds = ProductSessionDriveLink::where('reference', $request->reference)
    //             ->pluck('product_id')
    //             ->unique();

    //         $missing = $allProductIdsInRef->diff($linkedProductIds);

    //         if ($missing->isEmpty()) {
    //             EditSession::where('reference', $request->reference)
    //                 ->update(['status' => 'تم التعديل', 'updated_at' => now()]);
    //         }
    //     });

    //     return back()->with(
    //         'success',
    //         auth()->user()->current_lang == 'ar'
    //             ? 'تم حفظ لينك المنتج داخل الجلسة'
    //             : 'Drive link saved for this product in the session'
    //     );
    // }

    public function uploadDriveLink(Request $request)
    {
        $request->validate([
            'reference'  => 'required|string|exists:edit_sessions,reference',
            'product_id' => 'required|integer|exists:shooting_products,id',
            'drive_link' => 'required|string',
            'note'       => 'nullable|string',
        ]);

        DB::transaction(function () use ($request) {

            // 1) خزن/حدّث لينك هذا (product_id, reference)
            ProductSessionDriveLink::updateOrCreate(
                [
                    'product_id' => $request->product_id,
                    'reference'  => $request->reference,
                ],
                [
                    'drive_link' => $request->drive_link,
                ]
            );

            // 2) ملاحظة على الـ EditSession (اختياري)
            EditSession::where('reference', $request->reference)
                ->update(['note' => $request->note]);

            // 3) علّم السيشنات/الألوان الخاصة بهذا المنتج فقط داخل نفس الـ reference "completed"
            $sessions = ShootingSession::with('color.shootingProduct')
                ->where('reference', $request->reference)
                ->get();

            $targetColorIds = $sessions
                ->filter(fn($s) => optional($s->color?->shootingProduct)->id == $request->product_id)
                ->pluck('shooting_product_color_id')
                ->unique()
                ->values();

            if ($targetColorIds->isNotEmpty()) {

                ShootingSession::where('reference', $request->reference)
                    ->whereIn('shooting_product_color_id', $targetColorIds)
                    ->update(['status' => 'completed', 'updated_at' => now()]);

                ShootingProductColor::whereIn('id', $targetColorIds)
                    ->update(['status' => 'completed', 'updated_at' => now()]);

                // ✅ (تعديل 1) حدّث ready_to_shoot للفاريانتس اللي اتقفلت في الرفع ده فقط
                // افتراض: shooting_product_colors.code == ready_to_shoot.item_no
                $codesInThisUpload = ShootingProductColor::whereIn('id', $targetColorIds)
                    ->pluck('code')
                    ->filter()
                    ->unique()
                    ->values();

                if ($codesInThisUpload->isNotEmpty()) {
                    \App\Models\ReadyToShoot::where('shooting_product_id', $request->product_id)
                        ->whereIn('item_no', $codesInThisUpload)
                        ->update([
                            'status' => 'مكتمل',
                            'type_of_shooting' => null,
                            'updated_at' => now(),
                        ]);
                }
            }

            // 4) لو كل ألوان هذا المنتج خلصت، علم المنتج نفسه "completed"
            // ✅ (تعديل 2) نجيب كل ألوان المنتج (أضمن من pluck على طول)
            $product = ShootingProduct::with('shootingProductColors:id,shooting_product_id,status')
                ->find($request->product_id);

            $allCompleted = $product
                && $product->shootingProductColors->count() > 0
                && $product->shootingProductColors->every(fn($c) => $c->status === 'completed');

            if ($allCompleted) {

                $product->update(['status' => 'completed', 'updated_at' => now()]);

                // ✅ لو المنتج كله اكتمل: خلّي كل صفوفه في ready_to_shoot مكتمل + امسح نوع التصوير
                \App\Models\ReadyToShoot::where('shooting_product_id', $request->product_id)
                    ->update([
                        'status' => 'مكتمل',
                        'type_of_shooting' => null,
                        'updated_at' => now(),
                    ]);
            }

            // 5) لو كل المنتجات داخل نفس الـ reference أصبح لها لينك -> حول EditSession إلى "تم التعديل"
            $allProductIdsInRef = $sessions
                ->pluck('color.shootingProduct.id')
                ->filter()
                ->unique();

            $linkedProductIds = ProductSessionDriveLink::where('reference', $request->reference)
                ->pluck('product_id')
                ->unique();

            $missing = $allProductIdsInRef->diff($linkedProductIds);

            if ($missing->isEmpty()) {
                EditSession::where('reference', $request->reference)
                    ->update(['status' => 'تم التعديل', 'updated_at' => now()]);
            }
        });

        return back()->with(
            'success',
            auth()->user()->current_lang == 'ar'
                ? 'تم حفظ لينك المنتج داخل الجلسة'
                : 'Drive link saved for this product in the session'
        );
    }





    public function bulkAssign(Request $request)
    {
        try {
            $request->validate([
                'references'   => 'required|array',
                'user_id'      => 'required|exists:users,id',
                'common_date'  => 'nullable|date',
                'dates'        => 'nullable|array',
            ]);

            foreach ($request->references as $ref) {
                $session = EditSession::where('reference', $ref)->first();

                if (!$session) continue;

                $session->user_id = $request->user_id;

                if ($request->filled('common_date')) {
                    $session->receiving_date = $request->common_date;
                } elseif (!empty($request->dates[$ref])) {
                    $session->receiving_date = $request->dates[$ref];
                }

                $session->save();
            }

            return redirect()->back()->with(
                'success',
                auth()->user()->current_lang == 'ar' ? 'تم تعيين المحرر للجلسات المختارة بنجاح' : 'Editors assigned successfully'
            );
        } catch (\Exception $e) {
            dd($e);
        }
    }



    public function moveToEditQueue(Request $request)
    {
        $data = $request->validate([
            'reference' => 'required|string|exists:shooting_sessions,reference',
        ]);

        // لو الجلسة مش موجودة في جدول EditSession هنضيفها كـ "جديد"
        // ولو موجودة هنخليها "جديد" برضه ونفك أي تعيين محرر/تاريخ (حسب رغبتك)
        \App\Models\EditSession::updateOrCreate(
            ['reference' => $data['reference']],
            [
                'status'         => 'جديد',
                'user_id'        => null,        // ممكن تسيبهم زي ما هم لو مش عايز تفك التعيين
                'receiving_date' => null,
            ]
        );

        return back()->with(
            'success',
            auth()->user()->current_lang == 'ar'
                ? 'تم نقل الجلسة إلى "جاهز للتعديل"'
                : 'Session moved to Ready-to-Edit'
        );
    }
}
