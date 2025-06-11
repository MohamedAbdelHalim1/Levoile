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
                                <th>{{ __('messages.editors') }}</th>
                                <th>{{ __('messages.date_of_shooting') }} </th>
                                <th>{{ __('messages.date_of_delivery') }} </th>
                                <th>{{ __('messages.remaining_time') }} </th>
                                <th>{{ __('messages.drive_link') }}</th>
                                <th>{{ __('messages.way_of_shooting_link') }}  </th>
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
                                    <td><span class="badge bg-primary">{{ $colors->count() }}</span></td>
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

                                    {{-- المحرر --}}
                                    <td>
                                        @php
                                            $editors = json_decode($firstColor?->editor, true);
                                        @endphp

                                        @if (is_array($editors) && count($editors))
                                            <ul class="list-unstyled mb-0">
                                                @foreach ($editors as $id)
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
                                        @if ($firstLink)
                                            <span>-</span>
                                        @else
                                            @php
                                                $deliveryDate = $colors->first()?->color->date_of_delivery;
                                                $remaining = $deliveryDate
                                                    ? \Carbon\Carbon::now()->diffInDays(
                                                        \Carbon\Carbon::parse($deliveryDate),
                                                        false,
                                                    )
                                                    : null;
                                            @endphp

                                            @if (is_null($deliveryDate))
                                                <span>-</span>
                                            @else
                                                @if ($remaining > 0)
                                                    <span class="badge bg-primary">{{ $remaining }} {{ __('messages.day_remaining') }}</span>
                                                @elseif ($remaining == 0)
                                                    <span class="badge bg-warning">{{ __('messages.today') }} </span>
                                                @else
                                                    <span class="badge bg-danger"> {{ __('messages.day_overdue') }} {{ abs($remaining) }} </span>
                                                @endif
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
                                        <button class="btn btn-success btn-sm open-drive-link-modal"
                                            data-reference="{{ $session->reference }}"
                                            data-drive-link="{{ $firstLink }}">
                                            {{ __('messages.add_drive_link') }}
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
    <!-- Drive Link Modal -->
    <div class="modal fade" id="driveLinkModal" tabindex="-1" aria-labelledby="driveLinkModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('messages.add_drive_link') }}  </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="driveLinkForm">
                        @csrf
                        <input type="hidden" name="reference" id="drive_session_reference">

                        <div class="mb-3">
                            <label class="form-label">{{ __('messages.drive_link') }}</label>
                            <input type="url" name="drive_link" id="drive_link_input" class="form-control" required>
                        </div>
                        <div class="mb-3 d-none" id="noteWrapper">
                            <label class="form-label">{{ __('messages.notes') }} </label>
                            <textarea name="note" id="noteInput" class="form-control" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                    </form>
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
@endsection
