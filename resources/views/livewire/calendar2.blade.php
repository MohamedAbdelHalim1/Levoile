@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Full Calender</li>
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
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Calender With different Color Events</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-5 col-xl-3">
                                                    <div id="external-events">
                                                        <h4 class="card-title">Draggable Events</h4>
                                                        <div
                                                            class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-primary">
                                                            <div class="fc-event-main">My Event 1</div>
                                                        </div>
                                                        <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-secondary"
                                                            data-class="bg-secondary">
                                                            <div class="fc-event-main">My Event 2</div>
                                                        </div>
                                                        <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-warning"
                                                            data-class="bg-warning">
                                                            <div class="fc-event-main">My Event 3</div>
                                                        </div>
                                                        <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-info"
                                                            data-class=" bg-info">
                                                            <div class="fc-event-main">My Event 4</div>
                                                        </div>
                                                        <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-danger"
                                                            data-class="bg-danger">
                                                            <div class="fc-event-main">My Event 5</div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-5">
                                                        <h4 class="card-title mb-4">My Schedules</h4>
                                                        <div class="card border p-0 ">
                                                            <div class="card-body">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <h6 class="fw-semibold mb-0">Design Review</h6>
                                                                    <div class="dropdown">
                                                                        <a class="btn bg-primary-transparent float-end"
                                                                            href="javascript:void(0)" data-bs-toggle="dropdown"
                                                                            role="button" aria-haspopup="true"
                                                                            aria-expanded="false"><i
                                                                                class="fe fe-calendar"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item"
                                                                                href="javascript:void(0)"><i
                                                                                    class="fe fe-edit mx-1"></i> Shedule
                                                                                Date</a>
                                                                            <a class="dropdown-item"
                                                                                href="javascript:void(0)"><i
                                                                                    class="fe fe-trash-2 mx-1"></i> Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="card-subtitle my-2 text-muted">05-09-2021</p>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-primary btn-sm me-3">Urgent</a>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-secondary btn-sm">Face to Face</a>
                                                            </div>
                                                            <div class="card-footer d-flex justify-content-between align-items-center">
                                                                <img class="avatar brround avatar-md me-3"
                                                                        src="{{asset('build/assets/images/users/male/32.jpg')}}"
                                                                        alt="avatar-img">
                                                                <div class="media-body">
                                                                    <a href="{{url('profile')}}"
                                                                        class=" fw-semibold text-dark">John
                                                                        Paige</a><br>
                                                                    <a href="{{url('profile')}}" class="text-muted mb-0 fs-13"> view
                                                                        client profile</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card border p-0">
                                                            <div class="card-body">
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <h6 class="fw-semibold mb-0">New Project</h6>
                                                                    <div class="dropdown">
                                                                        <a class="float-end btn bg-primary-transparent"
                                                                            href="javascript:void(0)" data-bs-toggle="dropdown"
                                                                            role="button" aria-haspopup="true"
                                                                            aria-expanded="false"><i
                                                                                class="fe fe-calendar"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item"
                                                                                href="javascript:void(0)"><i
                                                                                    class="fe fe-edit me-1"></i> Shedule
                                                                                Date</a>
                                                                            <a class="dropdown-item"
                                                                                href="javascript:void(0)"><i
                                                                                    class="fe fe-trash-2 me-1"></i> Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="card-subtitle my-2 text-muted">14-10-2021</p>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-primary btn-sm me-3">Urgent</a>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-success btn-sm">Online Meeting</a>
                                                            </div>
                                                            <div class="card-footer d-flex justify-content-between align-items-center">
                                                                <img class="avatar brround avatar-md me-3"
                                                                        src="{{asset('build/assets/images/users/male/14.jpg')}}"
                                                                        alt="avatar-img">
                                                                <div class="media-body">
                                                                    <a href="{{url('profile')}}"
                                                                        class=" fw-semibold text-dark">Mozelle
                                                                        Belt</a><br>
                                                                    <a href="{{url('profile')}}" class="text-muted mb-0 fs-13"> view
                                                                        client profile</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 col-xl-9">
                                                    <div id='calendar2'></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">List Calendar</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id='calendar'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW CLOSED -->

@endsection

@section('scripts')

        <!-- FULL CALENDAR JS -->
        <script src="{{asset('build/assets/plugins/fullcalendar/moment.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
        @vite('resources/assets/js/fullcalendar.js')


@endsection