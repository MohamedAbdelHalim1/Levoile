@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Extension</li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog Post</li>
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
                                <div class="col-xl-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Add New Post</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Post Title :</label>
                                                <div class="">
                                                    <input type="text" class="form-control" value="Typing.....">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Categories :</label>
                                                <div class="">
                                                    <select name="country" class="form-control form-select select2"
                                                        data-bs-placeholder="Select Country">
                                                        <option value="br">Technology</option>
                                                        <option value="cz">Travel</option>
                                                        <option value="de">Food</option>
                                                        <option value="pl">Fashion</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Row -->
                                            <div class="row">
                                                <label class="col-md-3 form-label mb-4">Post Description :</label>
                                                <div>
                                                    <textarea class="content" name="example"></textarea>
                                                </div>
                                            </div>
                                            <!--End Row-->

                                            <div class="form-group mb-0 mt-4">
                                                <label class="col-md-3 form-label mb-4">File Upload :</label>
                                                <input id="demo" type="file" name="files"
                                                    accept=".jpg, .png, image/jpeg, image/png" multiple>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="javascript:void(0)" class="btn btn-primary">Post</a>
                                            <a href="javascript:void(0)" class="btn btn-light float-end">Discard</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Recent Posts</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <div class="d-flex overflow-visible">
                                                    <a href="{{url('blog-details')}}" class="card-recent-post cover-image">
                                                        <img src="{{asset('build/assets/images/photos/9.jpg')}}" class="br-7" alt="image">
                                                    </a>
                                                    <div class="ps-3 flex-column">
                                                        <span class="badge bg-danger me-1 mb-1 mt-1">Lifestyle</span>
                                                        <h6 class="fw-semibold"><a href="{{url('blog-details')}}">Generator on the Internet..</a></h6>
                                                        <div class="text-muted-dark">Excepteur sint occaecat cupidatat non
                                                            proident,
                                                            accusantium sunt in culpa qui officia deserunt mollit anim id
                                                            est
                                                            laborum....</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex overflow-visible mt-5">
                                                    <a href="{{url('blog-details')}}" class="card-recent-post cover-image">
                                                        <img src="{{asset('build/assets/images/photos/1.jpg')}}" class="br-7" alt="image">
                                                    </a>
                                                    <div class="ps-3 flex-column">
                                                        <span class="badge bg-primary me-1 mb-1 mt-1">Business</span>
                                                        <h6 class="fw-semibold"><a href="{{url('blog-details')}}">Voluptatem quia voluptas...</a></h6>
                                                        <div class="text-muted-dark">Excepteur sint occaecat cupidatat non
                                                            proident,
                                                            accusantium sunt in culpa qui officia deserunt mollit anim id
                                                            est
                                                            laborum....</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex overflow-visible mt-5">
                                                    <a href="{{url('blog-details')}}" class="card-recent-post cover-image">
                                                        <img src="{{asset('build/assets/images/photos/10.jpg')}}" class="br-7" alt="image">
                                                    </a>
                                                    <div class="ps-3 flex-column">
                                                        <span class="badge bg-secondary me-1 mb-1 mt-1">Travel</span>
                                                        <h6 class="fw-semibold"><a href="{{url('blog-details')}}">Generator on the Internet..</a></h6>
                                                        <div class="text-muted-dark">Excepteur sint occaecat cupidatat non
                                                            proident,
                                                            accusantium sunt in culpa qui officia deserunt mollit anim id
                                                            est
                                                            laborum....</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex overflow-visible mt-5">
                                                    <a href="{{url('blog-details')}}" class="card-recent-post cover-image">
                                                        <img src="{{asset('build/assets/images/photos/4.jpg')}}" class="br-7" alt="image">
                                                    </a>
                                                    <div class="ps-3 flex-column">
                                                        <span class="badge bg-success me-1 mb-1 mt-1">Meeting</span>
                                                        <h6 class="fw-semibold"><a href="{{url('blog-details')}}">Voluptatem quia voluptas...</a></h6>
                                                        <div class="text-muted-dark">Excepteur sint occaecat cupidatat non
                                                            proident,
                                                            accusantium sunt in culpa qui officia deserunt mollit anim id
                                                            est
                                                            laborum....</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Professional Blog Writers</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <div
                                                    class="d-flex justify-content-center align-content-center overflow-visible">
                                                    <img class="avatar br-7 avatar-xl me-3"
                                                        src="{{asset('build/assets/images/users/female/20.jpg')}}" alt="avatar-img">
                                                    <div class="media-body valign-middle">
                                                    <h6 class="fw-semibold"><a href="{{url('profile')}}">John Paige</a></h6>
                                                        <p class="text-muted-dark mb-0">There are many Lorem ipsum dolor sit
                                                            amet.variations of passages of
                                                            Lorem Ipsum available ...</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex overflow-visible mt-5">
                                                    <img class="avatar br-7 avatar-xl me-3"
                                                        src="{{asset('build/assets/images/users/male/30.jpg')}}" alt="avatar-img">
                                                    <div class="media-body valign-middle">
                                                        <h6 class="fw-semibold"><a href="{{url('profile')}}">Peter Hill</a></h6>
                                                        <p class="text-muted-dark mb-0">There are many Lorem ipsum dolor sit amet
                                                            consectetur.variations of passages of
                                                            Lorem Ipsum available ...</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex overflow-visible mt-5">
                                                    <img class="avatar br-7 avatar-xl me-3"
                                                        src="{{asset('build/assets/images/users/male/24.jpg')}}" alt="avatar-img">
                                                    <div class="media-body valign-middle">
                                                        <h6 class="fw-semibold"><a href="{{url('profile')}}">Irene Harris</a></h6>
                                                        <p class="text-muted-dark mb-0">There are many Lorem ipsum dolor, sit
                                                            amet
                                                            consectetur adipisicing.variations of passages of
                                                            Lorem Ipsum available ...</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex overflow-visible mt-5">
                                                    <img class="avatar br-7 avatar-xl me-3"
                                                        src="{{asset('build/assets/images/users/male/33.jpg')}}" alt="avatar-img">
                                                    <div class="media-body valign-middle">
                                                    <h6 class="fw-semibold"><a href="{{url('profile')}}">Harry Fisher</a></h6>
                                                        <p class="text-muted-dark mb-0">There are many Lorem ipsum dolor sit amet
                                                            consectetur elit. Saepe.variations of passages of
                                                            Lorem Ipsum available ...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- SELECT2 JS -->
        <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
        @vite('resources/assets/js/select2.js')


        <!-- INTERNAL WYSIWYG EDITOR JS -->
        <script src="{{asset('build/assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>
        <script src="{{asset('build/assets/plugins/wysiwyag/wysiwyag.js')}}"></script>

        <!-- INTERNAL FILE-UPLOADS JS -->
        <script src="{{asset('build/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
        <script src="{{asset('build/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
        <script src="{{asset('build/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
        <script src="{{asset('build/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
        <script src="{{asset('build/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
@endsection