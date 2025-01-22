<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ url('index') }}">
                <img src="{{ asset('build/assets/images/brand/logo.png') }}" class="header-brand-img main-logo"
                    style="width: 60px;height: 60px; margin-right:30px;" alt="Sparic logo">
                <img src="{{ asset('build/assets/images/brand/logo-light.png') }}" class="header-brand-img darklogo"
                    alt="Sparic logo" style="width: 60px;height: 60px; margin-right:30px;">
                <img src="{{ asset('build/assets/images/brand/logo.png') }}" class="header-brand-img icon-logo"
                    alt="Sparic logo" style="width: 60px;height: 60px; margin-right:30px;">
                <img src="{{ asset('build/assets/images/brand/logo.png') }}" class="header-brand-img icon-logo2"
                    alt="Sparic logo" style="width: 60px;height: 60px; margin-right:30px;">
            </a>
        </div>
        <!-- logo-->
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Operations</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="fe fe-layers side-menu__icon"></i><span class="side-menu__label">Categories</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="tab-menu-heading p-0 pb-2 border-0">
                                <div class="tabs-menu">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li><a href="#side1" class="active" data-bs-toggle="tab"><i
                                                    class="fe fe-monitor"></i>
                                                <p>Home</p>
                                            </a></li>
                                        <li><a href="#side2" data-bs-toggle="tab"><i class="fe fe-message-square"></i>
                                                <p>Setting</p>
                                            </a></li>
                                        <li><a href="#side3" data-bs-toggle="tab"><i class="fe fe-calendar"></i>
                                                <p>Events</p>
                                            </a></li>
                                        <li><a href="#side4" data-bs-toggle="tab"><i class="fe fe-user"></i>
                                                <p>Follower</p>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">Categories</a>
                                            </li>
                                            <li><a class="slide-item" href="{{ route('categories.index') }}">All
                                                    Categories</a></li>
                                            <li><a class="slide-item" href="{{ route('categories.create') }}">Add
                                                    Category</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="fe fe-calendar side-menu__icon"></i><span class="side-menu__label">Seasons</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="tab-menu-heading p-0 pb-2 border-0">
                                <div class="tabs-menu">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li><a href="#side1" class="active" data-bs-toggle="tab"><i
                                                    class="fe fe-monitor"></i>
                                                <p>Home</p>
                                            </a></li>
                                        <li><a href="#side2" data-bs-toggle="tab"><i class="fe fe-message-square"></i>
                                                <p>Setting</p>
                                            </a></li>
                                        <li><a href="#side3" data-bs-toggle="tab"><i class="fe fe-calendar"></i>
                                                <p>Events</p>
                                            </a></li>
                                        <li><a href="#side4" data-bs-toggle="tab"><i class="fe fe-user"></i>
                                                <p>Follower</p>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">Seasons</a>
                                            </li>
                                            <li><a class="slide-item" href="{{ route('seasons.index') }}">All
                                                    Seasons</a></li>
                                            <li><a class="slide-item" href="{{ route('seasons.create') }}">Add
                                                    Season</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="fe fe-package side-menu__icon"></i><span class="side-menu__label">Factories</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="tab-menu-heading p-0 pb-2 border-0">
                                <div class="tabs-menu">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li><a href="#side1" class="active" data-bs-toggle="tab"><i
                                                    class="fe fe-monitor"></i>
                                                <p>Home</p>
                                            </a></li>
                                        <li><a href="#side2" data-bs-toggle="tab"><i class="fe fe-message-square"></i>
                                                <p>Setting</p>
                                            </a></li>
                                        <li><a href="#side3" data-bs-toggle="tab"><i class="fe fe-calendar"></i>
                                                <p>Events</p>
                                            </a></li>
                                        <li><a href="#side4" data-bs-toggle="tab"><i class="fe fe-user"></i>
                                                <p>Follower</p>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">Factories</a>
                                            </li>
                                            <li><a class="slide-item" href="{{ route('factories.index') }}">All
                                                    Factories</a></li>
                                            <li><a class="slide-item" href="{{ route('factories.create') }}">Add
                                                    Factory</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="fe fe-droplet side-menu__icon"></i><span class="side-menu__label">Colors</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="tab-menu-heading p-0 pb-2 border-0">
                                <div class="tabs-menu">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li><a href="#side1" class="active" data-bs-toggle="tab"><i
                                                    class="fe fe-monitor"></i>
                                                <p>Home</p>
                                            </a></li>
                                        <li><a href="#side2" data-bs-toggle="tab"><i class="fe fe-message-square"></i>
                                                <p>Setting</p>
                                            </a></li>
                                        <li><a href="#side3" data-bs-toggle="tab"><i class="fe fe-calendar"></i>
                                                <p>Events</p>
                                            </a></li>
                                        <li><a href="#side4" data-bs-toggle="tab"><i class="fe fe-user"></i>
                                                <p>Follower</p>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">Colors</a>
                                            </li>
                                            <li><a class="slide-item" href="{{ route('colors.index') }}">All
                                                    Colors</a></li>
                                            <li><a class="slide-item" href="{{ route('colors.create') }}">Add
                                                    Color</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="fe fe-box side-menu__icon"></i><span class="side-menu__label">Products</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="tab-menu-heading p-0 pb-2 border-0">
                                <div class="tabs-menu">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li><a href="#side1" class="active" data-bs-toggle="tab"><i
                                                    class="fe fe-monitor"></i>
                                                <p>Home</p>
                                            </a></li>
                                        <li><a href="#side2" data-bs-toggle="tab"><i class="fe fe-message-square"></i>
                                                <p>Setting</p>
                                            </a></li>
                                        <li><a href="#side3" data-bs-toggle="tab"><i class="fe fe-calendar"></i>
                                                <p>Events</p>
                                            </a></li>
                                        <li><a href="#side4" data-bs-toggle="tab"><i class="fe fe-user"></i>
                                                <p>Follower</p>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">Products</a>
                                            </li>
                                            <li><a class="slide-item" href="{{ route('products.index') }}">All
                                                    Products</a></li>
                                            <li><a class="slide-item" href="{{ route('products.create') }}">Add
                                                    Product</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
</div>
