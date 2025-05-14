@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <h4 class="mb-4">جميع الطلبات للمستخدمين</h4>

            @if ($orders->isEmpty())
                <div class="alert alert-info text-center">
                    لا توجد طلبات حتى الآن.
                </div>
            @else
                <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>المستخدم</th>
                                <th>الحالة</th>
                                <th>تاريخ الأوردر</th>
                                <th>عدد المنتجات</th>
                                <th>الكمية</th>
                                <th>الإجراءات</th>
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
                                    <td>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detailsModal{{ $order->id }}">عرض</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="detailsModal{{ $order->id }}" tabindex="-1"
                                            aria-labelledby="modalLabel{{ $order->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">تفاصيل الطلب رقم #{{ $order->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th>الصورة</th>
                                                                    <th>كود المنتج</th>
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
                                        </div>

                                        <!-- زرار التحضير الجديد -->
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#prepareModal{{ $order->id }}">تحضير</button>

                                        <!-- مودال التحضير -->
                                        <div class="modal fade" id="prepareModal{{ $order->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <form action="{{ route('branch.orders.prepare', $order->id) }}"
                                                    method="POST" enctype="multipart/form-data" class="modal-content">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">رفع ملف التحضير للطلب رقم
                                                            #{{ $order->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="إغلاق"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="file" name="excel_file" accept=".xlsx,.xls"
                                                            class="form-control" required>
                                                        <p class="mt-2 text-muted">الملف يجب أن يحتوي على عمودين: no_code و
                                                            الكمية</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">رفع وتحضير</button>
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
