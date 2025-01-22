@extends('layouts.switcher-app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Switcher</li>
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

                            <!-- CONTAINER -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 m-auto">
                                        <div class="card sidebar-right1">
                                            <div class="card-body">
                                                <div class="predefined_styles">
                                                    <div class="swichermainleft text-center">
                                                        <h5 class="fw-semibold text-start">LTR AND RTL VERSIONS</h5>
                                                        <div class="skin-body">
                                                            <div class="switch_section">
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">LTR</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch25" id="myonoffswitch54"
                                                                            class="onoffswitch2-checkbox" checked="">
                                                                        <label for="myonoffswitch54"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">RTL</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch25" id="myonoffswitch55"
                                                                            class="onoffswitch2-checkbox">
                                                                        <label for="myonoffswitch55"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swichermainleft">
                                                        <h5 class="fw-semibold text-start">Theme Style</h5>
                                                        <div class="skin-body">
                                                            <div class="switch_section">
                                                                <div class="switch-toggle d-flex">
                                                                    <span class="me-auto text-muted-dark">Light Theme</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch1" id="myonoffswitch1"
                                                                            class="onoffswitch2-checkbox" checked="">
                                                                        <label for="myonoffswitch1"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Dark Theme</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch1" id="myonoffswitch2"
                                                                            class="onoffswitch2-checkbox">
                                                                        <label for="myonoffswitch2"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swichermainleft switcher-nav">
                                                        <h5 class="fw-semibold text-start">Navigation Style</h5>
                                                        <div class="skin-body">
                                                            <div class="switch_section">
                                                                <div class="switch-toggle d-flex">
                                                                    <span class="me-auto text-muted-dark">Vertical Menu</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch15" id="myonoffswitch34"
                                                                            class="onoffswitch2-checkbox" checked="">
                                                                        <label for="myonoffswitch34"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Horizantal Click Menu</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch15" id="myonoffswitch35"
                                                                            class="onoffswitch2-checkbox">
                                                                        <label for="myonoffswitch35"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Horizantal Hover Menu</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch15" id="myonoffswitch111"
                                                                            class="onoffswitch2-checkbox">
                                                                        <label for="myonoffswitch111"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swichermainleft">
                                                        <h5 class="fw-semibold text-start">Theme Primary Color</h5>
                                                        <div class="skin-body">
                                                            <div class="switch_section">
                                                                <div class="switch-toggle d-flex">
                                                                    <span class="me-auto text-muted-dark">Primary Color</span>
                                                                    <div class="">
                                                                        <input
                                                                            class=" input-color-picker color-primary-light"
                                                                            value="#4454c3" id="colorID"
                                                                            type="color"
                                                                            data-id="bg-color" data-id1="bg-hover"
                                                                            data-id2="bg-border" name="lightPrimary">
                                                                    </div>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Background Color</span>
                                                                    <div class="">
                                                                        <input
                                                                            class="input-bg-picker background-primary-light"
                                                                            value="#373c56" id="bgID"
                                                                            type="color"
                                                                            data-id3="body" data-id4="theme"
                                                                            name="BackgroundPrimary">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swichermainleft leftmenu-styles">
                                                        <h5 class="fw-semibold text-start">Menu Styles</h5>
                                                        <div class="skin-body">
                                                            <div class="switch_section">
                                                                <div class="switch-toggle d-flex">
                                                                    <span class="me-auto text-muted-dark">Light Menu</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch2" id="myonoffswitch3"
                                                                            class="onoffswitch2-checkbox" checked="">
                                                                        <label for="myonoffswitch3"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Color Menu</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch2" id="myonoffswitch4"
                                                                            class="onoffswitch2-checkbox">
                                                                        <label for="myonoffswitch4"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Dark Menu</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch2" id="myonoffswitch5"
                                                                            class="onoffswitch2-checkbox">
                                                                        <label for="myonoffswitch5"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swichermainleft header-styles">
                                                        <h5 class="fw-semibold text-start">Header Styles</h5>
                                                        <div class="skin-body">
                                                            <div class="switch_section">
                                                                <div class="switch-toggle d-flex">
                                                                    <span class="me-auto text-muted-dark">Light Header</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch3" id="myonoffswitch6"
                                                                            class="onoffswitch2-checkbox" checked="">
                                                                        <label for="myonoffswitch6"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Color Header</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch3" id="myonoffswitch7"
                                                                            class="onoffswitch2-checkbox">
                                                                        <label for="myonoffswitch7"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Dark Header</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch3" id="myonoffswitch8"
                                                                            class="onoffswitch2-checkbox">
                                                                        <label for="myonoffswitch8"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swichermainleft">
                                                        <h5 class="fw-semibold text-start">Layout Width Styles</h5>
                                                        <div class="skin-body">
                                                            <div class="switch_section">
                                                                <div class="switch-toggle d-flex">
                                                                    <span class="me-auto text-muted-dark">Full Width</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch04" id="myonoffswitch9"
                                                                            class="onoffswitch2-checkbox" checked="">
                                                                        <label for="myonoffswitch9"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Boxed</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch04" id="myonoffswitch10"
                                                                            class="onoffswitch2-checkbox">
                                                                        <label for="myonoffswitch10"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swichermainleft switcher-layout">
                                                        <h5 class="fw-semibold text-start">Layout Positions</h5>
                                                        <div class="skin-body">
                                                            <div class="switch_section">
                                                                <div class="switch-toggle d-flex">
                                                                    <span class="me-auto text-muted-dark">Fixed</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch5" id="myonoffswitch11"
                                                                            class="onoffswitch2-checkbox" checked="">
                                                                        <label for="myonoffswitch11"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Scrollable</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch5" id="myonoffswitch12"
                                                                            class="onoffswitch2-checkbox">
                                                                        <label for="myonoffswitch12"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swichermainleft vertical-switcher">
                                                        <h5 class="fw-semibold text-start">Sidemenu layout Styles</h5>
                                                        <div class="skin-body">
                                                            <div class="switch_section">
                                                                <div class="switch-toggle d-flex">
                                                                    <span class="me-auto text-muted-dark">Default Menu</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch6" id="myonoffswitch13"
                                                                            class="onoffswitch2-checkbox default-menu"
                                                                            checked="">
                                                                        <label for="myonoffswitch13"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Closed Menu</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch6" id="myonoffswitch30"
                                                                            class="onoffswitch2-checkbox default-menu">
                                                                        <label for="myonoffswitch30"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Icon with Text</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch6" id="myonoffswitch14"
                                                                            class="onoffswitch2-checkbox">
                                                                        <label for="myonoffswitch14"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Icon Overlay</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch6" id="myonoffswitch15"
                                                                            class="onoffswitch2-checkbox">
                                                                        <label for="myonoffswitch15"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Hover Submenu</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch6" id="myonoffswitch32"
                                                                            class="onoffswitch2-checkbox">
                                                                        <label for="myonoffswitch32"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Hover Submenu style 1</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio"
                                                                            name="onoffswitch6" id="myonoffswitch33"
                                                                            class="onoffswitch2-checkbox">
                                                                        <label for="myonoffswitch33"
                                                                            class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Double Menu</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch6" id="switchbtn-doublemenu" class="onoffswitch2-checkbox">
                                                                        <label for="switchbtn-doublemenu" class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                                <div class="switch-toggle d-flex mt-2">
                                                                    <span class="me-auto text-muted-dark">Double Menu with Tabs</span>
                                                                    <p class="onoffswitch2 my-0"><input type="radio" name="onoffswitch6" id="switchbtn-doublemenutabs" class="onoffswitch2-checkbox">
                                                                        <label for="switchbtn-doublemenutabs" class="onoffswitch2-label"></label>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swichermainleft">
                                                        <h5 class="fw-semibold text-start">Reset All Styles</h5>
                                                        <div class="skin-body">
                                                            <div class="switch_section px-2"> 
                                                                <button id="resetAll" class="btn btn-danger btn-block" type="button">Reset All</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END CONTAINER -->

@endsection

@section('scripts')

@endsection