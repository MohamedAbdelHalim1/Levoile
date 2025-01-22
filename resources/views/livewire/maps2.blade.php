@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Maps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Mapel Maps</li>
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
                                            <h4 class="card-title">Map with links between the plotted cities</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="mapcontainer4">
                                                <div class="map pt-0">
                                                    <span>Alternative content for the map</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Static MapelMaps</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="mapcontainer">
                                                <div class="map pt-0">
                                                    <span>Alternative content for the map</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title"> Map with a legend for areas</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="mapcontainer1">
                                                <div class="map pt-0">
                                                    <span>Alternative content for the map</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- INTERNAL MAPEL PLUGIN -->
        <script src="{{asset('build/assets/plugins/mapel/raphael.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/mapel/jquery.mapael.js')}}"></script>
        <script src="{{asset('build/assets/plugins/mapel/maps/france_departments.js')}}"></script>
        <script src="{{asset('build/assets/plugins/mapel/maps/world_countries.js')}}"></script>
        <script src="{{asset('build/assets/plugins/mapel/maps/usa_states.js')}}"></script>
        @vite('resources/assets/js/mapelmaps.js')


@endsection