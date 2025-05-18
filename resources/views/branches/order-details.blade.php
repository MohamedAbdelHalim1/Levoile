@extends('layouts.app')

@section('content')
<div class="p-4">
    <div class="max-w-7xl mx-auto space-y-6">
        <h4 class="mb-4">تفاصيل الطلب رقم #{{ $order->id }}</h4>

        <div class="table-responsive bg-white shadow sm:rounded-lg p-4">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>كود المنتج</th>
                        <th>الكود الرئيسي</th>
                        <th>الوصف</th>
                        <th>الكمية</th>
                        <th>الكمية المستلمة</th>
                        <th>الكمية المتبقية</th>
                        <th>حالة الاستلام</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>
                                <img src="{{ $item->product->image_url ?? asset('assets/images/comming.png') }}"
                                    alt="صورة المنتج"
                                    style="width: 60px; height: 60px; object-fit: contain;">
                            </td>
                            <td>{{ $item->product->product_code ?? '-' }}</td>
                            <td>{{ $item->product->no_code ?? '-' }}</td>
                            <td>{{ $item->product->description ?? '-' }}</td>
                            <td>{{ $item->requested_quantity }}</td>
                            <td>{{ $item->delivered_quantity }}</td>
                            <td>
                                @if ($item->delivered_quantity != 0)
                                    {{ $item->requested_quantity - $item->delivered_quantity }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @php
                                    $status = $item->receiving_status ?? 'لم يتم الاستلام بعد';
                                @endphp
                                <span class="badge bg-secondary">{{ $status }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($unmatchedItems->isNotEmpty())
            <div class="mt-5">
                <h5>الأكواد غير المطابقة</h5>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>الكود</th>
                            <th>الكمية</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unmatchedItems as $unmatched)
                            <tr>
                                <td>{{ $unmatched->code }}</td>
                                <td>{{ $unmatched->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
