@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <h4 class="mb-4">جميع الطلبات الخاصة بك</h4>

        @if($orders->isEmpty())
            <div class="alert alert-info text-center">
                لا توجد طلبات حتى الآن.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>كود المنتج</th>
                            <th>الكمية المطلوبة</th>
                            <th>تاريخ الطلب</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->product_code }}</td>
                                <td>{{ $order->requested_quantity }}</td>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
