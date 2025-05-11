<?php

namespace App\Http\Controllers;

use App\Models\CategoryKnowledge;
use App\Models\SubcategoryKnowledge;
use App\Models\ProductKnowledge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductKnowledgeController extends Controller
{
    public function index()
    {
        $categories = CategoryKnowledge::all();
        return view('product_knowledge.index', compact('categories'));
    }

    public function subcategories($categoryId)
    {
        $category = CategoryKnowledge::with('subcategories')->findOrFail($categoryId);
        return view('product_knowledge.subcategories', compact('category'));
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
            ->appends(['search' => $search]); // مهم علشان يحتفظ بالكلمة

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
                'material'
            )
            ->orderBy('product_code')
            ->get()
            ->groupBy('product_code');

        return view('product_knowledge.products', [
            'subcategory' => $subcategory,
            'products' => $allVariants,
            'pagination' => $paginatedProductCodes,
            'search' => $search
        ]);
    }



    public function productList()
    {
        $allVariants = ProductKnowledge::with(['subcategory.category'])
            ->orderBy('product_code')
            ->get();

        // Laravel groupBy
        $grouped = $allVariants->groupBy('product_code');

        return view('product_knowledge.product-list', [
            'products' => $grouped,
        ]);
    }


    public function updateQuantity(Request $request, $id)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:0'
        ]);

        $product = ProductKnowledge::findOrFail($id);
        $product->quantity = $validated['quantity'];
        $product->save();

        return response()->json(['status' => 'success']);
    }


    public function uploadForm()
    {
        return view('product_knowledge.upload');
    }

    // public function uploadSave(Request $request)
    // {
    //     try {
    //         $data = $request->get('chunk');

    //         if (empty($data)) {
    //             return response()->json(['status' => 'error', 'message' => 'No data received'], 400);
    //         }

    //         DB::transaction(function () use ($data) {
    //             foreach ($data as $row) {
    //                 if (empty($row['No.']) || empty($row['Item Category Code']) || empty($row['Division Code'])) {
    //                     continue;
    //                 }

    //                 $category = CategoryKnowledge::firstOrCreate([
    //                     'name' => $row['Division Code']
    //                 ]);

    //                 $subcategory = SubcategoryKnowledge::firstOrCreate([
    //                     'category_knowledge_id' => $category->id,
    //                     'name' => $row['Item Category Code']
    //                 ]);

    //                 $no = $row['No.'];
    //                 $product_item_code = substr($no, 2, 6);
    //                 $color_code = substr($no, -5, 3);
    //                 $size_code = substr($no, -2);

    //                 // تحويل تاريخ Excel
    //                 $created_at_excel = null;
    //                 if (!empty($row['Created At']) && is_numeric($row['Created At'])) {
    //                     try {
    //                         $created_at_excel = Carbon::create(1899, 12, 30)->addDays(floatval($row['Created At']));
    //                     } catch (\Exception $e) {
    //                         $created_at_excel = null;
    //                     }
    //                 }

    //                 ProductKnowledge::create([
    //                     'subcategory_knowledge_id' => $subcategory->id,
    //                     'description'              => $row['Description'] ?? null,
    //                     'gomla'                    => $row['Gomla'] ?? null,
    //                     'item_family_code'         => $row['Item Family Code'] ?? null,
    //                     'season_code'              => $row['Season Code'] ?? null,
    //                     'product_item_code'        => $product_item_code,
    //                     'color'                    => $row['Color'] ?? null,
    //                     'size'                     => $row['Size'] ?? null,
    //                     'created_at_excel'         => $created_at_excel,
    //                     'unit_price'               => isset($row['Unit Price']) ? (int) $row['Unit Price'] : null,
    //                     'image_url'                => $row['Column2'] ?? null,
    //                     'quantity'                 => isset($row['quantity']) ? (int) $row['quantity'] : null,
    //                     'no_code'                  => $no,
    //                     'product_code'             => $product_item_code,
    //                     'color_code'               => $color_code,
    //                     'size_code'                => $size_code,
    //                 ]);
    //             }
    //         });

    //         return response()->json(['status' => 'success']);
    //     } catch (\Exception $e) {
    //         return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
    //     }
    // }

    public function uploadSave(Request $request)
    {
        try {
            $data = $request->get('chunk');
    
            if (empty($data)) {
                return response()->json(['status' => 'error', 'message' => 'No data received'], 400);
            }
    
            $allCategories = DB::table('category_knowledge')->pluck('id', 'name');
            $allSubcategories = DB::table('subcategory_knowledge')
                ->select('id', 'name', 'category_knowledge_id')
                ->get()
                ->groupBy('category_knowledge_id');
    
            DB::transaction(function () use ($data, $allCategories, $allSubcategories) {
                foreach ($data as $row) {
                    $divisionName = trim($row['Division Code'] ?? '');
                    $subcategoryName = trim($row['Item Category Code'] ?? '');
                    $retailName = trim($row['Retail Product Code'] ?? '');
    
                    if (!$divisionName || !$subcategoryName || empty($row['No.'])) {
                        throw new \Exception('يوجد خطأ في بيانات الشيت: قيم ناقصة');
                    }
    
                    $categoryId = $allCategories[$divisionName] ?? null;
                    if (!$categoryId) {
                        throw new \Exception("يوجد خطأ: التصنيف '{$divisionName}' غير موجود في قاعدة البيانات.");
                    }
    
                    $subcat = $allSubcategories[$categoryId]->firstWhere('name', $subcategoryName);
                    if (!$subcat) {
                        throw new \Exception("يوجد خطأ: الصب كاتيجوري '{$subcategoryName}' غير موجود للتصنيف '{$divisionName}'");
                    }
    
                    // ✳️ Check if Retail Product Code (as subcategory) already exists
                    if ($retailName && !DB::table('subcategory_knowledge')->where('name', $retailName)->exists()) {
                        DB::table('subcategory_knowledge')->insert([
                            'name' => $retailName,
                            'category_knowledge_id' => $categoryId,
                            'parent_id' => $subcat->id,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    }
    
                    $childSubcat = DB::table('subcategory_knowledge')
                        ->where('name', $retailName)
                        ->where('category_knowledge_id', $categoryId)
                        ->first();
    
                    $no = $row['No.'];
                    $product_item_code = $row['Vendor Item No.'] ?? substr($no, 2, 6);
                    $color_code = substr($no, -5, 3);
                    $size_code = substr($no, -2);
    
                    $created_at_excel = !empty($row['Created At']) && is_numeric($row['Created At'])
                        ? Carbon::create(1899, 12, 30)->addDays(floatval($row['Created At']))
                        : $row['Created At'] ?? null;
    
                    DB::table('product_knowledge')->insert([
                        'subcategory_knowledge_id' => $childSubcat?->id ?? $subcat->id,
                        'description'              => $row['Description'] ?? null,
                        'gomla'                    => $row['Whole Description'] ?? null,
                        'website_description'      => $row['Website Description'] ?? null,
                        'item_family_code'         => $row['Item Family Code'] ?? null,
                        'season_code'              => $row['Season Code'] ?? null,
                        'product_item_code'        => $product_item_code,
                        'color'                    => $row['Color'] ?? null,
                        'material'                 => $row['Material'] ?? null,
                        'size'                     => $row['Size'] ?? null,
                        'created_at_excel'         => $created_at_excel,
                        'unit_price'               => isset($row['Unit Price']) ? (float) $row['Unit Price'] : null,
                        'image_url'                => $row['Image'] ?? null,
                        'quantity'                 => isset($row['Quantity']) ? (int) $row['Quantity'] : null,
                        'no_code'                  => $no,
                        'product_code'             => $product_item_code,
                        'color_code'               => $color_code,
                        'size_code'                => $size_code,
                        'created_at'               => now(),
                        'updated_at'               => now(),
                    ]);
                }
            });
    
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 200);
        }
    }
    
}
