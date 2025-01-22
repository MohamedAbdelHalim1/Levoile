@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Mail Compose</li>
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
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="list-group list-group-transparent mb-0 mail-inbox">
                                            <div class="m-4 text-center">
                                                <a href="javascript:void(0);" class="btn btn-primary br-7 btn-lg btn-block">Compose</a>
                                            </div>
                                            <div>
                                                <a href="{{url('email-inbox')}}"
                                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                                    <span class=" fw-semibold me-3"><i class="fe fe-inbox"></i></span>Inbox <span
                                                        class="ms-auto badge bg-success">14</span>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                                    <span class=" fw-semibold me-3"><i class="fe fe-send"></i></span>Sent Mail
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                                    <span class=" fw-semibold me-3"><i
                                                            class="fe fe-alert-circle"></i></span>Important
                                                    <span class="ms-auto badge bg-danger">3</span>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                                    <span class=" fw-semibold me-3"><i class="fe fe-star"></i></span>Starred
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                                    <span class=" fw-semibold me-3"><i class="fe fe-file"></i></span>Drafts
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                                    <span class=" fw-semibold me-3"><i class="fe fe-tag"></i></span>Tags
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                                    <span class=" fw-semibold me-3"><i class="fe fe-trash-2"></i></span>Trash
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden">
                                        <div class="card-header d-flex justify-content-between align-items-center border-bottom-0">
                                            <h3 class="card-title">Chats</h3>
                                            <p class="mb-0 d-flex justify-content-center"><span class="legend bg-secondary"></span> Online</p>
                                        </div>
                                        <div class="card-body p-0">
                                            <ul class="mail-chats p-2 m-0">
                                                <li class="chat-persons">
                                                    <a href="{{url('chat')}}">
                                                        <span class="pro-pic"><img src="{{asset('build/assets/images/users/male/32.jpg')}}"
                                                        alt=""></span>
                                                    </a>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="user mt-1">
                                                            <p class="u-name">David</p>
                                                            <p class="u-designation">Python Developer</p>
                                                        </div>
                                                        <P class="mb-0 fs-12 fw-semibold text-primary">04:32 PM</P>
                                                    </div>
                                                </li>
                                                <!-- list person -->
                                                <li class="chat-persons">
                                                    <a href="{{url('chat')}}">
                                                        <span class="pro-pic"><img src="{{asset('build/assets/images/users/female/23.jpg')}}"
                                                        alt=""></span>
                                                    </a>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="user mt-1">
                                                            <p class="u-name">Stella Johnson</p>
                                                            <p class="u-designation">SEO Expert</p>
                                                        </div>
                                                        <P class="mb-0 fs-12 fw-semibold text-primary">02:12 AM</P>
                                                    </div>
                                                </li>
                                                <!-- list person -->
                                                <li class="chat-persons">
                                                    <a href="{{url('chat')}}">
                                                        <span class="pro-pic"><img src="{{asset('build/assets/images/users/male/28.jpg')}}"
                                                        alt=""></span>
                                                    </a>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="user mt-1">
                                                            <p class="u-name">Ronaldz</p>
                                                            <p class="u-designation">Business Development</p>
                                                        </div>
                                                        <P class="mb-0 fs-12 fw-semibold text-primary">12:24 AM</P>
                                                    </div>
                                                </li>
                                                <!-- list person -->
                                                <li class="chat-persons">
                                                    <a href="{{url('chat')}}">
                                                        <span class="pro-pic"><img src="{{asset('build/assets/images/users/female/25.jpg')}}"
                                                        alt=""></span>
                                                    </a>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="user">
                                                            <p class="u-name">Edward Fletcher</p>
                                                            <p class="u-designation">UI/UX Designer</p>
                                                        </div>
                                                        <P class="mb-0 fs-12 fw-semibold text-primary">08:10 PM</P>
                                                    </div>
                                                </li>

                                                <!-- list person -->
                                            </ul>
                                        </div>
                                        <!-- CHAT -->
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="inbox card-body">
                                            <form>
                                                <div class="form-row mb-4">
                                                    <label for="to"
                                                        class="col-3 col-sm-2 col-md-3 col-lg-2 col-form-label">To:</label>
                                                    <div class="col-9 col-sm-10 col-md-9 col-lg-10">
                                                        <input type="email" class="form-control" id="to"
                                                            placeholder="Type email">
                                                    </div>
                                                </div>
                                                <div class="form-row mb-4">
                                                    <label for="cc"
                                                        class="col-3 col-sm-2 col-md-3 col-lg-2 col-form-label">CC:</label>
                                                    <div class="col-9 col-sm-10 col-md-9 col-lg-10">
                                                        <input type="email" class="form-control" id="cc"
                                                            placeholder="Type email">
                                                    </div>
                                                </div>
                                                <div class="form-row mb-4">
                                                    <label
                                                        class="col-3 col-sm-2 col-md-3 col-lg-2 col-form-label">Subject</label>
                                                    <div class="col-9 col-sm-10 col-md-9 col-lg-10">
                                                        <input type="email" class="form-control" id="subject"
                                                            placeholder="Type Subject">
                                                    </div>
                                                </div>
                                                <div class="form-row mb-4">
                                                    <label
                                                        class="col-3 col-sm-2 col-md-3 col-lg-2 col-form-label">Message</label>
                                                    <div class="col-9 col-sm-10 col-md-9 col-lg-10">
                                                        <textarea class="form-control" id="message" name="body" rows="12"
                                                            placeholder="Click here to reply"></textarea>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer d-flex">
                                            <div class="btn-list">
                                                <button type="button" class="btn btn-icon btn-primary"><i class="fa fa-paperclip text-white"></i></button>
                                                <button type="button" class="btn btn-icon btn-secondary"><i class="fa fa-picture-o text-white"></i></button>
                                                <button type="button" class="btn btn-icon btn-info"><i class="fa fa-link text-white"></i></button>
                                                <button type="button" class="btn btn-icon btn-success"><i class="fa fa-smile-o text-white"></i></button>
                                                <button type="button" class="btn btn-icon btn-warning"><i class="fa fa-trash-o text-white"></i></button>
                                                <button type="button" class="btn btn-icon btn-teal me-2"><i class="fa fa-file text-white"></i></button>
                                            </div>
                                            <div class="ms-auto btn-list">
                                                <button type="button" class="btn btn-danger btn-space me-2">Discard</button>
                                                <button type="submit" class="btn btn-primary btn-space">Send message</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

@endsection