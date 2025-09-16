<?php


namespace App\Http\Controllers;

use App\Models\EditSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditSessionController extends Controller
{
    public function index()
    {
        $sessions = EditSession::where('status', 'جديد')->latest()->get();
        return view('shooting_products.edit_sessions.index', compact('sessions'));
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
            'reference' => 'required|string|exists:edit_sessions,reference',
            'drive_link' => 'required|url',
            'note' => 'nullable|string',
        ]);

        // 1. تحديث الـ edit session
        EditSession::where('reference', $request->reference)
            ->update([
                'drive_link' => $request->drive_link,
                'status' => 'تم التعديل',
                'note' => $request->note,
            ]);

        // 2. جلب السيشن
        $shootingSession = \App\Models\ShootingSession::where('reference', $request->reference)->first();

        if ($shootingSession && $shootingSession->color && $shootingSession->color->shootingProduct) {
            $shootingProduct = $shootingSession->color->shootingProduct;

            // 3. إنشاء سجل في جدول مسؤول الموقع لو مش موجود
            \App\Models\WebsiteAdminProduct::firstOrCreate([
                'shooting_product_id' => $shootingProduct->id,
            ], [
                'name' => $shootingProduct->name,
                'status' => 'new', // عدّلها لو في منطق معين
            ]);
        }

        return redirect()->back()->with(
            'success',
            auth()->user()->current_lang == 'ar' ? 'تم رفع لينك درايف بنجاح وتم إرسال المنتج لمسؤول الموقع' : 'Drive link uploaded successfully and product sent to website admin'
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
