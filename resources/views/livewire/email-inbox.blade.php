@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Mail Inbox</li>
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
                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="list-group list-group-transparent border-bottom-0 mb-0 mail-inbox">
                                            <div class="m-4 text-center">
                                                <a href="{{url('email-compose')}}"
                                                    class="btn btn-primary btn-lg d-grid">Compose</a>
                                            </div>
                                            <a href="{{url('email-compose')}}"
                                                class="list-group-item d-flex align-items-center">
                                                <span class="icons"><i class="fa fa-inbox"></i></span> Inbox <span
                                                    class="ms-auto badge bg-primary bradius">4</span>
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="list-group-item d-flex align-items-center">
                                                <span class="icons"><i class="fa fa-star-o"></i></span> Stared
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="list-group-item d-flex align-items-center">
                                                <span class="icons"><i class="fa fa-rocket"></i></span>Sent
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="list-group-item d-flex align-items-center">
                                                <span class="icons"><i class="fa fa-trash-o"></i></span> Trash
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="list-group-item d-flex align-items-center">Important
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="list-group-item d-flex align-items-center">
                                                <span class="icons"><i class="fa fa-cog"></i></span> Settings<span class=" ms-auto brradius badge bg-danger">6</span>
                                            </a>
                                        </div>
                                        <nav class="p-0">
                                            <h4 class="pt-4 ps-4 fw-semibold">Labels</h4>
                                            <ul class="label-inbox">
                                                <li> <a href="javascript:void(0);"> <i class=" fa fa-stop text-primary"></i> Work </a> </li>
                                                <li> <a href="javascript:void(0);"> <i class=" fa fa-stop text-secondary"></i> Design </a> </li>
                                                <li> <a href="javascript:void(0);"> <i class=" fa fa-stop text-info "></i> Family </a></li>
                                                <li> <a href="javascript:void(0);"> <i class=" fa fa-stop text-warning "></i> Friends </a></li>
                                                <li class="mb-3"> <a href="javascript:void(0);"> <i class=" fa fa-stop text-success "></i> Office
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Inbox</h3>
                                            <div class="mailsearch">
                                                <input class="form-control" type="search" placeholder="Search"
                                                    aria-label="Search">
                                                <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="inbox p-0">
                                                <div class="p-3">
                                                    <div class="toolbar d-none d-lg-block">
                                                        <div class="btn-group ">
                                                            <button type="button" class="btn btn-light">
                                                                <span class="fa fa-envelope"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-light">
                                                                <span class="fa fa-star"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-light">
                                                                <span class="fa fa-star-o"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-light">
                                                                <span class="fa fa-bookmark-o"></span>
                                                            </button>
                                                        </div>
                                                        <div class="btn-group ">
                                                            <button type="button" class="btn btn-light">
                                                                <span class="fa fa-mail-reply"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-light">
                                                                <span class="fa fa-mail-reply-all"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-light">
                                                                <span class="fa fa-mail-forward"></span>
                                                            </button>
                                                        </div>
                                                        <button type="button" class=" btn btn-light">
                                                            <span class="fa fa-trash-o"></span>
                                                        </button>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-light dropdown-toggle"
                                                                data-bs-toggle="dropdown">
                                                                <span class="fa fa-tags"></span>
                                                                <span class="caret"></span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0);">add label <span
                                                                        class="badge bg-danger"> Home</span></a>
                                                                <a class="dropdown-item" href="javascript:void(0);">add label <span
                                                                        class="badge bg-info">
                                                                        Job</span></a>
                                                                <a class="dropdown-item" href="javascript:void(0);">add label <span
                                                                        class="badge bg-success"> Clients</span></a>
                                                                <a class="dropdown-item" href="javascript:void(0);">add label <span
                                                                        class="badge bg-warning"> News</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="btn-group float-end">
                                                            <button type="button" class="btn btn-sm btn-light">
                                                                <span class="fa fa-chevron-left"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-light">
                                                                <span class="fa fa-chevron-right"></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
            
                                                <ul class="mail_list list-group list-unstyled">
                                                    <li class="list-group-item">
                                                        <div class="media">
                                                            <div class="pull-left">
                                                                <div class="controls">
                                                                    <div class="custom-checkbox custom-control">
                                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                                            class="custom-control-input" id="checkbox-1">
                                                                        <label for="checkbox-1"
                                                                            class="custom-control-label"></label>
                                                                    </div>
                                                                    <a href="javascript:void(0);"
                                                                        class="favourite text-muted hidden-sm-down"
                                                                        data-bs-toggle="active"><i class="fa fa-star mt-1"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="media-heading">
                                                                    <a href="javascript:void(0);" class="me-2">Velit a labore</a>
                                                                    <small class="float-end text-muted-dark fw-semibold mt-1"><time class="hidden-sm-down"
                                                                            datetime="2017">12:35 AM</time><i
                                                                            class="fa fa-paperclip ms-2"></i> </small>
                                                                </div>
                                                                <p class="msg">Lorem Ipsum is simply dumm dummy text of the printing
                                                                    and
                                                                    typesetting industry. </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item unread">
                                                        <div class="media">
                                                            <div class="pull-left">
                                                                <div class="controls">
                                                                    <div class="custom-checkbox custom-control">
                                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                                            class="custom-control-input" id="checkbox-2">
                                                                        <label for="checkbox-2"
                                                                            class="custom-control-label"></label>
                                                                    </div>
                                                                    <a href="javascript:void(0);"
                                                                        class="favourite col-amber hidden-sm-down"
                                                                        data-bs-toggle="active"><i
                                                                            class="fa fa-star text-warning mt-1"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="media-heading">
                                                                    <a href="javascript:void(0);" class="me-2">Simply dummy text</a>
                                                                    <small class="float-end text-muted-dark fw-semibold mt-1"><time class="hidden-sm-down"
                                                                            datetime="2017">12:35 AM</time><i
                                                                            class="fa fa-paperclip ms-2"></i> </small>
                                                                </div>
                                                                <p class="msg">Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="media">
                                                            <div class="pull-left">
                                                                <div class="controls">
                                                                    <div class="custom-checkbox custom-control">
                                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                                            class="custom-control-input" id="checkbox-3">
                                                                        <label for="checkbox-3"
                                                                            class="custom-control-label"></label>
                                                                    </div>
                                                                    <a href="javascript:void(0);"
                                                                        class="favourite text-muted hidden-sm-down"
                                                                        data-bs-toggle="active"><i class="fa fa-star mt-1"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="media-heading">
                                                                    <a href="javascript:void(0);" class="me-2">Velit a labore</a>
                                                                    <span class="badge bg-danger text-white">Google</span>
                                                                    <small class="float-end text-muted-dark fw-semibold mt-1"><time class="hidden-sm-down"
                                                                            datetime="2017">12:35 AM</time><i
                                                                            class="fa fa-paperclip ms-2"></i> </small>
                                                                </div>
                                                                <p class="msg"> If you are going to use a passage of Lorem Ipsum,
                                                                    you
                                                                    need to be sure</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item unread">
                                                        <div class="media">
                                                            <div class="pull-left">
                                                                <div class="controls">
                                                                    <div class="custom-checkbox custom-control">
                                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                                            class="custom-control-input" id="checkbox-4">
                                                                        <label for="checkbox-4"
                                                                            class="custom-control-label"></label>
                                                                    </div>
                                                                    <a href="javascript:void(0);"
                                                                        class="favourite text-muted hidden-sm-down"
                                                                        data-bs-toggle="active"><i class="fa fa-star mt-1"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="media-heading">
                                                                    <a href="javascript:void(0);" class="me-2">Variations of passages</a>
                                                                    <span class="badge bg-primary text-white">Themeforest</span>
                                                                    <small class="float-end text-muted-dark fw-semibold mt-1"><time class="hidden-sm-down"
                                                                            datetime="2017">12:35 AM</time><i
                                                                            class="fa fa-paperclip ms-2"></i> </small>
                                                                </div>
                                                                <p class="msg">There are many variations of passages of Lorem Ipsum
                                                                    available, but the majority </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="media">
                                                            <div class="pull-left">
                                                                <div class="controls">
                                                                    <div class="custom-checkbox custom-control">
                                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                                            class="custom-control-input" id="checkbox-5">
                                                                        <label for="checkbox-5"
                                                                            class="custom-control-label"></label>
                                                                    </div>
                                                                    <a href="javascript:void(0);"
                                                                        class="favourite text-muted hidden-sm-down"
                                                                        data-bs-toggle="active"><i class="fa fa-star mt-1"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="media-heading">
                                                                    <a href="javascript:void(0);" class="me-2">Generators on the Internet</a>
                                                                    <span class="badge bg-danger text-white">Work</span>
                                                                    <small class="float-end text-muted-dark fw-semibold mt-1"><time class="hidden-sm-down"
                                                                            datetime="2017">12:35 AM</time><i
                                                                            class="fa fa-paperclip ms-2"></i> </small>
                                                                </div>
                                                                <p class="msg">LAll the Lorem Ipsum generators on the Internet tend
                                                                    to
                                                                    repeat predefined chunks as necessary</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="media">
                                                            <div class="pull-left">
                                                                <div class="controls">
                                                                    <div class="custom-checkbox custom-control">
                                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                                            class="custom-control-input" id="checkbox-6">
                                                                        <label for="checkbox-6"
                                                                            class="custom-control-label"></label>
                                                                    </div>
                                                                    <a href="javascript:void(0);"
                                                                        class="favourite col-amber hidden-sm-down"
                                                                        data-bs-toggle="active"><i
                                                                            class="fa fa-star text-warning mt-1"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="media-heading">
                                                                    <a href="javascript:void(0);" class="me-2">Contrary to popular</a>
                                                                    <span class="badge bg-info text-white">Themeforest</span>
                                                                    <small class="float-end text-muted-dark fw-semibold mt-1"><time class="hidden-sm-down"
                                                                            datetime="2017">12:35 AM</time><i
                                                                            class="fa fa-paperclip ms-2"></i> </small>
                                                                </div>
                                                                <p class="msg">Contrary to popular belief, Lorem Ipsum is not simply
                                                                    random text. It has roots in a piece of classical</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="media">
                                                            <div class="pull-left">
                                                                <div class="controls">
                                                                    <div class="custom-checkbox custom-control">
                                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                                            class="custom-control-input" id="checkbox-7">
                                                                        <label for="checkbox-7"
                                                                            class="custom-control-label"></label>
                                                                    </div>
                                                                    <a href="javascript:void(0);"
                                                                        class="favourite col-amber hidden-sm-down"
                                                                        data-bs-toggle="active"><i
                                                                            class="fa fa-star text-warning mt-1"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="media-heading">
                                                                    <a href="javascript:void(0);" class="me-2">Velit a labore</a>
                                                                    <span class="badge bg-success text-white">Work</span>
                                                                    <small class="float-end text-muted-dark fw-semibold mt-1"><time class="hidden-sm-down"
                                                                            datetime="2017">12:35 AM</time><i
                                                                            class="fa fa-paperclip ms-2"></i> </small>
                                                                </div>
                                                                <p class="msg">Lorem Ipsum is simply dumm dummy text of the printing
                                                                    and
                                                                    typesetting industry. </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="media">
                                                            <div class="pull-left">
                                                                <div class="controls">
                                                                    <div class="custom-checkbox custom-control">
                                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                                            class="custom-control-input" id="checkbox-8">
                                                                        <label for="checkbox-8"
                                                                            class="custom-control-label"></label>
                                                                    </div>
                                                                    <a href="javascript:void(0);"
                                                                        class="favourite col-amber hidden-sm-down"
                                                                        data-bs-toggle="active"><i
                                                                            class="fa fa-star text-warning mt-1"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="media-heading">
                                                                    <a href="javascript:void(0);" class="me-2">Variations of passages</a>
                                                                    <span class="badge bg-purple text-white">Themeforest</span>
                                                                    <small class="float-end text-muted-dark fw-semibold mt-1"><time class="hidden-sm-down"
                                                                            datetime="2017">12:35 AM</time><i
                                                                            class="fa fa-paperclip ms-2"></i> </small>
                                                                </div>
                                                                <p class="msg">There are many variations of passages of Lorem Ipsum
                                                                    available, but the majority </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="media">
                                                            <div class="pull-left">
                                                                <div class="controls">
                                                                    <div class="custom-checkbox custom-control">
                                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                                            class="custom-control-input" id="checkbox-9">
                                                                        <label for="checkbox-9"
                                                                            class="custom-control-label"></label>
                                                                    </div>
                                                                    <a href="javascript:void(0);"
                                                                        class="favourite text-muted hidden-sm-down"
                                                                        data-bs-toggle="active"><i class="fa fa-star mt-1"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="media-heading">
                                                                    <a href="javascript:void(0);" class="me-2">Generators on the Internet</a>
                                                                    <span class="badge bg-pink text-white">Work</span>
                                                                    <small class="float-end text-muted-dark fw-semibold mt-1"><time class="hidden-sm-down"
                                                                            datetime="2017">12:35 AM</time><i
                                                                            class="fa fa-paperclip ms-2"></i> </small>
                                                                </div>
                                                                <p class="msg">LAll the Lorem Ipsum generators on the Internet tend
                                                                    to
                                                                    repeat predefined chunks as necessary</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="media">
                                                            <div class="pull-left">
                                                                <div class="controls">
                                                                    <div class="custom-checkbox custom-control">
                                                                        <input type="checkbox" data-checkboxes="mygroup"
                                                                            class="custom-control-input" id="checkbox-10">
                                                                        <label for="checkbox-10"
                                                                            class="custom-control-label"></label>
                                                                    </div>
                                                                    <a href="javascript:void(0);"
                                                                        class="favourite text-muted hidden-sm-down"
                                                                        data-bs-toggle="active"><i class="fa fa-star mt-1"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="media-heading">
                                                                    <a href="javascript:void(0);" class="me-2">Velit a labore</a>
                                                                    <span class="badge bg-info text-white">Family</span>
                                                                    <small class="float-end text-muted-dark fw-semibold mt-1"><time class="hidden-sm-down"
                                                                            datetime="2017">12:35 AM</time><i
                                                                            class="fa fa-paperclip ms-2"></i> </small>
                                                                </div>
                                                                <p class="msg">Lorem Ipsum is simply dumm dummy text of the printing
                                                                    and
                                                                    typesetting industry. </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->


@endsection

@section('scripts')

@endsection