@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Range sliders</li>
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

                            <!--div-->
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Range Slider
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row row-sm">
                                        <div class="col-lg-12">
                                            <input class="rangeslider1" name="example_name" type="text" value="">
                                        </div>
                                        <div class="col-lg-12 mt-4">
                                            <input class="rangeslider2" name="example_name" type="text" value="">
                                        </div>
                                    </div>
                                    <div class="row row-sm">
                                        <div class="col-lg-12 mt-4">
                                            <input class="rangeslider3" name="example_name" type="text" value="">
                                        </div>
                                        <div class="col-lg-12 mt-4">
                                            <input class="rangeslider4" name="example_name" type="text" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/div-->

                            <!--div-->
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Range Slider (Modern Skin)
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row row-sm">
                                        <div class="col-lg-12">
                                            <input class="rangeslider1" data-extra-classes="irs-modern" name="example_name"
                                                type="text">
                                        </div>
                                        <div class="col-lg-12 mt-4">
                                            <input class="rangeslider2" data-extra-classes="irs-modern" name="example_name"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="row row-sm">
                                        <div class="col-lg-12 mt-4">
                                            <input class="rangeslider3" data-extra-classes="irs-modern" name="example_name"
                                                type="text">
                                        </div>
                                        <div class="col-lg-12 mt-4">
                                            <input class="rangeslider4" data-extra-classes="irs-modern" name="example_name"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/div-->

                            <!--div-->
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Range Slider (Outline Skin)
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row row-sm">
                                        <div class="col-lg-12">
                                            <input class="rangeslider1" data-extra-classes="irs-outline" name="example_name"
                                                type="text">
                                        </div>
                                        <div class="col-lg-12 mt-4">
                                            <input class="rangeslider2" data-extra-classes="irs-outline" name="example_name"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="row row-sm">
                                        <div class="col-lg-12 mt-4">
                                            <input class="rangeslider3" data-extra-classes="irs-outline" name="example_name"
                                                type="text">
                                        </div>
                                        <div class="col-lg-12 mt-4">
                                            <input class="rangeslider4" data-extra-classes="irs-outline" name="example_name"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/div-->

@endsection

@section('scripts')

        <!-- INTERNAL ION-RANGESLIDER JS -->
        <script src="{{asset('build/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
        @vite('resources/assets/js/rangeslider.js')


@endsection