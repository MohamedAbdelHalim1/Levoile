@extends('layouts.app')

@section('content')
<div class="p-2">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <h1 class="mb-4 text-xl font-bold">{{ __('عرض عينة منتج') }}</h1>
            
            <div class="row">
                {{-- بيانات المنتج --}}
                <div class="col-md-8">
                    <div class="mb-2"><strong>الاسم:</strong> {{ $sample->description }}</div>
                    <div class="mb-2"><strong>القسم:</strong> {{ $sample->category?->name }}</div>
                    <div class="mb-2"><strong>الموسم:</strong> {{ $sample->season?->name }}</div>
                    <div class="mb-2">
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
                    <div class="mb-2"><strong>عدد الخامات:</strong> {{ $sample->materials->count() }}</div>
                    <div class="mb-2"><strong>رقم الماركر:</strong> {{ $sample->marker_number ?? '-' }}</div>
                    <div class="mb-2"><strong>استهلاك القطعة:</strong> {{ $sample->marker_consumption ?? '-' }}</div>
                    <div class="mb-2"><strong>الوحدة:</strong> {{ $sample->marker_unit ?? '-' }}</div>
                    <div class="mb-2">
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
                {{-- صور المنتج --}}
                <div class="col-md-4 text-center">
                    <div class="mb-3">
                        <strong>الصورة:</strong><br>
                        @if($sample->image)
                            <img src="{{ asset($sample->image) }}" alt="الصورة" style="max-width:120px;max-height:100px; border-radius: 7px;">
                        @else
                            <span>لا يوجد صورة</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <strong>صورة الماركر:</strong><br>
                        @if ($sample->marker_image)
                            <a href="{{ asset($sample->marker_image) }}" target="_blank">
                                <img src="{{ asset($sample->marker_image) }}" alt="صورة الماركر"
                                    style="max-width:80px;max-height:80px;object-fit:cover; border-radius:7px;">
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

             {{-- نظام التعليقات --}}
             <div class="mt-5">
                <h4 class="mb-2">التعليقات</h4>

                {{-- فورم إضافة تعليق --}}
                @auth
                    <form action="{{ route('design-sample-products.add-comment', $sample->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
                        @csrf
                        <div class="mb-2">
                            <textarea name="content" class="form-control" rows="2" placeholder="اكتب تعليقك هنا..." required></textarea>
                        </div>
                        <div class="mb-2">
                            <input type="file" name="image" accept="image/*" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">إضافة تعليق</button>
                    </form>
                @endauth

                {{-- عرض التعليقات --}}
                <div>
                    @forelse($comments as $comment)
                        <div class="card mb-3">
                            <div class="card-body d-flex align-items-start">
                                <div class="flex-shrink-0 me-3">
                                    <img src="{{ $comment->user->profile_image ? asset($comment->user->profile_image) : asset('default-avatar.png') }}"
                                         alt="User" style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <strong>{{ $comment->user->name }}</strong>
                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                    <div class="mt-1">{{ $comment->content }}</div>
                                    @if($comment->image)
                                        <div class="mt-2">
                                            <img src="{{ asset($comment->image) }}" alt="comment image"
                                                 style="max-width:120px;max-height:120px;border-radius:7px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-muted text-center">لا يوجد تعليقات بعد.</div>
                    @endforelse
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('design-sample-products.index') }}" class="btn btn-secondary">الرجوع</a>
            </div>
        </div>
    </div>
</div>
@endsection
