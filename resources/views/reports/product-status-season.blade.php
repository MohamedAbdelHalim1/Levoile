@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Date Range Filter -->
            <form method="GET" action="{{ route('reports.productStatusForSeason') }}" class="row mb-4">
                <div class="col-md-4">
                    <label>{{ __('messages.from_date') }}</label>
                    <input type="date" class="form-control" name="startDate" value="{{ request('startDate') }}">
                </div>
                <div class="col-md-4">
                    <label>{{ __('messages.to_date') }} </label>
                    <input type="date" class="form-control" name="endDate" value="{{ request('endDate') }}">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">{{ __('messages.search') }}</button>
                    <a href="{{ route('reports.productStatusForSeason') }}" class="btn btn-secondary">{{ __('messages.reset') }}</a>
                </div>
            </form>

            <!-- Table -->
            <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>{{ __('messages.season') }}</th>
                            <th>{{ __('messages.number_of_products') }}</th>
                            <th>{{ __('messages.number_of_colors') }} </th>
                            <th>{{ __('messages.new') }}</th>
                            <th>{{ __('messages.processing') }} </th>
                            <th>{{ __('messages.postponed') }}</th>
                            <th>{{ __('messages.cancel') }}</th>
                            <th>{{ __('messages.complete') }} </th>
                            <th>{{ __('messages.partial') }} </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seasons as $season)
                            <tr>
                                <td>{{ $season->season }}</td>
                                <td>{{ $season->product_count }}</td>
                                <td>{{ $season->color_count }}</td>
                                <td>{{ $season->new_count }}</td>
                                <td>{{ $season->processing_count }}</td>
                                <td>{{ $season->postponed_count }}</td>
                                <td>{{ $season->cancel_count }}</td>
                                <td>{{ $season->complete_count }}</td>
                                <td>{{ $season->partial_count }}</td>
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
@endsection
