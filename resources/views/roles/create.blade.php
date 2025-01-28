@extends('layouts.app')

@section('content')
<div class="p-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <h3>انشاء دور</h3>
            <form method="POST" action="{{ route('roles.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="form-label">اسم الدور</label>
                    <input type="text" name="name" id="name" class="form-control" required placeholder="ادخل اسم الدور">
                </div>
                <button type="submit" class="btn btn-primary">انشاء</button>
            </form>
        </div>
    </div>
</div>
@endsection
