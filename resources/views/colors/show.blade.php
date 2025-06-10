@extends('layouts.app')

@section('content')

<div class="p-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Color Card -->
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <h1>{{ __('messages.color_details') }}</h1>
            <div class="d-flex mb-3">
                <label class="form-label text-lg"><strong><b>{{ __('messages.name') }}:</b></strong></label>
                <p class="ms-3">{{ $color->name }}</p>
            </div>
            <div class="d-flex mb-3">
                <label class="form-label text-lg"><strong><b>{{ __('messages.code') }}:</b></strong></label>
                <p class="ms-3">{{ $color->code ?? __('messages.N/A')  }}</p>
            </div>
            <a href="{{ route('colors.index') }}" class="btn btn-secondary">{{ __('messages.back') }}</a>
        </div>
    </div>
</div>

@endsection
