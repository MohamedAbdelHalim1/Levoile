
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{url('index')}}">
                <img src="{{asset('build/assets/images/brand/logo.png')}}" class="header-brand-img main-logo"
                     alt="Sparic logo">
                <img src="{{asset('build/assets/images/brand/logo-light.png')}}" class="header-brand-img darklogo"
                     alt="Sparic logo">
                <img src="{{asset('build/assets/images/brand/icon.png')}}" class="header-brand-img icon-logo"
                     alt="Sparic logo">
                <img src="{{asset('build/assets/images/brand/icon2.png')}}" class="header-brand-img icon-logo2"
                     alt="Sparic logo">
            </a>
        </div>
        <!-- logo-->
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                                                  fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>الرئيسية</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon ri-home-4-line"></i><span
                            class="side-menu__label">لوحة التحكم</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side5">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href={{ route('dashboard') }}>لوحة التحكم</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="sub-category">
                    <h3>العمليات</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon ri-bubble-chart-line"></i><span
                            class="side-menu__label">المنتجات</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">المنتجات</a></li>
                                            <li><a href="{{ route('products.index') }}" class="slide-item"> كل المنتجات</a></li>
                                            <li><a href="{{ route('products.create') }}" class="slide-item">إضافة منتج </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="sub-category">
                    <h3>الاعدادات الرئيسية</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon ri-database-2-line"></i><span
                            class="side-menu__label">الأقسـام</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">الأقسـام</a></li>
                                            <li><a href="{{ route('categories.index') }}" class="slide-item"> كل الأقسـام</a></li>
                                            <li><a href="{{ route('categories.create') }}" class="slide-item">إضافة قسم </a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon ri-database-2-line"></i><span
                            class="side-menu__label">المواسم</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel">
                            <div class="panel-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side">
                                        <ul class="sidemenu-list">
                                            <li><a href="{{ route('seasons.index') }}" class="slide-item"> كل المواسم</a></li>
                                            <li><a href="{{ route('seasons.create') }}" class="slide-item">إضافة موسم </a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon ri-database-2-line"></i><span
                            class="side-menu__label">المصانع</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">المصانع</a></li>
                                            <li><a href="{{ route('factories.index') }}" class="slide-item"> كل المصانع</a></li>
                                            <li><a href="{{ route('factories.create') }}" class="slide-item">إضافة مصنع </a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon ri-database-2-line"></i><span
                            class="side-menu__label">الألوان</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">الألوان</a></li>
                                            <li><a href="{{ route('colors.index') }}" class="slide-item"> كل الألوان</a></li>
                                            <li><a href="{{ route('colors.create') }}" class="slide-item">إضافة لون </a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon ri-database-2-line"></i><span
                            class="side-menu__label">الخامات</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">الخامات</a></li>
                                            <li><a href="{{url('carasds')}}" class="slide-item"> كل الخامات</a></li>
                                            <li><a href="{{url('calenasdar')}}" class="slide-item">إضافة خامة </a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="sub-category">
                    <h3>التقارير</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon ri-database-2-line"></i><span
                            class="side-menu__label">التقارير</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">التقارير</a></li>
                                            <li><a href="{{ route('reports.receive') }}" class="slide-item">تقرير الاستلامات</a></li>
                                            <li><a href="{{url('calenasdar')}}" class="slide-item">تقرير المواسم </a></li>
                                            <li><a href="{{url('calenasdar')}}" class="slide-item">تقرير الاقسام </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                <li class="sub-category">
                    <h3>المستخدمين</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon ri-database-2-line"></i><span
                            class="side-menu__label">المستخدمين</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">المستخدمين</a></li>
                                            <li><a href="{{ route('roles.index') }}" class="slide-item">وظائف المستخدمين</a></li>
                                            <li><a href="{{url('users.index')}}" class="slide-item">المستخدمين</a></li>
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
