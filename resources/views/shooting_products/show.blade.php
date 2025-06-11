@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">{{ __('messages.product_details') }} : {{ $product->name }}</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>{{ __('messages.description') }}:</strong> {{ $product->description ?? '-' }}</p>
                        <p><strong>{{ __('messages.number_of_colors') }} :</strong> {{ $product->number_of_colors }}</p>
                        <p><strong>{{ __('messages.price') }}:</strong> {{ $product->price ?? '-' }}</p>
                        <p><strong>{{ __('messages.status') }}:</strong>
                            @if ($product->status == 'completed')
                                <span class="badge bg-success">{{ __('messages.complete') }}</span>
                            @elseif($product->status == 'in_progress' || $product->status == 'partial')
                                <span class="badge bg-warning text-dark">{{ __('messages.in_progress') }} </span>
                            @else
                                <span class="badge bg-secondary">{{ __('messages.new') }}</span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">{{ __('messages.colors') }}</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('messages.name') }}</th>
                                        <th>{{ __('messages.code') }}</th>
                                        <th>{{ __('messages.status') }}</th>
                                        <th>{{ __('messages.color_code') }} </th> {{-- ✅ Color Code --}}
                                        <th>{{ __('messages.size_code') }} </th> {{-- ✅ Size Code --}}
                                        <th>{{ __('messages.size') }} </th> {{-- ✅ Size Name --}}
                                        <th>{{ __('messages.location') }}</th>
                                        <th>{{ __('messages.date_of_shooting') }} </th>
                                        <th>{{ __('messages.photographer') }}</th>
                                        <th>{{ __('messages.date_of_editing') }} </th>
                                        <th>{{ __('messages.editors') }}</th>
                                        <th>{{ __('messages.date_of_delivery') }} </th>
                                        <th>{{ __('messages.sessions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->shootingProductColors as $index => $color)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $color->name ?? '-' }}</td>
                                            <td>{{ $color->code ?? '-' }}</td>
                                            <td>
                                                <span
                                                    class="badge 
                                                    {{ $color->status == 'completed'
                                                        ? 'bg-success'
                                                        : ($color->status == 'in_progress'
                                                            ? 'bg-warning text-dark'
                                                            : 'bg-secondary') }}">
                                                    {{ $color->status == 'completed' ? __('messages.complete') : ($color->status == 'in_progress' ? __('messages.in_progress') : __('messages.new')) }}
                                                </span>
                                            </td>

                                            {{-- ✅ Color Code --}}
                                            <td>{{ $color->color_code ?? '-' }}</td>

                                            {{-- ✅ Size Code --}}
                                            <td>{{ $color->size_code ?? '-' }}</td>

                                            {{-- ✅ Size Name --}}
                                            <td>{{ $color->size_name ?? '-' }}</td>

                                            <td>{{ $color->location ?? '-' }}</td>
                                            <td>{{ $color->date_of_shooting ?? '-' }}</td>
                                            <td>
                                                @if ($color->photographer)
                                                    @foreach (json_decode($color->photographer) as $id)
                                                        <span class="badge bg-primary">
                                                            {{ optional(\App\Models\User::find($id))->name ?? '-' }}
                                                        </span>
                                                    @endforeach
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $color->date_of_editing ?? '-' }}</td>
                                            <td>
                                                @if ($color->editor)
                                                    @foreach (json_decode($color->editor) as $id)
                                                        <span class="badge bg-dark">
                                                            {{ optional(\App\Models\User::find($id))->name ?? '-' }}
                                                        </span>
                                                    @endforeach
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $color->date_of_delivery ?? '-' }}</td>
                                            <td>
                                                @if ($color->sessions->count())
                                                    @foreach ($color->sessions as $session)
                                                        <div class="mb-1 border rounded p-1">
                                                            <div><strong>{{ __('messages.reference') }}:</strong> {{ $session->reference }}</div>
                                                            <div>
                                                                <strong>{{ __('messages.status') }}:</strong>
                                                                <span
                                                                    class="badge {{ $session->status == 'completed' ? 'bg-success' : 'bg-warning text-dark' }}">
                                                                    {{ $session->status == 'completed' ? __('messages.complete') : __('messages.in_progress') }}
                                                                </span>
                                                            </div>
                                                            @if ($session->drive_link)
                                                                <div>
                                                                    <a href="{{ $session->drive_link }}" target="_blank"
                                                                        class="text-decoration-underline text-primary">
                                                                        {{ __('messages.drive_link') }}
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <span class="text-muted">{{ __('messages.N/A') }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
