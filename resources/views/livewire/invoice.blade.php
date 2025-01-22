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
                                    <li class="breadcrumb-item active" aria-current="page">Invoices</li>
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
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header border-bottom d-block">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a class="header-brand" href="{{url('index')}}">
                                                        <img alt="logo" class="header-brand-img logo-3 float-start" src="{{asset('build/assets/images/brand/logo.png')}}">
                                                        <img alt="logo" class="header-brand-img logo-4 m-0" src="{{asset('build/assets/images/brand/logo-light.png')}}">
                                                    </a>
                                                </div>
                                                <div class="col-sm-6 text-sm-end">
                                                    <h2 class="mb-1">Invoice #4236</h2>
                                                    <p class="mb-1"><span class="fw-semibold">Invoice Date :</span> 29th
                                                        April 2019</p>
                                                    <p class="mb-0"><span class="fw-semibold">Due Date :</span> 10 August 2022</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row row-sm">
                                                <div class="col-lg-6 ">
                                                    <p class="h3">Invoice Form:</p>
                                                    <address>
                                                        Street Address<br>
                                                        State, City<br>
                                                        Region, Postal Code<br>
                                                        yourdomain@example.com
                                                    </address>
                                                </div>
                                                <div class="col-lg-6 text-end">
                                                    <p class="h3">Invoice To:</p>
                                                    <address>
                                                        Street Address<br>
                                                        State, City<br>
                                                        Region, Postal Code<br>
                                                        ypurdomain@example.com
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="table-responsive push">
                                                <table class="table table-bordered mb-0">
                                                    <tbody class="text-dark">
                                                        <tr class=" ">
                                                            <th class="text-center fw-semibold" style="width: 1%">S.NO</th>
                                                            <th class="fw-semibold">Item</th>
                                                            <th class="text-center fw-semibold" style="width: 1%">Quantity</th>
                                                            <th class="text-end fw-semibold">Unit Price</th>
                                                            <th class="text-end fw-semibold">Sub Total</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">1</td>
                                                            <td>
                                                                <p class="fw-semibold mb-1">Logo Design</p>
                                                                <span class="text-muted fs-13">Sed ut perspiciatis unde omnis
                                                                    iste
                                                                    natus error sit voluptatem accusantium doloremque
                                                                    laudantium
                                                                </span>
                                                            </td>
                                                            <td class="text-center">2</td>
                                                            <td class="text-end">$674</td>
                                                            <td class="text-end">$1,308</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">2</td>
                                                            <td>
                                                                <p class="fw-semibold mb-1">Website wireframe for 2 pages</p>
                                                                <span class="text-muted fs-13">At vero eos et accusamus et iusto
                                                                    odio
                                                                    dignissimos ducimus qui blanditiis praesentium
                                                                    voluptatum
                                                                </span>
                                                            </td>
                                                            <td class="text-center">4</td>
                                                            <td class="text-end">$1,500</td>
                                                            <td class="text-end">$6,000</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">3</td>
                                                            <td>
                                                                <p class="fw-semibold mb-1">PSD to HTML coding</p>
                                                                <span class="text-muted fs-13">Duis aute irure dolor in
                                                                    reprehenderit
                                                                    in voluptate velit esse cillum dolore eu fugiat nulla
                                                                    pariatur
                                                                </span>
                                                            </td>
                                                            <td class="text-center">3</td>
                                                            <td class="text-end">$530</td>
                                                            <td class="text-end">$1,690</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">4</td>
                                                            <td>
                                                                <p class="fw-semibold mb-1">E-commerce Development</p>
                                                                <span class="text-muted fs-13">When our power of choice is
                                                                    untrammelled
                                                                    and when nothing prevents our being able
                                                                </span>
                                                            </td>
                                                            <td class="text-center">2</td>
                                                            <td class="text-end">$800</td>
                                                            <td class="text-end">$1,600</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">5</td>
                                                            <td>
                                                                <p class="fw-semibold mb-1">Design and layout of 2 pages in
                                                                    Photoshop</p>
                                                                <span class="text-muted fs-13">Lorem ipsum dolor sit amet,
                                                                    consectetur
                                                                    adipiscing elit, sed do eiusmod tempor incididunt ut
                                                                    labore
                                                                </span>
                                                            </td>
                                                            <td class="text-center">2</td>
                                                            <td class="text-end">$720</td>
                                                            <td class="text-end">$1,440</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4"
                                                                class="fw-bold text-primary text-uppercase text-end">Total
                                                            </td>
                                                            <td class="fw-bolder text-primary text-end">
                                                                <h4 class="mb-0 fw-semibold">$12,038</h4>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="form-group mt-5">
                                                <label class="form-label fw-semibold">Note :</label>
                                                <textarea class="form-control text-dark" rows="3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem distinctio suscipit sapiente. Culpa veniam, sapiente nam omnis odit voluptatum quia reprehenderit odio repudiandae. Deleniti totam delectus autem assumenda veritatis impedit excepturi animi vitae in praesentium.</textarea>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-end btn-list">
                                                <button type="button" class="btn btn-primary"><i class="bi bi-wallet2 me-1"></i>
                                                    Pay
                                                    Invoice</button>
                                                <button type="button" class="btn btn-success"><i class="bi bi-share me-1"></i>
                                                    Send Invoice</button>
                                                <button type="button" class="btn btn-info me-2"
                                                    onclick="javascript:window.print();"><i class="bi bi-printer me-1"></i> Print
                                                    Invoice</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')


@endsection