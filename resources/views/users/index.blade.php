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

            @if (auth()->user()->hasPermission('إضافة مستخدم'))
                <div class="flex justify-end mb-4">
                    <a href="{{ route('users.create') }}" class="btn btn-success">
                        {{ __('انشاء مستخدم') }}
                    </a>
                </div>
            @endif

            <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>البريد الالكتروني</th>
                            <th>الدور</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->name ?? 'لا يوجد' }}</td>
                                <td>
                                    @if (auth()->user()->hasPermission('تعديل مستخدم'))
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">تعديل</a>
                                    @endif
                                    @if (auth()->user()->hasPermission('حذف مستخدم'))
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('هل أنت متأكد من حذف هذا المستخدم؟')">حذف</button>
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
