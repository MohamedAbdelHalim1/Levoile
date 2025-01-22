@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Maps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Vector Maps</li>
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
                                <div class="col-lg-12">
                                    <div class="card m-b-20">
                                        <div class="card-header">
                                            <h4 class="card-title pb-0">World Map</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="world-map-markers" class="worldh h-400"></div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-header">
                                            <h4 class="card-title pb-0">USA Map</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="usa" class="stateh w-100 h-400"></div>
                                        </div>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-header">
                                            <h4 class="card-title pb-0">Canada Map</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="canada" class="stateh h-400"></div>
                                        </div>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-header">
                                            <h4 class="card-title pb-0">UK Map</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="uk" class="stateh h-400"></div>
                                        </div>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-header">
                                            <h4 class="card-title pb-0">Australia Map</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="australia" class="stateh w-100 h-400"></div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- JVECTORMAP JS -->
        <script src="{{asset('build/assets/plugins/jvectormap/jquery-jvectormap-2.0.5.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script src="{{asset('build/assets/plugins/jvectormap/gdp-data.js')}}"></script>
        <script src="{{asset('build/assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
        <script src="{{asset('build/assets/plugins/jvectormap/jquery-jvectormap-uk-mill-en.js')}}"></script>
        <script src="{{asset('build/assets/plugins/jvectormap/jquery-jvectormap-au-mill.js')}}"></script>
        <script src="{{asset('build/assets/plugins/jvectormap/jquery-jvectormap-ca-lcc.js')}}"></script>
        @vite('resources/assets/js/jvectormap.js')
        

@endsection