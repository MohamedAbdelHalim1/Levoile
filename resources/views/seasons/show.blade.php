@extends('layouts.app')

@section('content')

<div class="p-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Season Card -->
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <h1>تفاصيل الموسم</h1>
            <div class="d-flex mb-3">
                <label class="form-label text-lg"><strong><b>الاسم:</b></strong></label>
                <p class="ms-3">{{ $season->name }}</p>
            </div>
            <div class="d-flex mb-3">
                <label class="form-label text-lg"><strong><b>الكود:</b></strong></label>
                <p class="ms-3">{{ $season->code ?? 'N/A' }}</p>
            </div>
            <a href="{{ route('seasons.index') }}" class="btn btn-secondary">العود للقائمة</a>
        </div>
    </div>
</div>

@endsection
