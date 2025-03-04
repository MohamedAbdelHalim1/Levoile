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
                                                    {{ __(' مؤجل الي ' . $variant->pending_date) }}
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
                                            @if (!empty($variant->marker_file))
                                                <a href="{{ asset('images/' . $variant->marker_file) }}" download
                                                    class="ms-2">
                                                    <i class="bi bi-download" title="Download Marker File"></i>
                                                </a>
                                            @endif
                                        </td>

                                        <td>
                                            {{ $productColor->sku ?? 'لا يوجد' }}
                                        </td>

                                        <td>
                                            @if ($variant->quantity > 0)
                                                <button type="button" class="btn btn-warning start-manufacturing-btn"
                                                    data-color-id="{{ $productColor->id }}"
                                                    data-color-name="{{ $productColor->color->name }}"
                                                    data-bs-toggle="modal" data-bs-target="#manufacturingModal">
                                                    {{ __('تعديل التصنيع') }}
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-primary start-manufacturing-btn"
                                                    data-color-id="{{ $productColor->id }}"
                                                    data-color-name="{{ $productColor->color->name }}"
                                                    data-bs-toggle="modal" data-bs-target="#manufacturingModal">
                                                    {{ __('ابدأ التصنيع') }}
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-secondary stop-btn"
                                                data-variant-id="{{ $variant->id }}"
                                                data-product-id="{{ $product->id }}" data-status="stop"
                                                data-bs-toggle="modal" data-bs-target="#statusModal">
                                                {{ __('إيقاف') }}
                                            </button>

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
                <div class="mt-4 d-flex">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">العوده للقائمه</a>
                    <button type="button" class="btn btn-success ms-2" id="bulk-manufacturing-btn" style="display: none;">
                        تصنيع
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
                    method="POST" enctype="multipart/form-data">
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
                                    <label for="order_delivery" class="form-label">{{ __('تاريخ الطلب') }}</label>
                                    <input type="date" class="form-control" name="order_delivery[]" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="quantity" class="form-label">{{ __('الكمية') }}</label>
                                    <input type="number" class="form-control" name="quantity[]" min="1"
                                        required>
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

                                <!-- ✅ Marker File Upload -->
                                <div class="col-md-4 mb-3">
                                    <label for="marker_file" class="form-label">{{ __('ملف الماركر') }}</label>
                                    <input type="file" class="form-control" name="marker_file[]"
                                        accept="image/*,.pdf,.xlsx,.xls,.csv,.zip,.rar">
                                </div>

                                <!-- ✅ sku Input -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">{{ __('الكود') }}</label>
                                    <input type="text" class="form-control" name="sku[]" required>
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


    <!-- ✅ Bulk Manufacturing Modal -->
    <div class="modal fade" id="bulkManufacturingModal" tabindex="-1" aria-labelledby="bulkManufacturingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bulkManufacturingModalLabel">بدء التصنيع لأكثر من لون</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="bulk-manufacturing-form" action="{{ route('products.update.bulk-manufacture', $product->id) }}"
                    method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- ✅ Common Fields (Shared for all colors) -->
                        <div class="row border p-3 mb-3 bg-light">
                            <div class="col-md-3 mb-3">
                                <label for="expected_delivery" class="form-label">تاريخ الاستلام</label>
                                <input type="date" class="form-control" name="expected_delivery" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="order_delivery" class="form-label">تاريخ الطلب</label>
                                <input type="date" class="form-control" name="order_delivery" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="factory_id" class="form-label">المصنع</label>
                                <select name="factory_id" class="form-control bulk-tom-select-factory" required>
                                    <option value="">اختر المصنع</option>
                                    @foreach ($factories as $factory)
                                        <option value="{{ $factory->id }}">{{ $factory->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="material_id" class="form-label">الخامة</label>
                                <select name="material_id" class="form-control bulk-tom-select-material" required>
                                    <option value="">اختر الخامة</option>
                                    @foreach ($materials as $material)
                                        <option value="{{ $material->id }}">{{ $material->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- ✅ Color-Specific Fields -->
                        <div id="bulk-inputs-container"></div> <!-- ✅ Dynamic Inputs Go Here -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">ابدأ التصنيع</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
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

                    <!-- ✅ Pending Date Input (Initially Hidden) -->
                    <div id="pending-date-container" style="display: none;">
                        <label for="pending_date" class="form-label">تاريخ التأجيل</label>
                        <input type="date" id="pending_date" class="form-control">
                    </div>

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
                let checkedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;

                // ✅ Show the button only if two or more checkboxes are selected
                bulkManufacturingBtn.style.display = checkedCount >= 2 ? "block" : "none";
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
                let status = $(this).data("status");


                if (status === "stop") {
                    modalTitle = "إيقاف التصنيع";
                    $("#pending-date-container").hide(); // Hide pending date input
                    $("#pending_date").prop('required', false);
                } else if (status === "cancel") {
                    modalTitle = "إلغاء التصنيع";
                    $("#pending-date-container").hide(); // Hide pending date input
                    $("#pending_date").prop('required', false);
                } else if (status === "postponed") {
                    modalTitle = "تأجيل التصنيع";
                    $("#pending-date-container").show(); // Show pending date input
                    $("#pending_date").prop('required', true);
                }

                $("#statusModalLabel").text(modalTitle);
                $("#statusModal").modal("show");
            });

            $("#saveStatusBtn").off("click").on("click", function() {
                $.post("/products/variants/update-status", {
                    _token: "{{ csrf_token() }}",
                    variant_id: $("#variantId").val(),
                    product_id: $("#productId").val(),
                    status: $("#statusType").val(),
                    note: $("#statusNote").val().trim(),
                    pending_date: $("#pending_date").val() // Send pending date if applicable

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

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            new TomSelect('.bulk-tom-select-factory', {
                placeholder: "اختر المصنع"
            });
            new TomSelect('.bulk-tom-select-material', {
                placeholder: "اختر الخامه"
            });

            const bulkManufacturingBtn = document.getElementById("bulk-manufacturing-btn");

            bulkManufacturingBtn.addEventListener("click", function() {
                let checkboxes = document.querySelectorAll(".record-checkbox:checked");
                let container = document.getElementById("bulk-inputs-container");

                container.innerHTML = ""; // ✅ Clear previous inputs

                checkboxes.forEach(checkbox => {
                    let row = checkbox.closest("tr");
                    let colorName = row.cells[1].innerText; // ✅ Color Name
                    let colorId = checkbox.value;

                    let inputGroup = `
                    <div class="manufacturing-input-group row border p-3 mb-2">
                        <input type="hidden" name="color_ids[]" value="${colorId}">
    
                        <div class="col-md-6 mb-3">
                            <label class="form-label">اللون</label>
                            <input type="text" class="form-control" value="${colorName}" disabled>
                        </div>
    
                        <div class="col-md-2 mb-3">
                            <label for="quantity" class="form-label">الكمية</label>
                            <input type="number" class="form-control" name="quantities[]" min="1" required>
                        </div>
    
                        <div class="col-md-2 mb-3">
                            <label class="form-label">رقم الماركر</label>
                            <input type="text" class="form-control" name="marker_numbers[]">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">الكود</label>
                            <input type="text" class="form-control" name="sku[]" required>
                        </div>
                    </div>
                `;

                    container.innerHTML += inputGroup; // ✅ Append Inputs
                });

                $("#bulkManufacturingModal").modal("show"); // ✅ Show Modal
            });
        });
    </script>
@endsection
