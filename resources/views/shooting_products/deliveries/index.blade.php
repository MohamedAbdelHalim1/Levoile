@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <div class="d-flex justify-content-between mb-3">
                    <h4>ملفات تسليمات التصوير</h4>
                    <a href="{{ route('shooting-deliveries.upload') }}" class="btn btn-primary">رفع شيت جديد</a>
                </div>

                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>تاريخ الرفع</th>
                            <th>الحالة</th>
                            <th>عدد السجلات</th>
                            <th>عدد السجلات المرسلة</th>
                            <th>اسم رافع الملف</th>
                            <th>اسم المرسل</th>
                            <th>تحميل</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deliveries as $delivery)
                            <tr>
                                <td>{{ $delivery->created_at }}</td>
                                <td>{{ $delivery->status }}</td>
                                <td>{{ $delivery->total_records }}</td>
                                <td>{{ $delivery->sent_records }}</td>
                                <td>{{ $delivery->user->name }}</td>
                                <td>{{ $delivery->sender->name }}</td>
                                <td>
                                    <a href="{{ asset('excel/' . $delivery->filename) }}" class="btn btn-sm btn-info"
                                        download><i class="fa fa-download"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('shooting-deliveries.send.page', $delivery->id) }}"
                                        class="btn btn-warning btn-sm">ارسال</a>
                                </td>
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
