@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Modal</li>
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
                                <div class="col-md-6 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Basic Modal</h3>
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn br-7 btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">View modal</button>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-md-6 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Scrolling Modal</h3>
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn br-7 btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalLong">View modal</button>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-md-6 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Large Modal</h3>
                                        </div>
                                        <div class="card-body">
                                            <button class="btn br-7 btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#largeModal">View
                                                modal</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Grid Modal</h3>
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn br-7 btn-pink" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal2">View modal</button>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-md-6 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Small Modal</h3>
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn br-7 btn-teal" data-bs-toggle="modal"
                                                data-bs-target="#smallModal">View modal</button>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-md-6 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Input Modal</h3>
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn br-7 btn-info" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal3">View modal</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Fullscreen Modal</h3>
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalFullscreen">Full screen</button>
                                            <div class="modal fade" id="exampleModalFullscreen" tabindex="-1"
                                                aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true"
                                                style="display: none;">
                                                <div class="modal-dialog modal-fullscreen">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title h4" id="exampleModalFullscreenLabel">Full
                                                                screen modal</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, rem qui consequuntur non doloremque sint eaque nisi fuga ullam ipsum atque ea quia incidunt et odio perspiciatis totam saepe! Exercitationem soluta dignissimos fugiat reiciendis at iure, natus earum accusantium aliquam animi explicabo sint iusto quas dicta nulla saepe dolorem molestiae!</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Select2 Inside Modal</h3>
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn ripple btn-purple" data-bs-target="#select2modal" data-bs-toggle="modal">View Demo</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Toggle between modals</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row row-sm">
                                                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                                                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Show a second modal and hide this one with the button below.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                                                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Hide this modal and show the first with the button below.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn ripple btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">View Demo</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Popover Modal</h3>
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn btn-success" data-bs-target="#popover" data-bs-toggle="modal">View Demo</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Vertically centered</h3>
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn ripple btn-orange" data-bs-target="#Vertically" data-bs-toggle="modal">View Demo</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Scrolling with Content</h3>
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn ripple btn-pink" data-bs-target="#scrollmodal" data-bs-toggle="modal">View Demo</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Flatpicker Modal</h3>
                                        </div>
                                        <div class="card-body">
                                            <a class="btn btn-blue" data-bs-target="#modal-Flatpicker" data-bs-toggle="modal" href="javascript:;">View Demo</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->
@endsection

@section('modal-page-content')

                    <!-- MODAL -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Modal body text goes here.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary br-7"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary br-7">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MODAL -->

                    <!-- MODAL -->
                    <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodal"
                        aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="smallmodal1">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Modal body text goes here.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MODAL -->

                    <!-- MODAL -->
                    <div class="modal fade" id="normalmodal" tabindex="-1" role="dialog" aria-labelledby="normalmodal"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="normalmodal1">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Modal body text goes here.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MODAL -->

                    <!-- MODAL -->
                    <div class="modal fade" id="largemodal" tabindex="-1" role="dialog" aria-labelledby="largemodal"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg " role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="largemodal1">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Modal body text goes here.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary br-7"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary br-7">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MODAL -->

                    <!-- SCROLLING MODAL -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p> sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim
                                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu fugiat nulla pariatur.</p>
                                    <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum
                                        soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime
                                        placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.
                                        Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
                                        saepe
                                        eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                                    <p>These cases are perfectly simple and easy to distinguish. In a free hour, when
                                        our
                                        power of choice is untrammelled and when nothing prevents our being able to do
                                        what
                                        we like best, every pleasure is to be welcomed and every pain avoided. </p>
                                    <p> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                                        quia
                                        consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                                        porro
                                        quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                                        velit,
                                        sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                                        aliquam
                                        quaerat voluptatem.</p>
                                    <p> No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but
                                        because those who do not know how to pursue pleasure rationally encounter
                                        consequences that are extremely painful. Nor again is there anyone who loves or
                                        pursues or desires to obtain pain of itself, because it is pain, but because
                                        occasionally circumstances occur in which toil and pain can procure him some
                                        great
                                        pleasure.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                        nulla
                                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                        officia
                                        deserunt mollit anim id est laborum."</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary br-7"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary br-7">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MODAL -->

                    <!-- LARGE MODAL -->
                    <div id="largeModal" class="modal fade">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content ">
                                <div class="modal-header pd-x-20">
                                    <h6 class="modal-title">Message Preview</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body pd-20">
                                    <h5 class=" lh-3 mg-b-20"><a href="javascrip;t:void(0);" class="fw-bold">Why We Use Electoral College,
                                            Not
                                            Popular Vote</a></h5>
                                    <p class="">It is a long established fact that a reader will be distracted by the
                                        readable content of a page when looking at its layout. The point of using Lorem
                                        Ipsum is that it has a more-or-less normal distribution of letters, as opposed
                                        to
                                        using 'Content here, content here', making it look like readable English. </p>
                                </div><!-- modal-body -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary br-7">Save changes</button>
                                    <button type="button" class="btn btn-secondary br-7"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div><!-- modal-dialog -->
                    </div>
                    <!-- END LARGE MODAL -->

                    <!-- SMALL MODAL -->
                    <div id="smallModal" class="modal fade">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Message Preview</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>This is a modal with small size</p>
                                </div><!-- modal-body -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary br-7">Save changes</button>
                                    <button type="button" class="btn btn-secondary br-7"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div><!-- modal-dialog -->
                    </div>
                    <!-- END SMALL MODAL -->

                    <!-- GRID MODAL -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="example-Modal2">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                accusantium
                                                doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                                                inventore
                                                veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>But I must explain to you how all this mistaken idea of denouncing
                                                pleasure
                                                and praising pain was born and I will give you a complete account of the
                                                who
                                                loves toil and pain can procureor sit aspernatur system.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>expound the actual teachings of the great explorer of the truth, the
                                                master-builder of human happiness. No one rejects, dislikes, or avoids
                                                pleasure itself, because it is pleasure desires to obtain pain.</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur,
                                                adipisci velit, sed quia non numquam eius modi tempora incidunt ut
                                                labore et
                                                dolore magnam aliquam quaerat aut odit voluptatem.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary br-7"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary br-7">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END GRID MODAL -->

                    <!-- MESSAGE MODAL -->
                    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="example-Modal3">New message</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Recipient:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="form-control-label">Message:</label>
                                            <textarea class="form-control" id="message-text"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary br-7"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary br-7">Send message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MODAL -->

