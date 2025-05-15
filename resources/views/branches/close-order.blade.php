@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h4 class="mb-4">ملخص الطلب رقم #{{ $order->id }}</h4>

        <form method="POST" action="{{ route('branch.orders.close.with.note') }}">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">

            <table class="table table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>صورة المنتج</th>
                        <th>كود المنتج</th>
                        <th>الوصف</th>
                        <th>الكمية المطلوبة</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($order->items as $item)
                        <tr>
                            <td><img src="{{ $item->product->image_url ?? asset('assets/images/comming.png') }}" style="width: 100px; height: 100px; object-fit: contain;"></td>
                            <td>{{ $item->product->product_code ?? '-' }}</td>
                            <td>{{ $item->product->description ?? '-' }}</td>
                            <td>{{ $item->requested_quantity }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">لا توجد منتجات مضافة في هذا الطلب</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mb-3 mt-4">
                <label for="notes" class="form-label">ملاحظات</label>
                <textarea name="notes" id="notes" class="form-control" rows="3" placeholder="أدخل ملاحظاتك هنا..."></textarea>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">تأكيد وإغلاق الطلب</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary ms-2">رجوع</a>
            </div>
        </form>
    </div>
@endsection
