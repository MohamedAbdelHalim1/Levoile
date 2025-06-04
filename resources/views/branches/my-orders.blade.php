@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <h4 class="mb-4">{{ __('messages.my_orders') }}</h4>

            @if (isset($orders) && $orders->isEmpty())
                <div class="alert alert-info text-center">
                    @if(auth()->user()->current_lang == 'ar')لا توجد طلبات حتى الآن.@else No Orders yet. @endif
                </div>
            @else
                <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>{{ __('messages.status') }}</th>
                                <th>{{ __('messages.order_date') }}</th>
                                <th>{{ __('messages.number_of_products') }}</th>
                                <th>{{ __('messages.quantity') }}</th>
                                <th>{{ __('messages.operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td><span class="badge bg-success">{{ $order->status }}</span></td>
                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $order->items->count() }}</td>
                                    <td>{{ $order->items->sum('requested_quantity') }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detailsModal{{ $order->id }}">{{ __('messages.view') }}</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="detailsModal{{ $order->id }}" tabindex="-1"
                                            aria-labelledby="modalLabel{{ $order->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">@if(auth()->user()->current_lang == 'ar')تفاصيل الطلب رقم@else Order Details @endif #{{ $order->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th>{{ __('messages.images') }}</th>
                                                                    <th>{{ __('messages.code') }}</th>
                                                                    <th>{{ __('messages.description') }}</th>
                                                                    <th>{{ __('messages.required_quantity') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($order->items as $item)
                                                                    <tr>
                                                                        <td>
                                                                            <img src="{{ $item->product->image_url ?? asset('assets/images/comming.png') }}"
                                                                                alt="@if(auth()->user()->current_lang == 'ar')صورة المنتج@else Product Image @endif"
                                                                                style="width: 60px; height: 60px; object-fit: contain;">
                                                                        </td>
                                                                        <td>{{ $item->product->product_code ?? '-' }}</td>
                                                                        <td>{{ $item->product->description ?? '-' }}</td>
                                                                        <td>{{ $item->requested_quantity }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
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

