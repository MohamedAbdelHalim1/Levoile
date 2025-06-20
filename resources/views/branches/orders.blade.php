@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <h4 class="mb-4">{{ __('messages.all_orders') }}</h4>

            @if ($orders->isEmpty())
                <div class="alert alert-info text-center">
                    @if(auth()->user()->current_lang == 'ar')لا توجد طلبات حتى الآن.@else No Orders yet. @endif
                </div>
            @else
                <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>{{ __('messages.user') }}</th>
                                <th>{{ __('messages.status') }}</th>
                                <th>{{ __('messages.order_date') }}</th>
                                <th>{{ __('messages.number_of_products') }}</th>
                                <th>{{ __('messages.quantity') }}</th>
                                <th>{{ __('messages.notes') }}</th>
                                <th>{{ __('messages.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name ?? '-' }}</td>
                                    <td><span class="badge bg-success">{{ $order->status }}</span></td>
                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $order->items->count() }}</td>
                                    <td>{{ $order->items->sum('requested_quantity') }}</td>
                                    <td>{{ $order->notes ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('branch.orders.show', $order->id) }}" class="btn btn-info btn-sm">{{ __('messages.view') }}</a>


                                        <!-- Modal -->
                                        {{-- <div class="modal fade" id="detailsModal{{ $order->id }}" tabindex="-1"
                                            aria-labelledby="modalLabel{{ $order->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">تفاصيل الطلب رقم #{{ $order->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <button class="btn btn-primary mb-3 download-sheet"
                                                            data-order="{{ $order->id }}">تحميل شيت التحضير</button>

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
                                                                        @if ($item->delivered_quantity != 0)
                                                                            <td>{{ $item->requested_quantity - $item->delivered_quantity }}
                                                                            </td>
                                                                        @else
                                                                            <td>-</td>
                                                                        @endif
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div> --}}

                                        <!-- زرار التحضير الجديد -->
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#prepareModal{{ $order->id }}">{{ __('messages.prepare') }}</button>

                                        <!-- مودال التحضير -->
                                        <div class="modal fade" id="prepareModal{{ $order->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <form action="{{ route('branch.orders.prepare', $order->id) }}"
                                                    method="POST" enctype="multipart/form-data" class="modal-content">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">@if(auth()->user()->current_lang == 'ar')رفع ملف التحضير للطلب رقم @else Upload prepare sheet for order @endif
                                                            #{{ $order->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="{{ __('messages.close') }}"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="file" name="excel_file" accept=".xlsx,.xls"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">{{ __('messages.upload') }}</button>
                                                    </div>
                                                </form>
                                            </div>
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
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script>
    document.querySelectorAll('.download-sheet').forEach(button => {
        button.addEventListener('click', () => {
            const orderId = button.dataset.order;
            const rows = Array.from(document.querySelectorAll(`#detailsModal${orderId} table tbody tr`));
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

            XLSX.writeFile(workbook, `order_${orderId}_prepare_sheet.xlsx`);
        });
    });
</script>


@endsection