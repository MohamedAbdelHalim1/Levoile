@extends('layouts.app')

@section('content')
<div class="container p-3">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">الخامات</h4>
            <a href="{{ route('design-materials.create') }}" class="btn btn-success">إضافة خامة جديدة</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>اسم الخامة</th>
                            <th>عدد الألوان</th>
                            <th>الصورة</th>
                            <th>إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($materials as $index => $material)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $material->name }}</td>
                                <td>{{ $material->colors_count }}</td>
                                <td>
                                    @if ($material->image)
                                        <img src="{{ asset($material->image) }}" width="60" class="img-thumbnail">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('design-materials.show', $material->id) }}" class="btn btn-info btn-sm">
                                        عرض التفاصيل
                                    </a>
                                    <a href="{{ route('design-materials.edit', $material->id) }}" class="btn btn-warning btn-sm">
                                        تعديل
                                    </a>
                                    <form action="{{ route('design-materials.destroy', $material->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('هل أنت متأكد من حذف هذه الخامة وكل ألوانها؟');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">لا توجد خامات بعد</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
