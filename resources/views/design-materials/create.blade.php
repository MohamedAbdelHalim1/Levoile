@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-4">إضافة خامة جديدة</h4>
                <form action="{{ route('design-materials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>اسم الخامة</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                        </div>
                        <div class="col-md-6">
                            <label>الصورة</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <hr>
                    <h5>ألوان الخامة</h5>
                    <div id="colors-area">
                        <div class="row mb-2 color-row">
                            <div class="col-md-2">
                                <select name="colors[0][name]" class="form-control color-name-select" required>
                                    <option value="">اختر اللون</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->name }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="colors[0][code]" class="form-control"
                                    placeholder="كود اللون أو اختر لون">
                                <!-- أو استبدلها بـ <input type="color"... لو تحب -->
                            </div>
                            <div class="col-md-2">
                                <input type="number" name="colors[0][required_quantity]" class="form-control"
                                    placeholder="الكمية المطلوبة">
                            </div>
                            <div class="col-md-2">
                                <input type="number" name="colors[0][received_quantity]" class="form-control"
                                    placeholder="الكمية المستلمة">
                            </div>
                            <div class="col-md-2">
                                <input type="date" name="colors[0][delivery_date]" class="form-control"
                                    placeholder="تاريخ التسليم">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger remove-color">حذف</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-color" class="btn btn-secondary mt-2 mb-4">+ إضافة لون</button>
                    <div>
                        <button type="submit" class="btn btn-primary">حفظ الخامة</button>
                        <a href="{{ route('design-materials.index') }}" class="btn btn-secondary">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet" />

<script>
    let colorIndex = 1;

    function applyTomSelect() {
        document.querySelectorAll('.color-name-select').forEach(el => {
            if (!el.classList.contains('ts-hidden')) {
                new TomSelect(el, {
                    create: false,
                    placeholder: 'اختر اللون',
                });
            }
        });
    }

    applyTomSelect(); // أول تحميل

    $('#add-color').click(function () {
        let row = `
            <div class="row mb-2 color-row">
                <div class="col-md-2">
                    <select name="colors[${colorIndex}][name]" class="form-control color-name-select" required>
                        <option value="">اختر اللون</option>
                        @foreach ($colors as $color)
                            <option value="{{ $color->name }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="text" name="colors[${colorIndex}][code]" class="form-control" placeholder="كود اللون">
                </div>
                <div class="col-md-2">
                    <input type="number" name="colors[${colorIndex}][required_quantity]" class="form-control" placeholder="الكمية المطلوبة">
                </div>
                <div class="col-md-2">
                    <input type="number" name="colors[${colorIndex}][received_quantity]" class="form-control" placeholder="الكمية المستلمة">
                </div>
                <div class="col-md-2">
                    <input type="date" name="colors[${colorIndex}][delivery_date]" class="form-control">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-color">حذف</button>
                </div>
            </div>
        `;
        $('#colors-area').append(row);
        colorIndex++;

        applyTomSelect(); // فعل التوم سليكت على العنصر الجديد
    });

    $(document).on('click', '.remove-color', function () {
        $(this).closest('.color-row').remove();
    });
</script>
@endsection
