@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Colors</li>
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
                                        <div class="card-header d-flex justify-content-between aglin-items-center">
                                            <h3 class="card-title">Contextual colors</h3>
                                            <label class="custom-switch" data-bs-toggle="collapse" data-bs-target="#colors1">
                                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Show Code</span>
                                            </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="example p-0">
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7 bg-primary  me-4"></div>
                                                                <div>
                                                                    <strong>Primary</strong><br>
                                                                    <code>.bg-primary</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-info  me-4"></div>
                                                                <div>
                                                                    <strong>Info</strong><br>
                                                                    <code>.bg-info</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-secondary  me-4"></div>
                                                                <div>
                                                                    <strong>Secondary</strong><br>
                                                                    <code>.bg-secondary</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-warning  me-4"></div>
                                                                <div>
                                                                    <strong>Warning</strong><br>
                                                                    <code>.bg-warning</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-danger  me-4"></div>
                                                                <div>
                                                                    <strong>Danger</strong><br>
                                                                    <code>.bg-danger</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-success  me-4"></div>
                                                                <div>
                                                                    <strong>Success</strong><br>
                                                                    <code>.bg-success</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="collapse" id="colors1">
                                                    <div class="highlight">
    <pre>Example: <code class="language-html" data-lang="html">
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"d-flex align-items-center mb-3 mt-3"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"w-7 h-7 bg-primary rounded me-4"</span><span class="nt">&gt;&lt;/div&gt;</span>
        <span class="nt">&lt;div&gt;</span>
            <span class="nt">&lt;strong&gt;</span>Primary<span class="nt">&lt;/strong&gt;&lt;br</span> <span class="nt">/&gt;</span>
            <span class="nt">&lt;code&gt;</span>.bg-primary<span class="nt">&lt;/code&gt;</span>
        <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;/div&gt;</span>
    </code></pre>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                            <h3 class="card-title">Gradient colors</h3>
                                            <label class="custom-switch" data-bs-toggle="collapse" data-bs-target="#colors2">
                                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Show Code</span>
                                            </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="example p-0">
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-6 col-sm-12 col-xl-4">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-gradient-primary  me-4"></div>
                                                                <div>
                                                                    <strong>Primary</strong><br>
                                                                    <code>.bg-gradient-primary</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-lg-6 col-sm-12 col-xl-4">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-gradient-secondary  me-4">
                                                                </div>
                                                                <div>
                                                                    <strong>Secondary</strong><br>
                                                                    <code>.bg-gradient-secondary</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-lg-6 col-sm-12 col-xl-4">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7 bg-gradient-danger  me-4"></div>
                                                                <div>
                                                                    <strong>Danger</strong><br>
                                                                    <code>.bg-gradient-danger</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-lg-6 col-sm-12 col-xl-4">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-gradient-warning  me-4"></div>
                                                                <div>
                                                                    <strong>Warning</strong><br>
                                                                    <code>.bg-gradient-warning</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-lg-6 col-sm-12 col-xl-4">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-gradient-info  me-4"></div>
                                                                <div>
                                                                    <strong>info</strong><br>
                                                                    <code>.bg-gradient-info</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-lg-6 col-sm-12 col-xl-4">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-gradient-success  me-4"></div>
                                                                <div>
                                                                    <strong>Success</strong><br>
                                                                    <code>.bg-gradient-success</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="collapse" id="colors2">
                                                    <div class="highlight">
    <pre>Example: <code class="language-html" data-lang="html">
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"d-flex align-items-center mb-3 mt-3"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"w-7 h-7 bg-primary rounded me-4"</span><span class="nt">&gt;&lt;/div&gt;</span>
        <span class="nt">&lt;div&gt;</span>
            <span class="nt">&lt;strong&gt;</span>Primary<span class="nt">&lt;/strong&gt;&lt;br</span> <span class="nt">/&gt;</span>
            <span class="nt">&lt;code&gt;</span>.bg-primary-gradient<span class="nt">&lt;/code&gt;</span>
        <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;/div&gt;</span>
    </code></pre>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Other colors</h3>
                                            <label class="custom-switch" data-bs-toggle="collapse" data-bs-target="#colors3">
                                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Show Code</span>
                                            </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="example p-0">
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-blue  me-4"></div>
                                                                <div>
                                                                    <strong>Blue</strong><br>
                                                                    <code>.bg-blue</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-red  me-4"></div>
                                                                <div>
                                                                    <strong>Red</strong><br>
                                                                    <code>.bg-red</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-teal  me-4"></div>
                                                                <div>
                                                                    <strong>Teal</strong><br>
                                                                    <code>.bg-teal</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-azure   me-4"></div>
                                                                <div>
                                                                    <strong>Azure</strong><br>
                                                                    <code>.bg-azure </code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-orange  me-4"></div>
                                                                <div>
                                                                    <strong>Orange</strong><br>
                                                                    <code>.bg-orange</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-cyan  me-4"></div>
                                                                <div>
                                                                    <strong>Cyan</strong><br>
                                                                    <code>.bg-cyan</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-indigo  me-4"></div>
                                                                <div>
                                                                    <strong>Indigo</strong><br>
                                                                    <code>.bg-indigo</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-yellow  me-4"></div>
                                                                <div>
                                                                    <strong>Yellow</strong><br>
                                                                    <code>.bg-yellow</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7 bg-gray  me-4"></div>
                                                                <div>
                                                                    <strong>Gray</strong><br>
                                                                    <code>.bg-gray</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-purple   me-4"></div>
                                                                <div>
                                                                    <strong>Purple</strong><br>
                                                                    <code>.bg-purple </code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-lime  me-4"></div>
                                                                <div>
                                                                    <strong>Lime</strong><br>
                                                                    <code>.bg-lime</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7 bg-gray-dark  me-4"></div>
                                                                <div>
                                                                    <strong>Dark Gray</strong><br>
                                                                    <code>.bg-gray-dark</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-pink   me-4"></div>
                                                                <div>
                                                                    <strong>Pink</strong><br>
                                                                    <code>.bg-pink </code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-green  me-4"></div>
                                                                <div>
                                                                    <strong>Green</strong><br>
                                                                    <code>.bg-green</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-4 col-sm-6">
                                                            <div class="d-flex align-items-center mb-3 mt-3">
                                                                <div class="w-8 h-8 br-7  bg-secondary  me-4"></div>
                                                                <div>
                                                                    <strong>secondary</strong><br>
                                                                    <code>.bg-secondary</code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="collapse" id="colors3">
                                                        <div class="highlight mb-0">
    <pre>Example: <code class="language-html" data-lang="html">
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"d-flex align-items-center mb-3 mt-3"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"w-7 h-7 bg-blue rounded me-4"</span><span class="nt">&gt;&lt;/div&gt;</span>
        <span class="nt">&lt;div&gt;</span>
            <span class="nt">&lt;strong&gt;</span>Blue<span class="nt">&lt;/strong&gt;&lt;br</span> <span class="nt">/&gt;</span>
            <span class="nt">&lt;code&gt;</span>.bg-blue<span class="nt">&lt;/code&gt;</span>
        <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;/div&gt;</span>
    </code></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- row end -->
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

@endsection