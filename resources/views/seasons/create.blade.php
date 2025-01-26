@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Season Card -->
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <h1>اضافة موسم</h1>
            <form action="{{ route('seasons.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">ألاسم</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">الكود</label>
                    <input type="text" class="form-control" id="code" name="code" required>
                </div>
                <button type="submit" class="btn btn-primary">اضافة</button>
            </form>
        </div>
    </div>
@endsection
