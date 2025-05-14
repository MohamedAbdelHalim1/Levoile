@extends('layouts.app')

@section('content')
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
                                                alt="صورة المنتج" style="width: 100px; height: 100px; object-fit: contain;">
                                        </td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->product->product_code }}</td>
                                        <td>{{ $order->product->description }}</td>
                                        <td>{{ $order->product->website_description }}</td>
                                        <td>{{ $order->product->gomla }}</td>
                                        <td>{{ $order->product->color }}</td>
                                        <td>{{ $order->product->size }}</td>
                                        <td>{{ $order->product->unit_price }}</td>
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
