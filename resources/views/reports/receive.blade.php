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
                    <div class="col-md-3">
                        <label for="categoryFilter">{{ __('Category') }}</label>
                        <select id="categoryFilter" class="form-select">
                            <option value="">{{ __('All Categories') }}</option>
                            @foreach ($product_color_variants->pluck('productcolor.product.category.name')->unique()->filter() as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Season Filter -->
                    <div class="col-md-3">
                        <label for="seasonFilter">{{ __('Season') }}</label>
                        <select id="seasonFilter" class="form-select">
                            <option value="">{{ __('All Seasons') }}</option>
                            @foreach ($product_color_variants->pluck('productcolor.product.season.name')->unique()->filter() as $season)
                                <option value="{{ $season }}">{{ $season }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Factory Filter -->
                    <div class="col-md-3">
                        <label for="factoryFilter">{{ __('Factory') }}</label>
                        <select id="factoryFilter" class="form-select">
                            <option value="">{{ __('All Factories') }}</option>
                            @foreach ($product_color_variants->pluck('productcolor.product.factory.name')->unique()->filter() as $factory)
                                <option value="{{ $factory }}">{{ $factory }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status Filter -->
                    <div class="col-md-3">
                        <label for="statusFilter">{{ __('Status') }}</label>
                        <select id="statusFilter" class="form-select">
                            <option value="">{{ __('All Status') }}</option>
                            <option value="New">{{ __('New') }}</option>
                            <option value="Partial">{{ __('Partial') }}</option>
                            <option value="Complete">{{ __('Complete') }}</option>
                            <option value="Cancel">{{ __('Cancel') }}</option>
                            <option value="Pending">{{ __('Pending') }}</option>
                        </select>
                    </div>

                    <!-- Variant Status Filter -->
                    <div class="col-md-3 mt-3">
                        <label for="variantStatusFilter">{{ __('Variant Status') }}</label>
                        <select id="variantStatusFilter" class="form-select">
                            <option value="">{{ __('All Variant Status') }}</option>
                            <option value="Received">{{ __('Received') }}</option>
                            <option value="Partially Received">{{ __('Partially Received') }}</option>
                            <option value="Not Received">{{ __('Not Received') }}</option>
                        </select>
                    </div>

                    <!-- Expected Delivery Date Range -->
                    <div class="col-md-6 mt-3">
                        <label for="expectedDeliveryStart">{{ __('Expected Delivery Date Range') }}</label>
                        <div class="input-group">
                            <input type="date" id="expectedDeliveryStart" class="form-control" placeholder="{{ __('Start Date') }}">
                            <span class="input-group-text">-</span>
                            <input type="date" id="expectedDeliveryEnd" class="form-control" placeholder="{{ __('End Date') }}">
                        </div>
                    </div>

                    <!-- Filter and Reset Buttons -->
                    <div class="col-md-3 mt-3 d-flex align-items-end">
                        <button id="applyFilterBtn" class="btn btn-primary me-2">{{ __('Filter') }}</button>
                        <button id="resetFilterBtn" class="btn btn-secondary">{{ __('Reset') }}</button>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Code') }}</th>
                            <th>{{ __('Category') }}</th>
                            <th>{{ __('Season') }}</th>
                            <th>{{ __('Store Launch') }}</th>
                            <th>{{ __('Factory') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('SKU') }}</th>
                            <th>{{ __('Color') }}</th>
                            <th>{{ __('Expected Delivery') }}</th>
                            <th>{{ __('Quantity') }}</th>
                            <th>{{ __('Received') }}</th>
                            <th>{{ __('Variant Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product_color_variants as $variant)
                        <tr>
                            <td>
                                @if ($variant->productcolor->product->photo)
                                    <img src="{{ asset($variant->productcolor->product->photo) }}" alt="Product Image" style="width: 100px; height: auto;">
                                @else
                                    {{ __('No Image') }}
                                @endif
                            </td>
                            <td>{{ $variant->productcolor->product->description ?? __('N/A') }}</td>
                            <td>{{ $variant->productcolor->product->code ?? __('N/A') }}</td>
                            <td>{{ $variant->productcolor->product->category->name ?? __('N/A') }}</td>
                            <td>{{ $variant->productcolor->product->season->name ?? __('N/A') }}</td>
                            <td>{{ $variant->productcolor->product->store_launch ?? __('N/A') }}</td>
                            <td>{{ $variant->productcolor->product->factory->name ?? __('N/A') }}</td>
                            <td>
                                @if ($variant->productcolor->product->status === 'New')
                                    <span class="badge bg-primary">{{ __('New') }}</span>
                                @elseif ($variant->productcolor->product->status === 'Partial')
                                    <span class="badge bg-warning">{{ __('Partial') }}</span>
                                @elseif ($variant->productcolor->product->status === 'Complete')
                                    <span class="badge bg-success">{{ __('Complete') }}</span>
                                @elseif ($variant->productcolor->product->status === 'Cancel')
                                    <span class="badge bg-danger">{{ __('Cancel') }}</span>
                                @elseif ($variant->productcolor->product->status === 'Pending')
                                    <span class="badge bg-info">{{ __('Pending') }}</span>
                                @else
                                    {{ $variant->productcolor->product->status ?? __('N/A') }}
                                @endif
                            </td>
                            <td>{{ $variant->productcolor->sku ?? __('N/A') }}</td>
                            <td>{{ $variant->productcolor->color->name ?? __('N/A') }}</td>
                            <td>{{ $variant->expected_delivery ?? __('N/A') }}</td>
                            <td>{{ $variant->quantity ?? 0 }}</td>
                            <td>{{ $variant->receiving_quantity ?? 0 }}</td>
                            <td>
                                @if ($variant->status === 'Received')
                                    <span class="badge bg-success">{{ __('Received') }}</span>
                                @elseif ($variant->status === 'Partially Received')
                                    <span class="badge bg-warning">{{ __('Partially Received') }}</span>
                                @elseif ($variant->status === 'Not Received')
                                    <span class="badge bg-danger">{{ __('Not Received') }}</span>
                                @else
                                    {{ $variant->status ?? __('N/A') }}
                                @endif
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
        document.getElementById('applyFilterBtn').addEventListener('click', function () {
            const category = document.getElementById('categoryFilter').value.toLowerCase();
            const season = document.getElementById('seasonFilter').value.toLowerCase();
            const factory = document.getElementById('factoryFilter').value.toLowerCase();
            const status = document.getElementById('statusFilter').value.toLowerCase();
            const variantStatus = document.getElementById('variantStatusFilter').value.toLowerCase();
            const startDate = document.getElementById('expectedDeliveryStart').value;
            const endDate = document.getElementById('expectedDeliveryEnd').value;

            document.querySelectorAll('#file-datatable tbody tr').forEach(function (row) {
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

                const matchesDate = (!startDate || rowDate >= startDate) && (!endDate || rowDate <= endDate);

                if (matchesCategory && matchesSeason && matchesFactory && matchesStatus && matchesVariantStatus && matchesDate) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        document.getElementById('resetFilterBtn').addEventListener('click', function () {
            document.querySelectorAll('select, input[type="date"]').forEach(function (input) {
                input.value = '';
            });
            document.querySelectorAll('#file-datatable tbody tr').forEach(function (row) {
                row.style.display = '';
            });
        });
    </script>
@endsection
