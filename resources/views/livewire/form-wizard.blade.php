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
                                    <li class="breadcrumb-item active" aria-current="page">Form Wizard</li>
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
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Form Wizard</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="smartwizard-3">
                                                <ul>
                                                    <li><a href="#step-10">Login</a></li>
                                                    <li><a href="#step-11">New User</a></li>
                                                    <li><a href="#step-12">End</a></li>
                                                </ul>
                                                <div>
                                                    <div id="step-10" class="">
                                                        <form>
                                                            <div class="form-group">
                                                                <label>Email address</label>
                                                                <input type="email" class="form-control"
                                                                    id="exampleInputEmail6"
                                                                    placeholder="Enter email address">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="exampleInputPassword7" placeholder="Password">
                                                            </div>
                                                            <div class="checkbox">
                                                                <div class="custom-checkbox custom-control">
                                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                                        class="custom-control-input" id="checkbox-9">
                                                                    <label for="checkbox-9" class="custom-control-label">Check me Out</label>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="step-11" class="">
                                                        <form>
                                                            <div class="form-group">
                                                                <label>User Name</label>
                                                                <input type="text" class="form-control" id="inputtext"
                                                                    placeholder="Enter User Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Email address</label>
                                                                <input type="email" class="form-control"
                                                                    id="exampleInputEmail8"
                                                                    placeholder="Enter email address">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="exampleInputPassword9" placeholder="Password">
                                                            </div>
                                                            <div class="checkbox">
                                                                <div class="custom-checkbox custom-control">
                                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                                        class="custom-control-input" id="checkbox-3">
                                                                    <label for="checkbox-3"
                                                                        class="custom-control-label">Check
                                                                        me Out</label>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="step-12" class="">
                                                        <div class="checkbox">
                                                            <div class="custom-checkbox custom-control">
                                                                <input type="checkbox" data-checkboxes="mygroup"
                                                                    class="custom-control-input" id="checkbox2">
                                                                <label for="checkbox2" class="custom-control-label">I agree
                                                                    terms & Conditions</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Accordion-Wizard-Form</h3>
                                        </div>
                                        <div class="card-body">
                                            <form id="form">
                                                <div class="list-group">
                                                    <div class="list-group-item py-3" data-acc-step>
                                                        <h5 class="mb-0" data-acc-title>Name &amp; Email</h5>
                                                        <div data-acc-content>
                                                            <div class="my-3">
                                                                <div class="form-group">
                                                                    <label>Name:</label>
                                                                    <input type="text" name="name" class="form-control" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email:</label>
                                                                    <input type="text" name="email" class="form-control" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="list-group-item py-3" data-acc-step>
                                                        <h5 class="mb-0" data-acc-title>Contact</h5>
                                                        <div data-acc-content>
                                                            <div class="my-3">
                                                                <div class="form-group">
                                                                    <label>Telephone:</label>
                                                                    <input type="text" name="telephone"
                                                                        class="form-control" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Mobile:</label>
                                                                    <input type="text" name="mobile" class="form-control" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="list-group-item py-3" data-acc-step>
                                                        <h5 class="mb-0" data-acc-title>Payment</h5>
                                                        <div data-acc-content>
                                                            <div class="my-3">
                                                                <div class="form-group">
                                                                    <label>Credit card:</label>
                                                                    <input type="text" name="card" class="form-control">
                                                                </div>
                                                                <div class="form-group form-row">
                                                                    <div class="col-sm-4">
                                                                        <label>Expiry:</label>
                                                                        <input type="text" name="expiry"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label>CVV:</label>
                                                                        <input type="text" name="cvv" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- FORM-WIZARD JS -->
        <script src="{{asset('build/assets/plugins/formwizard/jquery.smartWizard.js')}}"></script>
        <script src="{{asset('build/assets/plugins/formwizard/fromwizard.js')}}"></script>

        <!-- ACCORDION-WIZARD-FORM JS -->
        <script src="{{asset('build/assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js')}}"></script>
        @vite('resources/assets/js/advancedform.js')


@endsection