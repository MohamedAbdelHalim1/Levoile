@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-4">تفاصيل الخامة: {{ $material->name }}</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>اسم الخامة:</strong> {{ $material->name }}
                    </div>
                    <div class="col-md-6">
                        <strong>الصورة:</strong>
                        @if ($material->image)
                            <img src="{{ asset($material->image) }}" width="100" class="img-thumbnail">
                        @else
                            <span class="text-muted">لا توجد صورة</span>
                        @endif
                    </div>
                </div>
                <hr>
                <h5>ألوان الخامة</h5>
                <div class="row">
                    @forelse($material->colors as $color)
                        <div class="col-md-3 mb-3">
                            <div class="border rounded p-2 text-center">
                                <div class="mb-1" style="height: 30px; background: {{ $color->code ?? '#eee' }}; border-radius: 6px;"></div>
                                <strong>{{ $color->name }}</strong>
                                <div class="text-muted">{{ $color->code }}</div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-muted">لا توجد ألوان</div>
                    @endforelse
                </div>
                <a href="{{ route('design-materials.index') }}" class="btn btn-secondary mt-4">رجوع</a>
            </div>
        </div>
    </div>
@endsection
