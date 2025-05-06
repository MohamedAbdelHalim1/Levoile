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

                    // تنسيق التاريخ بأكثر من فورمات
                    $created_at_excel = null;
                    if (!empty($row['Created At'])) {
                        $formats = ['d/m/y H:i:s', 'd/m/Y H:i:s', 'Y-m-d H:i:s'];

                        foreach ($formats as $format) {
                            try {
                                $parsed = Carbon::createFromFormat($format, $row['Created At']);
                                $created_at_excel = $parsed->format('Y-m-d H:i:s');
                                break;
                            } catch (\Exception $e) {
                                continue;
                            }
                        }
                    }

                    ProductKnowledge::create([
                        'subcategory_knowledge_id' => $subcategory->id,
                        'description'            => $row['Description'] ?? null,
                        'gomla'                  => $row['Gomla'] ?? null,
                        'item_family_code'       => $row['Item Family Code'] ?? null,
                        'season_code'            => $row['Season Code'] ?? null,
                        'product_item_code'      => $product_item_code,
                        'color'                  => $row['Color'] ?? null,
                        'size'                   => $row['Size'] ?? null,
                        'created_at_excel'       => $created_at_excel,
                        'unit_price'             => isset($row['Unit Price']) ? (int) $row['Unit Price'] : null,
                        'image_url'              => $row['Column2'] ?? null,
                        'quantity'               => isset($row['quantity']) ? (int) $row['quantity'] : null,
                        'no_code'                => $no,
                        'product_code'           => $product_item_code,
                        'color_code'             => $color_code,
                        'size_code'              => $size_code,
                    ]);
                }
            });

            return redirect()->back()->with('success', 'تم رفع الشيت بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }
}
