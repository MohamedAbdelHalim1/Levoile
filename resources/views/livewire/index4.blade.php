@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard04</li>
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
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card overflow-hidden">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div>
                                                    <p class="mb-0 text-dark fw-semibold">Daily Appoinments</p>
                                                    <h3 class="mt-1 mb-1 text-dark fw-semibold">25.2K</h3>
                                                    <span class="text-muted fw-semibold fs-12"><span class="text-danger">18%</span> Higher than Last Month</span>
                                                </div>
                                                <span class="ms-auto my-auto bg-danger-transparent avatar avatar-lg brround text-danger">
                                                    <i class="fe fe-folder fs-4"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card overflow-hidden">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div>
                                                    <p class="mb-0 text-dark fw-semibold">Daily Out patients</p>
                                                    <h3 class="mt-1 mb-1 text-dark fw-semibold">19,584</h3>
                                                    <span class="text-muted fw-semibold fs-12"><span class="text-primary">15%</span> Higher than Last Month</span>
                                                </div>
                                                <span class="ms-auto my-auto bg-primary-transparent avatar avatar-lg brround text-primary">
                                                    <i class="fe fe-user fs-4"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card overflow-hidden">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div>
                                                    <p class="mb-0 text-dark fw-semibold">Daily Updates</p>
                                                    <h3 class="mt-1 mb-1 fw-semibold">626</h3>
                                                    <span class="text-muted fw-semibold fs-12"><span class="text-secondary">10%</span> Higher than Last Month</span>
                                                </div>
                                                <span class="ms-auto my-auto bg-secondary-transparent avatar avatar-lg brround text-secondary">
                                                    <i class="fe fe-bar-chart-2 fs-4"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
                                    <div class="card overflow-hidden">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div>
                                                    <p class="mb-0 text-dark fw-semibold">Daily Operations</p>
                                                    <h3 class="mt-1 mb-1 text-dark fw-semibold">46</h3>
                                                    <span class="text-muted fw-semibold fs-12"><span class="text-primary">05%</span> Higher than Last Month</span>
                                                </div>
                                                <span class="ms-auto my-auto bg-info-transparent avatar avatar-lg brround text-info">
                                                    <i class="fe fe-scissors fs-4"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-xxl-9 col-xl-8 col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title mb-0">Patients Visit</h3>
                                            <div class="dropdown">
                                                <button type="button" class="d-flex align-items-center btn btn-sm bg-primary-transparent fw-bold" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    Last 6 month<i class="fe fe-chevron-down fw-semibold mx-1"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" role="menu" data-popper-placement="bottom-end">
                                                    <li><a href="javascript:void(0);">1 Year</a></li>
                                                    <li><a href="javascript:void(0);">2 Years</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body py-0">
                                            <div id="patient-visit" class="chartsh"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-lg-12 col-md-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-header d-flex justify-content-between align-items-center border-bottom-0">
                                            <h3 class="card-title mb-0">Patient Visit By Department</h3>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="d-flex align-items-center btn btn-sm bg-primary-transparent fw-bold" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                                    Weekly<i class="fe fe-chevron-down fw-semibold mx-1"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end" role="menu" data-popper-placement="bottom-end">
                                                    <li><a href="javascript:void(0);">Daily</a></li>
                                                    <li><a href="javascript:void(0);">Monthly</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div id="visit-by-departments" class="chartsh"></div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-evenly align-items-center">
                                                <div>
                                                    <h6 class="text-dark mb-1 fw-semibold"><span class="legend bg-primary"></span>Cardiology</h6>
                                                    <p class="mb-0 ms-3">45%</p>
                                                </div>
                                                <div>
                                                    <h6 class="text-dark mb-1 fw-semibold"><span class="legend bg-secondary"></span>Dermatology</h6>
                                                    <p class="mb-0 ms-3">30%</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-xxl-5 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header d-felx justify-content-between align-items-center border-bottom-0">
                                            <h3 class="card-title">Department Overview</h3>
                                            <button type="button" class="btn btn-sm bg-primary-transparent fw-bold">
                                                View all
                                            </button>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table border-0 mb-0 text-nowrap">
                                                    <thead class="bg-light">
                                                        <tr>
                                                            <th class="border-top-0 text-dark fw-semibold px-5 fs-13 w-3">Daignosis Name</th>
                                                            <th class="border-top-0 text-dark fw-semibold fs-13 text-center">Patients</th>
                                                            <th class="border-top-0 text-dark fw-semibold text-center fs-13">cost</th>
                                                            <th class="border-top-0 text-dark fw-semibold pe-5 text-end fs-13">Avg.days admited</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-dark">
                                                        <tr class="border-bottom">
                                                            <td class="d-flex border-bottom-0">
                                                                <div>
                                                                    <span class="avatar avatar-lg mx-2 p-1"><img src="{{asset('build/assets/images/pngs/6.png')}}" alt="img" class="rounded-circle bg-orange-transparent cover-image mb-2 p-1"></span>
                                                                </div>
                                                                <div class="flex-1 my-auto">
                                                                    <h6 class="mb-0 fw-semibold">Dermitology</h6>
                                                                </div>
                                                            </td>
                                                            <td class="text-muted-dark text-center">
                                                                24
                                                            </td>
                                                            <td class="text-center">
                                                                <h6 class="mb-0 fw-semibold">$3254.24</h6>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-end align-items-center me-2">
                                                                    <div class="progress progress-xs mb-0 mt-0 w-60 mx-2">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-orange w-30">
                                                                        </div>
                                                                    </div>
                                                                    <span class="fw-semibold text-dark d-flex align-items-center">30%<i class="bi bi-arrow-up text-orange fs-12 fw-semibold"></i></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-bottom">
                                                            <td class="d-flex border-bottom-0">
                                                                <div>
                                                                    <span class="avatar avatar-lg mx-2 p-1"><img src="{{asset('build/assets/images/pngs/5.png')}}" alt="img" class="rounded-circle bg-success-transparent cover-image mb-2 p-2"></span>
                                                                </div>
                                                                <div class="flex-1 my-auto">
                                                                    <h6 class="mb-0 fw-semibold">Cardiology</h6>
                                                                </div>
                                                            </td>
                                                            <td class="text-muted-dark text-center">
                                                                26
                                                            </td>
                                                            <td class="text-center">
                                                                <h6 class="mb-0 fw-semibold">$3620.00</h6>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-end align-items-center me-2">
                                                                    <div class="progress progress-xs mb-0 mt-0 w-60 mx-2">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success w-50">
                                                                        </div>
                                                                    </div>
                                                                    <span class="fw-semibold text-dark d-flex align-items-center">50%<i class="bi bi-arrow-up text-success fs-12 fw-semibold"></i></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-bottom">
                                                            <td class="d-flex border-bottom-0">
                                                                <div>
                                                                    <span class="avatar avatar-lg mx-2 p-1"><img src="{{asset('build/assets/images/pngs/9.png')}}" alt="img" class="rounded-circle bg-pink-transparent cover-image mb-2 p-2"></span>
                                                                </div>
                                                                <div class="flex-1 my-auto">
                                                                    <h6 class="mb-0 fw-semibold">Oncology</h6>
                                                                </div>
                                                            </td>
                                                            <td class="text-muted-dark text-center">
                                                                35
                                                            </td>
                                                            <td class="text-center">
                                                                <h6 class="mb-0 fw-semibold">$2356.14</h6>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-end align-items-center me-2">
                                                                    <div class="progress progress-xs mb-0 mt-0 w-60 mx-2">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-pink w-40">
                                                                        </div>
                                                                    </div>
                                                                    <span class="fw-semibold text-dark d-flex align-items-center">40%<i class="bi bi-arrow-up text-pink fs-12 fw-semibold"></i></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-bottom-0">
                                                            <td class="d-flex border-bottom-0">
                                                                <div>
                                                                    <span class="avatar avatar-lg mx-2 p-1"><img src="{{asset('build/assets/images/pngs/8.png')}}" alt="img" class="rounded-circle bg-info-transparent cover-image mb-2 p-1"></span>
                                                                </div>
                                                                <div class="flex-1 my-auto">
                                                                    <h6 class="mb-0 fw-semibold">Nurology</h6>
                                                                </div>
                                                            </td>
                                                            <td class="text-muted-dark text-center">
                                                                42
                                                            </td>
                                                            <td class="text-center">
                                                                <h6 class="mb-0 fw-semibold">$4203.65</h6>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-end align-items-center me-2">
                                                                    <div class="progress progress-xs mb-0 mt-0 w-60 mx-2">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info w-60">
                                                                        </div>
                                                                    </div>
                                                                    <span class="fw-semibold text-dark d-flex align-items-center">60%<i class="bi bi-arrow-up text-info fs-12 fw-semibold"></i></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-header d-flex justify-content-between align-items-center border-bottom-0">
                                            <h3 class="card-title mb-0">Health Reports Document</h3>
                                            <button type="button" class="btn btn-sm bg-primary-transparent fw-bold">
                                                View all
                                            </button>
                                        </div>
                                        <div class="card-body p-0">
                                            <ul class="list-group list-group-flush ">
                                                <li class="list-group-item d-flex align-items-start">
                                                    <img class="avatar avatar-md rounded-circle bg-primary-transparent p-2 cover-image me-2" src="{{asset('build/assets/images/pngs/7.png')}}" alt="Image description">
                                                    <div class="mt-1">
                                                        <h6 class="fw-semibold text-dark mb-0">X-ray Result.pdf</h6>
                                                        <span class="text-muted fs-11">1 MB</span>
                                                    </div>
                                                    <div class="ms-auto d-flex">
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light me-2"><i
                                                                class="fa fa-trash text-danger"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"><i
                                                                class="fa fa-download text-success"></i></a>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex align-items-start">
                                                    <img class="avatar avatar-md rounded-circle bg-primary-transparent p-2 cover-image me-2" src="{{asset('build/assets/images/pngs/7.png')}}" alt="Image description">
                                                    <div class="mt-1">
                                                        <h6 class="fw-semibold text-dark mb-0">Heart Raise Report.pdf</h6>
                                                        <span class="text-muted fs-11">5 MB</span>
                                                    </div>
                                                    <div class="ms-auto d-flex">
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light me-2"><i
                                                                class="fa fa-trash text-danger"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"><i
                                                                class="fa fa-download text-success"></i></a>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex align-items-start">
                                                    <img class="avatar avatar-md rounded-circle bg-primary-transparent p-2 cover-image me-2" src="{{asset('build/assets/images/pngs/7.png')}}" alt="Image description">
                                                    <div class="mt-1">
                                                        <h6 class="fw-semibold text-dark mb-0">Blood Count Report.pdf</h6>
                                                        <span class="text-muted fs-11">3 MB</span>
                                                    </div>
                                                    <div class="ms-auto d-flex">
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light me-2"><i
                                                                class="fa fa-trash text-danger"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"><i
                                                                class="fa fa-download text-success"></i></a>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex align-items-start">
                                                    <img class="avatar avatar-md rounded-circle bg-primary-transparent p-2 cover-image me-2" src="{{asset('build/assets/images/pngs/7.png')}}" alt="Image description">
                                                    <div class="mt-1">
                                                        <h6 class="fw-semibold text-dark mb-0">Body Check Up Report.pdf</h6>
                                                        <span class="text-muted fs-11">08 MB</span>
                                                    </div>
                                                    <div class="ms-auto d-flex">
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light me-2"><i
                                                                class="fa fa-trash text-danger"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"><i
                                                                class="fa fa-download text-success"></i></a>
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex align-items-start">
                                                    <img class="avatar avatar-md rounded-circle bg-primary-transparent p-2 cover-image me-2" src="{{asset('build/assets/images/pngs/7.png')}}" alt="Image description">
                                                    <div class="mt-1">
                                                        <h6 class="fw-semibold text-dark mb-0">Body Scan Report.pdf</h6>
                                                        <span class="text-muted fs-11">10 MB</span>
                                                    </div>
                                                    <div class="ms-auto d-flex">
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light me-2"><i
                                                                class="fa fa-trash text-danger"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-light"><i
                                                                class="fa fa-download text-success"></i></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-header d-flex justify-content-between align-items-center border-bottom-0">
                                            <h3 class="card-title">Top Doctor's</h3>
                                            <button type="button" class="btn btn-sm bg-primary-transparent fw-bold">View all</button>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="list-group list-lg-group list-group-flush">
                                                <div class="list-group-item list-group-item-action">
                                                    <div class="d-flex align-items-center">
                                                        <img class="avatar-md rounded-circle me-3"
                                                            src="{{asset('build/assets/images/users/female/21.jpg')}}"
                                                            alt="Image description">
                                                        <div class="media-body">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <h6 class="mb-0 fw-semibold text-dark">
                                                                    Dr.Query Wilson
                                                                </h6>
                                                                <span class="badge badge-success-transparent fw-semibold">available</span>
                                                            </div>
                                                            <p class="mb-0 text-muted fs-12">Orthopedic</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-group-item list-group-item-action">
                                                    <div class="d-flex align-items-center">
                                                        <img class="avatar-md rounded-circle me-3"
                                                            src="{{asset('build/assets/images/users/male/32.jpg')}}"
                                                            alt="Image description">
                                                        <div class="media-body">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <h6 class="mb-0 fw-semibold text-dark">
                                                                    Dr.Kevin North
                                                                </h6>
                                                                <span class="badge badge-danger-transparent fw-semibold">Unavailable</span>
                                                            </div>
                                                            <p class="mb-0 text-muted fs-12">Gynecology</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-group-item list-group-item-action">
                                                    <div class="d-flex align-items-center">
                                                        <img class="avatar-md rounded-circle me-3"
                                                            src="{{asset('build/assets/images/users/male/33.jpg')}}"
                                                            alt="Image description">
                                                        <div class="media-body">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <h6 class="mb-0 fw-semibold text-dark">
                                                                    Dr.Steven Fisher
                                                                </h6>
                                                                <span class="badge badge-success-transparent fw-semibold">available</span>
                                                            </div>
                                                            <p class="mb-0 text-muted fs-12">Psycotraphy</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-group-item list-group-item-action">
                                                    <div class="d-flex align-items-center">
                                                        <img class="avatar-md rounded-circle me-3"
                                                            src="{{asset('build/assets/images/users/male/8.jpg')}}"
                                                            alt="Image description">
                                                        <div class="media-body">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <h6 class="mb-0 fw-semibold text-dark">
                                                                    Dr.Jack Willion
                                                                </h6>
                                                                <span class="badge badge-danger-transparent fw-semibold">Unvailable</span>
                                                            </div>
                                                            <p class="mb-0 text-muted fs-12">Diagnostic</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-group-item list-group-item-action br-br-7 br-bl-7">
                                                    <div class="d-flex align-items-center">
                                                        <img class="avatar-md rounded-circle me-3"
                                                            src="{{asset('build/assets/images/users/female/1.jpg')}}"
                                                            alt="Image description">
                                                        <div class="media-body">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <h6 class="mb-0 fw-semibold text-dark">
                                                                    Dr.Joanne Taylor
                                                                </h6>
                                                                <span class="badge badge-success-transparent fw-semibold">available</span>
                                                            </div>
                                                            <p class="mb-0 text-muted fs-12">Orthopedic</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center border-bottom-0">
                                            <h3 class="card-title mb-0">Upcoming Appoinments</h3>
                                            <div class="dropdown">
                                                <button type="button" class="d-flex align-items-center btn btn-sm bg-primary-transparent fw-bold" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    This week<i class="fe fe-chevron-down fw-semibold mx-1"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" role="menu" data-popper-placement="bottom-end">
                                                    <li><a href="javascript:void(0);">Last week</a></li>
                                                    <li><a href="javascript:void(0);">Monthly</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table border-0 mb-0 text-nowrap">
                                                    <thead class="bg-light">
                                                        <tr>
                                                            <th class="border-top-0 text-dark fw-semibold px-5 fs-13 w-3">Patient Name</th>
                                                            <th class="border-top-0 text-dark fw-semibold fs-13">Gender</th>
                                                            <th class="border-top-0 text-dark fw-semibold fs-13">Disease</th>
                                                            <th class="border-top-0 text-dark fw-semibold fs-13 text-center">Date</th>
                                                            <th class="border-top-0 text-dark fw-semibold pe-5 text-end fs-13">Actions
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-dark">
                                                        <tr class="border-bottom">
                                                            <td class="d-flex border-bottom-0">
                                                                <div>
                                                                    <span class="avatar avatar-md mx-2"><img src="{{asset('build/assets/images/users/male/8.jpg')}}" alt="img" class="rounded-circle cover-image"></span>
                                                                </div>
                                                                <div class="flex-1 my-auto">
                                                                    <h6 class="mb-0 fw-semibold">Robertson</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6 class="mb-0 fw-semibold">Male</h6>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-info-transparent rounded-pill">Jaundice</span>
                                                            </td>
                                                            <td class="fw-semibold text-center fs-13">
                                                                15 Jan 2021
                                                            </td>
                                                            <td class="text-end pe-5">
                                                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-default text-dark fw-semibold">Cancel</a>
                                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary fw-semibold">Re-schedule</a>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-bottom">
                                                            <td class="d-flex border-bottom-0">
                                                                <div>
                                                                    <span class="avatar avatar-md mx-2"><img src="{{asset('build/assets/images/users/female/11.jpg')}}" alt="img" class="rounded-circle cover-image"></span>
                                                                </div>
                                                                <div class="flex-1 my-auto">
                                                                    <h6 class="mb-0 fw-semibold">Jenny Willson</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6 class="mb-0 fw-semibold">Female</h6>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-purple-transparent rounded-pill">Diabetes</span>
                                                            </td>
                                                            <td class="fw-semibold text-center fs-13">
                                                                05 Mar 2020
                                                            </td>
                                                            <td class="text-end pe-5">
                                                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-default text-dark fw-semibold">Cancel</a>
                                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary fw-semibold">Re-schedule</a>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-bottom">
                                                            <td class="d-flex border-bottom-0">
                                                                <div>
                                                                    <span class="avatar avatar-md mx-2"><img src="{{asset('build/assets/images/users/male/13.jpg')}}" alt="img" class="rounded-circle cover-image"></span>
                                                                </div>
                                                                <div class="flex-1 my-auto">
                                                                    <h6 class="mb-0 fw-semibold">Steward</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6 class="mb-0 fw-semibold">Male</h6>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-success-transparent rounded-pill">Bypass</span>
                                                            </td>
                                                            <td class="fw-semibold text-center fs-13">
                                                                20 Apr 2020
                                                            </td>
                                                            <td class="text-end pe-5">
                                                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-default text-dark fw-semibold">Cancel</a>
                                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary fw-semibold">Re-schedule</a>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-bottom">
                                                            <td class="d-flex border-bottom-0">
                                                                <div>
                                                                    <span class="avatar avatar-md mx-2"><img src="{{asset('build/assets/images/users/male/5.jpg')}}" alt="img" class="rounded-circle cover-image"></span>
                                                                </div>
                                                                <div class="flex-1 my-auto">
                                                                    <h6 class="mb-0 fw-semibold">Ralph Edward</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6 class="mb-0 fw-semibold">Male</h6>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-pink-transparent rounded-pill">Jaundice</span>
                                                            </td>
                                                            <td class="fw-semibold text-center fs-13">
                                                                24 Jan 2022
                                                            </td>
                                                            <td class="text-end pe-5">
                                                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-default text-dark fw-semibold">Cancel</a>
                                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary fw-semibold">Re-schedule</a>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-bottom-0">
                                                            <td class="d-flex border-bottom-0">
                                                                <div>
                                                                    <span class="avatar avatar-md mx-2"><img src="{{asset('build/assets/images/users/female/13.jpg')}}" alt="img" class="rounded-circle cover-image"></span>
                                                                </div>
                                                                <div class="flex-1 my-auto">
                                                                    <h6 class="mb-0 fw-semibold">Mira Edora</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6 class="mb-0 fw-semibold">Female</h6>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-warning-transparent rounded-pill">Diabetes</span>
                                                            </td>
                                                            <td class="fw-semibold text-center fs-13">
                                                                11 Dec 2021
                                                            </td>
                                                            <td class="text-end pe-5">
                                                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-default text-dark fw-semibold">Cancel</a>
                                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary fw-semibold">Re-schedule</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title mb-0">Country Wise Donors</h3>
                                            <button type="button" class="btn btn-sm bg-primary-transparent fw-bold">
                                                View all
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div id="echart1" class="chartsh chart-dropshadow"></div>
                                            <div class="row mt-2">
                                                <div class="col text-center mt-4">
                                                    <p class="mb-1 fw-semibold text-muted-dark">Total Organ Donors</p>
                                                    <h5 class="mb-0 fw-semibold">63,254</h5>
                                                </div>
                                                <div class="col text-center mt-4">
                                                    <p class="mb-1 fw-semibold text-muted-dark">Males
                                                    </p>
                                                    <h5 class="mb-0 fw-semibold">32,548</h5>
                                                </div>
                                                <div class="col text-center mt-4">
                                                    <p class="mb-1 fw-semibold text-muted-dark">Females
                                                    </p>
                                                    <h5 class="mb-0 fw-semibold">30,706</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- APEXCHART JS -->
        <script src="{{asset('build/assets/plugins/apexcharts/apexcharts.min.js')}}"></script>

        <!-- ECHARTS JS -->
        <script src="{{asset('build/assets/plugins/echarts/echarts.js')}}"></script>

        <!-- INDEX JS -->
        @vite('resources/assets/js/index4.js')


@endsection