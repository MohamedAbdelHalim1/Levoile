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
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>اسم اللون</th>
                                <th>كود اللون</th>
                                <th>الكمية المطلوبة</th>
                                <th>الكمية المستلمة</th>
                                <th>تاريخ التسليم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($material->colors as $index => $color)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $color->name }}</td>
                                    <td>
                                        {{ $color->code ?? '-' }}
                                    </td>
                                    <td>{{ $color->required_quantity ?? '-' }}</td>
                                    <td>{{ $color->received_quantity ?? '-' }}</td>
                                    <td>{{ $color->delivery_date ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-muted">لا توجد ألوان</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('design-materials.index') }}" class="btn btn-secondary mt-4">رجوع</a>
            </div>
        </div>
    </div>
@endsection
