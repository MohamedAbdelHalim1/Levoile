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
                                    <div class="text-center mb-2">
                                        <a class="header-brand1" href="{{ url('index') }}">
                                            <img src="{{ asset('build/assets/images/brand/logo.png') }}"
                                                class="header-brand-img main-logo" alt="Sparic logo" style="width: 100px;height: 100px;">
                                            <img src="{{ asset('build/assets/images/brand/logo-light.png') }}"
                                                class="header-brand-img darklogo" alt="Sparic logo" style="width: 100px;height: 100px;"> 
                                        </a>
                                    </div>
                                    <form method="POST" action="{{ url('login') }}">
                                        @csrf
                                        <h3>تسجيل الدخول</h3>
                                        <p class="text-muted">سجل الدخول في حسابك</p>
                                        <div class="input-group mb-3">
                                            <span class="input-group-addon bg-white"><i
                                                    class="fa fa-user text-dark"></i></span>
                                            <input type="text" class="form-control" placeholder="الايميل" name="email">
                                        </div>
                                        <div class="input-group mb-4">
                                            <span class="input-group-addon bg-white"><i
                                                    class="fa fa-unlock-alt text-dark"></i></span>
                                            <input type="password" class="form-control" placeholder="كلمة المرور"
                                                name="password">
                                        </div>
                                        <div class="row">
                                            <div>
                                                <button type="submit" class="btn btn-primary btn-block">تسجيل الدخول</button>
                                            </div>
                                        </div>
                                    </form>
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
