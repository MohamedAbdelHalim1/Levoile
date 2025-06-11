@extends('layouts.app')

@section('content')
    <div class="p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">{{ __('messages.way_of_shooting') }}</h4>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addWayModal">
                <i class="fa fa-plus"></i> {{ __('messages.add_shooting_way') }}
            </button>
        </div>

        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>{{ __('messages.way_of_shooting') }}</th>
                            <th>{{ __('messages.created_at') }}</th>
                            <th>{{ __('messages.operations') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ways as $index => $way)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $way->name }}</td>
                                <td>{{ $way->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning edit-btn" data-id="{{ $way->id }}"
                                        data-name="{{ $way->name }}" data-bs-toggle="modal"
                                        data-bs-target="#editWayModal">
                                        {{ __('messages.edit') }}
                                    </button>

                                    <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $way->id }}"
                                        data-name="{{ $way->name }}" data-bs-toggle="modal"
                                        data-bs-target="#deleteWayModal">
                                        {{ __('messages.delete') }}
                                    </button>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">{{ __('messages.N/A') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addWayModal" tabindex="-1" aria-labelledby="addWayModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('ways-of-shooting.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addWayModalLabel">{{ __('messages.add_shooting_way') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('messages.close') }}"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('messages.way_of_shooting') }}</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="editWayModal" tabindex="-1" aria-labelledby="editWayModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" id="editWayForm">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('messages.edit_shooting_way') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('messages.close') }}"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_way_id">
                        <div class="mb-3">
                            <label class="form-label">{{ __('messages.way_of_shooting') }}</label>
                            <input type="text" name="name" id="edit_way_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="deleteWayModal" tabindex="-1" aria-labelledby="deleteWayModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" id="deleteWayForm">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('messages.delete_shooting_way') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('messages.close') }}"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('messages.are_you_sure_you_want_to_delete_this_shooting_way') }} <strong id="delete_way_name"></strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">{{ __('messages.delete') }}</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.cancel') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('scripts')
<script>
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id;
            const name = this.dataset.name;

            document.getElementById('edit_way_id').value = id;
            document.getElementById('edit_way_name').value = name;
            document.getElementById('editWayForm').action = `/ways-of-shooting/${id}`;
        });
    });

    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id;
            const name = this.dataset.name;

            document.getElementById('delete_way_name').innerText = name;
            document.getElementById('deleteWayForm').action = `/ways-of-shooting/${id}`;
        });
    });
</script>
@endsection
