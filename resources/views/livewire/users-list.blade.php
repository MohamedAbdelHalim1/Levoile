@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">User List</li>
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
                                <div class="col-lg-12">
                                    <div class="input-group mb-5 float-end">
                                        <input type="text" class="form-control" placeholder="Search here...">
                                        <button type="button" class="btn btn-primary">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class="e-panel card">
                                        <div class="card-header">
                                            <h2 class="card-title">1 - 30 of 546 users</h2>
                                            <div class="page-options">
                                                <select class="form-control select2 w-auto">
                                                    <option value="asc">Latest</option>
                                                    <option value="desc">Oldest</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="e-table">
                                                <div class="table-responsive table-lg">
                                                    <table class="table table-bordered text-dark">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center text-dark fw-semibold">
                                                                    All
                                                                </th>
                                                                <th class="text-dark fw-semibold w-25">Person</th>
                                                                <th class="text-dark fw-semibold">Date</th>
                                                                <th class="text-dark fw-semibold">Progress</th>
                                                                <th class="text-center fw-semibold">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <div
                                                                        class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                                        <input class="custom-control-input" id="item-1"
                                                                            type="checkbox"> <label
                                                                            class="custom-control-label"
                                                                            for="item-1"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="d-flex border-0">
                                                                    <div>
                                                                        <span class="avatar avatar-md"><img alt="image"
                                                                            class="avatar avatar-md rounded-circle"
                                                                            src="{{asset('build/assets/images/users/female/25.jpg')}}"></span>
                                                                    </div>
                                                                    <div class="flex-1 my-auto">
                                                                        <h6 class="mb-0 fw-semibold  mx-2">Adam Cotter</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap align-middle"><span>09 Dec
                                                                        2017</span>
                                                                </td>

                                                                <td class="text-nowrap align-middle">
                                                                    <div class="progress progress-xs mb-0 mt-3">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-70">
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-center align-middle">
                                                                    <div class="btn-group align-top br-7">
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button">Edit</button>
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button"><i
                                                                                class="fa fa-trash"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <div
                                                                        class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                                        <input class="custom-control-input" id="item-2"
                                                                            type="checkbox"> <label
                                                                            class="custom-control-label"
                                                                            for="item-2"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <div class="d-flex">
                                                                        <img alt="image"
                                                                            class="avatar avatar-md rounded-circle"
                                                                            src="{{asset('build/assets/images/users/female/21.jpg')}}">
                                                                        <p class="fw-semibold mb-0 my-auto mx-2">Pauline Noble</p>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap align-middle"><span>26 Jan
                                                                        2018</span>
                                                                </td>

                                                                <td class="text-nowrap align-middle">
                                                                    <div class="progress progress-xs mb-0 mt-3">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success w-50">
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-center align-middle">
                                                                    <div class="btn-group align-top br-7">
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button">Edit</button>
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button"><i
                                                                                class="fa fa-trash"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <div
                                                                        class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                                        <input class="custom-control-input" id="item-3"
                                                                            type="checkbox"> <label
                                                                            class="custom-control-label"
                                                                            for="item-3"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <div class="d-flex">
                                                                        <img alt="image"
                                                                            class="avatar avatar-md rounded-circle"
                                                                            src="{{asset('build/assets/images/users/male/28.jpg')}}">
                                                                        <p class="fw-semibold mb-0 my-auto mx-2">Sherilyn Metzel</p>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap align-middle"><span>27 Jan
                                                                        2018</span>
                                                                </td>

                                                                <td class="text-nowrap align-middle">
                                                                    <div class="progress progress-xs mb-0 mt-3">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info w-70">
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-center align-middle">
                                                                    <div class="btn-group align-top br-7">
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button">Edit</button>
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button"><i
                                                                                class="fa fa-trash"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <div
                                                                        class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                                        <input class="custom-control-input" id="item-4"
                                                                            type="checkbox"> <label
                                                                            class="custom-control-label"
                                                                            for="item-4"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <div class="d-flex">
                                                                        <img alt="image"
                                                                            class="avatar avatar-md rounded-circle"
                                                                            src="{{asset('build/assets/images/users/male/25.jpg')}}">
                                                                        <p class="fw-semibold mb-0 my-auto mx-2">Terrie Boaler</p>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap align-middle"><span>20 Jan
                                                                        2018</span>
                                                                </td>

                                                                <td class="text-nowrap align-middle">
                                                                    <div class="progress progress-xs mb-0 mt-3">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger w-30">
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-center align-middle">
                                                                    <div class="btn-group align-top br-7">
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button">Edit</button>
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button"><i
                                                                                class="fa fa-trash"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <div
                                                                        class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                                        <input class="custom-control-input" id="item-5"
                                                                            type="checkbox"> <label
                                                                            class="custom-control-label"
                                                                            for="item-5"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <div class="d-flex">
                                                                        <img alt="image"
                                                                            class="avatar avatar-md rounded-circle"
                                                                            src="{{asset('build/assets/images/users/female/22.jpg')}}">
                                                                        <p class="fw-semibold mb-0 my-auto mx-2">Rutter Pude</p>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap align-middle"><span>13 Jan
                                                                        2018</span>
                                                                </td>

                                                                <td class="text-nowrap align-middle">
                                                                    <div class="progress progress-xs mb-0 mt-3">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning w-20">
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-center align-middle">
                                                                    <div class="btn-group align-top br-7">
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button">Edit</button>
                                                                        <button class="btn btn-sm btn-primary  badge"
                                                                            type="button"><i
                                                                                class="fa fa-trash"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <div
                                                                        class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                                        <input class="custom-control-input" id="item-6"
                                                                            type="checkbox"> <label
                                                                            class="custom-control-label"
                                                                            for="item-6"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <div class="d-flex">
                                                                        <img alt="image"
                                                                            class="avatar avatar-md rounded-circle"
                                                                            src="{{asset('build/assets/images/users/male/20.jpg')}}">
                                                                        <p class="fw-semibold mb-0 my-auto mx-2">Clifford Benjamin</p>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap align-middle"><span>25 Jan
                                                                        2018</span>
                                                                </td>

                                                                <td class="text-nowrap align-middle">
                                                                    <div class="progress progress-xs mb-0 mt-3">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-pink w-60">
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-center align-middle">
                                                                    <div class="btn-group align-top br-7">
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button">Edit</button>
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button"><i
                                                                                class="fa fa-trash"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <div
                                                                        class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                                        <input class="custom-control-input" id="item-7"
                                                                            type="checkbox"> <label
                                                                            class="custom-control-label"
                                                                            for="item-7"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <div class="d-flex">
                                                                        <img alt="image"
                                                                            class="avatar avatar-md rounded-circle"
                                                                            src="{{asset('build/assets/images/users/female/11.jpg')}}">
                                                                        <p class="fw-semibold mb-0 my-auto mx-2">Thedric Romans</p>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap align-middle"><span>12 Jan
                                                                        2018</span>
                                                                </td>

                                                                <td class="text-nowrap align-middle">
                                                                    <div class="progress progress-xs mb-0 mt-3">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-purple w-50">
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-center align-middle">
                                                                    <div class="btn-group align-top br-7">
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button">Edit</button>
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button"><i
                                                                                class="fa fa-trash"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <div
                                                                        class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                                        <input class="custom-control-input" id="item-8"
                                                                            type="checkbox"> <label
                                                                            class="custom-control-label"
                                                                            for="item-8"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <div class="d-flex">
                                                                        <img alt="image"
                                                                            class="avatar avatar-md rounded-circle"
                                                                            src="{{asset('build/assets/images/users/female/1.jpg')}}">
                                                                        <p class="fw-semibold mb-0 my-auto mx-2">Haily Carthew</p>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap align-middle"><span>27 Jan
                                                                        2018</span>
                                                                </td>

                                                                <td class="text-nowrap align-middle">
                                                                    <div class="progress progress-xs mb-0 mt-3">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-teal w-15">
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-center align-middle">
                                                                    <div class="btn-group align-top br-7">
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button">Edit</button>
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button"><i
                                                                                class="fa fa-trash"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <div
                                                                        class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                                        <input class="custom-control-input" id="item-9"
                                                                            type="checkbox"> <label
                                                                            class="custom-control-label"
                                                                            for="item-9"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="d-flex border-0">
                                                                    <div>
                                                                        <span class="avatar avatar-md"><img alt="image"
                                                                            class="avatar avatar-md rounded-circle"
                                                                            src="{{asset('build/assets/images/users/male/11.jpg')}}"></span>
                                                                    </div>
                                                                    <div class="flex-1 my-auto">
                                                                        <h6 class="mb-0 fw-semibold mx-2">Dorothea Joicey</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap align-middle"><span>12 Dec
                                                                        2017</span>
                                                                </td>

                                                                <td class="text-nowrap align-middle">
                                                                    <div class="progress progress-xs mb-0 mt-3">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-blue w-70">
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-center align-middle">
                                                                    <div class="btn-group align-top br-7">
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button">Edit</button>
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button"><i
                                                                                class="fa fa-trash"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle text-center">
                                                                    <div
                                                                        class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                                                        <input class="custom-control-input" id="item-10"
                                                                            type="checkbox"> <label
                                                                            class="custom-control-label"
                                                                            for="item-10"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <div class="d-flex">
                                                                        <img alt="image"
                                                                            class="avatar avatar-md rounded-circle"
                                                                            src="{{asset('build/assets/images/users/female/13.jpg')}}">
                                                                        <p class="fw-semibold mb-0 my-auto mx-2">Mikaela Pinel</p>
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap align-middle"><span>10 Dec
                                                                        2017</span>
                                                                </td>

                                                                <td class="text-nowrap align-middle">
                                                                    <div class="progress progress-xs mb-0 mt-3">
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary w-40">
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="text-center align-middle">
                                                                    <div class="btn-group align-top br-7">
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button">Edit</button>
                                                                        <button class="btn btn-sm btn-primary badge"
                                                                            type="button"><i
                                                                                class="fa fa-trash"></i></button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="float-end">
                                                    <ul class="pagination mt-3 mb-0">
                                                        <li class="disabled page-item">
                                                            <a class="page-link" href="javascript:void(0);">‹</a>
                                                        </li>
                                                        <li class="active page-item">
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
                                                            <a class="page-link" href="javascript:void(0);">›</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="javascript:void(0);">»</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

 <!-- SELECT2 JS -->
 <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
 @vite('resources/assets/js/select2.js')

@endsection