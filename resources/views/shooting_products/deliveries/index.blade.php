@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <div class="d-flex justify-content-between mb-3">
                    <h4>ملفات تسليمات التصوير</h4>
                    <a href="{{ route('shooting-deliveries.upload.create') }}" class="btn btn-primary">رفع شيت جديد</a>
                </div>

                <table class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>تاريخ الرفع</th>
                            <th>الحالة</th>
                            <th>عدد المنتجات</th>
                            <th>عدد الموديلات</th>
                            <th>تم النشر</th>
                            <th>عدد الموديلات الجديده</th>
                            <th>عدد الموديلات القديمه</th>
                            <th>اسم الرافع</th>
                            <th>اسم الناشر</th>
                            <th>تحميل</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deliveries as $delivery)
                            <tr>
                                <td>{{ $delivery->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <span
                                        class="badge bg-{{ $delivery->status == 'تم ألنشر' ? 'warning' : 'success' }}">{{ $delivery->status }}</span>
                                </td>
                                <td>{{ $delivery->unique_products }}</td>
                                <td>{{ $delivery->total_records }}</td>
                                @php
                                    $receivedCount = $delivery->contents()->where('is_received', 1)->count();
                                @endphp
                                <td>{{ $receivedCount }}</td>

                                <td>{{ $delivery->new_records ?? 0 }}</td>
                                <td>{{ $delivery->old_records ?? 0 }}</td>
                                <td>{{ $delivery->user->name }}</td>
                                <td>{{ optional($delivery->sender)->name }}</td>
                                <td>
                                    <a href="{{ asset('excel/' . $delivery->filename) }}" class="btn btn-sm btn-info"
                                        download>
                                        <i class="fa fa-download"></i>
                                    </a>
                                </td>

                                <td>
                                    {{-- @if ($delivery->contents()->where('status', 'new')->count() === 0)
                                        <a href="{{ route('shooting-deliveries.show', $delivery->id) }}"
                                            class="btn btn-info">عرض</a>
                                    @else --}}
                                        <a href="{{ route('shooting-deliveries.send.page', $delivery->id) }}"
                                            class="btn btn-warning">
                                            @if ($delivery->status == 'تم ألنشر')
                                            اعاده النشر
                                            @else
                                            نشر
                                            @endif
                                        </a>
                                    {{-- @endif --}}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection


