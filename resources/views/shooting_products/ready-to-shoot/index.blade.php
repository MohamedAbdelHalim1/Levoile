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

            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-4">{{ __('messages.ready_to_shoot') }}</h4>
                <form method="GET" action="{{ route('ready-to-shoot.index') }}" class="row mb-3">
                    <div class="col-md-3">
                        <select name="type_of_shooting" class="form-select" onchange="this.form.submit()">
                            <option value="">{{ __('messages.all_types_of_shooting') }}</option>
                            <option value="تصوير منتج" {{ request('type_of_shooting') == 'تصوير منتج' ? 'selected' : '' }}>
                                 {{ __('messages.product_shooting') }}</option>
                            <option value="تصوير موديل"
                                {{ request('type_of_shooting') == 'تصوير موديل' ? 'selected' : '' }}>{{ __('messages.model_shooting') }} </option>
                            <option value="تصوير انفلونسر"
                                {{ request('type_of_shooting') == 'تصوير انفلونسر' ? 'selected' : '' }}>{{ __('messages.inflo_shooting') }} 
                            </option>
                            <option value="تعديل لون" {{ request('type_of_shooting') == 'تعديل لون' ? 'selected' : '' }}>
                                {{ __('messages.change_color') }} </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-select" onchange="this.form.submit()">
                            <option value="">كل الحالات</option>
                            <option value="جديد" {{ request('status') == 'جديد' ? 'selected' : '' }}>{{ __('messages.new') }}</option>
                            <option value="قيد التصوير" {{ request('status') == 'قيد التصوير' ? 'selected' : '' }}>
                                {{ __('messages.processing') }}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('ready-to-shoot.index') }}" class="btn btn-secondary">{{ __('messages.reset') }}</a>
                    </div>
                </form>


                <div class="table-responsive">
                    <form method="POST" action="{{ route('shooting-products.multi.start.page') }}">
                        @csrf
                        <button type="submit" class="btn btn-success mb-3" id="startShootingBtn" style="display:none;"
                            onclick="return validateBeforeSubmit()">{{ __('messages.start_shooting') }}</button>

                        <button type="button" class="btn btn-primary mb-3" id="bulkAssignBtn" style="display:none;">
                            {{ __('messages.bulk_shooting_type_assign') }}
                        </button>

                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead class="table-light">
                                <tr>
                                    <th><input type="checkbox" id="checkAllStartShooting"></th>
                                    <th>{{ __('messages.product') }}</th>
                                    <th>{{ __('messages.number_of_colors') }} </th>
                                    <th>{{ __('messages.status') }}</th>
                                    <th>{{ __('messages.type_of_shooting') }} </th>
                                    <th>{{ __('messages.operations') }}</th>
                                    <th>
                                        {{ __('messages.assign_type_of_shooting') }}<input type="checkbox" id="bulkCheckAll">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $grouped = $readyItems->groupBy(function ($item) {
                                        return $item->shooting_product_id .
                                            '|' .
                                            ($item->type_of_shooting ?? '-') .
                                            '|' .
                                            ($item->status ?? '-');
                                    });

                                @endphp

                                @foreach ($grouped as $key => $items)
                                    @php
                                        [$productId, $type, $status] = explode('|', $key);
                                        $product = $items->first()->shootingProduct;
                                        $colorCodes = $items->pluck('item_no');
                                    @endphp

                                    <tr data-type="{{ $type }}" data-status="{{ $status }}">
                                        <td>
                                            @if ($status !== 'قيد التصوير')
                                                <input type="checkbox" name="selected_products[]"
                                                    value="{{ $productId }}" data-type="{{ $type ?? '' }}"
                                                    class="start-shooting">
                                            @endif
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <span class="badge bg-primary" tabindex="0" data-bs-toggle="popover"
                                                data-bs-trigger="hover focus" data-bs-html="true"
                                                data-bs-content="<ul style='margin:0;padding-left:15px;'>
                                                                @foreach ($colorCodes as $code)
