@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Offcanvas</li>
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
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Offcanvas Demo</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <p>Use the buttons below to show and hide an offcanvas element via
                                                    JavaScript that toggles the .show class on an element with the
                                                    .offcanvas class.</p>
                                                <div class="example">
                                                    <div class="btn-list">
                                                        <a aria-controls="offcanvas-1" class="btn btn-primary"
                                                            data-bs-toggle="offcanvas" href="#offcanvas-1"
                                                            role="button">Link with href</a>
                                                        <button aria-controls="offcanvas-1" class="btn btn-info"
                                                            data-bs-target="#offcanvas-1" data-bs-toggle="offcanvas"
                                                            type="button">Button with data-bs-target</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Offcanvas Placements</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <p>Use <code class="highlighter-rouge">.offcanvas-start</code> <code
                                                        class="highlighter-rouge">.offcanvas-top</code> <code
                                                        class="highlighter-rouge">.offcanvas-end</code> <code
                                                        class="highlighter-rouge">.offcanvas-bottom</code> these modified
                                                    classes to change Offcanvas Placement respectively.</p>
                                                <div class="example">
                                                    <div class="btn-list">
                                                        <button class="btn btn-primary" type="button"
                                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasStart"
                                                            aria-controls="offcanvasStart">Toggle Left Offcanvas</button>
                                                        <button class="btn btn-info" type="button"
                                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
                                                            aria-controls="offcanvasTop">Toggle Top Offcanvas</button>
                                                        <button class="btn btn-secondary" type="button"
                                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd"
                                                            aria-controls="offcanvasEnd">Toggle Right Offcanvas</button>
                                                        <button class="btn btn-warning" type="button"
                                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                            aria-controls="offcanvasBottom">Toggle Bottom Offcanvas</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Offcanvas Scrolling Options</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <p>Scrolling the <code class="highlighter-rouge">&lt;body&gt;</code> element
                                                    is disabled when an offcanvas and its backdrop are visible. Use the
                                                    <code class="highlighter-rouge">data-bs-scroll</code> attribute to
                                                    toggle scrolling and <code
                                                        class="highlighter-rouge">data-bs-backdrop</code> to toggle the
                                                    backdrop.
                                                </p>
                                                <div class="example">
                                                    <div class="btn-list">
                                                        <button aria-controls="offcanvasScrolling" class="btn btn-gray"
                                                            data-bs-target="#offcanvasScrolling" data-bs-toggle="offcanvas"
                                                            type="button">Enable body scrolling</button>
                                                        <button aria-controls="offcanvasWithBackdrop"
                                                            class="btn btn-primary" data-bs-target="#offcanvasWithBackdrop"
                                                            data-bs-toggle="offcanvas" type="button">Enable backdrop
                                                            (default)</button>
                                                        <button aria-controls="offcanvasWithBothOptions"
                                                            class="btn btn-gray-dark"
                                                            data-bs-target="#offcanvasWithBothOptions"
                                                            data-bs-toggle="offcanvas" type="button">scrolling &
                                                            backdrop</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- OFFCANVAS DEMO -->
                            <div aria-labelledby="offcanvas-1Label" class="offcanvas offcanvas-start" id="offcanvas-1" tabindex="-1">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvas-1Label">Offcanvas</h5>
                                    <button aria-label="Close" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        type="button"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <div>
                                        <p>Some text as placeholder. In real life you can have the elements you have
                                            chosen. Like, text, images, lists, etc.</p>
                                    </div>
                                    <div class="dropdown mt-3">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                            Dropdown<span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- OFFCANVAS PLACEMENT-LEFT -->
                            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasStart" aria-labelledby="offcanvasStartLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasStartLabel">Offcanvas Left</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed non, quas ipsa ipsum quod nemo.</p>
                                </div>
                            </div>

                            <!-- OFFCANVAS PLACEMENT-TOP -->
                            <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasTopLabel">Offcanvas Top</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea ipsa nesciunt, natus ullam consequuntur animi. Quam cum quidem adipisci reprehenderit!</p>
                                </div>
                            </div>

                            <!-- OFFCANVAS PLACEMENT-RIGHT -->
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasEndLabel">Offcanvas Right</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio reprehenderit deserunt aspernatur ad eum voluptatibus.</p>
                                </div>
                            </div>

                            <!-- OFFCANVAS PLACEMENT-BOTTOM -->
                            <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom"
                                aria-labelledby="offcanvasBottomLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasBottomLabel">Offcanvas Bottom</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis earum obcaecati quasi veritatis libero magnam quos perspiciatis aliquid accusamus molestias.</p>
                                </div>
                            </div>

                            <!-- OFFCANVAS BODY SCROLL -->
                            <div aria-labelledby="offcanvasScrollingLabel" class="offcanvas offcanvas-start" data-bs-backdrop="false"
                                data-bs-scroll="true" id="offcanvasScrolling" tabindex="-1">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Colored with scrolling</h5><button
                                        aria-label="Close" class="btn-close text-reset" data-bs-dismiss="offcanvas" type="button"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <p>Try scrolling the rest of the page to see this option in action.</p>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil laborum deleniti aliquam, maiores, nam temporibus suscipit corporis animi laudantium mollitia doloremque nisi aliquid laboriosam, a eligendi nobis magni fuga! Repudiandae magnam aspernatur voluptate autem ut.</p>
                                </div>
                            </div>

                            <!-- OFFCANVAS BACKDROP SCROLL -->
                            <div aria-labelledby="offcanvasWithBackdropLabel" class="offcanvas offcanvas-start" id="offcanvasWithBackdrop"
                                tabindex="-1">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">Offcanvas with backdrop</h5><button
                                        aria-label="Close" class="btn-close text-reset" data-bs-dismiss="offcanvas" type="button"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores, natus a odit voluptatem vitae maxime totam mollitia veritatis voluptate consequuntur minima suscipit dolor pariatur unde.</p>
                                </div>
                            </div>

                            <!-- OFFCANVAS BOTH SCROLL -->
                            <div aria-labelledby="offcanvasWithBothOptionsLabel" class="offcanvas offcanvas-start" data-bs-scroll="true"
                                id="offcanvasWithBothOptions" tabindex="-1">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5><button
                                        aria-label="Close" class="btn-close text-reset" data-bs-dismiss="offcanvas" type="button"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <p>Try scrolling the rest of the page to see this option in action.</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur doloremque tenetur impedit labore nemo, atque temporibus asperiores illum non unde voluptate obcaecati, nulla quo incidunt! Accusamus magni, sunt corporis necessitatibus laboriosam quod perferendis nihil quisquam facere? Sint cupiditate eos repellendus!</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius nihil laudantium excepturi officiis libero omnis nisi optio suscipit mollitia! Aliquam quo eveniet numquam distinctio iure neque dolorum. Vel reprehenderit repellat magnam ipsam. Libero aut vitae aliquid consequatur quasi voluptate, assumenda eligendi at! Aperiam eaque repellendus mollitia ut error. Laudantium vitae magnam praesentium ipsa quas, illo cum eum doloremque necessitatibus accusamus assumenda minus voluptate dolore aspernatur tenetur, accusantium ad repudiandae quos consectetur a amet distinctio dicta ratione ipsam. Maiores aliquam voluptatem alias odio possimus porro ex nulla voluptas consequuntur ratione voluptate, molestiae ad quae dolor inventore praesentium quidem reiciendis mollitia nisi?</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero officiis maiores nulla, illo tempore eligendi molestiae optio debitis nihil, explicabo nemo quam, praesentium ex! Quia sapiente nulla eveniet voluptas aspernatur corrupti eius vel tempore odio voluptatum alias, aut nam nihil eos distinctio dolorum totam nisi ducimus, laboriosam minus eum hic, blanditiis maiores. Distinctio laudantium similique quam aperiam, voluptatum dicta deleniti nemo laboriosam cumque reprehenderit in facilis, ut accusamus earum officiis? Sed odit corporis, cum quisquam omnis doloribus explicabo accusamus optio iusto officia non id aspernatur similique alias nobis at vel totam dignissimos natus! Earum optio amet magni modi atque nam! Tempora sunt, quo reiciendis id suscipit dolorum sed praesentium corrupti. Aliquam maiores reprehenderit ratione rerum nostrum iure dicta aspernatur quibusdam dolor! Distinctio labore similique pariatur autem totam dolor maiores itaque eaque. Fuga veniam id ipsum odit ducimus cum assumenda quia iure non, commodi ea illo quisquam corrupti cumque alias. Libero.</p>
                                </div>
                            </div>

@endsection

@section('scripts')

@endsection