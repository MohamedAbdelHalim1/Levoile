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
                        <input type="text" name="name" value="{{ $product->name ?? '' }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>الوصف</label>
                        <textarea name="description" class="form-control">{{ $product->description ?? '' }}</textarea>
                    </div>

                    <hr>
                    <h5>تفاصيل الألوان</h5>

                    <div class="row g-4">
                        @for ($i = 0; $i < $product->number_of_colors; $i++)
                            @php
                                $color = $colors[$i] ?? null;
                            @endphp
                            <div class="col-md-4">
                                <div class="border p-3 mb-3 rounded bg-light">
                                    <h6>لون {{ $i + 1 }}</h6>

                                    <div class="mb-2">
                                        <label>اسم اللون</label>
                                        <input type="text" name="colors[{{ $i + 1 }}][name]" class="form-control"
                                            value="{{ $color?->name }}" required>
                                    </div>

                                    <div class="mb-2">
                                        <label>الكود</label>
                                        <input type="text" name="colors[{{ $i + 1 }}][code]" class="form-control"
                                            value="{{ $color?->code }}" required>
                                    </div>

                                    <div class="mb-2">
                                        <label>الصورة</label>
                                        <input type="file" name="colors[{{ $i + 1 }}][image]" class="form-control"
                                            accept="image/*">

                                        @if (!empty($color?->image) && file_exists(public_path($color->image)))
                                            <img src="{{ asset($color->image) }}" class="img-thumbnail mt-2" width="100"
                                                data-bs-toggle="modal" data-bs-target="#imagePreviewModal"
                                                onclick="showImagePreview('{{ asset($color->image) }}')"
                                                style="cursor: pointer;">
                                        @endif

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



    <!-- Image Preview Modal -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark">
                <div class="modal-body text-center">
                    <img id="previewImage" src="" alt="Preview" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function showImagePreview(src) {
            document.getElementById('previewImage').src = src;
        }
    </script>
@endsection
