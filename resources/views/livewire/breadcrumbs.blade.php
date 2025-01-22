@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Breadcrumbs</li>
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
                                <div class="col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Simple Breadcrumbs</h3>
                                        </div>
                                        <div class="card-body">
                                            <ol class="breadcrumb1 br-7">
                                                <li class="breadcrumb-item1 active">Home</li>
                                                <li class="breadcrumb-item1 active">About</li>
                                            </ol>
                                            <ol class="breadcrumb1 br-7">
                                                <li class="breadcrumb-item1"><a href="javascript:void(0);">Home</a></li>
                                                <li class="breadcrumb-item1 active">Library</li>
                                            </ol>
                                            <ol class="breadcrumb1 br-7">
                                                <li class="breadcrumb-item1"><a href="javascript:void(0);">Home</a></li>
                                                <li class="breadcrumb-item1"><a href="javascript:void(0);">Library</a></li>
                                                <li class="breadcrumb-item1 active">Data</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Breadcrumbs-Center align</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="breadcrumb-3">
                                                <ol class="breadcrumb1 br-7">
                                                    <li class="breadcrumb-item1"><a href="javascript:void(0);">Home</a></li>
                                                    <li class="breadcrumb-item1 active">about</li>
                                                </ol>
                                            </div>
                                            <div class="breadcrumb-4">
                                                <ol class="breadcrumb1 br-7">
                                                    <li class="breadcrumb-item1"><a href="javascript:void(0);">Home</a></li>
                                                    <li class="breadcrumb-item1 active">Library</li>
                                                </ol>
                                            </div>
                                            <div class="breadcrumb-5">
                                                <ol class="breadcrumb1 br-7 mb-0">
                                                    <li class="breadcrumb-item1"><a href="javascript:void(0);">Home</a></li>
                                                    <li class="breadcrumb-item1"><a href="javascript:void(0);">Library</a></li>
                                                    <li class="breadcrumb-item1 active">Data</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Breadcrumbs-Right align</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="breadcrumb-1">
                                                <ol class="breadcrumb1 br-7">
                                                    <li class="breadcrumb-item1"><a href="javascript:void(0);">Home</a></li>
                                                    <li class="breadcrumb-item1 active">about</li>
                                                </ol>
                                            </div>
                                            <div class="breadcrumb-2">
                                                <ol class="breadcrumb1 br-7">
                                                    <li class="breadcrumb-item1"><a href="javascript:void(0);">Home</a></li>
                                                    <li class="breadcrumb-item1"><a href="javascript:void(0);">Library</a></li>
                                                </ol>
                                            </div>
                                            <div class="breadcrumb-6">
                                                <ol class="breadcrumb1 br-7 mb-0">
                                                    <li class="breadcrumb-item1"><a href="javascript:void(0);">Home</a></li>
                                                    <li class="breadcrumb-item1"><a href="javascript:void(0);">Library</a></li>
                                                    <li class="breadcrumb-item1 active">Data</li>
                                                </ol>
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
                                        <div class="card-header">
                                            <h3 class="card-title">Color Breadcrumbs</h3>
                                        </div>
                                        <div class="card-body">
                                            <ol class="breadcrumb1 br-7 bg-blue">
                                                <li class="breadcrumb-item1 active text-white">Home</li>
                                                <li class="breadcrumb-item1 active text-white">About</li>
                                            </ol>
                                            <ol class="breadcrumb1 br-7 bg-purple">
                                                <li class="breadcrumb-item1"><a href="javascript:void(0);" class="text-white">Home</a></li>
                                                <li class="breadcrumb-item1 active text-white">Library</li>
                                            </ol>
                                            <ol class="breadcrumb1 br-7 bg-orange">
                                                <li class="breadcrumb-item1"><a href="javascript:void(0);" class="text-white">Home</a></li>
                                                <li class="breadcrumb-item1"><a href="javascript:void(0);" class="text-white">Library</a></li>
                                                <li class="breadcrumb-item1 active text-white">Data</li>
                                            </ol>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Color Breadcrumbs</h3>
                                        </div>
                                        <div class="card-body">
                                            <ol class="breadcrumb breadcrumb-arrow mt-3">
                                                <li><a href="javascript:void(0);">Home</a></li>
                                                <li class="active"><span>Data</span></li>
                                            </ol>
                                            <ol class="breadcrumb breadcrumb-arrow mt-3">
                                                <li><a href="javascript:void(0);">Home</a></li>
                                                <li><a href="javascript:void(0);">Library</a></li>
                                                <li class="active"><span>Data</span></li>
                                            </ol>
                                            <ol class="breadcrumb breadcrumb-arrow mt-3">
                                                <li><a href="javascript:void(0);">Home</a></li>
                                                <li><a href="javascript:void(0);">Library</a></li>
                                                <li><a href="javascript:void(0);">Elements</a></li>
                                                <li class="active"><span>Data</span></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

@endsection