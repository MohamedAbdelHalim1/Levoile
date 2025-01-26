@extends('layouts.app')

@section('styles')

@endsection

@section('content')

    <!-- PAGE HEADER -->
    <div class="page-header d-sm-flex d-block">
        <ol class="breadcrumb mb-sm-0 mb-3">
            <!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard03</li>
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
    <div class="row">
        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div
                    class="card-header custom-header d-flex justify-content-between align-items-center border-bottom">
                    <h3 class="card-title">Revenue Analytics</h3>
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="d-flex align-items-center bg-primary btn btn-sm mx-1 fw-semibold" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Sort by:
                            Weekly<i class="fe fe-chevron-down fw-semibold mx-1"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" role="menu" data-popper-placement="bottom-end">
                            <li><a href="javascript:void(0);">Monthly</a></li>
                            <li><a href="javascript:void(0);">Yearly</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <div class="d-flex ms-5">
                        <div>
                            <p class="mb-0 fs-15 text-muted">
                                This month
                            </p>
                            <span class="text-primary fs-20 fw-semibold"><i class="fe fe-dollar-sign fs-13"></i>815,320</span>
                        </div>
                        <div class="ms-5">
                            <p class="mb-0 fs-15 text-muted">
                                Last month
                            </p>
                            <span class="fs-20 text-secondary fw-semibold"><i class="fe fe-dollar-sign fs-13"></i>743,950</span>
                        </div>
                    </div>
                    <div id="revenue_chart">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
            <div class="row row-sm">
                <div class="col-sm-6 col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <div class="mb-0 fw-semibold text-dark">Daily Users</div>
                                    <h3 class="mt-1 mb-1 text-dark fw-semibold">4,304</h3>
                                    <div class="text-muted fs-12 mt-2"><i class="fe fe-arrow-up-right text-success me-1"></i>
                                        <span class="fw-bold fs-12 text-primary">6.05%</span> Since last month
                                    </div>
                                </div>
                                <i class="fe fe-user ms-auto fs-5 my-auto bg-primary-transparent p-3 br-7 text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <div class="mb-0 fw-semibold text-dark">Sessions</div>
                                    <h3 class="mt-1 mb-1 text-dark fw-semibold">46.4K</h3>
                                    <div class="text-muted fs-12 mt-2"><i class="fe fe-arrow-up-right text-success me-1"></i>
                                        <span class="fw-bold fs-12 text-success">04.12%</span> Since last month
                                    </div>
                                </div>
                                <i class="fe fe-database ms-auto fs-5 my-auto bg-secondary-transparent p-3 br-7 text-secondary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <div class="mb-0 fw-semibold text-dark">Bounce Rate</div>
                                    <h3 class="mt-1 mb-1 text-dark fw-semibold">25.04%</h3>
                                    <div class="text-muted fs-12 mt-2"><i class="fe fe-arrow-up-right text-warning me-1"></i>
                                        <span class="fw-bold fs-12 text-warning">0.20%</span> Since last month
                                    </div>
                                </div>
                                <i class="fe fe-clock ms-auto fs-5 my-auto bg-warning-transparent p-3 br-7 text-warning"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <div class="mb-0 fw-semibold text-dark">Subscribers</div>
                                    <h3 class="mt-1 mb-1 text-dark fw-semibold">10K</h3>
                                    <div class="text-muted fs-12 mt-2"><i class="fe fe-arrow-up-right text-danger me-1"></i>
                                        <span class="fw-bold fs-12 text-danger">2.20%</span> Since last month
                                    </div>
                                </div>
                                <i class="fe fe-bell ms-auto fs-5 my-auto bg-danger-transparent p-3 br-7 text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-sm">
                <div class="col-12">
                    <div class="card overflow-hidden">
                        <div class="card-header pb-0 border-bottom-0">
                            <h3 class="card-title">Deliverables</h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-block d-sm-inline-flex align-items-center my-3">
                                <p class="mb-0 me-5"> <span class="legend bg-blue"></span>Marketing Strategy</p>
                                <p class="mb-0 me-5"> <span class="legend bg-teal"></span>Engaging Audience</p>
                                <p class="mb-0 me-5"> <span class="legend bg-pink"></span>Others</p>
                            </div>
                            <div class="progress br-10 progress-md">
                                <div class="progress-bar lh-1 bg-blue w-20">20%</div>
                                <div class="progress-bar lh-1 bg-cyan w-30">30%</div>
                                <div class="progress-bar lh-1 bg-pink w-50">50%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->

    <!-- ROW -->
    <div class="row">
        <div class="col-xl-5 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Most Visited Pages By Country</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table border-0 mb-0 text-nowrap">
                            <thead class="bg-light border-bottom-0">
                            <tr>
                                <th class="border-top-0 text-dark fw-semibold ps-5 fs-13">Country</th>
                                <th class="border-top-0 text-dark fw-semibold fs-13">Active Page</th>
                                <th class="border-top-0 text-dark fw-semibold fs-13">Active Users</th>
                                <th class="border-top-0 text-dark fw-semibold text-end pe-5 fs-13">%Visits</th>
                            </tr>
                            </thead>
                            <tbody class="text-dark">
                            <tr class="border-bottom">
                                <td class="ps-5 d-flex align-items-center border-bottom-0">
                                    <img src="{{asset('build/assets/images/flag-images/2.png')}}" class="avatar avatar-sm br-7" alt="country-image">
                                    <p class="mb-0 mx-2">Canada</p>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="fw-semibold d-flex align-items-center text-dark">
                                        /Pages/news-1204 <i class="fe fe-external-link fs-11 ms-2"></i>
                                    </a>
                                </td>
                                <td class="text-center text-muted-dark">
                                    45
                                </td>
                                <td class="text-end pe-5">
                                    <span class="fw-semibold">86.29%</span>
                                </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="ps-5 d-flex align-items-center border-bottom-0">
                                    <img src="{{asset('build/assets/images/flag-images/3.png')}}" class="avatar avatar-sm br-7" alt="country-image">
                                    <p class="mb-0 mx-2">Germany</p>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="fw-semibold d-flex align-items-center text-dark">
                                        /Store/news-2460 <i class="fe fe-external-link fs-11 ms-2"></i>
                                    </a>
                                </td>
                                <td class="text-center text-muted-dark">
                                    20
                                </td>
                                <td class="text-end pe-5">
                                    <span class="fw-semibold">40.04%</span>
                                </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="ps-5 d-flex align-items-center border-bottom-0">
                                    <img src="{{asset('build/assets/images/flag-images/1.png')}}" class="avatar avatar-sm br-7" alt="country-image">
                                    <p class="mb-0 mx-2">India</p>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="fw-semibold d-flex align-items-center text-dark">
                                        /Pages/Dashboard-UI_Kit <i class="fe fe-external-link fs-11 ms-2"></i>
                                    </a>
                                </td>
                                <td class="text-center text-muted-dark">38</td>
                                <td class="text-end pe-5">
                                    <span class="fw-semibold">28.42%</span>
                                </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="ps-5 d-flex align-items-center border-bottom-0">
                                    <img src="{{asset('build/assets/images/flag-images/5.png')}}" class="avatar avatar-sm br-7" alt="country-image">
                                    <p class="mb-0 mx-2">Russia</p>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="fw-semibold d-flex align-items-center text-dark">
                                        /Pages/news-4521 <i class="fe fe-external-link fs-11 ms-2"></i>
                                    </a>
                                </td>
                                <td class="text-center text-muted-dark">19</td>
                                <td class="text-end pe-5">
                                    <span class="fw-semibold">22.10%</span>
                                </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="ps-5 d-flex align-items-center border-bottom-0">
                                    <img src="{{asset('build/assets/images/flag-images/6.png')}}" class="avatar avatar-sm br-7" alt="country-image">
                                    <p class="mb-0 mx-2">USA</p>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="fw-semibold d-flex align-items-center text-dark">
                                        /Store <i class="fe fe-external-link fs-11 ms-2"></i>
                                    </a>
                                </td>
                                <td class="text-center text-muted-dark">22</td>
                                <td class="text-end pe-5">
                                    <span class="fw-semibold">21.29%</span>
                                </td>
                            </tr>
                            <tr class="border-bottom-0">
                                <td class="ps-5 d-flex align-items-center border-bottom-0">
                                    <img src="{{asset('build/assets/images/flag-images/3.png')}}" class="avatar avatar-sm br-7" alt="country-image">
                                    <p class="mb-0 mx-2">Mexico</p>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="fw-semibold d-flex align-items-center text-dark">
                                        /Store/Cart.html <i class="fe fe-external-link fs-11 ms-2"></i>
                                    </a>
                                </td>
                                <td class="text-center text-muted-dark">42</td>
                                <td class="text-end pe-5">
                                    <span class="fw-semibold">50.12%</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Browser Usage</h3>
                    <div class="dropdown">
                        <button type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-sm btn-primary-light fw-semibold">
                            <i class="fe fe-external-link"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" role="menu">
                            <li><a href="javascript:void(0);">Seconds</a></li>
                            <li><a href="javascript:void(0);">Minutes</a></li>
                            <li><a href="javascript:void(0);">Hours</a></li>
                        </ul>
                    </div>
                </div>
                <!-- card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table border-0 mb-0 text-nowrap">
                            <thead class="bg-light border-bottom-0">
                            <tr>
                                <th class="border-top-0 text-dark fw-semibold ps-5 fs-13">Browser</th>
                                <th class="border-top-0 text-dark fw-semibold fs-13">Sessions</th>
                                <th class="border-top-0 text-dark fw-semibold text-end pe-5 fs-13">Bounce Rate</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="border-bottom">
                                <td class="ps-5 d-flex align-items-center border-bottom-0">
                                    <img alt="browser-image" class="avatar br-7 me-2" src="{{asset('build/assets/images/browsers/1.png')}}">
                                    <p class="fw-semibold text-dark mb-0">Chrome</p>
                                </td>
                                <td>
                                    <h6 class="mb-1 mt-1 text-dark fw-semibold">26,230</h6>
                                </td>
                                <td class="text-end pe-5">
                                    <span class="fw-semibold"><i class="fe fe-arrow-up text-success me-1"></i>86.29%</span>
                                    <div class="progress progress-md h-1">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-85">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="ps-5 d-flex align-items-center border-bottom-0">
                                    <img alt="browser-image" class="avatar br-7 me-2" src="{{asset('build/assets/images/browsers/4.png')}}">
                                    <p class="fw-semibold text-dark mb-0">Opera</p>
                                </td>
                                <td>
                                    <h6 class="mb-1 mt-1 text-dark fw-semibold">12,420</h6>
                                </td>
                                <td class="text-end pe-5">
                                    <span class="fw-semibold"><i class="fe fe-arrow-down text-danger me-1"></i>42.05%</span>
                                    <div class="progress progress-md h-1">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-40">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="ps-5 d-flex align-items-center border-bottom-0">
                                    <img alt="browser-image" class="avatar br-7 me-2" src="{{asset('build/assets/images/browsers/5.png')}}">
                                    <p class="fw-semibold text-dark mb-0">Safari</p>
                                </td>
                                <td>
                                    <h6 class="mb-1 mt-1 text-dark fw-semibold">23,120</h6>
                                </td>
                                <td class="text-end pe-5">
                                    <span class="fw-semibold"><i class="fe fe-arrow-up text-success me-1"></i>30.52%</span>
                                    <div class="progress progress-md h-1">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-35">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-bottom">
                                <td class="ps-5 d-flex align-items-center border-bottom-0">
                                    <img alt="browser-image" class="avatar br-7 me-2" src="{{asset('build/assets/images/browsers/3.png')}}">
                                    <p class="fw-semibold text-dark mb-0">Firefox</p>
                                </td>
                                <td>
                                    <h6 class="mb-1 mt-1 text-dark fw-semibold">42,021</h6>
                                </td>
                                <td class="text-end pe-5">
                                    <span class="fw-semibold"><i class="fe fe-arrow-up text-success me-1"></i>26.65%</span>
                                    <div class="progress progress-md h-1">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-25">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-bottom-0">
                                <td class="ps-5 d-flex align-items-center border-bottom-0">
                                    <img alt="browser-image" class="avatar br-7 me-2" src="{{asset('build/assets/images/browsers/2.png')}}">
                                    <p class="fw-semibold text-dark mb-0">Edge</p>
                                </td>
                                <td>
                                    <h6 class="mb-1 mt-1 text-dark fw-semibold">20,402</h6>
                                </td>
                                <td class="text-end pe-5">
                                    <span class="fw-semibold"><i class="fe fe-arrow-down text-danger me-1"></i>34.12%</span>
                                    <div class="progress progress-md h-1">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-35">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Viewing From Devices</h3>
                </div>
                <div class="card-body px-0 py-2">
                    <div id="Viewing_Devices"></div>
                </div>
                <div class="card-footer d-flex justify-content-evenly">
                    <div>
                        <h6 class="mb-0 text-dark fw-semibold d-flex justify-content-center mb-1"><i class="fe fe-airplay text-primary mx-1"></i>40.32%</h6>
                        <p class="text-muted ms-2 mb-0">Desktop</p>
                    </div>
                    <div>
                        <h6 class="mb-0 text-dark fw-semibold d-flex justify-content-center mb-1"><i class="fe fe-smartphone text-secondary mx-1"></i>10.73%</h6>
                        <p class="text-muted ms-2 mb-0">Mobile</p>
                    </div>
                    <div>
                        <h6 class="mb-0 text-dark fw-semibold d-flex justify-content-center mb-1"><i class="fe fe-tablet text-pink mx-1"></i>14.12%</h6>
                        <p class="text-muted ms-2 mb-0">Tablet</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->

    <!-- ROW -->
    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Product Details</h3>
                    <a href="javascript:void(0);" class="fw-semibold btn btn-sm btn-primary"><i class="fe fe-file-text"></i> Download Report
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table3" class="table table-bordered text-nowrap mb-0">
                            <thead class="text-dark">
                            <tr>
                                <th class="fw-semibold">Product ID</th>
                                <th class="fw-semibold">Product</th>
                                <th class="fw-semibold">Quantity</th>
                                <th class="fw-semibold">Price</th>
                                <th class="fw-semibold">Payment Mode</th>
                                <th class="fw-semibold">Status</th>
                                <th class="fw-semibold">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <h6 class="mb-0 fw-semibold text-primary">#42503</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img alt="person-picture" class="avatar avatar-sm cover-image br-7 me-2" src="{{asset('build/assets/images/products/10.jpg')}}">
                                        <h6 class="mb-0 fs-14 fw-semibold text-dark">SMart Watches</h6>
                                    </div>
                                </td>
                                <td class="fw-semibold text-muted-dark">02</td>
                                <td class="fw-semibold text-dark">$10,000</td>
                                <td class="text-dark fw-semibold">Cash on delivered</td>
                                <td><span class="badge bg-primary-transparent text-primary">Available</span></td>
                                <td>
                                    <button type="button" class="btn bg-info-transparent">
                                        <i class="fe fe-edit text-info"></i>
                                    </button>
                                    <button type="button" class="btn bg-danger-transparent">
                                        <i class="fe fe-trash-2 text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 class="mb-0 fw-semibold text-primary">#456832</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img alt="person-picture" class="avatar avatar-sm cover-image br-7 me-2" src="{{asset('build/assets/images/products/14.jpg')}}">
                                        <h6 class="mb-0 fs-14 fw-semibold text-dark">Home Furnitures</h6>
                                    </div>
                                </td>
                                <td class="fw-semibold text-muted-dark">04</td>
                                <td class="fw-semibold text-dark">$2,200</td>
                                <td class="text-dark fw-semibold">Online Payment</td>
                                <td><span class="badge badge-warning-transparent text-warning fw-semibold">Limited</span></td>
                                <td>
                                    <button type="button" class="btn bg-info-transparent">
                                        <i class="fe fe-edit text-info"></i>
                                    </button>
                                    <button type="button" class="btn bg-danger-transparent">
                                        <i class="fe fe-trash-2 text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 class="mb-0 fw-semibold text-primary">#32054</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img alt="person-picture" class="avatar avatar-sm cover-image br-7 me-2" src="{{asset('build/assets/images/products/13.jpg')}}">
                                        <h6 class="mb-0 fs-14 fw-semibold text-dark">Mobiles</h6>
                                    </div>
                                </td>
                                <td class="fw-semibold text-muted-dark">03</td>
                                <td class="fw-semibold text-dark">$9,100</td>
                                <td class="text-dark fw-semibold">Cash on delivered</td>
                                <td><span class="badge badge-danger-transparent text-danger fw-semibold">No stock</span></td>
                                <td>
                                    <button type="button" class="btn bg-info-transparent">
                                        <i class="fe fe-edit text-info"></i>
                                    </button>
                                    <button type="button" class="btn bg-danger-transparent">
                                        <i class="fe fe-trash-2 text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 class="mb-0 fw-semibold text-primary">#85423</h6>
                                </td>
                                <td>
                                    <div class="d-flex border-bottom-0">
                                        <div>
                                            <span class="avatar avatar-sm me-2"><img src="{{asset('build/assets/images/products/16.jpg')}}" alt="img" class="br-7 cover-image"></span>
                                        </div>
                                        <div class="flex-1 my-auto">
                                            <h6 class="mb-0 fs-14 fw-semibold text-dark">HP 200 Mouse &amp; Wireless Headphones</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="fw-semibold text-muted-dark">02</td>
                                <td class="fw-semibold text-dark">$2,987</td>
                                <td class="text-dark fw-semibold">Online Payment</td>
                                <td><span class="badge badge-danger-transparent text-danger fw-semibold">No stock</span></td>
                                <td>
                                    <button type="button" class="btn bg-info-transparent">
                                        <i class="fe fe-edit text-info"></i>
                                    </button>
                                    <button type="button" class="btn bg-danger-transparent">
                                        <i class="fe fe-trash-2 text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 class="mb-0 fw-semibold text-primary">#61203</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img alt="person-picture" class="avatar avatar-sm cover-image br-7 me-2" src="{{asset('build/assets/images/products/15.jpg')}}">
                                        <h6 class="mb-0 fs-14 fw-semibold text-dark">Digital Camera</h6>
                                    </div>
                                </td>
                                <td class="fw-semibold text-muted-dark">01</td>
                                <td class="fw-semibold text-dark">$10,987</td>
                                <td class="text-dark fw-semibold">Cash on delivered</td>
                                <td><span class="badge badge-success-transparent text-success fw-semibold">Available</span></td>
                                <td>
                                    <button type="button" class="btn bg-info-transparent">
                                        <i class="fe fe-edit text-info"></i>
                                    </button>
                                    <button type="button" class="btn bg-danger-transparent">
                                        <i class="fe fe-trash-2 text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 class="mb-0 fw-semibold text-primary">#03215</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img alt="person-picture" class="avatar avatar-sm cover-image br-7 me-2" src="{{asset('build/assets/images/products/18.jpg')}}">
                                        <h6 class="mb-0 fs-14 fw-semibold text-dark">Clothes</h6>
                                    </div>
                                </td>
                                <td class="fw-semibold text-muted-dark">04</td>
                                <td class="fw-semibold text-dark">$1,700</td>
                                <td class="text-dark fw-semibold">Online Payment</td>
                                <td><span class="badge badge-success-transparent text-success fw-semibold">Available</span></td>
                                <td>
                                    <button type="button" class="btn bg-info-transparent">
                                        <i class="fe fe-edit text-info"></i>
                                    </button>
                                    <button type="button" class="btn bg-danger-transparent">
                                        <i class="fe fe-trash-2 text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 class="mb-0 fw-semibold text-primary">#63210</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img alt="person-picture" class="avatar avatar-sm cover-image br-7 me-2" src="{{asset('build/assets/images/products/12.jpg')}}">
                                        <h6 class="mb-0 fs-14 fw-semibold text-dark">Dell Laptops</h6>
                                    </div>
                                </td>
                                <td class="fw-semibold text-muted-dark">02</td>
                                <td class="fw-semibold text-dark">$452</td>
                                <td class="text-dark fw-semibold">Cash On delivered</td>
                                <td><span class="badge badge-warning-transparent text-warning fw-semibold">Limited</span></td>
                                <td>
                                    <button type="button" class="btn bg-info-transparent">
                                        <i class="fe fe-edit text-info"></i>
                                    </button>
                                    <button type="button" class="btn bg-danger-transparent">
                                        <i class="fe fe-trash-2 text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 class="mb-0 fw-semibold text-primary">#30215</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img alt="person-picture" class="avatar avatar-sm cover-image br-7 me-2" src="{{asset('build/assets/images/products/17.jpg')}}">
                                        <h6 class="mb-0 fs-14 fw-semibold text-dark">Dell Monitors</h6>
                                    </div>
                                </td>
                                <td class="fw-semibold text-muted-dark">02</td>
                                <td class="fw-semibold text-dark">$2,700</td>
                                <td class="text-dark fw-semibold">Online Payment</td>
                                <td><span class="badge badge-success-transparent text-success fw-semibold">Available</span></td>
                                <td>
                                    <button type="button" class="btn bg-info-transparent">
                                        <i class="fe fe-edit text-info"></i>
                                    </button>
                                    <button type="button" class="btn bg-danger-transparent">
                                        <i class="fe fe-trash-2 text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 class="mb-0 fw-semibold text-primary">#42150</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img alt="person-picture" class="avatar avatar-sm cover-image br-7 me-2" src="{{asset('build/assets/images/products/6.jpg')}}">
                                        <h6 class="mb-0 fs-14 fw-semibold text-dark">Laptop Bags</h6>
                                    </div>
                                </td>
                                <td class="fw-semibold text-muted-dark">01</td>
                                <td class="fw-semibold text-dark">$428</td>
                                <td class="text-dark fw-semibold">Cash On delivered</td>
                                <td><span class="badge badge-warning-transparent text-warning fw-semibold">Limited</span></td>
                                <td>
                                    <button type="button" class="btn bg-info-transparent">
                                        <i class="fe fe-edit text-info"></i>
                                    </button>
                                    <button type="button" class="btn bg-danger-transparent">
                                        <i class="fe fe-trash-2 text-danger"></i>
                                    </button>
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
