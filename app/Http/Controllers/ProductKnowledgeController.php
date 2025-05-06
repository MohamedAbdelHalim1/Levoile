<?php

namespace App\Http\Controllers;

use App\Models\CategoryKnowledge;
use App\Models\SubcategoryKnowledge;
use App\Models\ProductKnowledge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductKnowledgeController extends Controller
{
    public function index()
    {
        return view('product_knowledge.index');
    }

    public function uploadForm()
    {
        return view('product_knowledge.upload');
    }


    public function uploadSave(Request $request)
    {
        try {
            $data = $request->get('chunk');

            if (empty($data)) {
                return response()->json(['status' => 'error', 'message' => 'No data received'], 400);
            }

            DB::transaction(function () use ($data) {
                foreach ($data as $row) {
                    if (empty($row['No.']) || empty($row['Item Category Code']) || empty($row['Division Code'])) {
                        continue;
                    }

                    $category = CategoryKnowledge::firstOrCreate([
                        'name' => $row['Division Code']
                    ]);

                    $subcategory = SubcategoryKnowledge::firstOrCreate([
                        'category_knowledge_id' => $category->id,
                        'name' => $row['Item Category Code']
                    ]);

                    $no = $row['No.'];

                    $product_item_code = substr($no, 2, 6);
                    $color_code = substr($no, -5, 3);
                    $size_code = substr($no, -2);

                    ProductKnowledge::create([
                        'subcategory_knowledge_id' => $subcategory->id,
                        'description' => $row['Description'] ?? null,
                        'gomla' => $row['Gomla'] ?? null,
                        'item_family_code' => $row['Item Family Code'] ?? null,
                        'season_code' => $row['Season Code'] ?? null,
                        'product_item_code' => $product_item_code,
                        'color' => $row['Color'] ?? null,
                        'size' => $row['Size'] ?? null,
                        'created_at_excel' => $row['Created At'] ?? now(),
                        'unit_price' => $row['Unit Price'] ?? 0,
                        'image_url' => $row['Column2'] ?? null,
                        'quantity' => $row['quantity'] ?? 0,
                        'no_code' => $no,
                        'product_code' => $product_item_code,
                        'color_code' => $color_code,
                        'size_code' => $size_code,
                    ]);
                }
            });

            return response()->json(['status' => 'success', 'message' => 'تم رفع الشيت بنجاح']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
