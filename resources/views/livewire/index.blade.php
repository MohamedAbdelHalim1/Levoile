@extends('layouts.app')

@section('styles')
@endsection

@section('content')

    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <ol class="breadcrumb mb-sm-0 mb-3">
            <li class="breadcrumb-item"><a href="{{url('index')}}">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">لوحة التحكم</li>
        </ol>
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="p-4">
        <!-- Date Range Filter -->
        <form method="GET" action="{{ route('dashboard.index') }}" class="row mb-4">
            <div class="col-md-4">
                <label>من تاريخ</label>
                <input type="date" class="form-control" name="startDate" value="{{ request('startDate') }}">
            </div>
            <div class="col-md-4">
                <label>إلى تاريخ</label>
                <input type="date" class="form-control" name="endDate" value="{{ request('endDate') }}">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary me-2">بحث</button>
                <a href="{{ route('dashboard.index') }}" class="btn btn-success">إلغاء</a>
            </div>
        </form>

        <!-- Section Title -->
        <h4 class="mt-4 mb-3 text-primary fw-bold">البيانات الأساسية</h4>

        <!-- First Row: Model Counts -->
        <div class="row">
            @php
                $models = [
                    ['name' => 'المواسم', 'count' => $seasons, 'route' => 'seasons.index', 'icon' => 'fe-calendar text-primary'],
                    ['name' => 'الألوان', 'count' => $colors, 'route' => 'colors.index', 'icon' => 'fe-droplet text-info'],
                    ['name' => 'المصانع', 'count' => $factories, 'route' => 'factories.index', 'icon' => 'fe-home text-success'],
                    ['name' => 'الأقسام', 'count' => $categories, 'route' => 'categories.index', 'icon' => 'fe-grid text-warning'],
                    ['name' => 'المنتجات', 'count' => $products, 'route' => 'products.index', 'icon' => 'fe-box text-danger'],
                    ['name' => 'الخامات', 'count' => $materials, 'route' => 'materials.index', 'icon' => 'fe-layers text-secondary'],
                ];
            @endphp

            @foreach ($models as $model)
                <div class="col-md-2">
                    <a href="{{ route($model['route']) }}" class="card shadow p-3 text-decoration-none">
                        <div class="d-flex align-items-center">
                            <i class="fe fe-box {{ $model['icon'] }} fs-3"></i>
                            <div class="ms-3 text-left">
                                <h5 class="mt-2 mb-1">{{ $model['name'] }}</h5>
                                <h3 class="text-dark fw-bold">{{ $model['count'] }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Section Title -->
        <h4 class="mt-5 mb-3 text-primary fw-bold">حالات التصنيع للمنتجات</h4>

        <!-- Second Row: Product Status Counts -->
        <div class="row">
            @php
                $productStatusesLabels = [
                    'complete' => ['label' => 'مكتمل', 'icon' => 'fe-check-circle text-success'],
                    'processing' => ['label' => 'قيد التصنيع', 'icon' => 'fe-tool text-info'],
                    'partial' => ['label' => 'استلام جزئي', 'icon' => 'fe-percent text-warning'],
                    'new' => ['label' => 'جديد', 'icon' => 'fe-plus-circle text-primary'],
                    'cancel' => ['label' => 'ملغي', 'icon' => 'fe-x-circle text-danger'],
                    'stop' => ['label' => 'متوقف', 'icon' => 'fe-pause-circle text-secondary'],
                ];
            @endphp

            @foreach ($productStatusesLabels as $key => $status)
                <div class="col-md-2">
                    <a href="{{ route('products.index', ['status' => $key]) }}" class="card shadow p-3 text-decoration-none">
                        <div class="d-flex align-items-center">
                            <i class="fe {{ $status['icon'] }} fs-3"></i>
                            <div class="ms-3 text-left">
                                <h5 class="mt-2 mb-1">{{ $status['label'] }}</h5>
                                <h3 class="text-dark fw-bold">{{ $productStatuses[$key] ?? 0 }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Section Title -->
        <h4 class="mt-5 mb-3 text-primary fw-bold">حالات الألوان الحالية</h4>

        <!-- Third Row: ProductColorVariant Status Counts -->
        <div class="row">
            @php
                $variantStatusesIcons = [
                    'complete' => 'fe-check text-success',
                    'processing' => 'fe-zap text-info',
                    'partial' => 'fe-percent text-warning',
                    'new' => 'fe-plus text-primary',
                    'cancel' => 'fe-x text-danger',
                    'stop' => 'fe-pause text-secondary',
                ];
            @endphp

            @foreach ($productStatusesLabels as $key => $status)
                <div class="col-md-2">
                    <a href="{{ route('products.index', ['variant_status' => $key]) }}" class="card shadow p-3 text-decoration-none">
                        <div class="d-flex align-items-center">
                            <i class="fe {{ $variantStatusesIcons[$key] }} fs-3"></i>
                            <div class="ms-3 text-left">
                                <h5 class="mt-2 mb-1">{{ $status['label'] }}</h5>
                                <h3 class="text-dark fw-bold">{{ $variantStatuses[$key] ?? 0 }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- END ROW -->

@endsection

@section('scripts')

    <!-- SELECT2 JS -->
    <script src="{{ asset('build/assets/plugins/select2/select2.full.min.js') }}"></script>

    <!-- APEXCHART JS -->
    <script src="{{ asset('build/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>

    <!-- DATA TABLES JS -->
    <script src="{{ asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>

    <!-- INDEX JS -->
    @vite('resources/assets/js/index3.js')

@endsection
