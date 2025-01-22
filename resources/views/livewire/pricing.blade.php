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
                                    <li class="breadcrumb-item active" aria-current="page">Pricing Table</li>
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
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="card-category br-7">Free</div>
                                            <div class="display-5 my-4">$0</div>
                                            <ul class="list-unstyled leading-loose">
                                                <li><i class="fe fe-award text-info mx-2"></i><strong>4</strong> Ads</li>
                                                <li><i class="fe fe-check text-success mx-2"></i> 30 days</li>
                                                <li><i class="fe fe-x text-danger mx-2"></i> Private Messages</li>
                                                <li><i class="fe fe-x text-danger mx-2"></i> Urgent Ads</li>
                                            </ul>
                                            <div class="text-center mt-6">
                                                <a href="javascript:void(0);" class="btn btn-primary btn-block">Choose Plan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col-end -->
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="card-category br-7">Premium</div>
                                            <div class="display-5 my-4">$65</div>
                                            <ul class="list-unstyled leading-loose">
                                                <li><i class="fe fe-award text-info mx-2"></i><strong>50</strong> Ads</li>
                                                <li><i class="fe fe-check text-success mx-2"></i> 60 Days</li>
                                                <li><i class="fe fe-x text-danger mx-2"></i> Private Messages</li>
                                                <li><i class="fe fe-x text-danger mx-2"></i> Urgent ads</li>
                                            </ul>
                                            <div class="text-center mt-6">
                                                <a href="javascript:void(0);" class="btn btn-success btn-block">Choose Plan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col-end -->
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="card-category br-7">Enterprise</div>
                                            <div class="display-5 my-4">$100</div>
                                            <ul class="list-unstyled leading-loose">
                                                <li><i class="fe fe-award text-info mx-2"></i><strong>100</strong> Ads</li>
                                                <li><i class="fe fe-check text-success mx-2"></i> 180 days</li>
                                                <li><i class="fe fe-check text-success mx-2"></i> Private Messages</li>
                                                <li><i class="fe fe-x text-danger mx-2"></i> Urgent ads</li>
                                            </ul>
                                            <div class="text-center mt-6">
                                                <a href="javascript:void(0);" class="btn btn-danger btn-block">Choose Plan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col-end -->
                                <div class="col-sm-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="card-category br-7">Unlimited</div>
                                            <div class="display-5 my-4">$150</div>
                                            <ul class="list-unstyled leading-loose">
                                                <li><i class="fe fe-award text-info mx-2"></i><strong>Unlimited</strong> Ads</li>
                                                <li><i class="fe fe-check text-success mx-2"></i> 365 Days</li>
                                                <li><i class="fe fe-check text-success mx-2"></i> Private Messages</li>
                                                <li><i class="fe fe-check text-success mx-2"></i> Urgent ads</li>
                                            </ul>
                                            <div class="text-center mt-6">
                                                <a href="javascript:void(0);" class="btn btn-info btn-block">Choose Plan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col-end -->
                            </div>
                            <!-- END ROW -->

                            <h4 class="mb-5">Pricing cards 4 colums</h4>
                            <!-- ROW -->
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 col-xl-3">
                                    <div class="card card-pricing shadow text-center px-3 ">
                                        <span
                                            class="h6 w-60 mx-auto px-4 py-3 rounded-bottom bg-primary text-white ">Professional</span>
                                        <div class="bg-transparent border-0">
                                            <h1 class="h1 fw-normal text-primary text-center mb-0" data-pricing-value="30">
                                                $<span class="price">49</span><span class="h6 text-muted ms-2">/ per
                                                    month</span></h1>
                                        </div>
                                        <div class="card-body pt-0">
                                            <ul class="list-unstyled mb-4">
                                                <li>10 Free Domain Name</li>
                                                <li>15 One-Click Apps</li>
                                                <li>10 Databases</li>
                                                <li>Money Back Guarntee</li>
                                                <li>24/7 support</li>
                                            </ul>
                                            <a href="javascript:void(0);" class="btn btn-primary mb-3">Order Now</a>
                                        </div>
                                    </div>
                                </div><!-- col-end -->
                                <div class="col-sm-6 col-lg-6 col-xl-3">
                                    <div class="card card-pricing2 shadow text-center px-3">
                                        <span
                                            class="h6 w-60 mx-auto px-4 py-3 rounded-bottom bg-info text-white ">Professional</span>
                                        <div class="bg-transparent border-0">
                                            <h1 class="h1 fw-normal text-info text-center mb-0" data-pricing-value="30">
                                                $<span class="price">59</span><span class="h6 text-muted ms-2">/ per
                                                    month</span>
                                            </h1>
                                        </div>
                                        <div class="card-body pt-0">
                                            <ul class="list-unstyled mb-4">
                                                <li>12 Free Domain Name</li>
                                                <li>20 One-Click Apps</li>
                                                <li>15 Databases</li>
                                                <li>Money Back Guarntee</li>
                                                <li>24/7 support</li>
                                            </ul>
                                            <a href="javascript:void(0);" class="btn btn-info mb-3">Order Now</a>
                                        </div>
                                    </div>
                                </div><!-- col-end -->
                                <div class="col-sm-6 col-lg-6 col-xl-3">
                                    <div class="card card-pricing3 shadow text-center px-3">
                                        <span
                                            class="h6 w-60 mx-auto px-4 py-3 rounded-bottom bg-warning text-white ">Professional</span>
                                        <div class="bg-transparent border-0">
                                            <h1 class="h1 fw-normal text-warning text-center mb-0" data-pricing-value="30">
                                                $<span class="price">69</span><span class="h6 text-muted ms-2">/ per
                                                    month</span></h1>
                                        </div>
                                        <div class="card-body pt-0">
                                            <ul class="list-unstyled mb-4">
                                                <li>15 Free Domain Name</li>
                                                <li>25 One-Click Apps</li>
                                                <li>20 Databases</li>
                                                <li>Money Back Guarntee</li>
                                                <li>24/7 support</li>
                                            </ul>
                                            <a href="javascript:void(0);" class="btn btn-warning mb-3">Order Now</a>
                                        </div>
                                    </div>
                                </div><!-- col-end -->
                                <div class="col-sm-6 col-lg-6 col-xl-3">
                                    <div class="card card-pricing4 shadow text-center px-3">
                                        <span
                                            class="h6 w-60 mx-auto px-4 py-3 rounded-bottom bg-success text-white ">Professional</span>
                                        <div class="bg-transparent border-0">
                                            <h1 class="h1 fw-normal text-success text-center mb-0" data-pricing-value="30">
                                                $<span class="price">79</span><span class="h6 text-muted ms-2">/ per
                                                    month</span></h1>
                                        </div>
                                        <div class="card-body pt-0">
                                            <ul class="list-unstyled mb-4">
                                                <li>20 Free Domain Name</li>
                                                <li>30 One-Click Apps</li>
                                                <li>15 Databases</li>
                                                <li>Money Back Guarntee</li>
                                                <li>24/7 support</li>
                                            </ul>
                                            <a href="javascript:void(0);" class="btn btn-success mb-3">Order Now</a>
                                        </div>
                                    </div>
                                </div><!-- col-end -->
                            </div>
                            <!-- END ROW -->

                            <h4 class="mb-5">Pricing cards 4 colums</h4>
                            <!-- ROW -->
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-lg-6 col-xl-3">
                                    <div class="panel price panel-color">
                                        <div class="panel-heading bg-primary p-0 text-center">
                                            <h3 class="text-white">Personal</h3>
                                        </div>
                                        <div class="panel-body text-center">
                                            <p class="lead"><strong class="">$15 /</strong> month</p>
                                        </div>
                                        <ul class="list-group text-center">
                                            <li class="list-group-item"><strong> 2 Free</strong> Domain Name</li>
                                            <li class="list-group-item"><strong>3 </strong> One-Click Apps</li>
                                            <li class="list-group-item"><strong> 1 </strong> Databases</li>
                                            <li class="list-group-item"><strong> Money </strong> BackGuarantee</li>
                                            <li class="list-group-item border-bottom-0"><strong> 24/7</strong> support</li>
                                        </ul>
                                        <div class="panel-footer text-center">
                                            <a class="btn btn-primary" href="javascript:void(0)">Purchase Now!</a>
                                        </div>
                                    </div>
                                </div><!-- COL-END -->
                                <div class="col-xs-6 col-sm-6 col-lg-6 col-xl-3">
                                    <div class="panel price panel-color">
                                        <div class="panel-heading bg-warning  p-0 text-center">
                                            <h3 class="text-white">Team</h3>
                                        </div>
                                        <div class="panel-body text-center">
                                            <p class="lead"><strong class="">$25 /</strong> month</p>
                                        </div>
                                        <ul class="list-group text-center">
                                            <li class="list-group-item"><strong> 3 Free</strong> Domain Name</li>
                                            <li class="list-group-item"><strong>4 </strong> One-Click Apps</li>
                                            <li class="list-group-item"><strong> 2 </strong> Databases</li>
                                            <li class="list-group-item"><strong> Money </strong> BackGuarantee</li>
                                            <li class="list-group-item border-bottom-0"><strong> 24/7</strong> support</li>
                                        </ul>
                                        <div class="panel-footer text-center">
                                            <a class="btn btn-warning" href="javascript:void(0)">Purchase Now!</a>
                                        </div>
                                    </div>
                                </div><!-- COL-END -->
                                <div class="col-xs-6 col-sm-6 col-lg-6 col-xl-3">
                                    <div class="panel price panel-color">
                                        <div class="panel-heading bg-success p-0 text-center">
                                            <h3 class="text-white">Business</h3>
                                        </div>
                                        <div class="panel-body text-center">
                                            <p class="lead"><strong class="">$99 /</strong> month</p>
                                        </div>
                                        <ul class="list-group text-center">
                                            <li class="list-group-item"><strong> 5 Free</strong> Domain Name</li>
                                            <li class="list-group-item"><strong>8 </strong> One-Click Apps</li>
                                            <li class="list-group-item"><strong> 2 </strong> Databases</li>
                                            <li class="list-group-item"><strong> Money </strong> BackGuarantee</li>
                                            <li class="list-group-item border-bottom-0"><strong> 24/7</strong> support</li>
                                        </ul>
                                        <div class="panel-footer text-center">
                                            <a class="btn btn-success" href="javascript:void(0)">Purchase Now!</a>
                                        </div>
                                    </div>
                                </div><!-- COL-END -->
                                <div class="col-xs-6 col-sm-6 col-lg-6 col-xl-3">
                                    <div class="panel price panel-color">
                                        <div class="panel-heading bg-danger p-0 text-center ">
                                            <h3 class="text-white">Corporate</h3>
                                        </div>
                                        <div class="panel-body text-center">
                                            <p class="lead"><strong class="">$35 /</strong> month</p>
                                        </div>
                                        <ul class="list-group text-center">
                                            <li class="list-group-item"><strong> 4 Free</strong> Domain Name</li>
                                            <li class="list-group-item"><strong>6 </strong> One-Click Apps</li>
                                            <li class="list-group-item"><strong> 2 </strong> Databases</li>
                                            <li class="list-group-item"><strong> Money </strong> BackGuarantee</li>
                                            <li class="list-group-item border-bottom-0"><strong> 24/7</strong> support</li>
                                        </ul>
                                        <div class="panel-footer text-center">
                                            <a class="btn btn-danger" href="javascript:void(0)">Purchase Now!</a>
                                        </div>
                                    </div>
                                </div><!-- COL-END -->
                            </div>
                            <!-- END ROW -->

                            <h4 class="mb-5">Pricing cards 4 colums</h4>
                            <!-- ROW -->
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mb-1 fw-semibold badge bg-primary">Standard</h5>
                                            <p class="text-muted fs-13 mb-0">Perfect plan for starters</p>
                                            <div class="my-3 text-center">
                                                <p class="fw-semibold mb-0 fs-40">$46<span class="text-muted fs-13 fw-normal">/ year</span></p>
                                            </div>
                                            <button class="btn btn-block btn-primary" type="button">Get Started</button>
                                            <div class="fw-semibold fs-14 mb-2 mt-3">Includes :</div>
                                            <ul class="list-unstyled">
                                                <li class="d-flex align-items-center border-bottom-0 mb-4">
                                                    <i class="fe fe-check-circle fw-bolder text-primary"></i>
                                                    <span class="text-dark fw-semibold fs-13 ms-2">Share with 8 team members</span>
                                                </li>
                                                <li class="d-flex align-items-center border-bottom-0 mb-4">
                                                    <i class="fe fe-check-circle fw-bolder text-primary"></i>
                                                    <span class="text-dark fw-semibold fs-13 ms-2">limited Projects</span>
                                                </li>
                                                <li class="d-flex align-items-center border-bottom-0 mb-4">
                                                    <i class="fe fe-check-circle fw-bolder text-primary"></i>
                                                    <span class="text-dark fw-semibold fs-13 ms-2">10 days version history</span>
                                                </li>
                                                <li class="d-flex align-items-center border-bottom-0">
                                                    <i class="fe fe-check-circle fw-bolder text-primary"></i>
                                                    <span class="text-dark fw-semibold fs-13 ms-2">Adavanced security</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="javascript:void(0);" class="mb-0 fw-semibold">See all features</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mb-1 fw-semibold badge bg-info">Professional</h5>
                                            <p class="text-muted fs-13 mb-0">Best plan for professionals</p>
                                            <div class="my-3 text-center">
                                                <p class="fw-semibold mb-0 fs-40">$78<span class="text-muted fs-13 fw-normal">/ year</span></p>
                                            </div>
                                            <button class="btn btn-block btn-info" type="button">Get Started</button>
                                            <div class="fw-semibold fs-14 mb-2 mt-3">Includes :</div>
                                            <ul class="list-unstyled">
                                                <li class="d-flex align-items-center border-bottom-0 mb-4">
                                                    <i class="fe fe-check-circle fw-bolder text-info"></i>
                                                    <span class="text-dark fw-semibold fs-13 ms-2">unlimited team members</span>
                                                </li>
                                                <li class="d-flex align-items-center border-bottom-0 mb-4">
                                                    <i class="fe fe-check-circle fw-bolder text-info"></i>
                                                    <span class="text-dark fw-semibold fs-13 ms-2">Unlimited Projects</span>
                                                </li>
                                                <li class="d-flex align-items-center border-bottom-0 mb-4">
                                                    <i class="fe fe-check-circle fw-bolder text-info"></i>
                                                    <span class="text-dark fw-semibold fs-13 ms-2">30 days version history</span>
                                                </li>
                                                <li class="d-flex align-items-center border-bottom-0">
                                                    <i class="fe fe-check-circle fw-bolder text-info"></i>
                                                    <span class="text-dark fw-semibold fs-13 ms-2">Adavanced security</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="javascript:void(0);" class="mb-0 fw-semibold">See all features</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mb-1 fw-semibold badge bg-warning">Unlimited</h5>
                                            <p class="text-muted fs-13 mb-0">Entire Team  in one place</p>
                                            <div class="my-3 text-center">
                                                <p class="fw-semibold mb-0 fs-40">$99<span class="text-muted fs-13 fw-normal">/ year</span></p>
                                            </div>
                                            <button class="btn btn-block btn-warning" type="button">Get Started</button>
                                            <div class="fw-semibold fs-14 mb-2 mt-3">Includes :</div>
                                            <ul class="list-unstyled">
                                                <li class="d-flex align-items-center border-bottom-0 mb-4">
                                                    <i class="fe fe-check-circle fw-bolder text-warning"></i>
                                                    <span class="text-dark fw-semibold fs-13 ms-2">Share with 100+ team members</span>
                                                </li>
                                                <li class="d-flex align-items-center border-bottom-0 mb-4">
                                                    <i class="fe fe-check-circle fw-bolder text-warning"></i>
                                                    <span class="text-dark fw-semibold fs-13 ms-2">Unlimited Projects</span>
                                                </li>
                                                <li class="d-flex align-items-center border-bottom-0 mb-4">
                                                    <i class="fe fe-check-circle fw-bolder text-warning"></i>
                                                    <span class="text-dark fw-semibold fs-13 ms-2">life time version history</span>
                                                </li>
                                                <li class="d-flex align-items-center border-bottom-0">
                                                    <i class="fe fe-check-circle fw-bolder text-warning"></i>
                                                    <span class="text-dark fw-semibold fs-13 ms-2">Adavanced security</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="javascript:void(0);" class="mb-0 fw-semibold">See all features</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mb-1 fw-semibold badge bg-danger">Cutsom</h5>
                                            <p class="text-muted fs-13 mb-0">Run your company on your own terms</p>
                                            <div class="my-3 text-center">
                                                <p class="fw-semibold mb-0 fs-40">$126<span class="text-muted fs-13 fw-normal">/ year</span></p>
                                            </div>
                                            <button class="btn btn-block btn-danger" type="button">Get Started</button>
                                            <div class="fw-semibold fs-14 mb-2 mt-3">Includes :</div>
                                            <ul class="list-unstyled">
                                                <li class="d-flex align-items-center border-bottom-0 mb-4">
                                                    <i class="fe fe-check-circle fw-bolder text-danger"></i>
                                                    <span class="text-dark fw-semibold fs-13 ms-2">Share with your own team members</span>
                                                </li>
                                                <li class="d-flex align-items-center border-bottom-0 mb-4">
                                                    <i class="fe fe-check-circle fw-bolder text-danger"></i>
                                                    <span class="text-dark fw-semibold fs-13 ms-2">Unlimited Projects</span>
                                                </li>
                                                <li class="d-flex align-items-center border-bottom-0 mb-4">
                                                    <i class="fe fe-check-circle fw-bolder text-danger"></i>
                                                    <span class="text-dark fw-semibold fs-13 ms-2">custom version history</span>
                                                </li>
                                                <li class="d-flex align-items-center border-bottom-0">
                                                    <i class="fe fe-check-circle fw-bolder text-danger"></i>
                                                    <span class="text-dark fw-semibold fs-13 ms-2">Adavanced custom security</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="javascript:void(0);" class="mb-0 fw-semibold">See all features</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

@endsection