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
            'search' => $search
        ]);
    }
}
