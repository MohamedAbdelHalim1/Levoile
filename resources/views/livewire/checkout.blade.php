@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">E-commerce</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
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
                                <div class="col-xl-8 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Billing Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">First Name <span
                                                                class="text-red">*</span></label>
                                                        <input type="text" class="form-control" placeholder="First name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Last Name <span
                                                                class="text-red">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Last name">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Company Name <span
                                                                class="text-red">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Company name">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Email address <span
                                                                class="text-red">*</span></label>
                                                        <input type="email" class="form-control" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Country <span
                                                                class="text-red">*</span></label>
                                                        <select class="form-control select2 form-select"
                                                            data-placeholder="Select">
                                                            <option label="Select"></option>
                                                            <option value="1">Germany</option>
                                                            <option value="2">Canada</option>
                                                            <option value="3">Usa</option>
                                                            <option value="4">Aus</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Address <span
                                                                class="text-red">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Home Address">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">City <span
                                                                class="text-red">*</span></label>
                                                        <input type="text" class="form-control" placeholder="City">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Postal Code <span
                                                                class="text-red">*</span></label>
                                                        <input type="number" class="form-control" placeholder="ZIP Code">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Payment Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-pay">
                                                <ul class="tabs-menu nav checkout">
                                                    <li><a href="#tab20" class="active" data-bs-toggle="tab"><i
                                                                class="fa fa-credit-card"></i> Credit Card</a></li>
                                                    <li><a href="#tab21" data-bs-toggle="tab"><i class="fa fa-paypal"></i>
                                                            Paypal</a></li>
                                                    <li><a href="#tab22" data-bs-toggle="tab"><i
                                                                class="fa fa-university"></i>
                                                            Bank Transfer</a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active show" id="tab20">
                                                        <div class="bg-danger-transparent-2 text-danger br-3 mb-4"
                                                            role="alert">
                                                            Please Enter Valid Details</div>
                                                        <div class="form-group">
                                                            <label class="form-label">Card Holder Name</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="First Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Card number</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Search for...">
                                                                <span class="input-group-text btn btn-success shadow-none">
                                                                    <i class="fa fa-cc-visa"></i> &nbsp; <i
                                                                        class="fa fa-cc-amex"></i> &nbsp;
                                                                    <i class="fa fa-cc-mastercard"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <label class="form-label">Expiration</label>
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control"
                                                                            placeholder="MM" name="Month">
                                                                        <input type="number" class="form-control"
                                                                            placeholder="YYYY" name="Year">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label class="form-label">CVV <i
                                                                            class="fa fa-question-circle"></i></label>
                                                                    <input type="number" class="form-control" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="javascript:void(0);" class="btn btn-primary">Confirm</a>
                                                    </div>
                                                    <div class="tab-pane" id="tab21" role="tabpanel">
                                                        <p class="mt-4">Paypal is easiest way to pay
                                                            online
                                                        </p>
                                                        <p><a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-paypal"></i> Log in my
                                                                Paypal</a></p>
                                                        <p class="mb-0"><strong>Note:</strong> Nemo enim
                                                            ipsam voluptatem quia voluptas sit
                                                            aspernatur
                                                            aut odit aut fugit, sed quia consequuntur
                                                            magni
                                                            dolores eos qui ratione voluptatem sequi
                                                            nesciunt. </p>
                                                    </div>
                                                    <div class="tab-pane" id="tab22">
                                                        <p>Bank account details</p>
                                                        <dl class="card-text">
                                                            <dt>BANK: </dt>
                                                            <dd> THE UNION BANK 0456</dd>
                                                        </dl>
                                                        <dl class="card-text">
                                                            <dt>Account Number: </dt>
                                                            <dd> 67542897653214</dd>
                                                        </dl>
                                                        <dl class="card-text">
                                                            <dt>IBAN: </dt>
                                                            <dd>543218769</dd>
                                                        </dl>
                                                        <p class="mb-0"><strong>Note:</strong> Nemo enim ipsam voluptatem
                                                            quia
                                                            voluptas sit aspernatur aut odit aut fugit, sed quia
                                                            consequuntur
                                                            magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-12">
                                    <div class="card cart">
                                        <div class="card-header border-bottom">
                                            <h3 class="card-title">Your Order</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <img class="avatar-xl p-0 br-7"
                                                    src="{{asset('build/assets/images/pngs/12.png')}}" alt="img">
                                                <div class="ms-3">
                                                    <h4 class="mb-1 fw-semibold fs-14"><a href="{{url('product-details')}}">Rounded Shape Digital
                                                            Watch For Men</a></h4>
                                                    <div class="text-warning fs-14">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur.</p>
                                                </div>
                                                <div class="ms-auto">
                                                    <span class="me-4 fs-16 fw-semibold lh-1">$438</span>
                                                </div>
                                            </div>
                                            <div class="d-flex mt-5">
                                                <img class="avatar-xl p-0 br-7"
                                                    src="{{asset('build/assets/images/pngs/1.png')}}" alt="img">
                                                <div class="ms-3">
                                                    <h4 class="mb-1 fw-semibold fs-14"><a href="{{url('product-details')}}">Digital Camera Pro
                                                            30.2MP
                                                            With Lens</a></h4>
                                                    <div class="text-warning fs-14">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p class="mb-0">Lorem ipsum dolor sit.</p>
                                                </div>
                                                <div class="ms-auto">
                                                    <span class="me-4 fs-16 fw-semibold lh-1">$765</span>
                                                </div>
                                            </div>
                                            <div class="d-flex mt-5">
                                                <img class="avatar-xl p-0 br-7"
                                                    src="{{asset('build/assets/images/pngs/3.png')}}" alt="img">
                                                <div class="ms-3">
                                                    <h4 class="mb-1 fw-semibold fs-14"><a href="{{url('product-details')}}">Wood Photo Frame(M)
                                                            With
                                                            Wall Decorators</a></h4>
                                                    <div class="text-warning fs-14">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                                </div>
                                                <div class="ms-auto">
                                                    <span class="me-4 fs-16 fw-semibold lh-1">$543</span>
                                                </div>
                                            </div>
                                            <table class="table mt-5 table-bordered">
                                                <tr class="your-order">
                                                    <td>Sub Total</td>
                                                    <td class="text-end">$4,360</td>
                                                </tr>
                                                <tr class="your-order">
                                                    <td>Discount</td>
                                                    <td class="text-end">5%</td>
                                                </tr>
                                                <tr class="your-order">
                                                    <td>Shipping</td>
                                                    <td class="text-end">Free</td>
                                                </tr>
                                                <tr class="your-order">
                                                    <td class="fs-18">Total</td>
                                                    <td class="text-end fs-18 text-primary fw-semibold">$3,976
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="card-footer text-end">
                                            <input type='button' class="btn btn-primary" value='Place order'
                                            id='palce-order'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW CLOSED -->

@endsection

@section('scripts')

        <!-- SELECT2 JS -->
        <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
        @vite('resources/assets/js/select2.js')

        <!-- SWEET-ALERT JS -->
        <script src="{{asset('build/assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>

        <!-- CHECKOUT JS -->
        @vite('resources/assets/js/checkout.js')


@endsection