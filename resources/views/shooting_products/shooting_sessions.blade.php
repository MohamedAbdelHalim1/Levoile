@extends('layouts.app')

@section('content')
<div class="p-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="bg-white shadow sm:rounded-lg p-4">
            <h4 class="mb-4">جلسات التصوير</h4>

            <div class="table-responsive">
                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>اسم المنتج</th>
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
                        @foreach ($colors as $index => $color)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $color->shootingProduct->name }}</td>
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