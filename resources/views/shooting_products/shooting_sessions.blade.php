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
                <h4 class="mb-4">جلسات التصوير</h4>

                <div class="table-responsive">
                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>جلسة التصوير</th>
                                <th>عدد الألوان</th>
                                <th>الحالة</th>
                                <th>نوع التصوير</th>
                                <th>مكان التصوير</th>
                                <th>المصور</th>
                                <th>المحرر</th>
                                <th>تاريخ التصوير</th>
                                <th>تاريخ التسليم</th>
                                <th>الوقت المتبقي</th>
                                <th>الدرايف</th>
                                <th>التحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sessions as $index => $session)
                                @php
                                    $colors = \App\Models\ShootingSession::where('reference', $session->reference)
                                        ->with('color.shootingProduct')
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
                                            <span class="badge bg-success">مكتمل</span>
                                        @else
                                            <span class="badge bg-warning">جديد</span>
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

                                    <td>
                                        {{ $colors->first()->color->date_of_editing ?? '-' }}
                                    </td>

                                    {{-- الوقت المتبقي --}}
                                    <td>
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
                                                <span class="badge bg-primary">{{ $remaining }} يوم متبقي</span>
                                            @elseif ($remaining == 0)
                                                <span class="badge bg-warning">ينتهي اليوم</span>
                                            @else
                                                <span class="badge bg-danger">متأخر بـ {{ abs($remaining) }} يوم</span>
                                            @endif
                                        @endif
                                    </td>




                                    @php
                                        $firstLink = $groupedSessions->firstWhere('drive_link', '!=', null)
                                            ?->drive_link;
                                    @endphp

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
                                        <button class="btn btn-success btn-sm open-drive-link-modal"
                                            data-reference="{{ $session->reference }}"
                                            data-drive-link="{{ $firstLink }}">
                                            إضافة لينك درايف
                                        </button>
                                        <a href="{{ route('shooting-sessions.show', $session->reference) }}"
                                            class="btn btn-info btn-sm">
                                            عرض المزيد
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
                    <h5 class="modal-title">إضافة لينك درايف</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="driveLinkForm">
                        @csrf
                        <input type="hidden" name="reference" id="drive_session_reference">

                        <div class="mb-3">
                            <label class="form-label">لينك درايف</label>
                            <input type="url" name="drive_link" id="drive_link_input" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">حفظ</button>
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

            $("#drive_session_reference").val(reference);
            $("#drive_link_input").val(driveLink);
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
                    alert("حدث خطأ أثناء حفظ لينك درايف");
                }
            });
        });
    </script>
@endsection
