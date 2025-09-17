<?php


namespace App\Http\Controllers;

use App\Models\EditSession;
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
        $sessions = EditSession::where('status', 'جديد')->latest()->get();

        $refs = $sessions->pluck('reference')->unique()->values();

        // نجمع أسماء المنتجات لكل reference عبر العلاقات الموجودة: color -> product
        $sessionProductsByRef = ShootingSession::with(['color.shootingProduct:id,name'])
            ->whereIn('reference', $refs)
            ->get()
            ->groupBy('reference')
            ->map(function ($group) {
                return $group->map(function ($ss) {
                    return optional(optional($ss->color)->product)->name;
                })
                    ->filter()
                    ->unique()
                    ->values();
            });

        return view(
            'shooting_products.edit_sessions.index',
            compact('sessions', 'sessionProductsByRef')
        );
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
            'drive_link' => 'required|string',
            'note'       => 'nullable|string',
        ]);

        DB::transaction(function () use ($request) {

            // 1) حدِّث سجل الـ EditSession
            EditSession::where('reference', $request->reference)
                ->update([
                    'drive_link' => $request->drive_link,
                    'status'     => 'تم التعديل',
                    'note'       => $request->note,
                ]);

            // 2) هات كل السيشنات اللي ليها نفس الـ reference ومعاها المنتج
            $sessions = ShootingSession::with('color.shootingProduct')
                ->where('reference', $request->reference)
                ->get();

            // IDs المنتجات المشاركة في الـ reference
            $productIds = $sessions->pluck('color.shootingProduct.id')
                ->filter()
                ->unique()
                ->values();

            // (اختياري لكن مُستحب) علِّم السيشنات والألوان لنفس الـ reference completed
            ShootingSession::where('reference', $request->reference)
                ->update(['status' => 'completed', 'updated_at' => now()]);

            $colorIdsInRef = $sessions->pluck('shooting_product_color_id')->unique();
            ShootingProductColor::whereIn('id', $colorIdsInRef)
                ->update(['status' => 'completed', 'updated_at' => now()]);

            // 3) علِّم المنتجات نفسها completed
            if ($productIds->isNotEmpty()) {
                ShootingProduct::whereIn('id', $productIds)
                    ->update(['status' => 'completed', 'updated_at' => now()]);
            }

            // 4) ابعت المنتجات لمسؤول الموقع (لو مش موجودة)
            foreach ($productIds as $pid) {
                $product = ShootingProduct::find($pid);
                if (!$product) continue;

                WebsiteAdminProduct::firstOrCreate(
                    ['shooting_product_id' => $product->id],
                    ['name' => $product->name, 'status' => 'new']
                );
            }
        });

        return back()->with(
            'success',
            auth()->user()->current_lang == 'ar'
                ? 'تم رفع لينك درايف، وتم إنهاء المنتجات الخاصة بهذه الجلسة'
                : 'Drive link uploaded; related products marked completed'
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
