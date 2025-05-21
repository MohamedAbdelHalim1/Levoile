@extends('layouts.app')

@section('content')
    <div class="p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">طرق التصوير</h4>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addWayModal">
                <i class="fa fa-plus"></i> إضافة طريقة تصوير
            </button>
        </div>

        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>اسم الطريقة</th>
                            <th>تاريخ الإضافة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ways as $index => $way)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $way->name }}</td>
                                <td>{{ $way->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">لا توجد طرق تصوير مضافة بعد.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addWayModal" tabindex="-1" aria-labelledby="addWayModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('ways-of-shooting.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addWayModalLabel">إضافة طريقة تصوير</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">اسم الطريقة</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
