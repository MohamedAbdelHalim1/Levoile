@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h4>رفع كميات المخزون</h4>
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('product-knowledge.stock.upload.save') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="stock_type" class="form-label">نوع المخزن</label>
            <select name="stock_id" id="stock_type" class="form-select" required>
                <option value="">اختر نوع المخزن</option>
                <option value="1">مخزن</option>
                <option value="2">جملة</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="excel_file" class="form-label">ملف Excel يحتوي على الكود والكمية</label>
            <input type="file" name="excel_file" id="excel_file" class="form-control" accept=".xlsx,.xls" required>
        </div>

        <button type="submit" class="btn btn-primary">رفع الكميات</button>
        <a href="{{ route('product-knowledge.lists') }}" class="btn btn-secondary">رجوع</a>
    </form>
</div>
@endsection
