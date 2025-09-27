@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Category Card -->
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <h1> {{ __('messages.create_category') }} </h1>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('messages.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="main_category_id" class="form-label">{{ __('messages.main_category') }}</label>
                    <select id="main_category_id" name="main_category_id" class="form-select" required>
                        <option value="" disabled selected>-- {{ __('messages.choose') }} --</option>
                        @foreach ($mainCategories as $mc)
                            <option value="{{ $mc->id }}" {{ old('main_category_id') == $mc->id ? 'selected' : '' }}>
                                {{ $mc->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('messages.add') }}</button>
            </form>
        </div>
    </div>
@endsection
