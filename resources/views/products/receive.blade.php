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
    </style>
@endsection

@section('content')
    <div class="p-4 position-relative">
        <!-- Product Status Badge -->
        <div
            class="status-badge 
        @if ($product->status === 'Complete') status-complete
        @elseif ($product->status === 'Partial') status-partial
        @else status-new @endif">
            {{ $product->status }}
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
                <div>
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            @if ($product->photo)
                                <img src="{{ asset($product->photo) }}" alt="Product Image" class="product-image">
                            @endif
                            <div class="product-details">
                                <div class="key-value"><span>Code:</span> <span>{{ $product->code ?? 'N/A' }}</span></div>
                                <div class="key-value"><span>Description:</span> <span>{{ $product->description }}</span>
                                </div>
                                <div class="key-value">
                                    <span>Category:</span><span>{{ $product->category->name ?? 'N/A' }}</span>
                                </div>
                                <div class="key-value">
                                    <span>Season:</span><span>{{ $product->season->name ?? 'N/A' }}</span>
                                </div>
                                <div class="key-value">
                                    <span>Factory:</span><span>{{ $product->factory->name ?? 'N/A' }}</span>
                                </div>
                                <div class="key-value"><span>Material Availability:</span>
                                    <span>{{ $product->have_stock ? 'Yes' : 'No' }} -
                                        {{ $product->material_name ?? 'No material Identified' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h2>Colors</h2>
                    @if ($product->productColors->isEmpty())
                        <p>No colors available for this product.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Color Name</th>
                                        <th>Expected Delivery</th>
                                        <th>Quantity</th>
                                        <th>Receiving Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->productColors as $productColor)
                                        @foreach ($productColor->productcolorvariants as $variant)
                                            <tr>
                                                <td>{{ $productColor->color->name ?? 'N/A' }}</td>
                                                <td>{{ $variant->expected_delivery ?? 'N/A' }}</td>
                                                <td>{{ $variant->quantity ?? 'N/A' }}</td>
                                                <td>
                                                    <input type="number" class="form-control receiving-quantity"
                                                        data-variant-id="{{ $variant->id }}"
                                                        data-original-quantity="{{ $variant->quantity }}"
                                                        value="{{ $variant->receiving_quantity }}" min="1"
                                                        @if ($variant->receiving_quantity) disabled @endif>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info validate-btn"
                                                        data-variant-id="{{ $variant->id }}" disabled>Validate</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <div class="mt-4">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reschedule Modal -->
    <div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="rescheduleForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rescheduleModalLabel">Reschedule Remaining Quantity</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="remainingQuantity" class="form-label">Remaining Quantity</label>
                            <input type="number" id="remainingQuantity" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="newExpectedDelivery" class="form-label">New Expected Delivery</label>
                            <input type="date" id="newExpectedDelivery" name="new_expected_delivery" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Reschedule</button>
                    </div>
                </form>
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
                const enteredQuantity = parseInt(quantityInput.val());
                const originalQuantity = parseInt(quantityInput.attr("data-original-quantity")) || 0;

                // Check if entered quantity is greater than expected
                if (enteredQuantity > originalQuantity) {
                    alert("You entered a quantity greater than the expected quantity!");
                    quantityInput.val(""); // Reset the input value
                    validateButton.prop("disabled", true); // Disable the Validate button
                    return;
                }

                // Enable/disable the Validate button based on valid input
                validateButton.prop("disabled", !enteredQuantity || enteredQuantity <= 0);
            });

            // Handle Validate button click
            $(document).on("click", ".validate-btn", function() {
                const variantId = $(this).data("variant-id");
                const quantityInput = $(`.receiving-quantity[data-variant-id="${variantId}"]`);
                const enteredQuantity = parseInt(quantityInput.val());
                const originalQuantity = parseInt(quantityInput.attr("data-original-quantity")) || 0;

                if (enteredQuantity > 0 && enteredQuantity <= originalQuantity) {
                    const remainingQuantity = originalQuantity - enteredQuantity;
                    if (remainingQuantity === 0) {
                        // Directly update receiving quantity
                        $.ajax({
                            url: "/products/variants/reschedule",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                variant_id: variantId,
                                receiving_quantity: enteredQuantity,
                                remaining_quantity: 0, // No remaining quantity
                            },
                            success: function(response) {
                                alert(response.message);
                                location.reload();
                            },
                            error: function(xhr) {
                                alert("Error: " + xhr.responseJSON.message);
                            },
                        });
                    } else if (remainingQuantity > 0) {
                        // Show reschedule modal for remaining quantity
                        $("#remainingQuantity").val(remainingQuantity);
                        $("#rescheduleModal").data("variant-id", variantId);
                        $("#rescheduleModal").data("receiving-quantity", enteredQuantity);
                        $("#rescheduleModal").modal("show");
                    }
                }
            });

            // Reschedule form submission
            $("#rescheduleForm").on("submit", function(e) {
                e.preventDefault();

                const variantId = $("#rescheduleModal").data("variant-id");
                const receivingQuantity = $("#rescheduleModal").data("receiving-quantity");
                const remainingQuantity = $("#remainingQuantity").val();
                const newExpectedDelivery = $("#newExpectedDelivery").val();

                if (!newExpectedDelivery) {
                    alert("Please provide a new expected delivery date.");
                    return;
                }

                $.ajax({
                    url: "/products/variants/reschedule",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        variant_id: variantId,
                        receiving_quantity: receivingQuantity,
                        remaining_quantity: remainingQuantity,
                        new_expected_delivery: newExpectedDelivery,
                    },
                    success: function(response) {
                        if (response.status === "success") {
                            alert(response.message);
                            location.reload();
                        } else {
                            alert("Error: " + response.message);
                        }
                    },
                    error: function(xhr) {
                        alert("Error: " + xhr.responseJSON.message);
                    },
                });
            });
        });
    </script>
@endsection
