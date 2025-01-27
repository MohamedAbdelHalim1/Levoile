@extends('layouts.app')

@section('content')
<div class="p-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <h3>Role: {{ $role->name }}</h3>

            <h4 class="mt-4">Users in this Role</h4>
            <ul class="list-group">
                @forelse ($role->users as $user)
                    <li class="list-group-item">{{ $user->name }} ({{ $user->email }})</li>
                @empty
                    <li class="list-group-item">No users assigned to this role.</li>
                @endforelse
            </ul>

            <h4 class="mt-4">Permissions</h4>
            <ul class="list-group">
                @forelse ($role->role_permissions as $permission)
                    <li class="list-group-item">{{ ucfirst($permission->permissions->access) }}</li>
                @empty
                    <li class="list-group-item">No permissions assigned to this role.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
