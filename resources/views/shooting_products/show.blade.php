@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
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

                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">تفاصيل الألوان وجلسات التصوير</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>اللون</th>
                                        <th>الكود</th>
                                        <th>الحالة</th>
                                        <th>كود اللون</th> {{-- ✅ Color Code --}}
                                        <th>كود المقاس</th> {{-- ✅ Size Code --}}
                                        <th>اسم المقاس</th> {{-- ✅ Size Name --}}
                                        <th>الموقع</th>
                                        <th>تاريخ التصوير</th>
                                        <th>المصور</th>
                                        <th>تاريخ التعديل</th>
                                        <th>المحرر</th>
                                        <th>تاريخ التسليم</th>
                                        <th>الجلسات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->shootingProductColors as $index => $color)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $color->name ?? '-' }}</td>
                                            <td>{{ $color->code ?? '-' }}</td>
                                            <td>
                                                <span
                                                    class="badge 
                                                    {{ $color->status == 'completed'
                                                        ? 'bg-success'
                                                        : ($color->status == 'in_progress'
                                                            ? 'bg-warning text-dark'
                                                            : 'bg-secondary') }}">
                                                    {{ $color->status == 'completed' ? 'مكتمل' : ($color->status == 'in_progress' ? 'قيد التصوير' : 'جديد') }}
                                                </span>
                                            </td>

                                            {{-- ✅ Color Code --}}
                                            <td>{{ $color->color_code ?? '-' }}</td>

                                            {{-- ✅ Size Code --}}
                                            <td>{{ $color->size_code ?? '-' }}</td>

                                            {{-- ✅ Size Name --}}
                                            <td>{{ $color->size_name ?? '-' }}</td>

                                            <td>{{ $color->location ?? '-' }}</td>
                                            <td>{{ $color->date_of_shooting ?? '-' }}</td>
                                            <td>
                                                @if ($color->photographer)
                                                    @foreach (json_decode($color->photographer) as $id)
                                                        <span class="badge bg-primary">
                                                            {{ optional(\App\Models\User::find($id))->name ?? '-' }}
                                                        </span>
                                                    @endforeach
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $color->date_of_editing ?? '-' }}</td>
                                            <td>
                                                @if ($color->editor)
                                                    @foreach (json_decode($color->editor) as $id)
                                                        <span class="badge bg-dark">
                                                            {{ optional(\App\Models\User::find($id))->name ?? '-' }}
                                                        </span>
                                                    @endforeach
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $color->date_of_delivery ?? '-' }}</td>
                                            <td>
                                                @if ($color->sessions->count())
                                                    @foreach ($color->sessions as $session)
                                                        <div class="mb-1 border rounded p-1">
                                                            <div><strong>السيشن:</strong> {{ $session->reference }}</div>
                                                            <div>
                                                                <strong>الحالة:</strong>
                                                                <span
                                                                    class="badge {{ $session->status == 'completed' ? 'bg-success' : 'bg-warning text-dark' }}">
                                                                    {{ $session->status == 'completed' ? 'مكتمل' : 'جديد' }}
                                                                </span>
                                                            </div>
                                                            @if ($session->drive_link)
                                                                <div>
                                                                    <a href="{{ $session->drive_link }}" target="_blank"
                                                                        class="text-decoration-underline text-primary">
                                                                        رابط الجلسة
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <span class="text-muted">لا يوجد</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
