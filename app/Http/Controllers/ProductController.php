<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Factory;
use App\Models\Material;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductColorVariant;
use App\Models\ProductSeason;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all unique filterable data
        $categories = Category::all();
        $seasons = Season::all();
        $factories = Factory::all();
        $colors = Color::all();
        $materials = Material::all();

        // Start the query for fetching products
        $query = Product::with([
            'category',
            'material',
            'season',
            'factory',
            'productColors.color',
            'productColors.productcolorvariants' => function ($query) {
                $query->orderBy('expected_delivery', 'asc');
            }
        ]);

        // Apply filters based on user input
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }
        if ($request->filled('material')) {
            $query->whereHas('material', function ($q) use ($request) {
                $q->where('name', $request->material);
            });
        }

        if ($request->filled('season')) {
            $query->whereHas('season', function ($q) use ($request) {
                $q->where('name', $request->season);
            });
        }

        if ($request->filled('factory')) {
            $query->whereHas('factory', function ($q) use ($request) {
                $q->where('name', $request->factory);
            });
        }

        if ($request->filled('color')) {
            $query->whereHas('productColors.color', function ($q) use ($request) {
                $q->where('name', $request->color);
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('expected_delivery_start') || $request->filled('expected_delivery_end')) {
            $query->whereHas('productColors.productcolorvariants', function ($q) use ($request) {
                if ($request->filled('expected_delivery_start')) {
                    $q->where('expected_delivery', '>=', $request->expected_delivery_start);
                }
                if ($request->filled('expected_delivery_end')) {
                    $q->where('expected_delivery', '<=', $request->expected_delivery_end);
                }
            });
        }

        // Fetch the filtered products
        $products = $query->get();

        return view('products.index', compact('products', 'categories', 'seasons', 'factories', 'colors', 'materials'));
    }


    public function receive(Product $product)
    {
        // Eager load necessary relationships, including ProductColorVariants
        $product->load([
            'productColors.color',
            'productColors.productcolorvariants', // Load related variants for each product color
            'category',
            'season',
            'factory'
        ]);

        return view('products.receive', compact('product'));
    }


    public function manufacture($id)
    {
        $product = Product::with([
            'productColors.color',
            'productColors.productcolorvariants'
        ])->findOrFail($id);

        return view('products.manufacture', compact('product'));
    }


    public function update_manufacture(Request $request, Product $product)
    {
        try {
            DB::beginTransaction();
    
            // ✅ Update Product Status to "Processing"
            $product->update([
                'status' => 'processing',
                'receiving_status' => 'Pending'
            ]);
    
            foreach ($request->colors as $colorId => $colorData) {
                // ✅ Ensure the `product_color_id` exists
                $productColor = ProductColor::where('product_id', $product->id)
                    ->where('color_id', $colorId)
                    ->first();
    
                if (!$productColor) {
                    DB::rollBack();
                    return dd('error', "لون المنتج غير موجود: $colorId");
                }
    
                // 🔎 Find the latest variant for this color
                $variant = ProductColorVariant::where('product_color_id', $productColor->id)
                    ->latest()
                    ->first();
    
                if ($variant) {
                    // ✅ Update Existing Variant
                    $variant->update([
                        'expected_delivery' => $colorData['expected_delivery'],
                        'quantity' => $colorData['quantity'],
                        'status' => 'processing',
                        'receiving_status' => 'pending',
                    ]);
                } else {
                    // ✅ Create a New Variant if None Exists
                    ProductColorVariant::create([
                        'product_color_id' => $productColor->id, // ✅ Use the correct `id`
                        'expected_delivery' => $colorData['expected_delivery'],
                        'quantity' => $colorData['quantity'],
                        'status' => 'processing',
                        'receiving_status' => 'pending',
                    ]);
                }
            }
    
            DB::commit();
    
            return redirect()->route('products.index')->with('success', 'تم بدأ تصنيع المنتج بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            dd('error', $e->getMessage());
        }
    }
    



    public function reschedule(Request $request)
    {
        $validated = $request->validate([
            'variant_id' => 'required|exists:product_color_variants,id',
            'receiving_quantity' => 'required|integer|min:1',
            'remaining_quantity' => 'required|integer|min:0',
            'new_expected_delivery' => 'nullable|date',
        ]);



        try {
            // Find the variant
            $variant = ProductColorVariant::findOrFail($validated['variant_id']);

            // Ensure the productcolor relationship is loaded
            if (!$variant->productcolor) {
                throw new \Exception("لا يوجد لون لهذا المنتج");
            }

            // Ensure the product relationship is loaded
            $product = $variant->productcolor->product ?? null;
            if (!$product) {
                throw new \Exception("لا يوجد منتج لهذا اللون");
            }

            // Update receiving quantity
            $variant->receiving_quantity = $validated['receiving_quantity'];
            $variant->save();

            // If there is no remaining quantity, update the product status and return success
            if ($validated['remaining_quantity'] == 0) {
                $this->updateProductStatus($product);

                return response()->json([
                    'status' => 'success',
                    'message' => 'تم استلام الكميه وتعديل الحاله لمكتمل',
                ]);
            }

            // If remaining quantity > 0 and new_expected_delivery is provided, create a new variant
            if ($validated['remaining_quantity'] > 0 && $validated['new_expected_delivery']) {
                ProductColorVariant::create([
                    'product_color_id' => $variant->product_color_id,
                    'expected_delivery' => $validated['new_expected_delivery'],
                    'quantity' => $validated['remaining_quantity'],
                    'receiving_quantity' => null,
                    'parent_id' => $variant->id,
                ]);

                // Update product status
                $this->updateProductStatus($product);

                return response()->json([
                    'status' => 'success',
                    'message' => 'تم اعاده الجدوله بنجاح',
                ]);
            }

            throw new \Exception('Invalid reschedule request. Ensure all inputs are correct.');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    // protected function updateProductStatus(Product $product)
    // {
    //     // Initialize flags to track statuses
    //     $hasNotReceived = false;
    //     $allNotReceived = true;

    //     foreach ($product->productColors as $productColor) {
    //         foreach ($productColor->productcolorvariants as $variant) {
    //             if ($variant->status === 'Not Received') {
    //                 $hasNotReceived = true;
    //             } else {
    //                 $allNotReceived = false; // If one variant is not "Not Received", it's not all
    //             }
    //         }
    //     }

    //     // Determine the product status based on the variants' statuses
    //     if ($allNotReceived) {
    //         $product->status = 'New';
    //     } elseif ($hasNotReceived) {
    //         $product->status = 'Partial';
    //     } else {
    //         $product->status = 'Complete';
    //     }

    //     $product->save();
    // }


    public function markReceived(Request $request)
    {
        $validated = $request->validate([
            'variant_id' => 'required|exists:product_color_variants,id',
            'remaining_quantity' => 'required|integer',
            'new_expected_delivery' => 'nullable|date',
            'note' => 'required|string|max:512',
        ]);

        try {
            $variant = ProductColorVariant::findOrFail($validated['variant_id']);
            $product = $variant->productcolor->product;

            // Handle Rescheduling
            if (!empty($validated['new_expected_delivery'])) {
                // Update the current variant as "Partially Received"
                $variant->receiving_quantity += ($variant->quantity - $validated['remaining_quantity']);
                $variant->note = $request->note;
                $variant->status = 'Partial';
                $variant->receiving_status = 'Partial';
                $variant->save();

                // Create a new variant for the remaining quantity
                ProductColorVariant::create([
                    'product_color_id' => $variant->product_color_id,
                    'expected_delivery' => $validated['new_expected_delivery'],
                    'quantity' => $validated['remaining_quantity'],
                    'receiving_quantity' => null,
                    'parent_id' => $variant->id,
                    'status' => 'Postponed',
                    'receiving_status' => 'Postponed',

                ]);
            } else {
                // Fully receive the current variant
                $variant->receiving_quantity = $variant->quantity - $validated['remaining_quantity'];
                $variant->status = 'complete';
                $variant->receiving_status = 'complete';
                $variant->note = $request->note;
                $variant->save();
            }

            $counter = 0;
            $variantCount = $product->productColors->sum(function ($color) {
                return $color->productcolorvariants->count();
            });
            foreach ($product->productColors as $productColor) {
                foreach ($productColor->productcolorvariants as $variant) {
                    if ($variant->status === 'complete') {
                        $counter++;
                    }
                }
            }

            if ($counter === $variantCount) {
                $product->receving_status = 'Complete';
                $product->status = 'Complete';
                $product->save();
            } else {
                $product->receving_status = 'Partial';
                $product->save();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'تم وضع علامة على لون المنتج بأنه تم استلامه بنجاح.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'variant_id' => 'required|exists:productcolorvariants,id',
            'product_id' => 'required|exists:products,id', // Validate product ID
            'status' => 'required|in:stop,cancel',
            'note' => 'required|string|max:512'
        ]);

        try {
            $variant = ProductColorVariant::findOrFail($request->variant_id);
            $product = Product::findOrFail($request->product_id);

            // Update the variant status and note
            $variant->status = $request->status;
            $variant->note = $request->note;
            $variant->save();

            // Check if all variants of the product are canceled or stopped
            $allVariants = $product->productColors->sum(function ($color) {
                return $color->productcolorvariants->count();
            });

            $canceledOrStopped = 0;
            foreach ($product->productColors as $productColor) {
                foreach ($productColor->productcolorvariants as $variant) {
                    if ($variant->status === 'stop' || $variant->status === 'cancel') {
                        $canceledOrStopped++;
                    }
                }
            }

            // If all variants are either canceled or stopped, update the product status
            if ($canceledOrStopped === $allVariants) {
                $product->status = $request->status; // Make product also "stop" or "cancel"
                $product->receving_status = $request->status;
                $product->save();
            }

            return response()->json(['message' => 'تم تحديث الحالة بنجاح']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }








    public function cancel(Product $product)
    {
        try {
            $product->update(['status' => 'Cancel']);

            return response()->json([
                'status' => 'success',
                'message' => 'تم الغاء المنتج بنجاح.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function renew(Product $product)
    {
        try {
            $product->update(['status' => 'New']);

            return response()->json([
                'status' => 'success',
                'message' => 'تم تفعيل المنتج بنجاح.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function completeData(Product $product)
    {
        $product->load(['productColors.color', 'category', 'season', 'factory']);
        return view('products.complete_data', compact('product'));
    }

    public function submitCompleteData(Request $request, Product $product)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'store_launch' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'colors' => 'required|array',
                'colors.*.sku' => 'nullable|string|max:255',
            ]);

            // Start transaction
            DB::beginTransaction();

            // Update product details
            $product->update([
                'name' => $validated['name'],
                'store_launch' => $validated['store_launch'],
                'price' => $validated['price'],
            ]);

            // Update SKU for each color
            foreach ($validated['colors'] as $colorId => $colorData) {
                $productColor = ProductColor::where('product_id', $product->id)
                    ->where('color_id', $colorId)
                    ->firstOrFail();

                $productColor->update([
                    'sku' => $colorData['sku'] ?? null,
                ]);
            }

            // Commit transaction
            DB::commit();

            return redirect()->route('products.index')->with('success', 'تم اكتمال البيانات بنجاح.');
        } catch (\Exception $e) {
            // Rollback transaction on error
            DB::rollBack();

            // Debugging the error
            dd($e);
        }
    }






    public function create()
    {
        $categories = Category::all();
        $seasons = Season::all();
        $factories = Factory::all();
        $colors = Color::all();
        $materials = Material::all();
        return view('products.create', compact('categories', 'seasons', 'factories', 'colors', 'materials'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'material_id' => 'required|exists:materials,id',
                'season_id' => 'required|exists:seasons,id',
                'factory_id' => 'required|exists:factories,id',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp,heic|max:2048',
                'marker_number' => 'required|string',
                'colors' => 'nullable|array',
                'colors.*.color_id' => 'required|exists:colors,id',
            ]);

            // Start DB Transaction
            DB::beginTransaction();

            // Handle image upload
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = time() . '_' . $photo->getClientOriginalName();
                $photoPath = 'images/products/' . $photoName;
                $photo->move(public_path('images/products'), $photoName);
            }

            // Generate the product code
            $seasonCode = Season::findOrFail($request->season_id)->code;
            $existingCodesCount = Product::where('season_id', $request->season_id)->count();
            $newCode = $seasonCode . '-' . str_pad($existingCodesCount + 1, 3, '0', STR_PAD_LEFT);

            // Determine the product status
            // $status = $request->have_stock ? 'New' : 'Pending';

            // Create the product
            $product = Product::create([
                'description' => $request->description,
                'category_id' => $request->category_id,
                'material_id' => $request->material_id,
                'season_id' => $request->season_id,
                'factory_id' => $request->factory_id,
                'photo' => $photoPath,
                'marker_number' => $request->marker_number,
                'code' => $newCode,
                'status' => 'New',
                'receiving_status' => 'New',
            ]);

            // Handle colors and their variants
            if ($request->has('colors')) {
                foreach ($request->colors as $color) {
                    // Create the ProductColor entry
                    $productColor = ProductColor::create([
                        'product_id' => $product->id,
                        'color_id' => $color['color_id'],
                    ]);

                    // Create the initial ProductColorVariant entry
                    ProductColorVariant::create([
                        'product_color_id' => $productColor->id,
                        'status' => 'New',
                        'receiving_status' => 'New',
                    ]);
                }
            }

            // Commit the transaction
            DB::commit();

            // Redirect with success message
            return redirect()->route('products.index')->with('success', 'تم  الاضافه بنجاح.');
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollBack();
            dd($e);
        }
    }




    public function show($id)
    {
        try {
            $product = Product::with([
                'category',
                'material',
                'season',
                'factory',
                'productColors.color',
                'productColors.productcolorvariants' => function ($query) {
                    $query->with(['children'])->orderBy('expected_delivery', 'asc');
                }
            ])->findOrFail($id);

            return view('products.show', compact('product'));
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Product not found or an error occurred: ' . $e->getMessage());
        }
    }



    public function edit($id)
    {
        $product = Product::with(['productColors.color', 'productColors.productcolorvariants'])->findOrFail($id);
        $categories = Category::all();
        $seasons = Season::all();
        $factories = Factory::all();
        $colors = Color::all();
        $materials = Material::all();

        return view('products.edit', compact('product', 'categories', 'seasons', 'factories', 'colors', 'materials'));
    }



    public function update(Request $request, Product $product)
    {
        try {
            $request->validate([
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'material_id' => 'required|exists:materials,id',
                'season_id' => 'required|exists:seasons,id',
                'factory_id' => 'required|exists:factories,id',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp,heic|max:2048',
                'marker_number' => 'required|string',
                'have_stock' => 'required|boolean',
            ]);

            DB::beginTransaction();

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = time() . '_' . $photo->getClientOriginalName();
                $photoPath = 'images/products/' . $photoName;
                $photo->move(public_path('images/products'), $photoName);

                if ($product->photo && file_exists(public_path($product->photo))) {
                    unlink(public_path($product->photo));
                }

                $product->photo = $photoPath;
            }

            $status = $product->status;
            if ($request->have_stock) {
                $status = 'New';
            } else {
                $status = 'Pending';
            }

            $product->update([
                'description' => $request->description,
                'category_id' => $request->category_id,
                'material_id' => $request->material_id,
                'season_id' => $request->season_id,
                'factory_id' => $request->factory_id,
                'photo' => $product->photo,
                'have_stock' => $request->have_stock,
                'marker_number' => $request->marker_number,
                'status' => $status
            ]);

            if ($request->has('colors')) {
                foreach ($request->colors as $colorId => $colorData) {
                    $productColor = ProductColor::updateOrCreate(
                        [
                            'product_id' => $product->id,
                            'color_id' => $colorId,
                        ]
                    );

                    ProductColorVariant::updateOrCreate(
                        [
                            'product_color_id' => $productColor->id,
                        ],
                        [
                            'expected_delivery' => $colorData['expected_delivery'],
                            'quantity' => $colorData['quantity'],
                        ]
                    );
                }
            }

            DB::commit();

            return redirect()->route('products.edit', $product->id)->with('success', 'تم التعديل بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }





    public function destroy($id)
    {
        try {
            // Find the product by ID
            $product = Product::findOrFail($id);

            // Delete the associated image from the public directory
            if ($product->photo && file_exists(public_path($product->photo))) {
                unlink(public_path($product->photo));
            }

            // Delete the product from the database
            $product->delete();

            return redirect()->route('products.index')->with('success', 'تم الحذف بنجاح');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function deleteProductColor($id)
    {
        try {
            $productColor = ProductColor::findOrFail($id);
            $productColor->delete();

            return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
