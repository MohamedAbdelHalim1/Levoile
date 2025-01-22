@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tags</li>
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
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Default tag</h3>
                                            <label class="custom-switch" data-bs-toggle="collapse" data-bs-target="#tag1">
                                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Show Code</span>
                                            </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="example border">
                                                    <div class="tags">
                                                        <span class="tag">First tag</span>
                                                        <span class="tag">Second tag</span>
                                                        <span class="tag">Third tag</span>
                                                    </div>
                                                </div>
                                                <div class="collapse" id="tag1">
                                                    <div class="highlight">
                                                        <pre>Example:
    <code class="language-html" data-lang="html"><span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"tag"</span><span class="nt">&gt;</span>First tag<span class="nt">&lt;/span&gt;</span>
    <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"tag"</span><span class="nt">&gt;</span>Second tag<span class="nt">&lt;/span&gt;</span>
    <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"tag"</span><span class="nt">&gt;</span>Third tag<span class="nt">&lt;/span&gt;</span></code></pre>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Link tag</h3>
                                            <label class="custom-switch" data-bs-toggle="collapse" data-bs-target="#tag2">
                                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Show Code</span>
                                            </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="example border">
                                                    <div class="tags">
                                                        <a href="javascript:void(0);" class="tag">First tag</a>
                                                        <a href="javascript:void(0);" class="tag">Second tag</a>
                                                        <a href="javascript:void(0);" class="tag">Third tag</a>
                                                    </div>
                                                </div>
                                                <div class="collapse" id="tag2">
                                                    <div class="highlight">
                                                        <pre>Example:
    <code class="language-html" data-lang="html"><span class="nt">&lt;a</span> <span class="na">href=</span><span class="s">"#"</span> <span class="na">class=</span><span class="s">"tag"</span><span class="nt">&gt;</span>First tag<span class="nt">&lt;/a&gt;</span>
    <span class="nt">&lt;a</span> <span class="na">href=</span><span class="s">"#"</span> <span class="na">class=</span><span class="s">"tag"</span><span class="nt">&gt;</span>Second tag<span class="nt">&lt;/a&gt;</span>
    <span class="nt">&lt;a</span> <span class="na">href=</span><span class="s">"#"</span> <span class="na">class=</span><span class="s">"tag"</span><span class="nt">&gt;</span>Third tag<span class="nt">&lt;/a&gt;</span></code></pre>
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
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Avatar tag</h3>
                                            <label class="custom-switch" data-bs-toggle="collapse" data-bs-target="#tag3">
                                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Show Code</span>
                                            </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="example border">
                                                    <div class="tags">
                                                        <span class="tag">
                                                            <span class=""><img src="{{asset('build/assets/images/users/female/21.jpg')}}"
                                                                    class="tag-avatar avatar" alt="img"></span>
                                                            Victoria
                                                        </span>
                                                        <span class="tag">
                                                            <span class=""><img src="{{asset('build/assets/images/users/male/33.jpg')}}"
                                                                    class="tag-avatar avatar" alt="img"></span>
                                                            Nathan
                                                        </span>
                                                        <span class="tag">
                                                            <span class=""><img src="{{asset('build/assets/images/users/female/23.jpg')}}"
                                                                    class="tag-avatar avatar" alt="img"></span>
                                                            Alice
                                                        </span>
                                                        <span class="tag">
                                                            <span class=""><img src="{{asset('build/assets/images/users/female/20.jpg')}}"
                                                                    class="tag-avatar avatar" alt="img"></span>
                                                            Rose
                                                        </span>
                                                        <span class="tag">
                                                            <span class=""><img src="{{asset('build/assets/images/users/male/25.jpg')}}"
                                                                    class="tag-avatar avatar" alt="img"></span>
                                                            Peter
                                                        </span>
                                                        <span class="tag">
                                                            <span class=""><img src="{{asset('build/assets/images/users/male/32.jpg')}}"
                                                                    class="tag-avatar avatar" alt="img"></span>
                                                            Wayne
                                                        </span>
                                                        <span class="tag">
                                                            <span class=""><img src="{{asset('build/assets/images/users/female/20.jpg')}}"
                                                                    class="tag-avatar avatar" alt="img"></span>
                                                            Michelle
                                                        </span>
                                                        <span class="tag">
                                                            <span class=""><img src="{{asset('build/assets/images/users/female/24.jpg')}}"
                                                                    class="tag-avatar avatar" alt="img"></span>
                                                            Debra
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="collapse" id="tag3">
                                                    <div class="highlight">
    <pre>Example: <code class="language-html" data-lang="html">
    <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"tag"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"tag-avatar avatar"</span> <span class="na">style=</span><span class="s">"background-image: url({{asset('build/assets/images/users/female/14.jpg')}})"</span><span class="nt">&gt;&lt;/span&gt;</span>
        Victoria
    <span class="nt">&lt;/span&gt;</span></code></pre>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Tag remove</h3>
                                            <label class="custom-switch" data-bs-toggle="collapse" data-bs-target="#tag4">
                                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Show Code</span>
                                            </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="example border">
                                                    <div class="tags">
                                                        <span class="tag">
                                                            One
                                                            <a href="javascript:void(0)" class="tag-addon"><i
                                                                    class="fe fe-x"></i></a>
                                                        </span>
                                                        <span class="tag">
                                                            Two
                                                            <a href="javascript:void(0)" class="tag-addon"><i
                                                                    class="fe fe-x"></i></a>
                                                        </span>
                                                        <span class="tag">
                                                            Three
                                                            <a href="javascript:void(0)" class="tag-addon"><i
                                                                    class="fe fe-x"></i></a>
                                                        </span>
                                                        <span class="tag">
                                                            Four
                                                            <a href="javascript:void(0)" class="tag-addon"><i
                                                                    class="fe fe-x"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="collapse" id="tag4">
                                                    <div class="highlight">
    <pre>Example: <code class="language-html" data-lang="html">
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"tags"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;span</span> <span class="na">class=</span><span class="s">"tag"</span><span class="nt">&gt;</span>
            One
            <span class="nt">&lt;a</span> <span class="na">href=</span><span class="s">"#"</span> <span class="na">class=</span><span class="s">"tag-addon"</span><span class="nt">&gt;&lt;i</span> <span class="na">class=</span><span class="s">"fe fe-x"</span><span class="nt">&gt;&lt;/i&gt;&lt;/a&gt;</span>
        <span class="nt">&lt;/span&gt;</span>
    <span class="nt">&lt;/div&gt;</span></code></pre>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Tag addons</h3>
                                            <label class="custom-switch" data-bs-toggle="collapse" data-bs-target="#tag5">
                                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Show Code</span>
                                            </label>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="example border">
                                                    <div class="tags">
                                                        <div class="tag">
                                                            npm
                                                            <a href="javascript:void(0);" class="tag-addon"><i class="fe fe-x"></i></a>
                                                        </div>
                                                        <div class="tag tag-danger">
                                                            npm
                                                            <span class="tag-addon"><i class="fe fe-activity"></i></span>
                                                        </div>
                                                        <div class="tag">
                                                            bundle
                                                            <span class="tag-addon tag-success">passing</span>
                                                        </div>
                                                        <span class="tag tag-dark">
                                                            CSS gzip size
                                                            <span class="tag-addon tag-warning">20.9 kB</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="collapse" id="tag5">
                                                    <div class="highlight">
    <pre>Example:<code class="language-html" data-lang="html">
    <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"tag"</span><span class="nt">&gt;</span>
        npm
        <span class="nt">&lt;a</span> <span class="na">href=</span><span class="s">"#"</span> <span class="na">class=</span><span class="s">"tag-addon"</span><span class="nt">&gt;&lt;i</span> <span class="na">class=</span><span class="s">"fe fe-x"</span><span class="nt">&gt;&lt;/i&gt;&lt;/a&gt;</span>
    <span class="nt">&lt;/div&gt;</span>
    </code></pre>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Rounded tag</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="example border">
                                                    <div class="tags">
                                                        <span class="tag tag-rounded">First tag</span>
                                                        <span class="tag tag-rounded">Second tag</span>
                                                        <span class="tag tag-rounded">Third tag</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Color tag</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <div class="example border">
                                                    <div class="tags">
                                                        <span class="tag tag-blue">Blue tag</span>
                                                        <span class="tag tag-azure">Azure tag</span>
                                                        <span class="tag tag-indigo">Indigo tag</span>
                                                        <span class="tag tag-purple">Purple tag</span>
                                                        <span class="tag tag-pink">Pink tag</span>
                                                        <span class="tag tag-red">Red tag</span>
                                                        <span class="tag tag-orange">Orange tag</span>
                                                        <span class="tag tag-yellow">Yellow tag</span>
                                                        <span class="tag tag-lime">Lime tag</span>
                                                        <span class="tag tag-green">Green tag</span>
                                                        <span class="tag tag-teal">Teal tag</span>
                                                        <span class="tag tag-cyan">Cyan tag</span>
                                                        <span class="tag tag-gray">Gray tag</span>
                                                        <span class="tag tag-gray-dark">Dark gray tag</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">List of tags</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-wrap">
                                                <p>You can create a list of tags with the <code
                                                        class="highlighter-rouge">.tags</code> container.</p>
                                                <div class="example border">
                                                    <div class="tags">
                                                        <span class="tag">First tag</span>
                                                        <span class="tag">Second tag</span>
                                                        <span class="tag">Third tag</span>
                                                    </div>
                                                </div>
                                                <p class="mt-4">If the list is very long, it will automatically wrap on
                                                    multiple
                                                    lines, while keeping all tags evenly spaced.</p>
                                                <div class="example">
                                                    <div class="tags">
                                                        <span class="tag">One</span>
                                                        <span class="tag">Two</span>
                                                        <span class="tag">Three</span>
                                                        <span class="tag">Four</span>
                                                        <span class="tag">Five</span>
                                                        <span class="tag">Six</span>
                                                        <span class="tag">Seven</span>
                                                        <span class="tag">Eight</span>
                                                        <span class="tag">Nine</span>
                                                        <span class="tag">Ten</span>
                                                        <span class="tag">Eleven</span>
                                                        <span class="tag">Twelve</span>
                                                        <span class="tag">Thirteen</span>
                                                        <span class="tag">Fourteen</span>
                                                        <span class="tag">Fifteen</span>
                                                        <span class="tag">Sixteen</span>
                                                        <span class="tag">Seventeen</span>
                                                        <span class="tag">Eighteen</span>
                                                        <span class="tag">Nineteen</span>
                                                        <span class="tag">Twenty</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- col end -->
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

@endsection