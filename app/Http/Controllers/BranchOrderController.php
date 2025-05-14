<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OpenOrder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    public function closeWithNote(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:open_orders,id',
            'notes' => 'nullable|string',
        ]);

        $order = OpenOrder::where('id', $request->order_id)
            ->where('user_id', auth()->id())
            ->where('is_opened', 1)
            ->firstOrFail();

        $order->update([
            'is_opened' => 0,
            'closed_at' => now(),
            'notes' => $request->notes,
        ]);

        return redirect()->route('branch.orders.index')->with('success', 'تم غلق الطلب بنجاح');
    }


    public function closedSummary($orderId)
    {
        $userId = auth()->id();

        $items = \App\Models\BranchOrderItem::where('user_id', $userId)
            ->where('open_order_id', $orderId)
            ->with('product') // لو في علاقة مع المنتج
            ->get();

        return view('branches.closed-summary', compact('items'));
    }



    public function categories()
    {
        $categories = \App\Models\CategoryKnowledge::all();
        return view('branches.categories', compact('categories')); // 🟢 اتغير هنا
    }

    public function subcategories($categoryId)
    {
        $category = \App\Models\CategoryKnowledge::with(['subcategories' => function ($query) {
            $query->whereNull('parent_id');
        }])->findOrFail($categoryId);

        return view('branches.subcategories', compact('category'));
    }

    public function products(Request $request, $subcategoryId)
    {
        $subcategory = DB::table('subcategory_knowledge')->where('id', $subcategoryId)->first();

        $search = $request->input('search');

        $query = DB::table('product_knowledge')
            ->where('subcategory_knowledge_id', $subcategoryId);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('description', 'like', "%$search%")
                    ->orWhere('gomla', 'like', "%$search%")
                    ->orWhere('product_code', 'like', "%$search%");
            });
        }

        $paginatedProductCodes = $query
            ->select('product_code')
            ->groupBy('product_code')
            ->orderBy('product_code')
            ->paginate(6)
            ->appends(['search' => $search]);

        $productCodes = $paginatedProductCodes->pluck('product_code');

        $userId = Auth::id();
        // ✅ كل الفاريانتس المطلوبة قبل كده
        $requestedItems = DB::table('branch_order_items')
            ->where('user_id', $userId)
            ->pluck('product_knowledge_id')
            ->toArray();

        $allVariants = DB::table('product_knowledge')
            ->where('subcategory_knowledge_id', $subcategoryId)
            ->whereIn('product_code', $productCodes)
            ->select(
                'id',
                'product_code',
                'unit_price',
                'description',
                'gomla',
                'item_family_code',
                'season_code',
                DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:%s') as created_at_excel"),
                'color',
                'size',
                'quantity',
                'no_code',
                'image_url',
                'material',
                'website_description'
            )
            ->orderBy('product_code')
            ->get()
            ->groupBy('product_code');

        return view('branches.products', [
            'subcategory' => $subcategory,
            'products' => $allVariants,
            'pagination' => $paginatedProductCodes,
            'search' => $search,
            'requestedItems' => $requestedItems,
        ]);
    }

    public function saveItems(Request $request)
    {
        try {
            $userId = auth()->id();
            $quantities = $request->input('quantities', []);

            // نجيب الأوردر المفتوح الحالي
            $openOrder = \App\Models\OpenOrder::where('user_id', $userId)
                ->where('is_opened', 1)
                ->latest()
                ->first();

            if (!$openOrder) {
                return back()->with('error', 'لا يوجد طلب مفتوح حاليًا.');
            }

            foreach ($quantities as $productId => $qty) {
                if ($qty && $qty > 0) {
                    \App\Models\BranchOrderItem::create([
                        'user_id' => $userId,
                        'product_knowledge_id' => $productId,
                        'requested_quantity' => $qty,
                        'open_order_id' => $openOrder->id,
                    ]);
                }
            }

            return redirect()->route('branch.orders.history')->with('success', 'تم حفظ الطلب بنجاح');
        } catch (\Throwable $e) {
            return back()->with('error', 'حدث خطأ أثناء حفظ الطلب: ' . $e->getMessage());
        }
    }

    public function adminOrders()
    {
        $orders = \App\Models\BranchOrderItem::with(['product', 'user', 'order'])
            ->orderByDesc('created_at')
            ->get();

        return view('branches.orders', compact('orders'));
    }

    public function myOrders()
    {
        $user = auth()->user();

        $orders = \App\Models\OpenOrder::with(['items.product'])
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();

        return view('branches.my-orders', compact('orders'));
    }
}
