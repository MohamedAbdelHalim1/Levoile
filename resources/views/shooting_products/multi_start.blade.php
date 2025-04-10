@extends('layouts.app')

@section('content')
<div class="p-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="bg-white shadow sm:rounded-lg p-4">

            <h4 class="mb-4">بدء التصوير للمنتجات المحددة</h4>

            <form method="POST" action="{{ route('shooting-products.multi.start.save') }}">
                @csrf
                <input type="hidden" name="product_ids[]" value="{{ implode(',', $products->pluck('id')->toArray()) }}">

                <div class="row mb-4">
                    <div class="col-md-4">
                        <label>نوع التصوير</label>
                        <select name="type_of_shooting" id="shootingType" class="form-control" required>
                            <option value="">اختر</option>
                            <option value="تصوير منتج">تصوير منتج</option>
                            <option value="تصوير موديل">تصوير موديل</option>
                            <option value="تعديل لون">تعديل لون</option>
                        </select>
                    </div>

                    <div class="col-md-4" style="display: none;">
                        <label>مكان التصوير</label>
                        <select name="location" id="shootingLocation" class="form-control">
                            <option value="">اختر</option>
                            <option value="تصوير بالداخل">تصوير بالداخل</option>
                            <option value="تصوير بالخارج">تصوير بالخارج</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>تاريخ التسليم</label>
                        <input type="date" name="date_of_delivery" class="form-control" required>
                    </div>
                </div>

                {{-- تفاصيل التصوير --}}
                <div class="row mb-4 d-none" id="shootingDetails">
                    <div class="col-md-4">
                        <label>تاريخ التصوير</label>
                        <input type="date" name="date_of_shooting" class="form-control">
                    </div>

                    <div class="col-md-8">
                        <label>المصورين</label>
                        <select name="photographer[]" class="form-control tom-select" multiple>
                            @foreach ($photographers as $photographer)
                                <option value="{{ $photographer->id }}">{{ $photographer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- تفاصيل التعديل --}}
                <div class="row mb-4 d-none" id="editingDetails">
                    <div class="col-md-4">
                        <label>تاريخ التعديل</label>
                        <input type="date" name="date_of_editing" class="form-control">
                    </div>

                    <div class="col-md-8">
                        <label>المحررين</label>
                        <select name="editor[]" class="form-control tom-select" multiple>
                            @foreach ($editors as $editor)
                                <option value="{{ $editor->id }}">{{ $editor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <h5 class="mb-3">المنتجات المختارة</h5>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="table-light">
                            <tr>
                                @php
                                    $allColorsAreNew = true;
                                    foreach ($products as $product) {
                                        foreach ($product->shootingProductColors as $color) {
                                            if ($color->status != 'new') {
                                                $allColorsAreNew = false;
                                                break 2;
                                            }
                                        }
                                    }
                                @endphp

                                <th>
                                    @if ($allColorsAreNew)
                                        <input type="checkbox" id="checkAll">
                                    @endif
                                </th>
                                <th>#</th>
                                <th>اسم المنتج</th>
                                <th>كود اللون</th>
                                <th>ألحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $variantIndex = 1; @endphp
                            @foreach ($products as $product)
                                @foreach ($product->shootingProductColors as $color)
                                    <tr>
                                        <td>
                                            @if ($color->status == 'new')
                                                <input type="checkbox" name="selected_colors[]" value="{{ $color->id }}">
                                            @endif
                                        </td>
                                        <td>{{ $variantIndex++ }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $color->code }}</td>
                                        <td>
                                            @if ($color->status == 'new')
                                                <span class="badge bg-warning">جديد</span>
                                            @elseif($color->status == 'in_progress')
                                                <span class="badge bg-info">قيد التصوير</span>
                                            @elseif($color->status == 'completed')
                                                <span class="badge bg-success">مكتمل</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <button type="submit" class="btn btn-success mt-4">بدء التصوير</button>
                <a href="{{ route('shooting-products.index') }}" class="btn btn-secondary mt-4">رجوع</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {

        $('#shootingType').on('change', function() {
            let type = $(this).val();

            if (type == 'تصوير منتج' || type == 'تصوير موديل') {
                $('#shootingLocation').parent().show();
                $('#shootingDetails').removeClass('d-none');
                $('#editingDetails').addClass('d-none');
            } else if (type == 'تعديل لون') {
                $('#shootingLocation').parent().hide();
                $('#editingDetails').removeClass('d-none');
                $('#shootingDetails').addClass('d-none');
            } else {
                $('#shootingLocation').parent().hide();
                $('#editingDetails').addClass('d-none');
                $('#shootingDetails').addClass('d-none');
            }
        });

        $('.tom-select').each(function() {
            new TomSelect(this, {
                plugins: ['remove_button'],
            });
        });

        $('#checkAll').on('change', function() {
            $('input[name="selected_colors[]"]').prop('checked', $(this).is(':checked'));
        });

    });
</script>
@endsection
