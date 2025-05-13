@extends('layouts.app')

@section('content')
    @if (auth()->user()->role_id == 1)
        <div class="p-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif
                <h4 class="mb-4">جميع الطلبات </h4>

                @if (isset($orders) && $orders->isEmpty())
                    <div class="alert alert-info text-center">
                        لا توجد طلبات حتى الآن.
                    </div>
                @else
                    <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead class="table-light">
                                <tr>
                                    <th>الصورة</th>
                                    <th>المستخدم</th>
                                    <th>كود المنتج</th>
                                    <th>الوصف</th>
                                    <th>الوصف للموقع</th>
                                    <th>اسم الجملة</th>
                                    <th>اللون</th>
                                    <th>المقاس</th>
                                    <th>سعر الوحدة</th>
                                    <th>الكمية المطلوبة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            <img src="{{ $order->image_url ?? asset('assets/images/comming.png') }}"
                                                alt="صورة المنتج" style="width: 70px; height: 70px; object-fit: contain;">
                                        </td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->product_code }}</td>
                                        <td>{{ $order->description }}</td>
                                        <td>{{ $order->website_description }}</td>
                                        <td>{{ $order->gomla }}</td>
                                        <td>{{ $order->color }}</td>
                                        <td>{{ $order->size }}</td>
                                        <td>{{ $order->material ?? 'لا يوجد' }}</td>
                                        <td>{{ $order->item_family_code }}</td>
                                        <td>{{ $order->season_code }}</td>
                                        <td>{{ $order->unit_price }}</td>
                                        <td>{{ $order->requested_quantity }}</td>
                                        <td>{{ $order->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="p-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif
                <h4 class="mb-4">جميع الطلبات الخاصة بك</h4>

                @if ($orders->isEmpty())
                    <div class="alert alert-info text-center">
                        لا توجد طلبات حتى الآن.
                    </div>
                @else
                    <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead class="table-light">
                                <tr>
                                    <th>تاريخ الاوردر</th>
                                    <th>عدد المنتجات</th>
                                    <th>الكميه</th>
                                    <th>الاجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groupedOrders as $order)
                                    <td>{{ $order->date }}</td>
                                    <td>{{ $order->product_count }}</td>
                                    <td>{{ $order->total_quantity }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detailsModal{{ $order->open_order_id }}">
                                            عرض
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="detailsModal{{ $order->open_order_id }}" tabindex="-1"
                                            aria-labelledby="modalLabel{{ $order->open_order_id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">تفاصيل الطلب رقم
                                                            #{{ $order->open_order_id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th>كود المنتج</th>
                                                                    <th>الوصف</th>
                                                                    <th>الكمية</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($detailedOrders[$order->open_order_id] as $item)
                                                                    <tr>
                                                                        <td>{{ $item->product_code }}</td>
                                                                        <td>{{ $item->description }}</td>
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
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                @endif
            </div>
        </div>
    @endif

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
