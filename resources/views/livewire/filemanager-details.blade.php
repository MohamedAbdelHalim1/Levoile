@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Components</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Filemanger</li>
                                    <li class="breadcrumb-item active" aria-current="page">Filemanger Details</li>
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
                            <div class="row row-sm">
                                <div class="col-xl-8 col-lg-8 col-md-12">
                                    <div class="card custom-card overflow-hidden">
                                        <div class="card-body">
                                            <a href="javascript:void(0)"><img src="{{asset('build/assets/images/photos/28.jpg')}}"
                                                    alt="img" class="cover-image br-7 w-100"></a>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="owl-demo2" class="owl-carousel owl-carousel-icons2">
                                                <div class="item">
                                                    <div class="card custom-card overflow-hidden mb-0 ">
                                                        <a href="{{url('filemanager-details')}}"><img
                                                                src="{{asset('build/assets/images/photos/44.jpg')}}"
                                                                class="w-100" alt="img"></a>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="card custom-card overflow-hidden mb-0 ">
                                                        <a href="{{url('filemanager-details')}}"><img
                                                                src="{{asset('build/assets/images/photos/41.jpg')}}"
                                                                class="w-100" alt="img"></a>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="card border-0 custom-card overflow-hidden mb-0 ">
                                                        <a href="{{url('filemanager-details')}}"><img
                                                                src="{{asset('build/assets/images/photos/42.jpg')}}"
                                                                class="w-100" alt="img"></a>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="card custom-card overflow-hidden mb-0 ">
                                                        <a href="{{url('filemanager-details')}}"><img
                                                                src="{{asset('build/assets/images/photos/43.jpg')}}"
                                                                class="w-100" alt="img"></a>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="card custom-card overflow-hidden mb-0 ">
                                                        <a href="{{url('filemanager-details')}}"><img
                                                                src="{{asset('build/assets/images/photos/44.jpg')}}"
                                                                class="w-100" alt="img"></a>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="card border-0 custom-card overflow-hidden mb-0 ">
                                                        <a href="{{url('filemanager-details')}}"><img
                                                                src="{{asset('build/assets/images/photos/45.jpg')}}"
                                                                class="w-100" alt="img"></a>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="card custom-card overflow-hidden mb-0 ">
                                                        <a href="{{url('filemanager-details')}}"><img
                                                                src="{{asset('build/assets/images/photos/41.jpg')}}"
                                                                class="w-100" alt="img"></a>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="card custom-card overflow-hidden mb-0 ">
                                                        <a href="{{url('filemanager-details')}}"><img
                                                                src="{{asset('build/assets/images/photos/43.jpg')}}"
                                                                class="w-100" alt="img"></a>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="card custom-card overflow-hidden mb-0 ">
                                                        <a href="{{url('filemanager-details')}}"><img
                                                                src="{{asset('build/assets/images/photos/45.jpg')}}"
                                                                class="w-100" alt="img"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                File Information
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-nowrap mb-0">
                                                    <tbody class="text-dark">
                                                        <tr>
                                                            <th class="fw-semibold">File Name</th>
                                                            <td>sample-image.jpg</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="fw-semibold">File Size</th>
                                                            <td>12.45mb</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="fw-semibold">Date</th>
                                                            <td>07-10-2021</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="fw-semibold">Uploaded By</th>
                                                            <td>prityy hnyy</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="fw-semibold">Width</th>
                                                            <td>1008</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="fw-semibold">Height</th>
                                                            <td>403</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="fw-semibold">Format</th>
                                                            <td>jpg</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="fw-semibold">Location</th>
                                                            <td>storage/My Folder/sample-image.jpg</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Recent Images</h3>
                                        </div>
                                        <div class="card-body">
                                            <ul id="lightgallery" class="list-unstyled row">
                                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                                    data-responsive="{{asset('build/assets/images/media1.jpg')}}"
                                                    data-src="{{asset('build/assets/images/media/1.jpg')}}"
                                                    data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                    <a href="javascript:void(0)">
                                                        <img class="br-7" src="{{asset('build/assets/images/media/1.jpg')}}"
                                                            alt="Thumb-1">
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                                    data-responsive="{{asset('build/assets/images/media/4.jpg')}}"
                                                    data-src="{{asset('build/assets/images/media/4.jpg')}}"
                                                    data-sub-html=" <h4>Gallery Image 4</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                    <a href="javascript:void(0)">
                                                        <img class="br-7" src="{{asset('build/assets/images/media/4.jpg')}}"
                                                            alt="Thumb-2">
                                                    </a>
                                                </li>

                                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                                    data-responsive="{{asset('build/assets/images/media/5.jpg')}}"
                                                    data-src="{{asset('build/assets/images/media/5.jpg')}}"
                                                    data-sub-html="<h4>Gallery Image 5</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                    <a href="javascript:void(0)">
                                                        <img class="br-7" src="{{asset('build/assets/images/media/5.jpg')}}"
                                                            alt="Thumb-1">
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                                    data-responsive="{{asset('build/assets/images/media/6.jpg')}}"
                                                    data-src="{{asset('build/assets/images/media/6.jpg')}}"
                                                    data-sub-html="<h4>Gallery Image 6</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                    <a href="javascript:void(0)">
                                                        <img class="br-7" src="{{asset('build/assets/images/media/6.jpg')}}"
                                                            alt="Thumb-2">
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                                    data-responsive="{{asset('build/assets/images/media/7.jpg')}}"
                                                    data-src="{{asset('build/assets/images/media/7.jpg')}}"
                                                    data-sub-html="<h4>Gallery Image 7</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                    <a href="javascript:void(0)">
                                                        <img class="br-7" src="{{asset('build/assets/images/media/7.jpg')}}"
                                                            alt="Thumb-1">
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                                    data-responsive="{{asset('build/assets/images/media/8.jpg')}}"
                                                    data-src="{{asset('build/assets/images/media/8.jpg')}}"
                                                    data-sub-html="<h4>Gallery Image 8</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                    <a href="javascript:void(0)">
                                                        <img class="br-7" src="{{asset('build/assets/images/media/8.jpg')}}"
                                                            alt="Thumb-2">
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 mb-md-0 mb-xl-0  border-bottom-0"
                                                    data-responsive="{{asset('build/assets/images/media/11.jpg')}}"
                                                    data-src="{{asset('build/assets/images/media/11.jpg')}}"
                                                    data-sub-html="<h4>Gallery Image 11</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                    <a href="javascript:void(0)">
                                                        <img class="br-7"
                                                            src="{{asset('build/assets/images/media/11.jpg')}}" alt="Thumb-1">
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-xl-0 mb-md-0 mb-md-0 mb-5 border-bottom-0"
                                                    data-responsive="{{asset('build/assets/images/media/10.jpg')}}"
                                                    data-src="{{asset('build/assets/images/media/10.jpg')}}"
                                                    data-sub-html="<h4>Gallery Image 10</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                    <a href="javascript:void(0)">
                                                        <img class="br-7"
                                                            src="{{asset('build/assets/images/media/10.jpg')}}" alt="Thumb-2">
                                                    </a>
                                                </li>
                                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                                    data-responsive="{{asset('build/assets/images/media/2.jpg')}}"
                                                    data-src="{{asset('build/assets/images/media/2.jpg')}}"
                                                    data-sub-html="<h4>Gallery Image 2</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                                    <a href="javascript:void(0)">
                                                        <img class="br-7" src="{{asset('build/assets/images/media/2.jpg')}}"
                                                            alt="Thumb-2">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- INTERNAL OWL CAROUSEL JS -->
        <script src="{{asset('build/assets/plugins/owl-carousel/owl.carousel.js')}}"></script>
        @vite('resources/assets/js/carousel.js')


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