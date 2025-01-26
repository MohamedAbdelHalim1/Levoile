@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Color Card -->
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <h1>تعديل لون</h1>
            <form action="{{ route('colors.update', $color->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">ألاسم</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $color->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">الكود</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{ $color->code }}">
                </div>
                <button type="submit" class="btn btn-primary">تعديل</button>
            </form>
        </div>
    </div>
@endsection
