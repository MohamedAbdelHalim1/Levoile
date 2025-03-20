@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h2 class="text-lg font-bold mb-4">إضافة منتج جديد</h2>

                <form action="{{ route('shooting-products.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">اسم المنتج</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">عدد الألوان</label>
                        <input type="number" name="number_of_colors" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">إضافة المنتج</button>
                </form>
            </div>
        </div>
    </div>
@endsection
