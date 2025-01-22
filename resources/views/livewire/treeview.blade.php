@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Treeview</li>
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
                                    <div class="card mg-b-20">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Basic Treeview
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <!-- col -->
                                                <div class="col-lg-4">
                                                    <ul id="treeview1">
                                                        <li><a href="javascript:void(0);">TECH</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports</li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li>XRP
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports</li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /col -->

                                                <!-- col -->
                                                <div class="col-lg-4 mt-4 mt-lg-0">
                                                    <ul id="treeview2">
                                                        <li><a href="javascript:void(0);">TECH</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports</li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li>XRP
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports</li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /col -->

                                                <!-- col -->
                                                <div class="col-lg-4 mt-4 mt-lg-0">
                                                    <ul id="treeview3">
                                                        <li><a href="javascript:void(0);">TECH</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports</li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li>XRP
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports</li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /col -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Tree View Styles
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <!-- col -->
                                                <div class="col-lg-6 col-xl-4 col-md-12 col-sm-12">
                                                    <ul id="tree1">
                                                        <li><a href="javascript:void(0);">Treeview1</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="javascript:void(0);">Treeview2</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="javascript:void(0);">Treeview3</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="javascript:void(0);">Treeview4</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="javascript:void(0);">Treeview5</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="javascript:void(0);">Treeview6</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /col -->

                                                <!-- col -->
                                                <div class="col-lg-6 col-xl-4 col-md-12 col-sm-12 mt-4 mt-lg-0">
                                                    <ul id="tree2">
                                                        <li><a href="javascript:void(0);">Treeview1</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="javascript:void(0);">Treeview2</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="javascript:void(0);">Treeview3</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="javascript:void(0);">Treeview4</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="javascript:void(0);">Treeview5</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="javascript:void(0);">Treeview6</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /col -->

                                                <!-- col -->
                                                <div class="col-lg-6 col-xl-4 col-md-12 col-sm-12 mt-4 mt-lg-0">
                                                    <ul id="tree3">
                                                        <li><a href="javascript:void(0);">Treeview1</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="javascript:void(0);">Treeview2</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="javascript:void(0);">Treeview3</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="javascript:void(0);">Treeview4</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="javascript:void(0);">Treeview5</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.
                                                                                    <ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="javascript:void(0);">Treeview6</a>
                                                            <ul>
                                                                <li>Company Maintenance</li>
                                                                <li>Employees
                                                                    <ul>
                                                                        <li>Reports
                                                                            <ul>
                                                                                <li>Report1</li>
                                                                                <li>Report2</li>
                                                                                <li>Report3</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li>Employee Maint.
                                                                            <ul>
                                                                                <li>Reports
                                                                                    <ul>
                                                                                        <li>Report1</li>
                                                                                        <li>Report2</li>
                                                                                        <li>Report3</li>
                                                                                    </ul>
                                                                                </li>
                                                                                <li>Employee Maint.<ul>
                                                                                        <li>Reports
                                                                                            <ul>
                                                                                                <li>Report1</li>
                                                                                                <li>Report2</li>
                                                                                                <li>Report3</li>
                                                                                            </ul>
                                                                                        </li>
                                                                                        <li>Employee Maint.</li>
                                                                                    </ul>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>Human Resources</li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /col -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!--- INTERNAL TREEVIEW JS -->
        <script src="{{asset('build/assets/plugins/treeview/treeview.js')}}"></script>

@endsection