@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
                @if (session('success'))
                    <div class="alert alert-primary" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">x</button>
                        {{ session('success') }}
                    </div>
                @endif

                <h1>{{ __('عينات المنتج') }}</h1>
                <div class="mb-3">
                    @if (auth()->user()->hasPermission('إضافة منتج'))
                        <div class="flex justify-end mb-4">
                            <a href="{{ route('design-sample-products.create') }}" class="btn btn-success">
                                {{ __('إضافة عينة منتج') }}
                            </a>
                        </div>
                    @endif
                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>القسم</th>
                                <th>الموسم</th>
                                <th>عدد الخامات</th>
                                <th>الصورة</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($samples as $key => $sample)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $sample->description }}</td>
                                    <td>{{ $sample->category?->name }}</td>
                                    <td>{{ $sample->season?->name }}</td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#materialsModal{{ $sample->id }}">
                                            {{ $sample->materials->count() }}
                                        </a>
                                        <!-- Modal استعراض الخامات -->
                                        <div class="modal fade" id="materialsModal{{ $sample->id }}" tabindex="-1"
                                            aria-labelledby="materialsModalLabel{{ $sample->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="materialsModalLabel{{ $sample->id }}">الخامات الخاصة
                                                            بالمنتج</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul>
                                                            @foreach ($sample->materials as $m)
                                                            @dd($m->material)
                                                                @if ($m->material)
                                                                    <li>{{ $m->material->name }}</li>
                                                                @else
                                                                    <li class="text-danger">خامة غير موجودة (أو محذوفة)</li>
                                                                @endif
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($sample->image)
                                            <img src="{{ asset($sample->image) }}" alt="الصورة" width="50">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('design-sample-products.show', $sample->id) }}"
                                            class="btn btn-info btn-sm">عرض</a>
                                        <a href="{{ route('design-sample-products.edit', $sample->id) }}"
                                            class="btn btn-warning btn-sm">تعديل</a>
                                        <form action="{{ route('design-sample-products.destroy', $sample->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                        </form>
                                        <!-- زر إضافة الخامات -->
                                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#addMaterialsModal{{ $sample->id }}">
                                            إضافة خامات
                                        </button>
                                        <!-- Modal إضافة الخامات -->
                                        <div class="modal fade" id="addMaterialsModal{{ $sample->id }}" tabindex="-1"
                                            aria-labelledby="addMaterialsLabel{{ $sample->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form
                                                    action="{{ route('design-sample-products.attach-materials', $sample->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="addMaterialsLabel{{ $sample->id }}">إضافة خامات
                                                                للعينة</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>اختر الخامات</label>
                                                            <select class="form-control" name="materials[]" id="material_id"
                                                                multiple required>
                                                                @foreach ($materials as $material)
                                                                    <option value="{{ $material->id }}"
                                                                        @if ($sample->materials->pluck('design_material_id')->contains($material->id)) selected @endif>
                                                                        {{ $material->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">إغلاق</button>
                                                            <button type="submit" class="btn btn-primary">حفظ</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Tom Select
            new TomSelect('#material_id', {
                placeholder: "اختر الخامه"
            });
        });
    </script>
@endsection
