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
                                <th><input type="checkbox" id="select-all"></th> <!-- ✅ Select All Checkbox -->

                                <th>{{ __('اللون') }}</th>
                                <th>{{ __('الحالة') }}</th>
                                <th>{{ __('الكمية') }}</th>
                                <th>{{ __('المصنع') }}</th>
                                <th>{{ __('الخامة') }}</th>
                                <th>{{ __('رقم الماركر') }}</th>
                                <th>{{ __('الكود') }}</th>
                                <th>{{ __('العمليات') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->productColors as $productColor)
                                @foreach ($productColor->productcolorvariants as $variant)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="record-checkbox" value="{{ $variant->id }}">
                                        </td> <!-- ✅ Individual Record Checkbox -->

                                        <td>{{ $productColor->color->name }}</td>

                                        <td>
                                            @switch($variant->status)
                                                @case('new')
                                                    {{ __('لم يتم البدء') }}
                                                @break

                                                @case('processing')
                                                    {{ __('جاري التصنيع') }}
                                                @break

                                                @case('postponed')
                                                    {{ __('مؤجل') }}
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

                                        <td>{{ $variant->quantity ?? 0 }}</td>

                                        <td>
                                            {{ $variant->factory->name ?? 'لا يوجد' }}
                                        </td>

                                        <td>
                                            {{ $variant->material->name ?? 'لا يوجد' }}
                                        </td>

                                        <td>
                                            {{ $variant->marker_number ?? 'لا يوجد' }}
                                        </td>

                                        <td>
                                            {{ $productColor->sku ?? 'لا يوجد' }}
                                        </td>

                                        <td>
                                            @if ($variant->status === 'new' || $variant->status === 'postponed')
                                                <button type="button" class="btn btn-primary start-manufacturing-btn"
                                                    data-color-id="{{ $productColor->id }}"
                                                    data-color-name="{{ $productColor->color->name }}"
                                                    data-bs-toggle="modal" data-bs-target="#manufacturingModal">
                                                    {{ __('ابدأ التصنيع') }}
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-secondary stop-btn"
                                                    data-variant-id="{{ $variant->id }}"
                                                    data-product-id="{{ $product->id }}" data-status="stop"
                                                    data-bs-toggle="modal" data-bs-target="#statusModal">
                                                    {{ __('إيقاف') }}
                                                </button>
                                            @endif

                                            <button type="button" class="btn btn-danger cancel-btn"
                                                data-variant-id="{{ $variant->id }}"
                                                data-product-id="{{ $product->id }}" data-status="cancel"
                                                data-bs-toggle="modal" data-bs-target="#statusModal">
                                                {{ __('إلغاء') }}
                                            </button>

                                            <button type="button" class="btn btn-warning postpone-btn"
                                                data-variant-id="{{ $variant->id }}"
                                                data-product-id="{{ $product->id }}" data-status="postponed"
                                                data-bs-toggle="modal" data-bs-target="#statusModal">
                                                {{ __('تأجيل') }}
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">العوده للقائمه</a>
                    <button type="button" class="btn btn-success ms-2" id="bulk-manufacturing-btn" style="display: none;">
                        ابدأ التصنيع
                    </button> <!-- ✅ Bulk Manufacturing Button (Hidden Initially) -->
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

                        <!-- ✅ Button to Add More Manufacturing Inputs -->
                        <button type="button" class="btn btn-success btn-sm mb-2" id="add-manufacturing-inputs">
                            +
                        </button>

                        <!-- ✅ Container to hold multiple sets of inputs -->
                        <div id="additional-inputs-container" class="mb-3">
                            <div class="manufacturing-input-group row" style="border: 1px solid #acacac; padding: 10px">
                                <!-- ✅ Color Name -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">{{ __('اللون') }}</label>
                                    <input type="text" class="form-control color-name-field" value="" disabled>
                                </div>


                                <div class="col-md-4 mb-3">
                                    <label for="expected_delivery" class="form-label">{{ __('تاريخ الاستلام') }}</label>
                                    <input type="date" class="form-control" name="expected_delivery[]" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="quantity" class="form-label">{{ __('الكمية') }}</label>
                                    <input type="number" class="form-control" name="quantity[]" min="1" required>
                                </div>

                                <!-- ✅ Factory Selection -->
                                <div class="col-md-4 mb-3 factory-container">
                                    <label for="factory_id" class="form-label">{{ __('المصنع') }}</label>
                                    <select name="factory_id[]" class="tom-select-factory" required>
                                        <option value="">{{ __('اختر المصنع') }}</option>
                                        @foreach ($factories as $factory)
                                            <option value="{{ $factory->id }}">{{ $factory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- ✅ Material Selection -->
                                <div class="col-md-4 mb-3 material-container">
                                    <label for="material_id" class="form-label">{{ __('الخامه') }}</label>
                                    <select name="material_id[]" class="tom-select-material" required>
                                        <option value="">{{ __('اختر الخامه') }}</option>
                                        @foreach ($materials as $material)
                                            <option value="{{ $material->id }}">{{ $material->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <!-- ✅ Marker Number Input -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">{{ __('رقم الماركر') }}</label>
                                    <input type="text" class="form-control" name="marker_number[]">
                                </div>

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
    document.addEventListener("DOMContentLoaded", function() {
        const selectAllCheckbox = document.getElementById("select-all");
        const checkboxes = document.querySelectorAll(".record-checkbox");
        const bulkManufacturingBtn = document.getElementById("bulk-manufacturing-btn");

        // ✅ Handle "Select All" checkbox functionality
        selectAllCheckbox.addEventListener("change", function() {
            checkboxes.forEach(checkbox => checkbox.checked = selectAllCheckbox.checked);
            toggleBulkButton();
        });

        // ✅ Handle individual checkbox clicks
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("change", function() {
                toggleBulkButton();
            });
        });

        // ✅ Show or hide the bulk action button based on selection
        function toggleBulkButton() {
            let anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            bulkManufacturingBtn.style.display = anyChecked ? "block" : "none";
        }
    });
</script>
    <script>
        $(document).ready(function() {
            $(".start-manufacturing-btn").on("click", function() {
                let colorId = $(this).data("color-id");
                let colorName = $(this).data("color-name");

                $("#modal-color-id").val(colorId);
                $("#modal-color-name").val(colorName);

                // ✅ Also Set the First Color Name Input Field in the Modal
                let firstColorInput = document.querySelector('.color-name-field');
                if (firstColorInput) {
                    firstColorInput.value = colorName;
                }
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
            document.getElementById('add-manufacturing-inputs').addEventListener('click', function() {
                let container = document.getElementById('additional-inputs-container');
                let original = document.querySelector('.manufacturing-input-group');

                // Clone the original input group
                let newElement = original.cloneNode(true);

                // ✅ Clear input values except for color name
                newElement.querySelectorAll('input, select').forEach(element => {
                    if (!element.classList.contains("color-name-field")) {
                        if (element.tagName === 'INPUT') {
                            element.value = '';
                        } else if (element.tagName === 'SELECT') {
                            element.selectedIndex = 0;
                        }
                    }
                });

                // ✅ Get Color Name from the First Input in the Modal
                let originalColorInput = document.querySelector('#modal-color-name');
                if (originalColorInput) {
                    let originalColorName = originalColorInput.value;

                    // ✅ Set the color name in the new cloned element
                    let newColorInput = newElement.querySelector('.color-name-field');
                    if (newColorInput) {
                        newColorInput.value = originalColorName;
                    }
                }


                // ✅ Destroy Tom Select instances in cloned div before appending new ones
                newElement.querySelectorAll('.tom-select-factory, .tom-select-material').forEach(select => {
                    if (select.tomselect) {
                        select.tomselect.destroy();
                    }
                    select.parentNode.removeChild(select);
                });

                // ✅ Create new select elements (Fresh dropdowns)
                let factoryDropdown = document.createElement('select');
                factoryDropdown.name = "factory_id[]";
                factoryDropdown.classList.add("tom-select-factory");
                factoryDropdown.innerHTML = `<option value="">اختر المصنع</option>`;
                @foreach ($factories as $factory)
                    factoryDropdown.innerHTML +=
                        `<option value="{{ $factory->id }}">{{ $factory->name }}</option>`;
                @endforeach

                let factoryContainer = newElement.querySelector('.factory-container');
                if (factoryContainer) {
                    factoryContainer.appendChild(factoryDropdown);
                } else {
                    console.error("Error: '.factory-container' not found in cloned element.");
                }

                let materialDropdown = document.createElement('select');
                materialDropdown.name = "material_id[]";
                materialDropdown.classList.add("tom-select-material");
                materialDropdown.innerHTML = `<option value="">اختر الخامه</option>`;
                @foreach ($materials as $material)
                    materialDropdown.innerHTML +=
                        `<option value="{{ $material->id }}">{{ $material->name }}</option>`;
                @endforeach

                let materialContainer = newElement.querySelector('.material-container');
                if (materialContainer) {
                    materialContainer.appendChild(materialDropdown);
                } else {
                    console.error("Error: '.material-container' not found in cloned element.");
                }

                // ✅ Append new element to container
                container.appendChild(newElement);

                // ✅ Reinitialize Tom Select for new selects
                new TomSelect(factoryDropdown, {
                    placeholder: "اختر المصنع"
                });
                new TomSelect(materialDropdown, {
                    placeholder: "اختر الخامه"
                });

                // ✅ Add remove button
                let removeButton = document.createElement('button');
                removeButton.innerHTML = '×';
                removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'remove-entry');
                removeButton.style.position = 'absolute';
                removeButton.style.top = '-10px';
                removeButton.style.left = '-10px';
                removeButton.style.borderRadius = '50%';

                // ✅ Set position relative for parent div
                newElement.style.position = 'relative';

                // ✅ Append remove button
                newElement.appendChild(removeButton);

                // ✅ Remove button event
                removeButton.addEventListener('click', function() {
                    newElement.remove();
                });
            });

            // ✅ Ensure the modal gets the correct color name on open
            $(".start-manufacturing-btn").on("click", function() {
                $("#modal-color-id").val($(this).data("color-id"));
                $("#modal-color-name").val($(this).data("color-name"));
            });

            // ✅ Initialize Tom Select on page load for first dropdowns
            new TomSelect('.tom-select-factory', {
                placeholder: "اختر المصنع"
            });
            new TomSelect('.tom-select-material', {
                placeholder: "اختر الخامه"
            });
        });
    </script>
@endsection
