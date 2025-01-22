@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sweetalerts</li>
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
                            <!-- PAGE HEADER -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header ">
                                            <h3 class="card-title">Sample Sweet Alerts</h3>
                                        </div>
                                        <div class="card-body">
                                            <button type='button' class="btn btn-primary mt-2" id='swal-basic'>Basic alert</button>
                                            <button type='button' class="btn btn-success mt-2" id='swal-success'>Success alert</button>
                                            <button type='button' class="btn btn-warning mt-2" id='swal-warning'>Warning alert</button>
                                            <button type='button' class="btn btn-danger mt-2" id='swal-danger'>Danger alert</button>
                                            <button type='button' class="btn btn-info mt-2" id='swal-info'>Info alert</button>
                                            <button type='button' class="btn btn-gray mt-2" id='swal-title'>Title alert</button>
                                            <button type='button' class="btn btn-dark mt-2" id='swal-parameter'>Passing a parameter</button>
                                            <button type='button' class="btn btn-secondary mt-2" id='swal-ajax'>With a loader</button>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Forms Sweet-alert</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type='text' class="form-control" placeholder='Title text' id='title'>
                                            </div>
                                            <div class="form-group">
                                                <label>Message</label>
                                                <input type='text' class="form-control" placeholder='Your message'
                                                    id='message'>
                                            </div>
                                            <input type='button' class="btn btn-primary mt-2" value='Simple alert'
                                                id='but1'>&nbsp;
                                            <input type='button' class="btn btn-secondary mt-2" value='Alert with title'
                                                id='but2'>&nbsp;
                                            <input type='button' class="btn btn-info mt-2" value='Alert with image'
                                                id='swal-image'>&nbsp;
                                            <input type='button' class="btn btn-warning mt-2" value='With timer'
                                                id='swal-timer'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- SWEET-ALERT JS  -->
        <script src="{{asset('build/assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>
        @vite('resources/assets/js/sweet-alert.js')


@endsection