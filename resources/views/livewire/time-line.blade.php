@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- page-header -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Timeline</li>
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
                            <!-- End page-header -->

                            <!-- row -->
                            <div class="row row-sm">
                                <div class="col-md-12">
                                    <ul class="timelineleft">
                                        <li class="timeleft-label">
                                            <span class="bg-gradient-danger fs-10">01 Mar. 2019</span></li>
                                        <li>
                                            <i class="fe fe-mail bg-gradient-primary"></i>
                                            <div class="timelineleft-item">
                                                <span class="time"><i class="fa fa-clock-o text-danger"></i> 12:05</span>
                                                <h3 class="timelineleft-header d-inline-flex"><a href="javascript:void(0);" class="fw-bold">Support Team</a> <span
                                                        class="text-muted fs-13 mx-2">sent you an email</span></h3>
                                                <div class="timelineleft-body">
                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                    quora plaxo ideeli hulu weebly balihoo...
                                                </div>
                                                <div class="timelineleft-footer btn-list">
                                                    <a class="btn btn-primary text-white btn-sm">Read more</a>
                                                    <a class="btn btn-secondary text-white btn-sm ">Delete</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="fe fe-user bg-gradient-secondary"></i>
                                            <div class="timelineleft-item">
                                                <span class="time"><i class="fa fa-clock-o text-danger"></i> 5 mins
                                                    ago</span>
                                                <h3 class="timelineleft-header border-0 d-inline-flex"><a href="javascript:void(0);" class="fw-bold">Sarah Young</a> <span
                                                        class="text-muted fs-13 mx-2">accepted your friend request</span></h3>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="fe fe-message-circle bg-gradient-warning"></i>
                                            <div class="timelineleft-item">
                                                <span class="time"><i class="fa fa-clock-o text-danger"></i> 27 mins
                                                    ago</span>
                                                <h3 class="timelineleft-header d-inline-flex"><a href="javascript:void(0);" class="fw-bold">Jay White</a> <span
                                                        class="text-muted fs-13 mx-2">commented on your post</span></h3>
                                                <div class="timelineleft-body">
                                                    Take me to your leader!
                                                    Switzerland is small and neutral!
                                                    We are more like Germany, ambitious and misunderstood!
                                                </div>
                                                <div class="timelineleft-footer">
                                                    <a class="btn btn-info text-white btn-flat btn-sm">View comment</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeleft-label">
                                            <span class="bg-gradient-success fs-10"> 25 Feb. 2019</span>
                                        </li>
                                        <li>
                                            <i class="fe fe-camera bg-gradient-orange"></i>
                                            <div class="timelineleft-item">
                                                <span class="time"><i class="fa fa-clock-o text-danger"></i> 2 days
                                                    ago</span>
                                                <h3 class="timelineleft-header d-inline-flex"><a href="javascript:void(0);" class="fw-bold">Julian Horbet</a><span
                                                        class="text-muted fs-13 mx-2">uploaded new photos</span></h3>
                                                <div class="timelineleft-body">
                                                    <a href="javascript:void(0);">
                                                        <img src="{{asset('build/assets/images/photos/6.jpg')}}" alt="..."
                                                        class="margin mt-2 mb-2 br-7">
                                                    </a>
                                                    <a href="javascript:void(0);">
                                                        <img src="{{asset('build/assets/images/photos/10.jpg')}}" alt="..."
                                                        class="margin mt-2 mb-2 br-7">
                                                    </a>
                                                    <a href="javascript:void(0);">
                                                        <img src="{{asset('build/assets/images/photos/3.jpg')}}" alt="..."
                                                        class="margin mt-2 mb-2 br-7">
                                                    </a>
                                                    <a href="javascript:void(0);">
                                                        <img src="{{asset('build/assets/images/photos/4.jpg')}}" alt="..."
                                                        class="margin mt-2 mb-2 br-7">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="fe fe-map-pin bg-gradient-pink"></i>
                                            <div class="timelineleft-item">
                                                <span class="time"><i class="fa fa-clock-o text-danger"></i> 5 days
                                                    ago</span>
                                                <h3 class="timelineleft-header d-inline-flex"><a href="javascript:void(0);" class="fw-bold">Mr. Alison Robert</a><span
                                                        class="text-muted fs-13 mx-2">
                                                        shared a Location</span></h3>
                                                <div class="timelineleft-body">
                                                    <div class="row clearfix">
                                                        <div class="col-lg-12">
                                                            <div class="map">
                                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.91477011208!2d-74.11976308802028!3d40.69740344230033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1508039335245" class="border-0 w-100" ></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="timelineleft-footer">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info text-white">See comments</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- col -->
                            </div><!-- row -->

@endsection

@section('scripts')

@endsection