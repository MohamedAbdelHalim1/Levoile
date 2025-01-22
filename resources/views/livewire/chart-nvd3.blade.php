@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Charts</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Nvd3 Charts</li>
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
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Bar Chart With Multiple colors</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="nvd3-chart1" class="chart-dropshadow chartsh"> <svg></svg></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Bar Chart</h3>
                                        </div>
                                        <div class="card-body">
                                            <svg id="nvd3-chart2" class="chart-dropshadow chartsh h-300"></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Line Chart With Zooming Options</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="chartZoom">
                                                <a class="btn btn-outline-primary btn-sm" id="zoomIn">+</a> <a
                                                    class="btn btn-outline-secondary btn-sm" id="zoomOut">-</a>
                                            </div>
                                            <div id="nvd3-chart3" class="chart-dropshadow with-transitions chartsh">
                                                <svg></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- NVD3 CHARTS JS -->
        <script src="{{asset('build/assets/plugins/charts-nvd3/d3.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/charts-nvd3/nv.d3.js')}}"></script>
        <script src="{{asset('build/assets/plugins/charts-nvd3/stream_layers.js')}}"></script>

        <!-- CUSTOM-CHARTS JS -->
        @vite('resources/assets/js/nvd3.js')


@endsection