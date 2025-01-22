@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pagination</li>
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
                                <div class="col-md-6">
                                    <div class="card overflow-hidden">
                                        <div class="card-header">
                                            <div class="card-title">Basic pagination</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="pagination-wrapper">
                                                <nav aria-label="Page navigation">
                                                    <ul class="pagination mb-0">
                                                        <li class="page-item active">
                                                            <a class="page-link" href="javascript:void(0);">1</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="javascript:void(0);">2</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="javascript:void(0);">3</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="javascript:void(0);">4</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="javascript:void(0);">5</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a aria-label="Next" class="page-link" href="javascript:void(0);"><i
                                                                    class="fa fa-angle-right"></i></a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                            <!-- pagination-wrapper -->
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Disabled and active states</div>
                                        </div>
                                        <div class="card-body">
                                            <ul class="pagination ">
                                                <li class="page-item page-prev disabled">
                                                    <a class="page-link" href="javascript:void(0);" tabindex="-1">Prev</a>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                                                <li class="page-item page-next">
                                                    <a class="page-link" href="javascript:void(0);">Next</a>
                                                </li>
                                            </ul>
                                            <!-- pagination-wrapper -->
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Model Pagination</div>
                                        </div>
                                        <div class="card-body ">
                                            <ul class="pagination mg-b-0 page-0 ">
                                                <li class="page-item">
                                                    <a aria-label="Last" class="page-link" href="javascript:void(0);"><i
                                                            class="fa fa-angle-double-left"></i></a>
                                                </li>
                                                <li class="page-item">
                                                    <a aria-label="Next" class="page-link" href="javascript:void(0);"><i
                                                            class="fa fa-angle-left"></i></a>
                                                </li>

                                                <li class="page-item">
                                                    <a class="page-link" href="javascript:void(0);">2</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a class="page-link" href="javascript:void(0);">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link hidden-xs-down" href="javascript:void(0);">4</a>
                                                </li>

                                                <li class="page-item">
                                                    <a aria-label="Next" class="page-link" href="javascript:void(0);"><i
                                                            class="fa fa-angle-right"></i></a>
                                                </li>
                                                <li class="page-item">
                                                    <a aria-label="Last" class="page-link" href="javascript:void(0);"><i
                                                            class="fa fa-angle-double-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- pagination-wrapper -->
                                    </div>
                                    <!-- section-wrapper -->
                                </div><!-- col end -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Model Pagination2</div>
                                        </div>
                                        <div class="card-body">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination pagination-success mb-0">
                                                    <li class="page-item page-0">
                                                        <a aria-label="Next" class="page-link" href="javascript:void(0);"><i
                                                                class="fa fa-angle-left"></i></a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a aria-label="Last" class="page-link" href="javascript:void(0);"><i
                                                                class="fa fa-angle-double-left"></i></a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a class="page-link" href="javascript:void(0);">4</a>
                                                    </li>
                                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="javascript:void(0);">10</a>
                                                    </li>
                                                    <li class="page-item page-0">
                                                        <a aria-label="Next" class="page-link" href="javascript:void(0);"><i
                                                                class="fa fa-angle-right"></i></a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a aria-label="Last" class="page-link" href="javascript:void(0);"><i
                                                                class="fa fa-angle-double-right"></i></a>
                                                    </li>
                                                </ul>
                                            </nav>
                                            <!-- pagination-wrapper -->
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Model Pagination2</div>
                                        </div>
                                        <div class="card-body">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination mb-0">
                                                    <li class="page-item">
                                                        <a class="page-link" href="javascript:void(0);" aria-label="Previous">
                                                            <i class="fa fa-angle-left"></i>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="javascript:void(0);" aria-label="Next">
                                                            <i class="fa fa-angle-right"></i>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h2 class="card-title">Pagination left alignment</h2>
                                        </div>
                                        <div class="card-body">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination mb-0">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="javascript:void(0);" tabindex="-1">
                                                            <i class="fa fa-angle-left"></i>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="javascript:void(0);">
                                                            <i class="fa fa-angle-right"></i>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h2 class="card-title">Pagination center alignment</h2>
                                        </div>
                                        <div class="card-body">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-center mb-0">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="javascript:void(0);" tabindex="-1">
                                                            <i class="fa fa-angle-left"></i>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="javascript:void(0);">
                                                            <i class="fa fa-angle-right"></i>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h2 class="card-title">Pagination Right Alignment</h2>
                                        </div>
                                        <div class="card-body ">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-end mb-0">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="javascript:void(0);" tabindex="-1">
                                                            <i class="fa fa-angle-left"></i>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="javascript:void(0);">
                                                            <i class="fa fa-angle-right"></i>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Pagination Sizing</h3>
                                        </div>
                                        <div class="card-body d-sm-inline-flex justify-content-between align-items-center">
                                            <nav aria-label="..." class="mb-2">
                                                <ul class="pagination pagination-lg">
                                                    <li class="page-item active" aria-current="page">
                                                        <span class="page-link">1</span>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                </ul>
                                            </nav>
                                            <nav aria-label="...">
                                                <ul class="pagination pagination-sm">
                                                    <li class="page-item active" aria-current="page">
                                                        <span class="page-link">1</span>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

@endsection