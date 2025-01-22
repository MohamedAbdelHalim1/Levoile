@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Search</li>
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
                                <div class="col-lg-3">
                                    <div class="row">
                                        <!-- row -->
                                        <div class="col-md-12 col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Categories</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="search-radio mb-3">
                                                        <div class="radio">
                                                            <input type="radio" name="shop-filter__price"
                                                                id="shop-filter-price_1" value="" checked="">
                                                            <label for="shop-filter-price_1">Mens</label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="shop-filter__price"
                                                                id="shop-filter-price_2" value="">
                                                            <label for="shop-filter-price_2">Womens</label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="shop-filter__price"
                                                                id="shop-filter-price_3" value="">
                                                            <label for="shop-filter-price_3">kids</label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="shop-filter__price"
                                                                id="shop-filter-price_4" value="specify">
                                                            <label for="shop-filter-price_4" class="mb-0">
                                                                Accessories</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Category</label>
                                                        <select name="beast" id="select-beast4"
                                                            class="form-control form-select select2">
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
                                                    <a class="btn btn-primary btn-sm" href="javascript:void(0);">Search</a>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Category Filters</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label class="form-label">Brand</label>
                                                        <select name="beast" id="select-beast"
                                                            class="form-control form-select select2">
                                                            <option value="0">--Select--</option>
                                                            <option value="1">Wallmart</option>
                                                            <option value="2">Catseye</option>
                                                            <option value="3">Moonsoon</option>
                                                            <option value="4">Textmart</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Color</label>
                                                        <select name="beast" id="select-beast2"
                                                            class="form-control form-select select2">
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
                                                        <select name="beast" id="select-beast3"
                                                            class="form-control form-select select2">
                                                            <option value="0">--Select--</option>
                                                            <option value="1">Extra Small</option>
                                                            <option value="2">Small</option>
                                                            <option value="3">Medium</option>
                                                            <option value="4">Large</option>
                                                            <option value="5">Extra Large</option>
                                                        </select>
                                                    </div>
                                                    <a class="btn btn-success btn-sm" href="javascript:void(0);">Apply Filter</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- row end -->
                                </div><!-- col end -->
                                <div class="col-lg-9">
                                    <div class="input-group w-40 ms-auto">
                                        <input type="text" class="form-control bg-white" placeholder="Search here...">
                                        <button type="button" class="btn btn-primary ">
                                            <i class="fa fa-search " aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class="card mt-5 users store">
                                        <div class="table-responsive">
                                            <table class="table card-table table-vcenter text-nowrap">
                                                <tbody class="text-dark">
                                                    <tr class="border-bottom">
                                                        <td class="w-10 border-top-0">
                                                            <div>
                                                                <img src="{{asset('build/assets/images/products/36.png')}}" alt="" class="h-8 rounded-3 bg-light">
                                                            </div>
                                                        </td>
                                                        <td class="w-10 border-top-0">Mens Jackets</td>
                                                        <td class="border-top-0">
                                                            <div class="rating-stars block" id="rating1">
                                                                <div class="rating-stars-container">
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-end text-primary d-none d-md-table-cell text-nowrap border-top-0"><span class="">50%</span> off</td>

                                                        <td class="text-end border-top-0">
                                                            <strong class="">$1,987</strong>
                                                        </td>
                                                        <td class="text-end border-top-0"><a class="btn btn-primary btn-sm text-white me-2 border-top-0">view</a></td>
                                                    </tr>
                                                    <tr class="border-bottom">
                                                        <td class="w-10">
                                                            <img src="{{asset('build/assets/images/products/39.png')}}" alt="" class="h-8 rounded-3 bg-light">
                                                        </td>
                                                        <td class="w-10"> Occational Special Edition</td>
                                                        <td>
                                                            <div class="rating-stars block" id="rating7">
                                                                <div class="rating-stars-container">
                                                                    <div class="rating-star is--active sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star is--active sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star is--active sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-end text-green d-none d-md-table-cell text-nowrap "><span class="">60%</span> off</td>
                                                        <td class="text-end">
                                                            <strong class="">$2,679</strong>
                                                        </td>
                                                        <td class="text-end"><a class="btn btn-primary btn-sm text-white me-2">view</a></td>
                                                    </tr>
                                                    <tr class="border-bottom">
                                                        <td class="w-10">
                                                            <img src="{{asset('build/assets/images/products/33.png')}}" alt="" class="h-8 rounded-3 bg-light">
                                                        </td>
                                                        <td class="w-10">Watch
                                                            <div class="badge bg-primary badge-md">New</div>
                                                        </td>
                                                        <td>
                                                            <div class="rating-stars block" id="rating8">
                                                                <div class="rating-stars-container">
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-end text-warning d-none d-md-table-cell text-nowrap"><span class="">25%</span> off</td>
                                                        <td class="text-end">
                                                            <strong class="">$999</strong>
                                                        </td>
                                                        <td class="text-end"><a class="btn btn-primary btn-sm text-white me-2">view</a></td>
                                                    </tr>
                                                    <tr class="border-bottom">
                                                        <td class="w-10">
                                                            <img src="{{asset('build/assets/images/products/35.png')}}" alt="" class="h-8 rounded-3 bg-light">
                                                        </td>
                                                        <td class="w-10">Western Wear</td>
                                                        <td>
                                                            <div class="rating-stars block" id="rating2">
                                                                <div class="rating-stars-container">
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-end text-info d-none d-md-table-cell text-nowrap"><span class="">30%</span> off</td>
                                                        <td class="text-end">
                                                            <strong class="">$699</strong>
                                                        </td>
                                                        <td class="text-end"><a class="btn btn-primary btn-sm text-white me-2">view</a></td>
                                                    </tr>
                                                    <tr class="border-bottom">
                                                        <td class="w-10">
                                                            <img src="{{asset('build/assets/images/products/41.png')}}" alt="" class="h-8 rounded-3 bg-light">
                                                        </td>
                                                        <td class="w-10">Kids Dress
                                                            <div class="badge badge-default badge-md">New</div>
                                                        </td>
                                                        <td>
                                                            <div class="rating-stars block" id="rating9">
                                                                <div class="rating-stars-container">
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-end text-primary d-none d-md-table-cell text-nowrap"><span class="">47%</span> off</td>
                                                        <td class="text-end">
                                                            <strong class="">$399</strong>
                                                        </td>
                                                        <td class="text-end"><a class="btn btn-primary btn-sm text-white me-2">view</a></td>
                                                    </tr>
                                                    <tr class="border-bottom">
                                                        <td class="w-10">
                                                            <img src="{{asset('build/assets/images/products/34.png')}}" alt="" class="h-8 rounded-3 bg-light">
                                                        </td>
                                                        <td class="w-10">Kids Toys</td>
                                                        <td>
                                                            <div class="rating-stars block" id="rating3">
                                                                <div class="rating-stars-container">
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-end text-success d-none d-md-table-cell text-nowrap"><span class="">26%</span> off</td>
                                                        <td class="text-end">
                                                            <strong class="">$299</strong>
                                                        </td>
                                                        <td class="text-end"><a class="btn btn-primary btn-sm text-white me-2">view</a></td>
                                                    </tr>
                                                    <tr class="border-bottom">
                                                        <td class="w-10">
                                                            <img src="{{asset('build/assets/images/products/38.png')}}" alt="" class="h-8 rounded-3 bg-light">
                                                        </td>
                                                        <td class="w-10">Camera
                                                            <div class="badge bg-primary badge-md">New</div>
                                                        </td>
                                                        <td>
                                                            <div class="rating-stars block" id="rating10">
                                                                <div class="rating-stars-container">
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-end text-warning d-none d-md-table-cell text-nowrap"><span class="">43%</span> off</td>
                                                        <td class="text-end">
                                                            <strong class="">$22,269</strong>
                                                        </td>
                                                        <td class="text-end"><a class="btn btn-primary btn-sm text-white me-2">view</a></td>
                                                    </tr>
                                                    <tr class="border-bottom">
                                                        <td class="w-10">
                                                            <img src="{{asset('build/assets/images/products/37.png')}}" alt="" class="h-8 rounded-3 bg-light">
                                                        </td>
                                                        <td class="w-10">Novel Book</td>
                                                        <td>
                                                            <div class="rating-stars block" id="rating11">
                                                                <div class="rating-stars-container">
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-end text-info d-none d-md-table-cell text-nowrap"><span class="">20%</span> off</td>
                                                        <td class="text-end">
                                                            <strong class="">$9,999</strong>
                                                        </td>
                                                        <td class="text-end"><a class="btn btn-primary btn-sm text-white me-2">view</a></td>
                                                    </tr>
                                                    <tr class="border-bottom-0">
                                                        <td class="w-10">
                                                            <img src="{{asset('build/assets/images/products/40.png')}}" alt="" class="h-8 rounded-3 bg-light">
                                                        </td>
                                                        <td class="w-10">Dumbles
                                                            <div class="badge badge-default badge-md">New</div>
                                                        </td>
                                                        <td>
                                                            <div class="rating-stars block" id="rating5">
                                                                <div class="rating-stars-container">
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <div class="rating-star sm is--active">
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-end text-primary d-none d-md-table-cell text-nowrap"><span class="">14%</span> off</td>
                                                        <td class="text-end">
                                                            <strong class="">$899</strong>
                                                        </td>
                                                        <td class="text-end"><a class="btn btn-primary btn-sm text-white me-2">view</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div >
                                        <ul class="pagination mb-5 float-end">
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
                                </div><!-- col end -->
                            </div>
                            <!-- ROW END  -->

@endsection

@section('scripts')

        <!-- STAR RATING JS -->
        <script src="{{asset('build/assets/plugins/rating/jquery-rate-picker.js')}}"></script>
        <script src="{{asset('build/assets/plugins/rating/rating-picker.js')}}"></script>

        <!-- STAR RATING-1 JS -->
        <script src="{{asset('build/assets/plugins/ratings-2/jquery.star-rating.js')}}"></script>
        <script src="{{asset('build/assets/plugins/ratings-2/star-rating.js')}}"></script>

        <!-- SELECT2 JS -->
        <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
        @vite('resources/assets/js/select2.js')


@endsection