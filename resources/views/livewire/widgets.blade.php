@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- page-header -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Widgets</li>
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
                            <!-- End page-header -->

                            <!-- row -->
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-counter bg-danger">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="fa fa-eye mb-0 text-white-transparent"></i>
                                            </div>
                                            <div class="mt-2 mb-0 text-white">
                                                <h2 class="mb-0">54,234</h2>
                                                <p class="text-white mt-1 mb-0">Daily Visitors </p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-counter bg-secondary">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="fa fa-shopping-cart mb-0 text-white-transparent"></i>
                                            </div>
                                            <div class="mt-2 mb-0 text-white">
                                                <h2 class="mb-0">80,956</h2>
                                                <p class="text-white mt-1 mb-0">Daily Orders </p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-counter bg-primary">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="fe fe-users mt-3 mb-0 text-white-transparent"></i>
                                            </div>
                                            <div class="mt-2 mb-0 text-white">
                                                <h2 class="mb-0">34,762</h2>
                                                <p class="text-white mt-1 mb-0">Daily Customers</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-counter bg-warning">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="fe fe-send mt-3 mb-0 text-white-transparent"></i>
                                            </div>
                                            <div class="mt-2 mb-0 text-white">
                                                <h2 class="mb-0">25,789</h2>
                                                <p class="text-white mt-1 mb-0">Daily Revenue</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 col-xl-3 col-md-6">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="feature">
                                                    <div class="fa-stack fa-lg fa-2x icon bg-purple">
                                                        <i class="fa fa-bed fa-stack-1x text-white"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="card-body p-3  d-flex">
                                                    <div>
                                                        <p class="mb-2">Total Patients</p>
                                                        <h2 class="mb-0 text-dark">23,786K</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-lg-6 col-xl-3 col-md-6">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="feature">
                                                    <div class="fa-stack fa-lg fa-2x icon bg-green">
                                                        <i class="fa fa-user-md fa-stack-1x text-white"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="card-body p-3  d-flex">
                                                    <div>
                                                        <p class="mb-2">Total Staff</p>
                                                        <h2 class="mb-0 text-dark">5,752</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-lg-6 col-xl-3 col-md-6">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="feature">
                                                    <div class="fa-stack fa-lg fa-2x icon bg-orange">
                                                        <i class="fa fa-hospital-o fa-stack-1x text-white"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="card-body p-3  d-flex">
                                                    <div>
                                                        <p class="mb-2">Total Rooms</p>
                                                        <h2 class="mb-0 text-dark">34,678</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-lg-6 col-xl-3 col-md-6">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="feature">
                                                    <div class="fa-stack fa-lg fa-2x icon bg-yellow">
                                                        <i class="fa fa-flask fa-stack-1x text-white"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="card-body p-3  d-flex">
                                                    <div>
                                                        <p class="mb-2">Total Labs</p>
                                                        <h2 class="mb-0 text-dark">456</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row">
                                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
                                    <div class="card card-img-holder">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1">Total Purchase</p>
                                                <h1 class="mb-0 text-dark mainvalue">$7,483</h1>
                                            </div>
                                            <div>
                                                <span class="pie"
                                                    data-peity='{ "fill": ["#467fcf", "#ebe9f7"]}'>0.52/1.561</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
                                    <div class="card card-img-holder">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1">Total Profits</p>
                                                <h1 class="mb-0 text-dark mainvalue">$6,129</h1>
                                            </div>
                                            <div>
                                                <span class="pie"
                                                    data-peity='{ "fill": ["#5eba00", "#ebe9f7"]}'>226/360</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
                                    <div class="card card-img-holder">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1">Total sales</p>
                                                <h1 class="mb-0 text-dark mainvalue">$6,129</h1>
                                            </div>
                                            <div>
                                                <span class="pie"
                                                    data-peity='{ "fill": ["#ff7708", "#ebe9f7"]}'>226/360</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
                                    <div class="card card-img-holder">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1">Total Orders</p>
                                                <h1 class="mb-0 text-dark mainvalue">$6,129</h1>
                                            </div>
                                            <div>
                                                <span class="pie"
                                                    data-peity='{ "fill": ["#f35e90", "#ebe9f7"]}'>226/360</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1">Total Orders</p>
                                                <h2 class="mb-0 text-dark mainvalue">6,895</h2>
                                            </div>
                                            <span class="bg-primary-transparent icon-service text-primary ">
                                                <i class="si si-briefcase fs-5"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1">Total Products</p>
                                                <h2 class="mb-0 text-dark mainvalue">8,379</h2>
                                            </div>
                                            <span class="bg-success-transparent icon-service text-success">
                                                <i class="si si-layers fs-5"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1">Total Feedbacks</p>
                                                <h2 class="mb-0 text-dark mainvalue">1,345</h2>
                                            </div>
                                            <span class="bg-danger-transparent icon-service text-danger">
                                                <i class="si si-note fs-5"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1">Total Sold</p>
                                                <h2 class="mb-0 text-dark mainvalue">2,456K</h2>
                                            </div>
                                            <span class="bg-warning-transparent icon-service text-warning">
                                                <i class="si si-basket-loaded fs-5"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row ">
                                <div class="col-lg-12">
                                    <div class="card ">
                                        <div class="card-body p-4 text-dark">
                                            <div class="statistics-info">
                                                <div class="row text-center">
                                                    <div class="col-lg-3 col-md-6 mt-4 mb-4">
                                                        <div class="counter-status">
                                                            <div class="counter-icon text-danger">
                                                                <i class="si si-people"></i>
                                                            </div>
                                                            <p class="mb-2">Employees</p>
                                                            <h2 class="counter text-primary mb-0">2569</h2>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 mt-4 mb-4">
                                                        <div class="counter-status">
                                                            <div class="counter-icon border-danger">
                                                                <i class="si si-rocket text-danger"></i>
                                                            </div>
                                                            <p class="mb-2">Total Sales</p>
                                                            <h2 class="counter text-danger mb-0">1765</h2>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6  mt-4 mb-4">
                                                        <div class="counter-statuss">
                                                            <div class="counter-icon border-success">
                                                                <i class="si si-docs text-success"></i>
                                                            </div>
                                                            <p class="mb-2">Total Projects</p>
                                                            <h2 class="counter text-success mb-0">846</h2>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 mt-4 mb-4">
                                                        <div class="counter-status">
                                                            <div class="counter-icon border-info">
                                                                <i class="si si-graph text-info"></i>
                                                            </div>
                                                            <p class="mb-2">Growth</p>
                                                            <h2 class="counter text-info mb-0">7253</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row">
                                <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>First call resolution</h5>
                                            <h2 class="mb-2">6,382<span class="sparkline_bar1 float-end"></span></h2>
                                            <span class="text-muted-dark"><i class="fa fa-arrow-circle-o-up text-success"></i> 30% Increase</span>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>Unresolved calls</h5>
                                            <h2 class="mb-2">654<span class="sparkline_bar2 float-end"></span></h2>
                                            <span class="text-muted-dark"><i class="fa fa-arrow-circle-o-up  text-success"></i> 10% Increase</span>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>Avg Response time</h5>
                                            <h2 class="mb-2">7,637<span class="sparkline_bar3 float-end"></span></h2>
                                            <span class="text-muted-dark"><i class="fa fa-arrow-circle-o-down  text-danger"></i> 8% Decrease</span>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>Candidates Placed</h5>
                                            <h2 class="mb-2">$7,850<span class="sparkline_bar4 float-end"></span></h2>
                                            <span class="text-muted-dark"><i class="fa fa-arrow-circle-o-up  text-success"></i> 15% Increase</span>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row row-cards">
                                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <div class="card">
                                        <div class="card-body text-center list-icons">
                                            <i class="si si-briefcase fs-2 text-primary"></i>
                                            <p class="card-text mt-3 mb-3">Total Projects</p>
                                            <p class="h1 text-center  text-primary">459</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <div class="card">
                                        <div class="card-body text-center list-icons">
                                            <i class="si si-basket-loaded fs-2 text-secondary"></i>
                                            <p class="card-text mt-3 mb-3">New Sales</p>
                                            <p class="h1 text-center  text-secondary">262</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <div class="card">
                                        <div class="card-body text-center list-icons">
                                            <i class="si si-people fs-2 text-warning"></i>
                                            <p class="card-text mt-3 mb-3">Employees</p>
                                            <p class="h1 text-center  text-warning">789</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                    <div class="card">
                                        <div class="card-body text-center list-icons">
                                            <i class="si si-eye fs-2 text-success"></i>
                                            <p class="card-text mt-3 mb-3">Customer Visitis</p>
                                            <p class="h1 text-center text-success">2635</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row row-cards">
                                <div class="col-sm-12 col-lg-6 col-md-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h4>Total Participations</h4>
                                            <h1 class="mb-1 text-dark">4598</h1>
                                            <p class="text-muted-dark"><span class="text-purple"><i class="fa fa-arrow-up text-success mx-1"></i>23%
                                                    increase</span> in Last week</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-12 col-lg-6 col-md-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h4>Contribution</h4>
                                            <h1 class="mb-1">789</h1>
                                            <p class="text-muted-dark"><span class="text-purple"><i class="fa fa-arrow-up text-blue"></i> 2.15%
                                                    less</span> than 1 year ago</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row ">
                                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h5 class="mb-3 fw-600">Gross profit Margin</h5>
                                            <div class="chart-circle" data-value="0.75" data-thickness="10"
                                                data-color="rgba(96, 82, 159,0.9)">
                                                <div class="chart-circle-value">
                                                    <div class="text-xl">75% </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h5 class="mb-3 fw-600">Opex Ratio</h5>
                                            <div class="chart-circle" data-value="0.55" data-thickness="10"
                                                data-color="rgba(50, 202, 254,0.9)">
                                                <div class="chart-circle-value">
                                                    <div class="text-xl">55%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h5 class="mb-3 fw-600">Operating Profit Margin</h5>
                                            <div class="chart-circle" data-value="0.30" data-thickness="10"
                                                data-color="rgba(255, 204, 0, 0.9)">
                                                <div class="chart-circle-value">
                                                    <div class="text-xl">30%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h5 class="mb-3 fw-600">Net Profit Margin</h5>
                                            <div class="chart-circle" data-value="0.45" data-thickness="10"
                                                data-color="rgba(34, 192, 60,0.9)">
                                                <div class="chart-circle-value">
                                                    <div class="text-xl">45%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row row-cards">
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xl-3 ">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <div>
                                                    <p class="mb-1">Total Projects</p>
                                                    <h1 class="mb-0">10,456</h1>
                                                </div>
                                                <span><i class="fe fe-file-text fs-3 text-white bg-gradient-primary p-3 brround"></i></span>
                                            </div>
                                            <div class="progress progress-md mt-1 h-2">
                                                <div class="progress-bar w-70 bg-gradient-primary"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <div>
                                                    <p class="mb-1">Projects Submitted</p>
                                                    <h1 class="mb-0">5,356</h1>
                                                </div>
                                                <span><i class="fe fe-thumbs-up fs-3 text-white bg-gradient-secondary p-3 brround"></i></span>
                                            </div>
                                            <div class="progress progress-md mt-1 h-2">
                                                <div class="progress-bar w-50  bg-gradient-secondary"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <div>
                                                    <p class="mb-1">Ongoing Projects</p>
                                                    <h1 class="mb-0">2,345</h1>
                                                </div>
                                                <span><i class="fe fe-activity fs-3 text-white bg-gradient-info p-3 brround"></i></span>
                                            </div>
                                            <div class="progress progress-md mt-1 h-2">
                                                <div class="progress-bar w-30 bg-info"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <div>
                                                    <p class="mb-1">Task Completed</p>
                                                    <h1 class="mb-0">2,678</h1>
                                                </div>
                                                <span><i class="fe fe-check-circle fs-3 text-white bg-gradient-warning p-3 brround"></i></span>
                                            </div>
                                            <div class="progress progress-md mt-1 h-2">
                                                <div class="progress-bar  progress-bar-animated w-60 bg-warning"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row row-cards">
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-counter bg-gradient-purple">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-4 mb-0 text-white">
                                                        <h3 class="mb-0">80,956</h3>
                                                        <p class="text-white mt-1">Total Graph </p>
                                                    </div>
                                                </div>
                                                <div class="col-4 my-auto">
                                                    <i class="fa fa-line-chart fs-1 me-1 float-end text-white-transparent"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-counter bg-gradient-secondary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-4 mb-0 text-white">
                                                        <h3 class="mb-0">54,234</h3>
                                                        <p class="text-white mt-1">Requesting Projects </p>
                                                    </div>
                                                </div>
                                                <div class="col-4 my-auto">
                                                    <i class="fa fa-sign-out float-end fs-1 me-1 text-white-transparent"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-counter bg-gradient-warning">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-4 mb-0 text-white">
                                                        <h3 class="mb-0">25,789</h3>
                                                        <p class="text-white mt-1 ">Requests Receiving</p>
                                                    </div>
                                                </div>
                                                <div class="col-4 my-auto">
                                                    <i class="fa fa-reply-all float-end fs-1 me-1 text-white-transparent"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-counter bg-gradient-success">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-4 mb-0 text-white">
                                                        <h3 class="mb-0">34,762</h3>
                                                        <p class="text-white mt-1">Supported projects </p>
                                                    </div>
                                                </div>
                                                <div class="col-4 my-auto">
                                                    <i class="fa fa-suitcase float-end fs-1 me-1 text-white-transparent"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row row-cards">
                                <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body text-center">
                                            <h5 class="mb-5">Tournaments</h5>
                                            <span class="bar"
                                                data-peity='{ "fill": ["#ff695c", "#ff4f7b"]}'>6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body text-center">
                                            <h5 class="mb-5">Participating IN Games</h5>
                                            <span class="bar"
                                                data-peity='{ "fill": ["#32cafe ", "#3582ec"]}'>5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,3,7,2,9</span>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body text-center ">
                                            <h5 class="mb-5">Monthly Players</h5>
                                            <span class="bar"
                                                data-peity='{ "fill": ["#ecd53e", "#efaf28"]}'>3,7,9,4,2,8,4,6,4,9,2,3,9,4,1,7,3,9,8,4,5</span>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6">
                                    <div class="card text-center">
                                        <div class="card-body text-center">
                                            <h5 class="mb-5">Weekly Players</h5>
                                            <span class="bar"
                                                data-peity='{ "fill": ["#63d457", "#3cbf2d"]}'>2,7,3,9,4,5,2,8,4,6,5,2,8,4,7,2,4,6,4,8,4</span>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="mb-1">568</h3>
                                            <p class="text-muted-dark mb-0">Online Projects</p>
                                            <div class="progress progress-sm mt-2">
                                                <div
                                                    class="progress-bar progress-bar-striped h-2 progress-bar-animated bg-primary w-35">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="mb-1">761</h3>
                                            <p class="text-muted-dark mb-0">Sales Of Projects</p>
                                            <div class="progress progress-sm mt-2">
                                                <div
                                                    class="progress-bar progress-bar-striped h-2 progress-bar-animated bg-warning w-55">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="mb-1">234</h3>
                                            <p class="text-muted-dark mb-0"> Offline Projects</p>
                                            <div class="progress progress-sm mt-2">
                                                <div
                                                    class="progress-bar progress-bar-striped h-2 progress-bar-animated bg-info w-70">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="mb-1">897</h3>
                                            <p class="text-muted-dark mb-0"> Income</p>
                                            <div class="progress progress-sm mt-2">
                                                <div
                                                    class="progress-bar progress-bar-striped h-2 progress-bar-animated bg-secondary w-85">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-md-6 col-xl-3 col-lg-6">
                                    <div class="card text-center bg-gradient-primary text-white">
                                        <div class="card-body">
                                            <h5>Monthly Orders</h5>
                                            <h3 class="display-5 mb-1 mt-1">1432</h3>
                                            <div class="d-flex align-items-center justify-content-center"><i class="si si-arrow-up-circle text-white"></i> <span
                                                    class="text-white mx-1">25%</span> Increase</div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-md-6 col-xl-3 col-lg-6">
                                    <div class="card text-center bg-gradient-success text-white">
                                        <div class="card-body">
                                            <h5>Monthly Sales</h5>
                                            <h3 class="display-5 mb-1 mt-1">1452</h3>
                                            <div class="d-flex align-items-center justify-content-center"><i class="si si-arrow-up-circle text-white"></i> <span
                                                    class="text-white mx-1">54%</span> Increase</div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-md-6 col-xl-3 col-lg-6">
                                    <div class="card text-center bg-gradient-info text-white">
                                        <div class="card-body">
                                            <h5>Monthly Profit</h5>
                                            <h3 class="display-5 mb-1 mt-1">$13288</h3>
                                            <div class="d-flex align-items-center justify-content-center"><i class="si si-arrow-up-circle text-white"></i> <span
                                                    class="text-white mx-1">22%</span> Increase</div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-md-6 col-xl-3 col-lg-6">
                                    <div class="card text-center bg-gradient-danger text-white">
                                        <div class="card-body">
                                            <h5> Monthly revenue</h5>
                                            <h3 class="display-5 mb-1 mt-1">$7632</h3>
                                            <div class="d-flex align-items-center justify-content-center"><i class="si si-arrow-up-circle text-white"></i> <span
                                                    class="text-white mx-1">12%</span> Increase</div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xl-3">
                                    <div class="card card-img- holder">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1">Services</p>
                                                <h1 class="mb-0">124</h1>
                                            </div>
                                            <span class="text-primary ">
                                                <i class="bi bi-cart-check fs-2"></i>
                                            </span>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-muted mb-0 d-flex align-items-center"><i
                                                class="si si-arrow-down-circle text-warning me-1"
                                                aria-hidden="true"></i>Daily Orders</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1">Sources</p>
                                                <h1 class="mb-0">$124</h1>
                                            </div>
                                            <span class="text-primary">
                                                <i class="bi bi-card-checklist fs-2"></i>
                                            </span>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-muted mb-0 d-flex align-items-center"><i
                                                class="si si-arrow-up-circle text-success me-1"></i>Less Sales</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1">Income</p>
                                                <h1 class="mb-0">21%</h1>
                                            </div>
                                            <span class="text-primary">
                                                <i class="bi bi-bag-check fs-2"></i>
                                            </span>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-muted mb-0 d-flex align-items-center"><i
                                            class="si si-exclamation text-info me-1"></i>From Last Month</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-lg-6 col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1">Followers</p>
                                                <h1 class="mb-0">24K</h1>
                                            </div>
                                            <span class="text-primary">
                                                <i class="bi bi-person-plus fs-2"></i>
                                            </span>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-muted mb-0 d-flex align-items-center"><i
                                                class="si si-check me-1 text-primary"></i>
                                                Recent History
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body text-center list-icons">
                                            <h3 class="card-text mt-1 mb-3">Clients</h3>
                                            <i class="bi bi-people fs-2 text-primary"></i>
                                            <p class="h3 mt-3 text-center  text-dark">159</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body text-center list-icons">
                                            <h3 class="card-text mt-1 mb-3">Customers</h3>
                                            <i class="bi bi-person-check fs-2 text-primary"></i>
                                            <p class="h3 mt-3 text-center text-dark">1452</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body text-center list-icons">
                                            <h3 class="card-text mt-1 mb-3">Email</h3>
                                            <i class="bi bi-envelope fs-2 text-primary"></i>
                                            <p class="h3 mt-3 text-center text-dark">154</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body text-center list-icons">
                                            <h3 class="card-text mt-1 mb-3">Shares</h3>
                                            <i class="bi bi-share fs-2 text-primary"></i>
                                            <p class="h3 mt-3 text-center text-dark">452</p>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-6 col-sm-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="h1 m-0"><i
                                                    class="mdi mdi-account-multiple-outline text-primary mx-2"></i><strong>90</strong>
                                            </div>
                                            <div class="text-muted mb-0">Work</div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-6 col-sm-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="h1 m-0"><i
                                                    class="mdi mdi-cash-multiple text-primary mx-2"></i><strong>82</strong></div>
                                            <div class="text-muted mb-0">Business</div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-6 col-sm-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="h1 m-0"><i class="mdi mdi-chart-line text-primary mx-2"></i><strong>85</strong></div>
                                            <div class="text-muted mb-0"> Research</div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-6 col-sm-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="h1 m-0"><i class="mdi mdi-account-outline text-primary"></i><strong>42</strong></div>
                                            <div class="text-muted mb-0">Estimation</div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="card bg-primary">
                                        <div class="card-body">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h6 class="text-white">Voice Process</h6>
                                                    <h2 class="text-white m-0 ">565</h2>
                                                </div>
                                                <div class="ms-auto">
                                                    <span class="text-white display-6"><i
                                                            class="fa fa-file-text-o fs-1"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="card bg-info">
                                        <div class="card-body">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h6 class="text-white">Graphs of Sales</h6>
                                                    <h2 class="text-white m-0 ">67k</h2>
                                                </div>
                                                <div class="ms-auto">
                                                    <span class="text-white display-6"><i
                                                            class="fa fa-signal fs-1"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="card bg-success">
                                        <div class="card-body">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h6 class="text-white">Profits Of Projects</h6>
                                                    <h2 class="text-white m-0 ">71K</h2>
                                                </div>
                                                <div class="ms-auto">
                                                    <span class="text-white display-6"><i
                                                            class="fa fa-usd fs-1"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="card bg-danger">
                                        <div class="card-body">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h6 class="text-white">Services</h6>
                                                    <h2 class="text-white m-0 ">192</h2>
                                                </div>
                                                <div class="ms-auto">
                                                    <span class="text-white display-6"><i
                                                            class="fa fa-newspaper-o fs-1"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row">
                                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 m-b-3">
                                    <div class="card">
                                        <div class="">
                                            <div class="row">
                                                <!-- row -->
                                                <div class="col-12">
                                                    <div class="p-2 bg-primary br-tr-7 br-tl-7">
                                                        <div class="text-center text-white social mt-3">
                                                            <h4>Shares of Projects</h4>
                                                        </div>
                                                    </div>
                                                    <div class="mt-7 chart-circle chart-circle-md donutShadow"
                                                        data-value="0.67" data-thickness="20" data-color="#467fcf ">
                                                        <div class="chart-circle-value fs"><i
                                                                class="fa fa-share-square-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-body mt-4">
                                                        <div class="d-flex  align-items-center">
                                                            <div>
                                                                <h4 class="font-medium mb-1">10%</h4>
                                                                <p class="mb-0"><span class="text-primary"><i
                                                                            class="fa fa-plus me-1"></i>Positive</span></p>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <h4 class="font-medium mb-1">20%</h4>
                                                                <p class=" mb-0"><span class="text-danger"><i
                                                                            class="fa fa-minus me-1"></i> Negative</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- row end -->
                                        </div>
                                    </div>
                                </div><!-- col end -->

                                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 m-b-3">
                                    <div class="card">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="p-2 bg-blue br-tr-7 br-tl-7">
                                                        <div class="text-center text-white social mt-3">
                                                            <h4>Total Projects</h4>
                                                        </div>
                                                    </div>
                                                    <div class="mt-7 chart-circle chart-circle-md donutShadow"
                                                        data-value="0.67" data-thickness="20" data-color="#32cafe ">
                                                        <div class="chart-circle-value fs"><i
                                                                class="fa fa-envelope-open-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-body mt-4">
                                                        <div class="d-flex  align-items-center">
                                                            <div>
                                                                <h4 class="font-medium mb-1">10%</h4>
                                                                <p class="mb-0"><span class="text-primary"><i
                                                                            class="fa fa-plus me-1"></i>Positive</span></p>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <h4 class="font-medium mb-1">20%</h4>
                                                                <p class=" mb-0"><span class="text-danger"><i
                                                                            class="fa fa-minus me-1"></i> Negative</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->

                                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 m-b-3">
                                    <div class="card">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="p-2 bg-yellow br-tr-7 br-tl-7">
                                                        <div class="text-center text-white social mt-3">
                                                            <h4>Users Of Projects</h4>
                                                        </div>
                                                    </div>
                                                    <div class="mt-7 chart-circle chart-circle-md donutShadow"
                                                        data-value="0.67" data-thickness="20" data-color="#fdb901 ">
                                                        <div class="chart-circle-value fs"><i class="fa fa-users"></i></div>
                                                    </div>
                                                    <div class="card-body mt-4">
                                                        <div class="d-flex  align-items-center">
                                                            <div>
                                                                <h4 class="font-medium mb-1">10%</h4>
                                                                <p class="mb-0"><span class="text-primary"><i
                                                                            class="fa fa-plus me-1"></i>Positive</span></p>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <h4 class="font-medium mb-1">20%</h4>
                                                                <p class=" mb-0"><span class="text-danger"><i
                                                                            class="fa fa-minus me-1"></i> Negative</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->

                                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6 m-b-3">
                                    <div class="card">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="p-2 bg-green br-tr-7 br-tl-7">
                                                        <div class="text-center text-white social mt-3">
                                                            <h4>Review Projects</h4>
                                                        </div>
                                                    </div>
                                                    <div class="mt-7 chart-circle chart-circle-md donutShadow"
                                                        data-value="0.67" data-thickness="20" data-color="#5ed84f ">
                                                        <div class="chart-circle-value fs"><i class="fa fa-repeat"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-body mt-4">
                                                        <div class="d-flex  align-items-center">
                                                            <div>
                                                                <h4 class="font-medium mb-1">10%</h4>
                                                                <p class="mb-0"><span class="text-primary"><i
                                                                            class="fa fa-plus me-1"></i>Positive</span></p>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <h4 class="font-medium mb-1">20%</h4>
                                                                <p class=" mb-0"><span class="text-danger"><i
                                                                            class="fa fa-minus me-1"></i> Negative</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Best Pictures for Today</h3>
                                        </div>
                                        <div class="card-body">
                                            <ul id="lightgallery" class="list-unstyled row">
                                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                                    data-responsive="{{asset('build/assets/images/photos/1.jpg')}}"
                                                    data-src="{{asset('build/assets/images/photos/1.jpg')}}"
                                                    data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                    <a href="javascript:void(0)" class="d-block link-overlay">
                                                        <img class="d-block img-fluid w-100 br-7"
                                                            src="{{asset('build/assets/images/photos/1.jpg')}}" alt="best-pictures">
                                                        <span class="link-overlay-bg rounded">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                                    data-responsive="{{asset('build/assets/images/photos/2.jpg')}}"
                                                    data-src="{{asset('build/assets/images/photos/2.jpg')}}"
                                                    data-sub-html="<h4>Gallery Image 2</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                    <a href="javascript:void(0)" class="d-block link-overlay">
                                                        <img class="d-block img-fluid w-100 br-7"
                                                            src="{{asset('build/assets/images/photos/2.jpg')}}" alt="best-pictures">
                                                        <span class="link-overlay-bg rounded">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                                    data-responsive="{{asset('build/assets/images/photos/3.jpg')}}"
                                                    data-src="{{asset('build/assets/images/photos/3.jpg')}}"
                                                    data-sub-html="<h4>Gallery Image 3</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                    <a href="javascript:void(0)" class="d-block link-overlay">
                                                        <img class="d-block img-fluid w-100 br-7"
                                                            src="{{asset('build/assets/images/photos/3.jpg')}}" alt="best-pictures">
                                                        <span class="link-overlay-bg rounded">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                                    data-responsive="{{asset('build/assets/images/photos/4.jpg')}}"
                                                    data-src="{{asset('build/assets/images/photos/4.jpg')}}"
                                                    data-sub-html="<h4>Gallery Image 4</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                    <a href="javascript:void(0)" class="d-block link-overlay">
                                                        <img class="d-block img-fluid w-100 br-7"
                                                            src="{{asset('build/assets/images/photos/4.jpg')}}" alt="best-pictures">
                                                        <span class="link-overlay-bg rounded">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                                    data-responsive="{{asset('build/assets/images/photos/5.jpg')}}"
                                                    data-src="{{asset('build/assets/images/photos/5.jpg')}}"
                                                    data-sub-html="<h4>Gallery Image 5</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                    <a href="javascript:void(0)" class="d-block link-overlay">
                                                        <img class="d-block img-fluid w-100 br-7"
                                                            src="{{asset('build/assets/images/photos/5.jpg')}}" alt="best-pictures">
                                                        <span class="link-overlay-bg rounded">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                                    data-responsive="{{asset('build/assets/images/photos/5.jpg')}}"
                                                    data-src="{{asset('build/assets/images/photos/6.jpg')}}"
                                                    data-sub-html="<h4>Gallery Image 6</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                    <a href="javascript:void(0)" class="d-block link-overlay">
                                                        <img class="d-block img-fluid w-100 br-7"
                                                            src="{{asset('build/assets/images/photos/6.jpg')}}" alt="best-pictures">
                                                        <span class="link-overlay-bg rounded">
                                                            <i class="fa fa-search"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row row-cards">
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card overflow-hidden">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Price</h3>
                                            <a class="btn btn-sm btn-primary" href="javascript:void(0);">View</a>
                                        </div>
                                        <div class="card-body ">
                                            <h5 class="mb-1">Total Price</h5>
                                            <h3 class="text-dark count mb-2 font-30">4,657</h3>
                                            <div class="progress progress-sm mt-0 mb-2">
                                                <div class="progress-bar bg-gradient-primary w-75" role="progressbar"></div>
                                            </div>
                                            <div class="text-muted-dark"><i class="fa fa-caret-up text-green me-1"></i>10% increases</div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class=" col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card overflow-hidden">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Stock</h3>
                                            <a class="btn btn-sm btn-secondary" href="javascript:void(0);">View</a>
                                        </div>
                                        <div class="card-body ">
                                            <h5 class="mb-1">Total Stock</h5>
                                            <h3 class="text-dark count mb-2 font-30">2,592</h3>
                                            <div class="progress progress-sm mt-0 mb-2">
                                                <div class="progress-bar bg-gradient-secondary w-75" role="progressbar"></div>
                                            </div>
                                            <div class="text-muted-dark"><i class="fa fa-caret-down text-danger me-1"></i>12% decrease</div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class=" col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card overflow-hidden">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Revenue</h3>
                                            <a class="btn btn-sm btn-warning" href="javascript:void(0);">View</a>
                                        </div>
                                        <div class="card-body ">
                                            <h5 class="mb-1">Total Revenue</h5>
                                            <h3 class="text-dark count mb-2 font-30">3,517</h3>
                                            <div class="progress progress-sm mt-0 mb-2">
                                                <div class="progress-bar bg-gradient-warning w-75" role="progressbar"></div>
                                            </div>
                                            <div class="text-muted-dark"><i class="fa fa-caret-down text-danger me-1"></i>5% decrease</div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class=" col-sm-6 col-md-6  col-lg-6 col-xl-3">
                                    <div class="card overflow-hidden">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Investiment</h3>
                                            <a class="btn btn-sm btn-danger" href="javascript:void(0);">View</a>
                                        </div>
                                        <div class="card-body ">
                                            <h5 class="mb-1">Total Investiment</h5>
                                            <h3 class="text-dark count mb-2 font-30">5,759</h3>
                                            <div class="progress progress-sm mt-0 mb-2">
                                                <div class="progress-bar bg-gradient-danger w-75" role="progressbar"></div>
                                            </div>
                                            <div class="text-muted-dark"><i class="fa fa-caret-down text-danger me-1"></i>5% decrease</div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row">
                                <div class="col-lg-12 col-xl-4 col-sm-12">
                                    <div class="card  mb-5">
                                        <div class="card-body">
                                            <div class="media mt-0">
                                                <img src="{{asset('build/assets/images/users/female/19.jpg')}}"
                                                    alt="Generic placeholder image"
                                                    class="avatar brround avatar-md me-3">
                                                <div class="media-body lh-1">
                                                    <h5 class="time-title p-0 mb-0 fw-semibold leading-normal">Victoria</h5>
                                                    <span class="fs-13 text-muted-dark">New york, UK</span>
                                                </div>
                                                <button class="btn btn-primary btn-sm d-none d-sm-block me-2 my-auto"><i
                                                        class="fa fa-comments"></i> </button>
                                                <button class="btn btn-info btn-sm d-none d-sm-block my-auto"><i class="fa fa-phone"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-footer text-dark border-top">
                                            Email: <a href="javascript:void(0);">victoriacott@Sparic.com</a>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-lg-12 col-xl-4 col-sm-12">
                                    <div class="card mb-5">
                                        <div class="card-body">
                                            <div class="media mt-0">
                                                <img src="{{asset('build/assets/images/users/male/32.jpg')}}"
                                                    alt="Generic placeholder image"
                                                    class="avatar brround avatar-md me-3">
                                                <div class="media-body lh-1">
                                                    <h5 class="mb-0 fw-semibold leading-normal">Thomas Jaim
                                                    </h5>
                                                    <span class="text-muted-dark fs-13">Sparic, UN</span>
                                                </div>
                                                <button class="btn btn-primary btn-sm d-none d-sm-block me-2 my-auto"><i
                                                        class="fa fa-comments"></i> </button>
                                                <button class="btn btn-info btn-sm d-none d-sm-block my-auto"><i class="fa fa-phone"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-footer text-dark border-top">
                                            Email: <a href="javascript:void(0);">thomasjaim@Sparic.com</a>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-lg-12 col-xl-4 col-sm-12">
                                    <div class="card mb-5">
                                        <div class="card-body">
                                            <div class="media mt-0">
                                                <img src="{{asset('build/assets/images/users/female/21.jpg')}}"
                                                    alt="Generic placeholder image"
                                                    class="avatar brround avatar-md me-3">
                                                <div class="media-body lh-1">
                                                    <h5 class="time-title p-0 fw-semibold leading-normal mb-0">Rebbaca
                                                        wisely
                                                    </h5>
                                                    <span class="text-muted-dark fs-13">Japan, UN</span>
                                                </div>
                                                <button class="btn btn-primary btn-sm d-none d-sm-block me-2 my-auto"><i
                                                        class="fa fa-comments"></i> </button>
                                                <button class="btn btn-info btn-sm d-none d-sm-block my-auto"><i class="fa fa-phone"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-footer text-dark border-top">
                                            Email: <a href="javascript:void(0);">rebbacawisely@Sparic.com</a>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row">
                                <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 m-b-3">
                                    <div class="card">
                                        <div class="card-header p-0">
                                            <div class="facebook p-4 br-tr-7 br-tl-7">
                                                <div class="text-center text-white social">
                                                    <i class="fa fa-facebook"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body mt-0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h3 class="font-medium mb-1">50k</h3>
                                                    <h5 class="text-muted mb-0">Following</h5>
                                                </div>
                                                <div>
                                                    <h3 class="font-medium mb-1">21k</h3>
                                                    <h5 class="text-muted mb-0">Friends</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 m-b-3">
                                    <div class="card">
                                        <div class="card-header p-0">
                                            <div class="twitter p-4 br-tr-7 br-tl-7">
                                                <div class="text-center text-white social">
                                                    <i class="fa fa-twitter"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body mt-0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h3 class="font-medium mb-1">92k</h3>
                                                    <h5 class="text-muted mb-0">Following</h5>
                                                </div>
                                                <div>
                                                    <h3 class="font-medium mb-1">14k</h3>
                                                    <h5 class="text-muted mb-0">Friends</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 m-b-3">
                                    <div class="card">
                                        <div class="card-header p-0">
                                            <div class="linkedin p-4 br-tr-7 br-tl-7">
                                                <div class="text-center text-white social">
                                                    <i class="fa fa-linkedin"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body mt-0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h3 class="font-medium mb-1">34k</h3>
                                                    <h5 class="text-muted mb-0">Following</h5>
                                                </div>
                                                <div>
                                                    <h3 class="font-medium mb-1">19k</h3>
                                                    <h5 class="text-muted mb-0">Friends</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 m-b-3">
                                    <div class="card">
                                        <div class="card-header p-0">
                                            <div class="instagram p-4 br-tr-7 br-tl-7">
                                                <div class="text-center text-white social">
                                                    <i class="fa fa-instagram"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body mt-0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h3 class="font-medium mb-1">143k</h3>
                                                    <h5 class="text-muted mb-0">Following</h5>
                                                </div>
                                                <div>
                                                    <h3 class="font-medium mb-1">43k</h3>
                                                    <h5 class="text-muted mb-0">Friends</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row">
                                <div class="col-md-6 col-lg-12 col-xl-4 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Category</h3>
                                        </div>
                                        <div>
                                            <table class="table card-table ">
                                                <tr class="border-bottom">
                                                    <td class="border-top-0">Admin Template</td>
                                                    <td class="text-end border-top-0">
                                                        <span class="badge bg-primary">29</span>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>Landing Page</td>
                                                    <td class="text-end">
                                                        <span class="badge bg-success">12</span>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>Backend UI</td>
                                                    <td class="text-end">
                                                        <span class="badge bg-danger">12</span>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>Personal Blog</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-default">60</span>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>E-mail Templates</td>
                                                    <td class="text-end">
                                                        <span class="badge bg-warning">15</span>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>Corporate Website</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-cyan">45</span>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td> Educational Templates</td>
                                                    <td class="text-end">
                                                        <span class="badge bg-info">35</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Valuable Customers
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-4 align-items-center br-5 mb-3">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <img src="{{asset('build/assets/images/users/female/20.jpg')}}" class="avatar avatar-md br-7 cover-image" alt="person-image">
                                                    <div class="p-1 ms-3">
                                                        <h6 class="mb-1 fw-semibold">Jordon Matey</h6>
                                                        <p class="mb-0 text-muted fs-12">matey@gmail.com</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="badge badge-gradient-success shadow">+ $246</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mb-4 align-items-center br-5 mb-3">
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
                                            <div class="d-flex justify-content-between mb-4 align-items-center br-5 mb-3">
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
                                            <div class="d-flex justify-content-between mb-4 align-items-center br-5 mb-3">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <img src="{{asset('build/assets/images/users/male/30.jpg')}}" class="avatar avatar-md br-7 cover-image" alt="person-image">
                                                    <div class="p-1 ms-3">
                                                        <h6 class="mb-1 fw-semibold">Sunee Jun</h6>
                                                        <p class="mb-0 text-muted fs-12">sunee24@gmail.com</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="badge badge-gradient-secondary shadow">- $168</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center br-5">
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
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-4 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Browser Usage</h3>
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
                            </div>
                            <!-- row end -->

                            <!-- row -->
                            <div class="row">
                                <div class="col-xl-4 col-lg-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Customer Feedbacks</h3>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="list-group list-lg-group list-group-flush">
                                                <a class="list-group-item list-group-item-action py-4" href="javascript:void(0);">
                                                    <div class="media mt-0">
                                                        <img class="avatar-lg rounded-circle me-3"
                                                            src="{{asset('build/assets/images/users/female/25.jpg')}}"
                                                            alt="Image description">
                                                        <div class="media-body">
                                                            <div class="d-md-flex align-items-center">
                                                                <h4 class="mb-1 text-dark">
                                                                    Samantha Wilson
                                                                </h4>
                                                                <small class="text-primary fw-semibold fw-semibold ms-md-auto"><i
                                                                        class="fe fe-calendar me-1"></i> 28 Feb 2019</small>
                                                            </div>

                                                            <p class="mb-0 text-muted">Itaque earum rerum hic
                                                                reiciendis
                                                                voluptatibus.</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="list-group-item list-group-item-action py-4" href="javascript:void(0);">
                                                    <div class="media mt-0">
                                                        <img class="avatar-lg rounded-circle me-3"
                                                            src="{{asset('build/assets/images/users/male/26.jpg')}}" alt="Image description">
                                                        <div class="media-body">
                                                            <div class="d-md-flex align-items-center">
                                                                <h4 class="mb-1 text-dark">
                                                                    Kevin North
                                                                </h4>
                                                                <small class="text-primary fw-semibold fw-semibold ms-md-auto"><i
                                                                        class="fe fe-calendar me-1"></i> 26 Feb 2019</small>
                                                            </div>

                                                            <p class="mb-0 text-muted">Itaque earum rerum hic tenetur
                                                                reiciendis
                                                                voluptatibus.</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="list-group-item list-group-item-action py-4" href="javascript:void(0);">
                                                    <div class="media mt-0">
                                                        <img class="avatar-lg rounded-circle me-3"
                                                            src="{{asset('build/assets/images/users/male/25.jpg')}}"
                                                            alt="Image description">
                                                        <div class="media-body">
                                                            <div class="d-md-flex align-items-center">
                                                                <h4 class="mb-1 text-dark">
                                                                    Steven Fisher
                                                                </h4>
                                                                <small class="text-primary fw-semibold fw-semibold ms-md-auto"><i
                                                                        class="fe fe-calendar me-1"></i> 26 Feb 2019</small>
                                                            </div>

                                                            <p class="mb-0 text-muted">Itaque
                                                                reiciendis
                                                                voluptatibus.</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="list-group-item list-group-item-action py-4" href="javascript:void(0);">
                                                    <div class="media mt-0">
                                                        <img class="avatar-lg rounded-circle me-3"
                                                            src="{{asset('build/assets/images/users/male/33.jpg')}}"
                                                            alt="Image description">
                                                        <div class="media-body">
                                                            <div class="d-md-flex align-items-center">
                                                                <h4 class="mb-1 text-dark">
                                                                    Steven Fisher
                                                                </h4>
                                                                <small class="text-primary fw-semibold ms-md-auto"><i
                                                                        class="fe fe-calendar me-1"></i> 26 Feb 2019</small>
                                                            </div>

                                                            <p class="mb-0 text-muted">Itaque earum rerum
                                                                reiciendis
                                                                voluptatibus.</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="list-group-item list-group-item-action br-br-7 br-bl-7" href="javascript:void(0);">
                                                    <div class="media mt-0">
                                                        <img class="avatar-lg rounded-circle me-3"
                                                            src="{{asset('build/assets/images/users/female/23.jpg')}}"
                                                            alt="Image description">
                                                        <div class="media-body">
                                                            <div class="d-md-flex align-items-center">
                                                                <h4 class="mb-1 text-dark">
                                                                    Joanne Taylor
                                                                </h4>
                                                                <small class="text-primary fw-semibold ms-md-auto"><i
                                                                        class="fe fe-calendar me-1"></i> 25 Feb 2019</small>
                                                            </div>

                                                            <p class="mb-0 text-muted">Itaque a sapiente
                                                                reiciendis
                                                                voluptatibus.</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Top Ongoing Projects</h3>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="list-group projects-list">
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action flex-column align-items-start border-top-0">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <p class="mb-1 text-dark fw-sembold">PSD Projects</p>
                                                        <span class="text-danger badge bg-danger-transparent my-auto"><i class="fa fa-caret-down me-1"></i>5
                                                            days
                                                            ago</span>
                                                    </div>
                                                    <p class="mb-0 text-muted-dark">Started:17-02-2019</p>
                                                    <small class="text-muted">Donec id elit non mi porta gravida at eget metus. Maecenas sed
                                                        diam
                                                        eget risus varius blandit.</small>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <p class="mb-1 text-dark fw-sembold">Wordpress Projects</p>
                                                        <small class="text-success badge bg-success-transparent my-auto"><i class="fa fa-caret-up me-1"></i>2
                                                            days
                                                            ago</small>
                                                    </div>
                                                    <p class="mb-0 text-muted-dark">Started:15-02-2019</p>
                                                    <small class="text-muted">Donec id elit non mi porta gravida at eget metus. Maecenas sed
                                                        diam
                                                        eget risus varius blandit.</small>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <p class="mb-1 text-dark fw-sembold">HTML &amp; CSS3 Projects</p>
                                                        <small class="text-danger badge bg-danger-transparent my-auto"><i class="fa fa-caret-down me-1"></i>1
                                                            days
                                                            ago</small>
                                                    </div>
                                                    <p class="mb-0 text-muted-dark">Started:26-02-2019</p>
                                                    <small class="text-muted">Donec id elit non mi porta gravida at eget metus. Maecenas sed
                                                        diam
                                                        eget risus varius blandit.</small>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action flex-column align-items-start br-br-7 br-bl-7">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <p class="mb-1 text-dark fw-sembold">Java Projects</p>
                                                        <small class="text-success badge bg-success-transparent my-auto"><i class="fa fa-caret-up me-1"></i>10
                                                            days
                                                            ago</small>
                                                    </div>
                                                    <p class="mb-0 text-muted-dark">Started:06-02-2019</p>
                                                    <small class="text-muted">Donec id elit non mi porta gravida at eget metus. Maecenas sed
                                                        diam
                                                        eget risus varius blandit.</small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- row end -->

@endsection

@section('scripts')

        <!-- GALLERY JS -->
        <script src="{{asset('build/assets/plugins/gallery/picturefill.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lightgallery.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lightgallery-1.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-pager.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-autoplay.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-fullscreen.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-zoom.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-hash.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-share.js')}}"></script>

        <!-- PEITYCHART JS -->
        <script src="{{asset('build/assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/peitychart/peitychart.init.js')}}"></script>

        <!-- COUNTERS JS -->
        <script src="{{asset('build/assets/plugins/counters/counterup.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/counters/waypoints.min.js')}}"></script>
	    <script src="{{asset('build/assets/plugins/counters/counters.js')}}"></script>

@endsection