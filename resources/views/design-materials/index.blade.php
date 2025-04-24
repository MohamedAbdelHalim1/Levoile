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
                <div class="row mb-4">
                    <div class="m-2">
                        <a href="{{ route('design-materials.create') }}" class="btn btn-primary">
                            {{ __('إضافة خامة') }}
                        </a>
                    </div>
                </div>
                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الخامة</th>
                            <th>عدد الألوان</th>
                            <th>الصورة</th>
                            <th>إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($materials as $index => $material)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $material->name }}</td>
                                <td>
                                    <span class="badge bg-primary" data-bs-toggle="tooltip" data-bs-html="true"
                                        title="
                                        <table class='table table-sm table-bordered text-center mb-0'>
                                            <thead class='table-light'>
                                                <tr>
                                                    <th>اللون</th>
                                                    <th>كود</th>
                                                    <th>مطلوب</th>
                                                    <th>مستلم</th>
                                                    <th>متبقي</th>
                                                    <th>تسليم</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($material->colors as $c)
                                                    <tr>
                                                        <td>{{ $c->name }}</td>
                                                        <td>{{ $c->code ?? '-' }}</td>
                                                        <td>{{ $c->required_quantity ?? '-' }}</td>
                                                        <td>{{ $c->received_quantity ?? '-' }}</td>
                                                        <td>{{ $c->required_quantity - $c->received_quantity ?? '-' }}</td>
                                                        <td>{{ $c->delivery_date ?? '-' }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        ">
                                        {{ $material->colors->count() }}
                                    </span>
                                </td>
                                <td>
                                    @if ($material->image)
                                        <img src="{{ asset($material->image) }}" width="60" class="img-thumbnail">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('design-materials.show', $material->id) }}"
                                        class="btn btn-info btn-sm">
                                        عرض التفاصيل
                                    </a>
                                    <a href="{{ route('design-materials.edit', $material->id) }}"
                                        class="btn btn-warning btn-sm">
                                        تعديل
                                    </a>
                                    <form action="{{ route('design-materials.destroy', $material->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('هل أنت متأكد من حذف هذه الخامة وكل ألوانها؟');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">لا توجد خامات بعد</td>
                            </tr>
                        @endforelse
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

    <script>
        $(function () {
                $('[data-bs-toggle="tooltip"]').tooltip({
                    container: 'body',
                    html: true,
                    boundary: 'window'
                });
            });
    </script>
@endsection
