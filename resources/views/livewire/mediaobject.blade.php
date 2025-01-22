@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Mediaobject</li>
                                </ol><!-- End breadcrumb -->
                                <div class="ms-auto">
                                    <div>
                                        <a href="#" class="btn bg-secondary-transparent text-secondary btn-sm"
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
                                        <a href="#" class="btn bg-warning-transparent text-warning btn-sm" data-bs-toggle="tooltip"
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
                                    <div class="card Relatedpost nested-media">
                                        <div class="card-header">
                                            <h3 class="card-title">Default Media Object</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="media media-lg mt-0">
                                                <img class="me-3 br-7" src="{{asset('build/assets/images/photos/50.jpg')}}"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="mb-1 fw-semibold">Media heading</h5>
                                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                    accusantium
                                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                                                    inventore
                                                    veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card Relatedpost nested-media overflow-hidden">
                                        <div class="card-header">
                                            <h3 class="card-title">Nesting Media Object</h3>
                                        </div>
                                        <div class="card-body overflow-hidden">
                                            <div class="media media-lg mt-0">
                                                <img class="me-3 br-7" src="{{asset('build/assets/images/photos/51.jpg')}}"
                                                    alt="Generic placeholder image">
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="mb-1 fw-semibold">Media heading</h5>
                                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                    accusantium
                                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                                                    inventore
                                                    veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                                                    <div class="media media-lg mt-3">
                                                        <img class="me-3 br-7" src="{{asset('build/assets/images/photos/53.jpg')}}"
                                                            alt="Generic placeholder image">
                                                        <div class="media-body overflow-hidden">
                                                            <h5 class="mb-1 fw-semibold">Media heading</h5>
                                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                            accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
                                                            quae ab illo inventore veritatis et quasi architecto beatae
                                                            vitae
                                                            dicta sunt explicabo.
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
                                <div class="col-12">
                                    <div class="card Relatedpost nested-media">
                                        <div class="card-header">
                                            <h3 class="card-title">List Media Object</h3>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled">
                                                <li class="media media-lg mt-0">
                                                    <img class="me-3 br-7" src="{{asset('build/assets/images/photos/52.jpg')}}"
                                                        alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="mb-1 fw-semibold">Media heading 01</h5>
                                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                        accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
                                                        quae ab
                                                        illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                                        explicabo.
                                                    </div>
                                                </li>
                                                <li class="media media-lg my-4">
                                                    <img class="me-3 br-7" src="{{asset('build/assets/images/photos/54.jpg')}}"
                                                        alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="mb-1 fw-semibold">Media heading 02</h5>
                                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                        accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
                                                        quae ab
                                                        illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                                        explicabo.
                                                    </div>
                                                </li>
                                                <li class="media media-lg">
                                                    <img class="me-3 br-7" src="{{asset('build/assets/images/photos/50.jpg')}}"
                                                        alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="mb-1 fw-semibold">Media heading 03</h5>
                                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                        accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
                                                        quae ab
                                                        illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                                        explicabo.
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card Relatedpost nested-media">
                                        <div class="card-header">
                                            <h3 class="card-title">Alignments Media Object</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="media media-lg mt-0">
                                                <img class="align-self-start me-3 br-7"
                                                    src="{{asset('build/assets/images/photos/51.jpg')}}"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="mb-1 fw-semibold">Top-aligned media</h5>
                                                    <p>There are many variations of passages of Lorem Ipsum available, but
                                                        the
                                                        majority have suffered alteration in some form, by injected humour,
                                                        or
                                                        randomised words which don't look even slightly believable. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat velit repudiandae doloremque cupiditate reprehenderit asperiores pariatur non fuga animi at.
                                                    </p>
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                        accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
                                                        quae ab
                                                        illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                                        explicabo. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed hic ipsam, qui reprehenderit repellat expedita omnis aliquam maiores doloribus sapiente.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="media media-lg">
                                                <img class="align-self-center me-3 br-7"
                                                    src="{{asset('build/assets/images/photos/53.jpg')}}"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="mb-1 fw-semibold">Center-aligned media</h5>
                                                    <p>There are many variations of passages of Lorem Ipsum available, but
                                                        the
                                                        majority have suffered alteration in some form, by injected humour,
                                                        or
                                                        randomised words which don't look even slightly believable. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis enim id maiores voluptatum facilis maxime impedit et sit, repudiandae incidunt.
                                                    </p>
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                        accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
                                                        quae ab
                                                        illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                                        explicabo. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, repellat voluptate quam debitis ducimus dolore corrupti praesentium aliquid harum earum?
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="media media-lg">
                                                <img class="align-self-end me-3 br-7"
                                                    src="{{asset('build/assets/images/photos/54.jpg')}}"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="mb-1 fw-semibold">Bottom-aligned media</h5>
                                                    <p>There are many variations of passages of Lorem Ipsum available, but
                                                        the
                                                        majority have suffered alteration in some form, by injected humour,
                                                        or
                                                        randomised words which don't look even slightly believable. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima fugit aut excepturi, eius eveniet animi labore magnam aliquam similique laborum!
                                                    </p>
                                                    <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit
                                                        voluptatem accusantium doloremque laudantium, totam rem aperiam,
                                                        eaque
                                                        ipsa quae ab illo inventore veritatis et quasi architecto beatae
                                                        vitae
                                                        dicta sunt explicabo. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat, ex. A at quidem natus optio quasi ducimus, aliquid perferendis nobis.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card Relatedpost nested-media ">
                                        <div class="card-header">
                                            <h3 class="card-title">Order Media Object</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="media media-lg mt-0">
                                                <div class="media-body mt-0">
                                                    <h5 class="mt-0 mb-4 fw-semibold">Media object</h5>
                                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                    accusantium
                                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                                                    inventore
                                                    veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                                                </div>
                                                <img class="ms-2 mt-3 mb-3 br-7" src="{{asset('build/assets/images/photos/54.jpg')}}"
                                                    alt="Generic placeholder image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

@endsection