@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="alert alert-primary" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">x</button>
                    {{ session('success') }}
                </div>
            @endif

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-4">
                <form method="GET" action="{{ route('shooting-products.index') }}" class="mb-4">
                    <div class="row">
                        <!-- Text & Dropdown Filters -->
                        <div class="col-md-3">
                            <label>{{ __('messages.name') }}</label>
                            <input type="text" name="name" class="form-control" value="{{ request('name') }}">
                        </div>

                        <div class="col-md-3">
                            <label>{{ __('messages.status') }}</label>
                            <select name="status" class="form-control">
                                <option value="">{{ __('messages.all_statuses') }}</option>
                                <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>
                                    {{ __('messages.new') }}</option>
                                <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>
                                    {{ __('messages.in_progress') }}</option>
                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>
                                    {{ __('messages.complete') }}
                                </option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>{{ __('messages.type_of_shooting') }}</label>
                            <select name="type_of_shooting" class="form-control">
                                <option value="">{{ __('messages.all_type_of_shooting') }}</option>
                                <option value="تصوير منتج"
                                    {{ request('type_of_shooting') == 'تصوير منتج' ? 'selected' : '' }}>
                                    {{ __('messages.product_shooting') }} </option>
                                <option value="تصوير موديل"
                                    {{ request('type_of_shooting') == 'تصوير موديل' ? 'selected' : '' }}>
                                    {{ __('messages.model_shooting') }}
                                </option>
                                <option value="تصوير انفلونسر"
                                    {{ request('type_of_shooting') == 'تصوير انفلونسر' ? 'selected' : '' }}>
                                    {{ __('messages.inflo_shooting') }}
                                </option>
                                <option value="تعديل لون"
                                    {{ request('type_of_shooting') == 'تعديل لون' ? 'selected' : '' }}>
                                    {{ __('messages.change_color') }}</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>{{ __('messages.location') }}</label>
                            <select name="location" class="form-control">
                                <option value="">{{ __('messages.all_locations') }}</option>
                                <option value="تصوير بالداخل"
                                    {{ request('location') == 'تصوير بالداخل' ? 'selected' : '' }}>
                                    {{ __('messages.inside_shooting') }}</option>
                                <option value="تصوير بالخارج"
                                    {{ request('location') == 'تصوير بالخارج' ? 'selected' : '' }}>
                                    {{ __('messages.outside_shooting') }}</option>
                            </select>
                        </div>

                        <!-- Date Range: تصوير -->
                        <div class="col-md-6 mt-3">
                            <label>{{ __('messages.date_of_shooting') }}</label>
                            <div class="input-group">
                                <input type="date" name="date_of_shooting_start" class="form-control"
                                    value="{{ request('date_of_shooting_start') }}">
                                <span class="input-group-text">-</span>
                                <input type="date" name="date_of_shooting_end" class="form-control"
                                    value="{{ request('date_of_shooting_end') }}">
                            </div>
                        </div>

                        <!-- Date Range: تسليم -->
                        <div class="col-md-6 mt-3">
                            <label>{{ __('messages.date_of_delivery') }}</label>
                            <div class="input-group">
                                <input type="date" name="date_of_delivery_start" class="form-control"
                                    value="{{ request('date_of_delivery_start') }}">
                                <span class="input-group-text">-</span>
                                <input type="date" name="date_of_delivery_end" class="form-control"
                                    value="{{ request('date_of_delivery_end') }}">
                            </div>
                        </div>

                        <!-- Date Range: تعديل -->
                        <div class="col-md-6 mt-3">
                            <label>{{ __('messages.date_of_editing') }}</label>
                            <div class="input-group">
                                <input type="date" name="date_of_editing_start" class="form-control"
                                    value="{{ request('date_of_editing_start') }}">
                                <span class="input-group-text">-</span>
                                <input type="date" name="date_of_editing_end" class="form-control"
                                    value="{{ request('date_of_editing_end') }}">
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="col-md-6 mt-4 d-flex align-items-end justify-content-start">
                            <button type="submit" class="btn btn-primary me-2">{{ __('messages.search') }}</button>
                            <a href="{{ route('shooting-products.index') }}"
                                class="btn btn-success">{{ __('messages.reset') }}</a>
                        </div>
                    </div>
                </form>
            </div>


            <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="row mb-4">
                    <div class="m-2">
                        @if (auth()->user()->hasPermission('إضافة منتج'))
                            <a href="{{ route('shooting-products.create') }}" class="btn btn-primary">
                                {{ __('messages.add_product') }}
                            </a>
                        @endif
                    </div>
                    <div class="m-2">
                        <a href="{{ route('shooting-products.manual') }}" class="btn btn-dark">
                            {{ __('messages.manual_shooting') }}
                        </a>
                    </div>
                    {{-- <div id="startShootingContainer" style="display: none;" class="m-2">
                        <form method="POST" action="{{ route('shooting-products.multi.start.page') }}">
                            @csrf
                            <input type="hidden" name="selected_products" id="selectedProducts">
                            <button type="submit" class="btn btn-success">بدء التصوير</button>
                        </form>
                    </div> --}}

                </div>



                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('messages.name') }}</th>
                            <th>{{ __('messages.status') }}</th>
                            <th>{{ __('messages.number_of_colors') }}</th>
                            <th>{{ __('messages.number_of_sizes') }}</th>
                            <th>{{ __('messages.number_of_sessions') }}</th>
                            <th>{{ __('messages.sessions') }}</th>
                            <th>{{ __('messages.status_of_sessions') }}</th>
                            {{-- <th>{{ __('messages.editors_of_sessions') }}</th> --}}
                            <th>{{ __('messages.photo_link') }}</th>
                            <th>{{ __('messages.edit_link') }}</th>
                            <th>{{ __('messages.status_of_edit') }}</th>
                            <th>{{ __('messages.type_of_shooting') }}</th>
                            <th>{{ __('messages.location') }}</th>
                            <th>{{ __('messages.date_of_shooting') }}</th>
                            <th>{{ __('messages.photographer') }}</th>
                            <th>{{ __('messages.date_of_edit') }}</th>
                            <th>{{ __('messages.editors') }}</th>
                            {{-- <th>{{ __('messages.date_of_delivery') }} </th>
                            <th>{{ __('messages.remaining_time') }}</th>
                            <th>{{ __('messages.way_of_shooting') }}</th> --}}
                            <th>{{ __('messages.status_of_data') }}</th>
                            <th>{{ __('messages.review') }}</th>
                            {{-- <th>{{ __('messages.product_drive_link') }}</th> --}}
                            {{-- <th>{{ __('messages.product_drive_link') }}</th> --}}
                            {{-- <th>{{ __('messages.assign_editor') }}</th> --}}
                            <th>{{ __('messages.operations') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shooting_products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <a href="{{ route('shooting-products.show', $product->id) }}"
                                        class="text-primary text-decoration-underline">
                                        {{ $product->name }}
                                    </a>
                                </td>

                                <td>
                                    @php
                                        $tooltipContent =
                                            '<div class="table-responsive"><table class=\'table table-sm table-bordered mb-0\' style=\'font-size: 13px;\'><thead class=\'table-light\'><tr><th>اللون</th><th>الكود</th><th>الحالة</th></tr></thead><tbody>';

                                        $statuses = ['new' => 0, 'in_progress' => 0, 'completed' => 0];

                                        foreach ($product->shootingProductColors as $color) {
                                            $statuses[$color->status] = ($statuses[$color->status] ?? 0) + 1;

                                            $colorStatus = match ($color->status) {
                                                'completed' => 'مكتمل',
                                                'in_progress' => 'قيد التصوير',
                                                default => 'جديد',
                                            };

                                            $tooltipContent .=
                                                "<tr>
                                                <td>" .
                                                ($color->name ?? '-') .
                                                "</td>
                                                <td>" .
                                                ($color->code ?? '-') .
                                                "</td>
                                                <td>" .
                                                $colorStatus .
                                                "</td>
                                            </tr>";
                                        }

                                        $tooltipContent .= '</tbody></table></div>';

                                        // منطق تحديد الحالة النهائية للمنتج
                                        $total = array_sum($statuses);
                                        if ($statuses['completed'] === $total) {
                                            $productStatus = 'completed';
                                        } elseif ($statuses['new'] === $total) {
                                            $productStatus = 'new';
                                        } elseif ($statuses['in_progress'] + $statuses['completed'] === $total) {
                                            $productStatus = 'in_progress';
                                        } elseif (
                                            $statuses['new'] > 0 &&
                                            ($statuses['in_progress'] > 0 || $statuses['completed'] > 0)
                                        ) {
                                            $productStatus = 'partial';
                                        } else {
                                            $productStatus = 'unknown';
                                        }

                                        $badgeClass = match ($productStatus) {
                                            'new' => 'bg-warning',
                                            'completed' => 'bg-success',
                                            'in_progress' => 'bg-info text-dark',
                                            'partial' => 'bg-secondary text-white',
                                            default => 'bg-dark',
                                        };

                                        $statusText = match ($productStatus) {
                                            'new' => 'جديد',
                                            'completed' => 'مكتمل',
                                            'in_progress' => 'قيد التصوير',
                                            'partial' => 'جزئي',
                                            default => 'غير معروف',
                                        };
                                    @endphp

                                    <span class="badge {{ $badgeClass }}" tabindex="0" data-bs-toggle="popover"
                                        data-bs-trigger="hover focus" data-bs-html="true"
                                        data-bs-content="{!! htmlentities($tooltipContent, ENT_QUOTES, 'UTF-8') !!}">
                                        {{ $statusText }}
                                    </span>
                                </td>


                                {{-- عدد الألوان --}}
                                <td>
                                    @php
                                        $colors = $product->shootingProductColors
                                            ->groupBy('color_code')
                                            ->map(function ($group) {
                                                $first = $group->first();
                                                return [
                                                    'color_code' => $first->color_code,
                                                    'color_name' => $first->name,
                                                ];
                                            });

                                        $colorTooltip =
                                            '<div class="table-responsive"><table class=\'table table-sm table-bordered mb-0\' style=\'font-size: 13px;\'><thead class=\'table-light\'><tr><th>الكود</th><th>اللون</th></tr></thead><tbody>';

                                        foreach ($colors as $color) {
                                            $colorTooltip .= "<tr><td>{$color['color_code']}</td><td>{$color['color_name']}</td></tr>";
                                        }

                                        $colorTooltip .= '</tbody></table></div>';
                                    @endphp

                                    <span class="badge bg-primary" tabindex="0" data-bs-toggle="popover"
                                        data-bs-trigger="hover focus" data-bs-html="true"
                                        data-bs-content="{!! htmlentities($colorTooltip, ENT_QUOTES, 'UTF-8') !!}">
                                        {{ $colors->count() }}
                                    </span>
                                </td>

                                <td>
                                    @php
                                        $sizes = $product->shootingProductColors
                                            ->groupBy('size_code')
                                            ->map(function ($group) {
                                                $first = $group->first();
                                                return [
                                                    'size_code' => $first->size_code,
                                                    'size_name' => $first->size_name,
                                                ];
                                            });

                                        $sizeTooltip =
                                            '<div class="table-responsive"><table class=\'table table-sm table-bordered mb-0\' style=\'font-size: 13px;\'><thead class=\'table-light\'><tr><th>الكود</th><th>الاسم</th></tr></thead><tbody>';

                                        foreach ($sizes as $size) {
                                            $sizeTooltip .= "<tr><td>{$size['size_code']}</td><td>{$size['size_name']}</td></tr>";
                                        }

                                        $sizeTooltip .= '</tbody></table></div>';
                                    @endphp

                                    <span class="badge bg-primary" tabindex="0" data-bs-toggle="popover"
                                        data-bs-trigger="hover focus" data-bs-html="true"
                                        data-bs-content="{!! htmlentities($sizeTooltip, ENT_QUOTES, 'UTF-8') !!}">
                                        {{ $sizes->count() }}
                                    </span>
                                </td>
                                {{-- عدد السيشنات --}}
                                <td>
                                    {{ $product->shootingProductColors->flatMap(fn($color) => $color->sessions ?? collect())->pluck('reference')->unique()->count() }}
                                </td>

                                {{-- السيشنات --}}
                                <td>
                                    @php
                                        $displayedSessions = [];
                                    @endphp

                                    @foreach ($product->shootingProductColors as $color)
                                        @foreach ($color->sessions as $session)
                                            @if (!in_array($session->reference, $displayedSessions))
                                                @php $displayedSessions[] = $session->reference; @endphp
                                                <a href="{{ route('shooting-sessions.show', $session->reference) }}"
                                                    class="session-link">
                                                    {{ $session->reference }}
                                                </a>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </td>

                                <td>
                                    @php
                                        $shownSessionStatuses = [];
                                    @endphp
                                    @foreach ($product->shootingProductColors as $color)
                                        @foreach ($color->sessions as $session)
                                            @if (!in_array($session->reference, $shownSessionStatuses))
                                                @php $shownSessionStatuses[] = $session->reference; @endphp
                                                <div
                                                    style="border: 1px solid #bce0fd; border-radius: 6px; padding: 4px; margin-bottom: 6px;">
                                                    @if ($session->status == 'completed')
                                                        <span>{{ __('messages.complete') }}</span>
                                                    @else
                                                        <span>{{ __('messages.new') }}</span>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </td>

                                {{-- @php
                                    $sessionsGrouped = [];
                                    foreach ($product->shootingProductColors as $color) {
                                        foreach ($color->sessions as $session) {
                                            $sessionsGrouped[$session->reference][] = $color;
                                        }
                                    }
                                @endphp

                                <td>
                                    @foreach ($sessionsGrouped as $ref => $colors)
                                        @php
                                            $session = $colors[0]->sessions->firstWhere('reference', $ref);
                                            $editSessions = $session?->editSessions ?? collect();
                                        @endphp
                                        <div
                                            style="border: 1px solid #bce0fd; border-radius: 6px; padding: 4px; margin-bottom: 6px;">
                                            @forelse ($editSessions as $edit)
                                                <div>
                                                    {{ optional(\App\Models\User::find($edit->user_id))->name ?? 'غير معروف' }}
                                                </div>
                                            @empty
                                                <div>{{ __('messages.N/A') }}</div>
                                            @endforelse
                                        </div>
                                    @endforeach
                                </td> --}}

                                <td>
                                    @foreach ($sessionsGrouped as $ref => $colors)
                                        @php
                                            $session = $colors[0]->sessions->firstWhere('reference', $ref);
                                            $editSessions = $session?->editSessions ?? collect();
                                        @endphp
                                        <div
                                            style="border: 1px solid #bce0fd; border-radius: 6px; padding: 4px; margin-bottom: 6px;">
                                            @forelse ($editSessions as $edit)
                                                @if ($edit->photo_drive_link)
                                                    <a href="{{ $edit->photo_drive_link }}" target="_blank"
                                                        class="text-success">
                                                        <i class="fa fa-image"></i>
                                                    </a>
                                                @else
                                                    <span>-</span>
                                                @endif
                                            @empty
                                                <span>{{ __('messages.N/A') }}</span>
                                            @endforelse
                                        </div>
                                    @endforeach
                                </td>

                                <td>
                                    @foreach ($sessionsGrouped as $ref => $colors)
                                        @php
                                            $session = $colors[0]->sessions->firstWhere('reference', $ref);
                                            $editSessions = $session?->editSessions ?? collect();
                                        @endphp
                                        <div
                                            style="border: 1px solid #bce0fd; border-radius: 6px; padding: 4px; margin-bottom: 6px;">
                                            @forelse ($editSessions as $edit)
                                                @if ($edit->drive_link)
                                                    <a href="{{ $edit->drive_link }}" target="_blank"
                                                        class="text-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @else
                                                    <span>-</span>
                                                @endif
                                            @empty
                                                <span>{{ __('messages.N/A') }}</span>
                                            @endforelse
                                        </div>
                                    @endforeach
                                </td>

                                <td>
                                    @foreach ($sessionsGrouped as $ref => $colors)
                                        @php
                                            $session = $colors[0]->sessions->firstWhere('reference', $ref);
                                            $editSessions = $session?->editSessions ?? collect();
                                        @endphp
                                        <div
                                            style="border: 1px solid #bce0fd; border-radius: 6px; padding: 4px; margin-bottom: 6px;">
                                            @forelse ($editSessions as $edit)
                                                <span
                                                    class="badge bg-{{ $edit->status === 'completed' ? 'success' : 'warning' }}">
                                                    {{ $edit->status }}
                                                </span>
                                            @empty
                                                <span class="badge bg-primary">{{ __('messages.new') }}</span>
                                            @endforelse
                                        </div>
                                    @endforeach
                                </td>



                                {{-- باقي الأعمدة داخل box منظم لكل session --}}
                                @php
                                    $sessionsGrouped = [];
                                    foreach ($product->shootingProductColors as $color) {
                                        foreach ($color->sessions as $session) {
                                            $sessionsGrouped[$session->reference][] = $color;
                                        }
                                    }
                                @endphp

                                {{-- @foreach (['type_of_shooting', 'location', 'date_of_shooting', 'photographer', 'date_of_delivery', 'time_left', 'shooting_method', 'date_of_editing', 'editor'] as $field) --}}

                                @foreach (['type_of_shooting', 'location', 'date_of_shooting', 'photographer', 'date_of_editing', 'editor'] as $field)
                                    <td>
                                        @foreach ($sessionsGrouped as $ref => $colors)
                                            @php
                                                $firstColor = $colors[0] ?? null;
                                            @endphp
                                            <div
                                                style="border: 1px solid #bce0fd; border-radius: 6px; padding: 4px; margin-bottom: 6px;">
                                                @switch($field)
                                                    @case('type_of_shooting')
                                                        <span class="d-block">{{ $firstColor?->type_of_shooting ?? '-' }}</span>
                                                    @break

                                                    @case('location')
                                                        <span class="d-block">{{ $firstColor?->location ?? '-' }}</span>
                                                    @break

                                                    @case('date_of_shooting')
                                                        <span class="d-block">{{ $firstColor?->date_of_shooting ?? '-' }}</span>
                                                    @break

                                                    @case('photographer')
                                                        @php $photographers = json_decode($firstColor?->photographer, true); @endphp
                                                        @if (is_array($photographers))
                                                            <span class="d-block">
                                                                @foreach ($photographers as $id)
                                                                    <span>{{ optional(\App\Models\User::find($id))->name }}</span>
                                                                @endforeach
                                                            </span>
                                                        @else
                                                            <span class="d-block">-</span>
                                                        @endif
                                                    @break

                                                    @case('date_of_editing')
                                                        <span class="d-block">{{ $firstColor?->date_of_editing ?? '-' }}</span>
                                                    @break

                                                    @case('editor')
                                                        @php
                                                            // نجيب صف المحرر لهذا المنتج داخل نفس الـ reference
                                                            // $ref جاي من اللوب الخارجي sessionsGrouped as $ref => $colors
                                                            $assigned = optional($product->productEditors)->firstWhere(
                                                                'reference',
                                                                $ref,
                                                            );
                                                            $editorName = optional($assigned?->user)->name;
                                                            $recv = $assigned?->receiving_date;
                                                            $st = $assigned?->status;
                                                        @endphp

                                                        @if ($editorName)
                                                            <span class="d-block">
                                                                <span class="badge bg-info">{{ $editorName }}</span>
                                                                @if ($recv)
                                                                    <span
                                                                        class="badge bg-secondary">{{ \Carbon\Carbon::parse($recv)->format('Y-m-d') }}</span>
                                                                @endif
                                                                @if ($st)
                                                                    <span
                                                                        class="badge bg-light text-dark">{{ $st }}</span>
                                                                @endif
                                                            </span>
                                                        @else
                                                            <span class="d-block">-</span>
                                                        @endif
                                                    @break

                                                    {{-- @case('date_of_delivery')
                                                        <span class="d-block">{{ $firstColor?->date_of_delivery ?? '-' }}</span>
                                                    @break --}}

                                                    {{-- @case('time_left')
                                                        @php
                                                            $date = $firstColor?->date_of_delivery
                                                                ? \Carbon\Carbon::parse($firstColor->date_of_delivery)
                                                                : null;
                                                            $remaining = $date
                                                                ? \Carbon\Carbon::now()->diffInDays($date, false)
                                                                : null;

                                                            // نجيب السيشنات ونشوف لو كلهم مكتملين
                                                            $sessionRefs = collect($colors)
                                                                ->flatMap(fn($c) => $c->sessions)
                                                                ->pluck('status');
                                                            $allSessionsCompleted =
                                                                $sessionRefs->count() > 0 &&
                                                                $sessionRefs->every(fn($s) => $s === 'completed');
                                                        @endphp

                                                        <span class="d-block">
                                                            @if ($allSessionsCompleted)
                                                                -
                                                            @elseif (is_null($date))
                                                                -
                                                            @elseif ($remaining > 0)
                                                                {{ $remaining }} {{ __('messages.day_remaining') }}
                                                            @elseif ($remaining == 0)
                                                                {{ __('messages.today') }}
                                                            @else
                                                                {{ __('messages.day_overdue') }} {{ abs($remaining) }}
                                                            @endif
                                                        </span>
                                                    @break

                                                    @case('shooting_method')
                                                        @if (!empty($firstColor?->shooting_method))
                                                            <a href="{{ $firstColor->shooting_method }}" target="_blank"
                                                                class="d-block text-success">
                                                                <i class="fe fe-link"></i>
                                                            </a>
                                                        @else
                                                            <span class="d-block">-</span>
                                                        @endif
                                                    @break --}}
                                                @endswitch
                                            </div>
                                        @endforeach
                                    </td>
                                @endforeach

                                @php
                                    $hasAllColorNames = $product->shootingProductColors->every(function ($color) {
                                        return !is_null($color->size_name) &&
                                            $color->size_name !== '' &&
                                            !is_null($color->weight) &&
                                            $color->weight !== '';
                                    });

                                @endphp

                                @if ($hasAllColorNames)
                                    <td>{{ __('messages.data_complete') }}</td>
                                @else
                                    <td>{{ __('messages.data_incomplete') }}</td>
                                @endif


                                <td>
                                    @if ($product->is_reviewed)
                                        <span class="badge bg-success">{{ __('messages.coded') }}</span>
                                    @else
                                        <input type="checkbox" class="form-check-input review-toggle"
                                            data-id="{{ $product->id }}">
                                    @endif
                                </td>

                                {{-- <td>
                                    @php
                                        // كل مراجع السيشن للمنتج
                                        $allSessions = $product->shootingProductColors->flatMap(
                                            fn($c) => $c->sessions ?? collect(),
                                        );
                                        $refs = $allSessions->pluck('reference')->unique()->values();

                                        // لو فيه EditSession على أي ref نعرض اسمه
                                        $editSessionsMap = \App\Models\EditSession::whereIn('reference', $refs)
                                            ->get()
                                            ->keyBy('reference');

                                        // payload للمودال (reference + editor name لو موجود)
                                        $payloadEditors = $refs
                                            ->map(function ($r) use ($editSessionsMap) {
                                                $es = $editSessionsMap->get($r);
                                                return [
                                                    'reference' => $r,
                                                    'editor_name' => optional(optional($es)->user)->name,
                                                    'has_editor' => (bool) optional($es)->user_id,
                                                    'date' => optional(optional($es)->receiving_date)->format('Y-m-d'),
                                                    'link' => optional($es)->drive_link, // <--- الجديد
                                                ];
                                            })
                                            ->values();

                                        $hasAnyEditor = $payloadEditors->contains(fn($i) => $i['has_editor']);
                                    @endphp

                                    
                                    @forelse ($payloadEditors as $it)
                                        <div class="d-flex align-items-center mb-1" style="gap:6px;">
                                            <span class="badge bg-light text-dark">{{ $it['reference'] }}</span>

                                            @if ($it['has_editor'])
                                                @if (!empty($it['link']))
                                                    <a href="{{ $it['link'] }}" target="_blank"
                                                        class="badge bg-success text-decoration-none">
                                                        <i class="fe fe-link-2"></i>
                                                        {{ __('messages.edit_link') }}
                                                    </a>
                                                @else
                                                    <span class="badge bg-success">
                                                        {{ $it['editor_name'] ?? __('messages.editor') }}
                                                    </span>
                                                @endif

                                                @if (!empty($it['date']))
                                                    <span class="badge bg-info">{{ $it['date'] }}</span>
                                                @endif
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </div>
                                    @empty
                                        <span class="text-muted">{{ __('messages.N/A') }}</span>
                                    @endforelse


                                    @if ($refs->isNotEmpty())
                                        <button type="button"
                                            class="btn btn-outline-primary btn-sm mt-1 open-product-assign-editor-modal"
                                            data-sessions='@json($payloadEditors)'>
                                            {{ $hasAnyEditor ? __('messages.edit') : __('messages.assign_editor') }}
                                        </button>
                                    @endif
                                </td>  --}}



                                <td>
                                    {{-- <a href="{{ route('shooting-products.complete.page', $product->id) }}"
                                        class="btn btn-warning">
                                        اكمال البيانات
                                    </a> --}}

                                    <!-- edit btn and delete form -->
                                    {{-- <a href="{{ route('shooting-products.edit', $product->id) }}"
                                            class="btn btn-secondary">
                                            تعديل
                                        </a> --}}
                                    <button class="btn btn-info mb-1" data-bs-toggle="modal"
                                        data-bs-target="#sizeWeightModal" data-id="{{ $product->id }}"
                                        data-size="{{ $product->shootingProductColors->first()?->size_name }}"
                                        data-weight="{{ $product->shootingProductColors->first()?->weight }}">
                                        @if (empty($product->shootingProductColors->first()?->size_name) &&
                                                empty($product->shootingProductColors->first()?->weight))
                                            {{ __('messages.add_weight_and_size') }}
                                        @else
                                            {{ __('messages.edit_weight_and_size') }}
                                        @endif
                                    </button>



                                    @if (auth()->user()->role->name == 'admin')
                                        <form action="{{ route('shooting-products.destroy', $product->id) }}"
                                            method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('{{ __('messages.are_you_sure') }}')">
                                                {{ __('messages.delete') }}
                                            </button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="sizeWeightModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('shooting-products.save-size-weight') }}" class="modal-content">
                @csrf
                <input type="hidden" name="product_id" id="sizeWeightProductId">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('messages.add_weight_and_size') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label>{{ __('messages.size') }}</label>
                    <textarea name="size_name" class="form-control mb-3" required></textarea>

                    <label>{{ __('messages.weight') }}</label>
                    <input type="text" name="weight" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ __('messages.save') }}</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Product Drive Link (at product level) -->
    {{-- <div class="modal fade" id="productSessionLinkModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('messages.add_product_drive_link') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="productSessionLinkForm">
                        @csrf
                        <input type="hidden" id="pslProductId">
                        <div class="mb-3">
                            <label class="form-label">{{ __('messages.sessions') }}</label>
                            <select id="pslRefSelect" class="form-control" required></select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('messages.drive_link') }}</label>
                            <input type="text" id="pslLinkInput" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}


    <!-- Product Assign Editor (at product level) -->
    <div class="modal fade" id="productAssignEditorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('edit-sessions.assign-from-shooting') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('messages.assign_editor') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.sessions') }}</label>
                        <select name="reference" id="paeRefSelect" class="form-control" required></select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.editor') }}</label>
                        <select name="user_id" class="form-select" required>
                            <option value="">{{ __('messages.assign_editor') }}</option>
                            @foreach (\App\Models\User::where('role_id', 7)->orderBy('name')->get() as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.receiving_date') }}</label>
                        <input type="date" name="receiving_date" id="paeDateInput" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                </div>
            </form>
        </div>
    </div>



    <style>
        .session-link {
            display: block;
            border: 1px solid #bce0fd;
            border-radius: 6px;
            padding: 4px;
            margin-bottom: 6px;
            text-decoration: none;
            color: #000;
            transition: 0.3s ease;
        }

        .session-link:hover {
            background-color: #bce0fd;
            color: white;
        }
    </style>
@endsection

@section('scripts')
    <!-- SELECT2 JS -->
    <script src="{{ asset('build/assets/plugins/select2/select2.full.min.js') }}"></script>
    @vite('resources/assets/js/select2.js')

    <!-- DATA TABLE JS -->
    <script src="{{ asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    @vite('resources/assets/js/table-data.js')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            popoverTriggerList.forEach(function(popoverTriggerEl) {
                new bootstrap.Popover(popoverTriggerEl, {
                    html: true,
                    sanitize: false, // ضروري عشان HTML زي الجدول يشتغل
                    trigger: 'hover focus'
                });
            });
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let step = 1;
            let selectedType = "";

            // Initialize Tom Select
            $(".tom-select").each(function() {
                new TomSelect(this, {
                    plugins: ["remove_button"]
                });
            });

            $(".start-shooting").on("click", function() {
                $("#product_id").val($(this).data("id"));
                $("#shootingModal").modal("show");
            });

            $(".shooting-type").on("change", function() {
                $(".next-btn").prop("disabled", false);
                selectedType = $("input[name='type_of_shooting']:checked").val();
            });

            $(".next-btn").on("click", function() {
                if ($(this).text() === "{{ __('messages.save') }}") {
                    submitForm(); // Call function to submit form only on "حفظ"
                    return;
                }

                if (!validateStep()) {
                    alert("{{ __('messages.please_fill_all_required_fields') }}");
                    return;
                }

                $(".step").addClass("d-none");

                if (step === 1) {
                    if (selectedType === "تصوير منتج" || selectedType === "تصوير موديل") {
                        $(".step-2").removeClass("d-none");
                    } else {
                        $(".step-4").removeClass("d-none");
                        $(".next-btn").text("حفظ");
                    }
                } else if (step === 2) {
                    $(".step-3").removeClass("d-none");
                    $(".next-btn").text("حفظ");
                }

                step++;
                $(".prev-btn").prop("disabled", false);
            });

            $(".prev-btn").on("click", function() {
                clearInputs(step);

                step--;
                $(".step").addClass("d-none");

                if (step === 1) {
                    $(".step-1").removeClass("d-none");
                    $(".next-btn").text("التالي");
                } else if (step === 2) {
                    $(".step-2").removeClass("d-none");
                    $(".next-btn").text("التالي");
                } else if (step === 3) {
                    $(".step-3").removeClass("d-none");
                    $(".next-btn").text("حفظ");
                }

                if (step === 1) $(".prev-btn").prop("disabled", true);
            });

            function submitForm() {
                let formData = $("#shootingForm").serializeArray(); // Converts to array format

                let dateOfDelivery = selectedType === "تعديل لون" ?
                    $("input[name='date_of_delivery_editing']").val() :
                    $("input[name='date_of_delivery_shooting']").val();

                if (!dateOfDelivery) {
                    alert("{{ __('messages.please_select_date_of_delivery') }}");
                    return;
                }


                // Ensure date_of_delivery is included
                formData.push({
                    name: "date_of_delivery",
                    value: dateOfDelivery
                });


                $.ajax({
                    url: "{{ route('shooting-products.start') }}",
                    type: "POST",
                    data: formData, // No need for $.param()
                    success: function(response) {
                        alert(response.message);
                        $("#shootingModal").modal("hide");
                        location.reload();
                    },
                    error: function(xhr) {
                        alert("{{ __('messages.something_went_wrong') }}");
                        console.error(xhr.responseText);
                    }
                });
            }


            function validateStep() {
                let valid = true;

                // فقط تحقق من الحقول الظاهرة حاليًا
                $(".step:visible .required-input").each(function() {
                    if (!$(this).val()) {
                        valid = false;
                    }
                });

                return valid;
            }


            function clearInputs(currentStep) {
                $(".step-" + currentStep + " input, .step-" + currentStep + " select").val("").trigger("change");
            }
        });
    </script>



    <script>
        $('#checkAll').on('change', function() {
            const isChecked = $(this).is(':checked');

            // حدد فقط العناصر الظاهرة حاليًا في الصفحة
            $('#file-datatable')
                .find('tbody tr:visible input[name="selected_products[]"]')
                .prop('checked', isChecked);

            toggleStartButton(); // حدث زر بدء التصوير
        });

        $('input[name="selected_products[]"]').on('change', function() {
            toggleStartButton();
        });

        function toggleStartButton() {
            const selected = $('input[name="selected_products[]"]:checked').length;
            if (selected > 0) {
                $('#startShootingContainer').show();
            } else {
                $('#startShootingContainer').hide();
            }

            let selectedProducts = [];
            $('input[name="selected_products[]"]:checked').each(function() {
                selectedProducts.push($(this).val());
            });
            $('#selectedProducts').val(selectedProducts.join(','));
        }
    </script>

    <script>
        $(document).on('change', '.review-toggle', function() {
            const checkbox = $(this);
            const productId = checkbox.data('id');

            if (!confirm('{{ __('messages.are_you_sure_you_want_to_review') }}')) {
                checkbox.prop('checked', false);
                return;
            }

            $.ajax({
                url: "{{ route('shooting-products.review') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: productId,
                },
                success: function(response) {
                    if (response.success) {
                        checkbox.prop('checked', true).attr('disabled', true);
                        alert('{{ __('messages.reviewed_successfully') }}');
                        location.reload();
                    } else {
                        alert('{{ __('messages.something_went_wrong') }}');
                        checkbox.prop('checked', false);
                    }
                },
                error: function() {
                    alert('{{ __('messages.something_went_wrong') }}');
                    checkbox.prop('checked', false);
                }
            });
        });
    </script>

    <script>
        const sizeWeightModal = document.getElementById('sizeWeightModal');
        sizeWeightModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            document.getElementById('sizeWeightProductId').value = button.getAttribute('data-id');

            // تعبئة الحقول
            const size = button.getAttribute('data-size') || '';
            const weight = button.getAttribute('data-weight') || '';
            document.querySelector('textarea[name="size_name"]').value = size;
            document.querySelector('input[name="weight"]').value = weight;
        });
    </script>

    <script>
        (function() {
            const modalEl = document.getElementById('productSessionLinkModal');
            const productIdInput = document.getElementById('pslProductId');
            const refSelect = document.getElementById('pslRefSelect');
            const linkInput = document.getElementById('pslLinkInput');
            let currentSessions = []; // [{reference, drive_link}]

            // افتح المودال واملأ المراجع + اللينكات
            $(document).on('click', '.open-product-session-link-modal', function() {
                const pid = $(this).data('product-id');
                const sessions = $(this).data('sessions') || [];
                currentSessions = sessions;

                productIdInput.value = pid;
                refSelect.innerHTML = '';
                sessions.forEach(s => {
                    const opt = document.createElement('option');
                    opt.value = s.reference;
                    opt.textContent = s.reference + (s.drive_link ? ' (has link)' : '');
                    refSelect.appendChild(opt);
                });

                // اختَر أول مرجع واملأ اللينك لو موجود
                if (sessions.length) {
                    linkInput.value = sessions[0].drive_link || '';
                } else {
                    linkInput.value = '';
                }

                modalEl.querySelector('.modal-title').textContent =
                    sessions.some(s => s.drive_link) ?
                    "{{ __('messages.edit_product_drive_link') }}" :
                    "{{ __('messages.add_product_drive_link') }}";

                new bootstrap.Modal(modalEl).show();
            });

            // لما يغيّر الـ reference
            refSelect.addEventListener('change', function() {
                const selected = currentSessions.find(s => s.reference === this.value);
                linkInput.value = selected && selected.drive_link ? selected.drive_link : '';
            });

            // حفظ
            $('#productSessionLinkForm').on('submit', function(e) {
                e.preventDefault();

                $.post("{{ route('shooting-products.productDriveLink.save') }}", {
                    _token: '{{ csrf_token() }}',
                    product_id: productIdInput.value,
                    reference: refSelect.value,
                    drive_link: linkInput.value.trim()
                }).done(function(resp) {
                    alert(resp.message || 'Saved');
                    bootstrap.Modal.getInstance(modalEl).hide();
                    location.reload();
                }).fail(function() {
                    alert("{{ __('messages.something_went_wrong') }}");
                });
            });
        })();
    </script>
    <script>
        (function() {
            const modalEl = document.getElementById('productAssignEditorModal');
            const refSelect = document.getElementById('paeRefSelect');
            const dateInput = document.getElementById('paeDateInput');
            let current = []; // [{reference, editor_name?, has_editor?, date?}]

            // افتح المودال واملأ الريفرنسات + التاريخ الافتراضي لو موجود
            $(document).on('click', '.open-product-assign-editor-modal', function() {
                current = $(this).data('sessions') || [];

                refSelect.innerHTML = '';
                current.forEach(s => {
                    const opt = document.createElement('option');
                    opt.value = s.reference;
                    opt.textContent = s.reference + (s.has_editor ? ` ({{ __('messages.editor') }})` :
                        '');
                    refSelect.appendChild(opt);
                });

                // Default: اختار أول ref واملأ التاريخ لو موجود
                if (current.length) {
                    const first = current[0];
                    dateInput.value = first.date || '';
                } else {
                    dateInput.value = '';
                }

                // غيّر التاريخ حسب الـ ref المختار
                refSelect.addEventListener('change', function() {
                    const pick = current.find(s => s.reference === this.value);
                    dateInput.value = pick && pick.date ? pick.date : '';
                }, {
                    once: true
                });

                new bootstrap.Modal(modalEl).show();
            });
        })();
    </script>
@endsection
