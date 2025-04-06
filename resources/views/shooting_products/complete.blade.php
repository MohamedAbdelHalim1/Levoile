@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h3 class="mb-4">اكمال بيانات المنتج: {{ $product->name }}</h3>
                <form method="POST" action="{{ route('shooting-products.complete.save', $product->id) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label>اسم المنتج</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>الوصف</label>
                        <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                    </div>

                    <hr>
                    <h5>تفاصيل الألوان</h5>

                    <div class="row">
                        @for ($i = 1; $i <= $product->number_of_colors; $i++)
                            <div class="col-md-4">
                                <div class="border p-3 mb-3 rounded bg-light">
                                    <h6>لون {{ $i }}</h6>
                                    <div class="mb-2">
                                        <label>اسم اللون</label>
                                        <input type="text" name="colors[{{ $i }}][name]" class="form-control"
                                            required>
                                    </div>
                                    <div class="mb-2">
                                        <label>الكود</label>
                                        <input type="text" name="colors[{{ $i }}][code]" class="form-control"
                                            required>
                                    </div>
                                    <div class="mb-2">
                                        <label>الصورة</label>
                                        <input type="file" name="colors[{{ $i }}][image]" class="form-control"
                                            accept="image/*" required>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>

                    <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                    <a href="{{ route('shooting-products.index') }}" class="btn btn-secondary">رجوع</a>
                </form>
            </div>
        </div>
    </div>
@endsection
