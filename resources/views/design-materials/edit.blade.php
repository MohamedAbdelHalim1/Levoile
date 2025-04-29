@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-4">تعديل الخامة</h4>
                <form action="{{ route('design-materials.update', $material->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>اسم الخامة</label>
                            <input type="text" name="name" class="form-control" required
                                value="{{ old('name', $material->name) }}">
                        </div>
                        <div class="col-md-6">
                            <label>الصورة الحالية</label><br>
                            @if ($material->image)
                                <img src="{{ asset($material->image) }}" alt="صورة الخامة" width="100"
                                    class="mb-2 rounded">
                            @else
                                <span class="text-muted">لا توجد صورة</span>
                            @endif
                            <input type="file" name="image" class="form-control mt-2" accept="image/*">
                        </div>
                    </div>
                    <hr>
                    <h5>ألوان الخامة</h5>
                    <div id="colors-area">
                        @forelse ($material->colors as $i => $color)
                            <div class="row mb-2 color-row">
                                <input type="hidden" name="colors[{{ $i }}][id]" value="{{ $color->id }}">
                                <div class="col-md-2">
                                    <select name="colors[{{ $i }}][name]" class="form-control color-name-select">
                                        <option value="">اختر اللون</option>
                                        @foreach ($colorsList as $colorOption)
                                            <option value="{{ $colorOption->name }}"
                                                @if (old('colors.' . $i . '.name', $color->name) == $colorOption->name) selected @endif>
                                                {{ $colorOption->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="colors[{{ $i }}][code]" class="form-control"
                                        placeholder="كود اللون" value="{{ old('colors.' . $i . '.code', $color->code) }}">
                                </div>
                                <div class="col-md-2">
                                    <input type="number" name="colors[{{ $i }}][required_quantity]"
                                        class="form-control" placeholder="الكمية المطلوبة"
                                        value="{{ old('colors.' . $i . '.required_quantity', $color->required_quantity) }}">
                                </div>
                                <div class="col-md-2">
                                    <input type="number" name="colors[{{ $i }}][received_quantity]"
                                        class="form-control" placeholder="الكمية المستلمة"
                                        value="{{ old('colors.' . $i . '.received_quantity', $color->received_quantity) }}">
                                </div>
                                <div class="col-md-2">
                                    <input type="date" name="colors[{{ $i }}][delivery_date]"
                                        class="form-control"
                                        value="{{ old('colors.' . $i . '.delivery_date', $color->delivery_date) }}">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger remove-color">حذف</button>
                                </div>
                            </div>
                        @empty
                            <div class="row mb-2 color-row">
                                <div class="col-md-2">
                                    <input type="text" name="colors[0][name]" class="form-control"
                                        placeholder="اسم اللون">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="colors[0][code]" class="form-control"
                                        placeholder="كود اللون">
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
                                    <button type="button" class="btn btn-danger btn-sm remove-color">
                                        حذف اللون
                                    </button>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <button type="button" id="add-color" class="btn btn-secondary mt-2 mb-4">+ إضافة لون</button>
                    <div>
                        <button type="submit" class="btn btn-primary">تحديث الخامة</button>
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
    let colorIndex = {{ $material->colors->count() }};
    
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

    $('#add-color').click(function() {
        let row = `
            <div class="row mb-2 color-row">
                <div class="col-md-2">
                    <select name="colors[${colorIndex}][name]" class="form-control color-name-select">
                        <option value="">اختر اللون</option>
                        @foreach ($colorsList as $colorOption)
                            <option value="{{ $colorOption->name }}">{{ $colorOption->name }}</option>
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
                    <input type="date" name="colors[${colorIndex}][delivery_date]" class="form-control" placeholder="تاريخ التسليم">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-sm remove-color">حذف اللون</button>
                </div>
            </div>
        `;
        $('#colors-area').append(row);
        colorIndex++;

        applyTomSelect(); // كل مرة تضيف لون جديد تطبقه
    });

    $(document).on('click', '.remove-color', function() {
        var btn = $(this);
        var colorId = btn.closest('.color-row').find('input[name*="[id]"]').val();

        if (!confirm('هل أنت متأكد من حذف هذا اللون؟')) {
            return;
        }

        if (!colorId) {
            btn.closest('.color-row').remove();
            return;
        }

        $.ajax({
            url: '/design-materials/colors/' + colorId,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'DELETE'
            },
            success: function(response) {
                if (response.success) {
                    btn.closest('.color-row').remove();
                    alert('تم حذف اللون بنجاح');
                } else {
                    alert('فشل في الحذف');
                }
            },
            error: function(xhr) {
                alert('حدث خطأ أثناء الحذف');
            }
        });
    });
</script>
@endsection
