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
                                    <li class="breadcrumb-item active" aria-current="page">File Attachments</li>
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
                            <div class="row sidemenu-height">
                                <div class="col-lg-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">File Attachments</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tags">
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-primary"><i
                                                            class="mdi mdi-file-image  me-1"></i>Image01..._jpg</button>
                                                    <button type="button" class="btn btn-primary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-secondary"><i
                                                            class="mdi mdi-music  me-1"></i>music-mp3</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-info"><i
                                                            class="mdi mdi-file-video  me-1"></i>video0014...-mp4</button>
                                                    <button type="button" class="btn btn-info"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-warning"><i
                                                            class="mdi mdi-file-excel  me-1"></i>Document.exl</button>
                                                    <button type="button" class="btn btn-warning"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-success"><i
                                                            class="mdi mdi-file-pdf  me-1"></i>AMN0012.pdf</button>
                                                    <button type="button" class="btn btn-success"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-danger"><i
                                                            class="mdi mdi-zip-box  me-1"></i>design00123.zip</button>
                                                    <button type="button" class="btn btn-danger"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-orange"><i
                                                            class="mdi mdi-file-powerpoint   me-1"></i>prsentation.ppt</button>
                                                    <button type="button" class="btn btn-orange"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-cyan"><i
                                                            class="mdi mdi-volume-high  me-1"></i>audio-mp4</button>
                                                    <button type="button" class="btn btn-cyan"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Rounded File Attachments</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tags">
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-primary"><i
                                                            class="mdi mdi-file-image  me-1"></i>Image01..._jpg</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-primary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-secondary"><i
                                                            class="mdi mdi-music  me-1"></i>music-mp3</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-secondary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-pill attachment-pill btn-info"><i
                                                            class="mdi mdi-file-video  me-1"></i>video0014...-mp4</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-info"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-warning"><i
                                                            class="mdi mdi-file-excel  me-1"></i>Document.exl</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-warning"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-success"><i
                                                            class="mdi mdi-file-pdf  me-1"></i>AMN0012.pdf</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-success"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-pill attachment-pill btn-danger"><i
                                                            class="mdi mdi-zip-box  me-1"></i>design00123.zip</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-danger"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-pill attachment-pill btn-orange"><i
                                                            class="mdi mdi-file-powerpoint   me-1"></i>prsentation.ppt</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-orange"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-pill attachment-pill btn-cyan"><i
                                                            class="mdi mdi-volume-high  me-1"></i>audio-mp4</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-cyan"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Outline File Attachments</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tags">
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-outline-primary"><i
                                                            class="mdi mdi-file-image  me-1"></i>Image01..._jpg</button>
                                                    <button type="button"
                                                        class="btn btn-outline-primary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-outline-secondary"><i
                                                            class="mdi mdi-music  me-1"></i>music-mp3</button>
                                                    <button type="button"
                                                        class="btn btn-outline-secondary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-outline-info"><i
                                                            class="mdi mdi-file-video  me-1"></i>video0014...-mp4</button>
                                                    <button type="button" class="btn btn-outline-info"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-outline-warning"><i
                                                            class="mdi mdi-file-excel  me-1"></i>Document.exl</button>
                                                    <button type="button"
                                                        class="btn btn-outline-warning"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-outline-success"><i
                                                            class="mdi mdi-file-pdf  me-1"></i>AMN0012.pdf</button>
                                                    <button type="button"
                                                        class="btn btn-outline-success"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-outline-danger"><i
                                                            class="mdi mdi-zip-box  me-1"></i>design00123.zip</button>
                                                    <button type="button"
                                                        class="btn btn-outline-danger"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-outline-orange"><i
                                                            class="mdi mdi-file-powerpoint   me-1"></i>prsentation.ppt</button>
                                                    <button type="button"
                                                        class="btn btn-outline-orange"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-outline-cyan"><i
                                                            class="mdi mdi-volume-high  me-1"></i>audio-mp4</button>
                                                    <button type="button" class="btn btn-outline-cyan"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Rounded Outline File Attachments</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tags">
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-outline-primary"><i
                                                            class="mdi mdi-file-image  me-1"></i>Image01..._jpg</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-outline-primary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-outline-secondary"><i
                                                            class="mdi mdi-music  me-1"></i>music-mp3</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-outline-secondary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-outline-info"><i
                                                            class="mdi mdi-file-video  me-1"></i>video0014...-mp4</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-outline-info"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-outline-warning"><i
                                                            class="mdi mdi-file-excel  me-1"></i>Document.exl</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-outline-warning"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-outline-success"><i
                                                            class="mdi mdi-file-pdf  me-1"></i>AMN0012.pdf</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-outline-success"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-outline-danger"><i
                                                            class="mdi mdi-zip-box  me-1"></i>design00123.zip</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-outline-danger"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-outline-orange"><i
                                                            class="mdi mdi-file-powerpoint   me-1"></i>prsentation.ppt</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-outline-orange"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-outline-cyan"><i
                                                            class="mdi mdi-volume-high  me-1"></i>audio-mp4</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-outline-cyan"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Light File Attachments</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tags">
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-primary-light"><i
                                                            class="mdi mdi-file-image  me-1"></i>Image01..._jpg</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-primary-light text-primary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-secondary-light"><i
                                                            class="mdi mdi-music  me-1"></i>music-mp3</button>
                                                    <button type="button"
                                                        class="btn btn-secondary-light text-secondary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-info-light"><i
                                                            class="mdi mdi-file-video  me-1"></i>video0014...-mp4</button>
                                                    <button type="button" class="btn btn-info-light text-info"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-warning-light"><i
                                                            class="mdi mdi-file-excel  me-1"></i>Document.exl</button>
                                                    <button type="button"
                                                        class="btn btn-warning-light text-warning"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-success-light"><i
                                                            class="mdi mdi-file-pdf  me-1"></i>AMN0012.pdf</button>
                                                    <button type="button"
                                                        class="btn btn-success-light text-success"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-danger-light"><i
                                                            class="mdi mdi-zip-box  me-1"></i>design00123.zip</button>
                                                    <button type="button"
                                                        class="btn btn-danger-light text-danger"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-orange-light"><i
                                                            class="mdi mdi-file-powerpoint   me-1"></i>prsentation.ppt</button>
                                                    <button type="button"
                                                        class="btn btn-orange-light text-orange"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-cyan-light"><i
                                                            class="mdi mdi-volume-high  me-1"></i>audio-mp4</button>
                                                    <button type="button" class="btn btn-cyan-light text-cyan"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Rounded Light File Attachments</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tags">
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-primary-light"><i
                                                            class="mdi mdi-file-image  me-1"></i>Image01..._jpg</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-primary-light text-primary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-secondary-light"><i
                                                            class="mdi mdi-music  me-1"></i>music-mp3</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-secondary-light text-secondary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-info-light"><i
                                                            class="mdi mdi-file-video  me-1"></i>video0014...-mp4</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-info-light text-info"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-warning-light"><i
                                                            class="mdi mdi-file-excel  me-1"></i>Document.exl</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-warning-light text-warning"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-success-light"><i
                                                            class="mdi mdi-file-pdf  me-1"></i>AMN0012.pdf</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-success-light text-success"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-danger-light"><i
                                                            class="mdi mdi-zip-box  me-1"></i>design00123.zip</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-danger-light text-danger"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-orange-light"><i
                                                            class="mdi mdi-file-powerpoint   me-1"></i>prsentation.ppt</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-orange-light text-orange"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-cyan-light"><i
                                                            class="mdi mdi-volume-high  me-1"></i>audio-mp4</button>
                                                    <button type="button"
                                                        class="btn btn-pill attachment-pill btn-cyan-light text-cyan"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">File Attachment Sizes</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tags">
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-sm btn-primary text-white"><i
                                                            class="mdi mdi-file-image  me-2"></i>Image01..._jpg</button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-primary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>

                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-secondary"><i
                                                            class="mdi mdi-file-excel  me-2"></i>Document.exl</button>
                                                    <button type="button" class="btn btn-secondary fs-20"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>

                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <button type="button" class="btn btn-lg btn-info"><i
                                                            class="mdi mdi-file-pdf  me-2"></i>AMN0012.pdf</button>
                                                    <button type="button" class="btn btn-lg btn-info fs-24"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">File Attachments With Anchor Link</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tags">
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);" class="btn btn-primary"><i
                                                            class="mdi mdi-file-image  me-1"></i>Image01..._jpg</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-primary" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);" class="btn btn-secondary"><i
                                                            class="mdi mdi-music  me-1"></i>music-mp3</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-secondary" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);" class="btn btn-info"><i
                                                            class="mdi mdi-file-video  me-1"></i>video0014...-mp4</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-info" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);" class="btn btn-warning"><i
                                                            class="mdi mdi-file-excel  me-1"></i>Document.exl</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-warning" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);" class="btn btn-success"><i
                                                            class="mdi mdi-file-pdf  me-1"></i>AMN0012.pdf</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-success" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);" class="btn btn-danger"><i
                                                            class="mdi mdi-zip-box  me-1"></i>design00123.zip</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-danger" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);" class="btn btn-orange"><i
                                                            class="mdi mdi-file-powerpoint   me-1"></i>prsentation.ppt</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-orange" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);" class="btn btn-cyan"><i
                                                            class="mdi mdi-volume-high  me-1"></i>audio-mp4</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-cyan" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Rounded File Attachments With Anchor Link</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tags">
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-primary"><i
                                                            class="mdi mdi-file-image  me-1"></i>Image01..._jpg</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-primary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-secondary"><i
                                                            class="mdi mdi-music  me-1"></i>music-mp3</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-secondary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-info"><i
                                                            class="mdi mdi-file-video  me-1"></i>video0014...-mp4</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-info"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-warning"><i
                                                            class="mdi mdi-file-excel  me-1"></i>Document.exl</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-warning"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-success"><i
                                                            class="mdi mdi-file-pdf  me-1"></i>AMN0012.pdf</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-success"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-danger"><i
                                                            class="mdi mdi-zip-box  me-1"></i>design00123.zip</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-danger"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-orange"><i
                                                            class="mdi mdi-file-powerpoint   me-1"></i>prsentation.ppt</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-orange"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-cyan"><i
                                                            class="mdi mdi-volume-high  me-1"></i>audio-mp4</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-cyan"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Outline File Attachments With Anchor Link</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tags">
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary"><i
                                                            class="mdi mdi-file-image  me-1"></i>Image01..._jpg</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-primary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-secondary"><i
                                                            class="mdi mdi-music  me-1"></i>music-mp3</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-secondary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-info"><i
                                                            class="mdi mdi-file-video  me-1"></i>video0014...-mp4</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-info"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-warning"><i
                                                            class="mdi mdi-file-excel  me-1"></i>Document.exl</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-warning"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-success"><i
                                                            class="mdi mdi-file-pdf  me-1"></i>AMN0012.pdf</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-success"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-danger"><i
                                                            class="mdi mdi-zip-box  me-1"></i>design00123.zip</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-danger"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-orange"><i
                                                            class="mdi mdi-file-powerpoint   me-1"></i>prsentation.ppt</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-orange"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-cyan"><i
                                                            class="mdi mdi-volume-high  me-1"></i>audio-mp4</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-cyan"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Rounded Outline File Attachments With Anchor Link</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tags">
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-outline-primary"><i
                                                            class="mdi mdi-file-image  me-1"></i>Image01..._jpg</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-outline-primary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-outline-secondary"><i
                                                            class="mdi mdi-music  me-1"></i>music-mp3</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-outline-secondary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-outline-info"><i
                                                            class="mdi mdi-file-video  me-1"></i>video0014...-mp4</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-outline-info"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-outline-warning"><i
                                                            class="mdi mdi-file-excel  me-1"></i>Document.exl</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-outline-warning"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-outline-success"><i
                                                            class="mdi mdi-file-pdf  me-1"></i>AMN0012.pdf</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-outline-success"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-outline-danger"><i
                                                            class="mdi mdi-zip-box  me-1"></i>design00123.zip</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-outline-danger"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-outline-orange"><i
                                                            class="mdi mdi-file-powerpoint   me-1"></i>prsentation.ppt</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-outline-orange"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-outline-cyan"><i
                                                            class="mdi mdi-volume-high  me-1"></i>audio-mp4</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-outline-cyan"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Light File Attachments With Anchor Link</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tags">
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-primary-light"><i
                                                            class="mdi mdi-file-image  me-1"></i>Image01..._jpg</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-primary-light text-primary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-secondary-light"><i
                                                            class="mdi mdi-music  me-1"></i>music-mp3</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-secondary-light text-secondary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-info-light"><i
                                                            class="mdi mdi-file-video  me-1"></i>video0014...-mp4</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-info-light text-info" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-warning-light"><i
                                                            class="mdi mdi-file-excel  me-1"></i>Document.exl</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-warning-light text-warning"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-success-light"><i
                                                            class="mdi mdi-file-pdf  me-1"></i>AMN0012.pdf</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-success-light text-success"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-danger-light"><i
                                                            class="mdi mdi-zip-box  me-1"></i>design00123.zip</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-danger-light text-danger"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-orange-light"><i
                                                            class="mdi mdi-file-powerpoint   me-1"></i>prsentation.ppt</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-orange-light text-orange"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-cyan-light"><i
                                                            class="mdi mdi-volume-high  me-1"></i>audio-mp4</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-cyan-light text-cyan" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Rounded Light File Attachments With Anchor Link</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tags">
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-primary-light"><i
                                                            class="mdi mdi-file-image  me-1"></i>Image01..._jpg</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-primary-light text-primary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-secondary-light"><i
                                                            class="mdi mdi-music  me-1"></i>music-mp3</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-secondary-light text-secondary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-info-light"><i
                                                            class="mdi mdi-file-video  me-1"></i>video0014...-mp4</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-info-light text-info"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-warning-light"><i
                                                            class="mdi mdi-file-excel  me-1"></i>Document.exl</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-warning-light text-warning"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-success-light"><i
                                                            class="mdi mdi-file-pdf  me-1"></i>AMN0012.pdf</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-success-light text-success"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-danger-light"><i
                                                            class="mdi mdi-zip-box  me-1"></i>design00123.zip</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-danger-light text-danger"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-orange-light"><i
                                                            class="mdi mdi-file-powerpoint   me-1"></i>prsentation.ppt</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-orange-light text-orange"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-cyan-light"><i
                                                            class="mdi mdi-volume-high  me-1"></i>audio-mp4</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-pill attachment-pill btn-cyan-light text-cyan"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Attachment Sizes With Anchor Link</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="tags">
                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm btn-primary text-white"><i
                                                            class="mdi mdi-file-image  me-2"></i>Image01..._jpg</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm btn-primary"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>

                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);" class="btn btn-secondary"><i
                                                            class="mdi mdi-file-excel  me-2"></i>Document.exl</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn fs-20 btn-secondary" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>

                                                <div class="btn-group tag-attachments m-2" role="group"
                                                    aria-label="Basic example">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-lg btn-info"><i
                                                            class="mdi mdi-file-pdf  me-2"></i>AMN0012.pdf</a>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-lg btn-info fs-24"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-sm-12">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Image Attachment Tags</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="h-100 attached-file-container">
                                                <div class="attached-file-image">
                                                    <a href="javascript:void(0)">
                                                        <img class="br-7 wp-100" src="{{asset('build/assets/images/media/1.jpg')}}"
                                                            alt="attached-file-image"><span
                                                            class="image-pic">123image.jpg</span>
                                                    </a>
                                                    <ul class="icons">
                                                        <li class="me-1"><button type="button"
                                                                class="btn btn-icon  btn-primary"><i
                                                                    class="fe fe-activity"></i></button></li>
                                                        <li class="me-1"><button type="button"
                                                                class="btn btn-icon  btn-primary"><i
                                                                    class="fe fe-trash"></i></button></li>
                                                        <li class="me-1"><button type="button"
                                                                class="btn btn-icon  btn-primary"><i
                                                                    class="fe fe-mail"></i></button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-sm-12">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Image Attachment Tags</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="h-100  attached-file-container">
                                                <div class="attached-file-image">
                                                    <a href="javascript:void(0)">
                                                        <img class="br-7 wp-100" src="{{asset('build/assets/images/media/2.jpg')}}"
                                                            alt="attached-file-image"><span
                                                            class="image-pic">123image.jpg</span>
                                                    </a>
                                                    <ul class="icons">
                                                        <li class="me-1"><button type="button"
                                                                class="btn btn-icon  btn-primary"><i
                                                                    class="fe fe-activity"></i></button></li>
                                                        <li class="me-1"><button type="button"
                                                                class="btn btn-icon  btn-primary"><i
                                                                    class="fe fe-trash"></i></button></li>
                                                        <li class="me-1"><button type="button"
                                                                class="btn btn-icon  btn-primary"><i
                                                                    class="fe fe-mail"></i></button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-sm-12">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Image Attachment Tags</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="h-100 attached-file-container">
                                                <div class="attached-file-image">
                                                    <a href="javascript:void(0)">
                                                        <img class="br-7 wp-100" src="{{asset('build/assets/images/media/3.jpg')}}"
                                                            alt="attached-file-image"><span
                                                            class="image-pic">123image.jpg</span>
                                                    </a>
                                                    <ul class="icons">
                                                        <li class="me-1"><button type="button"
                                                                class="btn btn-icon  btn-primary"><i
                                                                    class="fe fe-activity"></i></button></li>
                                                        <li class="me-1"><button type="button"
                                                                class="btn btn-icon  btn-primary"><i
                                                                    class="fe fe-trash"></i></button></li>
                                                        <li class="me-1"><button type="button"
                                                                class="btn btn-icon  btn-primary"><i
                                                                    class="fe fe-mail"></i></button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-sm-12">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Image Attachment Tags</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="h-100  attached-file-container">
                                                <div class="pro-img-box attached-file-image">
                                                    <a href="javascript:void(0)">
                                                        <img class="br-7 wp-100" src="{{asset('build/assets/images/media/4.jpg')}}"
                                                            alt="attached-file-image"><span
                                                            class="image-pic">123image.jpg</span>
                                                    </a>
                                                    <ul class="icons">
                                                        <li class="me-1"><button type="button"
                                                                class="btn btn-icon  btn-primary"><i
                                                                    class="fe fe-activity"></i></button></li>
                                                        <li class="me-1"><button type="button"
                                                                class="btn btn-icon  btn-primary"><i
                                                                    class="fe fe-trash"></i></button></li>
                                                        <li class="me-1"><button type="button"
                                                                class="btn btn-icon  btn-primary"><i
                                                                    class="fe fe-mail"></i></button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Image File_Attachment Small Size</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap pb-3">
                                                <div class="file-image-1">
                                                    <div class="product-image">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/5.png')}}" class="rounded-3" alt="">
                                                        </a>
                                                        <ul class="icons">
                                                            <li><a href="javascript:void(0);" class="bg-danger"><i class="fe fe-trash"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-pink"><i class="fe fe-download"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-primary"><i class="fe fe-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <span class="file-name-1">Image01.jpg</span>
                                                </div>
                                                <div class="file-image-1">
                                                    <div class="product-image">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/2.png')}}" class="rounded-3" alt=""></a>
                                                        <ul class="icons">
                                                            <li><a href="javascript:void(0);" class="bg-danger"><i class="fe fe-trash"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-pink"><i class="fe fe-download"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-primary"><i class="fe fe-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <span class="file-name-1">Word.doc</span>
                                                </div>
                                                <div class="file-image-1">
                                                    <div class="product-image">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/3.png')}}" class="rounded-3" alt=""></a>
                                                        <ul class="icons">
                                                            <li><a href="javascript:void(0);" class="bg-danger"><i class="fe fe-trash"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-pink"><i class="fe fe-download"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-primary"><i class="fe fe-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <span class="file-name-1">Excel.xls</span>
                                                </div>
                                                <div class="file-image-1">
                                                    <div class="product-image">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/1.png')}}" class="rounded-3" alt=""></a>
                                                        <ul class="icons">
                                                            <li><a href="javascript:void(0);" class="bg-danger"><i class="fe fe-trash"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-pink"><i class="fe fe-download"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-primary"><i class="fe fe-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <span class="file-name-1">Document.pdf</span>
                                                </div>
                                                <div class="file-image-1">
                                                    <div class="product-image">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/media/12.jpg')}}" class="rounded-3" alt="">
                                                        </a>
                                                        <ul class="icons">
                                                            <li><a href="javascript:void(0);" class="bg-danger"><i class="fe fe-trash"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-pink"><i class="fe fe-download"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-primary"><i class="fe fe-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <span class="file-name-1">Image02.jpg</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Image File_Attachment Medium Size</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap pb-3">
                                                <div class="file-image-1 file-image-md">
                                                    <div class="product-image">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/5.png')}}" class="rounded-3" alt="">
                                                        </a>
                                                        <ul class="icons">
                                                            <li><a href="javascript:void(0);" class="bg-danger"><i class="fe fe-trash"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-pink"><i class="fe fe-download"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-primary"><i class="fe fe-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <span class="file-name-1">Image01.jpg</span>
                                                </div>
                                                <div class="file-image-1 file-image-md">
                                                    <div class="product-image">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/2.png')}}" class="rounded-3" alt=""></a>
                                                        <ul class="icons">
                                                            <li><a href="javascript:void(0);" class="bg-danger"><i class="fe fe-trash"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-pink"><i class="fe fe-download"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-primary"><i class="fe fe-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <span class="file-name-1">Word.doc</span>
                                                </div>
                                                <div class="file-image-1 file-image-md">
                                                    <div class="product-image">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/3.png')}}" class="rounded-3" alt=""></a>
                                                        <ul class="icons">
                                                            <li><a href="javascript:void(0);" class="bg-danger"><i class="fe fe-trash"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-pink"><i class="fe fe-download"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-primary"><i class="fe fe-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <span class="file-name-1">Excel.xls</span>
                                                </div>
                                                <div class="file-image-1 file-image-md">
                                                    <div class="product-image">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/files/1.png')}}" class="rounded-3" alt=""></a>
                                                        <ul class="icons">
                                                            <li><a href="javascript:void(0);" class="bg-danger"><i class="fe fe-trash"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-pink"><i class="fe fe-download"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-primary"><i class="fe fe-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <span class="file-name-1">Document.pdf</span>
                                                </div>
                                                <div class="file-image-1 file-image-md">
                                                    <div class="product-image">
                                                        <a href="{{url('filemanager-details')}}">
                                                            <img src="{{asset('build/assets/images/media/12.jpg')}}" class="rounded-3" alt="">
                                                        </a>
                                                        <ul class="icons">
                                                            <li><a href="javascript:void(0);" class="bg-danger"><i class="fe fe-trash"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-pink"><i class="fe fe-download"></i></a></li>
                                                            <li><a href="javascript:void(0);" class="bg-primary"><i class="fe fe-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <span class="file-name-1">Image02.jpg</span>
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