<li>{{ $code }}</li>
@endforeach
                                                                </ul>">
                                                {{ $colorCodes->count() }}
                                            </span>

                                            @php
                                                // نشوف لو فيه فارينتس تانية غير اللي موجودة بالفعل
                                                $otherVariantsCount = \App\Models\ShootingProductColor::where(
                                                    'shooting_product_id',
                                                    $productId,
                                                )
                                                    ->whereNotIn('code', $colorCodes)
                                                    ->count();
                                            @endphp
                                            @if ($otherVariantsCount > 0 && $status !== 'قيد التصوير')
                                                -
                                                <button type="button" class="btn btn-sm btn-light refresh-variants-btn"
                                                    data-product-id="{{ $productId }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="{{ __('messages.refresh_variants') }}">
                                                    <i class="fa fa-refresh" style="color: rgb(65, 49, 37);"></i>
                                                </button>
                                            @endif
                                        </td>

                                        {{-- <td>
                                            <span class="badge bg-primary" tabindex="0" data-bs-toggle="popover"
                                                data-bs-trigger="hover focus" data-bs-html="true"
                                                data-bs-content="<ul style='margin:0;padding-left:15px;'>
                                                @foreach ($colorCodes as $code)
<li>{{ $code }}</li>
@endforeach
                                                </ul>">
                                                {{ $colorCodes->count() }}
                                            </span>
                                        </td> --}}
                                        <td><span class="badge bg-success">{{ $status ?? '-' }}</span></td>
                                        <td>{{ $type ?? '-' }}</td>
                                        <td>
                                            @if ($status !== 'قيد التصوير')
                                                <button type="button" class="btn btn-sm btn-success assign-type"
                                                    data-id="{{ $productId }}">{{ __('messages.assign_type_of_shooting') }}</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($status !== 'قيد التصوير')
                                                <input type="checkbox" name="bulk_selected_products[]" class="bulk-product"
                                                    value="{{ $productId }}">
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="typeModal" tabindex="-1" aria-labelledby="typeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="typeForm" method="POST" action="{{ route('ready-to-shoot.assign-type') }}">
                @csrf
                <input type="hidden" name="product_id" id="modal_product_id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="typeModalLabel">{{ __('messages.assign_type_of_shooting') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <select name="type_of_shooting" class="form-control" required>
                            <option value="">{{ __('messages.select_type_of_shooting') }}</option>
                            <option value="تصوير منتج">{{ __('messages.product_shooting') }}</option>
                            <option value="تصوير موديل">{{ __('messages.model_shooting') }}</option>
                            <option value="تصوير انفلونسر">{{ __('messages.inflo_shooting') }}</option>
                            <option value="تعديل لون">{{ __('messages.change_color') }} </option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bulk Assign Modal -->
    <div class="modal fade" id="bulkAssignModal" tabindex="-1" aria-labelledby="bulkAssignModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('ready-to-shoot.bulk-assign-type') }}">
                @csrf
                <input type="hidden" name="product_ids" id="bulk_product_ids">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('messages.assign_type_of_shooting') }} ({{ __('messages.bulk') }})</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <select name="type_of_shooting" class="form-control" required>
                            <option value="">{{ __('messages.select_type_of_shooting') }}</option>
                            <option value="تصوير منتج">{{ __('messages.product_shooting') }}</option>
                            <option value="تصوير موديل">{{ __('messages.model_shooting') }} </option>
                            <option value="تصوير انفلونسر">{{ __('messages.inflo_shooting') }}</option>
                            <option value="تعديل لون">{{ __('messages.change_color') }} </option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
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
        document.querySelectorAll('input[name="selected_products[]"]').forEach(cb => {
            cb.addEventListener('change', toggleStartButton);
        });

        function toggleStartButton() {
            const selected = [...document.querySelectorAll('input[name="selected_products[]"]:checked')];
            const types = new Set(selected.map(cb => cb.dataset.type));

            if (selected.length > 0) {
                if (types.has('') || types.has(null)) {
                    document.getElementById('startShootingBtn').style.display = 'none';
                    return;
                }

                if (types.size > 1) {
                    document.getElementById('startShootingBtn').style.display = 'none';
                } else {
                    document.getElementById('startShootingBtn').style.display = 'inline-block';
                }
            } else {
                document.getElementById('startShootingBtn').style.display = 'none';
            }
        }

        function handleCheckboxClick(cb) {
            if (!cb.dataset.type || cb.dataset.type === '') {
                alert('{{ __('messages.select_type_of_shooting') }}');
                cb.checked = false;
                return false;
            }

            const selected = [...document.querySelectorAll('input[name="selected_products[]"]:checked')];
            const types = new Set(selected.map(el => el.dataset.type));

            if (types.size > 1) {
                alert('{{ __('messages.select_one_type_of_shooting') }}');
                cb.checked = false;
                return false;
            }

            toggleStartButton();
            return true;
        }



        document.addEventListener("DOMContentLoaded", function() {
            const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            popoverTriggerList.forEach(function(popoverTriggerEl) {
                new bootstrap.Popover(popoverTriggerEl);
            });

            document.querySelectorAll('.assign-type').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    document.getElementById('modal_product_id').value = id;
                    const modal = new bootstrap.Modal(document.getElementById('typeModal'));
                    modal.show();
                });
            });

        });

        function validateBeforeSubmit() {
            const selected = [...document.querySelectorAll('input[name="selected_products[]"]:checked')];
            if (selected.length === 0) {
                alert('{{ __('messages.select_at_least_one_product') }}');
                return false;
            }
            return true;
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const bulkCheckboxes = document.querySelectorAll('.bulk-product');
            const bulkAssignBtn = document.getElementById('bulkAssignBtn');
            const bulkCheckAll = document.getElementById('bulkCheckAll');

            function toggleBulkButton() {
                const selected = [...bulkCheckboxes].filter(cb => cb.checked);
                bulkAssignBtn.style.display = selected.length > 0 ? 'inline-block' : 'none';
            }

            bulkCheckboxes.forEach(cb => {
                cb.addEventListener('change', toggleBulkButton);
            });

            if (bulkCheckAll) {
                bulkCheckAll.addEventListener('change', function() {
                    bulkCheckboxes.forEach(cb => {
                        if (!cb.disabled) cb.checked = this.checked;
                    });
                    toggleBulkButton();
                });
            }

            bulkAssignBtn.addEventListener('click', function() {
                const selectedIds = [...bulkCheckboxes]
                    .filter(cb => cb.checked)
                    .map(cb => cb.value);
                document.getElementById('bulk_product_ids').value = selectedIds.join(',');
                new bootstrap.Modal(document.getElementById('bulkAssignModal')).show();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#checkAllStartShooting').on('change', function() {
                const checked = this.checked;
                let types = new Set();
                let allHaveType = true;

                $('input.start-shooting').each(function() {
                    let type = $(this).data('type');
                    if (!type) allHaveType = false;
                    types.add(type);
                });

                if (!allHaveType || types.size > 1) {
                    alert('{{ __('messages.you_cannot_select_all') }}');
                    this.checked = false;
                    return;
                }

                $('input.start-shooting').prop('checked', checked);
                toggleStartButton();
            });


        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.refresh-variants-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                        if (!confirm('{{ __('messages.do_you_want_to_restore_all_similar_products') }}')) {
                            return;
                        }


                    fetch("{{ route('ready-to-shoot.refresh-variants') }}", {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                shooting_product_id: productId
                            })
                        })
                        .then(response => {
                            if (!response.ok) throw new Error("HTTP error " + response.status);
                            return response.json();
                        })
                        .then(data => {
                            alert(data.message || '{{ __('messages.restored_successfully') }}');
                            // ممكن تعمل reload أو تحديث جزء من الصفحة
                            location.reload(); // أو أعملها تحديث ذكي لاحقًا
                        })
                        .catch(error => {
                            alert('حصل خطأ أثناء الاسترجاع');
                            console.error(error);
                        });
                });
            });
        });
    </script>
@endsection
