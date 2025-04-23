@extends('layouts.app')

@section('content')
<div class="p-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-4">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>تفاصيل الخامة: {{ $material->name }}</h4>
                <a href="{{ route('design-materials.colors.create', $material->id) }}" class="btn btn-success">
                    إضافة لون جديد
                </a>
            </div>
            <div class="mb-3">
                <strong>الوصف:</strong> {{ $material->description ?? '-' }}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>اسم اللون</th>
                            <th>كود اللون</th>
                            <th>صورة اللون</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($material->colors as $index => $color)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $color->name }}</td>
                            <td>{{ $color->code }}</td>
                            <td>
                                @if($color->image)
                                    <img src="{{ asset('images/design/colors/' . $color->image) }}" width="60" class="rounded">
                                @else
                                    <span class="text-muted">لا توجد صورة</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('design-materials.colors.edit', $color->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                                <form action="{{ route('design-materials.colors.destroy', $color->id) }}" method="POST" style="display:inline-block;"
                                    onsubmit="return confirm('هل أنت متأكد من حذف هذا اللون؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($material->colors->count() == 0)
                        <tr>
                            <td colspan="5" class="text-center text-muted">لا توجد ألوان لهذه الخامة</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <a href="{{ route('design-materials.index') }}" class="btn btn-secondary mt-3">رجوع للقائمة</a>
        </div>
    </div>
</div>
@endsection
