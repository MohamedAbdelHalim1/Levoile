@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-4">{{ __('messages.material_details') }} : {{ $material->name }}</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>{{ __('messages.name') }} :</strong> {{ $material->name }}
                    </div>
                    <div class="col-md-6">
                        <strong>{{ __('messages.image') }}:</strong>
                        @if ($material->image)
                            <img src="{{ asset($material->image) }}" width="100" class="img-thumbnail">
                        @else
                            <span class="text-muted">{{ __('messages.N/A') }}</span>
                        @endif
                    </div>
                </div>
                <hr>
                <h5>{{ __('messages.colors_of_material') }}</h5>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>{{ __('messages.name') }}</th>
                                <th>{{ __('messages.color_code') }}</th>
                                <th>{{ __('messages.required_quantity') }}</th>
                                <th>{{ __('messages.received_quantity') }}</th>
                                <th>{{ __('messages.remaining_quantity') }}</th>
                                <th>{{ __('messages.delivery_date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($material->colors as $index => $color)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $color->name }}</td>
                                    <td>
                                        {{ $color->code ?? '-' }}
                                    </td>
                                    <td>{{ $color->required_quantity ?? '-' }}</td>
                                    <td>{{ $color->received_quantity ?? '-' }}</td>
                                    <td>{{ $color->required_quantity - $color->received_quantity ?? '-' }}</td>
                                    <td>{{ $color->delivery_date ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-muted">{{ __('messages.N/A') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('design-materials.index') }}" class="btn btn-secondary mt-4">{{ __('messages.back') }}</a>
            </div>
        </div>
    </div>
@endsection
