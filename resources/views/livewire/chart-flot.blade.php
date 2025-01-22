@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Charts</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Flot Charts</li>
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
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">line chart with negative values </h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="placeholder2" class="chartsh"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">line chart </h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="placeholder3" class="chartsh"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PAGE HEADER -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Animated graph</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="placeholder4" class="chartsh"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Chart with multiple types</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="placeholder5" class="chartsh"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PAGE HEADER -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Bar chart</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="placeholder6" class="chartsh"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Area chart</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="placeholder1" class="chartsh"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">pie chart models</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <div id="placeholder" class="chartsh"></div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div id="menu">
                                                        <button id="example-1"
                                                            class="btn btn-block btn-sm btn-primary mt-lg-0 mt-3">Default
                                                            Options</button>
                                                        <button id="example-2"
                                                            class="btn btn-block btn-sm btn-primary mt-2">Without
                                                            Legend</button>
                                                        <button id="example-3"
                                                            class="btn btn-block btn-sm btn-primary mt-2">Label
                                                            Formatter</button>
                                                        <button id="example-4"
                                                            class="btn btn-block btn-sm btn-primary mt-2">Label
                                                            Radius</button>
                                                        <button id="example-5"
                                                            class="btn btn-block btn-sm btn-primary mt-2">Label Styles
                                                            #1</button>
                                                        <button id="example-6"
                                                            class="btn btn-block btn-sm btn-primary mt-2">Label Styles
                                                            #2</button>
                                                        <button id="example-8"
                                                            class="btn btn-block btn-sm btn-primary mt-2">Combined
                                                            Slice</button>
                                                        <button id="example-9"
                                                            class="btn btn-block btn-sm btn-primary mt-2">Rectangular
                                                            Pie</button>
                                                        <button id="example-10"
                                                            class="btn btn-block btn-sm btn-primary mt-2">Tilted
                                                            Pie</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PAGE HEADER -->

@endsection

@section('scripts')

        <!-- FLOT CHART JS -->
        <script src="{{asset('build/assets/plugins/flot-charts/jquery.flot.js')}}"></script>
        <script src="{{asset('build/assets/plugins/flot-charts/jquery.flot.fillbetween.js')}}"></script>
        <script src="{{asset('build/assets/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('build/assets/plugins/flot/jquery.flot.resize.js')}}"></script>

        <!-- CUSTOM-CHARTS JS -->
        @vite('resources/assets/js/flot.js')


@endsection