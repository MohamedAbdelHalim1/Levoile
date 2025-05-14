@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <h4 class="mb-4">جميع الطلبات الخاصة بك</h4>

            @if (isset($orders) && $orders->isEmpty())
                <div class="alert alert-info text-center">
                    لا توجد طلبات حتى الآن.
                </div>
            @else
                <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
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

@section('scripts')
    <!-- SELECT2 JS -->
    <script src="{{ asset('build/assets/plugins/select2/select2.full.min.js') }}"></script>
    @vite('resources/assets/js/select2.js')

    <!-- DATA TABLE JS -->
    <script src="{{ asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    @vite('resources/assets/js/table-data.js')
@endsection
