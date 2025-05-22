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
                <h4 class="mb-4">المنتجات الجاهزة للتصوير</h4>
                <form method="GET" action="{{ route('ready-to-shoot.index') }}" class="row mb-3">
                    <div class="col-md-3">
                        <select name="type_of_shooting" class="form-select" onchange="this.form.submit()">
                            <option value="">كل أنواع التصوير</option>
                            <option value="تصوير منتج" {{ request('type_of_shooting') == 'تصوير منتج' ? 'selected' : '' }}>
                                تصوير منتج</option>
                            <option value="تصوير موديل"
                                {{ request('type_of_shooting') == 'تصوير موديل' ? 'selected' : '' }}>تصوير موديل</option>
                            <option value="تصوير انفلونسر"
                                {{ request('type_of_shooting') == 'تصوير انفلونسر' ? 'selected' : '' }}>تصوير انفلونسر
                            </option>
                            <option value="تعديل لون" {{ request('type_of_shooting') == 'تعديل لون' ? 'selected' : '' }}>
                                تعديل لون</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-select" onchange="this.form.submit()">
                            <option value="">كل الحالات</option>
                            <option value="جديد" {{ request('status') == 'جديد' ? 'selected' : '' }}>جديد</option>
                            <option value="قيد التصوير" {{ request('status') == 'قيد التصوير' ? 'selected' : '' }}>قيد
                                التصوير</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('ready-to-shoot.index') }}" class="btn btn-secondary">إعادة تعيين الفلاتر</a>
                    </div>
                </form>


                <div class="table-responsive">
                    <form method="POST" action="{{ route('shooting-products.multi.start.page') }}">
                        @csrf
                        <button type="submit" class="btn btn-success mb-3" id="startShootingBtn" style="display:none;"
                            onclick="return validateBeforeSubmit()">بدء التصوير</button>

                        <button type="button" class="btn btn-primary mb-3" id="bulkAssignBtn" style="display:none;">
                            تعيين نوع التصوير جماعي
                        </button>

                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead class="table-light">
                                <tr>
                                    <th><input type="checkbox" id="checkAllStartShooting"></th>
                                    <th>اسم المنتج</th>
                                    <th>عدد الألوان</th>
                                    <th>الحالة</th>
                                    <th>نوع التصوير</th>
                                    <th>الإجراء</th>
                                    <th>
                                        تعيين نوع التصوير <input type="checkbox" id="bulkCheckAll">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $grouped = $readyItems->groupBy('shooting_product_id'); @endphp

                                @foreach ($grouped as $productId => $items)
                                    @php
                                        $product = $items->first()->shootingProduct;
                                        $colorCodes = $items->pluck('item_no');
                                        $type = $items->first()->type_of_shooting;
                                        $status = $items->first()->status;
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
                                        </td>
                                        <td><span class="badge bg-success">{{ $status ?? '-' }}</span></td>
                                        <td>{{ $type ?? '-' }}</td>
                                        <td>
                                            @if ($status !== 'قيد التصوير')
                                                <button type="button" class="btn btn-sm btn-success assign-type"
                                                    data-id="{{ $productId }}">تعيين نوع التصوير</button>
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
                        <h5 class="modal-title" id="typeModalLabel">تعيين نوع التصوير</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <select name="type_of_shooting" class="form-control" required>
                            <option value="">اختر نوع التصوير</option>
                            <option value="تصوير منتج">تصوير منتج</option>
                            <option value="تصوير موديل">تصوير موديل</option>
                            <option value="تصوير انفلونسر">تصوير انفلونسر</option>
                            <option value="تعديل لون">تعديل لون</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">حفظ</button>
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
                        <h5 class="modal-title">تعيين نوع التصوير (جماعي)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <select name="type_of_shooting" class="form-control" required>
                            <option value="">اختر نوع التصوير</option>
                            <option value="تصوير منتج">تصوير منتج</option>
                            <option value="تصوير موديل">تصوير موديل</option>
                            <option value="تصوير انفلونسر">تصوير انفلونسر</option>
                            <option value="تعديل لون">تعديل لون</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        < script src = "{{ asset('build/assets/plugins/select2/select2.full.min.js') }}" >
    </script>
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
    alert('يجب تحديد نوع التصوير أولاً لهذا المنتج');
    cb.checked = false;
    return false;
    }

    const selected = [...document.querySelectorAll('input[name="selected_products[]"]:checked')];
    const types = new Set(selected.map(el => el.dataset.type));

    if (types.size > 1) {
    alert('لا يمكنك اختيار منتجات من أنواع تصوير مختلفة');
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
    alert('يجب اختيار منتج واحد على الأقل لبدء التصوير');
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
                    alert('لا يمكن تحديد الكل لأن بعض المنتجات ليس لها نوع تصوير أو أنواع مختلفة');
                    this.checked = false;
                    return;
                }

                $('input.start-shooting').prop('checked', checked);
                toggleStartButton();
            });


        });
    </script>
@endsection
