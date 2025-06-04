<?php

namespace App\Http\Controllers;

use App\Models\OpenOrder;
use App\Models\ProductKnowledge;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function closePage($orderId)
    {
        $order = \App\Models\OpenOrder::with(['items.product'])->findOrFail($orderId);

        return view('branches.close-order', compact('order'));
    }

    public function closeWithNote(Request $request)
    {
        $order = \App\Models\OpenOrder::findOrFail($request->order_id);
        $order->update([
            'notes' => $request->notes,
            'is_opened' => 0,
            'status' => 'جديد',
            'closed_at' => now(),
        ]);

        return redirect()->route('branch.orders.my')->with('success', 'تم غلق الطلب بنجاح');
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

    // public function products(Request $request, $subcategoryId)
    // {
    //     $subcategory = DB::table('subcategory_knowledge')->where('id', $subcategoryId)->first();

    //     $search = $request->input('search');

    //     $query = DB::table('product_knowledge')
    //         ->where('subcategory_knowledge_id', $subcategoryId);

    //     if ($search) {
    //         $query->where(function ($q) use ($search) {
    //             $q->where('description', 'like', "%$search%")
    //                 ->orWhere('gomla', 'like', "%$search%")
    //                 ->orWhere('no_code', 'like', "%$search%")
    //                 ->orWhere('product_code', 'like', "%$search%");
    //         });
    //     }

    //     $paginatedProductCodes = $query
    //         ->select('product_code')
    //         ->groupBy('product_code')
    //         ->orderBy('product_code')
    //         ->paginate(6)
    //         ->appends(['search' => $search]);

    //     $productCodes = $paginatedProductCodes->pluck('product_code');

    //     $userId = Auth::id();
    //     $requestedItems = DB::table('branch_order_items as boi')
    //         ->join('open_orders as oo', 'boi.open_order_id', '=', 'oo.id')
    //         ->where('boi.user_id', $userId)
    //         ->whereNull('oo.closed_at') // ✅ بس المفتوحين
    //         ->select('boi.product_knowledge_id', DB::raw('SUM(boi.requested_quantity) as requested_quantity'))
    //         ->groupBy('boi.product_knowledge_id')
    //         ->get()
    //         ->keyBy('product_knowledge_id');



    //     $allVariants = DB::table('product_knowledge')
    //         ->where('subcategory_knowledge_id', $subcategoryId)
    //         ->whereIn('product_code', $productCodes)
    //         ->select(
    //             'id',
    //             'product_code',
    //             'unit_price',
    //             'description',
    //             'gomla',
    //             'item_family_code',
    //             'season_code',
    //             DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:%s') as created_at_excel"),
    //             'color',
    //             'size',
    //             'no_code',
    //             'image_url',
    //             'material',
    //             'website_description',

    //         )
    //         ->orderBy('product_code')
    //         ->get()
    //         ->groupBy('product_code');

    //     return view('branches.products', [
    //         'subcategory' => $subcategory,
    //         'products' => $allVariants,
    //         'pagination' => $paginatedProductCodes,
    //         'search' => $search,
    //         'requestedItems' => $requestedItems->toArray(),
    //     ]);
    // }

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
                    ->orWhere('no_code', 'like', "%$search%")
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
        $requestedItems = DB::table('branch_order_items as boi')
            ->join('open_orders as oo', 'boi.open_order_id', '=', 'oo.id')
            ->where('boi.user_id', $userId)
            ->whereNull('oo.closed_at')
            ->select('boi.product_knowledge_id', DB::raw('SUM(boi.requested_quantity) as requested_quantity'))
            ->groupBy('boi.product_knowledge_id')
            ->get()
            ->keyBy('product_knowledge_id');

        DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");


        $allVariants = DB::table('product_knowledge as pk')
            ->leftJoin('product_stock_entries as pq', 'pk.id', '=', 'pq.product_knowledge_id')
            ->where('pk.subcategory_knowledge_id', $subcategoryId)
            ->whereIn('pk.product_code', $productCodes)
            ->select(
                'pk.*',
                DB::raw('GROUP_CONCAT(CONCAT(pq.stock_id, ":", pq.quantity)) as stock_data')
            )
            ->groupBy('pk.id')
            ->orderBy('pk.product_code')
            ->get()
            ->map(function ($item) {
                $item->stock_entries = collect();

                if ($item->stock_data) {
                    $entries = explode(',', $item->stock_data);
                    foreach ($entries as $entry) {
                        [$stock_id, $quantity] = explode(':', $entry);
                        $item->stock_entries->push([
                            'stock_id' => (int) $stock_id,
                            'quantity' => (int) $quantity,
                        ]);
                    }
                }

                unset($item->stock_data);
                return $item;
            })
            ->groupBy('product_code');

        return view('branches.products', [
            'subcategory' => $subcategory,
            'products' => $allVariants,
            'pagination' => $paginatedProductCodes,
            'search' => $search,
            'requestedItems' => $requestedItems->toArray(),
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

            return redirect()->back()->with(
                'success',
                auth()->user()->current_lang == 'ar' ? 'تم حفظ الطلب بنجاح' : 'Order saved successfully'
            );
        } catch (\Throwable $e) {
            return back()->with('error', 'حدث خطأ أثناء حفظ الطلب: ' . $e->getMessage());
        }
    }

    public function adminOrders()
    {
        $orders = \App\Models\OpenOrder::with(['items.product', 'items.user'])
            ->whereHas('user', function ($q) {
                $q->where('role_id', 12);
            })
            ->orderByDesc('id')
            ->get();

        // 🧠 نجمع المنتجات المتكررة داخل نفس الأوردر
        foreach ($orders as $order) {
            $grouped = $order->items
                ->groupBy('product_knowledge_id')
                ->map(function ($items) {
                    $first = $items->first();
                    $first->requested_quantity = $items->sum('requested_quantity');
                    $first->delivered_quantity = $items->sum('delivered_quantity');
                    return $first;
                });

            $order->items = $grouped->values(); // رجعه Collection مرتبة
        }


        return view('branches.orders', compact('orders'));
    }

    public function myOrders()
    {
        $user = auth()->user();

        $orders = \App\Models\OpenOrder::with(['items.product'])
            ->where('user_id', $user->id)
            ->orderByDesc('id')
            ->get();

        return view('branches.my-orders', compact('orders'));
    }


    // public function prepareOrder(Request $request, OpenOrder $order)
    // {
    //     $request->validate([
    //         'excel_file' => 'required|file|mimes:xlsx,xls',
    //     ]);

    //     $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($request->file('excel_file'));
    //     $sheet = $spreadsheet->getActiveSheet();
    //     $rows = $sheet->toArray();

    //     // تجاهل أول صف (العناوين)
    //     array_shift($rows);

    //     $updates = 0;

    //     foreach ($rows as $row) {
    //         $noCode = $row[0] ?? null;
    //         $qty = (int) ($row[1] ?? 0);

    //         if (!$noCode || $qty <= 0) continue;

    //         $product = \App\Models\ProductKnowledge::where('no_code', $noCode)->first();

    //         if ($product) {
    //             $item = $order->items()->where('product_knowledge_id', $product->id)->first();

    //             if ($item) {
    //                 $item->update(['delivered_quantity' => $qty]);
    //                 $updates++;
    //             }
    //         }
    //     }

    //     // لو فيه أي حاجه اتحضرت نغيّر الحالة
    //     if ($updates > 0) {
    //         $order->update(['status' => 'تم التحضير']);
    //     }

    //     return back()->with('success', 'تم رفع ملف التحضير ومعالجة البيانات بنجاح.');
    // }

    public function prepareOrder(Request $request, OpenOrder $order)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls',
        ]);

        $order->load('items.product');

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($request->file('excel_file'));
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        array_shift($rows); // تجاهل العناوين

        $updates = 0;
        $mismatchedCodes = [];

        foreach ($rows as $row) {
            $rawCode = $row[0] ?? '';
            $qty = (int) ($row[1] ?? 0);

            if (empty($rawCode) || $qty <= 0) continue;

            $noCode = is_numeric($rawCode) ? number_format($rawCode, 0, '', '') : trim($rawCode);
            $derivedProductCode = substr($noCode, 2, 6);

            $products = \App\Models\ProductKnowledge::where('no_code', $noCode)->get();

            $matchedProduct = null;
            $item = null;

            foreach ($products as $product) {
                $foundItem = $order->items->firstWhere('product_knowledge_id', $product->id);
                if ($foundItem) {
                    $item = $foundItem;
                    $matchedProduct = $product;
                    break;
                }
            }

            // مطابق تمامًا
            if ($item && $matchedProduct && $matchedProduct->no_code == $noCode) {
                $item->update([
                    'delivered_quantity' => $qty,
                    'receiving_status' => 'مطابق',
                ]);
                $updates++;
                continue;
            }

            // مطابق مع اختلاف الموسم
            $item = $order->items->firstWhere(function ($i) use ($derivedProductCode) {
                return $i->product && $i->product->product_code === $derivedProductCode;
            });

            if ($item) {
                $item->update([
                    'delivered_quantity' => $qty,
                    'receiving_status' => 'مطابق مع اختلاف الموسم',
                ]);
                $updates++;
                continue;
            }

            // غير مطابق
            $mismatchedCodes[] = [
                'no_code' => $noCode,
                'quantity' => $qty,
            ];
        }

        // حفظ الأكواد غير المطابقة
        foreach ($mismatchedCodes as $mismatch) {
            \App\Models\MismatchedProduct::create([
                'open_order_id' => $order->id,
                'no_code' => $mismatch['no_code'],
                'quantity' => $mismatch['quantity'],
            ]);
        }

        // تحديث حالة الأوردر فقط لو فيه أي تعديل
        if ($updates > 0) {
            $order->update([
                'status' => 'تم التحضير',
            ]);
        }

        return back()->with('success', 'تم رفع ملف التحضير ومعالجة البيانات بنجاح.');
    }




    public function showOrder(OpenOrder $order)
    {
        $order->load(['items.product', 'items.user']);

        // تجميع المنتجات المتكررة داخل نفس الأوردر
        $grouped = $order->items
            ->groupBy('product_knowledge_id')
            ->map(function ($items) {
                $first = $items->first();
                $first->requested_quantity = $items->sum('requested_quantity');
                $first->delivered_quantity = $items->sum('delivered_quantity');
                return $first;
            });

        $order->items = $grouped->values();

        // جلب الأكواد غير المطابقة
        $unmatchedItems = DB::table('mismatched_products')
            ->where('open_order_id', $order->id)
            ->get();

        return view('branches.order-details', compact('order', 'unmatchedItems'));
    }
}
