@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Extension</li>
                                    <li class="breadcrumb-item active" aria-current="page">Services</li>
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
                            <div class="row ">
                                <div class="mb-4">
                                    <h4 class="fw-semibold text-uppercase mb-1">Our services</h4>
                                    <h6 class="fw-semibold text-muted-dark">How our team empowering your success.</h6>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                                    <div class="card service">
                                        <div class="card-body">
                                            <div class="item-box text-center">
                                                <div class="text-center text-primary mb-4"><i class="bi bi-person-check"></i>
                                                </div>
                                                <div class="item-box-wrap">
                                                    <h5 class="mb-2 fw-semibold">Virtual Receptionist</h5>
                                                    <p class="text-default mb-0">Sed ut perspiciatis unde omnis iste natus
                                                        error
                                                        sit voluptatem accusantium</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                                    <div class="card service">
                                        <div class="card-body">
                                            <div class="item-box text-center">
                                                <div class=" text-center text-danger mb-4"><i class="bi bi-calendar2-date"></i></div>
                                                <div class="item-box-wrap">
                                                    <h5 class="mb-2 fw-semibold">Scheduling</h5>
                                                    <p class="text-default mb-0">Sed ut perspiciatis unde omnis iste natus
                                                        error
                                                        sit voluptatem accusantium</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3 ">
                                    <div class="card service">
                                        <div class="card-body">
                                            <div class="item-box text-center">
                                                <div class="text-center  mb-4 text-info"><i class="bi bi-chat-left-text"></i>
                                                </div>
                                                <div class="item-box-wrap">
                                                    <h5 class="mb-2 fw-semibold">Live Text Support</h5>
                                                    <p class="text-default mb-0">Sed ut perspiciatis unde omnis iste natus
                                                        error
                                                        sit voluptatem accusantium</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
                                    <div class="card service">
                                        <div class="card-body">
                                            <div class="item-box text-center">
                                                <div class=" text-center text-success mb-4"><i class="bi bi-box-seam"></i>
                                                </div>
                                                <div class="item-box-wrap">
                                                    <h5 class="mb-2 fw-semibold">Business FrameWork</h5>
                                                    <p class="text-default mb-0">Sed ut perspiciatis unde omnis iste natus
                                                        error
                                                        sit voluptatem accusantium</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-3 feature">
                                                    <div class="fa-stack fa-lg fa-1x border bg-gradient-primary mb-3">
                                                        <i class="fa fa-globe fa-stack-1x text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-9">
                                                    <div class="mt-1">
                                                        <h4 class="fw-semibold">Web design</h4>
                                                        <p class="text-default">It is a long established fact that a reader
                                                            will
                                                            be distracted by the readable content of a page when looking at
                                                            its
                                                            layout.
                                                            The point of using Lorem Ipsum is that it has a more-or-less
                                                            normal
                                                            distribution of letters, as opposed to using 'Content here,
                                                            content
                                                            here',
                                                            making it look like readable English.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-3 feature">
                                                    <div class="fa-stack fa-lg fa-1x border bg-gradient-danger mb-3">
                                                        <i class="fa fa-building-o fa-stack-1x text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-9">
                                                    <div class="mt-1">
                                                        <h4 class="fw-semibold">Web Development</h4>
                                                        <p class="text-default">It is a long established fact that a reader
                                                            will
                                                            be distracted by the readable content of a page when looking at
                                                            its
                                                            layout.
                                                            The point of using Lorem Ipsum is that it has a more-or-less
                                                            normal
                                                            distribution of letters, as opposed to using 'Content here,
                                                            content
                                                            here',
                                                            making it look like readable English.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-3 feature">
                                                    <div class="fa-stack fa-lg fa-1x border bg-gradient-pink mb-3">
                                                        <i class="fa fa-file-word-o fa-stack-1x text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-9">
                                                    <div class="mt-1">
                                                        <h4 class="fw-semibold">Wordpress</h4>
                                                        <p class="text-default">It is a long established fact that a reader
                                                            will
                                                            be distracted by the readable content of a page when looking at
                                                            its
                                                            layout.
                                                            The point of using Lorem Ipsum is that it has a more-or-less
                                                            normal
                                                            distribution of letters, as opposed to using 'Content here,
                                                            content
                                                            here',
                                                            making it look like readable English.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-3 feature">
                                                    <div class="fa-stack fa-lg fa-1x border bg-gradient-blue mb-3">
                                                        <i class="fa fa-camera fa-stack-1x text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-9">
                                                    <div class="mt-1">
                                                        <h4 class="fw-semibold">photography</h4>
                                                        <p class="text-default">It is a long established fact that a reader
                                                            will
                                                            be distracted by the readable content of a page when looking at
                                                            its
                                                            layout.
                                                            The point of using Lorem Ipsum is that it has a more-or-less
                                                            normal
                                                            distribution of letters, as opposed to using 'Content here,
                                                            content
                                                            here',
                                                            making it look like readable English.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-3 feature">
                                                    <div class="fa-stack fa-lg fa-1x border bg-gradient-purple mb-3">
                                                        <i class="fa fa-pencil-square-o fa-stack-1x text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-9">
                                                    <div class="mt-1">
                                                        <h4 class="fw-semibold">Development</h4>
                                                        <p class="text-default">It is a long established fact that a reader
                                                            will
                                                            be distracted by the readable content of a page when looking at
                                                            its
                                                            layout.
                                                            The point of using Lorem Ipsum is that it has a more-or-less
                                                            normal
                                                            distribution of letters, as opposed to using 'Content here,
                                                            content
                                                            here',
                                                            making it look like readable English.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-3 feature">
                                                    <div class="fa-stack fa-lg fa-1x border bg-gradient-success mb-3">
                                                        <i class="fa fa-eercast fa-stack-1x text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-9">
                                                    <div class="mt-1">
                                                        <h4 class="fw-semibold">Android</h4>
                                                        <p class="text-default">It is a long established fact that a reader
                                                            will
                                                            be distracted by the readable content of a page when looking at
                                                            its
                                                            layout.
                                                            The point of using Lorem Ipsum is that it has a more-or-less
                                                            normal
                                                            distribution of letters, as opposed to using 'Content here,
                                                            content
                                                            here',
                                                            making it look like readable English.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row ">
                                <div class="col-lg-12">
                                    <div class="card ">
                                        <div class="card-body p-4 text-dark">
                                            <div class="statistics-info">
                                                <div class="row text-center">
                                                    <div class="col-lg-3 col-md-6 mt-4 mb-4">
                                                        <div class="counter-status">
                                                            <span
                                                                class="bg-danger-transparent icon-service text-danger mb-3">
                                                                <i class="fa fa-users"></i>
                                                            </span>
                                                            <h5>Employees</h5>
                                                            <h2 class="counter text-danger mb-0">2569</h2>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 mt-4 mb-4">
                                                        <div class="counter-status">
                                                            <span class="bg-info-transparent icon-service text-info mb-3">
                                                                <i class="fa fa-bar-chart-o"></i>
                                                            </span>
                                                            <h5>Growth</h5>
                                                            <h2 class="counter text-info mb-0">7253</h2>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6 mt-4 mb-4">
                                                        <div class="counter-status">
                                                            <span
                                                                class="bg-warning-transparent icon-service text-warning mb-3">
                                                                <i class="fa fa-rocket"></i>
                                                            </span>
                                                            <h5>Total Sales</h5>
                                                            <h2 class="counter text-warning mb-0">1765</h2>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-6  mt-4 mb-4">
                                                        <div class="counter-statuss">
                                                            <span
                                                                class="bg-success-transparent icon-service text-success mb-3">
                                                                <i class="fa fa-file-text"></i>
                                                            </span>
                                                            <h5>Total Projects</h5>
                                                            <h2 class="counter text-success mb-0">846</h2>
                                                        </div>
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
                                <div class="col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header border-bottom">
                                            <h3 class="card-title">Our features</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <p class="text-default">There are many variations of passages of Lorem Ipsum
                                                    available, but the majority have suffered alteration in some form, by
                                                    injected humour, or randomised words which don't look even slightly
                                                    believable. If you are going to use a passage of Lorem Ipsum, you need
                                                    to be
                                                    sure there isn't anything embarrassing hidden in the middle of text</p>
                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <label>Web Design</label>
                                                        <div class="progress progress-md mb-3">
                                                            <div
                                                                class="progress-bar progress-bar-striped progress-bar-animated bg-teal w-55">
                                                                55%</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Web Development</label>
                                                        <div class="progress progress-md mb-3">
                                                            <div
                                                                class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-70">
                                                                70%</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Wordpress</label>
                                                        <div class="progress progress-md mb-3">
                                                            <div
                                                                class="progress-bar progress-bar-striped progress-bar-animated bg-cyan w-80">
                                                                80%</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Photography</label>
                                                        <div class="progress progress-md mb-3">
                                                            <div
                                                                class="progress-bar progress-bar-striped progress-bar-animated bg-orange w-75">
                                                                75%</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Development</label>
                                                        <div class="progress progress-md mb-3">
                                                            <div
                                                                class="progress-bar progress-bar-striped progress-bar-animated bg-danger w-65">
                                                                65%</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Android</label>
                                                        <div class="progress progress-md mb-3">
                                                            <div
                                                                class="progress-bar progress-bar-striped progress-bar-animated bg-success w-70">
                                                                69%</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- col end -->
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- COUNTERS JS -->
        <script src="{{asset('build/assets/plugins/counters/counterup.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/counters/waypoints.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/counters/counters.js')}}"></script>

@endsection