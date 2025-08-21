@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-3">{{ __('messages.received_quantity') }} : طلب رقم #{{ $req->id }} —
                    {{ $req->material->name }}</h4>
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
                <form action="{{ route('requests.receive.store', $req->id) }}" method="POST">
                    @csrf

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="1" id="increase_current"
                            name="increase_current">
                        <label class="form-check-label" for="increase_current">
                            {{ __('messages.increase_current_quantity_automatically') }}
                        </label>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control" name="notes" rows="2" placeholder="{{ __('messages.notes') }}">{{ old('notes') }}</textarea>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('messages.name') }}</th>
                                    <th>{{ __('messages.required_quantity') }}</th>
                                    <th>تم استلامه</th>
                                    <th>المتبقي</th>
                                    <th>{{ __('messages.received_quantity') }}</th>
                                    <th>{{ __('messages.unit') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($req->items as $index => $item)
                                    @php
                                        $received = $item->receiptItems->sum('quantity');
                                        $remaining = ($item->required_quantity ?? 0) - $received;
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->color->name }} ({{ $item->color->code ?? '-' }})</td>
                                        <td>{{ $item->required_quantity }} {{ $item->unit }}</td>
                                        <td>{{ $received ?: 0 }} {{ $item->unit }}</td>
                                        <td>{{ max($remaining, 0) }} {{ $item->unit }}</td>

                                        <td style="min-width:140px">
                                            <input type="hidden" name="items[{{ $index }}][id]"
                                                value="{{ $item->id }}">
                                            <input type="number" step="any" class="form-control"
                                                name="items[{{ $index }}][received_quantity]"
                                                value="{{ old('items.' . $index . '.received_quantity') }}" placeholder="0.00">
                                        </td>

                                        <td style="min-width:130px">
                                            <select class="form-control" name="items[{{ $index }}][unit]">
                                                <option value="" @selected(old('items.' . $index . '.unit') == '')>-</option>
                                                <option value="kg" @selected(old('items.' . $index . '.unit') == 'kg')>{{ __('messages.kg') }}
                                                </option>
                                                <option value="meter" @selected(old('items.' . $index . '.unit') == 'meter')>
                                                    {{ __('messages.meter') }}</option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                        <a href="{{ route('requests.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
