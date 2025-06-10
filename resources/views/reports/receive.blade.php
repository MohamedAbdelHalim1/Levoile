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
                        <label for="categoryFilter">{{ __('messages.category') }}</label>
                        <select id="categoryFilter" class="ts-filter">
                            <option value="">{{ __('messages.all_categories') }}</option>
                            @foreach ($product_color_variants->pluck('productcolor.product.category.name')->unique()->filter() as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Season Filter -->
                    <div class="col-md-4">
                        <label for="seasonFilter">{{ __('messages.season') }}</label>
                        <select id="seasonFilter" class="ts-filter">
                            <option value="">{{ __('messages.all_seasons') }}</option>
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
                        <label for="statusFilter">{{ __('messages.status') }}</label>
                        <select id="statusFilter" class="ts-filter">
                            <option value="">{{ __('messages.all_statuses') }}</option>
                            <option value="new">{{ __('messages.new') }}</option>
                            <option value="partial">{{ __('messages.partial') }}</option>
                            <option value="complete">{{ __('messages.complete') }}</option>
                            <option value="processing">{{ __('messages.processing') }}</option>
                            <option value="pending">{{ __('messages.pending') }}</option>
                            <option value="stop">{{ __('messages.stop') }}</option>
                            <option value="cancel">{{ __('messages.cancel') }}</option>
                            <option value="postponed">{{ __('messages.postponed') }}</option>
                        </select>
                    </div>

                    <!-- Variant Status Filter -->
                    <div class="col-md-3 mt-3">
                        <label for="variantStatusFilter">{{ __('messages.variant_status') }}</label>
                        <select id="variantStatusFilter" class="ts-filter">
                            <option value="">{{ __('messages.all_statuses') }}</option>
                            <option value="new">{{ __('messages.new') }}</option>
                            <option value="partial">{{ __('messages.partial') }}</option>
                            <option value="complete">{{ __('messages.complete') }}</option>
                            <option value="processing">{{ __('messages.processing') }}</option>
                            <option value="pending">{{ __('messages.pending') }}</option>
                            <option value="stop">{{ __('messages.stop') }}</option>
                            <option value="cancel">{{ __('messages.cancel') }}</option>
                            <option value="postponed">{{ __('messages.postponed') }}</option>
                        </select>
                    </div>

                    <!-- Expected Delivery Date Range -->
                    <div class="col-md-6 mt-3">
                        <label for="expectedDeliveryStart">{{ __('messages.expected_delivery_date') }}</label>
                        <div class="input-group">
                            <input type="date" id="expectedDeliveryStart" class="form-control"
                                placeholder="{{ __('messages.from_date') }}">
                            <span class="input-group-text">-</span>
                            <input type="date" id="expectedDeliveryEnd" class="form-control"
                                placeholder="{{ __('messages.to_date') }}">
                        </div>
                    </div>

                    <!-- Filter and Reset Buttons -->
                    <div class="col-md-3 mt-3 d-flex align-items-end">
                        <button id="applyFilterBtn" class="btn btn-primary me-2">{{ __('messages.search') }}</button>
                        <button id="resetFilterBtn" class="btn btn-secondary">{{ __('messages.reset') }}</button>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>{{ __('messages.image') }}</th>
                            <th>{{ __('messages.color') }}</th>
                            <th>{{ __('messages.description') }}</th>
                            <th>{{ __('messages.code') }}</th>
                            <th>{{ __('messages.category') }}</th>
                            <th>{{ __('messages.season') }}</th>
                            <th>{{ __('messages.publish_date') }}</th>
                            <th>{{ __('messages.factory') }}</th>
                            <th>{{ __('messages.manufacturer_status') }}</th>
                            <th>{{ __('messages.receiving_status') }}</th>
                            <th>{{ __('messages.quantity') }}</th>
                            <th>{{ __('messages.receiving_quantity') }}</th>
                            <th>{{ __('messages.sku') }}</th>
                            <th>{{ __('messages.expected_delivery_date') }}</th>

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
                                        {{ __('messages.N/A') }}
                                    @endif
                                </td>
                                <td>{{ $variant->productcolor->color->name ?? '-' }}</td>
                                <td>{{ $variant->productcolor->product->description ?? '-' }}</td>
                                <td>{{ $variant->productcolor->product->code ?? '-' }}</td>
                                <td>{{ $variant->productcolor->product->category->name ?? '-' }}</td>
                                <td>{{ $variant->productcolor->product->season->name ?? '-' }}</td>
                                <td>{{ $variant->productcolor->product->store_launch ?? '-' }}</td>
                                <td>{{ $variant->factory->name ?? '-' }}</td>
                                <td>
                                    @if ($variant->status === 'new')
                                        <span class="badge bg-success">{{ __('messages.new') }}</span>
                                    @elseif ($variant->status === 'partial')
                                        <span class="badge bg-warning">{{ __('messages.partial') }}</span>
                                    @elseif ($variant->status === 'processing')
                                        <span class="badge bg-danger">{{ __('messages.processing') }}</span>
                                    @elseif ($variant->status === 'complete')
                                        <span class="badge bg-success">{{ __('messages.complete') }}</span>
                                    @elseif ($variant->status === 'cancel')
                                        <span class="badge bg-danger">{{ __('messages.cancel') }}</span>
                                    @elseif ($variant->status === 'pending')
                                        <span class="badge bg-info">{{ __('messages.pending') }}</span>
                                    @elseif ($variant->status === 'postponed')
                                        <span class="badge bg-info">{{ __('messages.postponed') }}</span>
                                    @elseif ($variant->status === 'stop')
                                        <span class="badge bg-danger">{{ __('messages.stop') }}</span>
                                    @else
                                        {{ $variant->status ?? '-' }}
                                    @endif
                                </td>
                                <td>
                                    @if ($variant->receiving_status === 'new')
                                        <span class="badge bg-success">{{ __('messages.new') }}</span>
                                    @elseif ($variant->receiving_status === 'partial')
                                        <span class="badge bg-warning">{{ __('messages.partial') }}</span>
                                    @elseif ($variant->receiving_status === 'processing')
                                        <span class="badge bg-danger">{{ __('messages.processing') }}</span>
                                    @elseif ($variant->receiving_status === 'complete')
                                        <span class="badge bg-success">{{ __('messages.complete') }}</span>
                                    @elseif ($variant->receiving_status === 'cancel')
                                        <span class="badge bg-danger">{{ __('messages.cancel') }}</span>
                                    @elseif ($variant->receiving_status === 'pending')
                                        <span class="badge bg-info">{{ __('messages.pending') }}</span>
                                    @elseif ($variant->receiving_status === 'postponed')
                                        <span class="badge bg-info">{{ __('messages.postponed') }}</span>
                                    @elseif ($variant->receiving_status === 'stop')
                                        <span class="badge bg-danger">{{ __('messages.stop') }}</span>
                                    @else
                                        {{ $variant->receiving_status ?? '-' }}
                                    @endif
                                </td>
                                <td>{{ $variant->quantity ?? 0 }}</td>
                                <td>{{ $variant->receiving_quantity ?? 0 }}</td>
                                <td>{{ $variant->productcolor->sku ?? '-' }}</td>
                                <td>{{ $variant->expected_delivery ?? '-' }}</td>


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
                    placeholder: '{{ __('messages.choose_option') }}',
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
