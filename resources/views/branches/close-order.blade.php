@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <h4 class="mb-4"> {{ __('messages.order_summary') }} #{{ $order->id }}</h4>




            <form method="POST" action="{{ route('branch.orders.close.with.note') }}">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">

                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead class="table-light">
                        <tr>
                            <th>{{ __('messages.images') }}</th>
                            <th>{{ __('messages.code') }}</th>
                            <th>{{ __('messages.sku') }}</th>
                            <th>{{ __('messages.description') }}</th>
                            <th>{{ __('messages.required_quantity') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($order->items as $item)
                            <tr>
                                <td><img src="{{ $item->product->image_url ?? asset('assets/images/comming.png') }}"
                                        style="width: 100px; height: 100px; object-fit: contain;"></td>
                                <td>{{ $item->product->product_code ?? '-' }}</td>
                                <td>{{ $item->product->no_code ?? '-' }}</td>
                                <td>{{ $item->product->description ?? '-' }}</td>
                                <td>{{ $item->requested_quantity }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted"> @if(auth()->user()->current_lang == 'ar') لا توجد منتجات مضافة في هذا الطلب @else There are no products added to this order @endif</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mb-3 mt-4">
                    <label for="notes" class="form-label">{{ __('messages.notes') }}</label>
                    <textarea name="notes" id="notes" class="form-control" rows="3" placeholder="@if(auth()->user()->current_lang == 'ar') اضافة ملاحظات @else Add notes @endif"></textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">@if(auth()->user()->current_lang == 'ar')تأكيد وإغلاق الطلب @else Confirm & Close Order @endif</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary ms-2">{{ __('messages.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
