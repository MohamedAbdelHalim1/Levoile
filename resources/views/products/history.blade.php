@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
                <h2 class="mb-4">{{ __('تاريخ المنتج') }}: {{ $product->description }}</h2>

                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>{{ __('النوع') }}</th>
                            <th>{{ __('تم بواسطة') }}</th>
                            <th>{{ __('الملاحظة') }}</th>
                            <th>{{ __('التاريخ') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $record)
                            <tr>
                                <td>{{ $record->type }}</td>
                                <td>{{ $record->action_by }}</td>
                                <td>{{ $record->note }}</td>
                                <td>{{ $record->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">{{ __('العودة للقائمة') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
