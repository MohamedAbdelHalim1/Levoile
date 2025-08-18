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

                <h1>{{ __('messages.design_sample_products') }}</h1>
                <div class="mb-3 table-responsive">
                    @if (auth()->user()->hasPermission('إضافة منتج'))
                        <div class="flex justify-end mb-4">
                            <a href="{{ route('design-sample-products.create') }}" class="btn btn-success">
                                {{ __('messages.create_sample_product') }}
                            </a>
                        </div>
                    @endif
                    <form method="GET" action="{{ route('design-sample-products.index') }}" class="mb-4">
                        <div class="row g-3 align-items-end">

                            <div class="col-md-3">
                                <label for="season_id" class="form-label">{{ __('messages.season') }}</label>
                                <select name="season_id" id="season_id" class="form-control">
                                    <option value="">{{ __('messages.all') }}</option>
                                    @foreach ($seasons as $season)
                                        <option value="{{ $season->id }}"
                                            {{ ($filters['season_id'] ?? '') == $season->id ? 'selected' : '' }}>
                                            {{ $season->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="category_id" class="form-label">{{ __('messages.category') }}</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">{{ __('messages.all') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ ($filters['category_id'] ?? '') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="status" class="form-label">{{ __('messages.status') }}</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">{{ __('messages.all') }}</option>
                                    @foreach (['جديد', 'تم التوزيع', 'قيد المراجعه', 'تم المراجعه', 'تأجيل', 'الغاء', 'تعديل', 'تم اضافة الخامات', 'تم اضافة التيكنيكال'] as $status)
                                        <option value="{{ $status }}"
                                            {{ ($filters['status'] ?? '') == $status ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i> {{ __('messages.search') }}
                                </button>
                                <a href="{{ route('design-sample-products.index') }}" class="btn btn-secondary">
                                    <i class="fa fa-times"></i> {{ __('messages.reset') }}
                                </a>
                            </div>
                        </div>
                    </form>

                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>{{ __('messages.name') }}</th>
                                <th>{{ __('messages.category') }}</th>
                                <th>{{ __('messages.season') }}</th>
                                <th>{{ __('messages.materials') }}</th>
                                <th>{{ __('messages.status') }}</th>
                                <th>{{ __('messages.image') }}</th>
                                <th>{{ __('messages.marker_number') }}</th>
                                <th>{{ __('messages.marker_image') }}</th>
                                <th>{{ __('messages.consumption') }}</th>
                                <th>{{ __('messages.unit') }}</th>
                                <th>{{ __('messages.technical_file') }}</th>
                                <th>{{ __('messages.operations') }}</th>
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
                                                            id="materialsModalLabel{{ $sample->id }}">
                                                            {{ __('messages.materials_of_product') }}</h5>
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
                                                                    <li class="text-danger">
                                                                        {{ __('messages.unknown_or_deleted_materials') }}
                                                                    </li>
                                                                @endif
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($sample->status === 'جديد')
                                            <span class="badge bg-success">{{ __('messages.new') }}</span>
                                        @elseif($sample->status === 'تم التوزيع')
                                            <span class="badge bg-primary">{{ __('messages.distributed') }}</span>
                                        @elseif($sample->status === 'قيد المراجعه')
                                            <span class="badge bg-warning text-dark">{{ __('messages.reviewing') }}</span>
                                        @elseif($sample->status === 'تم المراجعه')
                                            <span class="badge bg-info text-dark">{{ __('messages.reviewed') }} </span>
                                        @elseif($sample->status === 'تأجيل')
                                            <span
                                                class="badge bg-secondary text-dark">{{ __('messages.postponed') }}</span>
                                        @elseif($sample->status === 'الغاء')
                                            <span class="badge bg-danger">{{ __('messages.cancel') }}</span>
                                        @elseif($sample->status === 'تعديل')
                                            <span class="badge bg-warning text-dark">{{ __('messages.edit') }}</span>
                                        @elseif($sample->status === 'تم اضافة الخامات')
                                            <span class="badge bg-secondary">{{ __('messages.added_materials') }}</span>
                                        @elseif($sample->status === 'تم اضافة التيكنيكال')
                                            <span
                                                class="badge bg-dark text-white">{{ __('messages.added_technical_file') }}
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">{{ __($sample->status) }}</span>
                                        @endif
                                    </td>


                                    <td>
                                        @if ($sample->image)
                                            <img src="{{ asset($sample->image) }}" alt="{{ __('messages.image') }}"
                                                width="50">
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
                                                <img src="{{ asset($sample->marker_image) }}"
                                                    alt="{{ __('messages.marker_image') }}" width="40" height="40"
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
                                            class="btn btn-info btn-sm">{{ __('messages.view') }}</a>
                                        <a href="{{ route('design-sample-products.edit', $sample->id) }}"
                                            class="btn btn-warning btn-sm">{{ __('messages.edit') }}</a>
                                        <form action="{{ route('design-sample-products.destroy', $sample->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('{{ __('messages.are_you_sure') }}')">{{ __('messages.delete') }}</button>
                                        </form>
                                        <!-- زر إضافة خامات -->
                                        <button type="button" class="btn btn-dark btn-sm"
                                            data-bs-target="#addMaterialsModal{{ $sample->id }}"
                                            data-action="addMaterials" data-status="{{ $sample->status }}">
                                            {{ __('messages.add_materials') }}
                                        </button>
                                        @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 11)
                                            <!-- زر إضافة تيكنيكال شيت -->
                                            <button type="button" class="btn btn-info btn-sm"
                                                data-bs-target="#addTechnicalSheetModal{{ $sample->id }}"
                                                data-action="addTechnical" data-status="{{ $sample->status }}">
                                                {{ __('messages.add_technical_file') }}
                                            </button>
                                        @endif

                                        <!-- زر تعيين باترنيست -->
                                        <button type="button" class="btn btn-primary btn-sm"
                                            data-bs-target="#assignPatternestModal{{ $sample->id }}"
                                            data-action="assignPatternest" data-status="{{ $sample->status }}">
                                            {{ __('messages.assign_patternest') }}
                                        </button>
                                        @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 11)
                                            <!-- زر إضافة ماركر -->
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-bs-target="#addMarkerModal{{ $sample->id }}"
                                                data-action="addMarker" data-status="{{ $sample->status }}">
                                                {{ __('messages.add_marker') }}
                                            </button>
                                        @endif
                                        <!-- زر مراجعة -->
                                        <button type="button" class="btn btn-outline-success btn-sm"
                                            data-bs-target="#reviewModal{{ $sample->id }}" data-action="review"
                                            data-status="{{ $sample->status }}">
                                            {{ __('messages.review') }}
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
                                                                id="addMaterialsLabel{{ $sample->id }}">
                                                                {{ __('messages.add_materials') }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>{{ __('messages.materials') }}</label>
                                                            <select class="form-control" name="materials[]"
                                                                id="material_id" multiple required>
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
                                                                data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">{{ __('messages.save') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>


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
                                                                id="assignPatternestLabel{{ $sample->id }}">
                                                                {{ __('messages.assign_patternest') }} </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>{{ __('messages.patternest') }}</label>
                                                            <select class="form-control patternest-select"
                                                                name="patternest_id" required>
                                                                <option value="">
                                                                    {{ __('messages.select_patternest') }}</option>
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
                                                                data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">{{ __('messages.save') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>


                                        <!-- Modal إضافة ماركر -->
                                        <div class="modal fade" id="addMarkerModal{{ $sample->id }}" tabindex="-1"
                                            aria-labelledby="addMarkerModalLabel{{ $sample->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form
                                                    action="{{ route('design-sample-products.add-marker', $sample->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="addMarkerModalLabel{{ $sample->id }}">
                                                                {{ __('messages.add_marker') }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"
                                                                aria-label="{{ __('messages.close') }}"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label>{{ __('messages.marker_number') }} </label>
                                                                <input type="text" name="marker_number"
                                                                    class="form-control" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>{{ __('messages.marker_image') }}</label>
                                                                <input type="file" name="marker_image"
                                                                    class="form-control" accept="image/*" required>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-9 mb-3">
                                                                    <label>{{ __('messages.consumption') }}</label>
                                                                    <input type="text" name="marker_consumption"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="col-3 mb-3">
                                                                    <label>{{ __('messages.unit') }}</label>
                                                                    <select name="marker_unit" class="form-control">
                                                                        <option value="">
                                                                            {{ __('messages.select_unit') }}</option>
                                                                        <option value="كيلوجرام">{{ __('messages.kg') }}
                                                                        </option>
                                                                        <option value="متر">{{ __('messages.meter') }}
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>{{ __('messages.delivery_date') }}</label>
                                                                <input type="date" name="delivery_date"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">{{ __('messages.save') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Modal إضافة تيكنيكال شيت -->
                                        <div class="modal fade" id="addTechnicalSheetModal{{ $sample->id }}"
                                            tabindex="-1" aria-labelledby="addTechnicalSheetLabel{{ $sample->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form
                                                    action="{{ route('design-sample-products.add-technical-sheet', $sample->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="addTechnicalSheetLabel{{ $sample->id }}">
                                                                {{ __('messages.add_technical_sheet') }} </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"
                                                                aria-label="{{ __('messages.close') }}"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label>{{ __('messages.technical_file') }} </label>
                                                                <input type="file" name="marker_file"
                                                                    class="form-control" accept=".pdf,.zip,.rar" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">{{ __('messages.save') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

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
                                                                id="reviewModalLabel{{ $sample->id }}">
                                                                {{ __('messages.review') }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"
                                                                aria-label="{{ __('messages.close') }}"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="mb-2 d-block">{{ __('messages.status') }}:</label>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="status"
                                                                        value="{{ __('messages.reviewed') }} "
                                                                        id="status1-{{ $sample->id }}" checked>
                                                                    <label class="form-check-label"
                                                                        for="status1-{{ $sample->id }}">
                                                                        {{ __('messages.reviewed') }}</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="status"
                                                                        value="{{ __('messages.postponed') }}"
                                                                        id="status2-{{ $sample->id }}">
                                                                    <label class="form-check-label"
                                                                        for="status2-{{ $sample->id }}">{{ __('messages.postponed') }}</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="status"
                                                                        value="{{ __('messages.cancel') }}"
                                                                        id="status3-{{ $sample->id }}">
                                                                    <label class="form-check-label"
                                                                        for="status3-{{ $sample->id }}">{{ __('messages.cancel') }}</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="status" value="{{ __('messages.edit') }}"
                                                                        id="status4-{{ $sample->id }}">
                                                                    <label class="form-check-label"
                                                                        for="status4-{{ $sample->id }}">{{ __('messages.edit') }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label
                                                                    for="comment_content_{{ $sample->id }}">{{ __('messages.comment') }}:</label>
                                                                <input type="text" class="form-control"
                                                                    id="comment_content_{{ $sample->id }}"
                                                                    name="content"
                                                                    placeholder="{{ __('messages.add_comment') }} ">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="comment_image_{{ $sample->id }}">
                                                                    {{ __('messages.image') }}
                                                                    ({{ __('messages.optional') }})
                                                                    :</label>
                                                                <input type="file" class="form-control"
                                                                    id="comment_image_{{ $sample->id }}"
                                                                    name="image" accept="image/*">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-success">{{ __('messages.save') }}</button>
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
                placeholder: "{{ __('messages.choose_material') }}"
            });
        });


        // TomSelect لكل الباترنيست دروب داون
        document.querySelectorAll('.patternest-select').forEach(function(select) {
            new TomSelect(select, {
                placeholder: "{{ __('messages.select_patternest') }}"
            });
        });

        new TomSelect('#season_id');
        new TomSelect('#category_id');
        new TomSelect('#status');
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[data-action]').forEach(function(btn) {
                const action = btn.getAttribute('data-action');
                const targetModal = btn.getAttribute('data-bs-target');
                const status = btn.getAttribute('data-status')?.trim();

                const allowedActionsByStatus = {
                    'جديد': ['addMaterials'],
                    'تم اضافة الخامات': ['addMaterials', 'addTechnical'],
                    'تم اضافة التيكنيكال': ['addMaterials', 'addTechnical', 'assignPatternest'],
                    'تم التوزيع': ['addMaterials', 'addTechnical', 'assignPatternest', 'addMarker'],
                    'قيد المراجعه': ['addMaterials', 'addTechnical', 'assignPatternest', 'addMarker',
                        'review'
                    ],
                    'تم المراجعه': ['addMaterials', 'addTechnical', 'assignPatternest', 'addMarker',
                        'review'
                    ],
                    'تأجيل': ['addMaterials', 'addTechnical', 'assignPatternest', 'addMarker',
                        'review'
                    ],
                    'الغاء': ['addMaterials', 'addTechnical', 'assignPatternest', 'addMarker',
                        'review'
                    ],
                    'تعديل': ['addMaterials', 'addTechnical', 'assignPatternest', 'addMarker',
                        'review'
                    ],
                };

                const messages = {
                    'addTechnical': '{{ __('messages.add_materials_first') }}',
                    'assignPatternest': '{{ __('messages.add_technical_file_first') }}',
                    'addMarker': '{{ __('messages.assign_patternest_first') }}',
                    'review': '{{ __('messages.add_marker_first') }}',
                };

                const currentAllowed = allowedActionsByStatus[status] || [];

                btn.addEventListener('click', function(e) {
                    if (!currentAllowed.includes(action)) {
                        e.preventDefault();
                        const msg = messages[action] || '{{ __('messages.not_allowed') }}';
                        alert(msg);
                    } else {
                        const modal = new bootstrap.Modal(document.querySelector(targetModal));
                        modal.show();
                    }
                });
            });
        });
    </script>
@endsection
