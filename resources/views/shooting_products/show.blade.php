@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">تفاصيل المنتج: {{ $product->name }}</h4>
        </div>
        <div class="card-body">
            <p><strong>الوصف:</strong> {{ $product->description ?? '-' }}</p>
            <p><strong>عدد الألوان:</strong> {{ $product->number_of_colors }}</p>
            <p><strong>السعر:</strong> {{ $product->price ?? '-' }}</p>
            <p><strong>الحالة:</strong>
                @if ($product->status == 'completed')
                    <span class="badge bg-success">مكتمل</span>
                @elseif($product->status == 'in_progress' || $product->status == 'partial')
                    <span class="badge bg-warning text-dark">قيد التنفيذ</span>
                @else
                    <span class="badge bg-secondary">جديد</span>
                @endif
            </p>
        </div>
    </div>

    @foreach ($product->shootingProductColors as $color)
        <div class="card mb-3 border-start border-4 border-info">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <strong>اللون: {{ $color->name ?? '-' }} | الكود: {{ $color->code }}</strong>
                <span class="badge {{ $color->status == 'completed' ? 'bg-success' : ($color->status == 'in_progress' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                    {{ $color->status == 'completed' ? 'مكتمل' : ($color->status == 'in_progress' ? 'قيد التصوير' : 'جديد') }}
                </span>
            </div>
            <div class="card-body">
                <p><strong>الموقع:</strong> {{ $color->location ?? '-' }}</p>
                <p><strong>تاريخ التصوير:</strong> {{ $color->date_of_shooting ?? '-' }}</p>
                <p><strong>تاريخ التعديل:</strong> {{ $color->date_of_editing ?? '-' }}</p>
                <p><strong>تاريخ التسليم:</strong> {{ $color->date_of_delivery ?? '-' }}</p>

                {{-- المصورين --}}
                <p><strong>المصور:</strong>
                    @if($color->photographer)
                        @foreach (json_decode($color->photographer) as $id)
                            <span class="badge bg-primary">{{ \App\Models\User::find($id)->name ?? '-' }}</span>
                        @endforeach
                    @else
                        -
                    @endif
                </p>

                {{-- المحررين --}}
                <p><strong>المحرر:</strong>
                    @if($color->editor)
                        @foreach (json_decode($color->editor) as $id)
                            <span class="badge bg-dark">{{ \App\Models\User::find($id)->name ?? '-' }}</span>
                        @endforeach
                    @else
                        -
                    @endif
                </p>

                {{-- السيشنات --}}
                @if ($color->sessions->count())
                    <div class="mt-3">
                        <h6>جلسات التصوير:</h6>
                        <ul class="list-group">
                            @foreach ($color->sessions as $session)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>السيشن: {{ $session->reference }}</span>
                                    <span class="badge {{ $session->status === 'completed' ? 'bg-success' : 'bg-warning text-dark' }}">
                                        {{ $session->status === 'completed' ? 'مكتمل' : 'جديد' }}
                                    </span>
                                    @if ($session->drive_link)
                                        <a href="{{ $session->drive_link }}" target="_blank" class="btn btn-sm btn-outline-primary">رابط الجلسة</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <p class="text-muted">لا توجد جلسات تصوير لهذا اللون.</p>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
