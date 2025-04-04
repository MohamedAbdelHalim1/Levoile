@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="alert alert-primary" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">x</button>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Filters Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-4">
                <div class="row">
                    <!-- Category Filter -->
                    <div class="col-md-4">
                        <label for="categoryFilter">{{ __('القسم') }}</label>
                        <select id="categoryFilter" class="ts-filter">
                            <option value="">{{ __('كل الفئات') }}</option>
                            @foreach ($product_color_variants->pluck('productcolor.product.category.name')->unique()->filter() as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Season Filter -->
                    <div class="col-md-4">
                        <label for="seasonFilter">{{ __('الموسم') }}</label>
                        <select id="seasonFilter" class="ts-filter">
                            <option value="">{{ __('كل المواسم') }}</option>
                            @foreach ($product_color_variants->pluck('productcolor.product.season.name')->unique()->filter() as $season)
                                <option value="{{ $season }}">{{ $season }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Factory Filter -->
                    {{-- <div class="col-md-4">
                        <label for="factoryFilter">{{ __('المصنع') }}</label>
                        <select id="factoryFilter" class="ts-filter">
                            <option value="">{{ __('كل المصانع') }}</option>
                            @foreach ($product_color_variants->pluck('productcolor.product.factory.name')->unique()->filter() as $factory)
                                <option value="{{ $factory }}">{{ $factory }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <!-- Status Filter -->
                    <div class="col-md-4">
                        <label for="statusFilter">{{ __('الحالة') }}</label>
                        <select id="statusFilter" class="ts-filter">
                            <option value="">{{ __('كل الحالات') }}</option>
                            <option value="new">{{ __('جديد') }}</option>
                            <option value="partial">{{ __('جزئي') }}</option>
                            <option value="complete">{{ __('مكتمل') }}</option>
                            <option value="processing">{{ __('قيد التصنيع') }}</option>
                            <option value="pending">{{ __('قيد الانتظار') }}</option>
                            <option value="stop">{{ __('متوقف') }}</option>
                            <option value="cancel">{{ __('ملغي') }}</option>
                            <option value="postponed">{{ __('مؤجل') }}</option>
                        </select>
                    </div>

                    <!-- Variant Status Filter -->
                    <div class="col-md-3 mt-3">
                        <label for="variantStatusFilter">{{ __('حالة اللون') }}</label>
                        <select id="variantStatusFilter" class="ts-filter">
                            <option value="">{{ __('كل الحالات') }}</option>
                            <option value="new">{{ __('جديد') }}</option>
                            <option value="partial">{{ __('جزئي') }}</option>
                            <option value="complete">{{ __('مكتمل') }}</option>
                            <option value="processing">{{ __('قيد التصنيع') }}</option>
                            <option value="pending">{{ __('قيد الانتظار') }}</option>
                            <option value="stop">{{ __('متوقف') }}</option>
                            <option value="cancel">{{ __('ملغي') }}</option>
                            <option value="postponed">{{ __('مؤجل') }}</option>
                        </select>
                    </div>

                    <!-- Expected Delivery Date Range -->
                    <div class="col-md-6 mt-3">
                        <label for="expectedDeliveryStart">{{ __('تاريخ التوصيل المتوقع') }}</label>
                        <div class="input-group">
                            <input type="date" id="expectedDeliveryStart" class="form-control"
                                placeholder="{{ __('بداية التاريخ') }}">
                            <span class="input-group-text">-</span>
                            <input type="date" id="expectedDeliveryEnd" class="form-control"
                                placeholder="{{ __('نهاية التاريخ') }}">
                        </div>
                    </div>

                    <!-- Filter and Reset Buttons -->
                    <div class="col-md-3 mt-3 d-flex align-items-end">
                        <button id="applyFilterBtn" class="btn btn-primary me-2">{{ __('عرض') }}</button>
                        <button id="resetFilterBtn" class="btn btn-secondary">{{ __('الغاء') }}</button>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>{{ __('الصورة') }}</th>
                            <th>{{ __('اللون') }}</th>
                            <th>{{ __('الوصف') }}</th>
                            <th>{{ __('الكود') }}</th>
                            <th>{{ __('القسم') }}</th>
                            <th>{{ __('الموسم') }}</th>
                            <th>{{ __('موعد الطرح') }}</th>
                            <th>{{ __('المصنع') }}</th>
                            <th>{{ __('حالة التصنيع') }}</th>
                            <th>{{ __('حالة التسليم ') }}</th>
                            <th>{{ __('الكمية') }}</th>
                            <th>{{ __('الكمية المستلمة') }}</th>
                            <th>{{ __('الرقم التسلسلي') }}</th>
                            <th>{{ __('تاريخ التوصيل') }}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product_color_variants as $variant)
                            <tr>
                                <td>
                                    @if ($variant->productcolor->product->photo)
                                        <img src="{{ asset($variant->productcolor->product->photo) }}" alt="Product Image"
                                            style="width: 100px; height: auto;">
                                    @else
                                        {{ __('لا يتوفر صورة') }}
                                    @endif
                                </td>
                                <td>{{ $variant->productcolor->color->name ?? __('لا يوجد') }}</td>
                                <td>{{ $variant->productcolor->product->description ?? __('لا يوجد') }}</td>
                                <td>{{ $variant->productcolor->product->code ?? __('لا يوجد') }}</td>
                                <td>{{ $variant->productcolor->product->category->name ?? __('لا يوجد') }}</td>
                                <td>{{ $variant->productcolor->product->season->name ?? __('لا يوجد') }}</td>
                                <td>{{ $variant->productcolor->product->store_launch ?? __('لا يوجد') }}</td>
                                <td>{{ $variant->factory->name ?? __('لا يوجد') }}</td>
                                <td>
                                    @if ($variant->status === 'new')
                                        <span class="badge bg-success">{{ __('جديد ') }}</span>
                                    @elseif ($variant->status === 'partial')
                                        <span class="badge bg-warning">{{ __('جزئي') }}</span>
                                    @elseif ($variant->status === 'processing')
                                        <span class="badge bg-danger">{{ __('قيد التصنيع') }}</span>
                                    @elseif ($variant->status === 'complete')
                                        <span class="badge bg-success">{{ __('مكتمل') }}</span>
                                    @elseif ($variant->status === 'cancel')
                                        <span class="badge bg-danger">{{ __('ملغي') }}</span>
                                    @elseif ($variant->status === 'pending')
                                        <span class="badge bg-info">{{ __('قيد الانتظار') }}</span>
                                    @elseif ($variant->status === 'postponed')
                                        <span class="badge bg-info">{{ __('مؤجل') }}</span>
                                    @elseif ($variant->status === 'stop')
                                        <span class="badge bg-danger">{{ __('متوقف') }}</span>
                                    @else
                                        {{ $variant->status ?? __('لا يوجد') }}
                                    @endif
                                </td>
                                <td>
                                    @if ($variant->receiving_status === 'new')
                                        <span class="badge bg-success">{{ __('جديد ') }}</span>
                                    @elseif ($variant->receiving_status === 'partial')
                                        <span class="badge bg-warning">{{ __('جزئي') }}</span>
                                    @elseif ($variant->receiving_status === 'processing')
                                        <span class="badge bg-danger">{{ __('قيد التصنيع') }}</span>
                                    @elseif ($variant->receiving_status === 'complete')
                                        <span class="badge bg-success">{{ __('مكتمل') }}</span>
                                    @elseif ($variant->receiving_status === 'cancel')
                                        <span class="badge bg-danger">{{ __('ملغي') }}</span>
                                    @elseif ($variant->receiving_status === 'pending')
                                        <span class="badge bg-info">{{ __('قيد الانتظار') }}</span>
                                    @elseif ($variant->receiving_status === 'postponed')
                                        <span class="badge bg-info">{{ __('مؤجل') }}</span>
                                    @elseif ($variant->receiving_status === 'stop')
                                        <span class="badge bg-danger">{{ __('متوقف') }}</span>
                                    @else
                                        {{ $variant->receiving_status ?? __('لا يوجد') }}
                                    @endif
                                </td>
                                <td>{{ $variant->quantity ?? 0 }}</td>
                                <td>{{ $variant->receiving_quantity ?? 0 }}</td>
                                <td>{{ $variant->productcolor->sku ?? __('لا يوجد') }}</td>
                                <td>{{ $variant->expected_delivery ?? __('لا يوجد') }}</td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Apply Tom Select to all dropdowns with class 'ts-filter'
            document.querySelectorAll(".ts-filter").forEach(select => {
                new TomSelect(select, {
                    plugins: ['remove_button'], // Optional: Allow removing selections
                    placeholder: 'اختر خيارًا',
                    allowEmptyOption: true
                });
            });
        });
    </script>
@endsection

@section('scripts')
    <!-- SELECT2 JS -->
    <script src="{{ asset('build/assets/plugins/select2/select2.full.min.js') }}"></script>
    @vite('resources/assets/js/select2.js')

    <!-- DATA TABLE JS -->
    <script src="{{ asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    @vite('resources/assets/js/table-data.js')

    <script>
        document.getElementById('applyFilterBtn').addEventListener('click', function() {
            const category = document.getElementById('categoryFilter').value.toLowerCase();
            const season = document.getElementById('seasonFilter').value.toLowerCase();
            const factory = document.getElementById('factoryFilter').value.toLowerCase();
            const status = document.getElementById('statusFilter').value.toLowerCase();
            const variantStatus = document.getElementById('variantStatusFilter').value.toLowerCase();
            const startDate = document.getElementById('expectedDeliveryStart').value;
            const endDate = document.getElementById('expectedDeliveryEnd').value;

            document.querySelectorAll('#file-datatable tbody tr').forEach(function(row) {
                const rowCategory = row.children[3].textContent.toLowerCase();
                const rowSeason = row.children[4].textContent.toLowerCase();
                const rowFactory = row.children[6].textContent.toLowerCase();
                const rowStatus = row.children[7].textContent.toLowerCase();
                const rowVariantStatus = row.children[13].textContent.toLowerCase();
                const rowDate = row.children[10].textContent;

                const matchesCategory = !category || rowCategory.includes(category);
                const matchesSeason = !season || rowSeason.includes(season);
                const matchesFactory = !factory || rowFactory.includes(factory);
                const matchesStatus = !status || rowStatus.includes(status);
                const matchesVariantStatus = !variantStatus || rowVariantStatus.includes(variantStatus);

                const matchesDate = (!startDate || rowDate >= startDate) && (!endDate || rowDate <=
                    endDate);

                if (matchesCategory && matchesSeason && matchesFactory && matchesStatus &&
                    matchesVariantStatus && matchesDate) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        document.getElementById('resetFilterBtn').addEventListener('click', function() {
            document.querySelectorAll('select, input[type="date"]').forEach(function(input) {
                input.value = '';
            });
            document.querySelectorAll('#file-datatable tbody tr').forEach(function(row) {
                row.style.display = '';
            });
        });
    </script>
@endsection
