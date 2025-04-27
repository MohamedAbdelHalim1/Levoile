@extends('layouts.app')

@section('content')
<div class="p-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <h1>{{ __('عرض عينة منتج') }}</h1>
            <div class="mb-3">
                <strong>{{ __('الاسم:') }}</strong> {{ $sample->description }}
            </div>
            <div class="mb-3">
                <strong>{{ __('القسم:') }}</strong> {{ $sample->category?->name }}
            </div>
            <div class="mb-3">
                <strong>{{ __('الموسم:') }}</strong> {{ $sample->season?->name }}
            </div>
            <div class="mb-3">
                <strong>{{ __('الصورة:') }}</strong>
                @if($sample->image)
                    <img src="{{ asset($sample->image) }}" alt="الصورة" width="120">
                @else
                    <span>لا يوجد صورة</span>
                @endif
            </div>
            <div class="mb-3">
                <strong>{{ __('الخامات:') }}</strong>
                <ul>
                    @forelse($sample->materials as $m)
                        <li>{{ $m->material->name }}</li>
                    @empty
                        <li>لا يوجد خامات</li>
                    @endforelse
                </ul>
            </div>
            <a href="{{ route('design-sample-products.index') }}" class="btn btn-secondary">الرجوع</a>
        </div>
    </div>
</div>
@endsection
