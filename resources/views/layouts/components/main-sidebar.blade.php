<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('dashboard') }}">
                <img src="{{ asset('images/products/logo.png') }}" class="header-brand-img main-logo" alt="Sparic logo">
                <img src="{{ asset('images/products/logo.png') }}" class="header-brand-img darklogo" alt="Sparic logo">
                <img src="{{ asset('build/assets/images/brand/icon.png') }}" class="header-brand-img icon-logo"
                    alt="Sparic logo">
                <img src="{{ asset('build/assets/images/brand/icon2.png') }}" class="header-brand-img icon-logo2"
                    alt="Sparic logo">
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
                    <h3>{{ __('messages.main') }}</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon ri-home-4-line"></i><span class="side-menu__label">
                            {{ __('messages.dashboard') }}</span><i class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side5">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href={{ route('dashboard') }}>
                                                    {{ __('messages.dashboard') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>


                @php
                    use App\Models\CategoryKnowledge;

                    $user = auth()->user();
                    $hasOpenOrder = \App\Models\OpenOrder::where('user_id', $user->id)->where('is_opened', 1)->exists();
                    $categories = $hasOpenOrder ? CategoryKnowledge::all() : collect(); // لو عنده open order نجيب الكاتيجوريز
                @endphp

                @if ($user->role_id == 12)

                    @if ($hasOpenOrder)
                        <li class="slide">
                            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                                <i class="side-menu__icon fe fe-package"></i>
                                <span class="side-menu__label">{{ __('messages.inventory') }}</span>
                                <i class="angle fe fe-chevron-right"></i>
                            </a>
                            <ul class="slide-menu">
                                <li class="panel sidetab-menu">
                                    <div class="panel-body tabs-menu-body p-0 border-0">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="side">
                                                <ul class="sidemenu-list">
                                                    @foreach ($categories as $category)
                                                        <li>
                                                            <a href="{{ route('branch.order.subcategories', $category->id) }}"
                                                                class="slide-item">{{ $category->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    @endif

                    <li class="slide">
                        <a class="side-menu__item" href="{{ route('branch.orders.my') }}">
                            <i class="side-menu__icon fe fe-file-text"></i>
                            <span class="side-menu__label">{{ __('messages.my_orders') }}</span>
                        </a>
                    </li>

                @endif



                @if (auth()->user()->role_id == 1)
                    <li class="sub-category">
                        <h3> {{ __('messages.master_sheet_products') }} </h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-database"></i>
                            <span class="side-menu__label">{{ __('messages.master_sheet_products') }} </span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">{{ __('messages.master_sheet_products') }}</a></li>
                                                <li>
                                                    <a href="{{ route('product-knowledge.index') }}"
                                                        class="slide-item">{{ __('messages.product_presentation') }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('product-knowledge.lists') }}"
                                                        class="slide-item">{{ __('messages.product_lists') }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('product-knowledge.upload') }}"
                                                        class="slide-item">{{ __('messages.upload_master_sheet') }} </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif


                @if (auth()->user()->role_id == 1)
                    <li class="sub-category">
                        <h3> {{ __('messages.design') }}</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-feather"></i><span
                                class="side-menu__label">{{ __('messages.design') }}</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">{{ __('messages.design') }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('design-materials.index') }}"
                                                        class="slide-item">{{ __('messages.material_samples') }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('design-sample-products.index') }}"
                                                        class="slide-item">{{ __('messages.sample_products') }}</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif




                @if (auth()->user()->hasPermission('عرض منتج') ||
                        auth()->user()->hasPermission('تعديل منتج') ||
                        auth()->user()->hasPermission('استلام منتج') ||
                        auth()->user()->hasPermission('حذف منتج') ||
                        auth()->user()->hasPermission('إضافة منتج') ||
                        auth()->user()->hasPermission('إكمال بيانات المنتج'))
                    <li class="sub-category">
                        <h3> {{ __('messages.operations') }}</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon ri-bubble-chart-line"></i><span
                                class="side-menu__label">{{ __('messages.products') }}</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">{{ __('messages.products') }}</a>
                                                </li>
                                                <li><a href="{{ route('products.index') }}" class="slide-item"> 
                                                        {{ __('messages.all_products') }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->hasPermission('عرض قسم') ||
                        auth()->user()->hasPermission('تعديل قسم') ||
                        auth()->user()->hasPermission('حذف قسم') ||
                        auth()->user()->hasPermission('إضافة قسم') ||
                        auth()->user()->hasPermission('عرض موسم') ||
                        auth()->user()->hasPermission('تعديل موسم') ||
                        auth()->user()->hasPermission('حذف موسم') ||
                        auth()->user()->hasPermission('إضافة موسم') ||
                        auth()->user()->hasPermission('عرض مصنع') ||
                        auth()->user()->hasPermission('تعديل مصنع') ||
                        auth()->user()->hasPermission('حذف مصنع') ||
                        auth()->user()->hasPermission('إضافة مصنع') ||
                        auth()->user()->hasPermission('عرض لون') ||
                        auth()->user()->hasPermission('تعديل لون') ||
                        auth()->user()->hasPermission('حذف لون') ||
                        auth()->user()->hasPermission('إضافة لون') ||
                        auth()->user()->hasPermission('عرض خامة') ||
                        auth()->user()->hasPermission('تعديل خامة') ||
                        auth()->user()->hasPermission('حذف خامة') ||
                        auth()->user()->hasPermission('إضافة خامة'))
                    <li class="sub-category">
                        <h3>{{ __('messages.main_settings') }}</h3>
                    </li>


                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon ri-database-2-line"></i><span
                                class="side-menu__label">{{ __('messages.settings') }}</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a
                                                        href="javascript:void(0)">{{ __('messages.settings') }}</a>
                                                </li>
                                                <li><a href="{{ route('categories.index') }}" class="slide-item">
                                                        {{ __('messages.categories') }}</a></li>
                                                <li><a href="{{ route('seasons.index') }}" class="slide-item">
                                                        {{ __('messages.seasons') }}</a></li>
                                                <li><a href="{{ route('factories.index') }}" class="slide-item">
                                                        {{ __('messages.factories') }}</a></li>
                                                <li><a href="{{ route('materials.index') }}" class="slide-item">
                                                        {{ __('messages.materials') }}</a></li>
                                                <li><a href="{{ route('colors.index') }}" class="slide-item">
                                                        {{ __('messages.colors') }}</a></li>

                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif



                @if (auth()->user()->hasPermission('عرض التقارير'))
                    <li class="sub-category">
                        <h3>{{ __('messages.reports') }}</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon ri-bar-chart-line"></i><span
                                class="side-menu__label">{{ __('messages.reports') }}</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">{{ __('messages.reports') }}</a>
                                                </li>
                                                <li><a href="{{ route('reports.receive') }}" class="slide-item">
                                                        {{ __('messages.receiving_reports') }}</a></li>
                                                <li><a href="{{ route('reports.productStatusForSeason') }}"
                                                        class="slide-item">
                                                        {{ __('messages.sessions_reports') }} </a></li>
                                                <li><a href="{{ route('reports.categoryStatus') }}"
                                                        class="slide-item">
                                                        {{ __('messages.category_reports') }} </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif


                @if (auth()->user()->hasPermission('عرض مستخدم') ||
                        auth()->user()->hasPermission('حذف مستخدم') ||
                        auth()->user()->hasPermission('إضافة مستخدم') ||
                        auth()->user()->hasPermission('تفعيل مستخدم') ||
                        auth()->user()->hasPermission('عرض دور') ||
                        auth()->user()->hasPermission('تعديل دور') ||
                        auth()->user()->hasPermission('حذف دور') ||
                        auth()->user()->hasPermission('إضافة دور') ||
                        auth()->user()->hasPermission('تعديل صلاحيات مستخدم'))
                    <li class="sub-category">
                        <h3>{{ __('messages.users') }}</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-user"></i><span
                                class="side-menu__label">{{ __('messages.users') }}</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a
                                                        href="javascript:void(0)">{{ __('messages.users') }}</a></li>
                                                @if (auth()->user()->role_id == 1)
                                                    <li><a href="{{ route('roles.index') }}" class="slide-item">
                                                            {{ __('messages.roles') }}</a></li>
                                                @endif
                                                <li><a href="{{ route('users.index') }}"
                                                        class="slide-item">{{ __('messages.users') }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif


                @if (auth()->user()->role_id == 10 || auth()->user()->role->name == 'Shooting' || auth()->user()->role_id == 1)
                    <li class="sub-category">
                        <h3>{{ __('messages.shooting') }}</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-camera"></i><span
                                class="side-menu__label">{{ __('messages.shooting') }}</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">{{ __('messages.shooting') }}</a>
                                                </li>
                                                <li><a href="{{ route('shooting-products.index') }}"
                                                        class="slide-item">{{ __('messages.shooting_products') }}</a></li>
                                                <li><a href="{{ route('shooting-sessions.index') }}"
                                                        class="slide-item">{{ __('messages.shooting_sessions') }}</a></li>
                                                <li>
                                                    <a href="{{ route('ready-to-shoot.index') }}"
                                                        class="slide-item"> {{ __('messages.ready_to_shoot') }}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('edit-sessions.index') }}" class="slide-item">
                                                        {{ __('messages.edit_sessions') }} 
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('shooting-deliveries.index') }}"
                                                        class="slide-item">{{ __('messages.shooting_deliveries') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->role_id == 1)
                    <li class="sub-category">
                        <h3>{{ __('messages.website_admin') }}</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-globe"></i>
                            <span class="side-menu__label">{{ __('messages.website_admin') }}</span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="site-admin">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">
                                                        {{ __('messages.website_admin') }}</a>
                                                </li>
                                                <li><a href="{{ route('website-admin.index') }}"
                                                        class="slide-item">
                                                        {{ __('messages.website_admin') }}</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="sub-category">
                        <h3>{{ __('messages.social_media_specialist') }}</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-share-2"></i>
                            <span class="side-menu__label">{{ __('messages.social_media') }}</span>
                            <i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">
                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="social-tab">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">
                                                        {{ __('messages.social_media_specialist') }}
                                                        </a></li>
                                                <li><a href="{{ route('social-media.index') }}"
                                                        class="slide-item">{{ __('messages.social_media') }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif




            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
</div>
