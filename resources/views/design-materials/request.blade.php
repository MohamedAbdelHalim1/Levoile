@extends('layouts.app')

@section('content')
<div class="p-2">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="bg-white shadow sm:rounded-lg p-4">
      <h4 class="mb-4">{{ __('messages.required_quantity') }} : {{ $material->name }}</h4>

      <form action="{{ route('design-materials.request.store', $material->id) }}" method="POST">
        @csrf
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
              @foreach($material->colors as $index => $color)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $color->name }}</td>
                <td>{{ $color->code ?? '-' }}</td>
                <td>{{ $color->current_quantity ?? '-' }} {{ $color->unit_of_current_quantity }}</td>

                <td style="min-width:140px">
                  <input type="hidden" name="colors[{{ $index }}][id]" value="{{ $color->id }}">
                  <input type="number" step="any" class="form-control"
                         name="colors[{{ $index }}][required_quantity]"
                         value="{{ old('colors.'.$index.'.required_quantity', $color->required_quantity ?? 0) }}">
                </td>

                <td style="min-width:130px">
                  <select class="form-control" name="colors[{{ $index }}][unit_of_required_quantity]">
                    <option value="" @selected(!$color->unit_of_required_quantity) >-</option>
                    <option value="kg" @selected(old('colors.'.$index.'.unit_of_required_quantity', $color->unit_of_required_quantity)=='kg')>{{ __('messages.kg') }}</option>
                    <option value="meter" @selected(old('colors.'.$index.'.unit_of_required_quantity', $color->unit_of_required_quantity)=='meter')>{{ __('messages.meter') }}</option>
                  </select>
                </td>

                <td style="min-width:160px">
                  <input type="date" class="form-control"
                         name="colors[{{ $index }}][delivery_date]"
                         value="{{ old('colors.'.$index.'.delivery_date', $color->delivery_date) }}">
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="mt-3">
          <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
          <a href="{{ route('design-materials.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
