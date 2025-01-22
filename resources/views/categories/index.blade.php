@extends('layouts.app')

@section('content')
<div class="p-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @if(session('success'))
            <div class="alert alert-primary" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">x</button>
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('categories.create') }}" class="btn btn-success">
                {{ __('Add New Category') }}
            </a>
        </div>

        <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">{{ __('Show') }}</a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-secondary">{{ __('Edit') }}</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@section('scripts')

        <!-- SELECT2 JS -->
        <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
        @vite('resources/assets/js/select2.js')
        
        <!-- DATA TABLE JS -->
        <script src="{{asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/js/jszip.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
        @vite('resources/assets/js/table-data.js')


@endsection
