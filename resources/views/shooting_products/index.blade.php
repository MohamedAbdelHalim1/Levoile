@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="alert alert-primary" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">x</button>
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @if (auth()->user()->hasPermission('إضافة منتج'))
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('shooting-products.create') }}" class="btn btn-success">
                            {{ __('إضافة منتج') }}
                        </a>
                    </div>
                @endif
                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المنتج</th>
                            <th>عدد الألوان</th>
                            <th>الحالة</th>
                            <th>نوع التصوير</th>
                            <th>الموقع</th>
                            <th>تاريخ التصوير</th>
                            <th>المصور</th>
                            <th>تاريخ التعديل</th>
                            <th>المحرر</th>
                            <th>تاريخ التسليم</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shooting_products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->number_of_colors }}</td>
                                <td>
                                    @if($product->status == 'new')
                                        <span class="badge bg-warning">جديد</span>
                                    @elseif($product->status == 'in_progress')
                                        <span class="badge bg-info">قيد التنفيذ</span>
                                    @elseif($product->status == 'completed')
                                        <span class="badge bg-success">مكتمل</span>
                                    @endif
                                </td>
                                <td>{{ $product->type_of_shooting ?? '-' }}</td>
                                <td>{{ $product->location ?? '-' }}</td>
                                <td>{{ $product->date_of_shooting ?? '-' }}</td>
                                <td>
                                    {{-- Photographer (IDs stored as an array) --}}
                                    @if(!empty($product->photographer))
                                        @php
                                            $photographers = json_decode($product->photographer, true);
                                        @endphp
                                        @foreach($photographers as $photographerId)
                                            <span class="badge bg-primary">{{ optional(\App\Models\User::find($photographerId))->name }}</span>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $product->date_of_editing ?? '-' }}</td>
                                <td>
                                    {{-- Editor (IDs stored as an array) --}}
                                    @if(!empty($product->editor))
                                        @php
                                            $editors = json_decode($product->editor, true);
                                        @endphp
                                        @foreach($editors as $editorId)
                                            <span class="badge bg-secondary">{{ optional(\App\Models\User::find($editorId))->name }}</span>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $product->date_of_delivery ?? '-' }}</td>
                                <td>
                                    {{-- Actions will be added later --}}
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
