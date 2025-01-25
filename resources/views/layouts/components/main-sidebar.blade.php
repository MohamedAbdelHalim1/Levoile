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
                    <h3>العمليات</h3>
                </li>
                <!-- Products Section -->
                <li class="slide {{ request()->routeIs('products.*') ? 'is-expanded' : '' }}">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="fe fe-box side-menu__icon"></i>
                        <span class="side-menu__label">المنتجات</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a class="slide-item {{ request()->routeIs('products.index') ? 'active' : '' }}"
                                href="{{ route('products.index') }}">
                                جميع المنتجات
                            </a>
                        </li>
                        <li>
                            <a class="slide-item {{ request()->routeIs('products.create') ? 'active' : '' }}"
                                href="{{ route('products.create') }}">
                                اضافة منتج
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Categories Section -->
                <li class="slide {{ request()->routeIs('categories.*') ? 'is-expanded' : '' }}">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="fe fe-layers side-menu__icon"></i>
                        <span class="side-menu__label">الفئات</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a class="slide-item {{ request()->routeIs('categories.index') ? 'active' : '' }}"
                                href="{{ route('categories.index') }}">
                                جميع الفئات
                            </a>
                        </li>
                        <li>
                            <a class="slide-item {{ request()->routeIs('categories.create') ? 'active' : '' }}"
                                href="{{ route('categories.create') }}">
                                اضافة فئة
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Seasons Section -->
                <li class="slide {{ request()->routeIs('seasons.*') ? 'is-expanded' : '' }}">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="fe fe-calendar side-menu__icon"></i>
                        <span class="side-menu__label">المواسم</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a class="slide-item {{ request()->routeIs('seasons.index') ? 'active' : '' }}"
                                href="{{ route('seasons.index') }}">
                                جميع المواسم
                            </a>
                        </li>
                        <li>
                            <a class="slide-item {{ request()->routeIs('seasons.create') ? 'active' : '' }}"
                                href="{{ route('seasons.create') }}">
                                اضافة مواسم
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Factories Section -->
                <li class="slide {{ request()->routeIs('factories.*') ? 'is-expanded' : '' }}">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="fe fe-package side-menu__icon"></i>
                        <span class="side-menu__label">المصانع</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a class="slide-item {{ request()->routeIs('factories.index') ? 'active' : '' }}"
                                href="{{ route('factories.index') }}">
                                جميع المصانع
                            </a>
                        </li>
                        <li>
                            <a class="slide-item {{ request()->routeIs('factories.create') ? 'active' : '' }}"
                                href="{{ route('factories.create') }}">
                                اضافة مصانع
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Colors Section -->
                <li class="slide {{ request()->routeIs('colors.*') ? 'is-expanded' : '' }}">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="fe fe-droplet side-menu__icon"></i>
                        <span class="side-menu__label">الألوان</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a class="slide-item {{ request()->routeIs('colors.index') ? 'active' : '' }}"
                                href="{{ route('colors.index') }}">
                                جميع الألوان
                            </a>
                        </li>
                        <li>
                            <a class="slide-item {{ request()->routeIs('colors.create') ? 'active' : '' }}"
                                href="{{ route('colors.create') }}">
                                اضافة ألوان
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sub-category">
                    <h3>التقارير</h3>
                </li>
                <!-- Reports Section -->
                <li class="slide {{ request()->routeIs('reports.*') ? 'is-expanded' : '' }}">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="fe fe-box side-menu__icon"></i>
                        <span class="side-menu__label">التقارير</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a class="slide-item {{ request()->routeIs('reports.receive') ? 'active' : '' }}"
                                href="{{ route('reports.receive') }}">
                                المستلمين
                            </a>
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
