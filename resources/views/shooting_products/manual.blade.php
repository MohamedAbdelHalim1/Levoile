@extends('layouts.app')

@section('content')
    <div class="p-4">
        <div class="row">

            {{-- النص اليمين: إدخال الكود --}}
            <div class="col-md-6">
                <div class="card p-4 shadow">
                    <h5 class="mb-3">إدخال كود اللون</h5>

                    <input type="text" id="colorCodeInput" class="form-control mb-3"
                        placeholder="ادخل كود اللون واضغط Enter">

                    <div id="colorResult"></div>

                    <form id="manualShootingForm" method="POST" action="{{ url('/shooting-product/manual/save') }}">
                        @csrf
                        

                        <table class="table table-bordered mt-4 d-none" id="selectedColorsTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>كود اللون</th>
                                    <th>اسم المنتج</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody id="colorsTableBody">
                                {{-- ديناميكياً --}}
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>

            {{-- النص الشمال: إعدادات التصوير --}}
            <div class="col-md-6">
                <div class="card p-4 shadow">
                    <h5 class="mb-3">إعدادات التصوير</h5>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>نوع التصوير</label>
                            <select name="type_of_shooting" id="shootingType" class="form-control" required
                                form="manualShootingForm">
                                <option value="">اختر</option>
                                <option value="تصوير منتج">تصوير منتج</option>
                                <option value="تصوير موديل">تصوير موديل</option>
                                <option value="تصوير انفلونسر">تصوير انفلونسر</option>
                                <option value="تعديل لون">تعديل لون</option>
                            </select>
                        </div>

                        <div class="col-md-12 mb-3 d-none" id="locationWrapper">
                            <label>مكان التصوير</label>
                            <select name="location" class="form-control" form="manualShootingForm">
                                <option value="">اختر</option>
                                <option value="تصوير بالداخل">تصوير بالداخل</option>
                                <option value="تصوير بالخارج">تصوير بالخارج</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>تاريخ التصوير</label>
                            <input type="date" name="date_of_shooting" class="form-control" form="manualShootingForm">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>تاريخ التسليم</label>
                            <input type="date" name="date_of_delivery" class="form-control" required
                                form="manualShootingForm">
                        </div>

                        <div class="col-md-12 mb-3 d-none" id="photographerWrapper">
                            <label>المصورين</label>
                            <select name="photographer[]" class="form-control" multiple form="manualShootingForm">
                                @foreach ($photographers as $photographer)
                                    <option value="{{ $photographer->id }}">{{ $photographer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mb-3 d-none" id="editorWrapper">
                            <label>المحررين</label>
                            <select name="editor[]" class="form-control" multiple form="manualShootingForm">
                                @foreach ($editors as $editor)
                                    <option value="{{ $editor->id }}">{{ $editor->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mb-3 d-none" id="methodWrapper">
                            <label>طريقة التصوير / لينك</label>
                            <input type="text" name="shooting_method" class="form-control" form="manualShootingForm">
                        </div>

                        <div class="col-md-12">
                            <button type="submit" form="manualShootingForm" class="btn btn-success">حفظ التصوير</button>
                            <a href="{{ route('shooting-products.index') }}" class="btn btn-secondary">رجوع</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('scripts')
    <script>
        let counter = 1;

        $('#shootingType').on('change', function() {
            let type = $(this).val();

            $('#locationWrapper, #photographerWrapper, #editorWrapper, #methodWrapper').addClass('d-none');

            if (type === 'تصوير منتج' || type === 'تصوير موديل') {
                $('#locationWrapper, #photographerWrapper, #methodWrapper').removeClass('d-none');
            } else if (type === 'تعديل لون') {
                $('#editorWrapper, #methodWrapper').removeClass('d-none');
            }
        });

        $('#colorCodeInput').on('keypress', function(e) {
            if (e.which === 13) {
                e.preventDefault();

                let code = $(this).val().trim();
                if (!code) return;

                $.ajax({
                    url: "{{ route('shooting-products.manual.findColor') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        code: code
                    },
                    success: function(res) {
                        if (!res.found) {
                            $('#colorResult').html(
                                `<div class="alert alert-danger">لم يتم العثور على اللون بهذا الكود</div>`
                            );
                            return;
                        }

                        $('#colorResult').html('');
                        $('#selectedColorsTable').removeClass('d-none');

                        const row = `
                            <tr>
                                <td>${counter++}</td>
                                <td>${res.code}</td>
                                <td>${res.product}</td>
                                <td><button type="button" class="btn btn-sm btn-danger remove-row">X</button></td>
                                <input type="hidden" name="selected_colors[]" value="${res.id}">
                            </tr>
                        `;


                        $('#colorsTableBody').append(row);
                        $('#colorCodeInput').val('').focus();
                    }
                });
            }
        });

        $(document).on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
        });
    </script>
@endsection
