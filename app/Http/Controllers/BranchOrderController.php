<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OpenOrder;

class BranchOrderController extends Controller
{
  public function index()
{
    $userId = Auth::id();

    $openOrder = OpenOrder::where('user_id', $userId)
        ->where('is_opened', 1)
        ->first();

    if ($openOrder) {
        return redirect()->route('branch.order.categories');
    }

    return view('livewire.index');
}

public function create()
{
    $userId = Auth::id();

    $existing = OpenOrder::where('user_id', $userId)
        ->where('is_opened', 1)
        ->first();

    if (!$existing) {
        OpenOrder::create(['user_id' => $userId, 'is_opened' => 1]);
    }

    return redirect()->route('branch.order.categories');
}

public function close()
{
    $userId = Auth::id();

    OpenOrder::where('user_id', $userId)
        ->where('is_opened', 1)
        ->update(['is_opened' => 0]);

    return redirect()->route('branch.orders.index');
}

public function categories()
{
    $categories = \App\Models\CategoryKnowledge::all();
    return view('branches.categories', compact('categories')); // 🟢 اتغير هنا
}

}
