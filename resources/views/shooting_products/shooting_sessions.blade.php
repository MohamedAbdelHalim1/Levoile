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
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-4">{{ __('messages.shooting_sessions') }} </h4>

                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('ways-of-shooting.index') }}" class="btn btn-primary">
                        <i class="fa fa-list"></i> {{ __('messages.way_of_shooting') }}
                    </a>
                </div>

                <div class="table-responsive">
                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>{{ __('messages.reference') }} </th>
                                <th>{{ __('messages.number_of_colors') }} </th>
                                <th>{{ __('messages.status') }}</th>
                                <th>{{ __('messages.type_of_shooting') }} </th>
                                <th>{{ __('messages.location') }} </th>
                                <th>{{ __('messages.photographer') }}</th>
                                <th>{{ __('messages.date_of_shooting') }} </th>
                                <th>{{ __('messages.date_of_delivery') }} </th>
                                <th>{{ __('messages.remaining_time') }} </th>
                                <th>{{ __('messages.drive_link') }}</th>
                                <th>{{ __('messages.way_of_shooting_link') }} </th>
                                <th>{{ __('messages.way_of_shooting') }} </th>
                                <th>{{ __('messages.notes') }}</th>
                                <th>{{ __('messages.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sessions as $index => $session)
                                @php
                                    $colors = \App\Models\ShootingSession::where('reference', $session->reference)
                                        ->with('color.shootingProduct')
                                        ->get();
                                    $ways = \App\Models\ShootingSessionWay::where('reference', $session->reference)
                                        ->with('way')
                                        ->get();
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><span class="badge bg-dark">{{ $session->reference }}</span></td>
                                    <td>
                                        @php
                                            $rows = \App\Models\ShootingSession::where('reference', $session->reference)
                                                ->with('color.shootingProduct:id,name')
                                                ->get();

                                            $byProduct = $rows
                                                ->filter(fn($s) => optional($s->color)->shootingProduct)
                                                ->groupBy(fn($s) => $s->color->shootingProduct->id)
                                                ->map(function ($group) use (
                                                    $session,
                                                    $linksByRefProd,
                                                    $editorsByRefProd,
                                                ) {
                                                    $product = $group->first()->color->shootingProduct;
                                                    $prodId = $product->id;
                                                    $ref = $session->reference;

                                                    // عدد أكواد الألوان المميزة داخل نفس السيشن لنفس المنتج
                                                    $distinctColorCodes = $group
                                                        ->pluck('color.color_code')
                                                        ->filter()
                                                        ->unique()
                                                        ->count();
                                                    $colorCount =
                                                        $distinctColorCodes > 0 ? $distinctColorCodes : $group->count();

                                                    // لينك (reference, product_id)
                                                    $key = $ref . '|' . $prodId;
                                                    $linkRec = optional($linksByRefProd->get($key))[0] ?? null;
                                                    $drive = $linkRec->drive_link ?? null;

                                                    // ✅ المحرر الخاص بهذا (reference, product_id)
                                                    $editorRec = optional($editorsByRefProd->get($key))[0] ?? null;
                                                    $editor = optional(optional($editorRec)->user)->name;
                                                    $recvDate = optional($editorRec)->receiving_date
                                                        ? \Carbon\Carbon::parse($editorRec->receiving_date)->format(
                                                            'Y-m-d',
                                                        )
                                                        : null;
                                                    $edStatus = $editorRec->status ?? null;

                                                    return [
                                                        'id' => $prodId,
                                                        'name' => $product->name,
                                                        'count' => $colorCount,
                                                        'editor' => $editor,
                                                        'recvDate' => $recvDate,
                                                        'edStatus' => $edStatus,
                                                        'drive' => $drive,
                                                    ];
                                                })
                                                ->values();
                                        @endphp


                                        @if ($byProduct->isEmpty())
                                            <span class="badge bg-secondary">0</span>
                                        @else
                                            <div class="table-responsive">
                                                <table class="table table-sm table-bordered mb-0 align-middle">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>{{ __('messages.product') }}</th>
                                                            <th class="text-center">{{ __('messages.number_of_colors') }}
                                                            </th>
                                                            <th>{{ __('messages.editor') }}</th>
                                                            <th class="text-center">{{ __('messages.edit_link') }}</th>
                                                            <th class="text-center">{{ __('messages.delete') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($byProduct as $row)
                                                            <tr>
                                                                <td class="text-nowrap">{{ $row['name'] }}</td>
                                                                <td class="text-center">
                                                                    <span
                                                                        class="badge bg-primary">{{ $row['count'] }}</span>
                                                                </td>
                                                                <td class="text-nowrap">
                                                                    @if ($row['editor'])
                                                                        <span
                                                                            class="badge bg-info">{{ $row['editor'] }}</span>
                                                                        @if ($row['recvDate'])
                                                                            <span
                                                                                class="badge bg-secondary">{{ $row['recvDate'] }}</span>
                                                                        @endif
                                                                    @else
                                                                        <span class="text-muted">-</span>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center">
                                                                    @if (!empty($row['drive']))
                                                                        {{-- اعرض القيمة كما هي بدون helpers عشان ما يتحطش الدومين قبلها --}}
                                                                        <a href="{{ $row['drive'] }}" target="_blank"
                                                                            class="btn btn-success btn-sm">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    @if (empty($row['drive']))
                                                                        <form method="POST"
                                                                            action="{{ route('shooting-sessions.delete-product-from-session') }}"
                                                                            onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج من الجلسة؟');">
                                                                            @csrf
                                                                            <input type="hidden" name="reference"
                                                                                value="{{ $session->reference }}">
                                                                            <input type="hidden" name="product_id"
                                                                                value="{{ $row['id'] }}">
                                                                            <button class="btn btn-danger btn-sm">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    </td>


                                    @php
                                        $groupedSessions = \App\Models\ShootingSession::where(
                                            'reference',
                                            $session->reference,
                                        )->get();
                                        $allCompleted = $groupedSessions->every(fn($s) => $s->status === 'completed');
                                    @endphp

                                    <td>
                                        @if ($allCompleted)
                                            <span class="badge bg-success">{{ __('messages.complete') }}</span>
                                        @else
                                            <span class="badge bg-warning">{{ __('messages.in_progress') }} </span>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $colors->first()->color->type_of_shooting ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $colors->first()->color->location ?? '-' }}
                                    </td>

                                    {{-- المصور --}}
                                    <td>
                                        @php
                                            $firstColor = $colors->first()?->color;
                                            $photographers = json_decode($firstColor?->photographer, true);
                                        @endphp

                                        @if (is_array($photographers) && count($photographers))
                                            <ul class="list-unstyled mb-0">
                                                @foreach ($photographers as $id)
                                                    <li>{{ optional(\App\Models\User::find($id))->name }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>




                                    <td>
                                        {{ $colors->first()->color->date_of_shooting ?? '-' }}
                                    </td>

                                    @php
                                        $firstLink = $groupedSessions->firstWhere('drive_link', '!=', null)
                                            ?->drive_link;
                                    @endphp

                                    <td>
                                        @if ($firstLink)
                                            <span class="badge bg-success">
                                                {{ \Carbon\Carbon::parse($groupedSessions->firstWhere('drive_link', '!=', null)?->updated_at)->format('Y-m-d') }}
                                            </span>
                                        @else
                                            {{ $colors->first()->color->date_of_delivery ?? '-' }}
                                        @endif
                                    </td>



                                    {{-- الوقت المتبقي --}}
                                    <td>
                                        @if ($allCompleted)
                                            <span>-</span>
                                        @else
                                            @php
                                                $deliveryDate = $colors->first()?->color->date_of_delivery;
                                                $remaining = $deliveryDate
                                                    ? now()->diffInDays(\Carbon\Carbon::parse($deliveryDate), false)
                                                    : null;
                                            @endphp

                                            @if (is_null($deliveryDate))
                                                <span>-</span>
                                            @elseif ($remaining > 0)
                                                <span class="badge bg-primary">{{ $remaining }}
                                                    {{ __('messages.day_remaining') }}</span>
                                            @elseif ($remaining == 0)
                                                <span class="badge bg-warning">{{ __('messages.today') }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ __('messages.day_overdue') }}
                                                    {{ abs($remaining) }}</span>
                                            @endif
                                        @endif
                                    </td>

                                    <td>
                                        @if ($firstLink)
                                            <a href="{{ $firstLink }}" class="btn btn-success btn-sm">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        @php
                                            $shootingMethod = $colors->first()?->color?->shooting_method ?? null;
                                        @endphp

                                        @if (!empty($shootingMethod))
                                            <a href="{{ $shootingMethod }}" class="btn btn-outline-primary btn-sm"
                                                target="_blank">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>


                                    <td>
                                        @if ($ways->count())
                                            @foreach ($ways as $way)
                                                <span class="badge bg-info me-1">{{ $way->way->name }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>

                                    <td>{{ $groupedSessions->first()?->note ?? '-' }}</td>


                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#moveToEditModal" data-reference="{{ $session->reference }}">
                                            {{ __('messages.move_to_editor') }}
                                        </button>
                                        {{-- زرار Edit --}}
                                        @php
                                            $first = $colors->first()?->color;
                                            $photographers =
                                                $first && $first->photographer
                                                    ? json_decode($first->photographer, true)
                                                    : [];
                                        @endphp
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#quickEditModal" data-reference="{{ $session->reference }}"
                                            data-type="{{ $first?->type_of_shooting }}"
                                            data-location="{{ $first?->location }}"
                                            data-dateshoot="{{ $first?->date_of_shooting }}"
                                            data-datedelivery="{{ $first?->date_of_delivery }}"
                                            data-photographers='@json($photographers)'>
                                            {{ __('messages.edit') }}
                                        </button>
                                        <a href="{{ route('shooting-sessions.show', $session->reference) }}"
                                            class="btn btn-info btn-sm">
                                            {{ __('messages.view') }}
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
    <!-- Modal: نقل إلى جاهز للتعديل -->
    <div class="modal fade" id="moveToEditModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('shooting-sessions.move-to-edit') }}" class="modal-content">
                @csrf
                <input type="hidden" name="reference" id="moveEditReference">
                <div class="modal-header">
                    <h5 class="modal-title">بدء التعديل</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    هل تريد نقل هذه الجلسة إلى قائمة "جاهز للتعديل"؟
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">نعم، انقل</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">إلغاء</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Quick Edit Modal --}}
    <div class="modal fade" id="quickEditModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('shooting-sessions.quick-update') }}" class="modal-content">
                @csrf
                <input type="hidden" name="reference" id="qe_reference">

                <div class="modal-header">
                    <h5 class="modal-title">{{ __('messages.edit') }} ({{ __('messages.shooting_sessions') }})</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label">{{ __('messages.type_of_shooting') }}</label>
                        <input type="text" class="form-control" name="type_of_shooting" id="qe_type">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">{{ __('messages.location') }}</label>
                        <input type="text" class="form-control" name="location" id="qe_location">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">{{ __('messages.photographer') }}</label>
                        <select name="photographer[]" id="qe_photographers" class="form-select" multiple>
                            @foreach (\App\Models\User::whereHas('role', fn($q) => $q->where('name', 'photographer'))->orderBy('name')->get() as $u)
                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">{{ __('messages.date_of_shooting') }}</label>
                        <input type="date" class="form-control" name="date_of_shooting" id="qe_dateshoot">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">{{ __('messages.date_of_delivery') }}</label>
                        <input type="date" class="form-control" name="date_of_delivery" id="qe_datedelivery">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">{{ __('messages.save') }}</button>
                    <button type="button" class="btn btn-light"
                        data-bs-dismiss="modal">{{ __('messages.cancel') }}</button>
                </div>
            </form>
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
        $(".open-drive-link-modal").on("click", function() {
            let reference = $(this).data("reference");
            let driveLink = $(this).data("drive-link") || '';

            // وقت التسليم من الـ row
            let $row = $(this).closest("tr");
            let timeLeftText = $row.find("td:nth-child(11)").text(); // عمود الوقت المتبقي

            let isLate = timeLeftText.includes("{{ __('messages.day_overdue') }}");

            $("#drive_session_reference").val(reference);
            $("#drive_link_input").val(driveLink);

            if (isLate) {
                $("#noteWrapper").removeClass("d-none");
                $("#noteInput").attr("required", true);
            } else {
                $("#noteWrapper").addClass("d-none");
                $("#noteInput").removeAttr("required").val('');
            }

            $("#driveLinkModal").modal("show");
        });



        $("#driveLinkForm").on("submit", function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('shooting-sessions.updateDriveLink') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    alert(response.message);
                    $("#driveLinkModal").modal("hide");
                    location.reload();
                },
                error: function(xhr) {
                    alert("{{ __('messages.something_went_wrong') }}");
                }
            });
        });
    </script>
    <script>
        document.getElementById('assignEditorModal')
            .addEventListener('show.bs.modal', function(e) {
                const btn = e.relatedTarget;
                document.getElementById('editorModalReference').value = btn.getAttribute('data-reference');
            });
    </script>
    <script>
        document.getElementById('moveToEditModal')
            .addEventListener('show.bs.modal', function(e) {
                const ref = e.relatedTarget.getAttribute('data-reference');
                document.getElementById('moveEditReference').value = ref;
            });
    </script>

    <script>
        document.getElementById('quickEditModal')
            .addEventListener('show.bs.modal', function(e) {
                const btn = e.relatedTarget;
                const ref = btn.getAttribute('data-reference');
                const type = btn.getAttribute('data-type') || '';
                const loc = btn.getAttribute('data-location') || '';
                const ds = btn.getAttribute('data-dateshoot') || '';
                const dd = btn.getAttribute('data-datedelivery') || '';
                const phs = JSON.parse(btn.getAttribute('data-photographers') || '[]');

                document.getElementById('qe_reference').value = ref;
                document.getElementById('qe_type').value = type;
                document.getElementById('qe_location').value = loc;
                document.getElementById('qe_dateshoot').value = ds || '';
                document.getElementById('qe_datedelivery').value = dd || '';

                // اختيارات المصورين (لو بتستعمل Select2 هيظبطها برضه)
                const sel = document.getElementById('qe_photographers');
                Array.from(sel.options).forEach(o => o.selected = phs.includes(parseInt(o.value)));
                // لو عندك Select2:
                if ($(sel).data('select2')) {
                    $(sel).trigger('change');
                }
            });
    </script>
@endsection
