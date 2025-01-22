@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Notifications</li>
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
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Side Alerts Notifications</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="btn-list">
                                                <a href="javascript:void(0);" class="btn btn-success notice">Success</a>
                                                <a href="javascript:void(0);" class="btn btn-warning warning">Warning</a>
                                                <a href="javascript:void(0);" class="btn btn-danger error">Danger</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header border-bottom">
                                            <h3 class="card-title">Call Back Notification</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="example border-0 p-0">
                                                <div class="btn-list">
                                                    <button onclick="not17()" class="btn btn-orange">Call Back</button>
                                                    <button onclick="not18()" class="btn btn-dark">Call Back 2</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->
                            
                            <!-- ROW -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Alerts Notifications</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="btn-list">
                                                <button onclick="not1()" class="btn btn-success">Default</button>
                                                <button onclick="not3()" class="btn btn-warning">Left</button>
                                                <button onclick="not4()" class="btn btn-info">Center Info</button>
                                                <button onclick="not5()" class="btn btn-danger">Center Error</button>
                                                <button onclick="not6()" class="btn btn-warning">Center Warning</button>
                                                <button onclick="not7()" class="btn btn-primary">Bottom Primary</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Notification Styles</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="example border-0 p-0">
                                                <div class="btn-list">
                                                    <button onclick="not13()" class="btn btn-info">Mutiple lines</button>
                                                    <button onclick="not14()" class="btn btn-success">Fade
                                                        Animation</button>
                                                    <button onclick="not15()" class="btn btn-primary">Customize
                                                        Background</button>
                                                    <button onclick="not16()" class="btn btn-info">Timeout</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- INTERNAL NOTIFICATIONS JS -->
        <script src="{{asset('build/assets/plugins/notify/js/rainbow.js')}}"></script>
        <script src="{{asset('build/assets/plugins/notify/js/sample.js')}}"></script>
        <script src="{{asset('build/assets/plugins/notify/js/jquery.growl.js')}}"></script>
        <script src="{{asset('build/assets/plugins/notify/js/notifIt.js')}}"></script>

@endsection