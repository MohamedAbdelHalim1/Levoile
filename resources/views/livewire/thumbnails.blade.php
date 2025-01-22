@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thumbnails</li>
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
                                            <h3 class="card-title">Basic Thumbnails</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6 col-md-3">
                                                    <a href="javascript:void(0);" class="thumbnail mb-md-0">
                                                        <img src="{{asset('build/assets/images/photos/1.jpg')}}" alt="thumb1"
                                                            class="thumbimg">
                                                    </a>
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <a href="javascript:void(0);" class="thumbnail mb-md-0">
                                                        <img src="{{asset('build/assets/images/photos/2.jpg')}}" alt="thumb1"
                                                            class="thumbimg">
                                                    </a>
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <a href="javascript:void(0);" class="thumbnail mb-0">
                                                        <img src="{{asset('build/assets/images/photos/3.jpg')}}" alt="thumb1"
                                                            class="thumbimg">
                                                    </a>
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <a href="javascript:void(0);" class="thumbnail mb-0">
                                                        <img src="{{asset('build/assets/images/photos/5.jpg')}}" alt="thumb1"
                                                            class="thumbimg">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Custom content Thumbnails</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-4">
                                                    <div class="thumbnail mb-lg-0">
                                                        <a href="javascript:void(0);">
                                                            <img src="{{asset('build/assets/images/photos/19.jpg')}}" alt="thumb1"
                                                                class="thumbimg">
                                                        </a>
                                                        <div class="caption">
                                                            <h4><strong>Thumbnail label</strong></h4>
                                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random
                                                                text. It has roots in a piece of classical Latin literature
                                                                from
                                                                45 BC, making it over 2000 years old. Richard McClintock, a
                                                                Latin professor at Hampden-Sydney College in Virginia.</p>
                                                            <div class="btn-list">
                                                                <a href="javascript:void(0);" class="btn btn-primary"
                                                                    role="button">Button</a>
                                                                <a href="javascript:void(0);" class="btn btn-success"
                                                                    role="button">Button</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-4">
                                                    <div class="thumbnail mb-lg-0">
                                                        <a href="javascript:void(0);">
                                                            <img src="{{asset('build/assets/images/photos/20.jpg')}}" alt="thumb1"
                                                                class="thumbimg">
                                                        </a>
                                                        <div class="caption">
                                                            <h4><strong>Thumbnail label</strong></h4>
                                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random
                                                                text. It has roots in a piece of classical Latin literature
                                                                from
                                                                45 BC, making it over 2000 years old. Richard McClintock, a
                                                                Latin professor at Hampden-Sydney College in Virginia.</p>
                                                            <div class="btn-list">
                                                                <a href="javascript:void(0);" class="btn btn-primary"
                                                                    role="button">Button</a>
                                                                <a href="javascript:void(0);" class="btn btn-success"
                                                                    role="button">Button</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-4">
                                                    <div class="thumbnail mb-0">
                                                        <a href="javascript:void(0);">
                                                            <img src="{{asset('build/assets/images/photos/21.jpg')}}" alt="thumb1"
                                                                class="thumbimg">
                                                        </a>
                                                        <div class="caption">
                                                            <h4><strong>Thumbnail label</strong></h4>
                                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random
                                                                text. It has roots in a piece of classical Latin literature
                                                                from
                                                                45 BC, making it over 2000 years old. Richard McClintock, a
                                                                Latin professor at Hampden-Sydney College in Virginia.</p>
                                                            <div class="btn-list">
                                                                <a href="javascript:void(0);" class="btn btn-primary"
                                                                    role="button">Button</a>
                                                                <a href="javascript:void(0);" class="btn btn-success"
                                                                    role="button">Button</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Custom content Thumbnails</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-6 col-xl-3">
                                                    <div class="thumbnail mb-xl-0">
                                                        <a href="javascript:void(0);">
                                                            <img src="{{asset('build/assets/images/photos/22.jpg')}}" alt="thumb1"
                                                                class="thumbimg">
                                                        </a>
                                                        <div class="caption">
                                                            <h4><strong>Thumbnail label</strong></h4>
                                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random
                                                                text. It has roots in a piece of classical Latin literature
                                                                from
                                                                45 BC, making it over 2000 years old. Richard McClintock, a
                                                                Latin professor at Hampden-Sydney College in Virginia.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-6 col-xl-3">
                                                    <div class="thumbnail mb-xl-0">
                                                        <a href="javascript:void(0);">
                                                            <img src="{{asset('build/assets/images/photos/23.jpg')}}" alt="thumb1"
                                                                class="thumbimg">
                                                        </a>
                                                        <div class="caption">
                                                            <h4><strong>Thumbnail label</strong></h4>
                                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random
                                                                text. It has roots in a piece of classical Latin literature
                                                                from
                                                                45 BC, making it over 2000 years old. Richard McClintock, a
                                                                Latin professor at Hampden-Sydney College in Virginia.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-6 col-xl-3">
                                                    <div class="thumbnail mb-lg-0">
                                                        <div class="caption">
                                                            <h4><strong>Thumbnail label</strong></h4>
                                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random
                                                                text. It has roots in a piece of classical Latin literature
                                                                from
                                                                45 BC, making it over 2000 years old. Richard McClintock, a
                                                                Latin professor at Hampden-Sydney College in Virginia.</p>
                                                        </div>
                                                        <a href="javascript:void(0);">
                                                            <img src="{{asset('build/assets/images/photos/24.jpg')}}" alt="thumb1"
                                                                class="thumbimg">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-6 col-xl-3">
                                                    <div class="thumbnail mb-0">
                                                        <div class="caption">
                                                            <h4><strong>Thumbnail label</strong></h4>
                                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random
                                                                text. It has roots in a piece of classical Latin literature
                                                                from
                                                                45 BC, making it over 2000 years old. Richard McClintock, a
                                                                Latin professor at Hampden-Sydney College in Virginia.</p>
                                                        </div>
                                                        <a href="javascript:void(0);">
                                                            <img src="{{asset('build/assets/images/photos/25.jpg')}}" alt="thumb1"
                                                                class="thumbimg">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Video List Thumbnail</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <ul class="list-unstyled video-list-thumbs row mb-0">
                                                    <li class="col-sm-12 col-lg-3 col-md-6 border-0 mb-lg-0">
                                                        <a href="https://www.youtube.com/embed/f3NWvUV8MD8"
                                                            title="sed do eiusmod tempor incidi dunt ut labore et dolore magna">
                                                            <img src="{{asset('build/assets/images/photos/24.jpg')}}" alt="Barca"
                                                                class="img-responsive" >

                                                            <span class="fa fa-play-circle-o"></span>
                                                            <span class="duration">06:28</span>
                                                        </a>
                                                    </li>
                                                    <li class="col-sm-12 col-lg-3 col-md-6 border-0 mb-lg-0">
                                                        <a href="https://www.youtube.com/embed/f3NWvUV8MD8"
                                                            title="sed do eiusmod tempor incidi dunt ut labore et dolore magna">
                                                            <img src="{{asset('build/assets/images/photos/25.jpg')}}" alt="Barca"
                                                                class="img-responsive" >
                                                            <span class="fa fa-play-circle-o"></span>
                                                            <span class="duration">06:28</span>
                                                        </a>
                                                    </li>
                                                    <li class="ccol-sm-12 col-lg-3 col-md-6 border-0 mb-md-0">
                                                        <a href="https://www.youtube.com/embed/f3NWvUV8MD8"
                                                            title="sed do eiusmod tempor incidi dunt ut labore et dolore magna">
                                                            <img src="{{asset('build/assets/images/photos/20.jpg')}}" alt="Barca"
                                                                class="img-responsive" >
                                                            <span class="fa fa-play-circle-o"></span>
                                                            <span class="duration">06:28</span>
                                                        </a>
                                                    </li>
                                                    <li class="col-sm-12 col-lg-3 col-md-6 border-0 mb-0">
                                                        <a href="https://www.youtube.com/embed/f3NWvUV8MD8"
                                                            title="sed do eiusmod tempor incidi dunt ut labore et dolore magna">
                                                            <img src="{{asset('build/assets/images/photos/22.jpg')}}" alt="Barca"
                                                                class="img-responsive" >
                                                            <span class="fa fa-play-circle-o"></span>
                                                            <span class="duration">06:28</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

@endsection