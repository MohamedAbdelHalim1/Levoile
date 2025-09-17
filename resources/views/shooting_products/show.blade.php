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
                                        <th>{{ __('messages.code') }}</th>
                                        <th>{{ __('messages.status') }}</th>
                                        <th>{{ __('messages.color_code') }} </th> {{-- ✅ Color Code --}}
                                        <th>{{ __('messages.size_code') }} </th> {{-- ✅ Size Code --}}
                                        <th>{{ __('messages.size') }} </th> {{-- ✅ Size Name --}}
                                        <th>{{ __('messages.location') }}</th>
                                        <th>{{ __('messages.date_of_shooting') }} </th>
                                        <th>{{ __('messages.photographer') }}</th>
                                        {{-- <th>{{ __('messages.date_of_editing') }} </th>
                                        <th>{{ __('messages.editors') }}</th> --}}
                                        <th>{{ __('messages.date_of_delivery') }} </th>
                                        <th>{{ __('messages.sessions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($distinctColorRows as $index => $color)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $color->code ?? '-' }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $color->status == 'completed' ? 'bg-success' : ($color->status == 'in_progress' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                                    {{ $color->status == 'completed' ? __('messages.complete') : ($color->status == 'in_progress' ? __('messages.in_progress') : __('messages.new')) }}
                                                </span>
                                            </td>

                                            {{-- Color Code / Size Code / Size Name --}}
                                            <td>{{ $color->color_code ?? '-' }}</td>
                                            <td>{{ $color->size_code ?? '-' }}</td>
                                            <td>{{ $color->size_name ?? '-' }}</td>

                                            <td>{{ $color->location ?? '-' }}</td>
                                            <td>{{ $color->date_of_shooting ?? '-' }}</td>

                                            {{-- المصور --}}
                                            <td>
                                                @if ($color->photographer)
                                                    @foreach (json_decode($color->photographer, true) as $id)
                                                        <span
                                                            class="badge bg-primary">{{ optional(\App\Models\User::find($id))->name ?? '-' }}</span>
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
                                                            <div><strong>{{ __('messages.reference') }}:</strong>
                                                                {{ $session->reference }}</div>
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
                        </div> {{-- نهاية table-responsive للجدول الأساسي --}}

                        <hr class="my-4">

                        <h5 class="mb-3">{{ __('messages.duplicate_color_codes') ?? 'كود لون مكرر' }}</h5>

                        @if ($duplicateGroups->isEmpty())
                            <div class="text-muted">{{ __('messages.N/A') }}</div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('messages.color_code') }}</th>
                                            <th>{{ __('messages.occurrences') ?? 'عدد التكرارات' }}</th>
                                            <th>{{ __('messages.details') ?? 'التفاصيل' }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $rowNum = 1; @endphp
                                        @foreach ($duplicateGroups as $code => $group)
                                            <tr>
                                                <td>{{ $rowNum++ }}</td>
                                                <td>{{ $code ?? 'غير محدد' }}</td>
                                                <td><span class="badge bg-danger">{{ $group->count() }}</span></td>
                                                <td>
                                                    {{-- جدول صغير داخل الخلية يوضح كل الصفوف المكررة لهذا الكود --}}
                                                    <div class="table-responsive">
                                                        <table class="table table-sm table-bordered mb-0">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>{{ __('messages.code') }}</th>
                                                                    <th>{{ __('messages.size_code') }}</th>
                                                                    <th>{{ __('messages.size') }}</th>
                                                                    <th>{{ __('messages.location') }}</th>
                                                                    <th>{{ __('messages.date_of_shooting') }}</th>
                                                                    <th>{{ __('messages.date_of_delivery') }}</th>
                                                                    <th>{{ __('messages.sessions') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($group as $dup)
                                                                    <tr>
                                                                        <td>{{ $dup->code ?? '-' }}</td>
                                                                        <td>{{ $dup->size_code ?? '-' }}</td>
                                                                        <td>{{ $dup->size_name ?? '-' }}</td>
                                                                        <td>{{ $dup->location ?? '-' }}</td>
                                                                        <td>{{ $dup->date_of_shooting ?? '-' }}</td>
                                                                        <td>{{ $dup->date_of_delivery ?? '-' }}</td>
                                                                        <td>
                                                                            @if ($dup->sessions && $dup->sessions->count())
                                                                                @foreach ($dup->sessions as $s)
                                                                                    <span
                                                                                        class="badge bg-light text-dark">{{ $s->reference }}</span>
                                                                                @endforeach
                                                                            @else
                                                                                <span class="text-muted">-</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
