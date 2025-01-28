@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
                <h1>{{ __('إضافة منتج') }}</h1>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="description" class="form-label">{{ __('الوصف') }}</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="category_id" class="form-label">{{ __('الفئه') }}</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="">{{ __('اختر فئه') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="col-md-4 mb-3">
                            <label for="season_id" class="form-label">{{ __('الموسم') }}</label>
                            <select class="form-control" id="season_id" name="season_id" required>
                                <option value="">{{ __('اختر الموسم') }}</option>
                                @foreach ($seasons as $season)
                                    <option value="{{ $season->id }}">{{ $season->name }}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="col-md-4 mb-3">
                            <label for="factory_id" class="form-label">{{ __('المصنع') }}</label>
                            <select class="form-control" id="factory_id" name="factory_id" required>
                                <option value="">{{ __('اختر المصنع') }}</option>
                                @foreach ($factories as $factory)
                                    <option value="{{ $factory->id }}">{{ $factory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">{{ __('الصورة') }}</label>
                        <input type="file" class="form-control" id="photo" name="photo" required>
                    </div>

                    <div class="mb-3">
                        <label for="marker_number" class="form-label">{{ __('رقم الماركر') }}</label>
                        <input type="text" class="form-control" id="marker_number" name="marker_number" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('حاله مخزون الخامات') }}</label>
                        <div class="d-flex align-items-center">
                            <div class="form-check me-3">
                                <input type="radio" id="stock_yes" name="have_stock" value="1" class="form-check-input" required>
                                <label for="stock_yes" class="form-check-label" style="margin: 10px;">{{ __('نعم') }}</label>
                            </div>
                            <div class="form-check me-3">
                                <input type="radio" id="stock_no" name="have_stock" value="0" class="form-check-input">
                                <label for="stock_no" class="form-check-label" style="margin: 10px;">{{ __('لا') }}</label>
                            </div>
                            <div class="flex-grow-1">
                                <input type="text" class="form-control" id="material_name" name="material_name" placeholder="{{ __('اسم المواد ') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Color Selection -->
                    <div class="mb-3">
                        <label for="color_id" class="form-label">{{ __(' اللون') }}</label>
                        <select class="form-control" id="color_id">
                            <option value="">{{ __('اختر اللون') }}</option>
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
                                <!-- Dynamic rows will be added here -->
                            </tbody>
                        </table>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('اضافه') }}</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Tom Select
            new TomSelect('#category_id', { placeholder: "اختر الفئة" });
            new TomSelect('#season_id', { placeholder: "اختر الموسم" });
            new TomSelect('#factory_id', { placeholder: "اختر المصنع" });
            new TomSelect('#color_id', { placeholder: "اختر اللون" });

            // Handle color dropdown selection
            document.querySelector('#color_id').addEventListener('change', function () {
                let colorId = this.value;
                let colorName = this.options[this.selectedIndex].text;

                if (colorId) {
                    // Check if the color already exists in the table
                    if (document.querySelector(`[data-color-id="${colorId}"]`)) {
                        alert("هذا اللون مضاف من قبل");
                        return;
                    }

                    // Add row to the table
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
                                <button type="button" class="btn btn-danger remove-row">{{ __('حذف') }}</button>
                            </td>
                        </tr>
                    `;
                    document.querySelector('#color-details-table tbody').insertAdjacentHTML('beforeend', rowHtml);
                    this.value = ''; // Reset dropdown
                }
            });

            // Handle remove button
            document.querySelector('#color-details-table').addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-row')) {
                    e.target.closest('tr').remove();
                }
            });
        });
    </script>
@endsection
