@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
                <h1>{{ __('إضافة منتج') }}</h1>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="description" class="form-label">{{ __('الاسم') }}</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="category_id" class="form-label">{{ __('القسم') }}</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="">{{ __('اختر قسم') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="col-md-6 mb-3">
                            <label for="season_id" class="form-label">{{ __('الموسم') }}</label>
                            <select class="form-control" id="season_id" name="season_id" required>
                                <option value="">{{ __('اختر الموسم') }}</option>
                                @foreach ($seasons as $season)
                                    <option value="{{ $season->id }}">{{ $season->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="photo" class="form-label">{{ __('الصورة') }}</label>
                        <input type="file" class="form-control" id="photo" name="photo" required>
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
