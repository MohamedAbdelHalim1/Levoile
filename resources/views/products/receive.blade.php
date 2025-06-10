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
                                <div class="key-value"><span>{{ __('messages.code') }}:</span> <span>{{ $product->code ?? '-'  }}</span>
                                </div>
                                <div class="key-value"><span>{{ __('messages.description') }}:</span>
                                    <span>{{ $product->description ?? '-' }}</span>
                                </div>
                                <div class="key-value">
                                    <span>{{ __('messages.category') }}:</span><span>{{ $product->category->name ?? '-' }}</span>
                                </div>

                                <div class="key-value">
                                    <span>{{ __('messages.season') }}:</span><span>{{ $product->season->name ?? '-' }}</span>
                                </div>

                                <div class="key-value">
                                    <span>{{ __('messages.status') }}:</span>
                                    <span
                                        class="badge
                                        @if ($product->status === 'complete') bg-success
                                        @elseif ($product->status === 'partial') bg-warning
                                        @elseif ($product->status === 'new') bg-primary
                                        @elseif ($product->status === 'postponed') bg-info
                                        @elseif ($product->status === 'processing') bg-info
                                        @elseif ($product->status === 'stop') bg-danger
                                        @elseif ($product->status === 'cancel') bg-danger
                                        @elseif ($product->status === 'pending') bg-info
                                        @else bg-primary @endif">
                                        @if ($product->status === 'new')
                                            {{ __('messages.new') }}
                                        @elseif ($product->status === 'cancel')
                                            {{ __('messages.cancel') }}
                                        @elseif ($product->status === 'pending')
                                            {{ __('messages.pending') }}
                                        @elseif ($product->status === 'postponed')
                                            {{ __('messages.postponed') }}
                                        @elseif ($product->status === 'stop')
                                            {{ __('messages.stop') }}
                                        @elseif ($product->status === 'complete')
                                            {{ __('messages.complete') }}
                                        @elseif ($product->status === 'processing')
                                            {{ __('messages.processing') }}
                                        @elseif ($product->status === 'partial')
                                            {{ __('messages.partial') }}
                                        @else
                                            {{ __('messages.unknown') }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h2>{{ __('messages.colors') }}</h2>
                    @if ($product->productColors->isEmpty())
                        <p>{{ __('messages.no_colors') }}</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>{{ __('messages.color') }}</th>
                                        <th>{{ __('messages.sku') }}</th>
                                        <th>{{ __('messages.expected_delivery_date') }}</th>
                                        <th>{{ __('messages.quantity') }}</th>
                                        <th>{{ __('messages.received_quantity') }} </th>
                                        <th>{{ __('messages.status') }}</th>
                                        <th class="action-column">{{ __('messages.operations') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->productColors as $productColor)
                                        @foreach ($productColor->productcolorvariants as $variant)
                                            @php
                                            /* i want to check if receving status is complete and quantity greater then receiving quantity to put in remeinaing to put beside quantity as cancelled quantity*/
                                            $remainingQuantity = $variant->quantity - $variant->receiving_quantity;

                                            @endphp
                                            <tr>
                                                <td>{{ $productColor->color->name ?? '-' }}</td>
                                                <td>{{ $variant->sku ?? '-' }}</td>
                                                <td>{{ $variant->expected_delivery ?? '-' }}</td>
                                                @if ($variant->status === 'complete' && $remainingQuantity > 0)
                                                    <td>{{ $variant->quantity . ' ' . '(' . $remainingQuantity . '__(messages.cancelled)' .')' }}</td>
                                                @else
                                                    <td>{{ $variant->quantity ?? '-' }}</td>
                                                @endif
                                                <td>
                                                    <input type="number" class="form-control receiving-quantity"
                                                        data-variant-id="{{ $variant->id }}"
                                                        data-original-quantity="{{ $variant->quantity }}"
                                                        value="{{ $variant->receiving_quantity }}" min="1"
                                                        @if ($variant->receiving_quantity) disabled @endif>
                                                </td>
                                                <td>
                                                    @if ($variant->status === 'new')
                                                        <span class="badge bg-success">{{ __('messages.new') }}</span>
                                                    @elseif ($variant->status === 'processing')
                                                        <span class="badge bg-warning">{{ __('messages.processing') }}</span>
                                                    @elseif ($variant->status === 'partial')
                                                        <span class="badge bg-warning">{{ __('messages.partial') }}</span>
                                                    @elseif ($variant->status === 'postponed')
                                                        <span class="badge bg-info">{{ __('messages.postponed') }}</span>
                                                    @elseif ($variant->status === 'complete')
                                                        <span class="badge bg-danger">{{ __('messages.complete') }}</span>
                                                    @elseif ($variant->status === 'cancel')
                                                        <span class="badge bg-danger">{{ __('messages.cancel') }}</span>
                                                    @elseif ($variant->status === 'stop')
                                                        <span class="badge bg-danger">{{ __('messages.stop') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (
                                                        $variant->status != 'partial' &&
                                                            $variant->status != 'complete' &&
                                                            empty($variant->receiving_quantity) &&
                                                            !empty($variant->expected_delivery))
                                                        <button type="button" class="btn btn-info validate-btn"
                                                            data-variant-id="{{ $variant->id }}">{{ __('messages.validate') }}</button>
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
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">{{ __('messages.back') }}</a>
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
                        <h5 class="modal-title" id="rescheduleModalLabel">{{ __('messages.reschedule_quantity') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Remaining Quantity Field -->
                        <div class="mb-3">
                            <label for="remainingQuantity" id="remainingQuantityLabel" class="form-label">
                                {{ __('messages.remaining_quantity') }}</label>
                            <input type="number" id="remainingQuantity" class="form-control" readonly>
                        </div>

                        <!-- Caution Text -->
                        <small class="text-danger">
                            {{ __('messages.confirm_received_quantity') }}
                        </small>

                        <!-- Submit Button -->
                        <div class="mt-3">
                            <button type="button" id="submitReceiving" class="btn btn-success w-100">
                                {{ __('messages.yes_confirm_received_quantity') }}
                            </button>
                        </div>

                        <!-- Reschedule Checkbox -->
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" id="rescheduleCheckbox"
                                style="margin-left: 10px;">
                            <label class="form-check-label" for="rescheduleCheckbox">
                                {{ __('messages.reschedule_remaining_quantity') }}
                            </label>
                        </div>

                        <!-- Expected Delivery Date -->
                        <div id="expectedDeliveryContainer" class="mt-3 d-none">
                            <label for="newExpectedDelivery" class="form-label">{{ __('messages.expected_delivery_date') }}</label>
                            <input type="date" id="newExpectedDelivery" name="new_expected_delivery"
                                class="form-control">
                        </div>

                        <!-- Notes Section -->
                        <div class="mt-3">
                            <label for="rescheduleNotes" class="form-label">{{ __('messages.notes') }}<span
                                    class="text-danger">*</span></label>
                            <textarea id="rescheduleNotes" name="reschedule_notes" class="form-control"
                                rows="3" required></textarea>
                        </div>

                        <!-- Reschedule Button -->
                        <div class="mt-3">
                            <button type="button" id="rescheduleBtn" class="btn btn-primary w-100 d-none">
                                {{ __('messages.reschedule_remaining_quantity') }}
                            </button>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.close') }}</button>
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
                    <h5 class="modal-title" id="statusModalLabel">{{ __('messages.add_note_for_status') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="variantId">
                    <input type="hidden" id="productId"> <!-- Added Product ID -->
                    <input type="hidden" id="statusType">

                    <label for="statusNote" class="form-label">{{ __('messages.add_note') }}</label>
                    <textarea id="statusNote" class="form-control" rows="3"></textarea>

                    <div class="mt-3">
                        <button type="button" id="saveStatusBtn" class="btn btn-primary w-100">{{ __('messages.save') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            let currentRow = null; // Variable to store the current row

            // Enable/disable Validate button based on receiving quantity
            $(document).on("input", ".receiving-quantity", function() {
                const validateButton = $(this).closest("tr").find(".validate-btn");
                const quantityInput = $(this);
                const enteredQuantity = quantityInput.val().trim(); // Get input value as string
                const quantityValue = parseInt(enteredQuantity, 10); // Convert to integer
                const originalQuantity = parseInt(quantityInput.attr("data-original-quantity")) || 0;

                // Enable the button if a valid number is entered
                validateButton.prop("disabled", enteredQuantity === "" || isNaN(quantityValue) ||
                    quantityValue <= 0);
            });

            // Ensure buttons are correctly disabled on page load
            $(".receiving-quantity").each(function() {
                const quantityInput = $(this);
                const validateButton = quantityInput.closest("tr").find(".validate-btn");
                const enteredQuantity = quantityInput.val().trim();

                if (enteredQuantity === "" || isNaN(parseInt(enteredQuantity, 10)) || parseInt(
                        enteredQuantity, 10) <= 0) {
                    validateButton.prop("disabled", true);
                }
            });

            // Handle Validate button click
            $(document).on("click", ".validate-btn", function() {
                const variantId = $(this).data("variant-id");
                currentRow = $(this).closest("tr"); // Store the current row
                const receivingQuantity = parseInt(currentRow.find(".receiving-quantity").val(), 10);
                const originalQuantity = parseInt(currentRow.find(".receiving-quantity").data(
                    "original-quantity"), 10);

                $("#rescheduleModal").data("variant-id", variantId);

                // Check if receiving quantity is greater than original quantity
                if (receivingQuantity > originalQuantity) {
                    $("#remainingQuantityLabel").text("{{ __('messages.excess_quantity') }}"); // Change label text
                    $("#remainingQuantity").val(receivingQuantity -
                        originalQuantity); // Set excess quantity
                } else {
                    $("#remainingQuantityLabel").text("{{ __('messages.remaining_quantity') }}"); // Default label
                    $("#remainingQuantity").val(originalQuantity -
                        receivingQuantity); // Set remaining quantity
                }

                // Hide reschedule fields if no remaining quantity
                if (originalQuantity - receivingQuantity === 0 || receivingQuantity > originalQuantity) {
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
                const receivingQuantityInput = currentRow.find(".receiving-quantity"); // Use the stored row
                const enteredQuantity = parseInt(receivingQuantityInput.val(),
                    10); // Get the entered quantity
                const notes = $("#rescheduleNotes").val(); // Get notes input

                console.log(enteredQuantity);

                // Check if notes are filled
                if (!notes || notes.trim() === "") {
                    alert("{{ __('messages.note_required') }}");
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
                const receivingQuantityInput = currentRow.find(".receiving-quantity"); // Use the stored row
                const enteredQuantity = parseInt(receivingQuantityInput.val(),
                    10); // Get the entered quantity
                const notes = $("#rescheduleNotes").val(); // Get notes input

                if (!notes || notes.trim() === "") {
                    alert("{{ __('messages.note_required') }} ");
                    return;
                }

                if (!newExpectedDelivery) {
                    alert("{{ __('messages.expected_delivery_required') }}");
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
                    alert("{{ __('messages.note_required') }}");
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
