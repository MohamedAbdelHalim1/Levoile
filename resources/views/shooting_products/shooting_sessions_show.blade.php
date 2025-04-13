@extends('layouts.app')

@section('content')
<div class="p-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="bg-white shadow sm:rounded-lg p-4">
            <h4 class="mb-4">تفاصيل جلسة التصوير : {{ $reference }}</h4>

            <div class="table-responsive">
                <table class="table table-bordered text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>اسم المنتج</th>
                            <th>الكود الرئيسي</th>
                            <th>كود اللون</th>
                            <th>نوع التصوير</th>
                            <th>مكان التصوير</th>
                            <th>تاريخ التصوير</th>
                            <th>المصورين</th>
                            <th>تاريخ التعديل</th>
                            <th>المحررين</th>
                            <th>تاريخ التسليم</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $colorSession)
                            @php $color = $colorSession->color; @endphp
                            <tr>
                                <td>{{ $color->shootingProduct->name }}</td>
                                <td>{{ $color->shootingProduct->custom_id }}</td>
                                <td>{{ $color->code }}</td>
                                <td>{{ $color->type_of_shooting ?? '-' }}</td>
                                <td>{{ $color->location ?? '-' }}</td>
                                <td>{{ $color->date_of_shooting ?? '-' }}</td>
                                <td>
                                    @if($color->photographer)
                                        @foreach(json_decode($color->photographer, true) as $photographerId)
                                            <span class="badge bg-primary">{{ optional(\App\Models\User::find($photographerId))->name }}</span>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $color->date_of_editing ?? '-' }}</td>
                                <td>
                                    @if($color->editor)
                                        @foreach(json_decode($color->editor, true) as $editorId)
                                            <span class="badge bg-secondary">{{ optional(\App\Models\User::find($editorId))->name }}</span>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $color->date_of_delivery ?? '-' }}</td>
                                <td>
                                    @if ($color->status == 'in_progress')
                                        <span class="badge bg-info">قيد التصوير</span>
                                    @elseif ($color->status == 'completed')
                                        <span class="badge bg-success">مكتمل</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <a href="{{ route('shooting-sessions.index') }}" class="btn btn-secondary mt-3">رجوع</a>
        </div>
    </div>
</div>
@endsection
