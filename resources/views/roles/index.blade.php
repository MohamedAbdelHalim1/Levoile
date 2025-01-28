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


            @if (auth()->user()->hasPermission('إضافة دور'))
                <div class="flex justify-end mb-4">
                    <a href="{{ route('roles.create') }}" class="btn btn-success">
                        {{ __('اضافة دور') }}
                    </a>
                </div>
            @endif

            <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @if (auth()->user()->hasPermission('عرض دور'))
                                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-primary">
                                            عرض المستخدمين</a>
                                    @endif
                                    @if (auth()->user()->hasPermission('تعديل دور'))
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-secondary">تعديل</a>
                                    @endif
                                    @if (auth()->user()->hasPermission('تعديل صلاحيات مستخدم'))
                                        <a href="{{ route('roles.permissions', $role->id) }}"
                                            class="btn btn-info">تعديل الصلاحيات</a>
                                    @endif
                                    @if (auth()->user()->hasPermission('حذف دور') && $role->id != 1)
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                            style="display: inline-block;" onsubmit="return confirm('هل أنت متأكد من حذف هذا الدور؟');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
