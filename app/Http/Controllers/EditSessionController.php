<?php


namespace App\Http\Controllers;

use App\Models\EditSession;
use App\Models\ProductSessionDriveLink;
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
        // السيشنز الجاهزة (زي ما هي)
        $sessions = EditSession::where('status', 'جديد')->latest()->get();

        // هنجمع كل المنتجات لكل reference ونحوّلهم لصفوف منفصلة
        $refs = $sessions->pluck('reference')->unique()->values();

        // نسحب السيشنات ومعاها اللون والمنتج
        $ss = ShootingSession::with(['color.shootingProduct:id,name'])
            ->whereIn('reference', $refs)
            ->get();

        // جدول مساعد: link لكل (reference, product_id) من product_session_drive_links
        $links = ProductSessionDriveLink::whereIn(
            'product_id',
            $ss->pluck('color.shootingProduct.id')->filter()->unique()
        )
            ->get()
            ->groupBy(function ($r) {
                return $r->product_id . '|' . $r->reference;
            });

        // نحضّر العناصر: كل عنصر = صف للجدول (Reference + Product)
        $items = $ss
            ->filter(fn($row) => optional($row->color)->shootingProduct) // فقط اللي ليها منتج
            ->groupBy(fn($row) => $row->reference . '|' . $row->color->shootingProduct->id) // نجمع ألوان نفس المنتج داخل نفس الـreference
            ->map(function ($group) use ($links) {
                $first      = $group->first();
                $reference  = $first->reference;
                $product    = $first->color->shootingProduct;
                $productId  = $product->id;
                $colorCount = $group->pluck('color.color_code')->filter()->unique()->count(); // المميز

                // لينك المنتج لو متخزن في ProductSessionDriveLink
                $lk = optional($links->get($productId . '|' . $reference))[0] ?? null;

                return (object)[
                    'reference'   => $reference,
                    'product_id'  => $productId,
                    'product'     => $product->name,
                    'colors'      => $colorCount > 0 ? $colorCount : $group->count(),
                    'edit_session' => null, // سيبناها لو عايز لاحقًا
                    'drive_link'  => $lk->drive_link ?? null,
                    'receiving_date' => optional($lk)->receiving_date, // لو عندك عمود تاريخ
                ];
            })
            ->values();

        return view('shooting_products.edit_sessions.index', [
            'sessions' => $sessions,           // لسه محتاجينه لباقي الأعمدة الحالية
            'items'    => $items,              // الصفوف الجديدة (Reference+Product)
        ]);
    }



    public function assignEditor(Request $request)
    {
        $request->validate([
            'reference' => 'required|string|exists:edit_sessions,reference',
            'user_id' => 'required|exists:users,id',
            'receiving_date' => 'required|date',

        ]);

        EditSession::where('reference', $request->reference)
            ->update([
                'user_id' => $request->user_id,
                'receiving_date' => $request->receiving_date,
            ]);

        return redirect()->back()->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم تعيين المحرر بنجاح' : 'Editor assigned successfully'
        );
    }


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
            }

            // 4) لو كل ألوان هذا المنتج خلصت، علم المنتج نفسه "completed"
            $allStatuses = ShootingProductColor::where('shooting_product_id', $request->product_id)
                ->pluck('status');

            if ($allStatuses->count() > 0 && $allStatuses->every(fn($st) => $st === 'completed')) {
                ShootingProduct::where('id', $request->product_id)
                    ->update(['status' => 'completed', 'updated_at' => now()]);
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



    // public function uploadDriveLink(Request $request)
    // {
    //     $request->validate([
    //         'reference' => 'required|string|exists:edit_sessions,reference',
    //         'drive_link' => 'required|url',
    //         'note' => 'nullable|string',
    //     ]);

    //     EditSession::where('reference', $request->reference)
    //         ->update([
    //             'drive_link' => $request->drive_link,
    //             'status' => 'تم التعديل',
    //             'note' => $request->note
    //         ]);

    //     return redirect()->back()->with('success', 'تم رفع لينك درايف بنجاح');
    // }

    // public function markReviewed(Request $request)
    // {
    //     $request->validate([
    //         'reference' => 'required|string|exists:edit_sessions,reference',
    //     ]);

    //     EditSession::where('reference', $request->reference)
    //         ->update(['is_reviewed' => 1]);

    //     return redirect()->back()->with('success', 'تم مراجعة الجلسة وتكويدها بنجاح');
    // }

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

    public function assignFromShooting(Request $request)
    {
        $data = $request->validate([
            'reference'      => 'required|string|exists:shooting_sessions,reference',
            'user_id'        => 'required|exists:users,id',
            'receiving_date' => 'required|date',
        ]);

        // لو الـ reference ملوش EditSession، انشئه
        \App\Models\EditSession::updateOrCreate(
            ['reference' => $data['reference']],
            [
                'user_id'        => $data['user_id'],
                'receiving_date' => $data['receiving_date'],
                'status'         => 'جديد', // سيبه “جديد” لحد ما المحرر يرفع اللينك
            ]
        );

        return back()->with(
            'success',
            auth()->user()->current_lang == 'ar'
                ? 'تم تعيين المحرر بنجاح'
                : 'Editor assigned successfully'
        );
    }
}
