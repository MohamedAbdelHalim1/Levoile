@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Scrollspy</li>
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
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="card-title">Basic Navbar Scrollspy</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <nav id="navbar-example2" class="navbar navbar-light bg-light text-dark px-3">
                                                <a class="navbar-brand" href="javascript:void(0)">Navbar</a>
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#scrollspyHeading1">First</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#scrollspyHeading2">Second</a>
                                                    </li>
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                                            href="javascript:void(0)" role="button"
                                                            aria-expanded="false">Dropdown</a>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="#scrollspyHeading3">Third</a>
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="#scrollspyHeading4">Fourth</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#scrollspyHeading5">Fifth</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </nav>
                                            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0"
                                                class="scrollspy-example" tabindex="0">
                                                <div id="scrollspyHeading1">
                                                    <h4 class="fs-16 fw-semibold">First Heading</h4>
                                                    <p class="fs-14">It is a long established fact that a reader will be
                                                        distracted by the readable content of a page when looking at its
                                                        layout. The point of using Lorem Ipsum is that it has a more-or-less
                                                        normal distribution of
                                                        letters, as opposed to using 'Content here, content here', making it
                                                        look like readable English.</p>
                                                </div>
                                                <div id="scrollspyHeading2">
                                                    <h4 class="fs-16 fw-semibold">Second Heading</h4>
                                                    <p class="fs-14">It is a long established fact that a reader will be
                                                        distracted by the readable content of a page when looking at its
                                                        layout. The point of using Lorem Ipsum is that it has a more-or-less
                                                        normal distribution of
                                                        letters, as opposed to using 'Content here, content here', making it
                                                        look like readable English.</p>
                                                </div>
                                                <div id="scrollspyHeading3">
                                                    <h4 class="fs-16 fw-semibold">Third Heading</h4>
                                                    <p class="fs-14">It is a long established fact that a reader will be
                                                        distracted by the readable content of a page when looking at its
                                                        layout. The point of using Lorem Ipsum is that it has a more-or-less
                                                        normal distribution of
                                                        letters, as opposed to using 'Content here, content here', making it
                                                        look like readable English.</p>
                                                </div>
                                                <div id="scrollspyHeading4">
                                                    <h4 class="fs-16 fw-semibold">Fourth Heading</h4>
                                                    <p class="fs-14">It is a long established fact that a reader will be
                                                        distracted by the readable content of a page when looking at its
                                                        layout. The point of using Lorem Ipsum is that it has a more-or-less
                                                        normal distribution of
                                                        letters, as opposed to using 'Content here, content here', making it
                                                        look like readable English.</p>
                                                </div>
                                                <div id="scrollspyHeading5">
                                                    <h4 class="fs-16 fw-semibold">Fifth Heading</h4>
                                                    <p class="fs-14">It is a long established fact that a reader will be
                                                        distracted by the readable content of a page when looking at its
                                                        layout. The point of using Lorem Ipsum is that it has a more-or-less
                                                        normal distribution of
                                                        letters, as opposed to using 'Content here, content here', making it
                                                        look like readable English.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW-1 CLOSED -->

                            <!-- ROW-2 OPEN -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="card-title">Nested nav Scrollspy</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-0">
                                                <div class="col-lg-4 col-md-12 p-0">
                                                    <nav id="navbar-example3"
                                                        class="navbar navbar-light bg-light text-dark flex-column align-items-stretch p-3 br-ts-5 br-bs-5">
                                                        <a class="navbar-brand" href="javascript:void(0)">Navbar</a>
                                                        <nav class="nav nav-pills flex-column">
                                                            <a class="nav-link active" href="#item-1">Item 1</a>
                                                            <nav class="nav nav-pills flex-column">
                                                                <a class="nav-link ms-3 my-1" href="#item-1-1">Item 1-1</a>
                                                                <a class="nav-link ms-3 my-1" href="#item-1-2">Item 1-2</a>
                                                            </nav>
                                                            <a class="nav-link" href="#item-2">Item 2</a>
                                                            <a class="nav-link" href="#item-3">Item 3</a>
                                                            <nav class="nav nav-pills flex-column">
                                                                <a class="nav-link ms-3 my-1" href="#item-3-1">Item 3-1</a>
                                                                <a class="nav-link ms-3 my-1" href="#item-3-2">Item 3-2</a>
                                                            </nav>
                                                        </nav>
                                                    </nav>
                                                </div>
                                                <div class="col-lg-8 col-md-12 p-0">
                                                    <div data-bs-spy="scroll" data-bs-target="#navbar-example3"
                                                        class="scrollspy-example-2" data-bs-offset="0" tabindex="0">
                                                        <div id="item-1">
                                                            <h4 class="fs-16 fw-semibold">Item 1</h4>
                                                            <p class="fs-14">It is a long established fact that a reader
                                                                will be distracted by the readable content of a page when
                                                                looking at its layout. The point of using Lorem Ipsum is
                                                                that it has a more-or-less normal distribution
                                                                of letters, as opposed to using 'Content here, content
                                                                here', making it look like readable English.</p>
                                                        </div>
                                                        <div id="item-1-1">
                                                            <h4 class="fs-16 fw-semibold">Item 1-1</h4>
                                                            <p class="fs-14">It is a long established fact that a reader
                                                                will be distracted by the readable content of a page when
                                                                looking at its layout. The point of using Lorem Ipsum is
                                                                that it has a more-or-less normal distribution
                                                                of letters, as opposed to using 'Content here, content
                                                                here', making it look like readable English.</p>
                                                        </div>
                                                        <div id="item-1-2">
                                                            <h4 class="fs-16 fw-semibold">item 1-2</h4>
                                                            <p class="fs-14">It is a long established fact that a reader
                                                                will be distracted by the readable content of a page when
                                                                looking at its layout. The point of using Lorem Ipsum is
                                                                that it has a more-or-less normal distribution
                                                                of letters, as opposed to using 'Content here, content
                                                                here', making it look like readable English.</p>
                                                        </div>
                                                        <div id="item-2">
                                                            <h4 class="fs-16 fw-semibold">Item 2</h4>
                                                            <p class="fs-14">It is a long established fact that a reader
                                                                will be distracted by the readable content of a page when
                                                                looking at its layout. The point of using Lorem Ipsum is
                                                                that it has a more-or-less normal distribution
                                                                of letters, as opposed to using 'Content here, content
                                                                here', making it look like readable English.</p>
                                                        </div>
                                                        <div id="item-3">
                                                            <h4 class="fs-16 fw-semibold">Item 3</h4>
                                                            <p class="fs-14">It is a long established fact that a reader
                                                                will be distracted by the readable content of a page when
                                                                looking at its layout. The point of using Lorem Ipsum is
                                                                that it has a more-or-less normal distribution
                                                                of letters, as opposed to using 'Content here, content
                                                                here', making it look like readable English.</p>
                                                        </div>
                                                        <div id="item-3-1">
                                                            <h4 class="fs-16 fw-semibold">Item 3-1</h4>
                                                            <p class="fs-14">It is a long established fact that a reader
                                                                will be distracted by the readable content of a page when
                                                                looking at its layout. The point of using Lorem Ipsum is
                                                                that it has a more-or-less normal distribution
                                                                of letters, as opposed to using 'Content here, content
                                                                here', making it look like readable English.</p>
                                                        </div>
                                                        <div id="item-3-2">
                                                            <h4 class="fs-16 fw-semibold">Item 3-2</h4>
                                                            <p class="fs-14">It is a long established fact that a reader
                                                                will be distracted by the readable content of a page when
                                                                looking at its layout. The point of using Lorem Ipsum is
                                                                that it has a more-or-less normal distribution
                                                                of letters, as opposed to using 'Content here, content
                                                                here', making it look like readable English.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW-2 CLOSED -->

@endsection

@section('scripts')

@endsection