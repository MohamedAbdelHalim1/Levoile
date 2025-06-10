@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h4>{{ __('messages.upload_stock') }}</h4>
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('product-knowledge.stock.upload.save') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="stock_type" class="form-label">{{ __('messages.stock_type') }}</label>
            <select name="stock_id" id="stock_type" class="form-select" required>
                <option value="">{{ __('messages.select_stock_type') }}</option>
                <option value="1">{{ __('messages.stock') }}</option>
                <option value="2">{{ __('messages.gomla') }}</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="excel_file" class="form-label">{{ __('messages.excel_file_contains_code_and_quantity') }}</label>
            <input type="file" name="excel_file" id="excel_file" class="form-control" accept=".xlsx,.xls" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.upload') }}</button>
        <a href="{{ route('product-knowledge.lists') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
    </form>
</div>
@endsection
