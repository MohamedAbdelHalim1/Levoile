@extends('layouts.app')

@section('styles')

@endsection

@section('content')

    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <ol class="breadcrumb mb-sm-0 mb-3">
            <!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="{{url('index')}}">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">لوحة التحكم</li>
        </ol><!-- End breadcrumb -->

    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->

    
    <div class="p-4">
        <!-- Date Range Filter -->
        <div class="row mb-4">
            <div class="col-md-4">
                <label>من تاريخ</label>
                <input type="date" class="form-control" wire:model="startDate">
            </div>
            <div class="col-md-4">
                <label>إلى تاريخ</label>
                <input type="date" class="form-control" wire:model="endDate">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button class="btn btn-primary me-2" wire:click="filterData">تطبيق الفلتر</button>
                <button class="btn btn-secondary" wire:click="resetFilter">إلغاء الفلتر</button>
            </div>
        </div>
    
        <!-- First Row: Model Counts -->
        <div class="row">
            @php
                $models = [
                    ['name' => 'المواسم', 'count' => $seasons, 'route' => 'seasons.index', 'icon' => 'fe-calendar'],
                    ['name' => 'الألوان', 'count' => $colors, 'route' => 'colors.index', 'icon' => 'fe-droplet'],
                    ['name' => 'المصانع', 'count' => $factories, 'route' => 'factories.index', 'icon' => 'fe-home'],
                    ['name' => 'الأقسام', 'count' => $categories, 'route' => 'categories.index', 'icon' => 'fe-grid'],
                    ['name' => 'المنتجات', 'count' => $products, 'route' => 'products.index', 'icon' => 'fe-box'],
                    ['name' => 'الخامات', 'count' => $materials, 'route' => 'materials.index', 'icon' => 'fe-layers'],
                ];
            @endphp
    
            @foreach ($models as $model)
                <div class="col-md-2">
                    <a href="{{ route($model['route']) }}" class="card shadow p-3 text-center text-decoration-none">
                        <i class="fe {{ $model['icon'] }} fs-3 text-primary"></i>
                        <h5 class="mt-2">{{ $model['name'] }}</h5>
                        <h3 class="text-dark fw-bold">{{ $model['count'] }}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    
        <!-- Second Row: Product Status Counts -->
        <div class="row mt-4">
            @php
                $productStatusesLabels = [
                    'complete' => 'مكتمل',
                    'processing' => 'قيد التصنيع',
                    'partial' => 'استلام جزئي',
                    'new' => 'جديد',
                    'cancel' => 'ملغي',
                    'stop' => 'متوقف',
                ];
            @endphp
    
            @foreach ($productStatusesLabels as $key => $label)
                <div class="col-md-2">
                    <a href="{{ route('products.index', ['status' => $key]) }}" class="card shadow p-3 text-center text-decoration-none">
                        <i class="fe fe-tag fs-3 text-success"></i>
                        <h5 class="mt-2">{{ $label }}</h5>
                        <h3 class="text-dark fw-bold">{{ $productStatuses[$key] ?? 0 }}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    
        <!-- Third Row: ProductColorVariant Status Counts -->
        <div class="row mt-4">
            @foreach ($productStatusesLabels as $key => $label)
                <div class="col-md-2">
                    <a href="{{ route('products.index', ['variant_status' => $key]) }}" class="card shadow p-3 text-center text-decoration-none">
                        <i class="fe fe-box fs-3 text-danger"></i>
                        <h5 class="mt-2">{{ $label }} (ألوان المنتجات)</h5>
                        <h3 class="text-dark fw-bold">{{ $variantStatuses[$key] ?? 0 }}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    
    
    <!-- END ROW -->





@endsection

@section('scripts')

    <!-- SELECT2 JS -->
    <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>

    <!-- APEXCHART JS -->
    <script src="{{asset('build/assets/plugins/apexcharts/apexcharts.min.js')}}"></script>

    <!-- DATA TABLES JS -->
    <script src="{{asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('build/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>

    <!-- INDEX JS -->
    @vite('resources/assets/js/index3.js')


@endsection
