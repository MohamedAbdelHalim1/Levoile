@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Loaders</li>
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
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Dimmer Loader</h3>
                                            <div>
                                                <a href="javascript:void(0);" class="card-options-collapse" data-bs-toggle="card-collapse"><i
                                                        class="fe fe-chevron-up me-2"></i></a>
                                                <a href="javascript:void(0);" class="card-options-remove" data-bs-toggle="card-remove"><i
                                                        class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="dimmer active">
                                                <div class="spinner3">
                                                    <div class="dot1"></div>
                                                    <div class="dot2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Bounce Loader</h3>
                                            <div>
                                                <a href="javascript:void(0);" class="card-options-collapse" data-bs-toggle="card-collapse"><i
                                                        class="fe fe-chevron-up me-2"></i></a>
                                                <a href="javascript:void(0);" class="card-options-remove" data-bs-toggle="card-remove"><i
                                                        class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="spinner4">
                                                <div class="bounce1"></div>
                                                <div class="bounce2"></div>
                                                <div class="bounce3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Circle Loader</h3>
                                            <div>
                                                <a href="javascript:void(0);" class="card-options-collapse" data-bs-toggle="card-collapse"><i
                                                        class="fe fe-chevron-up me-2"></i></a>
                                                <a href="javascript:void(0);" class="card-options-remove" data-bs-toggle="card-remove"><i
                                                        class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div>
                                                <div class="sk-circle">
                                                    <div class="sk-circle1 sk-child"></div>
                                                    <div class="sk-circle2 sk-child"></div>
                                                    <div class="sk-circle3 sk-child"></div>
                                                    <div class="sk-circle4 sk-child"></div>
                                                    <div class="sk-circle5 sk-child"></div>
                                                    <div class="sk-circle6 sk-child"></div>
                                                    <div class="sk-circle7 sk-child"></div>
                                                    <div class="sk-circle8 sk-child"></div>
                                                    <div class="sk-circle9 sk-child"></div>
                                                    <div class="sk-circle10 sk-child"></div>
                                                    <div class="sk-circle11 sk-child"></div>
                                                    <div class="sk-circle12 sk-child"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Cube Loader</h3>
                                            <div>
                                                <a href="javascript:void(0);" class="card-options-collapse" data-bs-toggle="card-collapse"><i
                                                        class="fe fe-chevron-up me-2"></i></a>
                                                <a href="javascript:void(0);" class="card-options-remove" data-bs-toggle="card-remove"><i
                                                        class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div>
                                                <div class="sk-cube-grid">
                                                    <div class="sk-cube sk-cube1"></div>
                                                    <div class="sk-cube sk-cube2"></div>
                                                    <div class="sk-cube sk-cube3"></div>
                                                    <div class="sk-cube sk-cube4"></div>
                                                    <div class="sk-cube sk-cube5"></div>
                                                    <div class="sk-cube sk-cube6"></div>
                                                    <div class="sk-cube sk-cube7"></div>
                                                    <div class="sk-cube sk-cube8"></div>
                                                    <div class="sk-cube sk-cube9"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Folding-cube Loader</h3>
                                            <div>
                                                <a href="javascript:void(0);" class="card-options-collapse" data-bs-toggle="card-collapse"><i
                                                        class="fe fe-chevron-up me-2"></i></a>
                                                <a href="javascript:void(0);" class="card-options-remove" data-bs-toggle="card-remove"><i
                                                        class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body  pt-0">
                                            <div>
                                                <div class="sk-folding-cube">
                                                    <div class="sk-cube1 sk-cube"></div>
                                                    <div class="sk-cube2 sk-cube"></div>
                                                    <div class="sk-cube4 sk-cube"></div>
                                                    <div class="sk-cube3 sk-cube"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Hourglass Loader</h3>
                                            <div>
                                                <a href="javascript:void(0);" class="card-options-collapse" data-bs-toggle="card-collapse"><i
                                                        class="fe fe-chevron-up me-2"></i></a>
                                                <a href="javascript:void(0);" class="card-options-remove" data-bs-toggle="card-remove"><i
                                                        class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div>
                                                <div class="dimmer active">
                                                    <div class="lds-hourglass"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Spinner Loader</h3>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="dimmer active">
                                                <div class="spinner">
                                                    <div class="rect1"></div>
                                                    <div class="rect2"></div>
                                                    <div class="rect3"></div>
                                                    <div class="rect4"></div>
                                                    <div class="rect5"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Double-bounce Loaders</h3>
                                        </div>
                                        <div class="card-body pt-0">

                                            <div class="dimmer active">
                                                <div class="spinner1">
                                                    <div class="double-bounce1"></div>
                                                    <div class="double-bounce2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Facebook Loaders</h3>
                                        </div>
                                        <div class="card-body pb-0">
                                            <div class="dimmer active">
                                                <div class="spinner5">
                                                    <div class="rect1"></div>
                                                    <div class="rect2"></div>
                                                    <div class="rect3"></div>
                                                    <div class="rect4"></div>
                                                    <div class="rect5"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

@endsection