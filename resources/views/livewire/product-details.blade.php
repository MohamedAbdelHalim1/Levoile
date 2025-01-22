@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">E-commerce</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Product Details</li>
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
                                    <div class="card">
                                        <div class="card-body single-productslide">
                                            <div class="product-carousel product-gallery">
                                                <div id="Slider" class="carousel slide border" data-bs-ride="false">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active product-item"><img src="{{asset('build/assets/images/products/23.png')}}" alt="img" class="img-fluid mx-auto d-block">
                                                            <div class="text-center mb-5 mt-5 btn-list">
                                                            </div>
                                                        </div>
                                                        <div class="carousel-item"> <img src="{{asset('build/assets/images/products/22.png')}}" alt="img" class="img-fluid mx-auto d-block">
                                                            <div class="text-center mb-5 mt-5 btn-list">
                                                            </div>
                                                        </div>
                                                        <div class="carousel-item"> <img src="{{asset('build/assets/images/products/21.png')}}" alt="img" class="img-fluid mx-auto d-block">
                                                            <div class="text-center mb-5 mt-5 btn-list">
                                                            </div>
                                                        </div>
                                                        <div class="carousel-item"> <img src="{{asset('build/assets/images/products/20.png')}}" alt="img" class="img-fluid mx-auto d-block">
                                                            <div class="text-center mb-5 mt-5 btn-list">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center carousel-slider">
                                                <div id="thumbcarousel" class="carousel slide" data-bs-interval="t">
                                                    <div class="carousel-inner">
                                                        <ul class="carousel-item active product-sm-gallery">
                                                            <li data-bs-target="#Slider" data-bs-slide-to="0" class="thumb active m-2 item-gallery"><img src="{{asset('build/assets/images/products/23.png')}}" alt="img"></li>
                                                            <li data-bs-target="#Slider" data-bs-slide-to="1" class="thumb m-2 item-gallery"><img src="{{asset('build/assets/images/products/22.png')}}" alt="img"></li>
                                                            <li data-bs-target="#Slider" data-bs-slide-to="2" class="thumb m-2 item-gallery"><img src="{{asset('build/assets/images/products/21.png')}}" alt="img"></li>
                                                            <li data-bs-target="#Slider" data-bs-slide-to="3" class="thumb m-2 item-gallery"><img src="{{asset('build/assets/images/products/20.png')}}" alt="img"></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-gallery-data mb-0">
                                                <h3 class="mb-3 fw-semibold">Half Hands T-shirt ( for Casual Wear.) </h3>
                                                <div class="mb-3">
                                                    <span class="fw-semibold h1 text-dark">$56</span>
                                                    <span class="text-primary ms-2"><i class="fa fa-info-circle"></i> 20%
                                                        off</span>
                                                </div>
                                                <h6 class="fw-semibold mt-3">DESCRIPTION</h6>
                                                <p class="text-muted">labore et dolore magna enim ad minim veniam, quis
                                                    nostrud
                                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                                    Duis
                                                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                                    eu
                                                    fugiat nulla pariatur.</p>
                                                <dl class="product-gallery-data1">
                                                    <dt>Color</dt>
                                                    <dd>Navy Blue</dd>
                                                </dl>
                                                <dl class="product-gallery-data1">
                                                    <dt>Features</dt>
                                                    <dd>Fabric Premium made T-shirt</dd>
                                                </dl>
                                                <dl class="product-gallery-data1">
                                                    <dt>Delivery</dt>
                                                    <dd>Russia, USA, and Europe</dd>
                                                </dl>
                                                <div class="product-gallery-rats">
                                                    <ul class="product-gallery-rating">
                                                        <li>
                                                            <a href="javascript:void(0);"><i class="fa fa-star text-warning"></i></a>
                                                            <a href="javascript:void(0);"><i class="fa fa-star text-warning"></i></a>
                                                            <a href="javascript:void(0);"><i class="fa fa-star text-warning"></i></a>
                                                            <a href="javascript:void(0);"><i class="fa fa-star text-warning"></i></a>
                                                            <a href="javascript:void(0);"><i class="fa fa-star-o text-warning"></i></a>
                                                        </li>
                                                    </ul>
                                                    <div class="label-rating ms-2">793 reviews</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mb-0">
                                                        <dl class="product-gallery-quty d-flex align-items-center mx-2 mt-2 mb-0">
                                                            <dt class="mb-2 me-2">Quantity :</dt>
                                                            <dd>
                                                                <div class="form-group mb-0">
                                                                    <select name="quantity" id="select-countries17"
                                                                        class="form-control select2 select-sm  w-8 form-select">
                                                                        <option value="1" selected="">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                    </select>
                                                                </div>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-12">
                                                        <dl class="product-gallery-size d-flex">
                                                            <dt class="me-2">Size:</dt>
                                                            <dd>
                                                                <div
                                                                    class="product-gallery-checks custom-controls-stacked">
                                                                    <label class="custom-control custom-checkbox ms-0">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            name="scheckbox" value="option1" checked>
                                                                        <span class="custom-control-label">SM</span>
                                                                    </label>
                                                                    <label class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            name="scheckbox" value="option1">
                                                                        <span class="custom-control-label">MD</span>
                                                                    </label>
                                                                    <label class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            name="scheckbox" value="option1">
                                                                        <span class="custom-control-label">XL</span>
                                                                    </label>
                                                                    <label class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            name="scheckbox" value="option1">
                                                                        <span class="custom-control-label">XXL</span>
                                                                    </label>
                                                                </div>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-end">
                                            <a href="{{url('checkout')}}" class="btn btn-primary"> Buy now </a>
                                            <a href="{{url('cart')}}" class="btn btn-info"> <i class="fa fa-shopping-cart"></i> Add to
                                                cart </a>
                                        </div>
                                    </div>
                                </div>
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
                                                    <h3 class="card-title">
                                                        Colors
                                                    </h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row gutters-xs">
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="azure"
                                                                    class="colorinput-input" checked="">
                                                                <span class="colorinput-color bg-azure"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="indigo"
                                                                    class="colorinput-input">
                                                                <span class="colorinput-color bg-indigo"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="purple"
                                                                    class="colorinput-input">
                                                                <span class="colorinput-color bg-purple"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="pink"
                                                                    class="colorinput-input">
                                                                <span class="colorinput-color bg-pink"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="red"
                                                                    class="colorinput-input">
                                                                <span class="colorinput-color bg-red"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="orange"
                                                                    class="colorinput-input">
                                                                <span class="colorinput-color bg-orange"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="yellow"
                                                                    class="colorinput-input">
                                                                <span class="colorinput-color bg-yellow"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="lime"
                                                                    class="colorinput-input">
                                                                <span class="colorinput-color bg-lime"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="green"
                                                                    class="colorinput-input">
                                                                <span class="colorinput-color bg-green"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="colorinput">
                                                                <input name="color" type="radio" value="teal"
                                                                    class="colorinput-input">
                                                                <span class="colorinput-color bg-teal"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title"> Categories</div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label class="form-label">Mens</label>
                                                        <select name="beast" id="select-beast"
                                                            class="form-control form-select select2">
                                                            <option value="0">--Select--</option>
                                                            <option value="1">Foot wear</option>
                                                            <option value="2">Top wear</option>
                                                            <option value="3">Bootom wear</option>
                                                            <option value="4">Men's Groming</option>
                                                            <option value="5">Accessories</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Women</label>
                                                        <select name="beast" id="select-beast1"
                                                            class="form-control form-select select2">
                                                            <option value="0">--Select--</option>
                                                            <option value="1">Western wear</option>
                                                            <option value="2">Foot wear</option>
                                                            <option value="3">Top wear</option>
                                                            <option value="4">Bootom wear</option>
                                                            <option value="5">Beuty Groming</option>
                                                            <option value="6">Accessories</option>
                                                            <option value="7">jewellery</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Baby & Kids</label>
                                                        <select name="beast" id="select-beast2"
                                                            class="form-control form-select select2">
                                                            <option value="0">--Select--</option>
                                                            <option value="1">Boys clothing</option>
                                                            <option value="2">girls Clothing</option>
                                                            <option value="3">Toys</option>
                                                            <option value="4">Baby Care</option>
                                                            <option value="5">Kids footwear</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Electronics</label>
                                                        <select name="beast" id="select-beast3"
                                                            class="form-control form-select select2">
                                                            <option value="0">--Select--</option>
                                                            <option value="1">Mobiles</option>
                                                            <option value="2">Laptops</option>
                                                            <option value="3">Gaming & Accessories</option>
                                                            <option value="4">Health care Appliances</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Sport,Books & More </label>
                                                        <select name="beast" id="select-beast4"
                                                            class="form-control form-select select2">
                                                            <option value="0">--Select--</option>
                                                            <option value="1">Stationery</option>
                                                            <option value="2">Books</option>
                                                            <option value="3">Gaming</option>
                                                            <option value="4">Music</option>
                                                            <option value="5">Exercise & fitness</option>
                                                        </select>
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