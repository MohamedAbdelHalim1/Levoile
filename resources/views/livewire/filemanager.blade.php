@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Components</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Filemanger</li>
                                    <li class="breadcrumb-item active" aria-current="page">Filemanger</li>
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
                                <div class="col-lg-4 col-xl-3">
                                    <div class="card mb-4">
                                        <div class="card-header border-bottom">
                                            <a class="btn btn-outline-primary br-7 btn-block py-1" id="btnCompose"
                                                data-bs-target="#Vertically" data-bs-toggle="modal" href="javascript:void(0);"><i
                                                    class="fa fa-plus me-2"></i>Upload Files</a>
                                        </div>
                                        <div class="card-body">
                                            <ul class="nav1 nav-column flex-column br-7">
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                        <span class="me-2"><i class="ri-image-2-line align-middle"></i></span>
                                                        <span>Images</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                        <span class="me-2"><i class="ri-music-2-line align-middle"></i></span>
                                                        <span>Music</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                    <span class="me-2"><i class="ri-vidicon-line align-middle"></i></span>
                                                        <span>Videos</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                        <span class="me-2"><i class="ri-smartphone-line align-middle"></i></span>
                                                        <span>APKS</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                        <span class="me-2"><i class="ri-download-cloud-line align-middle"></i></span>
                                                        <span>Downloads</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                        <span class="me-2"><i class="ri-heart-3-line align-middle"></i></span>
                                                        <span>Favourites</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                        <span class="me-2"><i class="ri-eye-line align-middle"></i></span>
                                                        <span>Hidden Files</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                        <span class="me-2"><i class="ri-send-plane-2-line align-middle"></i></span>
                                                        <span>Transfer files</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                        <span class="me-2"><i class="ri-drive-line align-middle"></i></span>
                                                        <span>Google Drive</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                        <span class="me-2"><i class="ri-computer-line align-middle"></i></span>
                                                        <span>FTP</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                        <span class="me-2"><i class="ri-lock-password-line align-middle"></i></span>
                                                        <span>Private Files</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                        <span class="me-2"><i class="ri-shield-check-line align-middle"></i></span>
                                                        <span>Deep Clean</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                        <span class="me-2"><i class="ri-delete-bin-3-line align-middle"></i></span>
                                                        <span>Trash Bin</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                        <span class="me-2"><i class="ri-windows-line align-middle"></i></span>
                                                        <span>More</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="card my-1 custom-card mt-0 p-2 pb-0 mb-0 shadow-none">
                                                <div class="card-header font-weight-bold px-3 pb-2 border-bottom-0">
                                                    <span class="me-2"><i class="ri-folder-5-line align-middle"></i></span>
                                                    <span>Storage</span>
                                                </div>
                                                <div class="card-body pt-0 pb-0 px-3">
                                                    <div class="storage-percent">
                                                        <div class="progress fileprogress h-auto ps-0 mb-2">
                                                            <div class="progress-bar progress-bar-xs wd-15p"
                                                                role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                        <div class="text-muted font-weight-semibold tx-13 mb-1">26.24 GB
                                                            Used of
                                                            128GB</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body br-7 upgrade-storage bg-primary-transparent">
                                            <a href="javascript:void(0)">
                                                <div class="upgrade-main text-center">
                                                    <svg class="mb-1" xmlns="http://www.w3.org/2000/svg"
                                                        style="width: 3rem;" data-name="Layer 1" viewBox="0 0 24 24">
                                                        <path fill="#67a719"
                                                            d="M19.97586,10V9a3,3,0,0,0-3-3H10.69678l-.31622-.94868A3,3,0,0,0,7.53451,3H3.97586a3,3,0,0,0-3,3V19a2,2,0,0,0,2,2H3.3067a2,2,0,0,0,1.96774-1.64223l1.40283-7.71554A2,2,0,0,1,8.645,10Z" />
                                                        <path fill="#a3ca75"
                                                            d="M22.02386,10H8.645a2,2,0,0,0-1.96777,1.64221L5.27441,19.35773A2,2,0,0,1,3.3067,21H19.55292a2,2,0,0,0,1.96771-1.64227l1.48712-8.17884A1,1,0,0,0,22.02386,10Z" />
                                                    </svg>
                                                    <h4 class="mb-1">Upgrade Storage</h4>
                                                    <span class="text-primary-lit mt-1">Extra 10GB Storage and
                                                        More...</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-xl-9">

                                    <div class="row mb-3">
                                        <div class="input-group ms-auto mb-2">
                                            <input type="text" class="form-control br-7"
                                                placeholder="Search in file manager.....">
                                            <button class="btn btn-primary border-0 text-white"
                                                type="button">Search</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">My Folder</h6>
                                                    <span class="text-muted fs-11">35.7gb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">Images</h6>
                                                    <span class="text-muted fs-11">1.23gb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">Recieved</h6>
                                                    <span class="text-muted fs-11">3.13gb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">Downloads</h6>
                                                    <span class="text-muted fs-11">453kb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">Downloads</h6>
                                                    <span class="text-muted fs-11">453kb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">Downloads</h6>
                                                    <span class="text-muted fs-11">453kb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">Downloads</h6>
                                                    <span class="text-muted fs-11">453kb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">Downloads</h6>
                                                    <span class="text-muted fs-11">453kb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">videos</h6>
                                                    <span class="text-muted fs-11">4.23gb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">Images</h6>
                                                    <span class="text-muted fs-11">1.23gb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">Recieved</h6>
                                                    <span class="text-muted fs-11">3.13gb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">Downloads</h6>
                                                    <span class="text-muted fs-11">453kb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">videos</h6>
                                                    <span class="text-muted fs-11">4.23gb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">Images</h6>
                                                    <span class="text-muted fs-11">1.23gb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">Recieved</h6>
                                                    <span class="text-muted fs-11">3.13gb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">Downloads</h6>
                                                    <span class="text-muted fs-11">453kb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">Downloads</h6>
                                                    <span class="text-muted fs-11">453kb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">Downloads</h6>
                                                    <span class="text-muted fs-11">453kb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">videos</h6>
                                                    <span class="text-muted fs-11">4.23gb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/4.png')}}" alt="img"
                                                                class="br-7">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">Images</h6>
                                                    <span class="text-muted fs-11">1.23gb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/1.png')}}" alt="img"
                                                                class="br-7 img-link">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">document.pdf</h6>
                                                    <span class="text-muted fs-11">23kb</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots text-dark" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fe fe-more-vertical text-dark"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-start folder-options">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i>
                                                                Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-share me-2"></i>
                                                                Share</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-download me-2"></i> Download</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-info me-3"></i>
                                                                Info</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-trash me-2"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/1.png')}}" alt="img"
                                                                class="br-7 img-link">
                                                        </a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">document.pdf</h6>
                                                    <span class="text-muted fs-11">23kb</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- MODAL -->
                            <div class="modal fade" id="Vertically">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Add file</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-2">
                                                <input type="file" class="dropify" data-height="200" >
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple br-7 btn-primary" type="button">Add</button>
                                            <button class="btn ripple br-7 btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END MODAL -->

@endsection

@section('scripts')

        <!-- INTERNAL FILEUPLOADS JS -->
        <script src="{{asset('build/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
        <script src="{{asset('build/assets/plugins/fileuploads/js/file-upload.js')}}"></script>


@endsection