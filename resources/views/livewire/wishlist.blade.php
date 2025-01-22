@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">E-commerce</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-4 col-xl-3 alert mb-0">
                                            <div class="card item-card">
                                                <div class="product-grid6  card-body">
                                                    <div class="product-image6">
                                                        <a href="javascript:void(0)">
                                                            <img class="img-fluid w-70 h-80" src="{{asset('build/assets/images/products/25.png')}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-center op-1">
                                                        <div class="mb-2 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h4><a href="javascript:void(0)">Furniture</a></h4>
                                                        <div class="price">
                                                            <span class="mx-2">$425</span>
                                                            <span class="discount-price">$552</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <div class="btn-list">
                                                        <a href="{{url('cart')}}" class="btn btn-primary btn-svgs">
                                                            <i class="fe fe-shopping-cart mx-2"></i>
                                                            <span>Add to cart</span>
                                                        </a>
                                                        <a href="javascript:void(0)" class="btn btn-light btn-svgs" data-bs-dismiss="alert" aria-label="Close">
                                                            <i class="fe fe-trash-2 mx-2"></i>
                                                            <span>Remove</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-4 col-xl-3 alert mb-0">
                                            <div class="card item-card">
                                                <div class="product-grid6 card-body">
                                                    <div class="product-image6">
                                                        <a href="javascript:void(0)">
                                                            <img class="img-fluid w-70 h-70" src="{{asset('build/assets/images/products/26.png')}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-center op-1">
                                                        <div class="text-center mb-2 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h4><a href="javascript:void(0)">Smart Watch</a></h4>
                                                        <div class="price">
                                                            <span class="mx-2">$365</span>
                                                            <span class="discount-price">$452</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <div class="btn-list">
                                                        <a href="{{url('cart')}}" class="btn btn-primary btn-svgs">
                                                            <i class="fe fe-shopping-cart mx-2"></i>
                                                            <span>Add to cart</span>
                                                        </a>
                                                        <a href="javascript:void(0)" class="btn btn-light btn-svgs" data-bs-dismiss="alert" aria-label="Close">
                                                            <i class="fe fe-trash-2 mx-2"></i>
                                                            <span>Remove</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-4 col-xl-3 alert mb-0">
                                            <div class="card item-card">
                                                <div class="product-grid6  card-body">
                                                    <div class="product-image6">
                                                        <a href="javascript:void(0)">
                                                            <img class="img-fluid w-70 h-70" src="{{asset('build/assets/images/products/28.png')}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-center op-1">
                                                        <div class="text-center mb-2 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h4><a href="javascript:void(0)">Headphones</a></h4>
                                                        <div class="price">
                                                            <span class="mx-2">$325</span>
                                                            <span class="discount-price">$520</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <div class="btn-list">
                                                        <a href="{{url('cart')}}" class="btn btn-primary btn-svgs">
                                                            <i class="fe fe-shopping-cart mx-2"></i>
                                                            <span>Add to cart</span>
                                                        </a>
                                                        <a href="javascript:void(0)" class="btn btn-light btn-svgs" data-bs-dismiss="alert" aria-label="Close">
                                                            <i class="fe fe-trash-2 mx-2"></i>
                                                            <span>Remove</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-4 col-xl-3 alert mb-0">
                                            <div class="card item-card">
                                                <div class="product-grid6  card-body">
                                                    <div class="product-image6">
                                                        <a href="javascript:void(0)">
                                                            <img class="img-fluid w-70 h-70" src="{{asset('build/assets/images/products/27.png')}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-center op-1">
                                                        <div class="text-center mb-2 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h4><a href="javascript:void(0)">Women Hand Bag</a></h4>
                                                        <div class="price">
                                                            <span class="mx-2">$652</span>
                                                            <span class="discount-price">$758</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <div class="btn-list">
                                                        <a href="{{url('cart')}}" class="btn btn-primary btn-svgs">
                                                            <i class="fe fe-shopping-cart mx-2"></i>
                                                            <span>Add to cart</span>
                                                        </a>
                                                        <a href="javascript:void(0)" class="btn btn-light btn-svgs" data-bs-dismiss="alert" aria-label="Close">
                                                            <i class="fe fe-trash-2 mx-2"></i>
                                                            <span>Remove</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-4 col-xl-3 alert mb-0">
                                            <div class="card item-card">
                                                <div class="product-grid6  card-body">
                                                    <div class="product-image6">
                                                        <a href="javascript:void(0)">
                                                            <img class="img-fluid w-70 h-70" src="{{asset('build/assets/images/products/29.png')}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-center op-1">
                                                        <div class="text-center mb-2 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </div>
                                                        <h4><a href="javascript:void(0)">Black DIgital Camera</a></h4>
                                                        <div class="price">
                                                            <span class="mx-2">$224</span>
                                                            <span class="discount-price">$320</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <div class="btn-list">
                                                        <a href="{{url('cart')}}" class="btn btn-primary btn-svgs">
                                                            <i class="fe fe-shopping-cart mx-2"></i>
                                                            <span>Add to cart</span>
                                                        </a>
                                                        <a href="javascript:void(0)" class="btn btn-light btn-svgs" data-bs-dismiss="alert" aria-label="Close">
                                                            <i class="fe fe-trash-2 mx-2"></i>
                                                            <span>Remove</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-4 col-xl-3 alert mb-0">
                                            <div class="card item-card">
                                                <div class="product-grid6  card-body">
                                                    <div class="product-image6">
                                                        <a href="javascript:void(0)">
                                                            <img class="img-fluid w-70 h-70" src="{{asset('build/assets/images/products/1.png')}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-center op-1">
                                                        <div class="text-center mb-2 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h4><a href="javascript:void(0)">Leather Coat</a></h4>
                                                        <div class="price">
                                                            <span class="mx-2">$310</span>
                                                            <span class="discount-price">$430</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <div class="btn-list">
                                                        <a href="{{url('cart')}}" class="btn btn-primary btn-svgs">
                                                            <i class="fe fe-shopping-cart mx-2"></i>
                                                            <span>Add to cart</span>
                                                        </a>
                                                        <a href="javascript:void(0)" class="btn btn-light btn-svgs" data-bs-dismiss="alert" aria-label="Close">
                                                            <i class="fe fe-trash-2 mx-2"></i>
                                                            <span>Remove</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-4 col-xl-3 alert mb-0">
                                            <div class="card item-card">
                                                <div class="product-grid6  card-body ">
                                                    <div class="product-image6">
                                                        <a href="javascript:void(0)">
                                                            <img class="img-fluid w-70 h-70" src="{{asset('build/assets/images/products/19.png')}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-center op-1">
                                                        <div class="text-center mb-2 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h4><a href="javascript:void(0)">T-shirt</a></h4>
                                                        <div class="price">
                                                            <span class="mx-2">$320</span>
                                                            <span class="discount-price">$462</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <div class="btn-list">
                                                        <a href="{{url('cart')}}" class="btn btn-primary btn-svgs">
                                                            <i class="fe fe-shopping-cart mx-2"></i>
                                                            <span>Add to cart</span>
                                                        </a>
                                                        <a href="javascript:void(0)" class="btn btn-light btn-svgs" data-bs-dismiss="alert" aria-label="Close">
                                                            <i class="fe fe-trash-2 mx-2"></i>
                                                            <span>Remove</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-4 col-xl-3 alert mb-0">
                                            <div class="card item-card">
                                                <div class="product-grid6  card-body">
                                                    <div class="product-image6">
                                                        <a href="javascript:void(0)">
                                                            <img class="img-fluid w-70 h-70" src="{{asset('build/assets/images/products/24.png')}}" alt="img">
                                                        </a>
                                                    </div>
                                                    <div class="product-content text-center op-1">
                                                        <div class="text-center mb-2 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </div>
                                                        <h4><a href="javascript:void(0)">Womens Party wear</a></h4>
                                                        <div class="price">
                                                            <span class="mx-2">$524</span>
                                                            <span class="discount-price">$764</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <div class="btn-list">
                                                        <a href="{{url('cart')}}" class="btn btn-primary btn-svgs">
                                                            <i class="fe fe-shopping-cart mx-2"></i>
                                                            <span>Add to cart</span>
                                                        </a>
                                                        <a href="javascript:void(0)" class="btn btn-light btn-svgs" data-bs-dismiss="alert" aria-label="Close">
                                                            <i class="fe fe-trash-2 mx-2"></i>
                                                            <span>Remove</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-5">
                                            <div class="float-end">
                                                <ul class="pagination ">
                                                    <li class="page-item page-prev disabled">
                                                        <a class="page-link" href="javascript:void(0)" tabindex="-1">Prev</a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
                                                    <li class="page-item page-next">
                                                        <a class="page-link" href="javascript:void(0)">Next</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW CLOSED -->

@endsection

@section('scripts')

@endsection