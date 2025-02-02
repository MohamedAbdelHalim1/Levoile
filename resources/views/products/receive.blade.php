@extends('layouts.app')

@section('styles')
    <style>
        .product-image {
            max-width: 150px;
            height: auto;
            float: left;
        }

        .product-details {
            margin-left: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .key-value {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .key-value span {
            font-weight: bold;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .validate-btn {
            margin-top: 5px;
        }

        .status-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 16px;
            padding: 5px 10px;
            border-radius: 10px;
            margin-top: 35px;
            margin-right: 35px;
        }

        .status-complete {
            background-color: #28a745;
            color: white;
        }

        .status-partial {
            background-color: #ffc107;
            color: black;
        }

        .status-new {
            background-color: #6735dc;
            color: white;
        }


        /* CSS for Print */
        @media print {

            .btn,
            .action-column {
                /* Hide print button and action column */
                display: none !important;
            }

            .product-details,
            .table {
                page-break-inside: avoid;
                /* Prevent splitting content across pages */
            }

            .status-badge {
                display: none !important;
                /* Hide floating badge */
            }
        }
    </style>
@endsection

@section('content')
    <div class="p-4 position-relative">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
                <button class="btn btn-primary" onclick="window.print()" style="float: right;">طباعه</button>

                <div>
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            @if ($product->photo)
                                <img src="{{ asset($product->photo) }}" alt="Product Image" class="product-image m-3">
                            @endif
                            <div class="product-details">
                                <div class="key-value"><span>الكود:</span> <span>{{ $product->code ?? 'لا يوجد' }}</span>
                                </div>
                                <div class="key-value"><span>الوصف:</span>
                                    <span>{{ $product->description ?? 'لا يوجد' }}</span>
                                </div>
                                <div class="key-value">
                                    <span>القسم:</span><span>{{ $product->category->name ?? 'لا يوجد' }}</span>
                                </div>
                                <div class="key-value">
                                    <span>الخامه:</span><span>{{ $product->material->name ?? 'لا يوجد' }}</span>
                                </div>
                                <div class="key-value">
                                    <span>الموسم:</span><span>{{ $product->season->name ?? 'لا يوجد' }}</span>
                                </div>
                                <div class="key-value">
                                    <span>المصنع:</span><span>{{ $product->factory->name ?? 'لا يوجد' }}</span>
                                </div>
                                <div class="key-value">
                                    <span>الحالة:</span>
                                    <span
                                        class="badge
                                        @if ($product->status === 'Complete') bg-success
                                        @elseif ($product->status === 'Partial') bg-warning
                                        @else bg-primary @endif">
                                        {{ $product->status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h2>الالوان</h2>
                    @if ($product->productColors->isEmpty())
                        <p>لا يوجد ألوان لهذا المنتج</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>اللون</th>
                                        <th>تاريخ التوصيل</th>
                                        <th>الكمية</th>
                                        <th>الكمية المستلمة</th>
                                        <th>الحالة</th>
                                        <th class="action-column">العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->productColors as $productColor)
                                        @foreach ($productColor->productcolorvariants as $variant)
                                            <tr>
                                                <td>{{ $productColor->color->name ?? 'لا يوجد لون' }}</td>
                                                <td>{{ $variant->expected_delivery ?? 'لا يوجد تاريخ' }}</td>
                                                <td>{{ $variant->quantity ?? 'لا يوجد كمية' }}</td>
                                                <td>
                                                    <input type="number" class="form-control receiving-quantity"
                                                        data-variant-id="{{ $variant->id }}"
                                                        data-original-quantity="{{ $variant->quantity }}"
                                                        value="{{ $variant->receiving_quantity }}" min="1"
                                                        @if ($variant->receiving_quantity) disabled @endif>
                                                </td>
                                                <td>
                                                    @if ($variant->status === 'new')
                                                        <span class="badge bg-success">{{ __('جديد') }}</span>
                                                    @elseif ($variant->status === 'processing')
                                                        <span class="badge bg-warning">{{ __('جاري التصنيع') }}</span>
                                                    @elseif ($variant->status === 'partial')
                                                        <span class="badge bg-warning">{{ __('استلام جزئي') }}</span>
                                                    @elseif ($variant->status === 'postponed')
                                                        <span class="badge bg-info">{{ __('مؤجل') }}</span>
                                                    @elseif ($variant->status === 'complete')
                                                        <span class="badge bg-danger">{{ __('مكتمل') }}</span>
                                                    @elseif ($variant->status === 'cancel')
                                                        <span class="badge bg-danger">{{ __('ملغي') }}</span>
                                                    @elseif ($variant->status === 'stop')
                                                        <span class="badge bg-danger">{{ __('متوقف') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($variant->status != 'partial' && $variant->status != 'complete' && $variant->quantity != null)
                                                        <button type="button" class="btn btn-info validate-btn"
                                                            data-variant-id="{{ $variant->id }}">تأكيد</button>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <div class="mt-4">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">العوده للقائمه</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="rescheduleForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rescheduleModalLabel">اعاده جدوله الكمية المتبقية</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Remaining Quantity Field -->
                        <div class="mb-3">
                            <label for="remainingQuantity" id="remainingQuantityLabel" class="form-label">الكمية المتبقية</label>
                            <input type="number" id="remainingQuantity" class="form-control" readonly>
                        </div>

                        <!-- Caution Text -->
                        <small class="text-danger">
                            هل تريد الاكتفاء بالكميه المتسلمه واعتبار ان اللون تم استلامه بالكامل؟
                        </small>

                        <!-- Submit Button -->
                        <div class="mt-3">
                            <button type="button" id="submitReceiving" class="btn btn-success w-100">
                                نعم واعتبار ان اللون تم استلامه بالكامل
                            </button>
                        </div>

                        <!-- Reschedule Checkbox -->
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" id="rescheduleCheckbox"
                                style="margin-left: 10px;">
                            <label class="form-check-label" for="rescheduleCheckbox">
                                تريد اعاده جدوله الكميه المتبقية؟
                            </label>
                        </div>

                        <!-- Expected Delivery Date -->
                        <div id="expectedDeliveryContainer" class="mt-3 d-none">
                            <label for="newExpectedDelivery" class="form-label">تاريخ التوصيل المتوقع</label>
                            <input type="date" id="newExpectedDelivery" name="new_expected_delivery"
                                class="form-control">
                        </div>

                        <!-- Notes Section -->
                        <div class="mt-3">
                            <label for="rescheduleNotes" class="form-label">ملاحظات <span
                                    class="text-danger">*</span></label>
                            <textarea id="rescheduleNotes" name="reschedule_notes" class="form-control" placeholder="أضف أي ملاحظات هنا..."
                                rows="3" required></textarea>
                        </div>

                        <!-- Reschedule Button -->
                        <div class="mt-3">
                            <button type="button" id="rescheduleBtn" class="btn btn-primary w-100 d-none">
                                اعاده جدوله الكميه المتبقية
                            </button>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Stop/Cancel Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">إضافة ملاحظة للحالة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="variantId">
                    <input type="hidden" id="productId"> <!-- Added Product ID -->
                    <input type="hidden" id="statusType">

                    <label for="statusNote" class="form-label">الملاحظات</label>
                    <textarea id="statusNote" class="form-control" rows="3" placeholder="أضف أي ملاحظات هنا..."></textarea>

                    <div class="mt-3">
                        <button type="button" id="saveStatusBtn" class="btn btn-primary w-100">حفظ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Enable/disable Validate button based on receiving quantity
            $(document).on("input", ".receiving-quantity", function() {
            const validateButton = $(this).closest("tr").find(".validate-btn");
            const quantityInput = $(this);
            const enteredQuantity = quantityInput.val().trim(); // Get input value as string
            const quantityValue = parseInt(enteredQuantity, 10); // Convert to integer
            const originalQuantity = parseInt(quantityInput.attr("data-original-quantity")) || 0;

            // Enable the button if a valid number is entered
            validateButton.prop("disabled", enteredQuantity === "" || isNaN(quantityValue) || quantityValue <= 0);
        });

        // Ensure buttons are correctly disabled on page load
        $(".receiving-quantity").each(function() {
            const quantityInput = $(this);
            const validateButton = quantityInput.closest("tr").find(".validate-btn");
            const enteredQuantity = quantityInput.val().trim();

            if (enteredQuantity === "" || isNaN(parseInt(enteredQuantity, 10)) || parseInt(enteredQuantity, 10) <= 0) {
                validateButton.prop("disabled", true);
            }
        });

        // Handle Validate button click
        $(document).on("click", ".validate-btn", function() {
            const variantId = $(this).data("variant-id");
            const row = $(this).closest("tr");
            const receivingQuantity = parseInt(row.find(".receiving-quantity").val(), 10);
            const originalQuantity = parseInt(row.find(".receiving-quantity").data("original-quantity"), 10);

            $("#rescheduleModal").data("variant-id", variantId);

            // Check if receiving quantity is greater than original quantity
            if (receivingQuantity > originalQuantity) {
                $("#remainingQuantityLabel").text("الكميه الزائده"); // Change label text
                $("#remainingQuantity").val(receivingQuantity - originalQuantity); // Set excess quantity
            } else {
                $("#remainingQuantityLabel").text("الكمية المتبقية"); // Default label
                $("#remainingQuantity").val(originalQuantity - receivingQuantity); // Set remaining quantity
            }

            // Hide reschedule fields if no remaining quantity
            if (originalQuantity - receivingQuantity === 0) {
                $("#rescheduleCheckbox").closest(".form-check").addClass("d-none");
                $("#expectedDeliveryContainer").addClass("d-none");
            } else {
                $("#rescheduleCheckbox").closest(".form-check").removeClass("d-none");
                $("#expectedDeliveryContainer").addClass("d-none"); // Ensure it starts hidden
            }

            $("#rescheduleModal").modal("show");
        });


            // Handle Reschedule Checkbox toggle
            $("#rescheduleCheckbox").on("change", function() {
                const isChecked = $(this).is(":checked");
                if (isChecked) {
                    $("#expectedDeliveryContainer").removeClass("d-none");
                    $("#rescheduleBtn").removeClass("d-none");
                } else {
                    $("#expectedDeliveryContainer").addClass("d-none");
                    $("#rescheduleBtn").addClass("d-none");
                }
            });

            // Handle Submit and Mark as Received button click
            $("#submitReceiving").on("click", function() {
                const submitButton = $(this);
                const variantId = $("#rescheduleModal").data("variant-id");
                const remainingQuantity = parseInt($("#remainingQuantity").val());
                const isRescheduleChecked = $("#rescheduleCheckbox").is(":checked");
                const newExpectedDelivery = isRescheduleChecked ? $("#newExpectedDelivery").val() : null;
                const receivingQuantityInput = row.find(".receiving-quantity"); // Get the specific input field
                const enteredQuantity = parseInt(receivingQuantityInput.val(), 10); 
                const notes = $("#rescheduleNotes").val(); // Get notes input

            console.log(enteredQuantity);
                // Check if notes are filled
                if (!notes || notes.trim() === "") {
                    alert("يرجى إدخال الملاحظات");
                    return;
                }

                // Disable the button to prevent multiple submissions
                submitButton.prop("disabled", true);

                // AJAX request to handle the submission
                $.ajax({
                    url: "/products/variants/mark-received",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        variant_id: variantId,
                        remaining_quantity: remainingQuantity,
                        new_expected_delivery: newExpectedDelivery,
                        note: notes,
                        entered_quantity: enteredQuantity
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload(); // Reload the page upon success
                    },
                    error: function(xhr) {
                        alert("Error: " + xhr.responseJSON.message);
                        submitButton.prop("disabled", false); // Re-enable the button on error
                    },
                });
            });

            // Handle Reschedule and Mark as Received button click
            $("#rescheduleBtn").on("click", function() {
                const rescheduleButton = $(this);
                const variantId = $("#rescheduleModal").data("variant-id");
                const remainingQuantity = parseInt($("#remainingQuantity").val());
                const newExpectedDelivery = $("#newExpectedDelivery").val();
                const enteredQuantity = parseInt($(".receiving-quantity").val(), 10);

                const notes = $("#rescheduleNotes").val(); // Get notes input

                if (!notes || notes.trim() === "") {
                    alert("يرجى إدخال الملاحظات");
                    return;
                }

                if (!newExpectedDelivery) {
                    alert("الرجاء ادخال تاريخ التسليم");
                    return;
                }

                // Disable the button to prevent multiple submissions
                rescheduleButton.prop("disabled", true);

                // AJAX request to handle rescheduling
                $.ajax({
                    url: "/products/variants/mark-received",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        variant_id: variantId,
                        remaining_quantity: remainingQuantity,
                        new_expected_delivery: newExpectedDelivery,
                        note: notes,
                        entered_quantity: enteredQuantity

                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload(); // Reload the page upon success
                    },
                    error: function(xhr) {
                        alert("Error: " + xhr.responseJSON.message);
                        rescheduleButton.prop("disabled",
                            false); // Re-enable the button on error
                    },
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on("click", ".stop-btn, .cancel-btn", function() {
                const variantId = $(this).data("variant-id");
                const productId = $(this).data("product-id"); // Get product ID
                const statusType = $(this).data("status");

                $("#variantId").val(variantId);
                $("#productId").val(productId); // Store product ID
                $("#statusType").val(statusType);
                $("#statusNote").val("");

                const modalTitle = statusType === "stop" ? "إيقاف المنتج" : "إلغاء المنتج";
                $("#statusModalLabel").text(modalTitle);
                $("#statusModal").modal("show");
            });

            $("#saveStatusBtn").on("click", function() {
                const variantId = $("#variantId").val();
                const productId = $("#productId").val();
                const statusType = $("#statusType").val();
                const note = $("#statusNote").val().trim();

                if (!note) {
                    alert("يرجى إدخال الملاحظات");
                    return;
                }

                $.ajax({
                    url: "/products/variants/update-status",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        variant_id: variantId,
                        product_id: productId, // Send product_id
                        status: statusType,
                        note: note
                    },
                    success: function(response) {
                        alert(response.message);
                        $("#statusModal").modal("hide");
                        location.reload();
                    },
                    error: function(xhr) {
                        alert("خطأ: " + xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>
@endsection
