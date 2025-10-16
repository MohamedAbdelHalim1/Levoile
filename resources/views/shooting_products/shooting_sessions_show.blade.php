@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-4">{{ __('messages.shooting_sessions') }} : {{ $reference }}</h4>

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">

                    {{-- فورم الحذف الجماعي خارج الجدول --}}
                    <form id="bulkDeleteForm" method="POST" action="{{ route('shooting-sessions.bulk-remove', $reference) }}"
                        onsubmit="return confirm('{{ __('messages.are_you_sure') }}');">
                        @csrf
                        @method('DELETE')

                        <div class="d-flex justify-content-between mb-2">
                            <div>
                                <button type="submit" id="bulkDeleteBtn" class="btn btn-danger btn-sm" disabled>
                                    <i class="fa fa-trash"></i> {{ __('messages.delete_selected') }}
                                </button>
                            </div>
                            <a href="{{ route('shooting-sessions.index') }}" class="btn btn-secondary btn-sm">
                                {{ __('messages.back') }}
                            </a>
                        </div>
                    </form>

                    <table class="table table-bordered text-nowrap" id="colors-table">
                        <thead class="table-light">
                            <tr>
                                <th style="width:40px;">
                                    <input type="checkbox" id="selectAll">
                                </th>
                                <th>{{ __('messages.name') }}</th>
                                <th>{{ __('messages.code') }}</th>
                                <th>{{ __('messages.sku') }}</th>
                                <th>{{ __('messages.type_of_shooting') }}</th>
                                <th>{{ __('messages.location') }}</th>
                                <th>{{ __('messages.date_of_shooting') }}</th>
                                <th>{{ __('messages.photographer') }}</th>
                                <th>{{ __('messages.date_of_editing') }}</th>
                                <th>{{ __('messages.editors') }}</th>
                                <th>{{ __('messages.date_of_delivery') }}</th>
                                <th>{{ __('messages.status') }}</th>
                                <th>{{ __('messages.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $colorSession)
                                @php
                                    $color = $colorSession->color;
                                    $isCompleted = $color && $color->status === 'completed';
                                @endphp
                                <tr>
                                    <td>
                                        {{-- لاحظ form="bulkDeleteForm" --}}
                                        <input type="checkbox" class="row-check" name="ids[]"
                                            value="{{ $colorSession->id }}" form="bulkDeleteForm"
                                            {{ $isCompleted ? 'disabled' : '' }}>
                                    </td>

                                    <td>{{ $color->shootingProduct->name }}</td>
                                    <td>{{ $color->shootingProduct->custom_id }}</td>
                                    <td>{{ $color->code }}</td>
                                    <td>{{ $color->type_of_shooting ?? '-' }}</td>
                                    <td>{{ $color->location ?? '-' }}</td>
                                    <td>{{ $color->date_of_shooting ?? '-' }}</td>
                                    <td>
                                        @php
                                            $pIds = $color->photographer ? json_decode($color->photographer, true) : [];
                                        @endphp

                                        @if (is_array($pIds) && count($pIds))
                                            <ul class="list-unstyled mb-0">
                                                @foreach ($pIds as $pid)
                                                    <li>{{ optional(\App\Models\User::find($pid))->name ?? '—' }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>{{ $color->date_of_editing ?? '-' }}</td>
                                    {{-- المحررون --}}
                                    <td>
                                        @php
                                            // editor عندك مخزنة JSON ids برضه
                                            $eIds = $color->editor ? json_decode($color->editor, true) : [];
                                        @endphp

                                        @if (is_array($eIds) && count($eIds))
                                            <ul class="list-unstyled mb-0">
                                                @foreach ($eIds as $eid)
                                                    <li>{{ optional(\App\Models\User::find($eid))->name ?? '—' }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            —
                                        @endif
                                    </td>

                                    <td>{{ $color->date_of_delivery ?? '-' }}</td>
                                    <td>
                                        @if ($color->status == 'in_progress')
                                            <span class="badge bg-info">{{ __('messages.in_progress') }}</span>
                                        @elseif ($color->status == 'completed')
                                            <span class="badge bg-success">{{ __('messages.complete') }}</span>
                                        @else
                                            <span class="badge bg-warning">{{ $color->status ?? '-' }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($color->status != 'completed')
                                            {{-- فورم مستقل لحذف الصف فقط، مش جوّه bulkDeleteForm --}}
                                            <form id="del-{{ $colorSession->id }}" method="POST"
                                                action="{{ route('shooting-sessions.remove-color', $colorSession->id) }}"
                                                class="d-inline"
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

@section('scripts')
    <script>
        (function() {
            const selectAll = document.getElementById('selectAll');
            const checks = Array.from(document.querySelectorAll('.row-check'));
            const bulkBtn = document.getElementById('bulkDeleteBtn');

            function refreshButton() {
                const anyChecked = checks.some(ch => ch.checked);
                bulkBtn.disabled = !anyChecked;
            }

            if (selectAll) {
                selectAll.addEventListener('change', function() {
                    checks.forEach(ch => {
                        if (!ch.disabled) ch.checked = selectAll.checked;
                    });
                    refreshButton();
                });
            }

            checks.forEach(ch => ch.addEventListener('change', refreshButton));
            refreshButton();
        })();
    </script>
@endsection
