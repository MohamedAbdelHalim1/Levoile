@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Toast</li>
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

                            <!-- ROW-1 OPEN -->
                            <div class="row">
                                <div class="col-xl-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="card-title">Basic Toasts</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="p-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="toast show" role="alert" aria-live="assertive"
                                                            aria-atomic="true" data-bs-autohide="false">
                                                            <div class="toast-header">
                                                                <img src="{{asset('build/assets/images/brand/icon.png')}}" alt=""
                                                                    class="me-2" height="18">
                                                                <strong class="me-auto">Bootstrap</strong>
                                                                <small>11 mins ago</small>
                                                                <button aria-label="Close" class="btn-close fs-15"
                                                                    data-bs-dismiss="toast"></button>
                                                            </div>
                                                            <div class="toast-body">
                                                                Hello, world! This is a toast message.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <button type="button" class="btn btn-primary" id="liveToastBtn">Show
                                                        live toast</button>
                                                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                                                        <div id="liveToast" class="toast" role="alert"
                                                            aria-live="assertive" aria-atomic="true">
                                                            <div class="toast-header">
                                                                <img src="{{asset('build/assets/images/brand/icon.png')}}"
                                                                class="rounded me-2" alt="img" height="18">
                                                                <strong class="me-auto">Bootstrap</strong>
                                                                <small>11 mins ago</small>
                                                                <button aria-label="Close" class="btn-close fs-15"
                                                                data-bs-dismiss="toast"></button>
                                                            </div>
                                                            <div class="toast-body">
                                                                Hello, world! This is a toast message.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="card-title">Translucent Toasts</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="p-4 bg-light border br-7">
                                                <div class="toast show" role="alert" aria-live="assertive"
                                                    aria-atomic="true" data-bs-autohide="false">
                                                    <div class="toast-header">
                                                        <img src="{{asset('build/assets/images/brand/icon.png')}}" alt="" class="me-2"
                                                            height="18">
                                                        <strong class="me-auto">Bootstrap</strong>
                                                        <small>11 mins ago</small>
                                                        <button aria-label="Close" class="btn-close fs-15"
                                                            data-bs-dismiss="toast"></button>
                                                    </div>
                                                    <div class="toast-body text-dark">
                                                        Hello, world! This is a toast message.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW-1 CLOSED -->

                            <!-- ROW-2 OPEN  -->
                            <div class="row">
                                <div class="col-xl-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="card-title">Custom content Toasts</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-xl-6 mt-1">
                                                    <div class="toast align-items-center show" role="alert"
                                                        aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                                                        <div>
                                                            <button aria-label="Close" class="btn-close fs-15 mt-2 me-2"
                                                                data-bs-dismiss="toast"></button>
                                                            <div class="toast-body">
                                                                Hello, world! This is a toast message.
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-xl-6 mt-1">
                                                    <div class="toast show" role="alert" aria-live="assertive"
                                                        aria-atomic="true" data-bs-autohide="false">
                                                        <div class="toast-body">
                                                            Hello, world! This is a toast message.
                                                            <div class="mt-2 pt-2 border-top">
                                                                <button type="button" class="btn btn-primary btn-sm">Take
                                                                    action</button>
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-bs-dismiss="toast">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="card-title">Color Toasts</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="toast align-items-center text-white bg-primary border-0 show"
                                                        role="alert" aria-live="assertive" aria-atomic="true"
                                                        data-bs-autohide="false">
                                                        <div>
                                                            <button aria-label="Close" class="btn-close background-none me-2 fs-15"
                                                                data-bs-dismiss="toast">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>

                                                            <div class="toast-body">
                                                                Hello, world! This is a toast message.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2 mt-md-0">
                                                    <div class="toast align-items-center text-white bg-secondary border-0 show"
                                                        role="alert" aria-live="assertive" aria-atomic="true"
                                                        data-bs-autohide="false">
                                                        <div>
                                                            <button aria-label="Close" class="btn-close fs-15 background-none me-2"
                                                                data-bs-dismiss="toast">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <div class="toast-body">
                                                                Hello, world! This is a toast message.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <div class="toast align-items-center text-white bg-success border-0 show"
                                                        role="alert" aria-live="assertive" aria-atomic="true"
                                                        data-bs-autohide="false">
                                                        <div>
                                                            <button aria-label="Close" class="btn-close fs-15 background-none me-2"
                                                                data-bs-dismiss="toast">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <div class="toast-body">
                                                                Hello, world! This is a toast message.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <div class="toast align-items-center text-white bg-danger border-0 show"
                                                        role="alert" aria-live="assertive" aria-atomic="true"
                                                        data-bs-autohide="false">
                                                        <div>
                                                            <button aria-label="Close" class="btn-close fs-15 background-none me-2"
                                                                data-bs-dismiss="toast">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <div class="toast-body">
                                                                Hello, world! This is a toast message.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW-2 CLOSED -->

                            <!-- ROW-3 OPEN -->
                            <div class="row">
                                <div class="col-xl-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="card-title">Stacking Toasts</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="p-4 bg-light border br-7">
                                                <div aria-live="polite" aria-atomic="true"
                                                    class="justify-content-center align-items-center w-100 h-180">
                                                    <div class="toast show" role="alert" aria-live="assertive"
                                                        aria-atomic="true" data-bs-autohide="false">
                                                        <div class="toast-header">
                                                            <img src="{{asset('build/assets/images/brand/icon.png')}}" alt="" class="me-2"
                                                                height="18">
                                                            <strong class="me-auto">Bootstrap</strong>
                                                            <small class="text-muted">just now</small>
                                                            <button aria-label="Close" class="btn-close fs-15"
                                                                data-bs-dismiss="toast"></button>
                                                        </div>
                                                        <div class="toast-body text-dark">
                                                            See? Just like this.
                                                        </div>
                                                    </div>
                                                    <div class="toast show mt-2" role="alert" aria-live="assertive"
                                                        aria-atomic="true" data-bs-autohide="false">
                                                        <div class="toast-header">
                                                            <img src="{{asset('build/assets/images/brand/icon.png')}}" alt="" class="me-2"
                                                                height="18">
                                                            <strong class="me-auto">Bootstrap</strong>
                                                            <small class="text-muted">2 secs ago</small>
                                                            <button aria-label="Close" class="btn-close fs-15"
                                                                data-bs-dismiss="toast"></button>
                                                        </div>
                                                        <div class="toast-body text-dark">
                                                            Heads up, toasts will stack automatically
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="card-title">Placement Toast</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="p-4 bg-light border br-7">
                                                <div aria-live="polite" aria-atomic="true"
                                                    class="d-flex justify-content-center align-items-center w-100 h-180">
                                                    <div class="toast show" role="alert" aria-live="assertive"
                                                        aria-atomic="true" data-bs-autohide="false">
                                                        <div class="toast-header">
                                                            <img src="{{asset('build/assets/images/brand/icon.png')}}" alt="" class="me-2"
                                                                height="18">
                                                            <strong class="me-auto">Bootstrap</strong>
                                                            <small>11 mins ago</small>
                                                            <button aria-label="Close" class="btn-close fs-15"
                                                                data-bs-dismiss="toast"></button>
                                                        </div>
                                                        <div class="toast-body text-dark">
                                                            Hello, world! This is a toast message.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW-3 CLOSED -->

@endsection

@section('scripts')

@endsection