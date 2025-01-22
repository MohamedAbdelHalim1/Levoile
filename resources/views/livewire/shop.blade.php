@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">E-commerce</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
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
                            <div class="row row-cards">
                                <div class="col-lg-12 col-xl-9">
                                    <div class="row">
                                        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                                            <div class="card item-card ">
                                                <div class="ribbone">
                                                    <span class="ribbon1">
                                                        <span>25%</span>
                                                    </span>
                                                </div>
                                                <div class="card-body product">
                                                    <div class="text-center product-img">
                                                        <a href="{{url('product-details')}}">
                                                            <img src="{{asset('build/assets/images/products/6.jpg')}}" alt="img"
                                                            class="img-fluid w-100" >
                                                        </a>
                                                    </div>
                                                    <div class="text-center mt-4 products-content">
                                                        <div class="text-center text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <a href="javascript:void(0);">
                                                            <h5 class="mb-0 mt-2 fw-semibold">Backpack Bag</h5>
                                                        </a>
                                                        <div class="price mt-3 h4 mb-0 ">
                                                            <span class="h4 text-muted me-3 text-decoration-line-through">$999.00</span>
                                                            <span>$799.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="{{url('wishlist')}}"
                                                            class="btn  btn-outline-info my-1">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        <a href="{{url('product-details')}}"
                                                            class="btn btn-icon btn-outline-danger mt-1  mb-1">
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                        <a href="{{url('cart')}}"
                                                            class="btn btn-icon btn-outline-warning mt-1  mb-1">
                                                            <i class="fa fa-cart-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                                            <div class="card item-card">
                                                <div class="card-body product">
                                                    <div class="text-center product-img">
                                                        <a href="{{url('product-details')}}">
                                                            <img src="{{asset('build/assets/images/products/7.jpg')}}" alt="img"
                                                            class="img-fluid w-100">
                                                        </a>
                                                    </div>
                                                    <div class=" text-center mt-4 products-content">
                                                        <div class="text-center text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <a href="javascript:void(0);">
                                                            <h5 class="mb-0 mt-2 fw-semibold">Home Decores</h5>
                                                        </a>
                                                        <div class="price mt-3 h4 mb-0">
                                                            <span class="h4 text-muted me-3 text-decoration-line-through">$80.00</span>
                                                            <span>$59.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="{{url('wishlist')}}"
                                                            class="btn btn-outline-info my-1">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        <a href="{{url('product-details')}}"
                                                            class="btn btn-icon btn-outline-danger mt-1  mb-1">
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                        <a href="{{url('cart')}}"
                                                            class="btn btn-icon btn-outline-warning mt-1  mb-1">
                                                            <i class="fa fa-cart-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                                            <div class="card item-card">
                                                <div class="card-body product">
                                                    <div class="text-center product-img">
                                                        <a href="{{url('product-details')}}">
                                                            <img src="{{asset('build/assets/images/products/3.jpg')}}" alt="img"
                                                            class="img-fluid w-100">
                                                        </a>
                                                    </div>
                                                    <div class=" text-center mt-4 products-content">
                                                        <div class="text-center text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </div>
                                                        <a href="javascript:void(0);">
                                                            <h5 class="mb-0 mt-2 fw-semibold">Lather Hand Watch</h5>
                                                        </a>
                                                        <div class="price mt-3 h4 mb-0">
                                                            <span class="h4 text-muted me-3 text-decoration-line-through">$56.00</span>
                                                            <span>$38.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="{{url('wishlist')}}"
                                                            class="btn  btn-outline-info my-1">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        <a href="{{url('product-details')}}"
                                                            class="btn btn-icon btn-outline-danger mt-1  mb-1">
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                        <a href="{{url('cart')}}"
                                                            class="btn btn-icon btn-outline-warning mt-1  mb-1">
                                                            <i class="fa fa-cart-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                                            <div class="card item-card">
                                                <div class="card-body product">
                                                    <div class="text-center product-img">
                                                        <a href="{{url('product-details')}}">
                                                            <img src="{{asset('build/assets/images/products/8.jpg')}}" alt="img"
                                                            class="img-fluid w-100">
                                                        </a>
                                                    </div>
                                                    <div class=" text-center mt-4 products-content">
                                                        <div class="text-center text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <a href="javascript:void(0);">
                                                            <h5 class="mb-0 mt-2 fw-semibold">Casual Shoes</h5>
                                                        </a>
                                                        <div class="price mt-3 h4 mb-0">
                                                            <span class="h4 text-muted me-3 text-decoration-line-through">$76.00</span>
                                                            <span>$58.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="{{url('wishlist')}}"
                                                            class="btn  btn-outline-info my-1">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        <a href="{{url('product-details')}}"
                                                            class="btn btn-icon btn-outline-danger mt-1  mb-1">
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                        <a href="{{url('cart')}}"
                                                            class="btn btn-icon btn-outline-warning mt-1  mb-1">
                                                            <i class="fa fa-cart-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                                            <div class="card item-card">
                                                <div class="ribbone">
                                                    <span class="ribbon1">
                                                        <span>15%</span>
                                                    </span>
                                                </div>
                                                <div class="card-body product">
                                                    <div class="text-center product-img">
                                                        <a href="{{url('product-details')}}">
                                                            <img src="{{asset('build/assets/images/products/5.jpg')}}" alt="img"
                                                            class="img-fluid w-100">
                                                        </a>
                                                    </div>
                                                    <div class=" text-center mt-4 products-content">
                                                        <div class="text-center text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <a href="javascript:void(0);">
                                                            <h5 class="mb-0 mt-2 fw-semibold">Head Phones</h5>
                                                        </a>
                                                        <div class="price mt-3 h4 mb-0">
                                                            <span class="h4 text-muted me-3 text-decoration-line-through">$99.00</span>
                                                            <span>$74.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="{{url('wishlist')}}"
                                                            class="btn  btn-outline-info my-1">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        <a href="{{url('product-details')}}"
                                                            class="btn btn-icon btn-outline-danger mt-1  mb-1">
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                        <a href="{{url('cart')}}"
                                                            class="btn btn-icon btn-outline-warning mt-1  mb-1">
                                                            <i class="fa fa-cart-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                                            <div class="card item-card">
                                                <div class="ribbone">
                                                    <div class="ribbon4"><span>new</span></div>
                                                </div>
                                                <div class="card-body product">
                                                    <div class="text-center product-img">
                                                        <a href="{{url('product-details')}}">
                                                            <img src="{{asset('build/assets/images/products/4.jpg')}}"  alt="img"
                                                            class="img-fluid w-100">
                                                        </a>
                                                    </div>
                                                    <div class=" text-center mt-4 products-content">
                                                        <div class="text-center text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </div>
                                                        <a href="javascript:void(0);">
                                                            <h5 class="mb-0 mt-2 fw-semibold">Black Smart Watch</h5>
                                                        </a>
                                                        <div class="price mt-3 h4 mb-0">
                                                            <span class="h4 text-muted me-3 text-decoration-line-through">$45.00</span>
                                                            <span>$23.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="{{url('wishlist')}}"
                                                            class="btn  btn-outline-info my-1">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        <a href="{{url('product-details')}}"
                                                            class="btn btn-icon btn-outline-danger mt-1  mb-1">
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                        <a href="{{url('cart')}}"
                                                            class="btn btn-icon btn-outline-warning mt-1  mb-1">
                                                            <i class="fa fa-cart-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                                            <div class="card item-card">
                                                <div class="card-body product">
                                                    <div class="text-center product-img">
                                                        <a href="{{url('product-details')}}">
                                                            <img src="{{asset('build/assets/images/products/30.jpg')}}" alt="img"
                                                            class="img-fluid w-100">
                                                        </a>
                                                    </div>
                                                    <div class=" text-center mt-4 products-content">
                                                        <div class="text-center text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <a href="javascript:void(0);">
                                                            <h5 class="mb-0 mt-2 fw-semibold">Light Pink Sofa Chair</h5>
                                                        </a>
                                                        <div class="price mt-3 h4 mb-0">
                                                            <span class="h4 text-muted me-3 text-decoration-line-through">$25.00</span>
                                                            <span>$15.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="{{url('wishlist')}}"
                                                            class="btn  btn-outline-info my-1">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        <a href="{{url('product-details')}}"
                                                            class="btn btn-icon btn-outline-danger mt-1  mb-1">
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                        <a href="{{url('cart')}}"
                                                            class="btn btn-icon btn-outline-warning mt-1  mb-1">
                                                            <i class="fa fa-cart-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                                            <div class="card item-card">
                                                <div class="card-body product">
                                                    <div class="text-center product-img">
                                                        <a href="{{url('product-details')}}">
                                                            <img src="{{asset('build/assets/images/products/31.jpg')}}" alt="img"
                                                            class="img-fluid w-100">
                                                        </a>
                                                    </div>
                                                    <div class=" text-center mt-4 products-content">
                                                        <div class="text-center text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <a href="javascript:void(0);">
                                                            <h5 class="mb-0 mt-2 fw-semibold">Black Digital Camera</h5>
                                                        </a>
                                                        <div class="price mt-3 h4 mb-0">
                                                            <span class="h4 text-muted me-3 text-decoration-line-through">$56.00</span>
                                                            <span>$39.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="{{url('wishlist')}}"
                                                            class="btn  btn-outline-info my-1">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        <a href="{{url('product-details')}}"
                                                            class="btn btn-icon btn-outline-danger mt-1  mb-1">
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                        <a href="{{url('cart')}}"
                                                            class="btn btn-icon btn-outline-warning mt-1  mb-1">
                                                            <i class="fa fa-cart-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-4">
                                            <div class="card item-card">
                                                <div class="ribbone">
                                                    <span class="ribbon1">
                                                        <span>30%</span>
                                                    </span>
                                                </div>
                                                <div class="card-body product">
                                                    <div class="text-center product-img">
                                                        <a href="{{url('product-details')}}">
                                                            <img src="{{asset('build/assets/images/products/32.jpg')}}" alt="img"
                                                            class="img-fluid w-100">
                                                        </a>
                                                    </div>
                                                    <div class=" text-center mt-4 products-content">
                                                        <div class="text-center text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                        </div>
                                                        <a href="javascript:void(0);">
                                                            <h5 class="mb-0 mt-2 fw-semibold">Lather Hand Bag</h5>
                                                        </a>
                                                        <div class="price mt-3 h4 mb-0">
                                                            <span class="h4 text-muted me-3 text-decoration-line-through">$28.00</span>
                                                            <span>$15.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="{{url('wishlist')}}"
                                                            class="btn  btn-outline-info my-1">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        <a href="{{url('product-details')}}"
                                                            class="btn btn-icon btn-outline-danger mt-1  mb-1">
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                        <a href="{{url('cart')}}"
                                                            class="btn btn-icon btn-outline-warning mt-1  mb-1">
                                                            <i class="fa fa-cart-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mb-3 shop-count">
                                            <p>1 - 10 of 234 photos</p>
                                        </div>
                                        <div class="col-md-6 mb-3 col-sm-12">
                                            <div class="float-end shop-pagination">
                                                <ul class="pagination">
                                                    <li class="page-item page-prev disabled">
                                                        <a class="page-link" href="javascript:void(0);" tabindex="-1">Prev</a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                                                    <li class="page-item page-next">
                                                        <a class="page-link" href="javascript:void(0);">Next</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- row end -->
                                </div>
                                <!-- row end -->


                                <div class="col-lg-12 col-xl-3">
                                    <div class="card border-0">
                                        <div class="row card-body p-0">
                                            <div class="col-sm-12 p-0">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search ...">
                                                    <button class="btn btn-primary" type="button">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title"> Categories &amp; Fliters</div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1" checked="">
                                                        <label for="checkbox-1" class="custom-control-label">Mens</label>
                                                    </div>
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                        <label for="checkbox-2" class="custom-control-label">Womens</label>
                                                    </div>
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-3">
                                                        <label for="checkbox-3" class="custom-control-label">Kids</label>
                                                    </div>
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-4">
                                                        <label for="checkbox-4" class="custom-control-label">Others</label>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label class="form-label">Category</label>
                                                        <select name="beast" id="select-beast" class="form-control custom-select select2">
                                                            <option value="0">--Select--</option>
                                                            <option value="1">Dress</option>
                                                            <option value="2">Bags &amp; Purses</option>
                                                            <option value="3">Coat &amp; Jacket</option>
                                                            <option value="4">Beauty</option>
                                                            <option value="5">Jeans</option>
                                                            <option value="5">Jewellery</option>
                                                            <option value="5">Electronics</option>
                                                            <option value="5">Sports</option>
                                                            <option value="5">Technology</option>
                                                            <option value="5">Watches</option>
                                                            <option value="5">Accessories</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Brand</label>
                                                        <select name="beast" id="select-beast1" class="form-control custom-select select2">
                                                            <option value="0">--Select--</option>
                                                            <option value="1">White</option>
                                                            <option value="2">Black</option>
                                                            <option value="3">Red</option>
                                                            <option value="4">Green</option>
                                                            <option value="5">Blue</option>
                                                            <option value="6">Yellow</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Type</label>
                                                        <select name="beast" id="select-beast2" class="form-control custom-select select2">
                                                            <option value="0">--Select--</option>
                                                            <option value="1">Extra Small</option>
                                                            <option value="2">Small</option>
                                                            <option value="3">Medium</option>
                                                            <option value="4">Large</option>
                                                            <option value="5">Extra Large</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Color</label>
                                                        <select name="beast" id="select-beast3" class="form-control custom-select select2">
                                                            <option value="0">--Select--</option>
                                                            <option value="1">White</option>
                                                            <option value="2">Black</option>
                                                            <option value="3">Red</option>
                                                            <option value="4">Green</option>
                                                            <option value="5">Blue</option>
                                                            <option value="6">Yellow</option>
                                                        </select>
                                                    </div>
                                                    <div class="btn-list">
                                                        <a class="btn btn-primary " href="javascript:void(0)">Apply Filter</a>
                                                        <a class="btn btn-danger" href="javascript:void(0)">Search Now</a>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- Filter -->
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h3 class="card-title">
                                                        Price
                                                    </h3>
                                                    <button type="button" class="btn btn-sm btn-info">Apply</button>
                                                </div>
                                                <div class="card-body">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="example-radios" value="option1" checked="">
                                                        <span class="custom-control-label">Under $25</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="example-radios" value="option2">
                                                        <span class="custom-control-label">$25 to $50</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="example-radios" value="option2">
                                                        <span class="custom-control-label">$50 to $100</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="example-radios" value="option2">
                                                        <span class="custom-control-label">Other (specify)</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- row end -->
                                </div><!-- col end -->
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- SELECT2 JS -->
        <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
        @vite('resources/assets/js/select2.js')

        
@endsection