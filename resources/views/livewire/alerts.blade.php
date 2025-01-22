@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Alerts</li>
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
                                <div class="col-xl-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Dismissing
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-area">
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <strong>Holy guacamole!</strong> You should check in on some of those fields
                                                    below.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close">x</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Live example
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-area">
                                                <div id="liveAlertPlaceholder">
                                                    <div class="mb-2"></div>
                                                    <div class="mb-2"></div>
                                                    <div class="mb-2"></div>
                                                    <div class="mb-2"></div>
                                                </div>
                                                <button type="button" class="btn btn-primary" id="liveAlertBtn">Show live
                                                    alert
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Default alerts</h3>
                                            <label class="custom-switch" data-bs-toggle="collapse" data-bs-target="#alert1">
                                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Show Code</span>
                                            </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="">
                                                    <div class="alert alert-primary" role="alert"><button type="button"
                                                            class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button>Primary alert—At vero eos et
                                                        accusamus
                                                        praesentium!</div>
                                                    <div class="alert alert-secondary" role="alert"><button type="button"
                                                            class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button>Secondary alert—At vero eos et
                                                        accusamus
                                                        praesentium!</div>
                                                    <div class="alert alert-success" role="alert"><button type="button"
                                                            class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button>Success alert—At vero eos et
                                                        accusamus
                                                        praesentium!</div>
                                                    <div class="alert alert-info" role="alert"><button type="button"
                                                            class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button>Info alert—At vero eos et accusamus
                                                        praesentium!</div>
                                                    <div class="alert alert-warning" role="alert"><button type="button"
                                                            class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button>Warning alert—At vero eos et
                                                        accusamus
                                                        praesentium!</div>
                                                    <div class="alert alert-danger" role="alert"><button type="button"
                                                            class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button>Danger alert—At vero eos et
                                                        accusamus
                                                        praesentium!</div>
                                                </div>
                                                <div class="collapse" id="alert1">
                                                    <div class="highlight">
    <pre><code class="language-html" data-lang="html">
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"alert alert-primary"</span> <span class="na">role=</span><span class="s">"alert"</span><span class="nt">&gt;</span>
        Primary alert—At vero eos et accusamus praesentium!
    <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"alert alert-secondary"</span> <span class="na">role=</span><span class="s">"alert"</span><span class="nt">&gt;</span>
        Secondary alert—At vero eos et accusamus praesentium!
    <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"alert alert-success"</span> <span class="na">role=</span><span class="s">"alert"</span><span class="nt">&gt;</span>
        Success alert—At vero eos et accusamus praesentium!
    <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"alert alert-info"</span> <span class="na">role=</span><span class="s">"alert"</span><span class="nt">&gt;</span>
        Info alert—At vero eos et accusamus praesentium!
    <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"alert alert-warning"</span> <span class="na">role=</span><span class="s">"alert"</span><span class="nt">&gt;</span>
        Warning alert—At vero eos et accusamus praesentium!
    <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"alert alert-danger"</span> <span class="na">role=</span><span class="s">"alert"</span><span class="nt">&gt;</span>
        Danger alert—At vero eos et accusamus praesentium!
    <span class="nt">&lt;/div&gt;</span></code></pre>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Alerts With Icons</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="">
                                                    <div class="alert alert-default" role="alert">
                                                        <span class="alert-inner--icon"><i
                                                                class="fe fe-download me-2"></i></span>
                                                        <span class="alert-inner--text"><strong>Default!</strong> This is a
                                                            warning alert—check it out that has an icon too!</span>
                                                    </div>
                                                    <div class="alert alert-primary" role="alert">
                                                        <span class="alert-inner--icon"><i
                                                                class="fe fe-check-square me-2"></i></span>
                                                        <span class="alert-inner--text"><strong>Primary!</strong> This is a
                                                            warning alert—check it out that has an icon too!</span>
                                                    </div>
                                                    <div class="alert alert-success" role="alert">
                                                        <span class="alert-inner--icon"><i
                                                                class="fe fe-thumbs-up me-2"></i></span>
                                                        <span class="alert-inner--text"><strong>Success!</strong> This is a
                                                            warning alert—check it out that has an icon too!</span>
                                                    </div>
                                                    <div class="alert alert-info" role="alert">
                                                        <span class="alert-inner--icon"><i class="fe fe-bell me-2"></i></span>
                                                        <span class="alert-inner--text"><strong>Info!</strong> This is a
                                                            warning
                                                            alert—check it out that has an icon too!</span>
                                                    </div>
                                                    <div class="alert alert-warning" role="alert">
                                                        <span class="alert-inner--icon"><i class="fe fe-info me-2"></i></span>
                                                        <span class="alert-inner--text"><strong>Warning!</strong> This is a
                                                            warning alert—check it out that has an icon too!</span>
                                                    </div>
                                                    <div class="alert alert-danger mb-0" role="alert">
                                                        <span class="alert-inner--icon"><i class="fe fe-slash me-2"></i></span>
                                                        <span class="alert-inner--text"><strong>Danger!</strong> This is a
                                                            warning alert—check it out that has an icon too!</span>
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
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class=" card-title mb-0">Alerts With Icons Dismissing</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="">
                                                    <div class="alert alert-default alert-dismissible fade show"
                                                        role="alert">
                                                        <span class="alert-inner--icon"><i
                                                                class="fe fe-download me-2"></i></span>
                                                        <span class="alert-inner--text"><strong>Default!</strong> This is a
                                                            default alert—check it out!</span>
                                                        <button type="button" class="btn-close me-2" data-bs-dismiss="alert"
                                                            aria-label="Close">x
                                                        </button>
                                                    </div>
                                                    <div class="alert alert-primary alert-dismissible fade show"
                                                        role="alert">
                                                        <span class="alert-inner--icon"><i
                                                                class="fe fe-check-square me-2"></i></span>
                                                        <span class="alert-inner--text"><strong>Primary!</strong> This is a
                                                            primary alert—check it out!</span>
                                                        <button type="button" class="btn-close me-2" data-bs-dismiss="alert"
                                                            aria-label="Close">x
                                                        </button>
                                                    </div>
                                                    <div class="alert alert-success alert-dismissible fade show"
                                                        role="alert">
                                                        <span class="alert-inner--icon me-2"><i
                                                                class="fe fe-thumbs-up"></i></span>
                                                        <span class="alert-inner--text"><strong>Success!</strong> This is a
                                                            success alert—check it out!</span>
                                                        <button type="button" class="btn-close me-2" data-bs-dismiss="alert"
                                                            aria-label="Close">x
                                                        </button>
                                                    </div>
                                                    <div class="alert alert-warning alert-dismissible fade show"
                                                        role="alert">
                                                        <span class="alert-inner--icon"><i class="fe fe-info me-2"></i></span>
                                                        <span class="alert-inner--text"><strong>Warning!</strong> This is a
                                                            warning alert—check it out!</span>
                                                        <button type="button" class="btn-close me-2" data-bs-dismiss="alert"
                                                            aria-label="Close">x
                                                        </button>
                                                    </div>
                                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <span class="alert-inner--icon"><i class="fe fe-bell me-2"></i></span>
                                                        <span class="alert-inner--text"><strong>Info!</strong> This is a
                                                            info
                                                            alert—check it out!</span>
                                                        <button type="button" class="btn-close me-2" data-bs-dismiss="alert"
                                                            aria-label="Close">x
                                                        </button>
                                                    </div>
                                                    <div class="alert alert-danger alert-dismissible fade show mb-0"
                                                        role="alert">
                                                        <span class="alert-inner--icon"><i class="fe fe-slash me-2"></i></span>
                                                        <span class="alert-inner--text"><strong>Danger!</strong> This is a
                                                            danger alert—check it out!</span>
                                                        <button type="button" class="btn-close me-2" data-bs-dismiss="alert"
                                                            aria-label="Close">x
                                                        </button>
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
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Links in alerts</h3>
                                            <label class="custom-switch" data-bs-toggle="collapse" data-bs-target="#alert2">
                                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Show Code</span>
                                            </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="">
                                                    <div class="alert alert-success" role="alert"><button type="button"
                                                            class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button><strong>Well done!</strong> You
                                                        successfully read <a href="javascript:void(0);" class="alert-link">this important
                                                            alert
                                                            message.</a></div>
                                                    <div class="alert alert-info" role="alert"><button type="button"
                                                            class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button><strong>Heads up!</strong> This<a
                                                            href="javascript:void(0);" class="alert-link"> alert needs your attention,</a> but
                                                        it's not super important.</div>
                                                    <div class="alert alert-warning" role="alert"><button type="button"
                                                            class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button><strong>Warning! </strong> Better
                                                        check
                                                        yourself, you're <a href="javascript:void(0);" class="alert-link">not looking too
                                                            good.</a></div>
                                                    <div class="alert alert-danger" role="alert"><button type="button"
                                                            class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button><strong>Oh snap!</strong> <a
                                                            href="javascript:void(0);" class="alert-link">Change a few things up </a>and try
                                                        submitting
                                                        again.</div>
                                                </div>
                                                <div class="collapse" id="alert2">
                                                    <div class="highlight">
    <pre><code class="language-html" data-lang="html">
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"alert alert-success"</span> <span class="na">role=</span><span class="s">"alert"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;strong&gt;</span>Well done!<span class="nt">&lt;/strong&gt;</span>You successfully read <span class="s">&lt;a</span> <span class="s">href="javascript:void(0)"</span><span class="na">class=</span><span class="s">"alert-link"</span><span class="nt">&gt;</span> this important alert message.<span class="nt">&lt;/a&gt;</span>
    <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"alert alert-info"</span> <span class="na">role=</span><span class="s">"alert"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;strong&gt;</span>Heads up!<span class="nt">&lt;/strong&gt;</span> This <span class="s">&lt;a</span> <span class="s">href="javascript:void(0)"</span><span class="na">class=</span><span class="s">"alert-link"</span><span class="nt">&gt;</span>alert needs your attention,<span class="nt">&lt;/a&gt;</span> but it's not super important.
    <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"alert alert-warning"</span> <span class="na">role=</span><span class="s">"alert"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;strong&gt;</span>Warning!<span class="nt">&lt;/strong&gt;</span>Better check yourself, you're<span class="s">&lt;a</span> <span class="s">href="javascript:void(0)"</span><span class="na">class=</span><span class="s">"alert-link"</span><span class="nt">&gt;</span>not looking too good.<span class="nt">&lt;/a&gt;</span>
    <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"alert alert-danger"</span> <span class="na">role=</span><span class="s">"alert"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;strong&gt;</span>Oh snap!<span class="nt">&lt;/strong&gt;</span><span class="s">&lt;a</span> <span class="s">href="javascript:void(0)"</span><span class="na">class=</span><span class="s">"alert-link"</span><span class="nt">&gt;</span>Change a few things up<span class="nt">&lt;/a&gt;</span>and try submitting again.
    <span class="nt">&lt;/div&gt;</span></code></pre>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Alert with icon</h3>
                                            <label class="custom-switch" data-bs-toggle="collapse" data-bs-target="#alert7">
                                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Show Code</span>
                                            </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="">
                                                    <div class="alert alert-success" role="alert"><button type="button"
                                                            class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button>
                                                        <i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> Well
                                                        done!
                                                        You successfully read this important alert message.
                                                    </div>
                                                    <div class="alert alert-info" role="alert"><button type="button"
                                                            class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button><i class="fa fa-bell-o me-2"
                                                            aria-hidden="true"></i>Heads up! This alert needs your
                                                        attention,
                                                        but it's not super important.</div>
                                                    <div class="alert alert-warning" role="alert"><button type="button"
                                                            class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button><i class="fa fa-exclamation me-2"
                                                            aria-hidden="true"></i> Warning! Better check yourself, you're
                                                        not
                                                        looking too good.</div>
                                                    <div class="alert alert-danger" role="alert"><button type="button"
                                                            class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button><i class="fa fa-frown-o me-2"
                                                            aria-hidden="true"></i>Oh snap!Change a few things up and try
                                                        submitting again.</div>
                                                </div>
                                                <div class="collapse" id="alert7">
                                                    <div class="highlight">
    <pre><code class="language-html" data-lang="html">
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"alert alert-icon alert-success"</span> <span class="na">role=</span><span class="s">"alert"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;i</span> <span class="na">class=</span><span class="s">"fa fa-check-circle-o me-2"</span> <span class="na">aria-hidden=</span><span class="s">"true"</span><span class="nt">&gt;&lt;/i&gt;</span> Well done! You successfully read this important alert message.
    <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"alert alert-icon alert-info"</span> <span class="na">role=</span><span class="s">"alert"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;i</span> <span class="na">class=</span><span class="s">"fa fa-bell-o me-2"</span> <span class="na">aria-hidden=</span><span class="s">"true"</span><span class="nt">&gt;&lt;/i&gt;</span> Heads up! This alert needs your attention, but it's not super important.
    <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"alert alert-icon alert-warning"</span> <span class="na">role=</span><span class="s">"alert"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;i</span> <span class="na">class=</span><span class="s">"fa fa-exclamation me-2"</span> <span class="na">aria-hidden=</span><span class="s">"true"</span><span class="nt">&gt;&lt;/i&gt;</span>  Warning! Better check yourself, you're not looking too good.
    <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"alert alert-icon alert-danger"</span> <span class="na">role=</span><span class="s">"alert"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;i</span> <span class="na">class=</span><span class="s">"fa fa-frown-o me-2"</span> <span class="na">aria-hidden=</span><span class="s">"true"</span><span class="nt">&gt;&lt;/i&gt;</span> Oh snap!Change a few things up and try submitting again.
    <span class="nt">&lt;/div&gt;</span></code></pre>
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
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Alerts style</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="alert alert-success">
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button>
                                                        <strong>Success Message</strong>
                                                        <hr class="message-inner-separator">
                                                        <p>You successfully read this important alert message.</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="alert alert-info">
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button>
                                                        <strong>Info Message</strong>
                                                        <hr class="message-inner-separator">
                                                        <p>This alert needs your attention, but it's not super important.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="alert alert-warning">
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button>
                                                        <strong>Warning Message</strong>
                                                        <hr class="message-inner-separator">
                                                        <p>Best check the yo self, you're not looking too good.</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="alert alert-danger">
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-hidden="true">x</button>
                                                        <strong>Danger Message</strong>
                                                        <hr class="message-inner-separator">
                                                        <p>Change a few things up and try submitting again.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Tabs Alerts
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <ul class="nav nav-pills nav-with-alerts">
                                                <li class="col-lg-3">
                                                    <a href="#info" data-bs-toggle="tab">
                                                        <div class="alert alert-info">
                                                            Informations
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="col-lg-3">
                                                    <a href="#success" data-bs-toggle="tab">
                                                        <div class="alert alert-success">
                                                            Success
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="col-lg-3">
                                                    <a href="#warning" data-bs-toggle="tab">
                                                        <div class="alert alert-warning">
                                                            Warnings
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="col-lg-3">
                                                    <a href="#error" data-bs-toggle="tab">
                                                        <div class="alert alert-danger">
                                                            Errors
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <div class="tab-pane fade pb-0" id="info">
                                                    <div class="alert alert-info m-0">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
                                                            vehicula
                                                            nec arcu at faucibus. Duis justo urna, adipiscing quis turpis
                                                            non,
                                                            dictum hendrerit ipsum. Fusce non viverra erat. Curabitur sit
                                                            amet
                                                            ante dui. Donec congue molestie mi a varius. Suspendisse
                                                            potenti.
                                                            Cum sociis natoque penatibus et magnis dis parturient montes,
                                                            nascetur ridiculus mus. Aliquam ornare quam eu ultricies
                                                            bibendum.
                                                            Cras ante augue, pharetra eget ultricies eu, aliquam eu velit.
                                                            Phasellus mattis vitae justo pretium tempus. Duis vitae felis et
                                                            sem
                                                            tristique suscipit. Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit</p>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade pb-0" id="success">
                                                    <div class="alert alert-success mb-0">
                                                        <p>Nulla magna sapien, ullamcorper nec dolor id, gravida venenatis
                                                            velit. Aliquam et malesuada metus. Sed vitae turpis pharetra
                                                            nunc
                                                            dignissim ultricies et sit amet lacus. Cras gravida felis
                                                            mauris, a
                                                            pellentesque augue interdum ac. In varius facilisis ante, nec
                                                            viverra libero commodo ac. Maecenas tempus, elit nec aliquet
                                                            fermentum, tellus odio auctor sapien, eu scelerisque purus
                                                            turpis
                                                            quis eros. Morbi id ante diam. Phasellus aliquet purus id odio
                                                            mollis dignissim. Proin sagittis, risus a ullamcorper dapibus,
                                                            velit
                                                            enim adipiscing nulla, vel facilisis ipsum dui quis diam.
                                                            Aliquam
                                                            ullamcorper accumsan felis id consequat. Nullam vehicula ut mi
                                                            eget
                                                            porta.</p>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade pb-0" id="warning">
                                                    <div class="alert alert-warning mb-0">
                                                        <p>Curabitur varius euismod nisi ac lacinia. Curabitur nec urna
                                                            adipiscing, fermentum augue id, commodo nisl. Quisque ut
                                                            convallis
                                                            est. Suspendisse tellus nisi, tempus eu nulla quis, laoreet
                                                            imperdiet ante. Vivamus in lorem purus. Integer luctus elit et
                                                            metus
                                                            condimentum porta. Suspendisse viverra sit amet mauris vel
                                                            elementum. Fusce lorem arcu, accumsan non odio vel, vestibulum
                                                            pharetra odio. Sed non mollis mi, ac lacinia nunc. Cras eleifend
                                                            massa velit, tincidunt tempor arcu sodales at. Nam sit amet erat
                                                            enim. Mauris placerat suscipit odio, vitae gravida purus
                                                            bibendum
                                                            sed. Suspendisse a nunc quis libero rutrum mattis at ac metus.
                                                            In ac
                                                            risus eleifend, vestibulum mi eget, dapibus nulla. Nunc diam
                                                            eros,
                                                            convallis a sagittis non, rhoncus non nunc. Maecenas in eleifend
                                                            quam.</p>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade pb-0" id="error">
                                                    <div class="alert alert-danger mb-0">
                                                        <p>Sed quis dapibus nunc. Proin vestibulum libero elit, gravida
                                                            tincidunt mauris tincidunt blandit. Donec non ultrices neque,
                                                            nec
                                                            sollicitudin elit. Curabitur volutpat nulla vel mauris
                                                            vestibulum,
                                                            tempor ultrices quam ullamcorper. Fusce ultricies elementum
                                                            pretium.
                                                            In vel consectetur leo, nec rutrum velit. Fusce fermentum
                                                            pulvinar
                                                            nibh. Ut posuere ante sed luctus egestas. Aenean ut suscipit
                                                            tortor.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- ALERTS JS -->
        @vite('resources/assets/js/alerts.js')


@endsection