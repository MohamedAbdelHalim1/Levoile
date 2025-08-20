@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-4">{{ __('messages.received_quantity') }} : {{ $material->name }}</h4>

                <form action="{{ route('design-materials.receive.store', $material->id) }}" method="POST">
                    @csrf

                    <div class="form-check mb-3">
                      
                            <input class="form-check-input" type="checkbox" value="1" id="increase_current"
                                name="increase_current">
                 
                     
                            <label class="form-check-label" for="increase_current">
                                {{ __('messages.increase_current_quantity_automatically') }}
                            </label>
                     
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('messages.name') }}</th>
                                    <th>{{ __('messages.required_quantity') }}</th>
                                    <th>{{ __('messages.received_quantity') }}</th>
                                    <th>{{ __('messages.unit') }}</th>
                                    <th>{{ __('messages.status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($material->colors as $index => $color)
                                    @php
                                        $remaining =
                                            is_numeric($color->required_quantity) &&
                                            is_numeric($color->received_quantity)
                                                ? $color->required_quantity - $color->received_quantity
                                                : null;
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $color->name }}</td>
                                        <td>{{ $color->required_quantity ?? '-' }} {{ $color->unit_of_required_quantity }}
                                        </td>

                                        <td style="min-width:140px">
                                            <input type="hidden" name="colors[{{ $index }}][id]"
                                                value="{{ $color->id }}">
                                            <input type="number" step="any" class="form-control"
                                                name="colors[{{ $index }}][received_quantity]"
                                                value="{{ old('colors.' . $index . '.received_quantity', $color->received_quantity) }}">
                                        </td>

                                        <td style="min-width:130px">
                                            <select class="form-control"
                                                name="colors[{{ $index }}][unit_of_received_quantity]">
                                                <option value="" @selected(!$color->unit_of_received_quantity)>-</option>
                                                <option value="kg" @selected(old('colors.' . $index . '.unit_of_received_quantity', $color->unit_of_received_quantity) == 'kg')>{{ __('messages.kg') }}
                                                </option>
                                                <option value="meter" @selected(old('colors.' . $index . '.unit_of_received_quantity', $color->unit_of_received_quantity) == 'meter')>
                                                    {{ __('messages.meter') }}</option>
                                            </select>
                                        </td>
                                        <td>
                                            @switch($color->status)
                                                @case('complete_receive')
                                                    <span class="badge bg-success">{{ __('messages.complete_receive') }}</span>
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
                                                    <span class="badge bg-info text-dark">{{ __('messages.new') }}</span>
                                                @break

                                                @default
                                                    <span class="badge bg-secondary">{{ __('messages.unknown_status') }}</span>
                                            @endswitch
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                        <a href="{{ route('design-materials.index') }}"
                            class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
