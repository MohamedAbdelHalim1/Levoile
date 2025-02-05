@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Date Range Filter -->
            <form method="GET" action="{{ route('reports.categoryStatus') }}" class="row mb-4">
                <div class="col-md-4">
                    <label>من تاريخ</label>
                    <input type="date" class="form-control" name="startDate" value="{{ request('startDate') }}">
                </div>
                <div class="col-md-4">
                    <label>إلى تاريخ</label>
                    <input type="date" class="form-control" name="endDate" value="{{ request('endDate') }}">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">بحث</button>
                    <a href="{{ route('reports.categoryStatus') }}" class="btn btn-secondary">إلغاء</a>
                </div>
            </form>

            <!-- Table -->
            <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>القسم</th>
                            <th>عدد المنتجات</th>
                            <th>عدد الألوان</th>
                            <th>جديد</th>
                            <th>جاري التصنيع</th>
                            <th>مؤجل</th>
                            <th>ملغي</th>
                            <th>استلام كامل</th>
                            <th>استلام جزئي</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->category }}</td>
                                <td>{{ $category->product_count }}</td>
                                <td>{{ $category->color_count }}</td>
                                <td>{{ $category->new_count }}</td>
                                <td>{{ $category->processing_count }}</td>
                                <td>{{ $category->postponed_count }}</td>
                                <td>{{ $category->cancel_count }}</td>
                                <td>{{ $category->complete_count }}</td>
                                <td>{{ $category->partial_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- SELECT2 JS -->
    <script src="{{ asset('build/assets/plugins/select2/select2.full.min.js') }}"></script>
    @vite('resources/assets/js/select2.js')

    <!-- DATA TABLE JS -->
    <script src="{{ asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    @vite('resources/assets/js/table-data.js')
@endsection
