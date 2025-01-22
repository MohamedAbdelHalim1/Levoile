@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Gallery</li>
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

                            <!-- GALLERY DEMO OPEN -->
                            <div class="demo-gallery card">
                                <div class="card-header">
                                    <div class="card-title">Light Gallery</div>
                                </div>
                                <div class="card-body">
                                    <ul id="lightgallery" class="list-unstyled row">
                                        <li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
                                            data-responsive="{{asset('build/assets/images/media/1.jpg')}}"
                                            data-src="{{asset('build/assets/images/media/1.jpg')}}"
                                            data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                            <a href="javascript:void(0)">
                                                <img class="img-responsive br-7" src="{{asset('build/assets/images/media/1.jpg')}}"
                                                    alt="Thumb-1">
                                            </a>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
                                            data-responsive="{{asset('build/assets/images/media/2.jpg')}}"
                                            data-src="{{asset('build/assets/images/media/2.jpg')}}"
                                            data-sub-html="<h4>Gallery Image 2</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                            <a href="javascript:void(0)">
                                                <img class="img-responsive br-7" src="{{asset('build/assets/images/media/2.jpg')}}"
                                                    alt="Thumb-2">
                                            </a>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
                                            data-responsive="{{asset('build/assets/images/media/3.jpg')}}"
                                            data-src="{{asset('build/assets/images/media/3.jpg')}}"
                                            data-sub-html="<h4>Gallery Image 3</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                            <a href="javascript:void(0)">
                                                <img class="img-responsive br-7" src="{{asset('build/assets/images/media/3.jpg')}}"
                                                    alt="Thumb-1">
                                            </a>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
                                            data-responsive="{{asset('build/assets/images/media/4.jpg')}}"
                                            data-src="{{asset('build/assets/images/media/4.jpg')}}"
                                            data-sub-html=" <h4>Gallery Image 4</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                            <a href="javascript:void(0)">
                                                <img class="img-responsive br-7" src="{{asset('build/assets/images/media/4.jpg')}}"
                                                    alt="Thumb-2">
                                            </a>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                            data-responsive="{{asset('build/assets/images/media/5.jpg')}}"
                                            data-src="{{asset('build/assets/images/media/5.jpg')}}"
                                            data-sub-html="<h4>Gallery Image 5</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                            <a href="javascript:void(0)">
                                                <img class="img-responsive br-7" src="{{asset('build/assets/images/media/5.jpg')}}"
                                                    alt="Thumb-1">
                                            </a>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                            data-responsive="{{asset('build/assets/images/media/6.jpg')}}"
                                            data-src="{{asset('build/assets/images/media/6.jpg')}}"
                                            data-sub-html="<h4>Gallery Image 6</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                            <a href="javascript:void(0)">
                                                <img class="img-responsive br-7" src="{{asset('build/assets/images/media/6.jpg')}}"
                                                    alt="Thumb-2">
                                            </a>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                            data-responsive="{{asset('build/assets/images/media/7.jpg')}}"
                                            data-src="{{asset('build/assets/images/media/7.jpg')}}"
                                            data-sub-html="<h4>Gallery Image 7</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                            <a href="javascript:void(0)">
                                                <img class="img-responsive br-7" src="{{asset('build/assets/images/media/7.jpg')}}"
                                                    alt="Thumb-1">
                                            </a>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
                                            data-responsive="{{asset('build/assets/images/media/8.jpg')}}"
                                            data-src="{{asset('build/assets/images/media/8.jpg')}}"
                                            data-sub-html="<h4>Gallery Image 8</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                            <a href="javascript:void(0)">
                                                <img class="img-responsive br-7" src="{{asset('build/assets/images/media/8.jpg')}}"
                                                    alt="Thumb-2">
                                            </a>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
                                            data-responsive="{{asset('build/assets/images/media/9.jpg')}}"
                                            data-src="{{asset('build/assets/images/media/9.jpg')}}"
                                            data-sub-html="<h4>Gallery Image 9</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                            <a href="javascript:void(0)">
                                                <img class="img-responsive mb-0 br-7" src="{{asset('build/assets/images/media/9.jpg')}}"
                                                    alt="Thumb-1">
                                            </a>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
                                            data-responsive="{{asset('build/assets/images/media/10.jpg')}}"
                                            data-src="{{asset('build/assets/images/media/10.jpg')}}"
                                            data-sub-html="<h4>Gallery Image 10</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                            <a href="javascript:void(0)">
                                                <img class="img-responsive mb-0 br-7" src="{{asset('build/assets/images/media/10.jpg')}}"
                                                    alt="Thumb-2">
                                            </a>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
                                            data-responsive="{{asset('build/assets/images/media/11.jpg')}}"
                                            data-src="{{asset('build/assets/images/media/11.jpg')}}"
                                            data-sub-html="<h4>Gallery Image 11</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                            <a href="javascript:void(0)">
                                                <img class="img-responsive mb-0 br-7" src="{{asset('build/assets/images/media/11.jpg')}}"
                                                    alt="Thumb-1">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- GALLERY DEMO CLOSED -->

                            <!-- PAGINATION OPEN -->
                            <div class=" row mb-5">
                                <div class=" col-md-6 mt-1 d-none d-md-block">1 - 10 of 234 photos</div>
                                <div class=" col-md-6">
                                    <div class=" float-end">
                                        <ul class=" pagination">
                                            <li class=" page-item page-prev disabled">
                                                <a class=" page-link" href="javascript:void(0)">Prev</a>
                                            </li>
                                            <li class=" page-item active"><a class=" page-link" href=" #">1</a></li>
                                            <li class=" page-item"><a class=" page-link" href=" #">2</a></li>
                                            <li class=" page-item"><a class=" page-link" href=" #">3</a></li>
                                            <li class=" page-item"><a class=" page-link" href=" #">4</a></li>
                                            <li class=" page-item"><a class=" page-link" href=" #">5</a></li>
                                            <li class=" page-item page-next">
                                                <a class=" page-link" href=" #">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- COL-END -->
                            </div>
                            <!-- PAGINATION CLOSED -->

@endsection

@section('scripts')

        <!-- GALLERY JS -->
        <script src="{{asset('build/assets/plugins/gallery/picturefill.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lightgallery.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lightgallery-1.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-pager.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-autoplay.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-fullscreen.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-zoom.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-hash.js')}}"></script>
        <script src="{{asset('build/assets/plugins/gallery/lg-share.js')}}"></script>

@endsection