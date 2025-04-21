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
                <h3 class="mb-4">اكمال بيانات المنتج: {{ $product->name }} - {{ $product->custom_id }}</h3>
                <form method="POST" action="{{ route('shooting-products.complete.save', $product->id) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <label>اسم المنتج</label>
                            <input type="text" name="name" value="{{ $product->name ?? '' }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>السعر</label>
                            <input type="text" class="form-control" value="{{ $product->price }}" name="price">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>الوصف</label>
                            <textarea name="description" class="form-control">{{ $product->description ?? '' }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>الصورة الرئيسية</label>
                            <div class="position-relative">
                                @if ($product->main_image && file_exists(public_path('images/shooting/' . $product->main_image)))
                                    <img src="{{ asset('images/shooting/' . $product->main_image) }}"
                                        class="img-thumbnail mb-2" width="150">
                                @else
                                    <span class="text-muted">لا توجد صورة حالية</span>
                                @endif
                            </div>

                            <input type="file" name="main_image" class="form-control mt-2" accept="image/*">
                        </div>
                    </div>

                    <hr>
                    <h5 class="mt-4">معرض الصور</h5>
                    <div class="mb-3">
                        <label class="form-label">+ أضف صور جديدة</label>
                        <input type="file" name="gallery_images[]" class="form-control" multiple>
                    </div>

                    <div class="row">
                        @foreach ($product->gallery as $image)
                            <div class="col-md-3 position-relative mb-3">
                                <img src="{{ asset('images/shooting/' . $image->image) }}" class="img-fluid rounded border"
                                    style="max-height: 200px; object-fit: cover;">
                                <button type="button"
                                    class="btn btn-danger btn-sm position-absolute top-0 end-0 delete-image"
                                    data-id="{{ $image->id }}" style="z-index: 10;">X</button>
                            </div>
                        @endforeach
                    </div>


                    <hr>
                    <h5>تفاصيل الألوان والمقاسات</h5>
                    <div class="row g-4">
                        @foreach ($groupedColors as $colorCode => $colorGroup)
                            <div class="col-md-4">
                                <div class="border p-3 mb-3 rounded bg-light">
                                    <h6>كود اللون: {{ $colorCode }}</h6>
                                    <input type="hidden" name="colors[{{ $loop->index + 1 }}][color_code]" value="{{ $colorCode }}">
                                    <input type="hidden" name="colors[{{ $loop->index + 1 }}][ids]" value="{{ implode(',', $colorGroup->pluck('id')->toArray()) }}">
                                    
                                    <div class="mb-2">
                                        <label>اسم اللون</label>
                                        <input type="text" name="colors[{{ $loop->index + 1 }}][name]" class="form-control"
                                            value="{{ $colorGroup->first()->name }}">
                                    </div>
                                    <h6 class="mt-3">المقاسات:</h6>
                                    @foreach ($colorGroup as $size)
                                        <div class="mb-2">
                                            <label>مقاس ({{ $size->size_code }})</label>
                                            <input type="text" name="colors[{{ $loop->parent->index + 1 }}][sizes][{{ $size->id }}]" class="form-control"
                                                value="{{ $size->size_name }}">
                                        </div>
                                    @endforeach
                                    <hr>
                                    <div class="mb-2">
                                        <label>الصورة</label>
                                        <input type="file" name="colors[{{ $loop->index + 1 }}][image]" class="form-control" accept="image/*">
                                        @if (!empty($colorGroup->first()->image) && file_exists(public_path($colorGroup->first()->image)))
                                            <img src="{{ asset($colorGroup->first()->image) }}" class="img-thumbnail mt-2" width="100">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <button type="submit" class="btn btn-primary" id="saveButton" disabled>حفظ البيانات</button>
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

        $(document).ready(function() {
            const $form = $('form');
            const $saveBtn = $('#saveButton');

            $form.on('input change', 'input, textarea, select', function() {
                $saveBtn.prop('disabled', false);
            });
        });
    </script>
    <script>
        function showImagePreview(src) {
            document.getElementById('previewImage').src = src;
        }

        $(document).ready(function() {
            $('.delete-image').click(function() {
                const id = $(this).data('id');
                const box = $(this).closest('.col-md-3');

                if (!confirm('هل أنت متأكد من حذف هذه الصورة؟')) return;

                $.ajax({
                    url: '{{ route('gallery.delete') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    success: function(response) {
                        if (response.success) {
                            box.remove();
                        } else {
                            alert('فشل في الحذف');
                        }
                    }
                });
            });

            $('form').on('input change', 'input, textarea, select', function() {
                $('#saveButton').prop('disabled', false);
            });
        });
    </script>
@endsection
