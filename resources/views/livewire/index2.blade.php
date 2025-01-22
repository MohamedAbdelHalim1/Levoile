@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard02</li>
                                </ol><!-- End breadcrumb -->
                                <div class="ms-auto">
                                    <div>
                                        <a href="javascript:void(0);" class="btn bg-secondary-transparent text-secondary btn-sm"
                                            data-bs-toggle="tooltip" title="" data-bs-placement="bottom"
                                            data-bs-original-title="Rating">
                                            <span>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </a>
                                        <a href="{{url('lockscreen')}}" class="btn bg-primary-transparent text-primary mx-2 btn-sm"
                                            data-bs-toggle="tooltip" title="" data-bs-placement="bottom"
                                            data-bs-original-title="lock">
                                            <span>
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </a>
                                        <a href="javascript:void(0);" class="btn bg-warning-transparent text-warning btn-sm" data-bs-toggle="tooltip"
                                            title="" data-bs-placement="bottom" data-bs-original-title="Add New">
                                            <span>
                                                <i class="fa fa-plus"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- END PAGE HEADER -->

                            <!-- ROW -->
                            <div class="row row-sm">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
                                            <div class="card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div>
                                                            <p class="mb-0 text-dark fw-semibold">Daily Revenue</p>
                                                            <h3 class="mt-1 mb-1 text-dark fw-semibold">$2,042</h3>
                                                            <div class="text-muted fs-12 mt-2"><i class="fa fa-signal text-success me-1"></i>
                                                                <span class="fw-bold fs-12 text-body">6.05%</span> (30 days)
                                                            </div>
                                                        </div>
                                                        <span class="ms-auto my-auto circle-icon bg-primary text-center"><i class="bi bi-pencil-square fs-16"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
                                            <div class="card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div>
                                                            <p class="mb-0 text-dark fw-semibold">Daily Sales</p>
                                                            <h3 class="mt-1 mb-1 text-dark fw-semibold">4,628</h3>
                                                            <div class="text-muted fs-12 mt-2"><i class="fa fa-signal text-success me-1"></i>
                                                                <span class="fw-bold fs-12 text-body">04.12%</span> (30 days)
                                                            </div>
                                                        </div>
                                                        <span class="ms-auto my-auto circle-icon bg-info text-center"><i class="bi bi-bar-chart fs-16"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
                                            <div class="card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div>
                                                            <p class="mb-0 text-dark fw-semibold">Daily Updates</p>
                                                            <h3 class="mt-1 mb-1 fw-semibold">1,206</h3>
                                                            <div class="text-muted"><i class="fa fa-signal text-success me-1"></i>
                                                                <span class="fw-bold text-body fs-12 ">0.60%</span> (30 days)
                                                            </div>
                                                        </div>
                                                        <span class="ms-auto my-auto circle-icon bg-success text-center"><i class="bi bi-graph-up fs-16"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
                                            <div class="card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div>
                                                            <p class="mb-0 text-dark fw-semibold">Daily Users</p>
                                                            <h3 class="mt-1 mb-1 text-dark fw-semibold">3,024</h3>
                                                            <div class="text-muted fs-12 mt-2"><i class="fa fa-signal text-warning me-1"></i>
                                                                <span class="fw-bold fs-12 text-body">0.20%</span> (30 days)
                                                            </div>
                                                        </div>
                                                        <span class="circle-icon bg-warning text-center"><i class="bi bi-person fs-16"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
                                            <div class="card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="text-dark fw-semibold">Male Visitors</p>
                                                        <span class="ms-auto my-auto visitors-icon bg-primary-transparent"><i class="fa fa-venus fs-18"></i></span>
                                                    </div>
                                                    <p class="text-muted mb-0 fs-12"><span class="fw-semibold fs-12"><i class="fa fa-arrow-up text-primary me-1"> </i>15%
                                                    </span> in this year</p>
                                                    <div class="progress progress-xs mb-0 mt-1">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-30">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
                                            <div class="card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="text-dark fw-semibold">Female Visitors</p>
                                                        <span class="ms-auto my-auto visitors-icon bg-secondary-transparent"><i class="fa fa-mercury fs-18"></i></span>
                                                    </div>
                                                    <p class="text-muted mb-0 fs-12"><span class="fw-semibold fs-12"><i class="fa fa-arrow-up text-success me-1"> </i>32%
                                                    </span> in this year</p>
                                                    <div class="progress progress-xs mb-0 mt-1">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary w-60">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                                    <div class="card overflow-hidden">
                                        <div class="card-header d-flex justify-content-between allign-items-center">
                                            <h3 class="card-title mb-0">Revenue Statistics</h3>
                                            <div class="dropdown ms-auto">
                                                <button class="btn btn-outline-default btn-sm fw-bold text-primary fs-12 d-flex align-items-center dropdown-toggle"
                                                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bi bi-box-arrow-up-right fw-semibold me-2"></i> Monthly
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Weekly</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Yearly</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body py-0">
                                            <div id="chart12" class="chartsh chart-dropshadow"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-xxl-4 col-xl-12 col-lg-12 col-md-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-header border-bottom">
                                            <h3 class="card-title mb-0">Top Products</h3>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table border-0 mb-0 text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-top-0 text-dark fw-semibold ps-5 fs-13">Product</th>
                                                            <th class="border-top-0 text-dark fw-semibold fs-13">Category</th>
                                                            <th class="border-top-0 text-dark fw-semibold pe-5 text-end fs-13">Price
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-dark">
                                                        <tr class="border-bottom">
                                                            <td class="ps-5 d-flex border-bottom-0 overflow-hidden">
                                                                <img alt="product-image" class="avatar avatar-md cover-image br-7 me-3" src="{{asset('build/assets/images/products/6.jpg')}}">
                                                                <div>
                                                                    <h6 class="mb-1 mt-1 fw-semibold">Red Printed Bag</h6>
                                                                    <p class="mb-0 text-muted fs-12">Men, Backpack</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6 class="mb-0 fw-semibold text-primary">Bags</h6>
                                                            </td>
                                                            <td class="text-end pe-5">
                                                                <span class="text-dark fw-semibold">$124</span>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-bottom">
                                                            <td class="ps-5 d-flex border-bottom-0 overflow-hidden">
                                                                <img alt="product-image" class="avatar avatar-md cover-image br-7 bg-light me-3" src="{{asset('build/assets/images/products/5.jpg')}}">
                                                                <div>
                                                                    <h6 class="mb-1 mt-1 fw-semibold">Black Headphones</h6>
                                                                    <p class="mb-0 text-muted fs-12">Men, Bluetooth</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6 class="mb-0 fw-semibold text-secondary">Electronic</h6>
                                                            </td>
                                                            <td class="text-end pe-5">
                                                                <span class="text-dark fw-semibold">$56</span>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-bottom">
                                                            <td class="ps-5 d-flex border-bottom-0 overflow-hidden">
                                                                <img alt="product-image" class="avatar avatar-md cover-image br-7 me-3" src="{{asset('build/assets/images/products/2.jpg')}}">
                                                                <div>
                                                                    <h6 class="mb-1 mt-1 fw-semibold">Blue Printed T-shirt</h6>
                                                                    <p class="mb-0 text-muted fs-12">Men, T-shirt</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6 class="mb-0 fw-semibold text-info">Clothes</h6>
                                                            </td>
                                                            <td class="text-end pe-5">
                                                                <span class="text-dark fw-semibold">$240</span>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-bottom">
                                                            <td class="ps-5">
                                                                <div class="d-flex">
                                                                    <span class="avatar avatar-md me-3"><img alt="product-image" class=" cover-image br-7" src="{{asset('build/assets/images/products/4.jpg')}}"></span>
                                                                    <div class="flex-1">
                                                                        <h6 class="mb-1 mt-1 fw-semibold">Black Smart Watch</h6>
                                                                        <p class="mb-0 text-muted fs-12">Men, Handwatch</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6 class="mb-0 fw-semibold text-danger">Electronic</h6>
                                                            </td>
                                                            <td class="text-end pe-5">
                                                                <span class="text-dark fw-semibold">$86</span>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-bottom-0">
                                                            <td class="ps-5 d-flex border-bottom-0 overflow-hidden">
                                                                <img alt="product-image" class="avatar avatar-md cover-image br-7 me-3" src="{{asset('build/assets/images/products/3.jpg')}}">
                                                                <div>
                                                                    <h6 class="mb-1 mt-1 fw-semibold">Watch</h6>
                                                                    <p class="mb-0 text-muted fs-12">Men, Casual watch</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6 class="mb-0 fw-semibold text-warning">Electronic</h6>
                                                            </td>
                                                            <td class="text-end pe-5">
                                                                <span class="text-dark fw-semibold">$124</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-5 col-xl-7 col-lg-12 col-md-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-header border-bottom">
                                            <h3 class="card-title mb-0">Visitors By Country</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="world-map-markers" class="h-330"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-5 col-lg-12 col-md-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-header border-bottom">
                                            <h3 class="card-title">
                                                Valuable Customers
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group valuable-customers">
                                                <li class="list-group-item">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <img src="{{asset('build/assets/images/users/male/8.jpg')}}" class="avatar avatar-md br-7 cover-image" alt="person-image">
                                                            <div class="p-1 ms-3">
                                                                <h6 class="mb-1 fw-semibold">Jordon Matey</h6>
                                                                <p class="mb-0 text-muted fs-12">matey@gmail.com</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="badge badge-gradient-success shadow">+ $246</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <img src="{{asset('build/assets/images/users/female/21.jpg')}}" class="avatar avatar-md br-7 cover-image" alt="person-image">
                                                            <div class="p-1 ms-3">
                                                                <h6 class="mb-1 fw-semibold">carolen valie</h6>
                                                                <p class="mb-0 text-muted fs-12">valie@02gmail.com</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="badge badge-gradient-info shadow">- $58</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <img src="{{asset('build/assets/images/users/female/22.jpg')}}" class="avatar avatar-md br-7 cover-image" alt="person-image">
                                                            <div class="p-1 ms-3">
                                                                <h6 class="mb-1 fw-semibold">Lisenen vasco</h6>
                                                                <p class="mb-0 text-muted fs-12">vasco@gmail.com</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="badge badge-gradient-danger shadow">+ $69</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <img src="{{asset('build/assets/images/users/male/14.jpg')}}" class="avatar avatar-md br-7 cover-image" alt="person-image">
                                                            <div class="p-1 ms-3">
                                                                <h6 class="mb-1 fw-semibold">Jordon Matey</h6>
                                                                <p class="mb-0 text-muted fs-12">Matey@gmail.com</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="badge badge-gradient-primary shadow">+ $124</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <img src="{{asset('build/assets/images/users/male/28.jpg')}}" class="avatar avatar-md br-7 cover-image" alt="person-image">
                                                            <div class="p-1 ms-3">
                                                                <h6 class="mb-1 fw-semibold">Sunee Jun</h6>
                                                                <p class="mb-0 text-muted fs-12">sunee24@gmail.com</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="badge badge-gradient-secondary shadow">- $168</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <img src="{{asset('build/assets/images/users/female/23.jpg')}}" class="avatar avatar-md br-7 cover-image" alt="person-image">
                                                            <div class="p-1 ms-3">
                                                                <h6 class="mb-1 fw-semibold">Drow Kano</h6>
                                                                <p class="mb-0 text-muted fs-12">kano@gmail.com</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="badge badge-gradient-purple shadow">+ $86</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                                            <h3 class="card-title mb-0">Order Status</h3>
                                            <button type="button" class="fw-semibold btn btn-sm btn-primary"><i class="fe fe-file-text"></i> Generate Report
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="data-table2" class="table border p-0 text-nowrap mb-0">
                                                    <thead class="tabel-row-heading text-dark">
                                                        <tr>
                                                            <th class="fw-semibold text-dark border-bottom">
                                                                product
                                                            </th>
                                                            <th class="fw-semibold text-dark border-bottom">
                                                                order date
                                                            </th>
                                                            <th class="fw-semibold text-dark border-bottom">
                                                                status
                                                            </th>
                                                            <th class="fw-semibold text-dark border-bottom">
                                                                location
                                                            </th>
                                                            <th class="fw-semibold text-dark border-bottom">
                                                                quantity
                                                            </th>
                                                            <th class="fw-semibold text-dark border-bottom">
                                                                totla price
                                                            </th>
                                                            <th class="bg-transparent fw-semibold text-dark border-bottom">
                                                                Rating
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="border-bottom">
                                                            <td>
                                                                <div class="d-flex">
                                                                    <span class="avatar avatar-md me-3"><img alt="product-image" class=" cover-image br-7" src="{{asset('build/assets/images/products/9.jpg')}}"></span>
                                                                    <div class="flex-1">
                                                                        <h6 class="mb-0 mt-1 fs-13 text-dark fw-bold">
                                                                            Head phones Kit
                                                                        </h6>
                                                                        <span class="text-muted fw-semibold fs-12">#23678</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <span class="text-muted fs-12 fw-semibold">08:46AM</span>
                                                                    <h6 class="mb-0 mt-1 fs-13 text-dark fw-semibold">
                                                                        October 12,2021
                                                                    </h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <span class="badge bg-warning-transparent text-warning fw-semibold">Shopping
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <h6 class="mb-0 fs-13 text-dark fw-semibold">Collective
                                                                        Electronic</h6>
                                                                    <span class="text-muted fs-12 fw-semibold">United states
                                                                        of America
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span class="text-dark fs-13 fw-semibold">08</span>
                                                            </td>
                                                            <td>
                                                                <h6 class="text-dark fw-semibold fs-13 mb-0">$468.00</h6>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center border-bottom-0">
                                                                    <div>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-12"></i></a>
                                                                    </div>
                                                                    <span class="text-muted fs-12 ms-1">4.0</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-bottom">
                                                            <td>
                                                                <div class="d-flex">
                                                                    <span class="avatar avatar-md me-3"><img alt="product-image" class=" cover-image br-7" src="{{asset('build/assets/images/products/8.jpg')}}"></span>
                                                                    <div class="flex-1">
                                                                        <h6 class="mb-0 mt-1 fs-13 text-dark fw-bold">Running shoes</h6>
                                                                        <span class="text-muted fw-semibold fs-12">#23646</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <span class="text-muted fs-12 fw-semibold">10:06AM</span>
                                                                    <h6 class="mb-0 mt-1 fs-13 text-dark fw-semibold">
                                                                        September 20,2021
                                                                    </h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <span class="badge bg-success-transparent text-success fw-semibold">Success
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <h6 class="mb-0 fs-13 text-dark fw-semibold">Collective
                                                                        Sprots</h6>
                                                                    <span class="text-muted fs-12 fw-semibold">Los angels,
                                                                        New york
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span class="text-dark fs-13 fw-semibold">10</span>
                                                            </td>
                                                            <td>
                                                                <h6 class="text-dark fw-semibold fs-13 mb-0">$268.00</h6>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center border-bottom-0">
                                                                    <div>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-12"></i></a>
                                                                    </div>
                                                                    <span class="text-muted fs-12 ms-1">4.0</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-bottom">
                                                            <td>
                                                                <div class="d-flex">
                                                                    <span class="avatar avatar-md me-3"><img alt="product-image" class=" cover-image br-7" src="{{asset('build/assets/images/products/11.jpg')}}"></span>
                                                                    <div class="flex-1">
                                                                        <h6 class="mb-0 mt-1 text-dark fw-semibold">
                                                                            Ear phones 3D kit
                                                                        </h6>
                                                                        <span class="text-muted fw-semibold fs-12">#445620</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <p class="text-muted mb-0 fs-12 fw-semibold">04:46PM</p>
                                                                    <h6 class="mb-0 mt-1 text-dark fw-semibold">
                                                                        December 28,2021
                                                                    </h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <span class="badge bg-success-transparent text-success fw-semibold">Success
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <h6 class="mb-0 text-dark fw-semibold">Collective
                                                                        Electronic</h6>
                                                                    <span class="text-muted fs-12 fw-semibold">United states
                                                                        of America
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span class="text-dark fs-13 fw-semibold">14</span>
                                                            </td>
                                                            <td>
                                                                <h6 class="text-dark fw-semibold fs-13 mb-0">$368.24</h6>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center border-bottom-0">
                                                                    <div>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-12"></i></a>
                                                                    </div>
                                                                    <span class="text-muted fs-12 ms-1">4.0</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-bottom">
                                                            <td>
                                                                <div class="d-flex">
                                                                    <span class="avatar avatar-md me-3"><img alt="product-image" class=" cover-image br-7" src="{{asset('build/assets/images/products/10.jpg')}}"></span>
                                                                    <div class="flex-1">
                                                                        <h6 class="mb-0 mt-1 text-dark fw-semibold">
                                                                            Hand watch Kit
                                                                        </h6>
                                                                        <span class="text-muted fw-semibold fs-12">#23678</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <p class="text-muted mb-0 fs-12 fw-semibold">08:46AM</p>
                                                                    <h6 class="mb-0 mt-1 text-dark fw-semibold">
                                                                        October 12,2021
                                                                    </h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <span class="badge bg-primary-transparent text-primary fw-semibold">Delivered
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <h6 class="mb-0 fs-13 text-dark fw-semibold">Collective
                                                                        Electronic</h6>
                                                                    <span class="text-muted fs-12 fw-semibold">United states
                                                                        of America
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span class="text-dark fs-13 fw-semibold">24</span>
                                                            </td>
                                                            <td>
                                                                <h6 class="text-dark fw-semibold fs-13 mb-0">$68.00</h6>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center border-bottom-0">
                                                                    <div>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-12"></i></a>
                                                                    </div>
                                                                    <span class="text-muted fs-12 ms-1">5.0</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-bottom">
                                                            <td>
                                                                <div class="d-flex">
                                                                    <span class="avatar avatar-md me-3"><img alt="product-image" class=" cover-image br-7" src="{{asset('build/assets/images/products/13.jpg')}}"></span>
                                                                    <div class="flex-1">
                                                                        <h6 class="mb-0 mt-1 text-dark fw-semibold">
                                                                            Smart Mobile
                                                                        </h6>
                                                                        <span class="text-muted fw-semibold fs-12">#23678</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <p class="text-muted mb-0 fs-12 fw-semibold">04:04PM</p>
                                                                    <h6 class="mb-0 mt-1 text-dark fw-semibold">
                                                                        April 12,2021
                                                                    </h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <span class="badge bg-danger-transparent text-danger fw-semibold">Conformed
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <h6 class="mb-0 text-dark fw-semibold">Home Decores</h6>
                                                                    <span class="text-muted fs-12 fw-semibold">Los Angels,
                                                                        New York
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span class="text-dark fs-13 fw-semibold">08</span>
                                                            </td>
                                                            <td>
                                                                <h6 class="text-dark fw-semibold fs-13 mb-0">$468.00</h6>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center border-bottom-0">
                                                                    <div>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning fs-12"></i></a>
                                                                        <a href="javascript:void(0);"><i class="fa fa-star-o text-warning fs-12"></i></a>
                                                                    </div>
                                                                    <span class="text-muted fs-12 ms-1">4.0</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- APEXCHART JS -->
        <script src="{{asset('build/assets/plugins/apexcharts/apexcharts.min.js')}}"></script>

        <!-- JVECTORMAP JS -->
        <script src="{{asset('build/assets/plugins/jvectormap/jquery-jvectormap-2.0.5.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

        <!-- INDEX JS -->
        @vite('resources/assets/js/index2.js')


        <!-- SELECT2 JS -->
        <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>

        <!-- DATA TABLES JS -->
        <script src="{{asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>

@endsection