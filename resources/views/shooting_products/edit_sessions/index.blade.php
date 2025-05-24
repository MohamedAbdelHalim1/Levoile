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

                <h3>جلسات التعديل</h3>
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>لينك الجلسة</th>
                            <th>لينك التصوير</th>
                            <th>لينك التعديل</th>
                            <th>المحرر</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sessions as $session)
                            <tr>
                                <td>
                                    <a href="{{ route('shooting-sessions.show', $session->reference) }}"
                                        class="btn btn-sm btn-info">
                                        {{ $session->reference }}
                                    </a>
                                </td>
                                <td>
                                    @if ($session->photo_drive_link)
                                        <a href="{{ $session->photo_drive_link }}" target="_blank">فتح</a>
                                    @else
                                        <span class="text-muted">لا يوجد</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($session->drive_link)
                                        <a href="{{ $session->drive_link }}" target="_blank">فتح</a>
                                    @else
                                        <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                            data-bs-target="#uploadDriveModal" data-reference="{{ $session->reference }}">
                                            رفع لينك
                                        </button>
                                    @endif
                                </td>
                                <td>
                                    @if ($session->user_id)
                                        <span class="d-flex align-items-center justify-content-between">
                                            {{ \App\Models\User::find($session->user_id)?->name ?? '---' }}
                                            <button class="btn btn-sm" style="padding: 0 4px;" title="تعديل"
                                                data-bs-toggle="modal" data-bs-target="#assignEditorModal"
                                                data-reference="{{ $session->reference }}">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </span>
                                    @else
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#assignEditorModal" data-reference="{{ $session->reference }}">
                                            تعيين محرر
                                        </button>
                                    @endif
                                </td>

                                <td>
                                    <span class="badge bg-{{ $session->status === 'تم التعديل' ? 'success' : 'warning' }}">
                                        {{ $session->status }}
                                    </span>
                                </td>
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
                    <h5 class="modal-title">رفع لينك درايف</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="url" name="drive_link" class="form-control" placeholder="ضع رابط Google Drive"
                        required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">حفظ</button>
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
                    <h5 class="modal-title">تعيين محرر</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <select name="user_id" class="form-select" required>
                        <option value="">اختر المستخدم</option>
                        @foreach (\App\Models\User::all() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">تأكيد</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const driveModal = document.getElementById('uploadDriveModal');
        driveModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            document.getElementById('driveModalReference').value = button.getAttribute('data-reference');
        });

        const editorModal = document.getElementById('assignEditorModal');
        editorModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            document.getElementById('editorModalReference').value = button.getAttribute('data-reference');
        });
    </script>
@endsection
