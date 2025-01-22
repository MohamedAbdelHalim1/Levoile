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
                                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
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
                            <div class="row ">
                                <div class="col-lg-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Settings</h3>
                                        </div>
                                        <div class="card-body px-0 py-2">
                                            <div class="list-group list-group-transparent mb-0 mail-inbox">
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                                    <span class=" fw-semibold me-3"><i class="fe fe-user fs-18 text-success p-2"></i></span>Account
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                                    <span class=" fw-semibold me-3"><i class="fe fe-eye fs-18 text-primary p-2"></i></span>Appearances
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                                    <span class=" fw-semibold me-3"><i class="fe fe-lock fs-18 text-teal p-2"></i></span>Privacy & Security
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                                    <span class=" fw-semibold me-3"><i class="fe fe-flag fs-18 text-info p-2"></i></span>Languages
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                                    <span class=" fw-semibold me-3"><i class="fe fe-database fs-18 text-pink p-2"></i></span>Data Usage Control
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                                    <span class=" fw-semibold me-3"><i class="fe fe-bell fs-18 text-warning p-2"></i></span>Notifications
                                                    <span class="badge bg-warning ms-auto">08</span>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                                    <span class=" fw-semibold me-3"><i class="fe fe-help-circle fs-18 text-danger p-2"></i></span>About
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card bg-gradient-primary">
                                        <div class="card-body">
                                            <div class="mb-2">
                                                <p class="mb-0 font-weight-semibold">Do you still need our help <a href="javascript:void(0);" class="fe fe-help-circle float-end text-white"></a></p>
                                                <small class="tx-white-7">Send Your request via email</small>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-sm fw-semibold btn-light text-dark">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-9">
                                    <div class="row row-sm">
                                        <div class="col-xl-12 col-xxl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row row-sm">
                                                        <div class="col-xl-2 col-sm-2 col-md-12">
                                                            <div class="mt-3 mb-5">
                                                                <span
                                                                    class="settings-icon bg-primary-transparent text-primary"><i
                                                                        class="fe fe-settings"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-sm-10 col-md-12">
                                                            <a href="javascript:void(0)">
                                                                <h4 class="mb-1 text-dark">General</h4>
                                                            </a>
                                                            <p class="mb-0 text-muted-dark">General settings such as, site title, logo, other general and
                                                                advanced settings.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex align-items-center justify-content-between">
                                                    <a href="javascript:void(0);" class="tx-14 mb-0 d-flex align-items-center">Go to Settings</a>
                                                    <label class="custom-switch">
                                                        <a href="javascript:void(0);" class="me-2 text-end">Restore default</a>
                                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-xxl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row row-sm">
                                                        <div class="col-xl-2 col-sm-2 col-md-12">
                                                            <div class="mt-3 mb-5">
                                                                <span
                                                                    class="settings-icon bg-secondary-transparent text-secondary border-secondary"><i
                                                                        class="fe fe-home"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-sm-10 col-md-12">
                                                            <a href="javascript:void(0)">
                                                                <h4 class="mb-1 text-dark">Dashboard</h4>
                                                            </a>
                                                            <p class="mb-0 text-muted-dark">In this settings we can change sidemenu and main page can be
                                                                Controlled.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex align-items-center justify-content-between">
                                                    <a href="javascript:void(0);" class="tx-14 mb-0 d-flex align-items-center">Go to Settings</a>
                                                    <label class="custom-switch">
                                                        <a href="javascript:void(0);" class="me-2 text-end">Restore default</a>
                                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-xxl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row row-sm">
                                                        <div class="col-xl-2 col-sm-2 col-md-12">
                                                            <div class="mt-3 mb-5">
                                                                <span
                                                                    class="settings-icon bg-danger-transparent text-danger border-danger"><i
                                                                        class="fe fe-bell"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-sm-10 col-md-12">
                                                            <a href="javascript:void(0)">
                                                                <h4 class="mb-1 text-dark">Notifications</h4>
                                                            </a>
                                                            <p class="mb-0 text-muted-dark">Notifications settings we can control the notifications
                                                                privacy and security.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex align-items-center justify-content-between">
                                                    <a href="javascript:void(0);" class="tx-14 mb-0 d-flex align-items-center">Go to Settings</a>
                                                    <label class="custom-switch">
                                                        <a href="javascript:void(0);" class="me-2 text-end">Restore default</a>
                                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-xxl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row row-sm">
                                                        <div class="col-xl-2 col-sm-2 col-md-12">
                                                            <div class="mt-3 mb-5">
                                                                <span
                                                                    class="settings-icon bg-warning-transparent text-warning border-warning"><i
                                                                        class="fe fe-grid"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-sm-10 col-md-12">
                                                            <a href="javascript:void(0)">
                                                                <h4 class="mb-1 text-dark">Webapps</h4>
                                                            </a>
                                                            <p class="mb-0 text-muted-dark">Web apps settings such as Apps,Elements & Mail related to web
                                                                apps can be Controlled.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex align-items-center justify-content-between">
                                                    <a href="javascript:void(0);" class="tx-14 mb-0 d-flex align-items-center">Go to Settings</a>
                                                    <label class="custom-switch">
                                                        <a href="javascript:void(0);" class="me-2 text-end">Restore default</a>
                                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-xxl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row row-sm">
                                                        <div class="col-xl-2 col-sm-2 col-md-12">
                                                            <div class="mt-3 mb-5">
                                                                <span
                                                                    class="settings-icon bg-success-transparent text-success border-success"><i
                                                                        class="fe fe-flag"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-sm-10 col-md-12">
                                                            <a href="javascript:void(0)">
                                                                <h4 class="mb-1 text-dark">Region & language</h4>
                                                            </a>
                                                            <p class="mb-0 text-muted-dark">Region & language settings we can Add, Delete and edit your
                                                                Region & language.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex align-items-center justify-content-between">
                                                    <a href="javascript:void(0);" class="tx-14 mb-0 d-flex align-items-center">Go to Settings</a>
                                                    <label class="custom-switch">
                                                        <a href="javascript:void(0);" class="me-2 text-end">Restore default</a>
                                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-xxl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row row-sm">
                                                        <div class="col-xl-2 col-sm-2 col-md-12">
                                                            <div class="mt-3 mb-5">
                                                                <span
                                                                    class="settings-icon bg-pink-transparent text-pink border-pink"><i
                                                                        class="fe fe-cast"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-sm-10 col-md-12">
                                                            <a href="javascript:void(0)">
                                                                <h4 class="mb-1 text-dark">Blog</h4>
                                                            </a>
                                                            <p class="mb-0 text-muted-dark">Blog settings such as, enable blog, max mosts in page and
                                                                more can be controlled.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex align-items-center justify-content-between">
                                                    <a href="javascript:void(0);" class="tx-14 mb-0 d-flex align-items-center">Go to Settings</a>
                                                    <label class="custom-switch">
                                                        <a href="javascript:void(0);" class="me-2 text-end">Restore default</a>
                                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-xxl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row row-sm">
                                                        <div class="col-xl-2 col-sm-2 col-md-12">
                                                            <div class="mt-3 mb-5">
                                                                <span
                                                                    class="settings-icon bg-info-transparent text-info border-info"><i
                                                                        class="fe fe-search"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-sm-10 col-md-12">
                                                            <a href="javascript:void(0)">
                                                                <h4 class="mb-1 text-dark">SEO</h4>
                                                            </a>
                                                            <p class="mb-0 text-muted-dark">Search Engine Optimization settings such as, meta tags and
                                                                social media can be controlled..</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex align-items-center justify-content-between">
                                                    <a href="javascript:void(0);" class="tx-14 mb-0 d-flex align-items-center">Go to Settings</a>
                                                    <label class="custom-switch">
                                                        <a href="javascript:void(0);" class="me-2 text-end">Restore default</a>
                                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-xxl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row row-sm">
                                                        <div class="col-xl-2 col-sm-2 col-md-12">
                                                            <div class="mt-3 mb-5">
                                                                <span
                                                                    class="settings-icon bg-danger-transparent text-orange border-orange"><i
                                                                        class="fe fe-mail"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-sm-10 col-md-12">
                                                            <a href="javascript:void(0)">
                                                                <h4 class="mb-1 text-dark">SMTP</h4>
                                                            </a>
                                                            <p class="mb-0 text-muted-dark">Email SMTP settings such as, contact us and others related to
                                                                email can be controlled.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex align-items-center justify-content-between">
                                                    <a href="javascript:void(0);" class="tx-14 mb-0 d-flex align-items-center">Go to Settings</a>
                                                    <label class="custom-switch">
                                                        <a href="javascript:void(0);" class="me-2 text-end">Restore default</a>
                                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
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