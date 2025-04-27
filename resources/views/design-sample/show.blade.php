@extends('layouts.app')

@section('content')
<div class="p-2">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <h1 class="mb-4 text-xl font-bold">{{ __('عرض عينة منتج') }}</h1>
            
            <div class="row g-3">
                <div class="col-md-3">
                    <div><strong>الاسم:</strong> {{ $sample->description }}</div>
                </div>
                <div class="col-md-3">
                    <div><strong>القسم:</strong> {{ $sample->category?->name }}</div>
                </div>
                <div class="col-md-3">
                    <div><strong>الموسم:</strong> {{ $sample->season?->name }}</div>
                </div>
                <div class="col-md-3">
                    <div>
                        <strong>الحالة:</strong>
                        @if ($sample->status === 'new')
                            <span class="badge bg-success">جديد</span>
                        @elseif($sample->status === 'تم التوزيع')
                            <span class="badge bg-primary">تم التوزيع</span>
                        @elseif($sample->status === 'قيد المراجعه')
                            <span class="badge bg-warning text-dark">قيد المراجعة</span>
                        @elseif($sample->status === 'تم المراجعه')
                            <span class="badge bg-info text-dark">تم المراجعة</span>
                        @else
                            <span class="badge bg-secondary">{{ __($sample->status) }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div>
                        <strong>الصورة:</strong>
                        @if($sample->image)
                            <img src="{{ asset($sample->image) }}" alt="الصورة" width="100" style="border-radius: 7px;">
                        @else
                            <span>لا يوجد صورة</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div>
                        <strong>عدد الخامات:</strong>
                        {{ $sample->materials->count() }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div><strong>رقم الماركر:</strong> {{ $sample->marker_number ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div>
                        <strong>صورة الماركر:</strong>
                        @if ($sample->marker_image)
                            <a href="{{ asset($sample->marker_image) }}" target="_blank">
                                <img src="{{ asset($sample->marker_image) }}" alt="صورة الماركر"
                                    width="60" height="60" style="object-fit:cover; border-radius:7px;">
                            </a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div><strong>استهلاك القطعة:</strong> {{ $sample->marker_consumption ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div><strong>الوحدة:</strong> {{ $sample->marker_unit ?? '-' }}</div>
                </div>
                <div class="col-md-4">
                    <div>
                        <strong>ملف التكنيكال شيت:</strong>
                        @if ($sample->marker_file)
                            <a href="{{ asset($sample->marker_file) }}" download>
                                <i class="fa fa-download fa-lg"></i>
                                تحميل
                            </a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- جدول الخامات --}}
            <div class="mt-5">
                <h4 class="mb-2">الخامات</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>عدد الألوان</th>
                                <th>رابط الخامة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sample->materials as $i => $m)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>
                                        @if($m->material)
                                            {{ $m->material->name }}
                                        @else
                                            <span class="text-danger">خامة غير موجودة (أو محذوفة)</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($m->material)
                                            {{ $m->material->colors->count() }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($m->material)
                                            <a href="{{ route('design-materials.show', $m->material->id) }}" target="_blank" class="btn btn-sm btn-outline-info">
                                                تفاصيل الخامة
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">لا يوجد خامات</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('design-sample-products.index') }}" class="btn btn-secondary">الرجوع</a>
            </div>
        </div>
    </div>
</div>
@endsection
