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

                <h3>{{ __('messages.ready_to_edit_sessions') }}</h3>
                <button id="bulkAssignBtn" class="btn btn-warning mb-3 d-none" data-bs-toggle="modal"
                    data-bs-target="#bulkAssignModal">{{ __('messages.bulk_editor_assign') }}</button>

                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>{{ __('messages.reference') }}</th>
                            <th>{{ __('messages.session_link') }}</th>
                            <th>{{ __('messages.edit_link') }}</th>
                            <th>{{ __('messages.editor') }}</th>
                            <th>{{ __('messages.status') }}</th>
                            <th>{{ __('messages.receiving_date') }}</th>
                            <th>{{ __('messages.remaining_time') }} </th>
                            <th>{{ __('messages.notes') }}</th>
                            {{-- <th>المراجعة</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sessions as $session)
                            <tr>
                                <td><input type="checkbox" class="session-checkbox" value="{{ $session->reference }}"></td>

                                <td>
                                    <a href="{{ route('shooting-sessions.show', $session->reference) }}"
                                        class="btn btn-sm btn-info">
                                        {{ $session->reference }}
                                    </a>
                                </td>
                                <td>
                                    @if ($session->photo_drive_link)
                                        <a href="{{ $session->photo_drive_link }}" target="_blank">{{ __('messages.open') }}</a>
                                    @else
                                        <span class="text-muted">{{ __('messages.N/A') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="d-flex align-items-center justify-content-between">
                                        @if ($session->drive_link)
                                            <a href="{{ $session->drive_link }}" target="_blank">{{ __('messages.open') }}</a>
                                            <button class="btn btn-sm" style="padding: 0 4px;" title="{{ __('messages.edit') }}"
                                                data-bs-toggle="modal" data-bs-target="#uploadDriveModal"
                                                data-reference="{{ $session->reference }}"
                                                data-receiving-date="{{ $session->receiving_date }}"
                                                data-has-editor="{{ $session->user_id ? 'true' : 'false' }}">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                data-bs-target="#uploadDriveModal"
                                                data-reference="{{ $session->reference }}"
                                                data-receiving-date="{{ $session->receiving_date }}"
                                                data-has-editor="{{ $session->user_id ? 'true' : 'false' }}">
                                                {{ __('messages.upload') }} 
                                            </button>
                                        @endif
                                    </span>
                                </td>

                                <td>
                                    @if ($session->user_id)
                                        <span class="d-flex align-items-center justify-content-between">
                                            {{ \App\Models\User::find($session->user_id)?->name ?? '---' }}
                                            <button class="btn btn-sm" style="padding: 0 4px;" title="{{ __('messages.edit') }}"
                                                data-bs-toggle="modal" data-bs-target="#assignEditorModal"
                                                data-reference="{{ $session->reference }}">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </span>
                                    @else
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#assignEditorModal" data-reference="{{ $session->reference }}">
                                            {{ __('messages.assign_editor') }} 
                                        </button>
                                    @endif
                                </td>

                                <td>
                                    <span class="badge bg-{{ $session->status === 'تم التعديل' ? 'success' : 'warning' }}">
                                        {{ $session->status }}
                                    </span>
                                </td>
                                <td>
                                    {{ $session->receiving_date ? \Carbon\Carbon::parse($session->receiving_date)->format('Y-m-d') : '-' }}
                                </td>
                                <td>
                                    @if ($session->receiving_date)
                                        @if ($session->status === 'جديد')
                                            @php
                                                $date = \Carbon\Carbon::parse($session->receiving_date);
                                                $diff = now()->diffInDays($date, false); // false: to keep sign
                                            @endphp

                                            @if ($diff > 0)
                                                <span class="text-success">بعد {{ $diff }} يوم</span>
                                            @elseif ($diff === 0)
                                                <span class="text-warning">اليوم</span>
                                            @else
                                                <span class="text-danger">متأخر {{ abs($diff) }} يوم</span>
                                            @endif
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $session->note ?? '-' }}</td>
                               

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal: رفع لينك درايف -->
    <div class="modal fade" id="uploadDriveModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('edit-sessions.upload-drive-link') }}" class="modal-content">
                @csrf
                <input type="hidden" name="reference" id="driveModalReference">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('messages.upload_drive_link') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="url" name="drive_link" class="form-control"
                        required>

                    <div id="noteWrapper" style="display: none;">
                        <label for="note">{{ __('messages.delay_reasons') }} :</label>
                        <textarea name="note" id="noteInput" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ __('messages.upload') }}</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal: تعيين محرر -->
    <div class="modal fade" id="assignEditorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('edit-sessions.assign-editor') }}" class="modal-content">
                @csrf
                <input type="hidden" name="reference" id="editorModalReference">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('messages.assign_editor') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <select name="user_id" class="form-select" required>
                        <option value="">{{ __('messages.assign_editor') }}</option>
                        @foreach (\App\Models\User::where('role_id', 7)->get() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="receiving_date" class="form-label">{{ __('messages.receiving_date') }} </label>
                    <input type="date" name="receiving_date" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal: التعيين الجماعي -->
    <div class="modal fade" id="bulkAssignModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="{{ route('edit-sessions.bulk-assign') }}" class="modal-content">
                @csrf
                <!-- نخليها مصفوفة -->
                <div id="bulkHiddenInputs"></div>
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('messages.bulk_editor_assign') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label>اختر المحرر</label>
                            <select name="user_id" class="form-select" required>
                                <option value="">{{ __('messages.assign_editor') }} </option>
                                @foreach (\App\Models\User::all() as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label>{{ __('messages.unified_expected_delivery_date') }}</label>
                            <input type="date" name="common_date" class="form-control">
                        </div>
                    </div>
                    <div id="individualDates" class="row row-cols-1 row-cols-md-2 g-2">
                        <!-- التاريخ لكل جلسة لو متحددش الموحد -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ __('messages.save') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const driveModal = document.getElementById('uploadDriveModal');
            const driveModalRef = document.getElementById('driveModalReference');
            const noteWrapper = document.getElementById('noteWrapper');
            const noteInput = document.getElementById('noteInput');

            driveModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const reference = button.getAttribute('data-reference');
                const receivingDate = button.getAttribute('data-receiving-date');
                const hasEditor = button.getAttribute('data-has-editor') === 'true'; // هنا هنستخدمها

                    if (!hasEditor) {
                        alert('{{ __('messages.assign_editor_first') }}');
                        event.preventDefault(); // يمنع فتح المودال
                        return;
                    }


                const today = new Date().toISOString().split('T')[0];

                driveModalRef.value = reference;

                if (receivingDate && receivingDate < today) {
                    noteWrapper.style.display = 'block';
                    noteInput.removeAttribute('disabled');
                    noteInput.setAttribute('required', 'required');
                } else {
                    noteWrapper.style.display = 'none';
                    noteInput.removeAttribute('required');
                    noteInput.setAttribute('disabled', 'disabled');
                    noteInput.value = '';
                }
            });

            const editorModal = document.getElementById('assignEditorModal');
            editorModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                document.getElementById('editorModalReference').value = button.getAttribute(
                    'data-reference');
            });
        });
    </script>
    <script>
        const checkboxes = document.querySelectorAll('.session-checkbox');
        const selectAll = document.getElementById('selectAll');
        const bulkAssignBtn = document.getElementById('bulkAssignBtn');
        const bulkReferences = document.getElementById('bulkReferences');
        const individualDates = document.getElementById('individualDates');

        function updateBulkButtonVisibility() {
            const selected = Array.from(checkboxes).filter(cb => cb.checked);
            bulkAssignBtn.classList.toggle('d-none', selected.length === 0);
        }

        checkboxes.forEach(cb => cb.addEventListener('change', updateBulkButtonVisibility));

        selectAll.addEventListener('change', function() {
            checkboxes.forEach(cb => cb.checked = this.checked);
            updateBulkButtonVisibility();
        });

        document.getElementById('bulkAssignModal').addEventListener('show.bs.modal', function() {
            const selected = Array.from(checkboxes).filter(cb => cb.checked);
            const refs = selected.map(cb => cb.value);

            // 1. ضيف الهيدن inputs بدلاً من string
            const hiddenInputsContainer = document.getElementById('bulkHiddenInputs');
            hiddenInputsContainer.innerHTML = refs.map(ref => `
        <input type="hidden" name="references[]" value="${ref}">
            `).join('');

            // 2. ضيف الانبوتات الخاصة بالتواريخ
            individualDates.innerHTML = refs.map(ref => `
                <div class="col">
                    <label>{{ __('messages.expected_delivery_date') }} : ${ref}</label>
                    <input type="date" name="dates[${ref}]" class="form-control">
                </div>
            `).join('');
        });
    </script>
@endsection
