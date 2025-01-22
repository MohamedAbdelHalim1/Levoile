@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Badge & Pills</li>
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
                                <div class="col-md-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0 card-title">Badges</h3>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge badge-default me-1 my-1">Default</span>
                                            <span class="badge bg-primary me-1 my-1">Primary</span>
                                            <span class="badge bg-success  me-1 my-1">Success</span>
                                            <span class="badge bg-danger  me-1 my-1">Danger</span>
                                            <span class="badge bg-info  me-1 my-1">Info</span>
                                            <span class="badge bg-warning  me-1 my-1">Warning</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0 card-title">Pill Badges</h3>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge rounded-pill badge-default me-1 my-1">Default</span>
                                            <span class="badge rounded-pill bg-primary me-1 my-1">Primary</span>
                                            <span class="badge rounded-pill bg-success me-1 my-1">Success</span>
                                            <span class="badge rounded-pill bg-danger me-1 my-1">Danger</span>
                                            <span class="badge rounded-pill bg-info me-1 my-1">Info</span>
                                            <span class="badge rounded-pill bg-warning me-1 my-1">Warning</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Gradient badges</h3>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge badge-gradient-primary me-1 my-1">Primary</span>
                                            <span class="badge badge-gradient-secondary me-1 my-1">Secondary</span>
                                            <span class="badge badge-gradient-danger me-1 my-1">Danger</span>
                                            <span class="badge badge-gradient-info me-1 my-1">Info</span>
                                            <span class="badge badge-gradient-warning me-1 my-1">Warning</span>
                                            <span class="badge badge-gradient-success me-1 my-1">Success</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Gradient Pill Badges</h3>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge rounded-pill badge-gradient-primary me-1 my-1">Primary</span>
                                            <span class="badge rounded-pill badge-gradient-secondary me-1 my-1">Secondary</span>
                                            <span class="badge rounded-pill badge-gradient-danger me-1 my-1">Danger</span>
                                            <span class="badge rounded-pill badge-gradient-info me-1 my-1">Info</span>
                                            <span class="badge rounded-pill badge-gradient-warning me-1 my-1">Warning</span>
                                            <span class="badge rounded-pill badge-gradient-success me-1 my-1">Success</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Transparent badges</h3>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge badge-primary-transparent me-1 my-1 fw-semibold">Primary</span>
                                            <span class="badge bg-secondary-transparent me-1 my-1 fw-semibold">Secondary</span>
                                            <span class="badge bg-danger-transparent me-1 my-1 fw-semibold">Danger</span>
                                            <span class="badge bg-info-transparent me-1 my-1 fw-semibold">Info</span>
                                            <span class="badge bg-warning-transparent me-1 my-1 fw-semibold">Warning</span>
                                            <span class="badge bg-success-transparent me-1 my-1 fw-semibold">Success</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Transparent Pill Badges</h3>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge rounded-pill bg-primary-transparent me-1 my-1 fw-semibold">Primary</span>
                                            <span class="badge rounded-pill bg-secondary-transparent me-1 my-1 fw-semibold">Secondary</span>
                                            <span class="badge rounded-pill bg-danger-transparent me-1 my-1 fw-semibold">Danger</span>
                                            <span class="badge rounded-pill bg-info-transparent me-1 my-1 fw-semibold">Info</span>
                                            <span class="badge rounded-pill bg-warning-transparent me-1 my-1 fw-semibold">Warning</span>
                                            <span class="badge rounded-pill bg-success-transparent me-1 my-1 fw-semibold">Success</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Buttons with Badges</h3>
                                        </div>
                                        <div class="card-body ">
                                            <button type="button" class="btn btn-primary mt-1 mb-1 me-3">
                                                <span>Notifications</span>
                                                <span class="badge bg-white">2</span>
                                            </button>
                                            <button type="button" class="btn btn-secondary  mt-1 mb-1 me-3">
                                                <span>Notifications</span>
                                                <span class="badge bg-white">4</span>
                                            </button>
                                            <button type="button" class="btn btn-success  mt-1 mb-1 me-3">
                                                <span>Notifications</span>
                                                <span class="badge bg-white">6</span>
                                            </button>
                                            <button type="button" class="btn btn-info  mt-1 mb-1 me-3">
                                                <span>Notifications</span>
                                                <span class="badge bg-white">8</span>
                                            </button>
                                            <button type="button" class="btn btn-warning mt-1 mb-1 me-3">
                                                <span>Notifications</span>
                                                <span class="badge bg-white">10</span>
                                            </button>
                                            <button type="button" class="btn btn-danger  mt-1 mb-1 me-3">
                                                <span>Notifications</span>
                                                <span class="badge bg-white">12</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Outline Buttons with Badges</h3>
                                        </div>
                                        <div class="card-body ">
                                            <button type="button" class="btn btn-outline-primary mt-1 mb-1 me-3">
                                                <span>Notifications</span>
                                                <span class="badge bg-primary">2</span>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary  mt-1 mb-1 me-3">
                                                <span>Notifications</span>
                                                <span class="badge bg-secondary">4</span>
                                            </button>
                                            <button type="button" class="btn btn-outline-success  mt-1 mb-1 me-3">
                                                <span>Notifications</span>
                                                <span class="badge bg-success">6</span>
                                            </button>
                                            <button type="button" class="btn btn-outline-info  mt-1 mb-1 me-3">
                                                <span>Notifications</span>
                                                <span class="badge bg-info">8</span>
                                            </button>
                                            <button type="button" class="btn btn-outline-warning mt-1 mb-1 me-3">
                                                <span>Notifications</span>
                                                <span class="badge bg-warning">10</span>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger  mt-1 mb-1 me-3">
                                                <span>Notifications</span>
                                                <span class="badge bg-danger">12</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Link Badges</h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="mg-b-20 text-muted card-sub-title">Badges can be used as part of links or buttons to provide a counter.</p>
                                        <div class="text-wrap">
                                            <button type="button" class="btn btn-primary position-relative  me-5">
                                                Inbox
                                                <span class="position-absolute start-100 translate-middle badge rounded-pill bg-info">
                                                8
                                                <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </button>
                                            <button type="button" class="btn btn-success position-relative  mb-2 mt-2  me-5">
                                                Inbox
                                                <span class="position-absolute start-100 translate-middle badge rounded-pill bg-warning">
                                                82
                                                <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </button>
                                            <button type="button" class="btn btn-danger position-relative  mb-2 mt-2  me-5">
                                                Inbox
                                                <span class="position-absolute start-100 translate-middle badge rounded-pill bg-success">
                                                539
                                                <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </button>
                                            <button type="button" class="btn btn-teal position-relative  mb-2 mt-2  me-5">
                                                Inbox
                                                <span class="position-absolute start-100 translate-middle badge rounded-pill bg-warning">
                                                9+
                                                <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </button>
                                            <button type="button" class="btn btn-info position-relative  mb-2 mt-2  me-5">
                                                Inbox
                                                <span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger">
                                                99+
                                                <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </button>
                                            <button type="button" class="btn btn-warning position-relative  mb-2 mt-2  me-5">
                                                Inbox
                                                <span class="position-absolute  start-100 translate-middle badge rounded-pill bg-primary">
                                                999+
                                                <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-md-12  col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Simple Badges</h3>
                                        </div>
                                        <div class="card-body">
                                            <h1>Heading 01 <span class="badge badge-default">New</span></h1>
                                            <h2>Heading 02 <span class="badge badge-default">New</span></h2>
                                            <h3>Heading 03 <span class="badge badge-default">New</span></h3>
                                            <h4>Heading 04 <span class="badge badge-default">New</span></h4>
                                            <h5>Heading 05 <span class="badge badge-default">New</span></h5>
                                            <h6>Heading 06 <span class="badge badge-default">New</span></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12  col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Colored Badges</h3>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="text-blue">Heading 01 <span class="badge bg-primary">New</span></h1>
                                            <h2 class="text-red">Heading 02 <span class="badge bg-danger">New</span></h2>
                                            <h3 class="text-yellow">Heading 03 <span class="badge bg-warning">New</span>
                                            </h3>
                                            <h4 class="text-green">Heading 04 <span class="badge bg-success">New</span></h4>
                                            <h5 class="text-info">Heading 05 <span class="badge bg-info">New</span></h5>
                                            <h6 class="text-secondary">Heading 06 <span
                                                    class="badge bg-secondary">New</span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-md-12  col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Card Model Badges</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                                    <div class="offer offer-default">
                                                        <div class="shape">
                                                            <div class="shape-text">
                                                                top
                                                            </div>
                                                        </div>
                                                        <div class="offer-content">
                                                            <h3 class="lead">
                                                                Default badge
                                                            </h3>
                                                            <p class="mb-0">
                                                                And a little description.
                                                                <br> and so one
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                                    <div class="offer offer-success">
                                                        <div class="shape">
                                                            <div class="shape-text">
                                                                top
                                                            </div>
                                                        </div>
                                                        <div class="offer-content">
                                                            <h3 class="lead">
                                                                Success badge
                                                            </h3>
                                                            <p class="mb-0">
                                                                And a little description.
                                                                <br> and so one
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                                    <div class="offer offer-radius offer-primary">
                                                        <div class="shape">
                                                            <div class="shape-text">
                                                                top
                                                            </div>
                                                        </div>
                                                        <div class="offer-content">
                                                            <h3 class="lead">
                                                                Primary badge
                                                            </h3>
                                                            <p class="mb-0">
                                                                And a little description.
                                                                <br> and so one
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                                    <div class="offer offer-info">
                                                        <div class="shape">
                                                            <div class="shape-text">
                                                                top
                                                            </div>
                                                        </div>
                                                        <div class="offer-content">
                                                            <h3 class="lead">
                                                                Info Badge
                                                            </h3>
                                                            <p class="mb-0">
                                                                And a little description.
                                                                <br> and so one
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                                    <div class="offer offer-warning">
                                                        <div class="shape">
                                                            <div class="shape-text">
                                                                top
                                                            </div>
                                                        </div>
                                                        <div class="offer-content">
                                                            <h3 class="lead">
                                                                Warning badge
                                                            </h3>
                                                            <p class="mb-0">
                                                                And a little description.
                                                                <br> and so one
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-lg-4">
                                                    <div class="offer offer-radius offer-danger">
                                                        <div class="shape">
                                                            <div class="shape-text">
                                                                top
                                                            </div>
                                                        </div>
                                                        <div class="offer-content">
                                                            <h3 class="lead">
                                                                Danger Badge
                                                            </h3>
                                                            <p class="mb-0">
                                                                And a little description.
                                                                <br> and so one
                                                            </p>
                                                        </div>
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

@endsection