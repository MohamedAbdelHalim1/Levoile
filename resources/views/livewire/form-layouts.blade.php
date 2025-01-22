@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Components</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Forms</li>
                                    <li class="breadcrumb-item active" aria-current="page">Form Layouts</li>
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
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Horizonal Alignment</h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-muted">It is Very Easy to Customize and it uses in your website
                                                apllication.</p>
                                            <div class="row">
                                                <div class="col-md-5 mb-3">
                                                    <input class="form-control" placeholder="Enter your username"
                                                        type="text">
                                                </div>
                                                <div class="col-md-5 mb-3">
                                                    <input class="form-control" placeholder="Enter your password"
                                                        type="password">
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-primary btn-block">Sign In</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Vertical Alignement</h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-muted">It is Very Easy to Customize and it uses in your website
                                                apllication.</p>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="p-2">
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Enter your username"
                                                                type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" placeholder="Enter your password"
                                                                type="password">
                                                        </div>
                                                        <button class="btn btn-primary">Sign In</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row row-deck">
                                <div class="col-lg-6 col-md-">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <h3 class="card-title">Basic Example</h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-muted">A form control layout using basic layout.</p>
                                            <div class="d-flex flex-column">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Enter your username"
                                                        type="text">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Enter Your Email" type="email">
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input class="form-control" id="passwordElement"
                                                            placeholder="Enter Your Password" type="password">
                                                        <button class="input-group-text btn btn-primary text-white"
                                                            id="showBtn">
                                                            <i class="fe fe-eye text-white" id="eyeOpen"></i>
                                                            <i class="fe fe-eye-off text-white d-none" id="eyeClose"></i>
                                                        </button>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="ckbox d-flex align-items-center">
                                                        <input type="checkbox"><span class="text-13">I agree terms and
                                                            conditions</span>
                                                    </label>
                                                </div>
                                                <button class="btn ripple btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Left Label Alignment</h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-muted">It is Very Easy to Customize and it uses in your website
                                                apllication.</p>
                                            <form class="form-horizontal">
                                                <div class="row mb-4">
                                                    <label for="firstName" class="col-md-3 form-label">Firstname</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" id="firstName"
                                                            placeholder="Enter your firstname" type="text">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="lastName" class="col-md-3 form-label">Lastname</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" id="lastName"
                                                            placeholder="Enter your lastname" type="text">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="email" class="col-md-3 form-label">Email</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" id="email"
                                                            placeholder="Enter your email" type="email">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="ckbox d-flex align-items-center">
                                                            <input type="checkbox"><span class="text-13">I agree terms and
                                                                conditions</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Form Group Wrapper</h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-muted">It is Very Easy to Customize and it uses in your website
                                                apllication.</p>
                                            <div class="row row-xs form-group-wrapper">
                                                <div class="col-md-6 mb-3">
                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control" id="floatingInput"
                                                            placeholder="name@example.com">
                                                        <label for="floatingInput">Email</label>
                                                    </div><!-- main-form-group -->
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="form-floating">
                                                        <input type="password" class="form-control" id="floatingPassword"
                                                            placeholder="Password">
                                                        <label for="floatingPassword">Password</label>
                                                    </div><!-- main-form-group -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Form in Dropdown</h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-muted">It is Very Easy to Customize and it uses in your website
                                                apllication.</p>
                                            <div class="main-dropdown-form-demo">
                                                <button class="btn btn-primary" data-bs-toggle="dropdown">Live Example <i
                                                        class="icon ion-ios-arrow-down text-12"></i></button>
                                                <div class="dropdown-menu">
                                                    <h4 class="dropdown-title">Subscribe</h4>
                                                    <p>Don't miss any update from us.</p>
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="Enter your fullname"
                                                            type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="Enter your email"
                                                            type="email">
                                                    </div><button class="btn btn-primary btn-block">Subscribe</button>
                                                </div>
                                            </div><!-- main-dropdown-demo -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Form in Modal</h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-muted">It is Very Easy to Customize and it uses in your website
                                                apllication.</p>
                                            <a href="javascript:void(0);" class="btn btn-primary" data-bs-target="#modaldemo1"
                                                data-bs-toggle="modal">View Live Demo</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Payment Details</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-10 col-lg-8 col-xl-6 m-auto d-block">
                                                    <div class="card card-body pd-20 pd-md-40 border shadow-none">
                                                        <h3 class="card-title mb-4">Your Payment Details</h3>
                                                        <div class="form-group">
                                                            <label class="form-label" for="card-name">Name on Card</label>
                                                            <input class="form-control" id="card-name" type="text"
                                                                placeholder="Enter Your Name" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="ssnMask-card">Card Number</label>
                                                            <div class="main-parent">
                                                                <input class="form-control" id="ssnMask-card"
                                                                    placeholder="xxxx - xxxx - xxxx" type="text" required>
                                                                <div class="d-flex main-child">
                                                                    <img alt="visa" src="{{asset('build/assets/images/pngs/11.png')}}">
                                                                    <img alt="mastercard"
                                                                        src="{{asset('build/assets/images/pngs/10.png')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row row-sm">
                                                                <div class="col-sm-9">
                                                                    <label class="form-label">Expiration Date</label>
                                                                    <div class="row row-sm">
                                                                        <div class="col-sm-7 mb-3">
                                                                            <select class="form-control select2 form-select"
                                                                                data-placeholder="month">
                                                                                <option label="Choose one"></option>
                                                                                <option value="January">January</option>
                                                                                <option value="February">February</option>
                                                                                <option value="March">March</option>
                                                                                <option value="April">April</option>
                                                                                <option value="May">May</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-5 mb-3">
                                                                            <select class="form-control select2 form-select"
                                                                                data-placeholder="year">
                                                                                <option label="Choose one"></option>
                                                                                <option value="2018">2018</option>
                                                                                <option value="2019">2019</option>
                                                                                <option value="2020">2020</option>
                                                                                <option value="2021">2021</option>
                                                                                <option value="2022">2022</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label class="form-label" for="ssnMask-cvv">CVV</label>
                                                                    <input class="form-control" id="ssnMask-cvv"
                                                                        placeholder="xxx" type="text" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="ckbox"><input checked type="checkbox">
                                                                <span>Save my card for future purchases</span>
                                                            </label>
                                                        </div>
                                                        <button class="btn btn-primary btn-block">Complete Payment</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- MODAL -->
                            <div id="modaldemo1" class="modal fade">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Create New Account</h6>
                                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-muted">Let's get you all setup so you can begin using our app.</p>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Firstname">
                                            </div><!-- form-group -->
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Lastname">
                                            </div><!-- form-group -->
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Phone">
                                            </div><!-- form-group -->
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Email">
                                            </div><!-- form-group -->
                                            <div class="form-group">
                                                <label class="ckbox mb-3">
                                                    <input type="checkbox">
                                                    <span class="text-13">I agree to <a href="javascript:void(0)">Terms</a> and <a
                                                            href="javascript:void(0)">Privacy Policy</a></span>
                                                </label>
                                                <label class="ckbox">
                                                    <input type="checkbox" checked>
                                                    <span class="text-13">Yes, I want to receive email from your newsletter.</span>
                                                </label>
                                            </div><!-- form-group -->
                                            <button class="btn btn-primary btn-block mt-5">Continue</button>
                                        </div><!-- modal-body -->
                                    </div><!-- modal-content -->
                                </div><!-- modal-dialog -->
                            </div>
                            <!-- END MODAL -->

@endsection

@section('scripts')

        <!-- SELECT2 JS -->
        <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
        @vite('resources/assets/js/select2.js')

@endsection