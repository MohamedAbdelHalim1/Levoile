@extends('layouts.custom-app1')

@section('styles')

@endsection

@section('content')

                <!-- PAGE-CONTENT -->
                <div class="page-content">
                    <div class="container text-center text-dark">
                        <div class="row">
                            <div class="col-lg-4 d-block mx-auto">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="text-center mb-6">
                                                    <a class="header-brand1" href="{{url('index')}}">
                                                        <img src="{{asset('build/assets/images/brand/logo.png')}}"
                                                            class="header-brand-img main-logo" alt="Sparic logo">
                                                        <img src="{{asset('build/assets/images/brand/logo-light.png')}}"
                                                            class="header-brand-img darklogo" alt="Sparic logo">
                                                    </a>
                                                </div>
                                                <h4	 class="fw-semiboild">Forgot password</h4>
                                                <div class="input-group  me-auto ms-auto mb-4">
                                                    <span class="input-group-addon bg-white"><i
                                                            class="fa fa-envelope text-muted-dark"></i></span>
                                                    <input type="password" class="form-control" placeholder="Email address">
                                                </div>
                                                <div class="text-center">
                                                    <a href="{{url('index')}}" class="btn btn-primary btn-block">Send</a>
                                                </div>
                                                <div class="mt-6 btn-list">
                                                    <button type="button" class="btn btn-icon btn-facebook"><i
                                                            class="fa fa-facebook"></i></button>
                                                    <button type="button" class="btn btn-icon btn-google"><i
                                                            class="fa fa-google"></i></button>
                                                    <button type="button" class="btn btn-icon btn-twitter"><i
                                                            class="fa fa-twitter"></i></button>
                                                    <button type="button" class="btn btn-icon btn-dribbble"><i
                                                            class="fa fa-dribbble"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PAGE-CONTENT -->

@endsection

@section('scripts')

@endsection