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

                <div class="table-responsive">
                    <form method="POST" action="{{ route('shooting-products.multi.start.page') }}">
                        @csrf
                        {{-- <div class="mb-3">
                        <input type="checkbox" id="checkAll"> <label for="checkAll">تحديد الكل</label>
                    </div> --}}
                        <button type="submit" class="btn btn-success mb-3" id="startShootingBtn" style="display:none;"
                            onclick="return validateBeforeSubmit()">بدء التصوير</button>
                        <table class="table table-bordered text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>اختيار</th>
                                    <th>اسم المنتج</th>
                                    <th>عدد الألوان</th>
                                    <th>الحالة</th>
                                    <th>نوع التصوير</th>
                                    <th>الإجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $grouped = $readyItems->groupBy('shooting_product_id'); @endphp

                                @foreach ($grouped as $productId => $items)
                                    @php
                                        $product = $items->first()->shootingProduct;
                                        $colorCodes = $items->pluck('item_no');
                                        $type = $items->first()->type_of_shooting;
                                    @endphp
                                    <tr>
                                        <td>
                                            @php
                                                $status = $items->first()->status;
                                            @endphp

                                            @if ($status !== 'قيد التصوير')
                                                <input type="checkbox" name="selected_products[]"
                                                    value="{{ $productId }}" data-type="{{ $type ?? '' }}"
                                                    onclick="return handleCheckboxClick(this)">
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
@endsection

@section('scripts')
    <script>
        document.getElementById('checkAll').addEventListener('change', function() {
            const checked = this.checked;
            document.querySelectorAll('input[name="selected_products[]"]').forEach(cb => {
                if (!cb.disabled) cb.checked = checked;
            });
            toggleStartButton();
        });

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

        document.querySelectorAll('.assign-type').forEach(btn => {
            console.log('assign-type found');
            btn.addEventListener('click', function() {
                const id = this.dataset.id;
                document.getElementById('modal_product_id').value = id;
                const modal = new bootstrap.Modal(document.getElementById('typeModal'));
                modal.show();
            });
        });


        document.addEventListener("DOMContentLoaded", function() {
            const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            popoverTriggerList.forEach(function(popoverTriggerEl) {
                new bootstrap.Popover(popoverTriggerEl);
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
@endsection
