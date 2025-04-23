@extends('layouts.app')

@section('content')
<div class="p-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-4">
            <h4 class="mb-4">تعديل الخامة: {{ $material->name }}</h4>
            <form action="{{ route('design-materials.update', $material->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>اسم الخامة <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name', $material->name) }}">
                    @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>الوصف</label>
                    <textarea name="description" class="form-control">{{ old('description', $material->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label>الصورة الحالية</label>
                    <br>
                    @if($material->image)
                        <img src="{{ asset('images/design/' . $material->image) }}" class="img-thumbnail" width="120">
                    @else
                        <span class="text-muted">لا توجد صورة</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label>تغيير الصورة (اختياري)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                <button class="btn btn-primary">تحديث</button>
                <a href="{{ route('design-materials.index') }}" class="btn btn-secondary">رجوع</a>
            </form>
        </div>
    </div>
</div>
@endsection
