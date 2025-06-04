@extends('layouts.app')

@section('content')
    <div class="p-4">
        <div class="max-w-7xl mx-auto space-y-6">
            <h4 class="mb-4">{{ __('messages.order_details') }} #{{ $order->id }}</h4>

            <button class="btn btn-primary mb-3" id="download-preparation-sheet" data-order="{{ $order->id }}">
                {{ __('messages.download_preparation_sheet') }}
            </button>

            <div class="table-responsive bg-white shadow sm:rounded-lg p-4">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>{{ __('messages.image') }}</th>
                            <th>{{ __('messages.code') }}</th>
                            <th>{{ __('messages.sku') }}</th>
                            <th>{{ __('messages.description') }}</th>
                            <th>{{ __('messages.quantity') }}</th>
                            <th>{{ __('messages.received_quantity') }}</th>
                            <th>{{ __('messages.remaining_quantity') }}</th>
                            <th>{{ __('messages.receiving_status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td>
                                    <img src="{{ $item->product->image_url ?? asset('assets/images/comming.png') }}"
                                        alt="@if(auth()->user()->current_lang == 'ar')صورة المنتج@else Product Image @endif" onclick="openImage('{{ $item->product->image_url ?? asset('assets/images/comming.png') }}')" style="width: 60px; height: 60px; object-fit: contain;">
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
                                        $status = $item->receiving_status ?? '@if(auth()->user()->current_lang == "ar")لم يتم الاستلام بعد @else Not Received yet @endif';
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
                    <h5>{{ __('messages.mismatched_codes') }}</h5>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>{{ __('messages.sku') }}</th>
                                <th>{{ __('messages.quantity') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unmatchedItems as $unmatched)
                                <tr>
                                    <td>{{ $unmatched->no_code }}</td>
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


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script>
    document.getElementById('download-preparation-sheet')?.addEventListener('click', () => {
        const rows = Array.from(document.querySelectorAll('.table tbody tr'));
        const data = [["No Code", "Quantity"]];

        rows.forEach(row => {
            const noCode = row.cells[2]?.textContent.trim(); // الكود الرئيسي
            const quantity = row.cells[4]?.textContent.trim(); // الكمية
            if (noCode && quantity) {
                data.push([noCode, quantity]);
            }
        });

        const worksheet = XLSX.utils.aoa_to_sheet(data);
        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, "PreparationSheet");

        const orderId = document.getElementById('download-preparation-sheet').dataset.order;
        XLSX.writeFile(workbook, `order_${orderId}_prepare_sheet.xlsx`);
    });
</script>
@endsection
