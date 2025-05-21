<?php

namespace App\Http\Controllers;

use App\Models\CategoryKnowledge;
use App\Models\ProductKnowledge;
use App\Models\ProductStockEntry;
use App\Models\SubcategoryKnowledge;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductKnowledgeController extends Controller
{
    public function index()
    {
        $categories = CategoryKnowledge::all();
        return view('product_knowledge.index', compact('categories'));
    }

    public function subcategories($categoryId)
    {
        $category = CategoryKnowledge::with(['subcategories' => function ($q) {
            $q->whereNull('parent_id');
        }])->findOrFail($categoryId);

        return view('product_knowledge.subcategories', compact('category'));
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
    //         ->appends(['search' => $search]); // مهم علشان يحتفظ بالكلمة

    //     $productCodes = $paginatedProductCodes->pluck('product_code');

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
    //             'quantity',
    //             'no_code',
    //             'image_url',
    //             'material',
    //             'website_description',

    //         )
    //         ->orderBy('product_code')
    //         ->get()
    //         ->groupBy('product_code');

    //     return view('product_knowledge.products', [
    //         'subcategory' => $subcategory,
    //         'products' => $allVariants,
    //         'pagination' => $paginatedProductCodes,
    //         'search' => $search
    //     ]);
    // }



    public function products(Request $request, $subcategoryId)
    {
        $subcategory = DB::table('subcategory_knowledge')->where('id', $subcategoryId)->first();

        $search = $request->input('search');

        // 1. نجيب المنتجات بناءً على الكلمة المفتاحية
        $query = ProductKnowledge::query()
            ->where('subcategory_knowledge_id', $subcategoryId);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('description', 'like', "%$search%")
                    ->orWhere('gomla', 'like', "%$search%")
                    ->orWhere('no_code', 'like', "%$search%")
                    ->orWhere('product_code', 'like', "%$search%");
            });
        }

        // 2. نجيب الأكواد فقط عشان نعمل paginate
        $paginatedProductCodes = $query
            ->select('product_code')
            ->groupBy('product_code')
            ->orderBy('product_code')
            ->paginate(6)
            ->appends(['search' => $search]);

        $productCodes = $paginatedProductCodes->pluck('product_code');

        // 3. نجيب كل المنتجات الي ليها الكود ده
        $allVariants = ProductKnowledge::with(['stockEntries.stock', 'subcategory.category'])
            ->where('subcategory_knowledge_id', $subcategoryId)
            ->whereIn('product_code', $productCodes)
            ->orderBy('product_code')
            ->get()
            ->each(function ($variant) {
                $variant->total_quantity = $variant->stockEntries->sum('quantity');
            })
            ->groupBy('product_code');


        return view('product_knowledge.products', [
            'subcategory' => $subcategory,
            'products' => $allVariants,
            'pagination' => $paginatedProductCodes,
            'search' => $search
        ]);
    }




    // public function productList()
    // {
    //     $allVariants = ProductKnowledge::with(['subcategory.category'])
    //         ->orderBy('product_code')
    //         ->get();

    //     // Laravel groupBy
    //     $grouped = $allVariants->groupBy('product_code');

    //     return view('product_knowledge.product-list', [
    //         'products' => $grouped,
    //     ]);
    // }

    public function productList()
    {
        $allVariants = ProductKnowledge::with(['subcategory.category', 'stockEntries.stock'])
            ->orderBy('product_code')
            ->get()
            ->map(function ($item) {
                $item->category_name = $item->subcategory->category->name ?? '-';
                $item->subcategory_name = $item->subcategory->name ?? '-';
                return $item;
            });

        $grouped = $allVariants->groupBy('product_code');

        return view('product_knowledge.product-list', [
            'products' => $grouped,
        ]);
    }



    // public function updateQuantity(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'quantity' => 'required|integer|min:0'
    //     ]);

    //     $product = ProductKnowledge::findOrFail($id);
    //     $product->quantity = $validated['quantity'];
    //     $product->save();

    //     return response()->json(['status' => 'success']);
    // }

    public function updateQuantity(Request $request, $id)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:0',
            'stock_id' => 'required|in:1,2',
        ]);

        $entry = \App\Models\ProductStockEntry::firstOrNew([
            'product_knowledge_id' => $id,
            'stock_id' => $validated['stock_id'],
        ]);

        $entry->quantity = $validated['quantity'];
        $entry->save();

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

    // public function uploadSave(Request $request)
    // {
    //     try {
    //         $data = $request->get('chunk');
    //         //$stockId = $request->input('stock_id', 1); // default = 1


    //         if (empty($data)) {
    //             return response()->json(['status' => 'error', 'message' => 'No data received'], 400);
    //         }

    //         $allCategories = DB::table('category_knowledge')->pluck('id', 'name');
    //         $allSubcategories = DB::table('subcategory_knowledge')
    //             ->select('id', 'name', 'category_knowledge_id')
    //             ->get()
    //             ->groupBy('category_knowledge_id');

    //         DB::transaction(function () use ($data, $allCategories, $allSubcategories) {
    //             foreach ($data as $row) {
    //                 $divisionName = trim($row['Division Code'] ?? '');
    //                 $subcategoryName = trim($row['Item Category Code'] ?? '');
    //                 $retailName = trim($row['Retail Product Code'] ?? '');
    //                 $no = $row['No.'] ?? null;

    //                 if (!$divisionName || !$subcategoryName || empty($no)) {
    //                     throw new \Exception('يوجد خطأ في بيانات الشيت: قيم ناقصة');
    //                 }


    //                 $no = trim($no);
    //                 if (DB::table('product_knowledge')->where('no_code', $no)->exists()) {
    //                     continue; // موجود بالفعل، تجاهله
    //                 }

    //                 $categoryId = $allCategories[$divisionName] ?? null;
    //                 if (!$categoryId) {
    //                     throw new \Exception("يوجد خطأ: التصنيف '{$divisionName}' غير موجود في قاعدة البيانات.");
    //                 }

    //                 $subcat = $allSubcategories[$categoryId]->firstWhere('name', $subcategoryName);
    //                 if (!$subcat) {
    //                     throw new \Exception("يوجد خطأ: الصب كاتيجوري '{$subcategoryName}' غير موجود للتصنيف '{$divisionName}'");
    //                 }

    //                 // ✳️ Check if Retail Product Code (as subcategory) already exists
    //                 if ($retailName && !DB::table('subcategory_knowledge')->where('name', $retailName)->exists()) {
    //                     DB::table('subcategory_knowledge')->insert([
    //                         'name' => $retailName,
    //                         'category_knowledge_id' => $categoryId,
    //                         'parent_id' => $subcat->id,
    //                         'created_at' => now(),
    //                         'updated_at' => now()
    //                     ]);
    //                 }

    //                 $childSubcat = DB::table('subcategory_knowledge')
    //                     ->where('name', $retailName)
    //                     ->where('category_knowledge_id', $categoryId)
    //                     ->first();

    //                 $product_item_code = $row['Vendor Item No.'] ?? substr($no, 2, 6);
    //                 $color_code = substr($no, -5, 3);
    //                 $size_code = substr($no, -2);

    //                 $created_at_excel = !empty($row['Created At']) && is_numeric($row['Created At'])
    //                     ? Carbon::create(1899, 12, 30)->addDays(floatval($row['Created At']))
    //                     : $row['Created At'] ?? null;

    //                 DB::table('product_knowledge')->insert([
    //                     'subcategory_knowledge_id' => $subcat->id,
    //                     'description'              => $row['Description'] ?? null,
    //                     'gomla'                    => $row['Whole Description'] ?? null,
    //                     'website_description'      => $row['Website Description'] ?? null,
    //                     'item_family_code'         => $row['Item Family Code'] ?? null,
    //                     'season_code'              => $row['Season Code'] ?? null,
    //                     'product_item_code'        => $product_item_code,
    //                     'color'                    => $row['Color'] ?? null,
    //                     'material'                 => $row['Material'] ?? null,
    //                     'size'                     => $row['Size'] ?? null,
    //                     'created_at_excel'         => $created_at_excel,
    //                     'unit_price'               => isset($row['Unit Price']) ? (float) $row['Unit Price'] : null,
    //                     'image_url'                => $row['Image'] ?? null,
    //                     'quantity'                 => isset($row['Quantity']) ? (int) $row['Quantity'] : null,
    //                     'no_code'                  => $no,
    //                     'product_code'             => $product_item_code,
    //                     'color_code'               => $color_code,
    //                     'size_code'                => $size_code,
    //                     'created_at'               => now(),
    //                     'updated_at'               => now(),
    //                 ]);
    //             }
    //         });

    //         return response()->json(['status' => 'success']);
    //     } catch (\Exception $e) {
    //         return response()->json(['status' => 'error', 'message' => $e->getMessage()], 200);
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

            $newCount = 0;
            $duplicateCount = 0;
            $duplicateCodes = [];

            DB::transaction(function () use ($data, $allCategories, $allSubcategories, &$newCount, &$duplicateCount, &$duplicateCodes) {
                foreach ($data as $row) {
                    $divisionName = trim($row['Division Code'] ?? '');
                    $subcategoryName = trim($row['Item Category Code'] ?? '');
                    $retailName = trim($row['Retail Product Code'] ?? '');
                    $no = $row['No.'] ?? null;

                    if (!$divisionName || !$subcategoryName || empty($no)) {
                        throw new \Exception('يوجد خطأ في بيانات الشيت: قيم ناقصة');
                    }

                    $no = trim($no);
                    if (DB::table('product_knowledge')->where('no_code', $no)->exists()) {
                        $duplicateCount++;
                        $duplicateCodes[] = [
                            'no_code' => $no,
                            'description' => $row['Description'] ?? '',
                            'color' => $row['Color'] ?? '',
                            'size' => $row['Size'] ?? '',
                            'created_at' => $row['Created At'] ?? '',
                            'division' => $divisionName,
                            'subcategory' => $subcategoryName,
                        ];

                        continue;
                    }

                    $categoryId = $allCategories[$divisionName] ?? null;
                    if (!$categoryId) continue;

                    $subcat = $allSubcategories[$categoryId]->firstWhere('name', $subcategoryName);
                    if (!$subcat) continue;

                    if ($retailName && !DB::table('subcategory_knowledge')->where('name', $retailName)->exists()) {
                        DB::table('subcategory_knowledge')->insert([
                            'name' => $retailName,
                            'category_knowledge_id' => $categoryId,
                            'parent_id' => $subcat->id,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    }

                    $product_item_code = $row['Vendor Item No.'] ?? substr($no, 2, 6);
                    $color_code = substr($no, -5, 3);
                    $size_code = substr($no, -2);
                    $created_at_excel = !empty($row['Created At']) && is_numeric($row['Created At'])
                        ? Carbon::create(1899, 12, 30)->addDays(floatval($row['Created At']))
                        : $row['Created At'] ?? null;

                    DB::table('product_knowledge')->insert([
                        'subcategory_knowledge_id' => $subcat->id,
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
                        'no_code'                  => $no,
                        'product_code'             => $product_item_code,
                        'color_code'               => $color_code,
                        'size_code'                => $size_code,
                        'created_at'               => now(),
                        'updated_at'               => now(),
                    ]);

                    $newCount++;
                }
            });

            // ✅ رجّع البيانات علشان نستخدمها في التقرير
            return response()->json([
                'status' => 'success',
                'new_count' => $newCount,
                'duplicate_count' => $duplicateCount,
                'duplicates' => $duplicateCodes,
                'new_products' => count(collect($data)->unique('product_code')), // عدد المنتجات الفريدة

            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 200);
        }
    }




    public function showStockUpload()
    {
        return view('product_knowledge.stock-upload');
    }



    public function handleStockUpload(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls',
            'stock_id' => 'required|in:1,2',
        ]);

        try {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($request->file('excel_file'));
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();
            array_shift($rows); // تخطي أول صف (العناوين)

            $updated = 0;

            foreach ($rows as $row) {
                $code = trim($row[0] ?? '');
                $qty = (int) ($row[1] ?? 0);

                if (!$code || $qty < 0) continue;

                $product = ProductKnowledge::where('no_code', $code)->first();

                if ($product) {
                    $entry = ProductStockEntry::where('product_knowledge_id', $product->id)
                        ->where('stock_id', $request->stock_id)
                        ->first();

                    if ($entry) {
                        // تحديث الكمية
                        $entry->quantity = $qty;
                        $entry->save();
                    } else {
                        // إنشاء إدخال جديد
                        ProductStockEntry::create([
                            'product_knowledge_id' => $product->id,
                            'stock_id' => $request->stock_id,
                            'quantity' => $qty,
                        ]);
                    }

                    $updated++;
                }
            }

            return redirect()->back()->with('success', "تم تحديث الكمية لـ $updated منتج بنجاح.");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء رفع الملف: ' . $e->getMessage());
        }
    }
}
