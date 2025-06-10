@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Factory Card -->
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <h1>{{ __('messages.edit_factory') }}</h1>
            <form action="{{ route('factories.update', $factory->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('messages.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $factory->name }}" required>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('messages.edit') }}</button>
            </form>
        </div>
    </div>
@endsection
