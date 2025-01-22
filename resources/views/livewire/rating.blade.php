@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Ratings</li>
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
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Star Rating
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="rating-stars block" id="rating-1" data-stars="2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Heart Rating
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="rating-stars block" id="rating-2" data-stars="2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Multi Star Rating
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="rating-stars block" id="rating-3" data-stars="2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Multi Heart Rating
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="rating-stars block" id="rating-6" data-stars="2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Multi circle Rating
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="rating-stars block" id="rating-4" data-stars="2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Thumbs-up Rating
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="rating-stars block" id="rating-5" data-stars="2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row row-cards">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Basic Star Rating
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="rating-stars block my-rating">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Rounded star Rating
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="rating-stars  block my-rating-4" data-rating="2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                gradients Rating
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="rating-stars block my-rating-5" data-rating="5">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Execute callback when rating
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="rating-stars block my-rating-6" data-rating="2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                read only mode
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="rating-stars block my-rating-7" data-rating="2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Use fullstars
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="rating-stars block my-rating-8" data-rating="2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                On hover event
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="rating-stars block my-rating-9" data-rating="2">
                                            </div>
                                            <span class="live-rating"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                rating level colors
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="rating-stars block my-rating-10" data-rating="2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- STAR RATING JS -->
        <script src="{{asset('build/assets/plugins/rating/jquery-rate-picker.js')}}"></script>
        <script src="{{asset('build/assets/plugins/rating/rating-picker.js')}}"></script>

        <!-- STAR RATING-1 JS -->
        <script src="{{asset('build/assets/plugins/ratings-2/jquery.star-rating.js')}}"></script>
        <script src="{{asset('build/assets/plugins/ratings-2/star-rating.js')}}"></script>

@endsection