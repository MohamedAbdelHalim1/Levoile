<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Factory;
use App\Models\History;
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
            'season',
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
        // if ($request->filled('material')) {
        //     $query->whereHas('material', function ($q) use ($request) {
        //         $q->where('name', $request->material);
        //     });
        // }

        if ($request->filled('season')) {
            $query->whereHas('season', function ($q) use ($request) {
                $q->where('name', $request->season);
            });
        }

        // if ($request->filled('factory')) {
        //     $query->whereHas('factory', function ($q) use ($request) {
        //         $q->where('name', $request->factory);
        //     });
        // }

        if ($request->filled('color')) {
            $query->whereHas('productColors.color', function ($q) use ($request) {
                $q->where('name', $request->color);
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('receiving_status')) {
            $query->where('receiving_status', $request->receiving_status);
        }

        if ($request->filled('variant_status')) {
            $query->whereHas('productColors.productcolorvariants', function ($q) use ($request) {
                $q->where('status', $request->variant_status);
            });
        }


        if ($request->filled('expected_delivery_start') || $request->filled('expected_delivery_end')) {
            $query->whereHas('productColors.productcolorvariants', function ($q) use ($request) {
                if ($request->filled('expected_delivery_start')) {
                    $q->where('status', 'processing')->where('expected_delivery', '>=', $request->expected_delivery_start);
                }
                if ($request->filled('expected_delivery_end')) {
                    $q->where('status', 'processing')->where('expected_delivery', '<=', $request->expected_delivery_end);
                }
            });
        }

        // Fetch the filtered products
        $products = $query->orderBy('created_at', 'desc')->get();

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
        ]);

        return view('products.receive', compact('product'));
    }


    public function manufacture($id)
    {
        $product = Product::with([
            'productColors.color',
            'productColors.productcolorvariants' => function ($query) {
                $query->where('status', '!=', 'new')->orderBy('created_at', 'asc'); // Change 'asc' to 'desc' if needed
            }
        ])->findOrFail($id);

        $materials = Material::all();
        $factories = Factory::all();

        return view('products.manufacture', compact('product', 'materials', 'factories'));
    }


    public function update_manufacture(Request $request, Product $product)
    {
        try {
            DB::beginTransaction();

            // ✅ Store original values before update
            $originalStatus = $product->status;
            $originalReceivingStatus = $product->receiving_status;

            // ✅ Update Product Status to "Processing"
            $product->update([
                'status' => 'processing',
                'receiving_status' => 'pending'
            ]);

            // ✅ Validate color existence
            $productColor = ProductColor::where('product_id', $product->id)
                ->where('id', $request->color_id) // Make sure we get the correct color the user selected
                ->first();

            if (!$productColor) {
                DB::rollBack();
                return response()->json(['error' => "لون المنتج غير موجود"], 400);
            }

            // ✅ Find the latest variant for the exact color the user selected
            $latestVariant = ProductColorVariant::where('product_color_id', $productColor->id)
                ->where('status', 'processing') // Ensure we get an ongoing manufacturing process
                ->latest('created_at')
                ->first();

            // ✅ Assign parent_id to the correct variant or null if none exist
            $parent_id = $latestVariant ? $latestVariant->id : null;

            // ✅ Insert multiple records for manufacturing
            $variants = [];
            foreach ($request->expected_delivery as $index => $expected_delivery) {
                $quantity = $request->quantity[$index] ?? 0;
                $factory_id = $request->factory_id[$index] ?? null;
                $material_id = $request->material_id[$index] ?? null;
                $marker_number = $request->marker_number[$index] ?? null;

                $variant = ProductColorVariant::create([
                    'product_color_id' => $productColor->id,
                    'parent_id' => $parent_id, // ✅ Assign only the correct parent variant
                    'expected_delivery' => $expected_delivery,
                    'quantity' => $quantity,
                    'status' => 'processing',
                    'receiving_status' => 'pending',
                    'factory_id' => $factory_id,
                    'material_id' => $material_id,
                    'marker_number' => $marker_number,
                ]);

                $variants[] = $variant;

                // ✅ Log history for each created variant
                History::create([
                    'product_id' => $product->id,
                    'type' => 'بدء التصنيع',
                    'action_by' => auth()->user()->name,
                    'note' => "تم بدء تصنيع اللون '{$productColor->color->name}' بكمية {$quantity} مع تاريخ استلام متوقع {$expected_delivery}، مصنع: " . ($factory_id ? Factory::find($factory_id)->name : "غير محدد") . "، خامة: " . ($material_id ? Material::find($material_id)->name : "غير محددة") . ".",
                ]);
            }

            // ✅ Log history for product status change (if changed)
            if ($originalStatus !== 'processing') {
                History::create([
                    'product_id' => $product->id,
                    'type' => ' حالة تصنيع المنتج',
                    'action_by' => auth()->user()->name,
                    'note' => "تم تغيير حالة المنتج '{$product->description}' إلى 'جاري التصنيع'.",
                ]);
            }

            DB::commit();

            return redirect()->route('products.manufacture', ['id' => $product->id])->with('success', 'تم بدء تصنيع المنتج بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء بدء التصنيع: ' . $e->getMessage());
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
            dd($e);
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
            'entered_quantity' => 'required|integer',
            'new_expected_delivery' => 'nullable|date',
            'note' => 'required|string|max:512',
        ]);

        try {
            DB::beginTransaction();

            $variant = ProductColorVariant::findOrFail($validated['variant_id']);
            $product = $variant->productcolor->product;

            // ✅ Arabic labels for statuses
            $statusLabels = [
                'new' => 'جديد',
                'processing' => 'جاري التصنيع',
                'partial' => 'استلام جزئي',
                'complete' => 'مكتمل',
                'stop' => 'متوقف',
                'cancel' => 'ملغي',
                'postponed' => 'مؤجل',
                'pending' => 'قيد الانتظار',
            ];

            // ✅ Store original values before update
            $originalStatus = $variant->status;
            $originalReceivingStatus = $variant->receiving_status;
            $originalReceivingQuantity = $variant->receiving_quantity;

            // Handle Rescheduling
            if (!empty($validated['new_expected_delivery'])) {
                // Update the current variant as "Partially Received"
                $variant->receiving_quantity += ($variant->quantity - $validated['remaining_quantity']);
                $variant->note = $request->note;
                $variant->status = 'partial';
                $variant->receiving_status = 'partial';
                $variant->save();

                // Create a new variant for the remaining quantity
                $newVariant = ProductColorVariant::create([
                    'product_color_id' => $variant->product_color_id,
                    'expected_delivery' => $validated['new_expected_delivery'],
                    'quantity' => $validated['remaining_quantity'],
                    'receiving_quantity' => null,
                    'parent_id' => $variant->id,
                    'status' => 'processing',
                    'receiving_status' => 'pending',
                ]);

                // ✅ Log history for rescheduling
                History::create([
                    'product_id' => $product->id,
                    'type' => 'إعادة جدولة',
                    'action_by' => auth()->user()->name,
                    'note' => "تم إعادة جدولة اللون '{$variant->productcolor->color->name}' بكمية متبقية {$validated['remaining_quantity']} وحدة، ليتم استلامها في {$validated['new_expected_delivery']}.",
                ]);
            } else {
                // Fully receive the current variant
                $variant->receiving_quantity = ($validated['entered_quantity'] > $variant->quantity)
                    ? $validated['entered_quantity']
                    : $variant->quantity - $validated['remaining_quantity'];
                $variant->status = 'complete';
                $variant->receiving_status = 'complete';
                $variant->note = $request->note;
                $variant->save();

                // ✅ Update parent variant status to complete if all its children are complete
                if ($variant->parent_id) {
                    $parentVariant = ProductColorVariant::find($variant->parent_id);
                    if ($parentVariant) {
                        // Check if all child variants are complete
                        $allChildrenComplete = $parentVariant->children()->where('status', '!=', 'complete')->count() === 0;

                        if ($allChildrenComplete) {
                            $parentVariant->status = 'complete';
                            $parentVariant->receiving_status = 'complete';
                            $parentVariant->save();
                        }
                    }
                }

                // ✅ Log history for full receiving
                History::create([
                    'product_id' => $product->id,
                    'type' => 'استلام كامل',
                    'action_by' => auth()->user()->name,
                    'note' => "تم استلام اللون '{$variant->productcolor->color->name}' بالكامل بكمية {$variant->receiving_quantity} وحدة.",
                ]);
            }

            $fullyReceivedCount = 0;
            $totalVariants = 0;

            // Loop through product colors and check receiving quantity
            foreach ($product->productColors as $productColor) {
                foreach ($productColor->productcolorvariants as $variant) {
                    $totalVariants++;

                    // If receiving_quantity is equal to or greater than quantity, consider it fully received
                    if ($variant->receiving_quantity >= $variant->quantity) {
                        $fullyReceivedCount++;
                    }
                }
            }

            // If all variants are fully received, mark product as complete
            if ($fullyReceivedCount === $totalVariants && $totalVariants > 0) {
                $product->receiving_status = 'complete';
                $product->status = 'complete';
            } else {
                $product->receiving_status = 'partial';
            }

            $product->save();

            // ✅ Log history for product status update
            $previousStatus = $statusLabels[$originalReceivingStatus] ?? $originalReceivingStatus;
            $newStatus = $statusLabels[$product->receiving_status] ?? $product->receiving_status;

            History::create([
                'product_id' => $product->id,
                'type' => ' حالة الاستلام',
                'action_by' => auth()->user()->name,
                'note' => "تم تغيير حالة استلام المنتج '{$product->description}' من '{$previousStatus}' إلى '{$newStatus}'.",
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'تم وضع علامة على لون المنتج بأنه تم استلامه بنجاح.',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }


    public function updateStatus(Request $request)
    {
        $request->validate([
            'variant_id' => 'required|exists:product_color_variants,id',
            'product_id' => 'required|exists:products,id',
            'status' => 'required|in:stop,cancel,postponed', // Added 'postponed'
            'note' => 'required|string|max:512'
        ]);

        try {
            $variant = ProductColorVariant::findOrFail($request->variant_id);
            $product = Product::findOrFail($request->product_id);

            // Store previous status before updating
            $previousStatus = $variant->status;

            // Update the variant status and note
            $variant->status = $request->status;
            $variant->receiving_status = $request->status;
            $variant->note = $request->note;
            $variant->save();

            // Get total count of variants
            $allVariants = $product->productColors->sum(function ($color) {
                return $color->productcolorvariants->count();
            });

            $affectedVariants = 0;
            $hasCompleteVariant = false;

            foreach ($product->productColors as $productColor) {
                foreach ($productColor->productcolorvariants as $variant) {
                    if (in_array($variant->status, ['stop', 'cancel', 'postponed'])) {
                        $affectedVariants++;
                    }
                    if ($variant->status === 'complete') {
                        $hasCompleteVariant = true; // Check if at least one variant is complete
                    }
                }
            }

            // If all variants are canceled, stopped, or postponed, update the product status
            if ($affectedVariants === $allVariants) {
                $product->status = $request->status;
                $product->receiving_status = $request->status;
            }

            // If at least one variant is complete and the rest are canceled, stopped, or postponed, set product as complete
            if ($hasCompleteVariant && $affectedVariants + 1 === $allVariants) {
                $product->status = 'complete';
                $product->receiving_status = 'complete';
            }

            $product->save();

            // ✅ **History Logging**
            $statusLabels = [
                'stop' => 'متوقف',
                'cancel' => 'ملغي',
                'postponed' => 'مؤجل',
                'complete' => 'مكتمل',
                'new' => 'جديد',
                'partial' => 'جزئي',
                'pending' => 'قيد الانتظار',
                'processing' => 'قيد التصنيع'
            ];

            $statusTextBefore = $statusLabels[$previousStatus] ?? $previousStatus;
            $statusTextAfter = $statusLabels[$request->status] ?? $request->status;

            History::create([
                'product_id' => $product->id,
                'type' => 'تحديث الحالة',
                'action_by' => auth()->user()->name,
                'note' => "تم تغيير حالة لون المنتج من {$statusTextBefore} إلى {$statusTextAfter}. ملاحظات: {$request->note}"
            ]);

            return response()->json(['message' => 'تم تحديث الحالة بنجاح']);
        } catch (\Exception $e) {
            dd($e);
        }
    }



    public function cancel(Product $product)
    {
        try {
            DB::beginTransaction();

            // ✅ Arabic labels for statuses
            $statusLabels = [
                'new' => 'جديد',
                'processing' => 'جاري التصنيع',
                'partial' => 'استلام جزئي',
                'complete' => 'مكتمل',
                'stop' => 'متوقف',
                'cancel' => 'ملغي',
                'postponed' => 'مؤجل',
            ];

            // ✅ Store original values before update
            $originalStatus = $product->status;
            $originalReceivingStatus = $product->receiving_status;

            // ✅ Update product status
            $product->update([
                'status' => 'cancel',
                'receiving_status' => 'cancel',
            ]);

            // ✅ Log history only if the status actually changed
            if ($originalStatus !== 'cancel' || $originalReceivingStatus !== 'cancel') {
                $previousStatus = $statusLabels[$originalStatus] ?? $originalStatus;
                $newStatus = $statusLabels['cancel'];

                History::create([
                    'product_id' => $product->id,
                    'type' => 'إلغاء',
                    'action_by' => auth()->user()->name,
                    'note' => "تم إلغاء المنتج '{$product->description}' من حالة '{$previousStatus}' إلى '{$newStatus}'.",
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'تم الغاء المنتج بنجاح.',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }



    public function renew(Product $product)
    {
        try {
            DB::beginTransaction();

            // ✅ Arabic labels for statuses
            $statusLabels = [
                'new' => 'جديد',
                'processing' => 'جاري التصنيع',
                'partial' => 'استلام جزئي',
                'complete' => 'مكتمل',
                'stop' => 'متوقف',
                'cancel' => 'ملغي',
                'postponed' => 'مؤجل',
            ];

            // ✅ Store original values before update
            $originalStatus = $product->status;
            $originalReceivingStatus = $product->receiving_status;

            // ✅ Update product status
            $product->update([
                'status' => 'new',
                'receiving_status' => 'new',
            ]);

            // ✅ Log history only if the status actually changed
            if ($originalStatus !== 'new' || $originalReceivingStatus !== 'new') {
                $previousStatus = $statusLabels[$originalStatus] ?? $originalStatus;
                $newStatus = $statusLabels['new'];

                History::create([
                    'product_id' => $product->id,
                    'type' => 'تفعيل',
                    'action_by' => auth()->user()->name,
                    'note' => "تم تفعيل المنتج '{$product->description}' من حالة '{$previousStatus}' إلى '{$newStatus}'.",
                ]);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'تم تفعيل المنتج بنجاح.',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }



    public function completeData(Product $product)
    {
        $product->load(['productColors.color', 'category', 'season']);
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

            // ✅ Start transaction
            DB::beginTransaction();

            // ✅ Store original values before update
            $originalValues = $product->getOriginal();

            // ✅ Update product details
            $product->update([
                'name' => $validated['name'],
                'store_launch' => $validated['store_launch'],
                'price' => $validated['price'],
            ]);

            // ✅ Track changes in product details
            $changes = [];
            foreach (['name', 'store_launch', 'price'] as $field) {
                $oldValue = $originalValues[$field] ?? null;
                $newValue = $product->$field;

                if ($oldValue != $newValue) {
                    $oldValueText = $oldValue === null ? "تم الإضافة" : "'$oldValue'";
                    $changes[] = "$field: $oldValueText → '$newValue'";
                }
            }

            // ✅ Update SKU for each color and track changes
            foreach ($validated['colors'] as $colorId => $colorData) {
                $productColor = ProductColor::where('product_id', $product->id)
                    ->where('color_id', $colorId)
                    ->firstOrFail();

                $originalSKU = $productColor->sku ?? null;
                $newSKU = $colorData['sku'] ?? null;

                $productColor->update([
                    'sku' => $newSKU,
                ]);

                // Track SKU changes
                if ($originalSKU != $newSKU) {
                    $colorName = $productColor->color->name ?? 'غير معروف';
                    $oldSkuText = $originalSKU === null ? "تم الإضافة" : "'$originalSKU'";
                    $changes[] = "SKU للون '$colorName': $oldSkuText → '$newSKU'";
                }
            }

            // ✅ Log history entry only if changes exist
            if (!empty($changes)) {
                History::create([
                    'product_id' => $product->id,
                    'type' => 'استكمال البيانات',
                    'action_by' => auth()->user()->name,
                    'note' => "تم اكتمال بيانات المنتج '{$product->description}'. " . implode(", ", $changes),
                ]);
            }

            // ✅ Commit transaction
            DB::commit();

            return redirect()->route('products.index')->with('success', 'تم اكتمال البيانات بنجاح.');
        } catch (\Exception $e) {
            // ❌ Rollback transaction on error
            DB::rollBack();
            dd($e);
        }
    }



    public function create()
    {
        $categories = Category::all();
        $seasons = Season::all();
        $colors = Color::all();
        return view('products.create', compact('categories', 'seasons', 'colors'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'season_id' => 'required|exists:seasons,id',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp,heic|max:2048',
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
                'season_id' => $request->season_id,
                'photo' => $photoPath,
                'code' => $newCode,
                'status' => 'new',
                'receiving_status' => 'new',
            ]);

            // Handle colors and their variants
            $colorNames = [];

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
                        'status' => 'new',
                        'receiving_status' => 'new',
                    ]);
                    $colorNames[] = Color::find($color['color_id'])->name;
                }
            }

            History::create([
                'product_id' => $product->id,
                'type' => 'انشاء',
                'action_by' => auth()->user()->name,
                'note' => "تم انشاء منتج جديد: {$product->description} وبه عدد " . count($colorNames) . " الوان: " . implode(', ', $colorNames)
            ]);

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
                'season',
                'productColors.color',
                'productColors.productcolorvariants' => function ($query) {
                    $query->with(['children'])->orderBy('expected_delivery', 'asc');
                }
            ])->findOrFail($id);

            return view('products.show', compact('product'));
        } catch (\Exception $e) {
            dd($e);
        }
    }



    public function edit($id)
    {
        $product = Product::with(['productColors.color', 'productColors.productcolorvariants'])->findOrFail($id);
        $categories = Category::all();
        $seasons = Season::all();
        $colors = Color::all();

        return view('products.edit', compact('product', 'categories', 'seasons', 'colors'));
    }



    public function update(Request $request, Product $product)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'season_id' => 'required|exists:seasons,id',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,bmp,webp,heic|max:2048',
            ]);

            // ✅ Store original values before update
            $originalValues = $product->getOriginal();

            // ✅ Handle Image Upload
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = time() . '_' . $photo->getClientOriginalName();
                $photoPath = 'images/products/' . $photoName;
                $photo->move(public_path('images/products'), $photoName);

                // Delete old photo if exists
                if ($product->photo && file_exists(public_path($product->photo))) {
                    unlink(public_path($product->photo));
                }

                $product->photo = $photoPath;
            }

            // ✅ Update Product Details
            $product->update([
                'description' => $request->description,
                'category_id' => $request->category_id,
                'season_id' => $request->season_id,

            ]);

            // ✅ Get only changed columns
            $changedFields = $product->getChanges();
            $changeLogs = [];

            foreach ($changedFields as $column => $newValue) {
                if ($column === 'photo') {
                    $changeLogs[] = "تم تحديث الصورة";
                } else {
                    $oldValue = $originalValues[$column] ?? 'لا يوجد قيمة سابقة';
                    $changeLogs[] = "تم تعديل $column من '$oldValue' إلى '$newValue'";
                }
            }

            // ✅ Track Changes in Colors & Variants
            if ($request->has('colors')) {
                foreach ($request->colors as $colorId => $colorData) {
                    $productColor = ProductColor::updateOrCreate(
                        ['product_id' => $product->id, 'color_id' => $colorId]
                    );

                    $variant = ProductColorVariant::where('product_color_id', $productColor->id)->first();
                    if (!$variant) {
                        ProductColorVariant::create([
                            'product_color_id' => $productColor->id,
                            'status' => 'new',
                            'receiving_status' => 'new',
                        ]);
                        $changeLogs[] = "تم إضافة لون جديد";
                    }
                }
            }

            // ✅ Store History Record if Changes Exist
            if (!empty($changeLogs)) {
                History::create([
                    'product_id' => $product->id,
                    'type' => 'تعديل',
                    'action_by' => auth()->user()->name,
                    'note' => implode(', ', $changeLogs)
                ]);
            }

            DB::commit();

            return redirect()->route('products.index')->with('success', 'تم التعديل بنجاح.');
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
            dd($e);
        }
    }

    public function deleteProductColor($id)
    {
        try {
            DB::beginTransaction();

            // ✅ Find the product color and its details before deletion
            $productColor = ProductColor::with('color', 'product')->findOrFail($id);
            $colorName = $productColor->color->name ?? 'غير معروف';
            $productName = $productColor->product->description ?? 'غير معروف';

            // ✅ Delete the product color
            $productColor->delete();

            // ✅ Log history
            History::create([
                'product_id' => $productColor->product_id,
                'type' => 'حذف',
                'action_by' => auth()->user()->name,
                'note' => "تم حذف اللون '$colorName' من المنتج '$productName'"
            ]);

            DB::commit();

            return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح.']);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function history($id)
    {
        $product = Product::findOrFail($id);
        $history = History::where('product_id', $id)->orderBy('created_at', 'desc')->get();

        return view('products.history', compact('product', 'history'));
    }
}
