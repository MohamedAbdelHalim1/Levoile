@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h2 class="text-lg font-bold mb-4">إضافة منتج جديد</h2>

                <form action="{{ route('shooting-products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">اسم المنتج</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الكود التعريفي (Primary ID)</label>
                        <input type="number" name="custom_id" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">عدد الألوان</label>
                        <input type="number" name="number_of_colors" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">السعر</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ألكميه</label>
                        <input type="number" name="quantity" class="form-control" required min="1">
                    </div>
                    

                    <div class="mb-3">
                        <label class="form-label">الصورة الرئيسية</label>
                        <input type="file" name="main_image" class="form-control">
                    </div>
                
                    <div class="mb-3">
                        <label class="form-label">صور المنتج (جاليري)</label>
                        <input type="file" name="gallery_images[]" class="form-control" multiple>
                    </div>

                    <button type="submit" class="btn btn-primary">إضافة المنتج</button>
                </form>
            </div>
        </div>
    </div>
@endsection
