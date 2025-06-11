@extends('layouts.app')

@section('content')
<div class="p-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <h3>{{ __('messages.edit_role') }} : {{ $role->name }}</h3>
            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="form-label">{{ __('messages.name') }}</label>
                    <input type="text" name="name" id="name" class="form-control" required value="{{ $role->name }}">
                </div>
                <button type="submit" class="btn btn-primary">{{ __('messages.edit') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
