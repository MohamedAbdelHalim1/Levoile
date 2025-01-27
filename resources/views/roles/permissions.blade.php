@extends('layouts.app')

@section('content')
<div class="p-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <form method="POST" action="{{ route('roles.updatePermissions', $role->id) }}">
                @csrf
                <h3>Assign Permissions for Role: {{ $role->name }}</h3>
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Module Name</th>
                            <th>View</th>
                            <th>Add</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ ucfirst($permission->access) }}</td>
                                @foreach (['view', 'add', 'edit', 'delete'] as $action)
                                    <td>
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                                            {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary mt-4">Update Permissions</button>
            </form>
        </div>
    </div>
</div>
@endsection
