@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-4">{{ __('messages.shooting_sessions') }} : {{ $reference }}</h4>

                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('messages.name') }}</th>
                                <th>{{ __('messages.code') }} </th>
                                <th>{{ __('messages.sku') }} </th>
                                <th>{{ __('messages.type_of_shooting') }} </th>
                                <th>{{ __('messages.location') }} </th>
                                <th>{{ __('messages.date_of_shooting') }} </th>
                                <th>{{ __('messages.photographer') }}</th>
                                <th>{{ __('messages.date_of_editing') }} </th>
                                <th>{{ __('messages.editors') }}</th>
                                <th>{{ __('messages.date_of_delivery') }}</th>
                                <th>{{ __('messages.status') }}</th>
                                <th>{{ __('messages.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $colorSession)
                                @php $color = $colorSession->color; @endphp
                                <tr>
                                    <td>{{ $color->shootingProduct->name }}</td>
                                    <td>{{ $color->shootingProduct->custom_id }}</td>
                                    <td>{{ $color->code }}</td>
                                    <td>{{ $color->type_of_shooting ?? '-' }}</td>
                                    <td>{{ $color->location ?? '-' }}</td>
                                    <td>{{ $color->date_of_shooting ?? '-' }}</td>
                                    <td>
                                        @if ($color->photographer)
                                            @foreach (json_decode($color->photographer, true) as $photographerId)
                                                <span
                                                    class="badge bg-primary">{{ optional(\App\Models\User::find($photographerId))->name }}</span>
                                            @endforeach
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $color->date_of_editing ?? '-' }}</td>
                                    <td>
                                        @if (!empty($color->editor) && is_array(json_decode($color->editor, true)))
                                            @foreach (json_decode($color->editor, true) as $editorId)
                                                <span
                                                    class="badge bg-secondary">{{ optional(\App\Models\User::find($editorId))->name }}</span>
                                            @endforeach
                                        @else
                                            -
                                        @endif

                                    </td>
                                    <td>{{ $color->date_of_delivery ?? '-' }}</td>
                                    <td>
                                        @if ($color->status == 'in_progress')
                                            <span class="badge bg-info">{{ __('messages.in_progress') }}</span>
                                        @elseif ($color->status == 'completed')
                                            <span class="badge bg-success">{{ __('messages.complete') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($color->status != 'completed')
                                            <form method="POST"
                                                action="{{ route('shooting-sessions.remove-color', $colorSession->id) }}"
                                                style="display:inline;"
                                                onsubmit="return confirm('{{ __('messages.are_you_sure') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    {{ __('messages.delete') }}
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-muted">---</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('shooting-sessions.index') }}"
                    class="btn btn-secondary mt-3">{{ __('messages.back') }}</a>
            </div>
        </div>
    </div>
@endsection
