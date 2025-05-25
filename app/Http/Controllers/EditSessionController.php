<?php


namespace App\Http\Controllers;

use App\Models\EditSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditSessionController extends Controller
{
    public function index()
    {
        $sessions = EditSession::latest()->get();
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

        return redirect()->back()->with('success', 'تم تعيين المحرر بنجاح');
    }


    public function uploadDriveLink(Request $request)
    {
        $request->validate([
            'reference' => 'required|string|exists:edit_sessions,reference',
            'drive_link' => 'required|url',
            'note' => 'nullable|string',
        ]);

        EditSession::where('reference', $request->reference)
            ->update([
                'drive_link' => $request->drive_link,
                'status' => 'تم التعديل',
                'note' => $request->note
            ]);

        return redirect()->back()->with('success', 'تم رفع لينك درايف بنجاح');
    }

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
        try{
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

        return redirect()->back()->with('success', 'تم تعيين المحرر للجلسات المختارة بنجاح');
        }catch(\Exception $e){
            dd($e);
        }
    }
}