@endsection

@section('modal-page-content1')

                    <!-- SELECT2 INPUT MODAL -->
                    <div class="modal fade" id="select2modal" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">Select2 Modal</h6>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                                </div>
                                <div class="modal-body">
                                    <h6>Modal Body</h6>
                                    <select class="form-control select2 form-select"
                                        data-placeholder="Choose one">
                                        <option label="Choose one">
                                        </option>
                                        <option value="Firefox">Firefox</option>
                                        <option value="Chrome">Chrome</option>
                                        <option value="Safari">Safari</option>
                                        <option value="Opera">Opera</option>
                                        <option value="Internet Explorer">Internet Explorer</option>
                                    </select>
                                    <p class="mt-3">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn ripple btn-success" type="button">Save changes</button> <button class="btn ripple btn-danger" data-bs-dismiss="modal" type="button">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END SELECT2 INPUT MODAL -->

                    <!-- POPOVER MODAL -->
                    <div class="modal fade" id="popover">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content  modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">Popover Modal</h6>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                                </div>
                                <div class="modal-body">
                                    <h5>Popover in a modal</h5>
                                        <p>This <button type="button" class="btn btn-success" data-bs-container="body" data-bs-toggle="popover" data-bs-popover-color="default2"  data-bs-placement="right" title="Popover right" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">button</button> triggers a popover on click.</p>
                                    <h5>Tooltips in a modal</h5>
                                    <p> <button class="btn btn-success me-1" data-bs-placement="top" data-bs-toggle="tooltip" title="Tooltip on top" type="button">This link</button>and <button class="btn btn-success" data-bs-placement="top" data-bs-toggle="tooltip" title="Tooltip on top" type="button">that link</button> have tooltips on hover.</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn ripple btn-primary" type="button">Save changes</button>
                                    <button class="btn ripple btn-success" data-bs-dismiss="modal" type="button">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END POPOVER MODAL -->

                    <!-- VERTICALLY CENTERED MODAL -->
                    <div class="modal fade" id="Vertically">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">Vertically centered Modal</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn ripple btn-primary" type="button">Save changes</button>
                                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END VERTICALLY CENTERED MODAL -->

                    <!-- SCROLL WITH CONTENT MODAL -->
                    <div class="modal fade" id="scrollmodal">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">Scrolling With Content Modal</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. </p>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                    <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.</p>
                                    <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex soluta maxime, consectetur inventore obcaecati quasi velit rem, vel accusamus incidunt ipsa. Sequi repellat amet facilis soluta obcaecati sunt porro commodi earum eum maiores iure, adipisci hic placeat quasi eligendi fuga architecto distinctio magni error laborum atque ad rem dicta? Deleniti.</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn ripple btn-primary" type="button">Save changes</button>
                                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END SCROLL WITH CONTENT MODAL -->

                    <!-- SCROLL WITH CONTENT MODAL  -->
                    <div class="modal fade" id="modal-Flatpicker">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">Flatpicker Modal</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group mb-0">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                            </div>
                                            <input type="text" class="form-control" id="date"
                                                placeholder="Choose date">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn ripple btn-primary" type="button">Save changes</button>
                                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END SCROLL WITH CONTENT MODAL -->

@endsection

@section('scripts')

        <!-- SELECT2 JS -->
        <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>

        <!-- FLATPICKER JS -->
	    <script src="{{asset('build/assets/plugins/flatpickr/flatpickr.js')}}"></script>

        <!-- MODAL JS -->
        @vite('resources/assets/js/modal.js')


@endsection