@extends('layouts.app')

@section('content')
<div class="p-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-4">
            <h4 class="mb-4">إضافة خامة جديدة</h4>
            <form action="{{ route('design-materials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>اسم الخامة <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                    @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>الصورة (اختياري)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
                <button class="btn btn-success">حفظ</button>
                <a href="{{ route('design-materials.index') }}" class="btn btn-secondary">رجوع</a>
            </form>
        </div>
    </div>
</div>
@endsection
