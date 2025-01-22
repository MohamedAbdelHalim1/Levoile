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
                                    <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
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
                                        <div class="card-body">
                                            <div class="">
                                                <div class="d-sm-flex d-block align-items-center">
                                                    <div class="d-flex align-items-center mb-sm-0 mb-2">
                                                        <div>
                                                            <a href="javascript:void(0)"
                                                                class="avatar avatar-sm rounded-circle cover-image"
                                                                data-bs-image-src="{{asset('build/assets/images/users/female/23.jpg')}}"
                                                                style="background: url({{asset('build/assets/images/users/female/23.jpg')}}) center center;">
                                                            </a>
                                                        </div>
                                                        <h6 class="mb-0 text-muted ms-2 text-13 me-sm-0 me-2">Jiggel
                                                            mossin</h6>
                                                    </div>
                                                    <a href="javascript:void(0);"
                                                        class="d-f-ai-c mx-0 mb-sm-0 mb-2 mx-sm-4 mx-0 text-13"><span
                                                            class="fe fe-calendar text-muted me-1 text-15"></span><span
                                                            class="mt-0 mt-0 text-muted">01 December 2021</span></a>
                                                    <a href="javascript:void(0);" class="me-0 d-f-ai-c mb-sm-0 mb-2 text-13"><span
                                                            class="fe fe-message-square text-muted me-1 text-15"></span><span
                                                            class="mt-0 mt-0 text-muted">11 Comments</span></a>
                                                </div>
                                                <div>
                                                    <h3 class="font-weight-normal text-dark-light mt-4 mb-4">Lorem
                                                        ipsum dolor sit amet consectetur adipisicing elit.</h3>
                                                </div>
                                            </div>
                                            <div class="position-relative p-1 bg-light br-7">
                                                <img src="{{asset('build/assets/images/photos/27.jpg')}}" alt="img"
                                                    class="cover-image br-7 w-100 h-350">
                                                <span class="badge bg-primary blog-label label5">nature</span>
                                            </div>
                                            <div class=" mb-2 mt-5 content">
                                                <p>I must explain to you how all this
                                                    mistaken idea of denouncing pleasure and praising pain was born
                                                    and I will give you a complete account of the system, and
                                                    expound the actual teachings of the great explorer of the truth,
                                                    the master-builder of human happiness. No one rejects, dislikes,
                                                    or avoids pleasure itself, because it is pleasure.</p>
                                                <p class="px-3 py-2 text-17 border br-7">
                                                    <span> <sup><i class="fa fa-quote-left me-1 text-dark-light text-13"
                                                                aria-hidden="true"></i></sup></span> <span
                                                        class="text-muted">Duo
                                                        Labore dolores at diam dolore. lorem
                                                        aliquyam Sadipscing et et. Est dolores kasd. ipsum magna
                                                        invidunt consetetur</span> <span class=" text-primary">dolor
                                                        voluptua
                                                        Dolore justo
                                                        eirmod justo sit tempor</span><span> <sup><i
                                                                class="fa fa-quote-right ms-1 text-13 text-dark-light"
                                                                aria-hidden="true"></i></sup> </span>
                                                </p>
                                                <p>To curtain chamber have my not, open
                                                    and prophet my i and wide in living. Core raven upstarting dream
                                                    sure was. Back little lining by in myself oh prophet be,.</p>
                                            </div>
                                            <div class="mt-2 pt-2 pb-2 br-7 footer-container-main blog-footer">
                                                <div class="footer border-top-0 p-0 icons-bg d-sm-flex">
                                                    <div class="social m-0">
                                                        <ul class="text-center">
                                                            <li>
                                                                <a class="social-icon" href="javascript:void(0)"><i
                                                                        class="fa fa-facebook"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="social-icon" href="javascript:void(0)"><i
                                                                        class="fa fa-twitter"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="social-icon" href="javascript:void(0)"><i
                                                                        class="fa fa-rss"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="social-icon" href="javascript:void(0)"><i
                                                                        class="fa fa-youtube"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="social-icon" href="javascript:void(0)"><i
                                                                        class="fa fa-linkedin"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="social-icon" href="javascript:void(0)"><i
                                                                        class="fa fa-google-plus"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <a href="javascript:void(0);" class="text-muted d-f-ai-c d-sm-flex d-block">More
                                                            from author <i class="fa fa-angle-right mx-2"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-5">
                                                <h3 class="card-title">Comments:</h3>
                                                <div class="media mb-4 overflow-visible">
                                                    <div class="me-3">
                                                        <a href="{{url('profile')}}"> <img
                                                                class="media-object rounded-circle thumb-sm" alt="64x64"
                                                                src="{{asset('build/assets/images/users/female/23.jpg')}}"> </a>
                                                    </div>
                                                    <div class="media-body overflow-visible">
                                                        <div class="border mb-5 p-4 br-7">
                                                            <div class="d-inline-flex">
                                                                <h5 class="mt-0">Gavin Murray</h5>
                                                                <span class="text-muted fs-12 mx-1">1 day ago</span>
                                                            </div>
                                                            <nav class="nav float-end">
                                                                <div class="dropdown">
                                                                    <a class="nav-link text-dark fs-16 p-0"
                                                                        href="javascript:;" data-bs-toggle="dropdown"
                                                                        role="button" aria-haspopup="true"
                                                                        aria-expanded="false"><i
                                                                            class="fe fe-more-vertical text-dark ms-4"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="fe fe-edit me-1"></i>
                                                                            Edit</a>
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="fe fe-flag me-1"></i> Report
                                                                            Abuse</a>
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="fe fe-trash-2 me-1"></i>
                                                                            Delete</a>
                                                                    </div>
                                                                </div>
                                                            </nav>
                                                            <p class="fs-13">Lorem ipsum dolor sit
                                                                amet, quis Neque porro quisquam est, nostrud
                                                                exercitation ullamco laboris commodo consequat.
                                                                There’s an old maxim that states, “No fun for the
                                                                writer, no fun for the reader.”No matter
                                                                what industry you’re working in, as a blogger, you
                                                                should live and die by this statement.</p>
                                                            <span class="reply" id="1">
                                                                <a href="javascript:;"><span
                                                                        class="btn btn-sm btn-info rounded-pill"><i
                                                                            class="fe fe-corner-up-left me-1"></i>Reply</span></a>
                                                            </span>
                                                        </div>
                                                        <div class="media mb-4 overflow-visible">
                                                            <div class="me-3">
                                                                <a href="{{url('profile')}}"> <img
                                                                        class="media-object rounded-circle thumb-sm"
                                                                        alt="64x64"
                                                                        src="{{asset('build/assets/images/users/female/19.jpg')}}">
                                                                </a>
                                                            </div>
                                                            <div class="media-body border p-4 overflow-visible br-7">
                                                                <div class="d-inline-flex">
                                                                    <h5 class="mt-0">Mozelle Belt</h5>
                                                                    <span class="text-muted fs-12 mx-2">2 min ago</span>
                                                                </div>
                                                                <nav class="nav float-end">
                                                                    <div class="dropdown">
                                                                        <a class="nav-link text-dark fs-16 p-0"
                                                                            href="javascript:;" data-bs-toggle="dropdown"
                                                                            role="button" aria-haspopup="true"
                                                                            aria-expanded="false"><i
                                                                                class="fe fe-more-vertical text-dark ms-4"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                    class="fe fe-edit me-1"></i>
                                                                                Edit</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                    class="fe fe-flag me-1"></i>
                                                                                Report Abuse</a>
                                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                    class="fe fe-trash-2 me-1"></i>
                                                                                Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </nav>
                                                                <p class="fs-13">Nostrud exercitation
                                                                    ullamco laboris commodo consequat. There’s an
                                                                    old maxim that states, “No fun for the writer,
                                                                    no fun for the reader.”No matter what industry
                                                                    you’re working in, as a blogger, you should
                                                                    live and die by this statement.</p>
                                                                <span class="reply" id="2">
                                                                    <a href="javascript:;"><span
                                                                            class="btn btn-sm btn-info rounded-pill py-2 px-3"><i
                                                                                class="fe fe-corner-up-left me-1"></i>Reply</span></a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="media mb-4 overflow-visible">
                                                    <div class="me-3">
                                                        <a href="{{url('profile')}}"> <img
                                                                class="media-object rounded-circle thumb-sm" alt="64x64"
                                                                src="{{asset('build/assets/images/users/male/28.jpg')}}">
                                                        </a>
                                                    </div>
                                                    <div class="media-body overflow-visible">
                                                        <div class="border mb-5 p-4 br-7">
                                                            <div class="d-inline-flex">
                                                                <h5 class="mt-0">Paul Smith</h5>
                                                                <span class="text-muted fs-12 ms-1">10 min ago</span>
                                                            </div>
                                                            <nav class="nav float-end">
                                                                <div class="dropdown">
                                                                    <a class="nav-link text-dark fs-16 p-0"
                                                                        href="javascript:;" data-bs-toggle="dropdown"
                                                                        role="button" aria-haspopup="true"
                                                                        aria-expanded="false"><i
                                                                            class="fe fe-more-vertical text-dark ms-4"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="fe fe-edit me-1"></i>
                                                                            Edit</a>
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="fe fe-flag me-1"></i> Report
                                                                            Abuse</a>
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="fe fe-trash-2 me-1"></i>
                                                                            Delete</a>
                                                                    </div>
                                                                </div>
                                                            </nav>
                                                            <p class="fs-13">Very nice ! On the other
                                                                hand, we denounce with righteous indignation and
                                                                dislike men who are so beguiled and demoralized by
                                                                the </p>
                                                            <span class="reply" id="3">
                                                                <a href="javascript:;"><span
                                                                        class="btn btn-sm btn-info rounded-pill py-2 px-3"><i
                                                                            class="fe fe-corner-up-left me-1"></i>Reply</span></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="media mb-4 overflow-visible">
                                                    <div class="me-3">
                                                        <a href="{{url('profile')}}"> <img
                                                                class="media-object rounded-circle thumb-sm" alt="64x64"
                                                                src="{{asset('build/assets/images/users/female/24.jpg')}}"> </a>
                                                    </div>
                                                    <div class="media-body overflow-visible">
                                                        <div class="border mb-5 p-4 br-7">
                                                            <div class="d-inline-flex">
                                                                <h5>Gavin Murray </h5>
                                                                <span class="text-muted fs-12 ms-1">5 min ago</span>
                                                        </div>
                                                            <nav class="nav float-end">
                                                                <div class="dropdown">
                                                                    <a class="nav-link text-dark fs-16 p-0"
                                                                        href="javascript:;" data-bs-toggle="dropdown"
                                                                        role="button" aria-haspopup="true"
                                                                        aria-expanded="false"><i
                                                                            class="fe fe-more-vertical text-dark ms-4"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="fe fe-edit me-1"></i>
                                                                            Edit</a>
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="fe fe-flag me-1"></i> Report
                                                                            Abuse</a>
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="fe fe-trash-2 me-1"></i>
                                                                            Delete</a>
                                                                    </div>
                                                                </div>
                                                            </nav>
                                                            <p class="fs-13">Lorem ipsum dolor sit
                                                                amet, quis Neque porro quisquam est, nostrud
                                                                exercitation ullamco laboris commodo consequat.
                                                                There’s an old maxim that states, “No fun for the
                                                                writer, no fun for the reader.”No matter
                                                                what industry you’re working in, as a blogger, you
                                                                should live and die by this statement.</p>
                                                            <span class="reply" id="4">
                                                                <a href="javascript:;"><span
                                                                        class="btn btn-sm btn-info rounded-pill py-2 px-3"><i
                                                                            class="fe fe-corner-up-left me-1"></i>Reply</span></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row-xs form-group-wrapper">
                                                    <h3 class="card-title">Comment here:</h3>
                                                    <div class="col-md-6">
                                                        <div class="form-floating my-1">
                                                            <input type="email" class="form-control" id="floatingInput1"
                                                                placeholder="Name">
                                                            <label for="floatingInput1">Name</label>
                                                        </div><!-- main-form-group -->
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating my-1">
                                                            <input type="email" class="form-control" id="floatingInput2"
                                                                placeholder="Mail">
                                                            <label for="floatingInput2">Mail</label>
                                                        </div><!-- main-form-group -->
                                                    </div>
                                                    <div class="col-md-12 mt-2">
                                                        <div class="form-floating">
                                                            <textarea class="form-control" placeholder="Your Comment..."
                                                                id="floatingTextarea2" style="height: 100px"></textarea>
                                                            <label for="floatingTextarea2">Message</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <button class="btn btn-primary float-end">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="card overflow-hidden br-7">
                                        <div class="card-header">
                                            <h3 class="card-title">About Author</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <a href="javascript:void(0);"><img class="card-img-top w-100 w-100"
                                                        src="{{asset('build/assets/images/photos/26.jpg')}}" alt=""></a>
                                                <div class="br-7 pt-3 text-justify">
                                                    <p class="m-0">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing
                                                        elit. Veniam nulla deleniti voluptas officia
                                                        accusamus magnam ullam inventore Lorem ipsum dolor,
                                                        sit amet consectetur dolorem quibusdam?.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden">
                                        <div class="card-header">
                                            <h3 class="card-title mb-1">Categories</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tags">
                                                <a href="javascript:void(0);" class="tag">Life style</a>
                                                <a href="javascript:void(0);" class="tag">Health</a>
                                                <a href="javascript:void(0);" class="tag">Tourism</a>
                                                <a href="javascript:void(0);" class="tag">Web
                                                    designing</a>
                                                <a href="javascript:void(0);" class="tag">Medical</a>
                                                <a href="javascript:void(0);" class="tag">Hotels</a>
                                                <a href="javascript:void(0);" class="tag">Real
                                                    estate</a>
                                                <a href="javascript:void(0);" class="tag">Business</a>
                                                <a href="javascript:void(0);" class="tag">Shopping</a>
                                                <a href="javascript:void(0);" class="tag">Marketing</a>
                                                <a href="javascript:void(0);" class="tag">Housing</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Popular Posts</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="item-list">
                                                <ul class="list-group mb-0">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center pb-4 pt-0 px-0 border-0">
                                                        <div class="d-flex">
                                                            <img src="{{asset('build/assets/images/photos/40.jpg')}}"
                                                            class="avatar br-7 avatar-xl me-3 align-items-start" alt="avatar-img">
                                                            <div>
                                                                <span class="d-block text-muted">Tourism</span>
                                                                <a href="{{url('profile')}}"
                                                                    class="text-dark text-16 font-weight-semibold">Explore
                                                                    tourism by visitinig places.</a>
                                                                <small class="d-block text-gray">2 day
                                                                    ago</small>
                                                            </div>
                                                    </div>
                                                        <div class="btn-list">
                                                            <button type="button" class="btn bg-success-transparent text-success  me-2"><i class="fe fe-edit fs-12"></i></button>
                                                            <button type="button" class="btn  bg-danger-transparent text-danger"><i class="fe fe-trash-2 fs-12"></i></button>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center pb-4 pt-0 px-0 border-0">
                                                        <div class="d-flex">
                                                            <img src="{{asset('build/assets/images/photos/37.jpg')}}"
                                                            class="avatar br-7 avatar-xl me-3 align-items-start" alt="avatar-img">
                                                            <div>
                                                                <span class="d-block text-muted">Beautician</span>
                                                                <a href="{{url('profile')}}"
                                                                    class="text-dark text-16 font-weight-semibold">Beautification
                                                                    courses are available.</a>
                                                                <small class="d-block text-gray">2 hrs
                                                                    ago</small>
                                                            </div>
                                                        </div>
                                                        <div class="btn-list">
                                                            <button type="button" class="btn bg-success-transparent text-success  me-2"><i class="fe fe-edit fs-12"></i></button>
                                                            <button type="button" class="btn  bg-danger-transparent text-danger"><i class="fe fe-trash-2 fs-12"></i></button>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center pb-4 pt-0 px-0 border-0">
                                                        <div class="d-flex">
                                                            <img src="{{asset('build/assets/images/pngs/2.png')}}"
                                                            class="avatar br-7 avatar-xl me-3 align-items-start" alt="avatar-img">
                                                            <div>
                                                                <span class="d-block text-muted">Music</span>
                                                                <a href="{{url('profile')}}"
                                                                    class="text-dark text-16 font-weight-semibold">Music is in the jsd a peaceful way.</a>
                                                                <small class="d-block text-gray">2 hrs
                                                                    ago</small>
                                                            </div>
                                                        </div>
                                                        <div class="btn-list">
                                                            <button type="button" class="btn bg-success-transparent text-success  me-2"><i class="fe fe-edit fs-12"></i></button>
                                                            <button type="button" class="btn  bg-danger-transparent text-danger"><i class="fe fe-trash-2 fs-12"></i></button>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center pb-0 pt-0 px-0 border-0">
                                                    <div class="d-flex">
                                                            <img src="{{asset('build/assets/images/photos/37.jpg')}}"
                                                            class="avatar br-7 avatar-xl me-3 align-items-start" alt="avatar-img">
                                                            <div>
                                                                <span class="d-block text-muted">Health</span>
                                                                <a href="{{url('profile')}}"
                                                                    class="text-dark text-16 font-weight-semibold">Health
                                                                    care and fitness awareness</a>
                                                                <small class="d-block text-gray">22 hrs
                                                                    ago</small>
                                                            </div>
                                                        </div>
                                                        <div class="btn-list">
                                                            <button type="button" class="btn bg-success-transparent text-success  me-2"><i class="fe fe-edit fs-12"></i></button>
                                                            <button type="button" class="btn  bg-danger-transparent text-danger"><i class="fe fe-trash-2 fs-12"></i></button>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden">
                                        <div class="card-header">
                                            <h3 class="card-title ">Gallery</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center demo-gallery">
                                                <div class="mt-2">
                                                    <ul id="lightgallery" class="list-unstyled row row-sm">
                                                        <li class="col-sm-6 col-lg-4"
                                                            data-responsive="{{asset('build/assets/images/media/13.jpg')}}"
                                                            data-src="{{asset('build/assets/images/media/13.jpg')}}"
                                                            data-sub-html="<h4>Gallery Image 1</h4>">
                                                            <a href="{{url('gallery')}}">
                                                                <img class="img-responsive br-7 w-100"
                                                                    src="{{asset('build/assets/images/media/13.jpg')}}"
                                                                    alt="Thumb-1">
                                                            </a>
                                                        </li>
                                                        <li class="col-sm-6 col-lg-4"
                                                            data-responsive="{{asset('build/assets/images/media/14.jpg')}}"
                                                            data-src="{{asset('build/assets/images/media/14.jpg')}}"
                                                            data-sub-html="<h4>Gallery Image 2</h4>">
                                                            <a href="{{url('gallery')}}">
                                                                <img class="img-responsive br-7 w-100"
                                                                    src="{{asset('build/assets/images/media/14.jpg')}}"
                                                                    alt="Thumb-1">
                                                            </a>
                                                        </li>
                                                        <li class="col-sm-6 col-lg-4"
                                                            data-responsive="{{asset('build/assets/images/media/16.jpg')}}"
                                                            data-src="{{asset('build/assets/images/media/16.jpg')}}"
                                                            data-sub-html="<h4>Gallery Image 3</h4>">
                                                            <a href="{{url('gallery')}}">
                                                                <img class="img-responsive br-7 w-100"
                                                                    src="{{asset('build/assets/images/media/16.jpg')}}"
                                                                    alt="Thumb-1">
                                                            </a>
                                                        </li>
                                                        <li class="col-sm-6 col-lg-4"
                                                            data-responsive="{{asset('build/assets/images/media/15.jpg')}}"
                                                            data-src="{{asset('build/assets/images/media/15.jpg')}}"
                                                            data-sub-html="<h4>Gallery Image 4</h4>">
                                                            <a href="{{url('gallery')}}">
                                                                <img class="img-responsive br-7 w-100"
                                                                    src="{{asset('build/assets/images/media/15.jpg')}}"
                                                                    alt="Thumb-1">
                                                            </a>
                                                        </li>
                                                        <li class="col-sm-6 col-lg-4"
                                                            data-responsive="{{asset('build/assets/images/media/18.jpg')}}"
                                                            data-src="{{asset('build/assets/images/media/18.jpg')}}"
                                                            data-sub-html="<h4>Gallery Image 5</h4>">
                                                            <a href="{{url('gallery')}}">
                                                                <img class="img-responsive br-7 w-100"
                                                                    src="{{asset('build/assets/images/media/18.jpg')}}"
                                                                    alt="Thumb-1">
                                                            </a>
                                                        </li>
                                                        <li class="col-sm-6 col-lg-4"
                                                            data-responsive="{{asset('build/assets/images/media/14.jpg')}}"
                                                            data-src="{{asset('build/assets/images/media/14.jpg')}}"
                                                            data-sub-html="<h4>Gallery Image 6</h4>">
                                                            <a href="{{url('gallery')}}">
                                                                <img class="img-responsive br-7 w-100"
                                                                    src="{{asset('build/assets/images/media/14.jpg')}}"
                                                                    alt="Thumb-1">
                                                            </a>
                                                        </li>
                                                        <li class="col-sm-6 col-lg-4"
                                                            data-responsive="{{asset('build/assets/images/media/16.jpg')}}"
                                                            data-src="{{asset('build/assets/images/media/16.jpg')}}"
                                                            data-sub-html="<h4>Gallery Image 7</h4>">
                                                            <a href="{{url('gallery')}}">
                                                                <img class="img-responsive br-7 w-100"
                                                                    src="{{asset('build/assets/images/media/16.jpg')}}"
                                                                    alt="Thumb-1">
                                                            </a>
                                                        </li>
                                                        <li class="col-sm-6 col-lg-4"
                                                            data-responsive="{{asset('build/assets/images/media/17.jpg')}}"
                                                            data-src="{{asset('build/assets/images/media/17.jpg')}}"
                                                            data-sub-html="<h4>Gallery Image 8</h4>">
                                                            <a href="{{url('gallery')}}">
                                                                <img class="img-responsive br-7 w-100"
                                                                    src="{{asset('build/assets/images/media/17.jpg')}}"
                                                                    alt="Thumb-1">
                                                            </a>
                                                        </li>
                                                        <li class="col-sm-6 col-lg-4"
                                                            data-responsive="{{asset('build/assets/images/media/19.jpg')}}"
                                                            data-src="{{asset('build/assets/images/media/19.jpg')}}"
                                                            data-sub-html="<h4>Gallery Image 9</h4>">
                                                            <a href="{{url('gallery')}}">
                                                                <img class="img-responsive br-7 w-100"
                                                                    src="{{asset('build/assets/images/media/19.jpg')}}"
                                                                    alt="Thumb-1">
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

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