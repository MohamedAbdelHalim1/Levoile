@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
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

            <h1>{{ __('Edit Product') }}</h1>
            <form id="update-product-form" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Product Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
                </div>

                <!-- Product Category -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">{{ __('Category') }}</label>
                    <select class="selectpicker form-control" id="category_id" name="category_id" data-live-search="true" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Product Season -->
                <div class="mb-3">
                    <label for="season_id" class="form-label">{{ __('Season') }}</label>
                    <select class="selectpicker form-control" id="season_id" name="season_id" data-live-search="true" required>
                        @foreach ($seasons as $season)
                            <option value="{{ $season->id }}" {{ $product->season_id == $season->id ? 'selected' : '' }}>
                                {{ $season->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Product Factory -->
                <div class="mb-3">
                    <label for="factory_id" class="form-label">{{ __('Factory') }}</label>
                    <select class="selectpicker form-control" id="factory_id" name="factory_id" data-live-search="true" required>
                        @foreach ($factories as $factory)
                            <option value="{{ $factory->id }}" {{ $product->factory_id == $factory->id ? 'selected' : '' }}>
                                {{ $factory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Product Photo -->
                <div class="mb-3">
                    <label for="photo" class="form-label">{{ __('Photo') }}</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                    @if ($product->photo)
                        <img src="{{ asset($product->photo) }}" alt="Product Image" class="mt-3" style="max-width: 200px;">
                    @endif
                </div>

                <!-- Marker Number -->
                <div class="mb-3">
                    <label for="marker_number" class="form-label">{{ __('Marker Number') }}</label>
                    <input type="text" class="form-control" id="marker_number" name="marker_number" value="{{ $product->marker_number }}" required>
                </div>

                <!-- Have Stock -->
                <div class="mb-3">
                    <label>{{ __('Material Availability?') }}</label>
                    <div class="d-flex align-items-center">
                        <div class="form-check me-3">
                            <input type="radio" id="stock_yes" name="have_stock" value="1" class="form-check-input" {{ $product->have_stock ? 'checked' : '' }} required>
                            <label for="stock_yes" class="form-check-label">{{ __('Yes') }}</label>
                        </div>
                        <div class="form-check me-3">
                            <input type="radio" id="stock_no" name="have_stock" value="0" class="form-check-input" {{ !$product->have_stock ? 'checked' : '' }}>
                            <label for="stock_no" class="form-check-label">{{ __('No') }}</label>
                        </div>
                        <div class="flex-grow-1">
                            <input type="text" class="form-control" id="material_name" name="material_name" value="{{ $product->material_name ?? '' }}" placeholder="{{ __('Material Name') }}">
                        </div>
                    </div>
                </div>

                <!-- Add New Color -->
                <div class="mb-3">
                    <label for="new_color_id" class="form-label">{{ __('Add New Color') }}</label>
                    <select class="selectpicker form-control" id="new_color_id" data-live-search="true">
                        <option value="">{{ __('Select a color') }}</option>
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
                                <th>{{ __('Color Name') }}</th>
                                <th>{{ __('Expected Delivery') }}</th>
                                <th>{{ __('Quantity') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->productColors as $productColor)
                                @php
                                    $variant = $productColor->productcolorvariants->first();
                                @endphp
                                <tr data-color-id="{{ $productColor->color_id }}">
                                    <td>
                                        <input type="hidden" name="colors[{{ $productColor->color_id }}][color_id]" value="{{ $productColor->color_id }}">
                                        {{ $productColor->color->name }}
                                    </td>
                                    <td>
                                        <input type="date" class="form-control" name="colors[{{ $productColor->color_id }}][expected_delivery]" value="{{ $variant->expected_delivery ?? '' }}" required>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="colors[{{ $productColor->color_id }}][quantity]" value="{{ $variant->quantity ?? '' }}" min="1" required>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger delete-color" data-id="{{ $productColor->id }}">{{ __('Delete') }}</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('Update Product') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function () {
        $('.selectpicker').selectpicker();

        // Add new color
        $('#new_color_id').on('change', function () {
            let colorId = $(this).val();
            let colorName = $(this).find('option:selected').text();

            if (colorId) {
                if ($('#color-details-table tbody').find(`tr[data-color-id="${colorId}"]`).length > 0) {
                    alert("This color is already added.");
                    return;
                }

                let rowHtml = `
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
                            <button type="button" class="btn btn-danger remove-row">{{ __('Remove') }}</button>
                        </td>
                    </tr>
                `;
                $('#color-details-table tbody').append(rowHtml);
            }
        });

        // Remove color
        $(document).on('click', '.remove-row', function () {
            $(this).closest('tr').remove();
        });

        // Delete color via AJAX
        $(document).on('click', '.delete-color', function () {
            const colorId = $(this).data('id');
            const row = $(this).closest('tr');

            if (confirm('Are you sure you want to delete this color?')) {
                $.ajax({
                    url: `/product-color/${colorId}`,
                    type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function (response) {
                        if (response.status === 'success') {
                            row.remove();
                            alert(response.message);
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function (xhr) {
                        alert('Error: ' + xhr.responseJSON.message);
                    }
                });
            }
        });
    });
</script>
@endsection
