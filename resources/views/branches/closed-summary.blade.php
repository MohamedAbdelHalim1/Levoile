@extends('layouts.app')

@section('content')
    <div class="p-4">
        <h4 class="mb-4 text-center text-success">ملخص الطلب المغلق</h4>

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
                @forelse ($items as $item)
                    <tr>
                        <td><img src="{{ $item->product->image_url ?? asset('assets/images/comming.png') }}" width="60"></td>
                        <td>{{ $item->product->product_code ?? '-' }}</td>
                        <td>{{ $item->product->description ?? '-' }}</td>
                        <td>{{ $item->requested_quantity }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">لا توجد منتجات في هذا الطلب</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
