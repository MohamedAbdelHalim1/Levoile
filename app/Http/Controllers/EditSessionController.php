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
        ]);

        EditSession::where('reference', $request->reference)
            ->update([
                'drive_link' => $request->drive_link,
                'status' => 'تم التعديل',
            ]);

        return redirect()->back()->with('success', 'تم رفع لينك درايف بنجاح');
    }
}
