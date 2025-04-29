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
                <div class="mb-3 table-responsive">
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
                                <th>الحالة</th>
                                <th>الصورة</th>
                                <th>رقم الماركر</th>
                                <th>صورة الماركر</th>
                                <th>استهلاك القطعه</th>
                                <th>الوحده</th>
                                <th>ملف التكنيكال</th>
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
                                                                @if ($m->material)
                                                                    <li>{{ $m->material->name }} <a
                                                                            href="{{ route('design-materials.show', $m->material->id) }}">(
                                                                            {{ $m->material->colors->count() }} )</a></li>
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
                                        @if ($sample->status === 'new')
                                            <span class="badge bg-success">جديد</span>
                                        @elseif($sample->status === 'تم التوزيع')
                                            <span class="badge bg-primary">تم التوزيع</span>
                                        @elseif($sample->status === 'قيد المراجعه')
                                            <span class="badge bg-warning text-dark">قيد المراجعة</span>
                                        @elseif($sample->status === 'تم المراجعه')
                                            <span class="badge bg-info text-dark">تم المراجعة</span>
                                        @elseif($sample->status === 'تأجيل')
                                            <span class="badge bg-secondary text-dark">تأجيل</span>
                                        @elseif($sample->status === 'الغاء')
                                            <span class="badge bg-danger">الغاء</span>
                                        @elseif($sample->status === 'تعديل')
                                            <span class="badge bg-warning text-dark">تعديل</span>
                                        @elseif($sample->status === 'تم اضافة الخامات')
                                            <span class="badge bg-secondary">تم إضافة الخامات</span>
                                        @elseif($sample->status === 'تم اضافة التيكنيكال')
                                            <span class="badge bg-dark text-white">تم إضافة التيكنيكال</span>
                                        @else
                                            <span class="badge bg-secondary">{{ __($sample->status) }}</span>
                                        @endif
                                    </td>


                                    <td>
                                        @if ($sample->image)
                                            <img src="{{ asset($sample->image) }}" alt="الصورة" width="50">
                                        @endif
                                    </td>
                                    <td>
                                        {{-- رقم الماركر --}}
                                        @if ($sample->marker_number)
                                            <span>{{ $sample->marker_number }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- صورة الماركر --}}
                                        @if ($sample->marker_image)
                                            <a href="{{ asset($sample->marker_image) }}" target="_blank">
                                                <img src="{{ asset($sample->marker_image) }}" alt="صورة الماركر"
                                                    width="40" height="40"
                                                    style="object-fit:cover; border-radius:5px;">
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $sample->marker_consumption ?? '-' }}</td>
                                    <td>{{ $sample->marker_unit ?? '-' }}</td>

                                    <td>
                                        {{-- ملف الماركر --}}
                                        @if ($sample->marker_file)
                                            <a href="{{ asset($sample->marker_file) }}" download>
                                                <i class="fa fa-download fa-lg"></i>
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
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
                                        <!-- زر إضافة خامات -->
                                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#addMaterialsModal{{ $sample->id }}"
                                            data-action="addMaterials">إضافة خامات</button>
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

                                        <!-- زر تعيين باترنيست -->
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#assignPatternestModal{{ $sample->id }}"
                                            data-action="assignPatternest">تعيين باترنيست</button>

                                        <!-- Modal تعيين باترنيست -->
                                        <div class="modal fade" id="assignPatternestModal{{ $sample->id }}"
                                            tabindex="-1" aria-labelledby="assignPatternestLabel{{ $sample->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form
                                                    action="{{ route('design-sample-products.assign-patternest', $sample->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="assignPatternestLabel{{ $sample->id }}">تعيين
                                                                باترنيست للعينة</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>اختر الباترنيست</label>
                                                            <select class="form-control patternest-select"
                                                                name="patternest_id" required>
                                                                <option value="">اختر الباترنيست</option>
                                                                @foreach ($patternests as $user)
                                                                    <option value="{{ $user->id }}"
                                                                        @if ($sample->patternest_id == $user->id) selected @endif>
                                                                        {{ $user->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">إغلاق</button>
                                                            <button type="submit" class="btn btn-primary">تعيين</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 11)
                                            <!-- زر إضافة ماركر -->
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#addMarkerModal{{ $sample->id }}"
                                                data-action="addMarker">إضافة ماركر</button>

                                            <!-- Modal إضافة ماركر -->
                                            <div class="modal fade" id="addMarkerModal{{ $sample->id }}"
                                                tabindex="-1" aria-labelledby="addMarkerModalLabel{{ $sample->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form
                                                        action="{{ route('design-sample-products.add-marker', $sample->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="addMarkerModalLabel{{ $sample->id }}">إضافة
                                                                    ماركر</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="إغلاق"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label>رقم الماركر</label>
                                                                    <input type="text" name="marker_number"
                                                                        class="form-control" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>صورة الماركر</label>
                                                                    <input type="file" name="marker_image"
                                                                        class="form-control" accept="image/*" required>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-9 mb-3">
                                                                        <label>استهلاك القطعة</label>
                                                                        <input type="text" name="marker_consumption"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="col-3 mb-3">
                                                                        <label>الوحدة</label>
                                                                        <select name="marker_unit" class="form-control">
                                                                            <option value="">اختار الوحدة</option>
                                                                            <option value="كيلوجرام">كيلوجرام</option>
                                                                            <option value="متر">متر</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>تاريخ التسليم</label>
                                                                    <input type="date" name="delivery_date"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">إغلاق</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">حفظ</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif

                                        @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 11)
                                            <!-- زر إضافة تيكنيكال -->
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#addTechnicalSheetModal{{ $sample->id }}"
                                                data-action="addTechnical">إضافة تيكنيكال شيت</button>

                                            <!-- Modal إضافة تيكنيكال شيت -->
                                            <div class="modal fade" id="addTechnicalSheetModal{{ $sample->id }}"
                                                tabindex="-1"
                                                aria-labelledby="addTechnicalSheetLabel{{ $sample->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form
                                                        action="{{ route('design-sample-products.add-technical-sheet', $sample->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="addTechnicalSheetLabel{{ $sample->id }}">إضافة
                                                                    تيكنيكال شيت</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="إغلاق"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label>ملف التيكنيكال شيت</label>
                                                                    <input type="file" name="marker_file"
                                                                        class="form-control" accept=".pdf,.zip,.rar"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">إغلاق</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">حفظ</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif


                                        <!-- زر مراجعة -->
                                        <button type="button" class="btn btn-outline-success btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#reviewModal{{ $sample->id }}">
                                            مراجعة
                                        </button>

                                        <!-- Modal مراجعة -->
                                        <div class="modal fade" id="reviewModal{{ $sample->id }}" tabindex="-1"
                                            aria-labelledby="reviewModalLabel{{ $sample->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('design-sample-products.review', $sample->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="reviewModalLabel{{ $sample->id }}">تأكيد المراجعة
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="إغلاق"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label class="mb-2 d-block">حدد الحالة:</label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="status" value="تم المراجعه"
                                                                        id="status1-{{ $sample->id }}" checked>
                                                                    <label class="form-check-label"
                                                                        for="status1-{{ $sample->id }}">تم
                                                                        المراجعه</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="status" value="تأجيل"
                                                                        id="status2-{{ $sample->id }}">
                                                                    <label class="form-check-label"
                                                                        for="status2-{{ $sample->id }}">تأجيل</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="status" value="الغاء"
                                                                        id="status3-{{ $sample->id }}">
                                                                    <label class="form-check-label"
                                                                        for="status3-{{ $sample->id }}">الغاء</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="status" value="تعديل"
                                                                        id="status4-{{ $sample->id }}">
                                                                    <label class="form-check-label"
                                                                        for="status4-{{ $sample->id }}">تعديل</label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label
                                                                    for="comment_content_{{ $sample->id }}">ملاحظات/تعليق:</label>
                                                                <input type="text" class="form-control"
                                                                    id="comment_content_{{ $sample->id }}"
                                                                    name="content" placeholder="اكتب تعليقك">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="comment_image_{{ $sample->id }}">ارفق صورة
                                                                    (اختياري)
                                                                    :</label>
                                                                <input type="file" class="form-control"
                                                                    id="comment_image_{{ $sample->id }}" name="image"
                                                                    accept="image/*">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">إغلاق</button>
                                                            <button type="submit" class="btn btn-success">تأكيد</button>
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


        // TomSelect لكل الباترنيست دروب داون
        document.querySelectorAll('.patternest-select').forEach(function(select) {
            new TomSelect(select, {
                placeholder: "اختر الباترنيست"
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('tr').forEach(function(row) {
                const status = row.querySelector('td:nth-child(6) .badge')?.innerText.trim();

                const allowedActions = {
                    'جديد': ['addMaterials'],
                    'تم إضافة الخامات': ['addTechnical'],
                    'تم إضافة التيكنيكال': ['assignPatternest'],
                    'تم التوزيع': ['addMarker'],
                    'قيد المراجعة': [],
                    'تم المراجعة': [],
                    'تأجيل': [],
                    'الغاء': [],
                    'تعديل': [],
                };

                const statusMap = {
                    'جديد': 'يجب إضافة الخامات أولًا',
                    'تم إضافة الخامات': 'يجب إضافة التيكنيكال شيت أولًا',
                    'تم إضافة التيكنيكال': 'يجب تعيين باترنيست أولًا',
                    'تم التوزيع': 'يجب إضافة بيانات الماركر أولًا',
                };

                const currentAllowed = allowedActions[status] || [];

                row.querySelectorAll('[data-action]').forEach(function(btn) {
                    const action = btn.getAttribute('data-action');

                    if (!currentAllowed.includes(action)) {
                        btn.addEventListener('click', function(e) {
                            e.preventDefault();
                            const msg = statusMap[status];
                            if (msg) alert(msg);
                        });
                    }
                });
            });
        });
    </script>
@endsection
