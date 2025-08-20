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
            <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="row mb-4">
                    <div class="m-2">
                        <a href="{{ route('design-materials.create') }}" class="btn btn-primary">
                            {{ __('messages.create_material') }}
                        </a>
                    </div>
                </div>
                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('messages.name') }} </th>
                            <th>{{ __('messages.number_of_colors') }} </th>
                            <th>{{ __('messages.image') }}</th>
                            <th>{{ __('messages.operations') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($materials as $index => $material)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $material->name }}</td>
                                <td>
                                    @if ($material->colors->isNotEmpty())
                                        <table class="table table-bordered table-sm mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>{{ __('messages.name') }}</th>
                                                    <th>{{ __('messages.color_code') }}</th>
                                                    <th>{{ __('messages.required_quantity') }}</th>
                                                    <th>{{ __('messages.received_quantity') }}</th>
                                                    <th>{{ __('messages.current_quantity') }}</th>
                                                    <th>{{ __('messages.status') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($material->colors as $color)
                                                    <tr>
                                                        <td>{{ $color->name }}</td>
                                                        <td>{{ $color->code ?? '-' }}</td>
                                                        <td>{{ $color->required_quantity ?? '-' }}
                                                            {{ $color->unit_of_required_quantity }}</td>
                                                        <td>{{ $color->received_quantity ?? '-' }}
                                                            {{ $color->unit_of_received_quantity }}</td>
                                                        <td>{{ $color->current_quantity ?? '-' }}
                                                            {{ $color->unit_of_current_quantity }}</td>
                                                        <td>
                                                            @switch($color->status)
                                                                @case('complete_receive')
                                                                    <span
                                                                        class="badge bg-success">{{ __('messages.complete_receive') }}</span>
                                                                @break

                                                                @case('partial_receive')
                                                                    <span
                                                                        class="badge bg-warning text-dark">{{ __('messages.partial_receive') }}</span>
                                                                @break

                                                                @case('ask_for_quantity')
                                                                    <span
                                                                        class="badge bg-info text-dark">{{ __('messages.ask_for_quantity') }}</span>
                                                                @break

                                                                @case('new')
                                                                    <span
                                                                        class="badge bg-info text-dark">{{ __('messages.new') }}</span>
                                                                @break

                                                                @default
                                                                    <span
                                                                        class="badge bg-secondary">{{ __('messages.unknown_status') }}</span>
                                                            @endswitch
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <span class="text-muted">{{ __('messages.no_colors') }}</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($material->image)
                                        <img src="{{ asset($material->image) }}" width="60" class="img-thumbnail">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('design-materials.show', $material->id) }}"
                                        class="btn btn-info btn-sm">
                                        {{ __('messages.view') }}
                                    </a>
                                    <a href="{{ route('design-materials.edit', $material->id) }}"
                                        class="btn btn-warning btn-sm">
                                        {{ __('messages.edit') }}
                                    </a>
                                    <a href="{{ route('design-materials.request.form', $material->id) }}"
                                        class="btn btn-success btn-sm">
                                        {{ __('messages.required_quantity') }}
                                    </a>

                                    <a href="{{ route('design-materials.receive.form', $material->id) }}"
                                        class="btn btn-primary btn-sm">
                                        {{ __('messages.received_quantity') }}
                                    </a>
                                    <a href="{{ route('design-materials.activities', $material->id) }}"
                                        class="btn btn-secondary btn-sm">
                                        {{ __('messages.material_history') ?? 'مراجعة الخامة' }}
                                    </a>


                                    <form action="{{ route('design-materials.destroy', $material->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('{{ __('messages.confirm_delete_material') }}');">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger btn-sm">{{ __('messages.delete') }}</button>
                                    </form>

                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">{{ __('messages.N/A') }} </td>
                                </tr>
                            @endforelse
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
