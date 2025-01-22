@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Charts</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chartjs</li>
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
                                <div class="col-sm-12 col-md-6 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Bar Chart</div>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <canvas id="chartBar1" class="h-300"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Transparency </div>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <canvas id="chartBar2" class="h-300"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Gradient Bar Chart</div>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <canvas id="chartBar3" class="h-300"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Horizontal Bar Chart</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chartjs-wrapper-demo">
                                                <canvas id="chartBar4" class="h-300"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- col-6 -->
                                <div class="col-sm-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Horizontal Bar Chart Style2</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chartjs-wrapper-demo">
                                                <canvas id="chartBar5" class="h-300"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- col-6 -->
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Vertical Stacked Bar Chart</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chartjs-wrapper-demo">
                                                <canvas id="chartStacked1" class="h-300"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- col-6 -->
                                <div class="col-sm-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Horizontal Stacked Bar Chart</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chartjs-wrapper-demo">
                                                <canvas id="chartStacked2" class="h-300"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- col-6 -->
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Line Chart</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chartjs-wrapper-demo">
                                                <canvas id="chartLine1" class="h-300"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- col-6 -->
                                <div class="col-sm-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Area Chart</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chartjs-wrapper-demo">
                                                <canvas id="chartArea1" class="h-300"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- col-6 -->
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Donut Chart</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chartjs-wrapper-demo">
                                                <canvas id="chartPie" class="h-300"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- col-6 -->
                                <div class="col-sm-12 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Pie Chart</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chartjs-wrapper-demo">
                                                <canvas id="chartDonut" class="h-300"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- col-6 -->
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- CHARTIST JS -->
        <script src="{{asset('build/assets/plugins/chart/chart.bundle.js')}}"></script>
        <script src="{{asset('build/assets/plugins/chart/utils.js')}}"></script>

        <!-- CUSTOM-CHARTS JS -->
        @vite('resources/assets/js/chart.js')


@endsection