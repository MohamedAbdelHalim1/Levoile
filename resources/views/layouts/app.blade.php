<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="Description" content="Levoile - Management System">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin dashboard, admin dashboard laravel, admin panel template, blade template, blade template laravel, bootstrap template, dashboard laravel, laravel admin, laravel admin dashboard, laravel admin panel, laravel admin template, laravel bootstrap admin template, laravel bootstrap template, laravel template, vite laravel template, vite admin template, vite laravel admin, vite laravel admin dashboard, vite laravel bootstrap admin template">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- TITLE -->
    <title>{{ __('messages.levoile_title') }}</title>

    <!-- FAVICON -->
    <link rel="icon" href="{{ asset('images/products/logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/products/logo.png') }}" type="image/x-icon">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('build/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Tom Select CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css">

    <!-- APP SCSS -->
    @vite(['resources/sass/app.scss'])
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap" rel="stylesheet">



    <!-- ICONS CSS -->
    <link href="{{ asset('build/assets/iconfonts/icons.css') }}" rel="stylesheet">

    <!-- ANIMATE CSS -->
    <link href="{{ asset('build/assets/iconfonts/animated.css') }}" rel="stylesheet">

    <!-- APP CSS -->
    @vite(['resources/css/app.css'])

    @yield('styles')

</head>

<body class="app sidebar-mini {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

    <!--- GLOBAL LOADER -->
    <div id="global-loader">
        <img src="{{ asset('build/assets/images/svgs/loader.svg') }}" alt="loader">
    </div>
    <!--- END GLOBAL LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- MAIN-HEADER -->
            @include('layouts.components.main-header')

            <!-- END MAIN-HEADER -->

            <!-- NEWS-TICKER -->
            {{-- @include('layouts.components.news-ticker') --}}

            <!-- END NEWS-TICKER -->

            <!-- MAIN-SIDEBAR -->
            @include('layouts.components.main-sidebar')

            <!-- END MAIN-SIDEBAR -->

            <!-- MAIN-CONTENT -->
            <div class="main-content app-content mt-4">
                <div class="side-app">
                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                        @yield('content')
                    </div>
                </div>
                @yield('modal-page-content')
            </div>
            <!-- END MAIN-CONTENT -->
        </div>

        @yield('modal-page-content1')

        <!-- RIGHT-SIDEBAR -->
        @include('layouts.components.right-sidebar')

        <!-- END RIGHT-SIDEBAR -->

        <!-- MAIN-FOOTER -->
        @include('layouts.components.main-footer')

        <!-- END MAIN-FOOTER -->

    </div>
    <!-- END PAGE-->

    <!-- SCRIPTS -->

    @include('layouts.components.scripts')

    <!-- STICKY JS -->
    <script src="{{ asset('build/assets/sticky.js') }}"></script>

    <!-- THEMECOLOR JS -->
    @vite('resources/assets/js/themeColors.js')


    <!-- Tom Select JS -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <!-- APP JS -->
    @vite('resources/js/app.js')




</body>

</html>
