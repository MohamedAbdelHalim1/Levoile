@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-4">{{ __('messages.required_quantity') }} : {{ $material->name }}</h4>
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('design-materials.requests.store', $material->id) }}" method="POST">
                    @csrf

                    {{-- <div class="mb-3">
                        <textarea class="form-control" name="notes" rows="2" placeholder="{{ __('messages.notes') }}">{{ old('notes') }}</textarea>
                    </div> --}}

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('messages.name') }}</th>
                                    <th>{{ __('messages.color_code') }}</th>
                                    <th>{{ __('messages.current_quantity') }}</th>
                                    <th>{{ __('messages.required_quantity') }}</th>
                                    <th>{{ __('messages.unit') }}</th>
                                    <th>{{ __('messages.delivery_date') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($material->colors as $index => $color)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $color->name }}</td>
                                        <td>{{ $color->code ?? '-' }}</td>
                                        <td>{{ $color->current_quantity ?? '-' }} {{ $color->unit_of_current_quantity }}
                                        </td>

                                        <td style="min-width:140px">
                                            <input type="hidden" name="colors[{{ $index }}][id]"
                                                value="{{ $color->id }}">
                                            <input type="number" step="any" class="form-control"
                                                name="colors[{{ $index }}][required_quantity]"
                                                value="{{ old('colors.' . $index . '.required_quantity') }}"
                                                placeholder="0.00">
                                        </td>

                                        <td style="min-width:130px">
                                            @php $defaultUnit = $color->unit_of_current_quantity; @endphp
                                            <select name="colors[{{ $index }}][unit]" class="form-control">
                                                <option value="" @selected(old("colors.$index.unit") === '')>-</option>
                                                <option value="kg" @selected(old("colors.$index.unit", $defaultUnit) == 'kg')>{{ __('messages.kg') }}
                                                </option>
                                                <option value="meter" @selected(old("colors.$index.unit", $defaultUnit) == 'meter')>
                                                    {{ __('messages.meter') }}</option>
                                            </select>

                                        </td>

                                        <td style="min-width:160px">
                                            <input type="date" class="form-control"
                                                name="colors[{{ $index }}][delivery_date]"
                                                value="{{ old('colors.' . $index . '.delivery_date') }}">
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
