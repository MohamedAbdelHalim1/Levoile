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
                <form method="GET" action="{{ route('products.index') }}">
                    <div class="row">
                        <!-- Category Filter -->
                        <div class="col-md-3">
                            <label for="categoryFilter">{{ __('القسم') }}</label>
                            <select name="category" id="categoryFilter" class="ts-filter">
                                <option value="">{{ __('كل الاقسام') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}"
                                        {{ request('category') == $category->name ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Season Filter -->
                        <div class="col-md-3">
                            <label for="seasonFilter">{{ __('الموسم') }}</label>
                            <select name="season" id="seasonFilter" class="ts-filter">
                                <option value="">{{ __('كل المواسم') }}</option>
                                @foreach ($seasons as $season)
                                    <option value="{{ $season->name }}"
                                        {{ request('season') == $season->name ? 'selected' : '' }}>
                                        {{ $season->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Factory Filter -->
                        <div class="col-md-3">
                            <label for="factoryFilter">{{ __('المصنع') }}</label>
                            <select name="factory" id="factoryFilter" class="ts-filter">
                                <option value="">{{ __('كل المصانع') }}</option>
                                @foreach ($factories as $factory)
                                    <option value="{{ $factory->name }}"
                                        {{ request('factory') == $factory->name ? 'selected' : '' }}>
                                        {{ $factory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Color Filter -->
                        <div class="col-md-3">
                            <label for="colorFilter">{{ __('اللون') }}</label>
                            <select name="color" id="colorFilter" class="ts-filter">
                                <option value="">{{ __('كل الألوان') }}</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color->name }}"
                                        {{ request('color') == $color->name ? 'selected' : '' }}>
                                        {{ $color->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Status Filter -->
                        <div class="col-md-3 mt-3">
                            <label for="statusFilter">{{ __('الحالة') }}</label>
                            <select name="status" id="statusFilter" class="ts-filter">
                                <option value="">{{ __('كل الحالات') }}</option>
                                <option value="New" {{ request('status') == 'New' ? 'selected' : '' }}>
                                    {{ __('جديد') }}</option>
                                <option value="Partial" {{ request('status') == 'Partial' ? 'selected' : '' }}>
                                    {{ __(' جزئي') }}</option>
                                <option value="Complete" {{ request('status') == 'Complete' ? 'selected' : '' }}>
                                    {{ __(' مكتمل') }}</option>
                                <option value="Cancel" {{ request('status') == 'Cancel' ? 'selected' : '' }}>
                                    {{ __('ملغي') }}</option>
                                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>
                                    {{ __('قيد الانتظار') }}</option>
                            </select>
                        </div>

                        <!-- Material Filter -->
                        <div class="col-md-3 mt-3">
                            <label for="materialFilter">{{ __('الخامة') }}</label>
                            <select name="material" id="materialFilter" class="ts-filter">
                                <option value="">{{ __('كل الخامات') }}</option>
                                @foreach ($materials as $material)
                                    <option value="{{ $material->name }}"
                                        {{ request('material') == $material->name ? 'selected' : '' }}>
                                        {{ $material->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Expected Delivery Date Range -->
                        <div class="col-md-6 mt-3">
                            <label for="expectedDeliveryStart">{{ __('تاريخ التوصيل المتوقع') }}</label>
                            <div class="input-group">
                                <input type="date" name="expected_delivery_start" id="expectedDeliveryStart"
                                    class="form-control" value="{{ request('expected_delivery_start') }}">
                                <span class="input-group-text">-</span>
                                <input type="date" name="expected_delivery_end" id="expectedDeliveryEnd"
                                    class="form-control" value="{{ request('expected_delivery_end') }}">
                            </div>
                        </div>



                        <!-- Filter and Reset Buttons -->
                        <div class="col-md-3 mt-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary me-2">{{ __('عرض') }}</button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">{{ __('إلغاء') }}</a>
                        </div>
                    </div>
                </form>
            </div>


            <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @if (auth()->user()->hasPermission('إضافة منتج'))
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('products.create') }}" class="btn btn-success">
                            {{ __('إضافة منتج') }}
                        </a>
                    </div>
                @endif
                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>{{ __('الصورة') }}</th>
                            <th>{{ __('الوصف') }}</th>
                            <th>{{ __('القسم') }}</th>
                            <th>{{ __('الخامه') }}</th>
                            <th>{{ __('الموسم') }}</th>
                            <th>{{ __('المصنع') }}</th>
                            <th>{{ __('حاله الطلب') }}</th>
                            <th>{{ __('الألوان') }}</th>
                            <th>{{ __('حاله التسليم النهائيه') }}</th>
                            <th>{{ __('العمليات') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <div class="d-flex flex-column align-items-center">
                                        <span class="fw-bold">{{ $product->code ?? 'لا يوجد كود' }}</span>

                                        @if ($product->photo && file_exists(public_path($product->photo)))
                                            <a href="{{ asset($product->photo) }}" target="_blank">
                                                <img src="{{ asset($product->photo) }}" alt="Product Image"
                                                    style="width: 200px; height: auto;" class="mt-2">
                                            </a>
                                        @else
                                            <p class="text-muted mt-2">لا توجد صورة</p>
                                        @endif
                                    </div>
                                </td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category->name ?? 'لا يوجد' }}</td>
                                <td>{{ $product->material->name ?? 'لا يوجد' }}</td>
                                <td>{{ $product->season->name ?? 'لا يوجد' }}</td>
                                <td>{{ $product->factory->name ?? 'لا يوجد' }}</td>

                                <td>
                                    @php
                                        $totalVariants = $product->productColors->sum(function ($color) {
                                            return $color->productcolorvariants->count();
                                        });

                                        $processingVariants = $product->productColors->sum(function ($color) {
                                            return $color->productcolorvariants->where('status', 'complete')->count();
                                        });
                                    @endphp
                                    @if ($product->status === 'New')
                                        <span class="badge bg-primary">{{ __('طلب جديد') }}</span>
                                    @elseif ($product->status === 'Cancel')
                                        <span class="badge bg-danger">{{ __('ملغي') }}</span>
                                    @elseif ($product->status === 'Pending')
                                        <span class="badge bg-warning">{{ __('قيد الانتظار') }}</span>
                                    @elseif($product->status === 'processing')
                                        <span class="badge bg-success">{{ __('تصنيع') }}
                                            ({{ $processingVariants }}/{{ $totalVariants }})
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>{{ __('اللون') }}</th>
                                                <th>{{ __('حاله التصنيع') }}</th>
                                                <th>{{ __('حاله التسليم') }}</th>
                                                <th>{{ __('الكمية') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColors as $productColor)
                                                @php
                                                    $variant = $productColor->productcolorvariants->last();
                                                    $remainingDays = $variant
                                                        ? \Carbon\Carbon::parse(
                                                            $variant->expected_delivery,
                                                        )->diffInDays(now(), false)
                                                        : null;
                                                @endphp
                                                <tr>
                                                    <!-- Color Name -->
                                                    <td>{{ $productColor->color->name }}</td>

                                                    <!-- Manufacturing Status -->
                                                    <td>
                                                        @switch($variant->status)
                                                            @case('New')
                                                                {{ __('لم يتم البدء') }}
                                                            @break

                                                            @case('processing')
                                                                {{ __('جاري التصنيع') }}
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

                                                    <!-- Receiving Status with Remaining/Overdue Days -->
                                                    <td>
                                                        @php
                                                            $remainingDays = $variant
                                                                ? \Carbon\Carbon::parse(
                                                                    $variant->expected_delivery,
                                                                )->diffInDays(now(), false)
                                                                : null;
                                                        @endphp

                                                        @if ($variant->receiving_status === 'New')
                                                            <span>-</span>
                                                        @elseif ($variant->receiving_status === 'pending')
                                                            @if ($remainingDays < 0)
                                                                <span class="badge bg-success">{{ $remainingDays }} يوم
                                                                    متبقي</span>
                                                            @elseif ($remainingDays === 0)
                                                                <span class="badge bg-warning">الاستلام اليوم</span>
                                                            @else
                                                                <span class="badge bg-danger">{{ abs($remainingDays) }} يوم
                                                                    تأخير</span>
                                                            @endif
                                                        @elseif ($variant->receiving_status === 'complete')
                                                            <span
                                                                class="badge bg-danger">{{ __('تم الاستلام كامل') }}</span>
                                                        @endif
                                                    </td>

                                                    <!-- Quantity -->
                                                    <td>{{ $variant->quantity ?? 0 }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    @if ($product->receiving_status === 'New')
                                        <span>-</span>
                                    @elseif ($product->receiving_status === 'Partial')
                                        <span class="badge bg-pink">({{ __('تسليم جزئي') }})</span>
                                    @elseif ($product->receiving_status === 'Complete')
                                        <span class="badge bg-success">({{ __('تم التسليم') }})</span>
                                    @elseif ($product->receiving_status === 'Pending')
                                        <span class="badge bg-danger">({{ __('في انتظار التسليم') }})</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-column gap-2">
                                        <a href="{{ route('products.manufacture', $product->id) }}"
                                            class="btn btn-info w-100">{{ __('تصنيع') }}</a>
                                        @if (auth()->user()->hasPermission('عرض منتج'))
                                            <a href="{{ route('products.show', $product->id) }}"
                                                class="btn btn-primary w-100">{{ __('عرض') }}</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('تعديل منتج'))
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-secondary w-100">{{ __('تعديل') }}</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('استلام منتج'))
                                            @if ($product->status !== 'Complete')
                                                <a href="{{ route('products.receive', $product->id) }}"
                                                    class="btn btn-success w-100">{{ __('استلام') }}</a>
                                            @endif
                                        @endif
                                        @if (auth()->user()->hasPermission('إكمال بيانات المنتج'))
                                            <a href="{{ route('products.completeData', $product->id) }}"
                                                class="btn btn-info w-100">{{ __('استكمال البيانات') }}</a>
                                        @endif

                                        @if ($product->status === 'Cancel')
                                            @if (auth()->user()->hasPermission('تفعيل منتج'))
                                                <a href="javascript:void(0);" class="btn btn-warning renew-btn w-100"
                                                    data-id="{{ $product->id }}">{{ __('تفعيل') }}</a>
                                            @endif
                                        @else
                                            @if (auth()->user()->hasPermission('إلغاء منتج'))
                                                <a href="javascript:void(0);" class="btn btn-warning cancel-btn w-100"
                                                    data-id="{{ $product->id }}">{{ __('الغاء') }}</a>
                                            @endif
                                        @endif
                                        @if (auth()->user()->hasPermission('حذف منتج'))
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟ ')"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger w-100">{{ __('مسح') }}</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
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
        $(document).on('click', '.cancel-btn', function() {
            const productId = $(this).data('id');

            if (confirm('هل أنت متأكد من الغاء هذا المنتج؟')) {
                $.ajax({
                    url: `/products/${productId}/cancel`,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            location.reload(); // Reload the page to reflect the updated status
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseJSON.message);
                    }
                });
            }
        });

        $(document).on('click', '.renew-btn', function() {
            const productId = $(this).data('id');

            if (confirm('هل أنت متأكد من تفعيل هذا المنتج؟')) {
                $.ajax({
                    url: `/products/${productId}/renew`,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            location.reload(); // Reload the page to reflect the updated status
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseJSON.message);
                    }
                });
            }
        });
    </script>


    {{-- <script>
        $(document).ready(function() {
            function filterTable() {
                const category = $('#categoryFilter').val().toLowerCase();
                const season = $('#seasonFilter').val().toLowerCase();
                const factory = $('#factoryFilter').val().toLowerCase();
                const color = $('#colorFilter').val().toLowerCase();
                const status = $('#statusFilter').val().toLowerCase();
                const startDate = $('#expectedDeliveryStart').val();
                const endDate = $('#expectedDeliveryEnd').val();

                $('#file-datatable tbody tr').each(function() {
                    const row = $(this);

                    // Extract row-level data for filtering
                    const rowCategory = row.find('td:nth-child(4)').text().toLowerCase();
                    const rowSeason = row.find('td:nth-child(5)').text().toLowerCase();
                    const rowFactory = row.find('td:nth-child(6)').text().toLowerCase();
                    const rowStatus = row.find('td:nth-child(8) span').text().toLowerCase();

                    // Nested color table filtering
                    let matchesColor = !color; // Default to true if no color filter is selected
                    let matchesDate = true; // Default to true if no date range is applied
                    let hasMatchingNestedRows = false; // Tracks if the nested table has any visible rows

                    // Loop through nested rows in the color table
                    row.find('td:nth-child(7) table tbody tr').each(function() {
                        const nestedRow = $(this);
                        const nestedColor = nestedRow.find('td:nth-child(1)').text().toLowerCase();
                        const nestedDate = nestedRow.find('td:nth-child(2)').text();

                        // Check if nested row matches the color filter
                        const isColorMatch = !color || nestedColor.includes(color);

                        // Check if nested row matches the date range filter
                        const isDateMatch =
                            (!startDate || nestedDate >= startDate) &&
                            (!endDate || nestedDate <= endDate);

                        // If both color and date match, show this nested row
                        if (isColorMatch && isDateMatch) {
                            matchesColor = true;
                            hasMatchingNestedRows = true;
                            nestedRow.show();
                        } else {
                            nestedRow.hide();
                        }
                    });

                    // Row-level filters
                    const matchesCategory = !category || rowCategory.includes(category);
                    const matchesSeason = !season || rowSeason.includes(season);
                    const matchesFactory = !factory || rowFactory.includes(factory);
                    const matchesStatus = !status || rowStatus.includes(status);

                    // Show or hide the entire row based on all conditions
                    if (
                        matchesCategory &&
                        matchesSeason &&
                        matchesFactory &&
                        matchesStatus &&
                        matchesColor &&
                        (hasMatchingNestedRows || !
                        color) // Keep row visible if there are no color filters applied
                    ) {
                        row.show();
                    } else {
                        row.hide();
                    }
                });
            }

            function resetFilters() {
                // Reset all filters
                $('#categoryFilter, #seasonFilter, #factoryFilter, #colorFilter, #statusFilter').val('');
                $('#expectedDeliveryStart, #expectedDeliveryEnd').val('');

                // Show all rows and reset nested tables
                $('#file-datatable tbody tr').each(function() {
                    const row = $(this);
                    row.show();
                    row.find('td:nth-child(7) table tbody tr').show(); // Show all nested rows
                });
            }

            // Attach events to Filter and Reset buttons
            $('#applyFilterBtn').on('click', filterTable);
            $('#resetFilterBtn').on('click', resetFilters);
        });
    </script> --}}
@endsection
