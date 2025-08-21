@extends('layouts.app')

@section('content')

    <style>
        /* شريط لوني على يسار كل طلب حسب الحالة */
        .req-row {
            border-left: 8px solid transparent;
        }

        .req-row.status-open {
            border-left-color: var(--bs-secondary);
        }

        .req-row.status-partial {
            border-left-color: var(--bs-warning);
        }

        .req-row.status-complete {
            border-left-color: var(--bs-success);
        }

        .req-row.status-cancelled {
            border-left-color: var(--bs-dark);
        }

        /* فاصل “روّش” بين الطلبات */
        .req-sep {
            height: 12px;
            border-radius: .5rem;
            background: repeating-linear-gradient(90deg,
                    #f8f9fa 0, #f8f9fa 10px,
                    #ffffff 10px, #ffffff 20px);
        }
    </style>

    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-4">طلباتي</h4>

                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>الخامة</th>
                                <th>عدد البنود</th>
                                <th>الحالة</th>
                                <th>التاريخ</th>
                                <th>عمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($requests as $i => $req)
                                @php
                                    $badge =
                                        [
                                            'open' => 'secondary',
                                            'partial' => 'warning text-dark',
                                            'complete' => 'success',
                                            'cancelled' => 'dark',
                                        ][$req->status] ?? 'secondary';
                                @endphp

                                <!-- صف الطلب الرئيسي مع الشريط اللوني -->
                                <tr class="req-row status-{{ $req->status }} align-middle">
                                    <td>{{ $requests->firstItem() + $i }}</td>
                                    <td>{{ $req->material->name }}</td>
                                    <td>{{ $req->items->count() }}</td>
                                    <td><span class="badge bg-{{ $badge }}">{{ $req->status }}</span></td>

                                    <!-- تاريخ بأسلوب diffForHumans + tooltip للتاريخ الكامل -->
                                    <td>
                                        <span
                                            title="{{ optional($req->requested_at ?? $req->created_at)->format('Y-m-d H:i') }}">
                                            {{ optional($req->requested_at ?? $req->created_at)->diffForHumans() }}
                                        </span>
                                    </td>

                                    <td>
                                        <a href="{{ route('requests.receive.form', $req->id) }}"
                                            class="btn btn-sm btn-primary">استلام</a>
                                    </td>
                                </tr>

                                @if ($req->items->count())
                                    <tr>
                                        <td></td>
                                        <td colspan="5" class="p-0">
                                            <table class="table table-sm table-bordered mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>اللون</th>
                                                        <th>الكود</th>
                                                        <th>المطلوب</th>
                                                        <th>تم استلامه</th>
                                                        <th>المتبقي</th>
                                                        <th>حالة البند</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($req->items as $it)
                                                        @php
                                                            $received = $it->receiptItems->sum('quantity');
                                                            $remaining = max(
                                                                ($it->required_quantity ?? 0) - $received,
                                                                0,
                                                            );
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $it->color->name }}</td>
                                                            <td>{{ $it->color->code ?? '-' }}</td>
                                                            <td>{{ $it->required_quantity }} {{ $it->unit }}</td>
                                                            <td>{{ $received ?: 0 }} {{ $it->unit }}</td>
                                                            <td>{{ $remaining }} {{ $it->unit }}</td>
                                                            <td><span class="badge bg-secondary">{{ $it->status }}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                @endif

                                <!-- فاصل روّش بين الطلبات -->
                                <tr class="table-borderless">
                                    <td colspan="6" class="py-2">
                                        <div class="req-sep"></div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">لا توجد طلبات</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                {{ $requests->links() }}
            </div>
        </div>
    </div>
@endsection
