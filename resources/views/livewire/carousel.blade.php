@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Carousel</li>
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
                                <div class="col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Carousel</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="carousel-default" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/19.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/20.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/21.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/22.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/23.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Carousel with indicators</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="carousel-indicators" class="carousel slide" data-bs-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-bs-target="#carousel-indicators" data-bs-slide-to="0"
                                                        class="active"></li>
                                                    <li data-bs-target="#carousel-indicators" data-bs-slide-to="1" class="">
                                                    </li>
                                                    <li data-bs-target="#carousel-indicators" data-bs-slide-to="2" class="">
                                                    </li>
                                                    <li data-bs-target="#carousel-indicators" data-bs-slide-to="3" class="">
                                                    </li>
                                                    <li data-bs-target="#carousel-indicators" data-bs-slide-to="4" class="">
                                                    </li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/24.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/25.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/1.jpg')}}" data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/2.jpg')}}" data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/3.jpg')}}" data-holder-rendered="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Carousel with controls</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                </div>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" alt=""
                                                                src="{{asset('build/assets/images/photos/4.jpg')}}" data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                                src="{{asset('build/assets/images/photos/5.jpg')}}" data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                                src="{{asset('build/assets/images/photos/6.jpg')}}" data-holder-rendered="true">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Carousel with captions</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                </div>
                                                <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/9.jpg')}}" data-holder-rendered="true">
                                                    <div class="carousel-caption d-none d-md-block">
                                                    <h5>First slide label</h5>
                                                    <p>Some representative placeholder content for the first slide.</p>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/10.jpg')}}"
                                                            data-holder-rendered="true">
                                                    <div class="carousel-caption d-none d-md-block">
                                                    <h5>Second slide label</h5>
                                                    <p>Some representative placeholder content for the second slide.</p>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/11.jpg')}}"
                                                            data-holder-rendered="true">
                                                    <div class="carousel-caption d-none d-md-block">
                                                    <h5>Third slide label</h5>
                                                    <p>Some representative placeholder content for the third slide.</p>
                                                    </div>
                                                </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Carousel with top controls</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="carousel-indicators1" class="carousel slide" data-bs-ride="carousel">
                                                <ol class="carousel-indicators1">
                                                    <li data-bs-target="#carousel-indicators1" data-bs-slide-to="0"
                                                        class="active"></li>
                                                    <li data-bs-target="#carousel-indicators1" data-bs-slide-to="1"
                                                        class="">
                                                    </li>
                                                    <li data-bs-target="#carousel-indicators1" data-bs-slide-to="2"
                                                        class="">
                                                    </li>
                                                    <li data-bs-target="#carousel-indicators1" data-bs-slide-to="3"
                                                        class="">
                                                    </li>
                                                    <li data-bs-target="#carousel-indicators1" data-bs-slide-to="4"
                                                        class="">
                                                    </li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/14.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/15.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/16.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/17.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/18.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Carousel with top-right controls</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="carousel-indicators2" class="carousel slide" data-bs-ride="carousel">
                                                <ol class="carousel-indicators2">
                                                    <li data-bs-target="#carousel-indicators2" data-bs-slide-to="0"
                                                        class="active"></li>
                                                    <li data-bs-target="#carousel-indicators2" data-bs-slide-to="1"
                                                        class="">
                                                    </li>
                                                    <li data-bs-target="#carousel-indicators2" data-bs-slide-to="2"
                                                        class="">
                                                    </li>
                                                    <li data-bs-target="#carousel-indicators2" data-bs-slide-to="3"
                                                        class="">
                                                    </li>
                                                    <li data-bs-target="#carousel-indicators2" data-bs-slide-to="4"
                                                        class="">
                                                    </li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/19.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/20.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/21.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/22.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/23.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Carousel with top-left controls</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="carousel-indicators3" class="carousel slide" data-bs-ride="carousel">
                                                <ol class="carousel-indicators3">
                                                    <li data-bs-target="#carousel-indicators3" data-bs-slide-to="0"
                                                        class="active"></li>
                                                    <li data-bs-target="#carousel-indicators3" data-bs-slide-to="1"
                                                        class="">
                                                    </li>
                                                    <li data-bs-target="#carousel-indicators3" data-bs-slide-to="2"
                                                        class="">
                                                    </li>
                                                    <li data-bs-target="#carousel-indicators3" data-bs-slide-to="3"
                                                        class="">
                                                    </li>
                                                    <li data-bs-target="#carousel-indicators3" data-bs-slide-to="4"
                                                        class="">
                                                    </li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/24.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/25.jpg')}}"
                                                            data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/1.jpg')}}" data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/2.jpg')}}" data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/3.jpg')}}" data-holder-rendered="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Carousel with bottom-right controls</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="carousel-indicators4" class="carousel slide" data-bs-ride="carousel">
                                                <ol class="carousel-indicators4">
                                                    <li data-bs-target="#carousel-indicators4" data-bs-slide-to="0"
                                                        class="active"></li>
                                                    <li data-bs-target="#carousel-indicators4" data-bs-slide-to="1"
                                                        class="">
                                                    </li>
                                                    <li data-bs-target="#carousel-indicators4" data-bs-slide-to="2"
                                                        class="">
                                                    </li>
                                                    <li data-bs-target="#carousel-indicators4" data-bs-slide-to="3"
                                                        class="">
                                                    </li>
                                                    <li data-bs-target="#carousel-indicators4" data-bs-slide-to="4"
                                                        class="">
                                                    </li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/4.jpg')}}" data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/5.jpg')}}" data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/6.jpg')}}" data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/7.jpg')}}" data-holder-rendered="true">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/8.jpg')}}" data-holder-rendered="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Carousel with Crossfade</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/4.jpg')}}" data-holder-rendered="true">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/5.jpg')}}" data-holder-rendered="true">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/7.jpg')}}" data-holder-rendered="true">
                                                </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Carousel with GradientBackground  caption</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="carousel-captions1" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" alt="" src="{{asset('build/assets/images/photos/46.jpg')}}" data-holder-rendered="true">
                                                        <div class="carousel-caption">
                                                            <h3 class="text-white">Slide label</h3>
                                                            <p>The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures.</p>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt="" src="{{asset('build/assets/images/photos/47.jpg')}}" data-holder-rendered="true">
                                                        <div class="carousel-item-background d-none d-md-block"></div>
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <h3 class="text-white">Slide label</h3>
                                                            <p>The wise man therefore always holds in these matters to this principle of selection he rejects pleasures.</p>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" alt="" src="{{asset('build/assets/images/photos/48.jpg')}}" data-holder-rendered="true">
                                                        <div class="carousel-item-background d-none d-md-block"></div>
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <h3 class="text-white">Slide label</h3>
                                                            <p>The wise man therefore always holds in these matters to this principle of selection he rejects pleasures.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carousel-captions1" role="button" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carousel-captions1" role="button" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Carousel with Background color captions</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="carouselExampleCaptions2" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                </div>
                                                <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/55.jpg')}}"
                                                            data-holder-rendered="true">
                                                    <div class="carousel-caption d-none d-md-block">
                                                    <h5>First slide label</h5>
                                                    <p class="mb-0">Some representative placeholder content for the first slide.</p>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/39.jpg')}}"
                                                            data-holder-rendered="true">
                                                    <div class="carousel-caption d-none d-md-block">
                                                    <h5>Second slide label</h5>
                                                    <p class="mb-0">Some representative placeholder content for the second slide.</p>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" alt=""
                                                            src="{{asset('build/assets/images/photos/49.jpg')}}"
                                                            data-holder-rendered="true">
                                                    <div class="carousel-caption d-none d-md-block">
                                                    <h5>Third slide label</h5>
                                                    <p class="mb-0">Some representative placeholder content for the third slide.</p>
                                                    </div>
                                                </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

@endsection