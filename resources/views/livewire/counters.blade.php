@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Counters</li>
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
                            <div class="row row-cards">
                                <div class="col-md-12 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Time Counting From 0
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="example border br-7">
                                                <span class="fs-24 mx-2"><i class="bi bi-alarm text-primary"></i></span>
                                                <span id="timer-countup" class="h3 text-primary"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Time Counting From 60 to 20
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="example border br-7">
                                                <span class="fs-24 mx-2"><i class="bi bi-alarm text-success"></i></span>
                                                <span id="timer-countinbetween" class="h3 text-success"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Time 1 minute counter
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="example border br-7">
                                                <span class="fs-24 mx-2"><i class="bi bi-alarm text-info"></i></span>
                                                <span id="timer-countercallback" class="h3 text-info"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Time Counting days Limit
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="example border br-7">
                                                <span class="fs-24 mx-2"><i class="bi bi-calendar2-check text-danger"></i></span>
                                                <span id="timer-outputpattern" class="h3 text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Numbers counter
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <span class="fs-24 mx-1"><i class="bi bi-bar-chart text-success"></i></span>
                                            <h5 class="mb-1">Profit</h5>
                                            <h2 class="counter text-success">2569</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Numbers counter
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <span class="fs-24 mx-1"><i class="bi bi-people text-warning"></i></span>
                                            <h5 class="mb-1">Employees</h5>
                                            <h2 class="counter text-warning"> 2,56989.32</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Numbers counter
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <span class="fs-24 mx-1"><i class="bi bi-bug text-danger"></i></span>
                                            <h5 class="mb-1">Errors</h5>
                                            <h2 class="counter text-danger">0.8998</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Day Counter
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="count-down row">
                                                <div class="col-12 col-sm-12 col-md-12 col-xl-3">
                                                    <div class="countdown alert-primary">
                                                        <span class="days text-primary ">35</span>
                                                        <span class="text-primary">Days</span>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-xl-3 ">
                                                    <div class="countdown alert-success">
                                                        <span class="hours text-success">17</span>
                                                        <span class="text-success">Hours</span>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-12 col-xl-3 ">
                                                    <div class="countdown alert-info">
                                                        <span class="minutes text-info">50</span>
                                                        <span class="text-info">Minutes</span>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-xl-3 ">
                                                    <div class="countdown alert-warning">
                                                        <span class="seconds text-warning">39</span>
                                                        <span class="text-warning">Seconds</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!--Time Counter js-->
        <script src="{{asset('build/assets/plugins/counters/jquery.missofis-countdown.js')}}"></script>
        <script src="{{asset('build/assets/plugins/counters/counter.js')}}"></script>

        <!--Counters -->
        <script src="{{asset('build/assets/plugins/counters/counterup.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/counters/waypoints.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/counters/counters.js')}}"></script>

        <!--Counters js-->
        <script src="{{asset('build/assets/plugins/counters/jquery.missofis-countdown.js')}}"></script>
        <script src="{{asset('build/assets/plugins/counters/count-down.js')}}"></script>
        <script src="{{asset('build/assets/plugins/count-down/moment.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/count-down/moment-timezone.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/count-down/moment-timezone-with-data.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/count-down/countdowntime.js')}}"></script>

@endsection