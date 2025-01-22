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
                                    <li class="breadcrumb-item active" aria-current="page">Filemanger List</li>
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
                                            <a class="btn btn-outline-primary btn-block py-2" id="btnCompose" data-bs-target="#Vertically" data-bs-toggle="modal" href="javascript:void(0);"><i class="fa fa-plus me-2"></i>Upload Files</a>
                                        </div>
                                        <div class="card-body">
                                            <ul class="nav1 nav-column flex-column br-7">
                                                <li class="nav-item1 mt-0">
                                                    <a class="nav-link thumb active" href="javascript:void(0);">
                                                    <span class="me-2"><i class="ri-time-line align-middle"></i></span>
                                                        <span>Recent</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                        <span class="me-2"><i class="ri-heart-line align-middle"></i></span>
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
                                                        <span class="me-2"><i class="ri-tv-2-line align-middle"></i></span>
                                                        <span>FTP</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                        <span class="me-2"><i class="ri-lock-line align-middle"></i></span>
                                                        <span>Private FIles</span>
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
                                                        <span class="me-2"><i class="ri-delete-bin-5-line align-middle"></i></span>
                                                        <span>Trash Bin</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item1">
                                                    <a class="nav-link thumb" href="javascript:void(0);">
                                                    <span class="me-2"><i class="ri-microsoft-line align-middle"></i></span>
                                                        <span>More</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="card custom-card mt-2 p-2 pb-0 mb-0 shadow-none storage-card">
                                                <div class="card-header px-3 pb-2 border-bottom-0">
                                                    <span class="me-2"><i class="ri-stack-line align-middle"></i></span>
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
                                                        <path fill="#467fcf"
                                                            d="M19.97586,10V9a3,3,0,0,0-3-3H10.69678l-.31622-.94868A3,3,0,0,0,7.53451,3H3.97586a3,3,0,0,0-3,3V19a2,2,0,0,0,2,2H3.3067a2,2,0,0,0,1.96774-1.64223l1.40283-7.71554A2,2,0,0,1,8.645,10Z" />
                                                        <path fill="#6d99d6"
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
                                    <div class="row mb-2">
                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                            <div class="tx-18 mb-0 mt-2">
                                                Files
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12 col-auto">
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control"
                                                    placeholder="Search in file manager.....">
                                                <button class="btn ripple btn-primary input-group-text text-white border-0"
                                                    type="button">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-6 col-sm-12">
                                            <div class="card">
                                                <a href="{{url('filemanager-details')}}">
                                                    <div class="card-body">
                                                        <div class="file-type my-1">
                                                            <svg class="file-manager-icon w-icn me-2"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                                                <path fill="#c8e4a6"
                                                                    d="M13.5,9C12.67157,9,12,8.32843,12,7.5S12.67157,6,13.5,6S15,6.67157,15,7.5C14.9991,8.32805,14.32805,8.9991,13.5,9z" />
                                                                <path fill="#add679"
                                                                    d="M19,2H5C3.34515,2.00483,2.00483,3.34515,2,5v8.86l3.88-3.88c1.18747-1.13,3.05253-1.13,4.24,0l2.87139,2.887l0.88752-0.88751c1.17344-1.16662,3.06874-1.16662,4.24218,0L22,15.8584V5C21.99517,3.34515,20.65485,2.00483,19,2z M13.5,9C12.67157,9,12,8.32843,12,7.5S12.67157,6,13.5,6S15,6.67157,15,7.5C14.9991,8.32805,14.32805,8.9991,13.5,9z" />
                                                                <path fill="#77bc21"
                                                                    d="M10.12,9.98c-1.18747-1.13-3.05253-1.13-4.24,0L2,13.86V19c0.00484,1.65484,1.34516,2.99516,3,3h14c0.81512-0.00034,1.59497-0.3325,2.16-0.92L10.12,9.98z" />
                                                                <path fill="#c8e4a6"
                                                                    d="M22,15.8584l-3.87891-3.87891c-1.17345-1.1666-3.06873-1.1666-4.24218,0L12.99139,12.867l8.16425,8.20856C21.69776,20.5208,22.00089,19.77567,22,19V15.8584z" />
                                                            </svg>
                                                            Image
                                                            <div class="float-end tx-13 text-muted">14.2 mb</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-sm-12">
                                            <div class="card">
                                                <a href="{{url('filemanager-details')}}">
                                                    <div class="card-body">
                                                        <div class="file-type my-1">
                                                            <svg class="file-manager-icon w-icn me-2"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                                                <path fill="#f2c8db"
                                                                    d="M14,18H5c-1.65611-0.00181-2.99819-1.34389-3-3V9c0.00181-1.65611,1.34389-2.99819,3-3h9c1.65611,0.00181,2.99819,1.34389,3,3v6C16.99819,16.65611,15.65611,17.99819,14,18z" />
                                                                <path fill="#eaa4c4"
                                                                    d="M21.89465,7.55359c-0.24683-0.49432-0.8476-0.69495-1.34192-0.44812l-3.56421,1.7821C16.98999,8.92572,16.99994,8.96149,17,9v6c-0.00006,0.03851-0.01001,0.07428-0.01147,0.11243l3.56421,1.7821C20.69165,16.96381,20.84479,16.99994,21,17c0.55212-0.00037,0.99969-0.44788,1-1V8C21.99994,7.84503,21.96387,7.6922,21.89465,7.55359z" />
                                                            </svg>
                                                            Video
                                                            <div class="float-end tx-13 text-muted">212 mb</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-sm-12">
                                            <div class="card">
                                                <a href="{{url('filemanager-details')}}">
                                                    <div class="card-body">
                                                        <div class="file-type my-1">
                                                            <svg class="file-manager-icon w-icn me-2"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="#b6dfff"
                                                                    d="M20,8.99969l-7-7H7a3,3,0,0,0-3,3v14a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3Z" />
                                                                <path fill="#86cbff"
                                                                    d="M20 8.99969H15a2 2 0 0 1-2-2v-5zM19 22a.99974.99974 0 0 1-1-1V19a1 1 0 0 1 2 0v2A.99974.99974 0 0 1 19 22zM19 17a1.03391 1.03391 0 0 1-.71-.29.99108.99108 0 0 1-.21045-1.08984A1.14883 1.14883 0 0 1 18.29 15.29a1.02673 1.02673 0 0 1 .32959-.21.91433.91433 0 0 1 .76025 0 1.03418 1.03418 0 0 1 .33008.21 1.15772 1.15772 0 0 1 .21.33008A.98919.98919 0 0 1 19.71 16.71a1.15384 1.15384 0 0 1-.33008.21A.9994.9994 0 0 1 19 17zM15 18H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM15 14H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM10 10H9A1 1 0 0 1 9 8h1a1 1 0 0 1 0 2z" />
                                                            </svg>
                                                            Docs
                                                            <div class="float-end tx-13 text-muted">34 mb</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-sm-12">
                                            <div class="card">
                                                <a href="{{url('filemanager-details')}}">
                                                    <div class="card-body">
                                                        <div class="file-type my-1">
                                                            <svg class="file-manager-icon w-icn me-2"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="#efc956"
                                                                    d="M21.65137,2.24121a1.00561,1.00561,0,0,0-.80323-.22949l-13,2A1.00054,1.00054,0,0,0,7,5V15.35107A3.45946,3.45946,0,0,0,5.5,15,3.5,3.5,0,1,0,9,18.5V10.85779L20,9.16553v4.18554A3.45946,3.45946,0,0,0,18.5,13,3.5,3.5,0,1,0,22,16.5V3A.99909.99909,0,0,0,21.65137,2.24121Z" />
                                                            </svg>
                                                            Music
                                                            <div class="float-end tx-13 text-muted">1.5 gb</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-sm-12">
                                            <div class="card">
                                                <a href="{{url('filemanager-details')}}">
                                                    <div class="card-body">
                                                        <div class="file-type my-1">
                                                            <svg class="file-manager-icon w-icn me-2"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                                                                <path fill="#fdc79a"
                                                                    d="M16,10H8c-2.20917,0-4-1.79083-4-4v6c0.0022,2.20825,1.79175,3.9978,4,4h8c2.20825-0.0022,3.9978-1.79175,4-4V6C20,8.20917,18.20917,10,16,10z" />
                                                                <path fill="#fdab67"
                                                                    d="M16,16H8c-2.20825-0.0022-3.9978-1.79175-4-4v6c0.0022,2.20825,1.79175,3.9978,4,4h8c2.20825-0.0022,3.9978-1.79175,4-4v-6C19.9978,14.20825,18.20825,15.9978,16,16z" />
                                                                <polygon fill="#fdc79a" points="20 5.998 20 6 20 5.999" />
                                                                <path fill="#fdab67"
                                                                    d="M16,10H8c-2.20914,0-4-1.79086-4-4s1.79086-4,4-4h8c2.20914,0,4,1.79086,4,4S18.20914,10,16,10z" />
                                                                <circle cx="8" cy="13" r="1" fill="#fc7303" />
                                                                <circle cx="8" cy="19" r="1" fill="#fc7303" />
                                                            </svg>
                                                            APK
                                                            <div class="float-end tx-13 text-muted">550 mb</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-sm-12">
                                            <div class="card">
                                                <a href="{{url('filemanager-details')}}">
                                                    <div class="card-body">
                                                        <div class="file-type my-1">
                                                            <svg class="file-manager-icon w-icn me-2"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="#a6b2ed"
                                                                    d="M20,9,13,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3Z" />
                                                                <path fill="#6b80e2"
                                                                    d="M20 9H15a2 2 0 0 1-2-2V2zM12 18.00031a.99943.99943 0 0 1-1-1v-5a1 1 0 1 1 2 0v5A.99943.99943 0 0 1 12 18.00031z" />
                                                                <path fill="#6b80e2"
                                                                    d="M12,18.00031a.99676.99676,0,0,1-.707-.293l-2-2A.99989.99989,0,1,1,10.707,14.29328L12,15.58625l1.293-1.293A.99989.99989,0,1,1,14.707,15.70734l-2,2A.99676.99676,0,0,1,12,18.00031Z" />
                                                            </svg>
                                                            Downloads
                                                            <div class="float-end tx-13 text-muted">10.8 mb</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-sm-12">
                                            <div class="card">
                                                <a href="{{url('filemanager-details')}}">
                                                    <div class="card-body">
                                                        <div class="file-type my-1">
                                                            <svg class="file-manager-icon w-icn me-2"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <path fill="#fdb172"
                                                                    d="M12.00011,22h-9a.99991.99991,0,0,1-.707-1.707L4.257,18.3291A10.00061,10.00061,0,1,1,12.00011,22Z" />
                                                                <path fill="#fd7e14"
                                                                    d="M12,16.24219a.99676.99676,0,0,1-.707-.293L8.46484,13.12109a3.00244,3.00244,0,0,1,0-4.24218A3.06772,3.06772,0,0,1,12,8.35254a3.0699,3.0699,0,0,1,3.53613.52637,3.00332,3.00332,0,0,1-.001,4.24218L12.707,15.94922A.99676.99676,0,0,1,12,16.24219Z" />
                                                            </svg>
                                                            Chat
                                                            <div class="float-end tx-13 text-muted">1.5 Gb</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-sm-12">
                                            <div class="card">
                                                <a href="javascript:void(0);">
                                                    <div class="card-body">
                                                        <div class="file-type my-1">
                                                            <svg class="file-manager-icon w-icn me-2"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                <rect width="9" height="9" x="2" y="2" fill="#e6647f"
                                                                    rx="1" />
                                                                <rect width="9" height="9" x="2" y="13" fill="#f0a2b2"
                                                                    rx="1" />
                                                                <rect width="9" height="9" x="13" y="2" fill="#f0a2b2"
                                                                    rx="1" />
                                                                <rect width="9" height="9" x="13" y="13" fill="#f0a2b2"
                                                                    rx="1" />
                                                            </svg>
                                                            More
                                                            <div class="float-end tx-13 text-muted">16 Gb</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12 ">
                                            <div class="card">
                                                <div class="card-header border-bottom">
                                                    <p class="mb-0">Recent Files</p>
                                                </div>
                                                <div class="card-body ">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table  border text-nowrap text-md-nowrap recent-files-container">
                                                            <thead>
                                                                <tr class="row-first">
                                                                    <th class="fw-semibold text-dark">File Name</th>
                                                                    <th class="fw-semibold text-dark">Date Modified</th>
                                                                    <th class="fw-semibold text-dark">Type</th>
                                                                    <th class="fw-semibold text-dark">Size</th>
                                                                    <th class="fw-semibold text-dark"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="tabel-border text-dark">
                                                                <tr>
                                                                    <td>
                                                                        <div class="recent-files">
                                                                            <svg class="file-manager-icon w-icn me-2"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="#b6dfff"
                                                                                    d="M20,8.99969l-7-7H7a3,3,0,0,0-3,3v14a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3Z" />
                                                                                <path fill="#86cbff"
                                                                                    d="M20 8.99969H15a2 2 0 0 1-2-2v-5zM19 22a.99974.99974 0 0 1-1-1V19a1 1 0 0 1 2 0v2A.99974.99974 0 0 1 19 22zM19 17a1.03391 1.03391 0 0 1-.71-.29.99108.99108 0 0 1-.21045-1.08984A1.14883 1.14883 0 0 1 18.29 15.29a1.02673 1.02673 0 0 1 .32959-.21.91433.91433 0 0 1 .76025 0 1.03418 1.03418 0 0 1 .33008.21 1.15772 1.15772 0 0 1 .21.33008A.98919.98919 0 0 1 19.71 16.71a1.15384 1.15384 0 0 1-.33008.21A.9994.9994 0 0 1 19 17zM15 18H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM15 14H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM10 10H9A1 1 0 0 1 9 8h1a1 1 0 0 1 0 2z" />
                                                                            </svg>
                                                                            <span class="mb-1 font-weight-semibold">noa
                                                                                documentation</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted modified-date">07/10/21,
                                                                            03:30</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>doc</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted file-size">15kb</span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="float-end ms-auto">
                                                                            <a href="javascript:void(0);" class="option-dots text-dark"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"><i
                                                                                    class="fe fe-more-vertical text-dark"></i></a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-start recent-files-options">
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-edit me-2"></i>
                                                                                    Edit</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-share me-2"></i>
                                                                                    Share</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-download me-2"></i>
                                                                                    Download</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-info me-2"></i>
                                                                                    Info</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-trash me-2"></i>
                                                                                    Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="recent-files">
                                                                            <svg class="file-manager-icon w-icn me-2"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                enable-background="new 0 0 24 24"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="#f2c8db"
                                                                                    d="M14,18H5c-1.65611-0.00181-2.99819-1.34389-3-3V9c0.00181-1.65611,1.34389-2.99819,3-3h9c1.65611,0.00181,2.99819,1.34389,3,3v6C16.99819,16.65611,15.65611,17.99819,14,18z" />
                                                                                <path fill="#eaa4c4"
                                                                                    d="M21.89465,7.55359c-0.24683-0.49432-0.8476-0.69495-1.34192-0.44812l-3.56421,1.7821C16.98999,8.92572,16.99994,8.96149,17,9v6c-0.00006,0.03851-0.01001,0.07428-0.01147,0.11243l3.56421,1.7821C20.69165,16.96381,20.84479,16.99994,21,17c0.55212-0.00037,0.99969-0.44788,1-1V8C21.99994,7.84503,21.96387,7.6922,21.89465,7.55359z" />
                                                                            </svg>
                                                                            <span class="mb-1 font-weight-semibold">sample
                                                                                video</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted modified-date">07/10/21,
                                                                            03:30</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>mp4</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class=" text-muted file-size">30mb</span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="float-end ms-auto">
                                                                            <a href="javascript:void(0);" class="option-dots text-dark"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"><i
                                                                                    class="fe fe-more-vertical text-dark"></i></a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-start recent-files-options">
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-edit me-2"></i>
                                                                                    Edit</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-share me-2"></i>
                                                                                    Share</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-download me-2"></i>
                                                                                    Download</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-info me-2"></i>
                                                                                    Info</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-trash me-2"></i>
                                                                                    Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="recent-files">
                                                                            <svg class="file-manager-icon w-icn me-2"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                enable-background="new 0 0 24 24"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="#c8e4a6"
                                                                                    d="M13.5,9C12.67157,9,12,8.32843,12,7.5S12.67157,6,13.5,6S15,6.67157,15,7.5C14.9991,8.32805,14.32805,8.9991,13.5,9z" />
                                                                                <path fill="#add679"
                                                                                    d="M19,2H5C3.34515,2.00483,2.00483,3.34515,2,5v8.86l3.88-3.88c1.18747-1.13,3.05253-1.13,4.24,0l2.87139,2.887l0.88752-0.88751c1.17344-1.16662,3.06874-1.16662,4.24218,0L22,15.8584V5C21.99517,3.34515,20.65485,2.00483,19,2z M13.5,9C12.67157,9,12,8.32843,12,7.5S12.67157,6,13.5,6S15,6.67157,15,7.5C14.9991,8.32805,14.32805,8.9991,13.5,9z" />
                                                                                <path fill="#77bc21"
                                                                                    d="M10.12,9.98c-1.18747-1.13-3.05253-1.13-4.24,0L2,13.86V19c0.00484,1.65484,1.34516,2.99516,3,3h14c0.81512-0.00034,1.59497-0.3325,2.16-0.92L10.12,9.98z" />
                                                                                <path fill="#c8e4a6"
                                                                                    d="M22,15.8584l-3.87891-3.87891c-1.17345-1.1666-3.06873-1.1666-4.24218,0L12.99139,12.867l8.16425,8.20856C21.69776,20.5208,22.00089,19.77567,22,19V15.8584z" />
                                                                            </svg>
                                                                            <span class="mb-1 font-weight-semibold">sample
                                                                                image</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted modified-date">07/10/21,
                                                                            03:30</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>jpeg</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class=" text-muted file-size">15kb</span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="float-end ms-auto">
                                                                            <a href="javascript:void(0);" class="option-dots text-dark"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"><i
                                                                                    class="fe fe-more-vertical text-dark"></i></a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-start recent-files-options">
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-edit me-2"></i>
                                                                                    Edit</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-share me-2"></i>
                                                                                    Share</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-download me-2"></i>
                                                                                    Download</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-info me-2"></i>
                                                                                    Info</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-trash me-2"></i>
                                                                                    Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="recent-files">
                                                                            <svg class="file-manager-icon w-icn me-2"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="#b6dfff"
                                                                                    d="M20,8.99969l-7-7H7a3,3,0,0,0-3,3v14a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3Z" />
                                                                                <path fill="#86cbff"
                                                                                    d="M20 8.99969H15a2 2 0 0 1-2-2v-5zM19 22a.99974.99974 0 0 1-1-1V19a1 1 0 0 1 2 0v2A.99974.99974 0 0 1 19 22zM19 17a1.03391 1.03391 0 0 1-.71-.29.99108.99108 0 0 1-.21045-1.08984A1.14883 1.14883 0 0 1 18.29 15.29a1.02673 1.02673 0 0 1 .32959-.21.91433.91433 0 0 1 .76025 0 1.03418 1.03418 0 0 1 .33008.21 1.15772 1.15772 0 0 1 .21.33008A.98919.98919 0 0 1 19.71 16.71a1.15384 1.15384 0 0 1-.33008.21A.9994.9994 0 0 1 19 17zM15 18H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM15 14H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM10 10H9A1 1 0 0 1 9 8h1a1 1 0 0 1 0 2z" />
                                                                            </svg>
                                                                            <span class="mb-1 font-weight-semibold">word
                                                                                document</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted modified-date">07/10/21,
                                                                            03:30</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>doc</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class=" text-muted file-size">15kb</span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="float-end ms-auto">
                                                                            <a href="javascript:void(0);" class="option-dots text-dark"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"><i
                                                                                    class="fe fe-more-vertical text-dark"></i></a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-start recent-files-options">
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-edit me-2"></i>
                                                                                    Edit</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-share me-2"></i>
                                                                                    Share</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-download me-2"></i>
                                                                                    Download</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-info me-2"></i>
                                                                                    Info</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-trash me-2"></i>
                                                                                    Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="recent-files">
                                                                            <svg class="file-manager-icon w-icn me-2"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="#efc956"
                                                                                    d="M21.65137,2.24121a1.00561,1.00561,0,0,0-.80323-.22949l-13,2A1.00054,1.00054,0,0,0,7,5V15.35107A3.45946,3.45946,0,0,0,5.5,15,3.5,3.5,0,1,0,9,18.5V10.85779L20,9.16553v4.18554A3.45946,3.45946,0,0,0,18.5,13,3.5,3.5,0,1,0,22,16.5V3A.99909.99909,0,0,0,21.65137,2.24121Z" />
                                                                            </svg>
                                                                            <span class="mb-1 font-weight-semibold">sample
                                                                                audio</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted modified-date">07/10/21,
                                                                            03:30</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>mp3</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class=" text-muted file-size">5.3mb</span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="float-end ms-auto">
                                                                            <a href="javascript:void(0);" class="option-dots text-dark"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"><i
                                                                                    class="fe fe-more-vertical text-dark"></i></a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-start recent-files-options">
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-edit me-2"></i>
                                                                                    Edit</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-share me-2"></i>
                                                                                    Share</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-download me-2"></i>
                                                                                    Download</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-info me-2"></i>
                                                                                    Info</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-trash me-2"></i>
                                                                                    Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="recent-files">
                                                                            <svg class="file-manager-icon w-icn me-2"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                enable-background="new 0 0 24 24"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="#f2c8db"
                                                                                    d="M14,18H5c-1.65611-0.00181-2.99819-1.34389-3-3V9c0.00181-1.65611,1.34389-2.99819,3-3h9c1.65611,0.00181,2.99819,1.34389,3,3v6C16.99819,16.65611,15.65611,17.99819,14,18z" />
                                                                                <path fill="#eaa4c4"
                                                                                    d="M21.89465,7.55359c-0.24683-0.49432-0.8476-0.69495-1.34192-0.44812l-3.56421,1.7821C16.98999,8.92572,16.99994,8.96149,17,9v6c-0.00006,0.03851-0.01001,0.07428-0.01147,0.11243l3.56421,1.7821C20.69165,16.96381,20.84479,16.99994,21,17c0.55212-0.00037,0.99969-0.44788,1-1V8C21.99994,7.84503,21.96387,7.6922,21.89465,7.55359z" />
                                                                            </svg>
                                                                            <span class="mb-1 font-weight-semibold">sample
                                                                                video</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted modified-date">07/10/21,
                                                                            03:30</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>mp4</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class=" text-muted file-size">30mb</span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="float-end ms-auto">
                                                                            <a href="javascript:void(0);" class="option-dots text-dark"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"><i
                                                                                    class="fe fe-more-vertical text-dark"></i></a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-start recent-files-options">
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-edit me-2"></i>
                                                                                    Edit</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-share me-2"></i>
                                                                                    Share</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-download me-2"></i>
                                                                                    Download</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-info me-2"></i>
                                                                                    Info</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-trash me-2"></i>
                                                                                    Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="row-last">
                                                                    <td>
                                                                        <div class="recent-files">
                                                                            <svg class="file-manager-icon w-icn me-2"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                enable-background="new 0 0 24 24"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="#c8e4a6"
                                                                                    d="M13.5,9C12.67157,9,12,8.32843,12,7.5S12.67157,6,13.5,6S15,6.67157,15,7.5C14.9991,8.32805,14.32805,8.9991,13.5,9z" />
                                                                                <path fill="#add679"
                                                                                    d="M19,2H5C3.34515,2.00483,2.00483,3.34515,2,5v8.86l3.88-3.88c1.18747-1.13,3.05253-1.13,4.24,0l2.87139,2.887l0.88752-0.88751c1.17344-1.16662,3.06874-1.16662,4.24218,0L22,15.8584V5C21.99517,3.34515,20.65485,2.00483,19,2z M13.5,9C12.67157,9,12,8.32843,12,7.5S12.67157,6,13.5,6S15,6.67157,15,7.5C14.9991,8.32805,14.32805,8.9991,13.5,9z" />
                                                                                <path fill="#77bc21"
                                                                                    d="M10.12,9.98c-1.18747-1.13-3.05253-1.13-4.24,0L2,13.86V19c0.00484,1.65484,1.34516,2.99516,3,3h14c0.81512-0.00034,1.59497-0.3325,2.16-0.92L10.12,9.98z" />
                                                                                <path fill="#c8e4a6"
                                                                                    d="M22,15.8584l-3.87891-3.87891c-1.17345-1.1666-3.06873-1.1666-4.24218,0L12.99139,12.867l8.16425,8.20856C21.69776,20.5208,22.00089,19.77567,22,19V15.8584z" />
                                                                            </svg>
                                                                            <span class="mb-1 font-weight-semibold">sample
                                                                                image</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted modified-date">07/10/21,
                                                                            03:30</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>jpeg</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class=" text-muted file-size">15kb</span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="float-end ms-auto">
                                                                            <a href="javascript:void(0);" class="option-dots text-dark"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"><i
                                                                                    class="fe fe-more-vertical text-dark"></i></a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-start recent-files-options">
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-edit me-2"></i>
                                                                                    Edit</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-share me-2"></i>
                                                                                    Share</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-download me-2"></i>
                                                                                    Download</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-info me-2"></i>
                                                                                    Info</a>
                                                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                        class="fe fe-trash me-2"></i>
                                                                                    Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
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
                                            <button class="btn ripple btn-primary" type="button">Add</button>
                                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
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