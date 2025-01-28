@extends('layouts.app')

@section('content')
<div class="p-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <form method="POST" action="{{ route('roles.updatePermissions', $role->id) }}">
                @csrf
                <h3>ادخال صلاحيات دور: {{ $role->name }}</h3>
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>اسم الصلاحيات</th>
                            <th>عرض</th>
                            {{-- <th>إضافة</th>
                            <th>تعديل</th>
                            <th>حذف</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->access }}</td>
                                @if (in_array($permission->access, ['إكمال بيانات المنتج', 'استلام منتج', 'إلغاء منتج' , 'تفعيل منتج' , 'تعديل صلاحيات مستخدم']))
                                    <!-- Only show "View" column -->
                                    <td>
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}_view" 
                                            {{ in_array($permission->id . '_view', $rolePermissions) ? 'checked' : '' }}>
                                    </td>
                                @else
                                    <!-- Render all columns -->
                                    <td>
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}_view" 
                                            {{ in_array($permission->id . '_view', $rolePermissions) ? 'checked' : '' }}>
                                    </td>
                                    {{-- <td>
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}_add" 
                                            {{ in_array($permission->id . '_add', $rolePermissions) ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}_edit" 
                                            {{ in_array($permission->id . '_edit', $rolePermissions) ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}_delete" 
                                            {{ in_array($permission->id . '_delete', $rolePermissions) ? 'checked' : '' }}>
                                    </td> --}}
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary mt-4">تعديل</button>
            </form>
        </div>
    </div>
</div>
@endsection
