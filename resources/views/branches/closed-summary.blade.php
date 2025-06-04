@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <h4 class="mb-4 text-center text-success">@if(auth()->user()->current_lang == 'ar')ملخص الطلب المغلق @else Closed Order Summary @endif</h4>


            <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">


                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>{{ __('messages.images') }}</th>
                            <th>{{ __('messages.code') }}</th>
                            <th>{{ __('messages.description') }}</th>
                            <th>{{ __('messages.required_quantity') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td><img src="{{ $item->product->image_url ?? asset('assets/images/comming.png') }}"
                                        width="60"></td>
                                <td>{{ $item->product->product_code ?? '-' }}</td>
                                <td>{{ $item->product->description ?? '-' }}</td>
                                <td>{{ $item->requested_quantity }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">@if(auth()->user()->current_lang == 'ar')لا توجد منتجات في هذا الطلب @else There are no products in this order @endif</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
