@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tooltip & Popovers</li>
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
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Static Tooltip</h3>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="bd-example bd-example-tooltip-static">
                                                <div class="tooltip tooltip-top" role="tooltip">
                                                    <div class="tooltip-inner">
                                                        Tooltip on the top
                                                    </div>
                                                </div>
                                                <div class="tooltip tooltip-right" role="tooltip">
                                                    <div class="tooltip-inner">
                                                        Tooltip on the right
                                                    </div>
                                                </div>
                                                <div class="tooltip tooltip-bottom" role="tooltip">
                                                    <div class="tooltip-inner">
                                                        Tooltip on the bottom
                                                    </div>
                                                </div>
                                                <div class="tooltip tooltip-left" role="tooltip">
                                                    <div class="tooltip-inner">
                                                        Tooltip on the left
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Interactive Demo Tooltip</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tooltip-demo">
                                                <div class="bd-example-tooltips">
                                                    <div class="row text-center">
                                                        <div class="col-md-6 col-xl-3 mt-2 mb-2">
                                                            <button type="button" class="btn btn-warning"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Tooltip on top">Tooltip on
                                                                top</button>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3 mt-2 mb-2">
                                                            <button type="button" class="btn btn-cyan"
                                                                data-bs-toggle="tooltip" data-bs-placement="right"
                                                                title="Tooltip on right">Tooltip on
                                                                right</button>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3 mt-2 mb-2">
                                                            <button type="button" class="btn btn-pink"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="Tooltip on bottom">Tooltip on
                                                                bottom</button>
                                                        </div>
                                                        <div class="col-md-6 col-xl-3 mt-2 mb-2">
                                                            <button type="button" class="btn btn-teal"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="Tooltip on left">Tooltip on
                                                                left</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--col end-->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Basic Popover</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row text-center">
                                                <div class="col-sm-6 col-lg-3 mt-2 mb-2">
                                                    <button type="button" class="btn btn-primary" data-bs-container="body"
                                                        data-bs-toggle="popover" data-bs-popover-color="default"
                                                        data-bs-placement="top" title="Popover top"
                                                        data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                                        Popover top
                                                    </button>
                                                </div><!-- col-3 -->
                                                <div class="col-sm-6 col-lg-3 mt-2 mb-2 ">
                                                    <button type="button" class="btn btn-secondary" data-bs-container="body"
                                                        data-bs-toggle="popover" data-bs-popover-color="default"
                                                        data-bs-placement="bottom" title="Popover bottom"
                                                        data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                                        Popover bottom
                                                    </button>
                                                </div><!-- col-3 -->
                                                <div class="col-sm-6 col-lg-3 mt-2 mb-2">
                                                    <button type="button" class="btn btn-danger" data-bs-container="body"
                                                        data-bs-toggle="popover" data-bs-popover-color="default"
                                                        data-bs-placement="right" title="Popover right"
                                                        data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                                        Popover right
                                                    </button>
                                                </div><!-- col-3 -->
                                                <div class="col-sm-6 col-lg-3 mt-2 mb-2">
                                                    <button type="button" class="btn btn-success" data-bs-container="body"
                                                        data-bs-toggle="popover" data-bs-popover-color="default"
                                                        data-bs-placement="left" title="Popover left"
                                                        data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                                        Popover left
                                                    </button>
                                                </div><!-- col-3 -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--col end-->
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

@endsection