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

                <h1>{{ __('تعديل منتج') }}</h1>
                <form id="update-product-form" action="{{ route('products.update', $product->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Product Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">{{ __('الوصف') }}</label>
                        <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
                    </div>

                    <div class="row">
                        <!-- Product Category -->
                        <div class="col-md-4 mb-3">
                            <label for="category_id" class="form-label">{{ __('الفئه') }}</label>
                            <select id="category_id" name="category_id" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Product Season -->
                        <div class="col-md-4 mb-3">
                            <label for="season_id" class="form-label">{{ __('الموسم') }}</label>
                            <select id="season_id" name="season_id" required>
                                @foreach ($seasons as $season)
                                    <option value="{{ $season->id }}"
                                        {{ $product->season_id == $season->id ? 'selected' : '' }}>
                                        {{ $season->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Product Factory -->
                        <div class="col-md-4 mb-3">
                            <label for="factory_id" class="form-label">{{ __('المصنع') }}</label>
                            <select id="factory_id" name="factory_id" required>
                                @foreach ($factories as $factory)
                                    <option value="{{ $factory->id }}"
                                        {{ $product->factory_id == $factory->id ? 'selected' : '' }}>
                                        {{ $factory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <!-- Product Photo -->
                    <div class="mb-3">
                        <label for="photo" class="form-label">{{ __('الصورة') }}</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                        @if ($product->photo)
                            <img src="{{ asset($product->photo) }}" alt="Product Image" class="mt-3"
                                style="max-width: 200px;">
                        @endif
                    </div>

                    <!-- Marker Number -->
                    <div class="mb-3">
                        <label for="marker_number" class="form-label">{{ __('العلامه التجاريه') }}</label>
                        <input type="text" class="form-control" id="marker_number" name="marker_number"
                            value="{{ $product->marker_number }}" required>
                    </div>

                    <!-- Have Stock -->
                    <div class="mb-3">
                        <label class="form-label d-block">{{ __('متوفر؟') }}</label>
                        <div class="d-flex align-items-center gap-3">
                            <div class="form-check">
                                <input type="radio" id="stock_yes" name="have_stock" value="1"
                                    class="form-check-input" {{ $product->have_stock ? 'checked' : '' }} required>
                                <label for="stock_yes" class="form-check-label"
                                    style="margin: 10px;">{{ __('نعم') }}</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="stock_no" name="have_stock" value="0"
                                    class="form-check-input" {{ !$product->have_stock ? 'checked' : '' }}>
                                <label for="stock_no" class="form-check-label"
                                    style="margin: 10px;">{{ __('لا') }}</label>
                            </div>
                            <div class="flex-grow-1">
                                <input type="text" class="form-control" id="material_name" name="material_name"
                                    value="{{ $product->material_name ?? '' }}" placeholder="{{ __('اسم المواد') }}">
                            </div>
                        </div>
                    </div>


                    <!-- Add New Color -->
                    <div class="mb-3">
                        <label for="new_color_id" class="form-label">{{ __('اللون') }}</label>
                        <select id="new_color_id">
                            <option value="">{{ __('اختر لون') }}</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Color Details Table -->
                    <div class="mb-3">
                        <table class="table table-bordered" id="color-details-table">
                            <thead class="table-dark">
                                <tr>
                                    <th>{{ __('اللون') }}</th>
                                    <th>{{ __('تاريخ الاستلام') }}</th>
                                    <th>{{ __('الكمية') }}</th>
                                    <th>{{ __('العمليات') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product->productColors as $productColor)
                                    <tr data-color-id="{{ $productColor->color_id }}">
                                        <td>
                                            <input type="hidden" name="colors[{{ $productColor->color_id }}][color_id]"
                                                value="{{ $productColor->color_id }}">
                                            {{ $productColor->color->name }}
                                        </td>
                                        <td>
                                            <input type="date" class="form-control"
                                                name="colors[{{ $productColor->color_id }}][expected_delivery]"
                                                value="{{ $productColor->expected_delivery ?? '' }}" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control"
                                                name="colors[{{ $productColor->color_id }}][quantity]"
                                                value="{{ $productColor->quantity ?? '' }}" min="1" required>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger delete-color"
                                                data-id="{{ $productColor->id }}">{{ __('حذف') }}</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('تحديث') }}</button>
                </form>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize Tom Select for all select elements
            new TomSelect("#category_id", {
                searchField: "text"
            });
            new TomSelect("#season_id", {
                searchField: "text"
            });
            new TomSelect("#factory_id", {
                searchField: "text"
            });
            new TomSelect("#new_color_id", {
                searchField: "text"
            });

            // Add new color
            document.getElementById("new_color_id").addEventListener("change", function() {
                const colorId = this.value;
                const colorName = this.options[this.selectedIndex].text;

                if (colorId) {
                    if (document.querySelector(
                        `#color-details-table tbody tr[data-color-id="${colorId}"]`)) {
                        alert("هذا اللون مضاف من قبل");
                        return;
                    }

                    const rowHtml = `
                    <tr data-color-id="${colorId}">
                        <td>
                            <input type="hidden" name="colors[${colorId}][color_id]" value="${colorId}">
                            ${colorName}
                        </td>
                        <td>
                            <input type="date" class="form-control" name="colors[${colorId}][expected_delivery]" required>
                        </td>
                        <td>
                            <input type="number" class="form-control" name="colors[${colorId}][quantity]" min="1" required>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger remove-row">{{ __('حذف') }}</button>
                        </td>
                    </tr>
                `;
                    document.querySelector("#color-details-table tbody").insertAdjacentHTML("beforeend",
                        rowHtml);
                    this.value = "";
                }
            });

            // Remove color row
            document.addEventListener("click", function(e) {
                if (e.target && e.target.classList.contains("remove-row")) {
                    e.target.closest("tr").remove();
                }
            });

            // Delete color via AJAX
            document.addEventListener("click", function(e) {
                if (e.target && e.target.classList.contains("delete-color")) {
                    const colorId = e.target.dataset.id;
                    const row = e.target.closest("tr");

                    if (confirm("هل أنت متأكد من حذف هذا اللون؟")) {
                        fetch(`/product-color/${colorId}`, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                            })
                            .then((response) => response.json())
                            .then((data) => {
                                if (data.status === "success") {
                                    row.remove();
                                    alert(data.message);
                                } else {
                                    alert("Error: " + data.message);
                                }
                            })
                            .catch((error) => {
                                alert("Error: " + error.message);
                            });
                    }
                }
            });
        });
    </script>
@endsection
