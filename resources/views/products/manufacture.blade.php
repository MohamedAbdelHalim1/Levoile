@extends('layouts.app')

@section('styles')
    <style>
        .material-badge {
            display: inline-block;
            padding: 4px 8px;
            border: 1px solid #87CEEB;
            /* Baby blue border */
            border-radius: 4px;
            /* Small rounded corners */
            color: #333;
            /* Dark text */
            font-size: 14px;
            margin-right: 5px;
            /* Small spacing between items */
            background-color: transparent;
            /* No background */
        }
    </style>
@endsection
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

                <h1>{{ __('messages.start_manufacture') }}</h1>

                <!-- Color Details Table -->
                <div class="mb-3">
                    <table class="table table-bordered" id="color-details-table">
                        <thead class="table-dark">
                            <tr>
                                <th><input type="checkbox" id="select-all"></th> <!-- ✅ Select All Checkbox -->

                                <th>{{ __('messages.color') }}</th>
                                <th>{{ __('messages.status') }}</th>
                                <th>{{ __('messages.quantity') }}</th>
                                <th>{{ __('messages.factory') }}</th>
                                <th>{{ __('messages.material') }}</th>
                                <th>{{ __('messages.marker_number') }}</th>
                                <th>{{ __('messages.code') }}</th>
                                <th>{{ __('messages.operations') }}</th>
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
                                                    {{ __('messages.new') }}
                                                @break

                                                @case('processing')
                                                    {{ __('messages.processing') }}
                                                @break

                                                @case('postponed')
                                                    {{ __(' messages.postponed  ' . $variant->pending_date) }}
                                                @break

                                                @case('partial')
                                                    {{ __('messages.partial ') }}
                                                @break

                                                @case('complete')
                                                    {{ __('messages.complete ') }}
                                                @break

                                                @case('cancel')
                                                    {{ __('messages.cancel') }}
                                                @break

                                                @case('stop')
                                                    {{ __('messages.stop') }}
                                                @break

                                                @default
                                                    {{ __('messages.unknown') }}
                                            @endswitch
                                        </td>

                                        <td>{{ $variant->quantity ?? 0 }}</td>

                                        <td>
                                            {{ $variant->factory->name ?? __('messages.N/A') }}
                                        </td>

                                        <td class="materials-td" data-variant-id="{{ $variant->id }}"
                                            style="cursor:pointer;">
                                            @php
                                                // ✅ Fetch materials correctly
                                                $materials = $variant->materials
                                                    ->map(function ($item) {
                                                        return $item->material->name ?? '-'; // ✅ Get the actual material name
                                                    })
                                                    ->toArray();
                                            @endphp

                                            @if (count($materials) > 2)
                                                <span class="material-badge">{{ $materials[0] }}</span>
                                                <span class="material-badge">{{ $materials[1] }}</span>
                                                <a href="#" class="view-all-materials"
                                                    data-variant-id="{{ $variant->id }}">+{{ count($materials) - 2 }}</a>
                                            @else
                                                @foreach ($materials as $material)
                                                    <span class="material-badge">{{ $material }}</span>
                                                @endforeach
                                            @endif
                                        </td>


                                        <td>
                                            {{ $variant->marker_number ?? __('messages.N/A') }}
                                            @if (!empty($variant->marker_file))
                                                <a href="{{ asset($variant->marker_file) }}" download class="ms-2">
                                                    <i class="bi bi-download" title="Download Marker File"></i>
                                                </a>
                                            @endif
                                        </td>

                                        <td>
                                            {{ $variant->sku ??  __('messages.N/A') }}
                                        </td>

                                        <td>
                                            <!-- ✅ New Button for Assigning Materials -->
                                            <button type="button" class="btn btn-info assign-material-btn"
                                                data-variant-id="{{ $variant->id }}" data-bs-toggle="modal"
                                                data-bs-target="#assignMaterialsModal">
                                                {{ __('messages.add_materials') }}
                                            </button>
                                            @if ($variant->quantity > 0)
                                                <button type="button" class="btn btn-warning start-manufacturing-btn"
                                                    data-color-id="{{ $productColor->id }}"
                                                    data-color-name="{{ $productColor->color->name }}"
                                                    data-bs-toggle="modal" data-bs-target="#manufacturingModal">
                                                    {{ __('messages.edit_manufacturing') }}
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-primary start-manufacturing-btn"
                                                    data-color-id="{{ $productColor->id }}"
                                                    data-color-name="{{ $productColor->color->name }}"
                                                    data-bs-toggle="modal" data-bs-target="#manufacturingModal">
                                                    {{ __('messages.start_manufacturing') }}
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-secondary stop-btn"
                                                data-variant-id="{{ $variant->id }}"
                                                data-product-id="{{ $product->id }}" data-status="stop"
                                                data-bs-toggle="modal" data-bs-target="#statusModal">
                                                {{ __('messages.stop') }}
                                            </button>

                                            <button type="button" class="btn btn-danger cancel-btn"
                                                data-variant-id="{{ $variant->id }}"
                                                data-product-id="{{ $product->id }}" data-status="cancel"
                                                data-bs-toggle="modal" data-bs-target="#statusModal">
                                                {{ __('messages.cancel') }}
                                            </button>

                                            <button type="button" class="btn btn-warning postpone-btn"
                                                data-variant-id="{{ $variant->id }}"
                                                data-product-id="{{ $product->id }}" data-status="postponed"
                                                data-bs-toggle="modal" data-bs-target="#statusModal">
                                                {{ __('messages.postponed') }}
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="mt-4 d-flex">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">{{ __('messages.back') }}</a>
                    <button type="button" class="btn btn-success ms-2" id="bulk-manufacturing-btn" style="display: none;">
                        {{ __('messages.start_manufacturing') }}
                    </button> <!-- ✅ Bulk Manufacturing Button (Hidden Initially) -->
                </div>
            </div>
        </div>
    </div>



    <!-- ✅ Assign Materials Modal -->
    <div class="modal fade" id="assignMaterialsModal" tabindex="-1" aria-labelledby="assignMaterialsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignMaterialsModalLabel">{{ __('messages.add_materials') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="assign-materials-form" action="{{ route('products.assign.materials') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="variant_id" id="modal-variant-id">

                        <label for="materials" class="form-label">{{ __('messages.materials') }}</label>
                        <select name="materials[]" id="materials" class="form-control tom-select-materials" multiple
                            required>
                            <option value="">{{ __('messages.choose_materials') }}</option>
                            @foreach ($all_materials as $material)
                                <option value="{{ $material->id }}">{{ $material->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{ __('messages.save') }}</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- ✅ Materials List Modal -->
    <div class="modal fade" id="materialsModal" tabindex="-1" aria-labelledby="materialsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="materialsModalLabel">{{ __('messages.materials') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="materialsList"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.close') }}</button>
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
                    <h5 class="modal-title" id="manufacturingModalLabel">{{ __('messages.start_manufacture') }}</h5>
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
                                    <label class="form-label">{{ __('messages.color') }}</label>
                                    <input type="text" class="form-control color-name-field" value="" disabled>
                                </div>


                                <div class="col-md-4 mb-3">
                                    <label for="expected_delivery" class="form-label">{{ __('messages.expected_delivery_date') }}</label>
                                    <input type="date" class="form-control" name="expected_delivery[]" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="order_delivery" class="form-label">{{ __('messages.order_delivery_date') }}</label>
                                    <input type="date" class="form-control" name="order_delivery[]" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="quantity" class="form-label">{{ __('messages.quantity') }}</label>
                                    <input type="number" class="form-control" name="quantity[]" min="1"
                                        required>
                                </div>

                                <!-- ✅ Factory Selection -->
                                <div class="col-md-4 mb-3 factory-container">
                                    <label for="factory_id" class="form-label">{{ __('messages.factory') }}</label>
                                    <select name="factory_id[]" class="tom-select-factory" required>
                                        <option value="">{{ __('messages.choose_factory') }}</option>
                                        @foreach ($factories as $factory)
                                            <option value="{{ $factory->id }}">{{ $factory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- ✅ Marker Number Input -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">{{ __('messages.marker_number') }}</label>
                                    <input type="text" class="form-control" name="marker_number[]">
                                </div>

                                <!-- ✅ Marker File Upload -->
                                <div class="col-md-4 mb-3">
                                    <label for="marker_file" class="form-label">{{ __('messages.marker_file') }}</label>
                                    <input type="file" class="form-control" name="marker_file[]"
                                        accept="image/*,.pdf,.xlsx,.xls,.csv,.zip,.rar">
                                </div>

                                <!-- ✅ sku Input -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">{{ __('messages.sku') }}</label>
                                    <input type="text" class="form-control" name="sku[]" required>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{ __('messages.start') }}</button>
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('messages.close') }}</button>
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
                    <h5 class="modal-title" id="bulkManufacturingModalLabel">{{ __('messages.bulk_manufacturing') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="bulk-manufacturing-form" action="{{ route('products.update.bulk-manufacture', $product->id) }}"
                    method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- ✅ Common Fields (Shared for all colors) -->
                        <div class="row border p-3 mb-3 bg-light">
                            <div class="col-md-3 mb-3">
                                <label for="expected_delivery" class="form-label">{{ __('messages.expected_delivery_date') }}</label>
                                <input type="date" class="form-control" name="expected_delivery" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="order_delivery" class="form-label">{{ __('messages.order_delivery_date') }}</label>
                                <input type="date" class="form-control" name="order_delivery" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="factory_id" class="form-label">{{ __('messages.factory') }}</label>
                                <select name="factory_id" class="form-control bulk-tom-select-factory" required>
                                    <option value="">{{ __('messages.choose_factory') }}</option>
                                    @foreach ($factories as $factory)
                                        <option value="{{ $factory->id }}">{{ $factory->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <!-- ✅ Color-Specific Fields -->
                        <div id="bulk-inputs-container"></div> <!-- ✅ Dynamic Inputs Go Here -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{ __('messages.start') }}</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.close') }}</button>
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
                    <h5 class="modal-title" id="statusModalLabel">{{ __('messages.add_note') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="variantId">
                    <input type="hidden" id="productId">
                    <input type="hidden" id="statusType">

                    <!-- ✅ Pending Date Input (Initially Hidden) -->
                    <div id="pending-date-container" style="display: none;">
                        <label for="pending_date" class="form-label">{{ __('messages.pending_date') }}</label>
                        <input type="date" id="pending_date" class="form-control">
                    </div>

                    <label for="statusNote" class="form-label">{{ __('messages.notes') }}</label>
                    <textarea id="statusNote" class="form-control" rows="3" placeholder="{{ __('messages.add_note') }}"></textarea>

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
        document.addEventListener("DOMContentLoaded", function() {
            // ✅ Initialize TomSelect for Materials in Assign Materials Modal
            let materialSelect = new TomSelect('.tom-select-materials', {
                plugins: ['remove_button'],
                placeholder: "{{ __('messages.choose_material') }}"
            });

            // ✅ Initialize TomSelect for Factories in Both Modals
            let factorySelects = document.querySelectorAll('.tom-select-factory');
            factorySelects.forEach(select => {
                new TomSelect(select, {
                    placeholder: "{{ __('messages.choose_factory') }}"
                });
            });

            let bulkFactorySelect = new TomSelect('.bulk-tom-select-factory', {
                placeholder: "{{ __('messages.choose_factory') }}"
            });

            document.getElementById('add-manufacturing-inputs').addEventListener('click', function() {
                let container = document.getElementById('additional-inputs-container');
                let original = document.querySelector('.manufacturing-input-group');

                // Clone the original row
                let newElement = original.cloneNode(true);

                // Clear input values except for the color name field
                newElement.querySelectorAll('input, select').forEach(element => {
                    if (!element.classList.contains("color-name-field")) {
                        element.value = "";
                    }
                });

                // ✅ Fix for TomSelect Dropdown (Factory Selection)
                let factoryDropdown = newElement.querySelector('.tom-select-factory');
                if (factoryDropdown) {
                    // Remove old TomSelect instance if exists
                    if (factoryDropdown.tomselect) {
                        factoryDropdown.tomselect.destroy();
                    }

                    // Create a fresh new dropdown element to prevent conflicts
                    let newDropdown = document.createElement("select");
                    newDropdown.className = "tom-select-factory form-control";
                    newDropdown.name = "factory_id[]"; // ✅ Ensure correct name

                    // ✅ Re-add factory options from Laravel Blade (Fixing Duplicate Variable Issue)
                    @foreach ($factories as $factory)
                        {
                            let optionItem = document.createElement("option");
                            optionItem.value = "{{ $factory->id }}";
                            optionItem.text = "{{ $factory->name }}";
                            newDropdown.appendChild(optionItem);
                        }
                    @endforeach

                    // Replace the old dropdown with the new one
                    factoryDropdown.parentNode.replaceChild(newDropdown, factoryDropdown);

                    // ✅ Initialize TomSelect for the new factory dropdown
                    new TomSelect(newDropdown);
                }

                // Append the new row to the container
                container.appendChild(newElement);
            });




            // ✅ Ensure dropdowns are initialized when modal opens
            $('#manufacturingModal').on('shown.bs.modal', function() {
                document.querySelectorAll('.tom-select-factory').forEach(select => {
                    if (!select.tomselect) {
                        new TomSelect(select, {
                            placeholder: "{{ __('messages.choose_factory') }}"
                        });
                    }
                });
            });



            // ✅ Ensure dropdown updates when opening the Assign Materials modal
            $('#assignMaterialsModal').on('shown.bs.modal', function() {
                materialSelect.clear();
                materialSelect.refreshOptions();
            });

            // ✅ When clicking "اضف الخامات" button, set variant ID in modal
            $(".assign-material-btn").on("click", function() {
                let variantId = $(this).data("variant-id");
                $("#modal-variant-id").val(variantId);
            });

            // ✅ Handle Assign Materials Form Submission
            $("#assign-materials-form").on("submit", function(event) {
                event.preventDefault();

                let form = $(this);
                let formData = form.serialize();

                $.post(form.attr("action"), formData)
                    .done(response => {
                        alert("تم تحديث الخامات بنجاح!");
                        $("#assignMaterialsModal").modal("hide");
                        location.reload();
                    })
                    .fail(xhr => alert("خطأ: " + xhr.responseJSON.message));
            });
        });
    </script>

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
                    modalTitle = "{{ __('messages.stop') }}";
                    $("#pending-date-container").hide();
                    $("#pending_date").prop('required', false);
                } else if (status === "cancel") {
                    modalTitle = "{{ __('messages.cancel') }}";
                    $("#pending-date-container").hide();
                    $("#pending_date").prop('required', false);
                } else if (status === "postponed") {
                    modalTitle = "{{ __('messages.postponed') }}";
                    $("#pending-date-container").show();
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
                    pending_date: $("#pending_date").val()

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
            $(".materials-td").on("click", function() {
                let variantId = $(this).data("variant-id");

                $.ajax({
                    url: "/products/get-materials/" + variantId,
                    method: "GET",
                    success: function(response) {
                        let materialsList = $("#materialsList");
                        materialsList.empty();

                        response.materials.forEach(material => {
                            let listItem = `<li class="d-flex justify-content-between align-items-center">
                                ${material.name}
                                <button class="btn btn-sm btn-danger delete-material" data-id="${material.id}">حذف</button>
                            </li>`;
                            materialsList.append(listItem);
                        });

                        $("#materialsModal").modal("show");
                    }
                });
            });

            $(document).on("click", ".delete-material", function() {
                let materialId = $(this).data("id");

                if (confirm("{{ __('messages.are_you_sure') }}")) {
                    $.ajax({
                        url: "/delete-material/" + materialId,
                        method: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            alert("{{ __('messages.material_deleted_successfully') }}");
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const bulkManufacturingBtn = document.getElementById("bulk-manufacturing-btn");

            bulkManufacturingBtn.addEventListener("click", function() {
                let checkboxes = document.querySelectorAll(".record-checkbox:checked");
                let container = document.getElementById("bulk-inputs-container");

                container.innerHTML = "";

                checkboxes.forEach(checkbox => {
                    let row = checkbox.closest("tr");
                    let colorName = row.cells[1].innerText;
                    let colorId = checkbox.value;

                    let inputGroup = `
                    <div class="manufacturing-input-group row border p-3 mb-2">
                        <input type="hidden" name="color_ids[]" value="${colorId}">
    
                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ __('messages.color') }}</label>
                            <input type="text" class="form-control" value="${colorName}" disabled>
                        </div>
    
                        <div class="col-md-2 mb-3">
                            <label for="quantity" class="form-label">{{ __('messages.quantity') }}</label>
                            <input type="number" class="form-control" name="quantities[]" min="1" required>
                        </div>
    
                        <div class="col-md-2 mb-3">
                            <label class="form-label">{{ __('messages.marker_number') }} </label>
                            <input type="text" class="form-control" name="marker_numbers[]">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">{{ __('messages.sku') }}</label>
                            <input type="text" class="form-control" name="sku[]" required>
                        </div>
                    </div>
                `;

                    container.innerHTML += inputGroup;
                });

                $("#bulkManufacturingModal").modal("show");
            });
        });
    </script>
@endsection
