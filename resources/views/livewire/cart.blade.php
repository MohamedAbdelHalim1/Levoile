@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">E-commerce</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
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
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <!-- Cart -->
                                    <div class="card">
                                        <div class="card-header">
                                            <span class="card-title">Shopping Cart</span>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-vcenter text-dark text-center">
                                                    <thead>
                                                        <tr class="border-top">
                                                            <th class="fw-semibold">Product</th>
                                                            <th class="fw-semibold">Title</th>
                                                            <th class="fw-semibold">Price</th>
                                                            <th class="fw-semibold">Quantity</th>
                                                            <th class="fw-semibold">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="text-center">
                                                                    <img src="{{asset('build/assets/images/products/7.jpg')}}" alt="" class="cart-img text-center">
                                                                </div>
                                                            </td>
                                                            <td>flowers</td>
                                                            <td class="fw-bold">$426</td>
                                                            <td>
                                                                <div class="handle-counter" id="handleCounter1">
                                                                    <button type="button" class="counter-minus btn btn-white lh-2 shadow-none" >
                                                                        <i class="fa fa-minus text-muted"></i>
                                                                    </button>
                                                                    <input type="text" value="2" class="qty">
                                                                    <button type="button" class="counter-plus btn btn-white lh-2 shadow-none">
                                                                        <i class="fa fa-plus text-muted"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class=" d-flex justify-content-center">
                                                                    <a class="btn text-info bg-info-transparent btn-icon py-1 me-2" data-bs-toggle="tooltip" data-bs-original-title="Edit" data-bs-custom-class="tooltip-secondary"><span class="bi bi-pencil-square fs-16"></span></a>
                                                                    <a class="btn text-danger bg-danger-transparent btn-icon py-1" data-bs-toggle="tooltip" data-bs-original-title="Delete"><span class="bi bi-trash fs-16"></span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="text-center">
                                                                    <img src="{{asset('build/assets/images/products/4.jpg')}}" alt="" class="cart-img">
                                                                </div>
                                                            </td>
                                                            <td>Smart Watch</td>
                                                            <td class="fw-bold">$1,984</td>
                                                            <td>
                                                                <div class="handle-counter" id="handleCounter2">
                                                                    <button type="button" class="counter-minus btn btn-white lh-2 shadow-none" >
                                                                        <i class="fa fa-minus text-muted"></i>
                                                                    </button>
                                                                    <input type="text" value="2" class="qty">
                                                                    <button type="button" class="counter-plus btn btn-white lh-2 shadow-none">
                                                                        <i class="fa fa-plus text-muted"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class=" d-flex justify-content-center">
                                                                    <a class="btn text-info bg-info-transparent btn-icon py-1 me-2" data-bs-toggle="tooltip" data-bs-original-title="Edit"><span class="bi bi-pencil-square fs-16"></span></a>
                                                                    <a class="btn text-danger bg-danger-transparent btn-icon py-1" data-bs-toggle="tooltip" data-bs-original-title="Delete"><span class="bi bi-trash fs-16"></span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="text-center">
                                                                    <img src="{{asset('build/assets/images/products/5.jpg')}}" alt="" class="cart-img">
                                                                </div>
                                                            </td>
                                                            <td>Headphones</td>
                                                            <td class="fw-bold">$128</td>
                                                            <td>
                                                                <div class="handle-counter" id="handleCounter3">
                                                                    <button type="button" class="counter-minus btn btn-white lh-2 shadow-none" >
                                                                        <i class="fa fa-minus text-muted"></i>
                                                                    </button>
                                                                    <input type="text" value="2" class="qty">
                                                                    <button type="button" class="counter-plus btn btn-white lh-2 shadow-none">
                                                                        <i class="fa fa-plus text-muted"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class=" d-flex justify-content-center">
                                                                    <a class="btn text-info bg-info-transparent btn-icon py-1 me-2" data-bs-toggle="tooltip" data-bs-original-title="Edit"><span class="bi bi-pencil-square fs-16"></span></a>
                                                                    <a class="btn text-danger bg-danger-transparent btn-icon py-1" data-bs-toggle="tooltip" data-bs-original-title="Delete"><span class="bi bi-trash fs-16"></span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="text-center">
                                                                    <img src="{{asset('build/assets/images/products/30.jpg')}}" alt="" class="cart-img">
                                                                </div>
                                                            </td>
                                                            <td>Furniture ( chair )</td>
                                                            <td class="fw-bold">$2,120</td>
                                                            <td>
                                                                <div class="handle-counter" id="handleCounter4">
                                                                    <button type="button" class="counter-minus btn btn-white lh-2 shadow-none" >
                                                                        <i class="fa fa-minus text-muted"></i>
                                                                    </button>
                                                                    <input type="text" value="2" class="qty">
                                                                    <button type="button" class="counter-plus btn btn-white lh-2 shadow-none">
                                                                        <i class="fa fa-plus text-muted"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class=" d-flex justify-content-center">
                                                                    <a class="btn text-info bg-info-transparent btn-icon py-1 me-2" data-bs-toggle="tooltip" data-bs-original-title="Edit"><span class="bi bi-pencil-square fs-16"></span></a>
                                                                    <a class="btn text-danger bg-danger-transparent btn-icon py-1" data-bs-toggle="tooltip" data-bs-original-title="Delete"><span class="bi bi-trash fs-16"></span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="text-center">
                                                                    <img src="{{asset('build/assets/images/products/8.jpg')}}" alt="" class="cart-img">
                                                                </div>
                                                            </td>
                                                            <td>Running Shoes</td>
                                                            <td class="fw-bold">$654</td>
                                                            <td>
                                                                <div class="handle-counter" id="handleCounter5">
                                                                    <button type="button" class="counter-minus btn btn-white lh-2 shadow-none" >
                                                                        <i class="fa fa-minus text-muted"></i>
                                                                    </button>
                                                                    <input type="text" value="2" class="qty">
                                                                    <button type="button" class="counter-plus btn btn-white lh-2 shadow-none">
                                                                        <i class="fa fa-plus text-muted"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class=" d-flex justify-content-center">
                                                                    <a class="btn text-info bg-info-transparent btn-icon py-1 me-2" data-bs-toggle="tooltip" data-bs-original-title="Edit"><span class="bi bi-pencil-square fs-16"></span></a>
                                                                    <a class="btn text-danger bg-danger-transparent btn-icon py-1" data-bs-toggle="tooltip" data-bs-original-title="Delete"><span class="bi bi-trash fs-16"></span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="input-group mt-3">
                                                        <input class="productcart form-control" type="text" placeholder="Coupon Code">
                                                        <a href="javascript:void(0)" class="btn btn-primary btn-lg">Apply Coupon</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Cart -->
                                </div>

                                <div class="col-lg-12">
                                    <div class="card ">
                                        <div class="card-header ">
                                            <h3 class="card-title">Order Summery</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered align-items-center">
                                                    <tbody class="text-dark">
                                                        <tr>
                                                            <td>Cart Subtotal</td>
                                                            <td class="text-end">$485.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Discount</span></td>
                                                            <td class="text-end text-success"><span>0.5%</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Totals</span></td>
                                                            <td class="text-end text-muted"><span>$456.00</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Order Total</span></td>
                                                            <td>
                                                                <h2 class="price text-end text-primary mb-0">$456.00</h2>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <form class="float-end mt-0">
                                                <a href="{{url('shop')}}" class="btn btn-primary mt-2"><i
                                                        class="fa fa-arrow-circle-left"></i> Continue Shopping</a>
                                                <a href="{{url('checkout')}}" class="btn btn-success mt-2">Checkout <i
                                                        class="fa fa-arrow-circle-right"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- CART JS -->
        @vite('resources/assets/js/cart.js')


@endsection