@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
                @if (session('success'))
                    <div class="alert alert-primary" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">x</button>
                        {{ session('success') }}
                    </div>
                @endif

                <h1>{{ __('بدء التصنيع') }}</h1>

                <!-- Color Details Table -->
                <div class="mb-3">
                    <table class="table table-bordered" id="color-details-table">
                        <thead class="table-dark">
                            <tr>
                                <th>{{ __('اللون') }}</th>
                                <th>{{ __('الحالة') }}</th>
                                <th>{{ __('الكمية') }}</th>
                                <th>{{ __('العمليات') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->productColors as $productColor)
                                <tr>
                                    <td>{{ $productColor->color->name }}</td>
                                    @php
                                        $variant = $productColor->productcolorvariants->last();
                                    @endphp

                                    <td>
                                        @switch($variant->status)
                                            @case('new')
                                                {{ __('لم يتم البدء') }}
                                            @break

                                            @case('processing')
                                                {{ __('جاري التصنيع') }}
                                            @break

                                            @case('postponed')
                                                {{ __('مؤجل ') }}
                                            @break

                                            @case('partial')
                                                {{ __('جزئي الاستلام') }}
                                            @break

                                            @case('complete')
                                                {{ __('تم التصنيع') }}
                                            @break

                                            @case('cancel')
                                                {{ __('تم الغاء التصنيع') }}
                                            @break

                                            @case('stop')
                                                {{ __('تم ايقاف التصنيع') }}
                                            @break

                                            @default
                                                {{ __('غير معروف') }}
                                        @endswitch
                                    </td>

                                    <td>
                                        {{ $variant->quantity ?? 0 }}

                                    </td>

                                    <td>


                                        @if (($variant && $variant->status === 'new') || $variant->status === 'postponed')
                                            <!-- ✅ Start Manufacturing Button -->
                                            <button type="button" class="btn btn-primary start-manufacturing-btn"
                                                data-color-id="{{ $productColor->id }}"
                                                data-color-name="{{ $productColor->color->name }}" data-bs-toggle="modal"
                                                data-bs-target="#manufacturingModal">
                                                {{ __('ابدأ التصنيع') }}
                                            </button>
                                        @else
                                            <!-- ✅ Stop Button -->
                                            <button type="button" class="btn btn-secondary stop-btn"
                                                data-variant-id="{{ $variant->id }}"
                                                data-product-id="{{ $product->id }}" data-status="stop"
                                                data-bs-toggle="modal" data-bs-target="#statusModal">
                                                {{ __('إيقاف') }}
                                            </button>
                                        @endif

                                        @if ($variant)
                                            <!-- ✅ Cancel Button -->
                                            <button type="button" class="btn btn-danger cancel-btn"
                                                data-variant-id="{{ $variant->id }}"
                                                data-product-id="{{ $product->id }}" data-status="cancel"
                                                data-bs-toggle="modal" data-bs-target="#statusModal">
                                                {{ __('إلغاء') }}
                                            </button>



                                            <!-- ✅ Postpone Button -->
                                            <button type="button" class="btn btn-warning postpone-btn"
                                                data-variant-id="{{ $variant->id }}"
                                                data-product-id="{{ $product->id }}" data-status="postponed"
                                                data-bs-toggle="modal" data-bs-target="#statusModal">
                                                {{ __('تأجيل') }}
                                            </button>
                                        @endif
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">العوده للقائمه</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Manufacturing Modal -->
    <div class="modal fade" id="manufacturingModal" tabindex="-1" aria-labelledby="manufacturingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="manufacturingModalLabel">{{ __('بدء تصنيع اللون') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="manufacturing-form" action="{{ route('products.update.manufacture', $product->id) }}"
                    method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="color_id" id="modal-color-id">
                        <!-- Add a small circular plus button -->
                        <button type="button" class="btn btn-success btn-sm mb-2" id="add-manufacturing-inputs">
                            +
                        </button>

                        <!-- Container to hold duplicated input sets -->
                        <div id="additional-inputs-container" class="mb-3"></div>

                        <div class="row" style="border: 1px solid #acacac; padding: 10px" id="modal-color-details">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">{{ __('اللون') }}</label>
                                <input type="text" class="form-control" id="modal-color-name" disabled>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="expected_delivery" class="form-label">{{ __('تاريخ الاستلام') }}</label>
                                <input type="date" class="form-control" name="expected_delivery" id="expected_delivery"
                                    required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="quantity" class="form-label">{{ __('الكمية') }}</label>
                                <input type="number" class="form-control" name="quantity" id="quantity" min="1"
                                    required>
                            </div>
                            <!-- i want here tommy select for materials and factories -->
                            <div class="col-md-4 mb-3">
                                <label for="factory_id" class="form-label">{{ __('المصنع') }}</label>
                                <select id="factory_id" name="factory_id" required>
                                    <option value="">{{ __('اختر المصنع') }}</option>
                                    @foreach ($factories as $factory)
                                        <option value="{{ $factory->id }}">{{ $factory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="material_id" class="form-label">{{ __('الخامه') }}</label>
                                <select id="material_id" name="material_id" required>
                                    <option value="">{{ __('اختر الخامه') }}</option>
                                    @foreach ($materials as $material)
                                        <option value="{{ $material->id }}">{{ $material->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">{{ __('رقم الماركر') }}</label>
                                <input type="text" class="form-control" name="marker_number" id="marker_number">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{ __('ابدأ التصنيع') }}</button>
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('إلغاء') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ✅ Status Update Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">إضافة ملاحظة للحالة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="variantId">
                    <input type="hidden" id="productId">
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
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Tom Select
            new TomSelect('#material_id', {
                placeholder: "اختر الخامه"
            });
            new TomSelect('#factory_id', {
                placeholder: "اختر المصنع"
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $(".start-manufacturing-btn").on("click", function() {
                $("#modal-color-id").val($(this).data("color-id"));
                $("#modal-color-name").val($(this).data("color-name"));
            });

            $(".stop-btn, .cancel-btn, .postpone-btn").on("click", function() {
                $("#variantId").val($(this).data("variant-id"));
                $("#productId").val($(this).data("product-id"));
                $("#statusType").val($(this).data("status"));
                $("#statusNote").val("");

                let modalTitle = "";
                if ($(this).data("status") === "stop") modalTitle = "إيقاف التصنيع";
                else if ($(this).data("status") === "cancel") modalTitle = "إلغاء التصنيع";
                else if ($(this).data("status") === "postponed") modalTitle = "تأجيل التصنيع";

                $("#statusModalLabel").text(modalTitle);
                $("#statusModal").modal("show");
            });

            $("#saveStatusBtn").off("click").on("click", function() {
                $.post("/products/variants/update-status", {
                    _token: "{{ csrf_token() }}",
                    variant_id: $("#variantId").val(),
                    product_id: $("#productId").val(),
                    status: $("#statusType").val(),
                    note: $("#statusNote").val().trim()
                }).done(response => {
                    alert(response.message);
                    $("#statusModal").modal("hide");
                    location.reload();
                }).fail(xhr => alert("خطأ: " + xhr.responseJSON.message));
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("add-manufacturing-inputs").addEventListener("click", function() {
                let container = document.getElementById("additional-inputs-container");

                // Create new input container div
                let inputDiv = document.createElement("div");
                inputDiv.className = "position-relative p-3 border rounded mb-2"; // Bootstrap styling

                // Create close button
                let closeButton = document.createElement("button");
                closeButton.innerHTML = "&times;";
                closeButton.className = "btn btn-danger btn-sm position-absolute";
                closeButton.style.top = "-10px";
                closeButton.style.left = "-10px";
                closeButton.style.borderRadius = "50%";
                closeButton.style.padding = "5px 10px";
                closeButton.addEventListener("click", function() {
                    inputDiv.remove();
                });

                // Create input elements
                let input1 = document.createElement("input");
                input1.type = "text";
                input1.className = "form-control mb-2";
                input1.placeholder = "Custom Input 1";

                let input2 = document.createElement("input");
                input2.type = "text";
                input2.className = "form-control";
                input2.placeholder = "Custom Input 2";

                // Append elements
                inputDiv.appendChild(closeButton);
                inputDiv.appendChild(input1);
                inputDiv.appendChild(input2);
                container.appendChild(inputDiv);
            });

        });
    </script>
@endsection
