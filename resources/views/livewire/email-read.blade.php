@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Mail Read</li>
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
                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="list-group list-group-transparent border-bottom-0 mb-0 mail-inbox">
                                            <div class="m-4 text-center">
                                                <a href="{{url('email-compose')}}"
                                                    class="btn btn-primary btn-lg d-grid">Compose</a>
                                            </div>
                                            <a href="{{url('email-inbox')}}"
                                                class="list-group-item d-flex align-items-center">
                                                <span class="icons"><i class="fe fe-mail"></i></span> Inbox <span
                                                    class="ms-auto badge bg-info bradius">14</span>
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="list-group-item d-flex align-items-center">
                                                <span class="icons"><i class="fe fe-download-cloud"></i></span> Drafts
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="list-group-item d-flex align-items-center">
                                                <span class="icons"><i class="fe fe-star"></i></span> Starred <span
                                                    class="ms-auto badge bg-success bradius">03</span>
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="list-group-item d-flex align-items-center">
                                                <span class="icons"><i class="fe fe-tag"></i></span> Tags
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="list-group-item d-flex align-items-center">
                                                <span class="icons"><i class="fe fe-send"></i></span> Sent Mail
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="list-group-item d-flex align-items-center">
                                                <span class="icons"><i class="fe fe-trash"></i></span> Trash
                                            </a>
                                        </div>
                                        <div class="card-body border-top p-0">
                                            <div class="list-group list-group-transparent mb-0 mail-inbox">
                                                <a href="javascript:void(0)"
                                                    class="list-group-item list-group-item-action d-flex align-items-center py-2">
                                                    <span class="w-3 h-3 brround bg-primary me-2"></span> Friends
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="list-group-item list-group-item-action d-flex align-items-center py-2">
                                                    <span class="w-3 h-3 brround bg-secondary me-2"></span> Family
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="list-group-item list-group-item-action d-flex align-items-center py-2">
                                                    <span class="w-3 h-3 brround bg-success me-2"></span> Social
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="list-group-item list-group-item-action d-flex align-items-center py-2">
                                                    <span class="w-3 h-3 brround bg-info me-2"></span> Office
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="list-group-item list-group-item-action d-flex align-items-center py-2">
                                                    <span class="w-3 h-3 brround bg-warning me-2"></span> Work
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="list-group-item list-group-item-action d-flex align-items-center py-2">
                                                    <span class="w-3 h-3 brround bg-danger me-2"></span> Settings
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-9">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Mail Read</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="email-media">
                                                <div class="mt-0 d-sm-flex">
                                                    <img class="me-2 rounded-circle avatar avatar-lg"
                                                        src="{{asset('build/assets/images/users/female/10.jpg')}}" alt="avatar">
                                                    <div class="media-body pt-0">
                                                        <div class="float-end d-none d-md-flex fs-15">
                                                            <small class="me-3 mt-3 text-muted-dark fw-semibold">Sep 13 , 2021 12:45
                                                                pm</small>
                                                            <a href="javascript:void(0)"
                                                                class="me-3 email-icon text-primary bg-primary-transparent"
                                                                data-bs-toggle="tooltip" title="Rated"><i
                                                                    class="fe fe-star"></i></a>
                                                            <a href="javascript:void(0)"
                                                                class="me-3 email-icon text-secondary bg-secondary-transparent"
                                                                data-bs-toggle="tooltip" title="Reply"><i
                                                                    class="fa fa-reply"></i></a>
                                                            <div class="me-3">
                                                                <a href="javascript:void(0)"
                                                                    class="text-danger email-icon bg-danger-transparent"
                                                                    data-bs-toggle="dropdown" role="button"
                                                                    aria-haspopup="true" aria-expanded="false"><i
                                                                        class="fe fe-more-horizontal"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                                            class="fe fe-share me-2"></i> Reply</a>
                                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                                            class="fe fe-alert-circle me-2"></i>Report
                                                                        Spam</a>
                                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                                            class="fe fe-trash me-2"></i>Delete</a>
                                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                                            class="fe fe-printer me-2"></i>Print</a>
                                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                                            class="fe fe-filter me-2"></i>Filter</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media-title text-dark fw-semibold mt-1">Cherry
                                                            Blossom <span class="text-muted-dark fw-semibold">(
                                                                cherryblosso@gmail.com )</span></div>
                                                        <small class="mb-0 fw-semibold text-dark">to Percy Kewshun ( percykewshun@gmail.com )
                                                        </small>
                                                        <small class="me-2 d-md-none">Sep 13 , 2021 12:45 pm</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="eamil-body mt-5">
                                                <h6 class="fw-semibold">Hi Sir/Madam</h6><br><br>
                                                <p class="fw-semibold text-dark">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                    accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                                                    illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                                    explicabo.
                                                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                                    fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
                                                    sequi nesciunt. </p>
                                                <p class="fw-semibold text-dark"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                                    dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia.</p>
                                                <p class="fw-semibold text-dark"> Nor again is there anyone who loves or pursues or desires to obtain pain
                                                    of itself, because it is pain, but because occasionally circumstances
                                                    occur in which toil and pain can procure him some great pleasure. To
                                                    take a trivial example, which of us ever undertakes laborious physical
                                                    exercise, except to obtain some advantage from it?</p>
                                                <br><br>
                                                <p class="mb-0">Thanking you Sir/Madam</p>
                                                <div class="border-top my-4"></div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <p class="fw-semibold mb-0">3 Attachments</p>
                                                    <a href="{{url('filemanager-details')}}" class="mx-1">View</a>
                                                </div>
                                                <div class="row attachments-doc">
                                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 mb-2 mb-sm-0">
                                                        <div class="border overflow-hidden p-0 br-7">
                                                            <a href="{{url('filemanager-details')}}"><img
                                                                    src="{{asset('build/assets/images/media/8.jpg')}}" class="card-img-top"
                                                                    alt="img"></a>
                                                            <div class="p-3 text-center">
                                                                <a href="{{url('filemanager-details')}}"
                                                                    class="fw-semibold fs-15 text-dark">Image.jpg</a>
                                                                <p class="text-muted.ms-2 mb-0 fs-11">(223 KB)</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 mb-2 mb-sm-0">
                                                        <div class="border overflow-hidden p-0 br-7">
                                                            <a href="{{url('filemanager-details')}}"><img
                                                                    src="{{asset('build/assets/images/media/11.jpg')}}" class="card-img-top"
                                                                    alt="img"></a>
                                                            <div class="p-3 text-center">
                                                                <a href="{{url('filemanager-details')}}"
                                                                    class="fw-semibold fs-15 text-dark">Image2.jpg</a>
                                                                <p class="text-muted.ms-2 mb-0 fs-11">(122 KB)</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 mb-2 mb-sm-0">
                                                        <div class="border overflow-hidden p-0 br-7">
                                                            <a href="{{url('filemanager-details')}}"><img
                                                                    src="{{asset('build/assets/images/media/6.jpg')}}" class="card-img-top"
                                                                    alt="img"></a>
                                                            <div class="p-3 text-center">
                                                                <a href="{{url('filemanager-details')}}"
                                                                    class="fw-semibold fs-15 text-dark">Image3.jpg</a>
                                                                <p class="text-muted.ms-2 mb-0 fs-11">(345 KB)</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a class="btn btn-primary my-1 mb-1" href="javascript:void(0)"><i
                                                    class="fa fa-reply"></i> Reply</a>
                                            <a class="btn btn-info my-1 mb-1" href="javascript:void(0)"><i
                                                    class="fa fa-share"></i> Forward</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--END ROW -->

@endsection

@section('scripts')

@endsection