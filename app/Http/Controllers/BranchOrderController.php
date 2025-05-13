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

    public function allUserOrders()
    {
        $user = auth()->user();

        if ($user->role_id == 1) {
            $orders = DB::table('branch_order_items as boi')
                ->join('product_knowledge as pk', 'boi.product_knowledge_id', '=', 'pk.id')
                ->join('users as u', 'boi.user_id', '=', 'u.id')
                ->select(
                    'pk.product_code',
                    'pk.description',
                    'pk.image_url',
                    'pk.website_description',
                    'pk.unit_price',
                    'pk.gomla',
                    'pk.item_family_code',
                    'pk.season_code',
                    'pk.color',
                    'pk.size',
                    'boi.requested_quantity',
                    'boi.created_at',
                    'u.name as user_name'
                )
                ->orderByDesc('boi.created_at')
                ->get();

            return view('branches.orders', compact('orders'));
        }

        // For role_id == 12
        $orders = \App\Models\BranchOrderItem::where('user_id', $user->id)
            ->with('product')
            ->orderByDesc('created_at')
            ->get()
            ->groupBy(function ($item) {
                return $item->created_at->format('Y-m-d');
            });

        $groupedOrders = [];
        $detailedOrders = [];

        foreach ($orders as $date => $items) {
            $orderId = $items->first()->open_order_id ?? rand(1000, 9999); // temporary fallback

            $groupedOrders[] = (object) [
                'date' => $date,
                'product_count' => $items->count(),
                'total_quantity' => $items->sum('requested_quantity'),
                'order_id' => $orderId,
            ];

            $detailedOrders[$orderId] = $items->map(function ($item) {
                return (object)[
                    'product_code' => $item->product->product_code ?? '-',
                    'description' => $item->product->description ?? '-',
                    'requested_quantity' => $item->requested_quantity,
                ];
            });
        }

        return view('branches.orders', [
            'orders' => $user->role_id == 1 ? $orders : collect(), // دا علشان ما يضربش الـ if في الـ blade
            'groupedOrders' => $user->role_id != 1 ? $groupedOrders : [],
            'detailedOrders' => $user->role_id != 1 ? $detailedOrders : [],
        ]);
    }
}
