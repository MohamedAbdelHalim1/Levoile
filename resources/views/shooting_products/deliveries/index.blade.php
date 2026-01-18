@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <div class="d-flex justify-content-between mb-3">
                    <h4>{{ __('messages.shooting_delivery_file') }}</h4>
                    <a href="{{ route('shooting-deliveries.upload.create') }}" class="btn btn-primary">{{ __('messages.upload_new_sheet') }}</a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <table class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>{{ __('messages.created_at') }}</th>
                            <th>{{ __('messages.status') }}</th>
                            <th>{{ __('messages.number_of_products') }}</th>
                            <th>{{ __('messages.number_of_models') }}</th>
                            <th>{{ __('messages.number_of_repeated_models') }}</th>
                            <th>{{ __('messages.published') }}</th>
                            <th>{{ __('messages.new_models_count') }}</th>
                            <th>{{ __('messages.old_models_count') }}</th>
                            <th>{{ __('messages.uploaded_by') }}</th>
                            <th>{{ __('messages.published_by') }}</th>
                            <th>{{ __('messages.download') }}</th>
                            <th>{{ __('messages.operations') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deliveries as $delivery)
                            <tr>
                                <td>{{ $delivery->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <span
                                        class="badge bg-{{ $delivery->status == 'تم ألنشر' ? 'warning' : 'success' }}">{{ $delivery->status }}</span>
                                </td>
                                <td>{{ $delivery->unique_products }}</td>
                                <td>{{ $delivery->actual_rows }}</td>
                                <td>{{ $delivery->repeated_items ?? 0 }}</td>
                                @php
                                    $receivedCount = $delivery->contents()->where('is_received', 1)->count();
                                @endphp
                                <td>{{ $receivedCount }}</td>

                                <td>{{ $delivery->new_records ?? 0 }}</td>
                                <td>{{ $delivery->old_records ?? 0 }}</td>
                                <td>{{ $delivery->user->name }}</td>
                                <td>{{ optional($delivery->sender)->name }}</td>
                                <td>
                                    <a href="{{ asset('excel/' . $delivery->filename) }}" class="btn btn-sm btn-info"
                                        download>
                                        <i class="fa fa-download"></i>
                                    </a>
                                </td>

                                <td>
                                    {{-- @if ($delivery->contents()->where('status', 'new')->count() === 0)
                                        <a href="{{ route('shooting-deliveries.show', $delivery->id) }}"
                                            class="btn btn-info">عرض</a>
                                    @else --}}
                                        <a href="{{ route('shooting-deliveries.send.page', $delivery->id) }}"
                                            class="btn btn-warning">
                                            @if ($delivery->status == 'تم ألنشر')
                                            {{ __('messages.republish') }}
                                            @else
                                            {{ __('messages.publish') }}
                                            @endif
                                        </a>
                                    {{-- @endif --}}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection


