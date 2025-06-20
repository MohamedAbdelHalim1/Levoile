@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
                <h2 class="mb-4">{{ __('messages.product_history') }}: {{ $product->description }}</h2>

                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{ __('messages.date') }}</th>
                            <th>{{ __('messages.type') }}</th>
                            <th>{{ __('messages.action_by') }}</th>
                            <th>{{ __('messages.notes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $record)
                            <tr>
                                <td>{{ $record->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $record->type }}</td>
                                <td>{{ $record->action_by }}</td>
                                <td>{{ $record->note }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">{{ __('messages.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
