@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-4">تعديل الخامة: {{ $material->name }}</h4>
                <form action="{{ route('design-materials.update', $material->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>اسم الخامة</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name', $material->name) }}">
                        </div>
                        <div class="col-md-6">
                            <label>الصورة الحالية</label><br>
                            @if($material->image)
                                <img src="{{ asset($material->image) }}" width="80" class="img-thumbnail mb-2">
                            @else
                                <span class="text-muted">لا توجد صورة</span>
                            @endif
                            <input type="file" name="image" class="form-control mt-2" accept="image/*">
                        </div>
                    </div>
                    <hr>
                    <h5>ألوان الخامة</h5>
                    <div id="colors-area">
                        @foreach($material->colors as $index => $color)
                            <div class="row mb-2 color-row">
                                <input type="hidden" name="colors[{{ $index }}][id]" value="{{ $color->id }}">
                                <div class="col-md-5">
                                    <input type="text" name="colors[{{ $index }}][name]" class="form-control"
                                        value="{{ old('colors.' . $index . '.name', $color->name) }}" placeholder="اسم اللون">
                                </div>
                                <div class="col-md-5">
                                    <input type="color" name="colors[{{ $index }}][code]" class="form-control"
                                        value="{{ old('colors.' . $index . '.code', $color->code ?? '#000000') }}">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger remove-color">حذف</button>
                                </div>
                            </div>
                        @endforeach
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
    <script>
        let colorIndex = {{ $material->colors->count() }};
        $('#add-color').click(function () {
            let row = `
                <div class="row mb-2 color-row">
                    <div class="col-md-5">
                        <input type="text" name="colors[${colorIndex}][name]" class="form-control" placeholder="اسم اللون">
                    </div>
                    <div class="col-md-5">
                        <input type="color" name="colors[${colorIndex}][code]" class="form-control" value="#000000">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-color">حذف</button>
                    </div>
                </div>
            `;
            $('#colors-area').append(row);
            colorIndex++;
        });
        $(document).on('click', '.remove-color', function () {
            $(this).closest('.color-row').remove();
        });
    </script>
@endsection
