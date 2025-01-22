@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                                                        <!-- PAGE HEADER -->
                                                        <div class="page-header d-sm-flex d-block">
                                                                <ol class="breadcrumb mb-sm-0 mb-3">
                                                                        <!-- breadcrumb -->
                                                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Icons</a></li>
                                                                        <li class="breadcrumb-item active" aria-current="page">Bootstrap</li>
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

                                                        <!-- ROW OPEN -->
                                                        <div class="row row-cards">
                                                        <div class="col">
                                                                <div class="card">
                                                                <div class="card-header">
                                                                        <h3 class="card-title">Bootstrap 5</h3>
                                                                </div>
                                                                <div class="card-body">
                                                                        <div class="row">
                                                                        <div class="col-lg-12 col-sm-12">
                                                                                <p>Powered by Bootstrap 5 set. For more info <a
                                                                                        href="https://icons.getbootstrap.com/" target="_blank">click
                                                                                        here</a>.</p>
                                                                                <p><code>&lt;i class="bi-ICON_NAME"&gt;&lt;/i&gt;</code></p>
                                                                        </div>
                                                                        <div class="col-lg-12 col-sm-12">
                                                                                <div class="icons-list-wrap">
                                                                                <ul class="icons-list">
                                                                                        <li class="icons-list-item"><i class="bi-alarm"
                                                                                                data-bs-toggle="tooltip" title="bi bi-alarm"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-alarm-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-alarm-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-align-bottom"
                                                                                                data-bs-toggle="tooltip" title="bi-align-bottom"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-align-center"
                                                                                                data-bs-toggle="tooltip" title="bi-align-center"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-align-end"
                                                                                                data-bs-toggle="tooltip" title="bi-align-end"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-align-middle"
                                                                                                data-bs-toggle="tooltip" title="bi-align-middle"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-align-start"
                                                                                                data-bs-toggle="tooltip" title="bi-align-start"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-align-top"
                                                                                                data-bs-toggle="tooltip" title="bi-align-top"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-alt"
                                                                                                data-bs-toggle="tooltip" title="bi-alt"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-app"
                                                                                                data-bs-toggle="tooltip" title="bi-app"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-app-indicator"
                                                                                                data-bs-toggle="tooltip" title="bi-app-indicator"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-archive"
                                                                                                data-bs-toggle="tooltip" title="bi-archive"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-archive-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-archive-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-90deg-down"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-90deg-down"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-90deg-left"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-90deg-left"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-90deg-right"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-90deg-right"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-90deg-up"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-90deg-up"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-bar-down"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-bar-down"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-bar-left"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-bar-left"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-bar-right"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-bar-right"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-bar-up"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-bar-up"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-clockwise"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-clockwise"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-counterclockwise"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-counterclockwise"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-down-circle"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-down-circle"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-down-circle-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-down-circle-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-down-left"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-down-left"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-down-left-circle"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-down-left-circle"></i></li>
                                                                                        <li class="icons-list-item"><i
                                                                                                class="bi-arrow-down-left-circle-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-down-left-circle-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-down-left-square"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-down-left-square"></i></li>
                                                                                        <li class="icons-list-item"><i
                                                                                                class="bi-arrow-down-left-square-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-down-left-square-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-down-right"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-down-right"></i></li>
                                                                                        <li class="icons-list-item"><i
                                                                                                class="bi-arrow-down-right-circle"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-down-right-circle"></i></li>
                                                                                        <li class="icons-list-item"><i
                                                                                                class="bi-arrow-down-right-circle-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-down-right-circle-fill"></i></li>
                                                                                        <li class="icons-list-item"><i
                                                                                                class="bi-arrow-down-right-square"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-down-right-square"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-down-short"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-down-short"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-down-square"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-down-square"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-down-square-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-down-square-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-down-up"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-down-up"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-left"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-left"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-left-circle"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-left-circle"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-left-circle-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-left-circle-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-left-right"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-left-right"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-left-short"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-left-short"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-left-square"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-left-square"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-left-square-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-left-square-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-repeat"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-repeat"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-return-left"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-return-left"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-return-right"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-return-right"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-right"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-right"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-right-circle"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-right-circle"></i></li>
                                                                                        <li class="icons-list-item"><i
                                                                                                class="bi-arrow-right-circle-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-right-circle-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-right-short"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-right-short"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-right-square"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-right-square"></i></li>
                                                                                        <li class="icons-list-item"><i
                                                                                                class="bi-arrow-right-square-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-right-square-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrows-angle-contract"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrows-angle-contract"></i></li>
                                                                                        <li class="icons-list-item"><i
                                                                                                class="bi-arrow-right-square-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-right-square-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrows-angle-expand"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrows-angle-expand"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrows-collapse"
                                                                                                data-bs-toggle="tooltip" title="bi-arrows-collapse"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrows-expand"
                                                                                                data-bs-toggle="tooltip" title="bi-arrows-expand"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrows-fullscreen"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrows-fullscreen"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrows-move"
                                                                                                data-bs-toggle="tooltip" title="bi-arrows-move"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-up"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-up"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-up-circle"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-up-circle"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-up-circle-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-up-circle-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-up-left"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-up-left"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-up-left-circle"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-up-left-circle"></i></li>
                                                                                        <li class="icons-list-item"><i
                                                                                                class="bi-arrow-up-left-circle-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-up-left-circle-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-up-left-square"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-up-left-square"></i></li>
                                                                                        <li class="icons-list-item"><i
                                                                                                class="bi-arrow-up-left-square-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-up-left-square-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-up-right"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-up-right"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-up-right-circle"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-up-right-circle"></i></li>
                                                                                        <li class="icons-list-item"><i
                                                                                                class="bi-arrow-up-right-circle-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-up-right-circle-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-up-right-square"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-up-right-square"></i></li>
                                                                                        <li class="icons-list-item"><i
                                                                                                class="bi-arrow-up-right-square-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-up-right-square-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-up-short"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-up-short"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-up-square"
                                                                                                data-bs-toggle="tooltip" title="bi-arrow-up-square"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-arrow-up-square-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-arrow-up-square-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-aspect-ratio"
                                                                                                data-bs-toggle="tooltip" title="bi-aspect-ratio"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-aspect-ratio-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-aspect-ratio-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-asterisk"
                                                                                                data-bs-toggle="tooltip" title="bi-asterisk"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-at"
                                                                                                data-bs-toggle="tooltip" title="bi-at"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-award"
                                                                                                data-bs-toggle="tooltip" title="bi-award"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-award-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-award-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-back"
                                                                                                data-bs-toggle="tooltip" title="bi-back"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-backspace"
                                                                                                data-bs-toggle="tooltip" title="bi-backspace"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-backspace-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-backspace-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-backspace-reverse"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-backspace-reverse"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-backspace-reverse-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-backspace-reverse-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-3d"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-3d"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-3d-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-3d-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-4k"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-4k"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-4k-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-4k-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-8k"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-8k"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-4k"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-4k"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-8k-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-8k-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-ad"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-ad"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-ad-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-ad-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-ar"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-ar"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-ar-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-ar-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-cc"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-cc"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-cc-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-ad-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-hd"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-hd"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-hd-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-hd-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-tm"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-tm"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-tm-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-tm-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-vo"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-vo"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-vo-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-vo-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-vr"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-vr"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-vr-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-vr-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-wc"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-wc"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-badge-wc-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-badge-wc-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-bag-check"
                                                                                                data-bs-toggle="tooltip" title="bi-bag-check"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-bag-dash"
                                                                                                data-bs-toggle="tooltip" title="bi-bag-dash"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-bag-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-bag-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-bag-plus"
                                                                                                data-bs-toggle="tooltip" title="bi-bag-plus"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-bag-x"
                                                                                                data-bs-toggle="tooltip" title="bi-bag-x"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-bank"
                                                                                                data-bs-toggle="tooltip" title="bi-bank"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-bank2"
                                                                                                data-bs-toggle="tooltip" title="bi-bank2"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-bar-chart"
                                                                                                data-bs-toggle="tooltip" title="bi-bar-chart"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-bar-chart-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-bar-chart-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-bar-chart-line"
                                                                                                data-bs-toggle="tooltip" title="bi-bar-chart-line"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-bar-chart-steps"
                                                                                                data-bs-toggle="tooltip" title="bi-bar-chart-steps"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-basket"
                                                                                                data-bs-toggle="tooltip" title="bi-basket"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-basket2"
                                                                                                data-bs-toggle="tooltip" title="bi-basket2"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-basket3"
                                                                                                data-bs-toggle="tooltip" title="bi-basket3"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-battery"
                                                                                                data-bs-toggle="tooltip" title="bi-battery"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-battery-charging"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-battery-charging"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-battery-full"
                                                                                                data-bs-toggle="tooltip" title="bi-battery-full"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-battery-half"
                                                                                                data-bs-toggle="tooltip" title="bi-battery-half"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-bell"
                                                                                                data-bs-toggle="tooltip" title="bi-bell"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-bell-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-bell-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-bell-slash"
                                                                                                data-bs-toggle="tooltip" title="bi-bell-slash"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-bell-slash-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-bell-slash-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-book"
                                                                                                data-bs-toggle="tooltip" title="bi-book"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-bookmarks"
                                                                                                data-bs-toggle="tooltip" title="bi-bookmarks"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-bookmark-x"
                                                                                                data-bs-toggle="tooltip" title="bi-bookmark-x"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-bootstrap"
                                                                                                data-bs-toggle="tooltip" title="bi-bootstrap"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-bootstrap-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-bootstrap-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-calculator"
                                                                                                data-bs-toggle="tooltip" title="bi-calculator"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-calendar"
                                                                                                data-bs-toggle="tooltip" title="bi-calendar"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-calendar2"
                                                                                                data-bs-toggle="tooltip" title="bi-calendar2"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-calendar2-check"
                                                                                                data-bs-toggle="tooltip" title="bi-calendar2-check"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-calendar2-date"
                                                                                                data-bs-toggle="tooltip" title="bi-calendar2-date"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-calendar2-day"
                                                                                                data-bs-toggle="tooltip" title="bi-calendar2-day"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-calendar2-event"
                                                                                                data-bs-toggle="tooltip" title="bi-calendar2-event"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-calendar2-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-calendar2-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-calendar2-minus"
                                                                                                data-bs-toggle="tooltip" title="bi-calendar2-minus"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-calendar2-month"
                                                                                                data-bs-toggle="tooltip" title="bi-calendar2-month"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-camera"
                                                                                                data-bs-toggle="tooltip" title="bi-camera"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-camera2"
                                                                                                data-bs-toggle="tooltip" title="bi-camera2"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-camera-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-camera-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-camera-reels"
                                                                                                data-bs-toggle="tooltip" title="bi-camera-reels"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-camera-video"
                                                                                                data-bs-toggle="tooltip" title="bi-camera-video"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-capslock"
                                                                                                data-bs-toggle="tooltip" title="bi-capslock"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-clock"
                                                                                                data-bs-toggle="tooltip" title="bi-clock"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-dash"
                                                                                                data-bs-toggle="tooltip" title="bi-dash"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-dash-circle"
                                                                                                data-bs-toggle="tooltip" title="bi-dash-circle"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-dash-circle-dotted"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-dash-circle-dotted"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-dash-circle-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-dash-circle-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-dash-lg"
                                                                                                data-bs-toggle="tooltip" title="bi-dash-lg"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-diagram-2"
                                                                                                data-bs-toggle="tooltip" title="bi-diagram-2"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-diamond"
                                                                                                data-bs-toggle="tooltip" title="bi-diamond"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-dice-1"
                                                                                                data-bs-toggle="tooltip" title="bi-dice-1"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-display"
                                                                                                data-bs-toggle="tooltip" title="bi-display"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-display-fill"
                                                                                                data-bs-toggle="tooltip" title="bi-display-fill"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-distribute-horizontal"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-distribute-horizontal"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-door-closed"
                                                                                                data-bs-toggle="tooltip" title="bi-door-closed"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-door-open"
                                                                                                data-bs-toggle="tooltip" title="bi-door-open"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-dot"
                                                                                                data-bs-toggle="tooltip" title="bi-dot"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-earbuds"
                                                                                                data-bs-toggle="tooltip" title="bi-earbuds"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-easel"
                                                                                                data-bs-toggle="tooltip" title="bi-easel"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-egg"
                                                                                                data-bs-toggle="tooltip" title="bi-egg"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-eject"
                                                                                                data-bs-toggle="tooltip" title="bi-eject"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-emoji-angry"
                                                                                                data-bs-toggle="tooltip" title="bi-emoji-angry"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-eraser"
                                                                                                data-bs-toggle="tooltip" title="bi-eraser"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-file"
                                                                                                data-bs-toggle="tooltip" title="bi-file"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-facebook"
                                                                                                data-bs-toggle="tooltip" title="bi-facebook"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-file-arrow-down"
                                                                                                data-bs-toggle="tooltip" title="bi-file-arrow-down"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-file-arrow-down-fill"
                                                                                                data-bs-toggle="tooltip"
                                                                                                title="bi-file-arrow-down-fill"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-file-binary"
                                                                                                data-bs-toggle="tooltip" title="bi-file-binary"></i>
                                                                                        </li>
                                                                                        <li class="icons-list-item"><i class="bi-file-break"
                                                                                                data-bs-toggle="tooltip" title="bi-file-break"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-file-check"
                                                                                                data-bs-toggle="tooltip" title="bi-file-check"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-file-code"
                                                                                                data-bs-toggle="tooltip" title="bi-file-code"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-file-diff"
                                                                                                data-bs-toggle="tooltip" title="bi-file-diff"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-film"
                                                                                                data-bs-toggle="tooltip" title="bi-film"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-gear"
                                                                                                data-bs-toggle="tooltip" title="bi-gear"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-gem"
                                                                                                data-bs-toggle="tooltip" title="bi-gem"></i></li>
                                                                                        <li class="icons-list-item"><i class="bi-gift"
                                                                                                data-bs-toggle="tooltip" title="bi-gift"></i></li>
                                                                                </ul>
                                                                                </div>
                                                                        </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <!-- ROW CLOSED -->

@endsection

@section('scripts')

@endsection