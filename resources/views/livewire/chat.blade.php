@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chat</li>
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
                                <div class="col-md-12 col-lg-5 col-xl-4">
                                    <div class="card overflow-hidden">
                                        <div class="main-chat-list">
                                            <div class="card-header p-3 border-bottom-0">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search here...">
                                                    <button type="button" class="btn btn-primary">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="chat">
                                                <ul class="contacts mb-0">
                                                    <li class="active">
                                                        <div class="d-flex bd-highlight">
                                                            <div class="img_cont me-2">
                                                                <img src="{{asset('build/assets/images/users/male/32.jpg')}}"
                                                                    class="rounded-circle avatar avatar-lg" alt="img">
                                                                <span class="online_icon"></span>
                                                            </div>
                                                            <div class="user_info">
                                                                <h6 class="mt-2 mb-0 fw-semibold">Maryam Naz</h6>
                                                                <small class="text-muted">Maryam is online</small>
                                                            </div>
                                                            <div class="ms-auto my-auto">
                                                                <small>01-02-2019</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex bd-highlight">
                                                            <div class="img_cont me-2">
                                                                <img src="{{asset('build/assets/images/users/female/19.jpg')}}"
                                                                    class="rounded-circle avatar avatar-lg" alt="img">

                                                            </div>
                                                            <div class="user_info">
                                                                <h6 class="mt-2 mb-0 fw-semibold">Sahar Darya</h6>
                                                                <small class="text-muted">Sahar left 7 mins ago</small>
                                                            </div>
                                                            <div class="ms-auto my-auto">
                                                                <small>01-02-2019</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex bd-highlight">
                                                            <div class="img_cont me-2">
                                                                <img src="{{asset('build/assets/images/users/female/25.jpg')}}"
                                                                    class="rounded-circle avatar avatar-lg" alt="img">
                                                                <span class="online_icon"></span>
                                                            </div>
                                                            <div class="user_info">
                                                                <h6 class="mt-2 mb-0 fw-semibold">Maryam Naz</h6>
                                                                <small class="text-muted">Maryam is online</small>
                                                            </div>
                                                            <div class="ms-auto my-auto">
                                                                <small>01-02-2019</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex bd-highlight">
                                                            <div class="img_cont me-2">
                                                                <img src="{{asset('build/assets/images/users/female/26.jpg')}}"
                                                                    class="rounded-circle avatar avatar-lg" alt="img">
                                                                    <span class="online_icon"></span>

                                                            </div>
                                                            <div class="user_info">
                                                                <h6 class="mt-2 mb-0 fw-semibold">Yolduz Rafi</h6>
                                                                <small class="text-muted">Yolduz is online</small>
                                                            </div>
                                                            <div class="ms-auto my-auto">
                                                                <small>02-02-2019</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex bd-highlight">
                                                            <div class="img_cont me-2">
                                                                <img src="{{asset('build/assets/images/users/male/22.jpg')}}"
                                                                    class="rounded-circle avatar avatar-lg" alt="img">
                                                            </div>
                                                            <div class="user_info">
                                                                <h6 class="mt-2 mb-0 fw-semibold">Nargis Hawa</h6>
                                                                <small class="text-muted">Nargis left 30 mins ago</small>
                                                            </div>
                                                            <div class="ms-auto my-auto">
                                                                <small>02-02-2019</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex bd-highlight">
                                                            <div class="img_cont me-2">
                                                                <img src="{{asset('build/assets/images/users/male/17.jpg')}}"
                                                                    class="rounded-circle avatar avatar-lg" alt="img">
                                                            </div>
                                                            <div class="user_info">
                                                                <h6 class="mt-2 mb-0 fw-semibold">Khadija Mehr</h6>
                                                                <small class="text-muted">Khadija left 50 mins ago</small>
                                                            </div>
                                                            <div class="ms-auto my-auto">
                                                                <small>03-02-2019</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex bd-highlight">
                                                            <div class="img_cont me-2">
                                                                <img src="{{asset('build/assets/images/users/male/18.jpg')}}"
                                                                    class="rounded-circle avatar avatar-lg" alt="img">
                                                                <span class="online_icon"></span>
                                                            </div>
                                                            <div class="user_info">
                                                                <h6 class="mt-2 mb-0 fw-semibold">Daneil Wisely</h6>
                                                                <small class="text-muted">Daneil is online</small>
                                                            </div>
                                                            <div class="ms-auto my-auto">
                                                                <small>03-02-2019</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex bd-highlight">
                                                            <div class="img_cont me-2">
                                                                <img src="{{asset('build/assets/images/users/male/29.jpg')}}"
                                                                    class="rounded-circle avatar avatar-lg" alt="img">
                                                                <span class="online_icon"></span>
                                                            </div>
                                                            <div class="user_info">
                                                                <h6 class="mt-2 mb-0 fw-semibold">Rohn Srap</h6>
                                                                <small class="text-muted">Rohn is online</small>
                                                            </div>
                                                            <div class="ms-auto my-auto">
                                                                <small>03-02-2019</small>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="d-flex bd-highlight">
                                                            <div class="img_cont me-2">
                                                                <img src="{{asset('build/assets/images/users/male/30.jpg')}}"
                                                                    class="rounded-circle avatar avatar-lg" alt="img">
                                                            </div>
                                                            <div class="user_info">
                                                                <h6 class="mt-2 mb-0 fw-semibold">Khadija Mehr</h6>
                                                                <small class="text-muted">Khadija left 50 mins ago</small>
                                                            </div>
                                                            <div class="ms-auto my-auto">
                                                                <small>03-02-2019</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex bd-highlight">
                                                            <div class="img_cont me-2">
                                                                <img src="{{asset('build/assets/images/users/male/31.jpg')}}"
                                                                    class="rounded-circle avatar avatar-lg" alt="img">
                                                                <span class="online_icon"></span>
                                                            </div>
                                                            <div class="user_info">
                                                                <h6 class="mt-2 mb-0 fw-semibold">Meck Wartz</h6>
                                                                <small class="text-muted">Meck is online</small>
                                                            </div>
                                                            <div class="ms-auto my-auto">
                                                                <small>03-02-2019</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex bd-highlight">
                                                            <div class="img_cont me-2">
                                                                <img src="{{asset('build/assets/images/users/male/24.jpg')}}"
                                                                    class="rounded-circle avatar avatar-lg" alt="img">
                                                            </div>
                                                            <div class="user_info">
                                                                <h6 class="mt-2 mb-0 fw-semibold">Rohn Srap</h6>
                                                                <small class="text-muted">Rohn Srap left 50 mins ago</small>
                                                            </div>
                                                            <div class="ms-auto my-auto">
                                                                <small>03-02-2019</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex bd-highlight">
                                                            <div class="img_cont me-2">
                                                                <img src="{{asset('build/assets/images/users/male/21.jpg')}}"
                                                                    class="rounded-circle avatar avatar-lg" alt="img">
                                                                <span class="online_icon"></span>
                                                            </div>
                                                            <div class="user_info">
                                                                <h6 class="mt-2 mb-0 fw-semibold">Daneil Wisely</h6>
                                                                <small class="text-muted">Daneil Wisely left 50 mins ago</small>
                                                            </div>
                                                            <div class="ms-auto my-auto">
                                                                <small>03-02-2019</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex bd-highlight">
                                                            <div class="img_cont me-2">
                                                                <img src="{{asset('build/assets/images/users/male/4.jpg')}}"
                                                                    class="rounded-circle avatar avatar-lg" alt="img">
                                                                <span class="online_icon"></span>
                                                            </div>
                                                            <div class="user_info">
                                                                <h6 class="mt-2 mb-0 fw-semibold">Rohn Srap</h6>
                                                                <small class="text-muted">Rohn Srap left 50 mins ago</small>
                                                            </div>
                                                            <div class="ms-auto my-auto">
                                                                <small>03-02-2019</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-0">
                                                        <div class="d-flex bd-highlight">
                                                            <div class="img_cont me-2">
                                                                <img src="{{asset('build/assets/images/users/female/27.jpg')}}"
                                                                    class="rounded-circle avatar avatar-lg" alt="img">

                                                            </div>
                                                            <div class="user_info">
                                                                <h6 class="mt-2 mb-0 fw-semibold">Khadija Mehr</h6>
                                                                <small class="text-muted">Khadija left 50 mins ago</small>
                                                            </div>
                                                            <div class="ms-auto my-auto">
                                                                <small>03-02-2019</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-7 col-xl-8  chat">
                                    <div class="card overflow-hidden">
                                        <!-- action-header -->
                                        <div class="action-header d-flex justify-content-between">
                                            <div class="hidden-xs d-flex align-items-center ms-2">
                                                <div class="img_cont me-3">
                                                    <img src="{{asset('build/assets/images/users/female/23.jpg')}}"
                                                        class="rounded-circle avatar avatar-lg" alt="img">
                                                </div>
                                                <div class="mt-1">
                                                    <h4 class="text-white mb-0 fw-semibold">Jenna Side</h4>
                                                    <span class="dot-label bg-success"></span><span
                                                        class="me-3 text-white">online</span>
                                                </div>
                                            </div>
                                            <ul class="ah-actions actions">
                                                <li class="call-icon">
                                                    <a href="javascript:void(0);" class="d-done d-md-flex">
                                                        <i class="fe fe-phone"></i>
                                                    </a>
                                                </li>
                                                <li class="video-icon">
                                                    <a href="javascript:void(0);" class="d-done d-md-flex">
                                                        <i class="fe fe-video"></i>
                                                    </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><i class="fe fe-user text-primary"></i> View profile</li>
                                                        <li><i class="fe fe-users text-info"></i> Add friends</li>
                                                        <li><i class="fe fe-plus text-success"></i> Add to group</li>
                                                        <li><i class="fe fe-slash text-danger"></i> Block</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- action-header end -->

                                        <!-- msg_card_body -->
                                        <div class="main-chat-msgs">
                                            <div class="card-body">
                                                <div class="chat-box-single-line">
                                                    <abbr class="timestamp">February 1st, 2019</abbr>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <div class="img_cont_msg">
                                                        <img src="{{asset('build/assets/images/users/male/28.jpg')}}"
                                                            class="rounded-circle avatar avatar-md" alt="img">
                                                    </div>
                                                    <div class="msg_cotainer br-7">
                                                        Hi, how are you Jenna Side?
                                                        <span class="msg_time">8:40 AM, Today</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end ">
                                                    <div class="msg_cotainer_send br-7">
                                                        Hi Connor Paige i am good tnx how about you?
                                                        <span class="msg_time_send">8:55 AM, Today</span>
                                                    </div>
                                                    <div class="img_cont_msg">
                                                        <img src="{{asset('build/assets/images/users/female/23.jpg')}}"
                                                            class="rounded-circle avatar avatar-md" alt="img">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-start ">
                                                    <div class="img_cont_msg">
                                                        <img src="{{asset('build/assets/images/users/male/28.jpg')}}"
                                                            class="rounded-circle avatar avatar-md" alt="img">
                                                    </div>
                                                    <div class="msg_cotainer br-7">
                                                        I am good too, thank you for your chat template
                                                        <span class="msg_time">9:00 AM, Today</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end ">
                                                    <div class="msg_cotainer_send br-7">
                                                        You welcome Connor Paige
                                                        <span class="msg_time_send">9:05 AM, Today</span>
                                                    </div>
                                                    <div class="img_cont_msg">
                                                        <img src="{{asset('build/assets/images/users/female/23.jpg')}}"
                                                            class="rounded-circle avatar avatar-md" alt="img">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-start ">
                                                    <div class="img_cont_msg">
                                                        <img src="{{asset('build/assets/images/users/male/28.jpg')}}"
                                                            class="rounded-circle avatar avatar-md" alt="img">
                                                    </div>
                                                    <div class="msg_cotainer br-7">
                                                        Yo, Can you update Views?
                                                        <span class="msg_time">9:07 AM, Today</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end mb-4">
                                                    <div class="msg_cotainer_send br-7">
                                                        But I must explain to you how all this mistaken born and I will give
                                                        <span class="msg_time_send">9:10 AM, Today</span>
                                                    </div>
                                                    <div class="img_cont_msg">
                                                        <img src="{{asset('build/assets/images/users/female/23.jpg')}}"
                                                            class="rounded-circle avatar avatar-md" alt="img">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-start ">
                                                    <div class="img_cont_msg">
                                                        <img src="{{asset('build/assets/images/users/male/28.jpg')}}"
                                                            class="rounded-circle avatar avatar-md" alt="img">
                                                    </div>
                                                    <div class="msg_cotainer br-7">
                                                        Yo, Can you update Views?
                                                        <span class="msg_time">9:07 AM, Today</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end mb-4">
                                                    <div class="msg_cotainer_send br-7">
                                                        But I must explain to you how all this mistaken born and I will give
                                                        <span class="msg_time_send">9:10 AM, Today</span>
                                                    </div>
                                                    <div class="img_cont_msg">
                                                        <img src="{{asset('build/assets/images/users/female/23.jpg')}}"
                                                            class="rounded-circle avatar avatar-md" alt="img">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-start ">
                                                    <div class="img_cont_msg">
                                                        <img src="{{asset('build/assets/images/users/male/28.jpg')}}"
                                                            class="rounded-circle avatar avatar-md" alt="img">
                                                    </div>
                                                    <div class="msg_cotainer br-7">
                                                        Yo, Can you update Views?
                                                        <span class="msg_time">9:07 AM, Today</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end mb-4">
                                                    <div class="msg_cotainer_send br-7">
                                                        But I must explain to you how all this mistaken born and I will give
                                                        <span class="msg_time_send">9:10 AM, Today</span>
                                                    </div>
                                                    <div class="img_cont_msg">
                                                        <img src="{{asset('build/assets/images/users/female/23.jpg')}}"
                                                            class="rounded-circle avatar avatar-md" alt="img">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <div class="img_cont_msg">
                                                        <img src="{{asset('build/assets/images/users/male/28.jpg')}}"
                                                            class="rounded-circle avatar avatar-md" alt="img">
                                                    </div>
                                                    <div class="msg_cotainer br-7">
                                                        Okay Bye, text you later..
                                                        <span class="msg_time">9:12 AM, Today</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- msg_card_body end -->
                                        <!-- card-footer -->
                                        <div class="card-footer">
                                            <div class="msb-reply d-flex">
                                                <div class="input-group">
                                                    <input type="text" class="form-control  bg-white"
                                                        placeholder="Typing....">
                                                    <button type="button" class="btn btn-primary ">
                                                        <i class="fa fa-send" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div><!-- card-footer end -->
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- CHAT JS -->
        @vite('resources/assets/js/chat.js')


@endsection