@extends('layouts.custom-app1')

@section('styles')

@endsection

@section('content')

                <div class="page-content">
                    <div class="container text-center text-dark">
                        <div class="row">
                            <div class="col-lg-4 d-block mx-auto">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="text-center mb-3">
                                                    <a class="header-brand1" href="{{url('index')}}">
                                                        <img src="{{asset('build/assets/images/brand/logo.png')}}"
                                                            class="header-brand-img main-logo" alt="Sparic logo">
                                                        <img src="{{asset('build/assets/images/brand/logo-light.png')}}"
                                                            class="header-brand-img darklogo" alt="Sparic logo">
                                                    </a>
                                                </div>
                                                <div class="text-center mb-4 ">
                                                    <img src="{{asset('build/assets/images/users/male/15.jpg')}}" alt="user-img"
                                                        class="avatar avatar-xl brround mCS_img_loaded">
                                                </div>
                                                <span class="m-4 d-none d-lg-block text-center">
                                                    <span class="h4"><strong>Alison</strong></span>
                                                </span>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                                        placeholder="Password">
                                                </div>
                                                <a href="{{url('index')}}" class="btn btn-primary btn-block">Unlock</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

@endsection

@section('scripts')

@endsection