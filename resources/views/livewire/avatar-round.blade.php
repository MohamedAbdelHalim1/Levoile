@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Avatarround</li>
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
                                <div class="col-md-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Simple Round avatar</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <p>Use classes<code class="highlighter-rouge">.avatar</code> in <code
                                                        class="highlighter-rouge">.brround</code>.</p>
                                                <div class="example">
                                                    <div class="avatar-list">
                                                        <span class="avatar  brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/28.jpg')}}"></span>
                                                        <span class="avatar  brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/32.jpg')}}"></span>
                                                        <span class="avatar  brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/33.jpg')}}"></span>
                                                        <span class="avatar  brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/30.jpg')}}"></span>
                                                        <span class="avatar  brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/27.jpg')}}"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                <div class="col-md-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Round Avatars list</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <p>Use classes <code class="highlighter-rouge">.avatar-list </code> in <code
                                                        class="highlighter-rouge">.brround</code> and <code
                                                        class="highlighter-rouge">.avatar-list-stacked</code>.</p>
                                                <div class="example">
                                                    <div class="avatar-list avatar-list-stacked">
                                                        <span class="avatar brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/28.jpg')}}"></span>
                                                        <span class="avatar brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/32.jpg')}}"></span>
                                                        <span class="avatar brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/female/24.jpg')}}"></span>
                                                        <span class="avatar brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/32.jpg')}}"></span>
                                                        <span class="avatar brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/33.jpg')}}"></span>
                                                        <a href="javascript:void(0);">
                                                            <span class="avatar brround cover-image bg-primary">+8</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                            </div>
                            <!-- ROW-1 CLOSED -->

                            <!-- ROW-2 OPEN -->
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">RoundAvatar with icons</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <p>Use classes <code class="highlighter-rouge">.avatar-icons</code> .</p>
                                                <div class="example">
                                                    <div class="avatar-list">
                                                        <span class="avatar avatar-xl brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/female/21.jpg')}}">
                                                            <span class="avatar-icons bg-primary"><i
                                                                    class="fe fe-edit fs-12"></i></span></span>
                                                        <span class="avatar avatar-xl brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/female/23.jpg')}}">
                                                            <span class="avatar-icons bg-secondary"><i
                                                                    class="fe fe-arrow-down fs-12"></i></span>
                                                        </span>
                                                        <span class="avatar avatar-xl brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/female/24.jpg')}}">
                                                            <span class="avatar-icons bg-red"><i
                                                                    class="fe fe-lock fs-12"></i></span>
                                                        </span>
                                                        <span class="avatar avatar-xl brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/female/19.jpg')}}">
                                                            <span class="avatar-icons bg-green"><i
                                                                    class="fe fe-camera fs-12"></i></span>
                                                        </span>
                                                        <span class="avatar avatar-xl brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/female/25.jpg')}}">
                                                            <span class="avatar-icons bg-yellow"><i
                                                                    class="fe fe-bell fs-12"></i></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                <div class="col-md-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">RoundAvatar size</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <p>Use classes <code class="highlighter-rouge">.avatar-sm</code> , <code
                                                        class="highlighter-rouge">.avatar-md</code> , <code
                                                        class="highlighter-rouge">.avatar-lg</code> , <code
                                                        class="highlighter-rouge">.avatar-xl</code> , <code
                                                        class="highlighter-rouge">.avatar-xxl</code> .</p>
                                                <div class="example">
                                                    <div class="avatar-list">
                                                        <span class="avatar avatar-sm brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/28.jpg')}}"></span>
                                                        <span class="avatar brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/32.jpg')}}"></span>
                                                        <span class="avatar avatar-md brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/33.jpg')}}"></span>
                                                        <span class="avatar avatar-lg brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/30.jpg')}}"></span>
                                                        <span class="avatar avatar-xl brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/25.jpg')}}"></span>
                                                        <span class="avatar avatar-xxl brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/24.jpg')}}"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                            </div>
                            <!-- ROW-2 OPEN -->

                            <!-- ROW-3 OPEN -->
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Round Avatar status</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <p>Use classes <code class="highlighter-rouge">.avatar-status</code> .</p>
                                                <div class="example">
                                                    <div class="avatar-list">
                                                        <span class="avatar brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/28.jpg')}}">
                                                            <span class="avatar-status bg-primary"></span>
                                                        </span>

                                                        <span class="avatar brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/32.jpg')}}">
                                                            <span class="avatar-status bg-secondary"></span>
                                                        </span>
                                                        <span class="avatar brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/33.jpg')}}">
                                                            <span class="avatar-status bg-red"></span>
                                                        </span>
                                                        <span class="avatar brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/30.jpg')}}">
                                                            <span class="avatar-status bg-green"></span>
                                                        </span>
                                                        <span class="avatar brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/25.jpg')}}">
                                                            <span class="avatar-status bg-yellow"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                <div class="col-md-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">RoundAvatar with Badges</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <p>Use classes <code class="highlighter-rouge">.avatar-badges</code> .</p>
                                                <div class="example">
                                                    <div class="avatar-list">
                                                        <span class="avatar avatar-md brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/28.jpg')}}">
                                                            <span
                                                                class="badge rounded-pill avatar-badges bg-primary fs-10">3</span>
                                                        </span>
                                                        <span class="avatar avatar-md brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/32.jpg')}}">
                                                            <span
                                                                class="badge rounded-pill avatar-badges bg-secondary fs-10">1</span>
                                                        </span>
                                                        <span class="avatar avatar-md brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/33.jpg')}}">
                                                            <span
                                                                class="badge rounded-pill avatar-badges bg-red fs-10">4</span>
                                                        </span>
                                                        <span class="avatar avatar-md brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/30.jpg')}}">
                                                            <span
                                                                class="badge rounded-pill avatar-badges bg-green fs-10">6</span>
                                                        </span>
                                                        <span class="avatar avatar-md brround cover-image"
                                                            data-bs-image-src="{{asset('build/assets/images/users/male/25.jpg')}}">
                                                            <span
                                                                class="badge rounded-pill avatar-badges bg-yellow fs-10">4</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                                <!-- COL END -->
                                <div class="col-md-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Avatar initials with colors</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="example">
                                                    <p>Use classes <code class="highlighter-rouge">.avatar-sm</code> , <code
                                                            class="highlighter-rouge">.avatar-md</code> , <code
                                                            class="highlighter-rouge">.avatar-lg</code> , <code
                                                            class="highlighter-rouge">.avatar-xl</code> , <code
                                                            class="highlighter-rouge">.avatar-xxl</code> .</p>
                                                    <div class="avatar-list">
                                                        <span class="avatar avatar-sm brround bg-success">A</span>
                                                        <span class="avatar brround bg-warning">B</span>
                                                        <span class="avatar avatar-md brround bg-danger">C</span>
                                                        <span class="avatar avatar-lg brround bg-info">D</span>
                                                        <span class="avatar avatar-xl brround bg-secondary">GE</span>
                                                        <span class="avatar avatar-xxl brround bg-primary">A.N</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL END -->
                            </div>
                            <!-- ROW-3 OPEN -->

@endsection

@section('scripts')

@endsection