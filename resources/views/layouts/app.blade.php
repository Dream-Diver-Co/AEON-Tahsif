<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap_my/my_style.css') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <title>@lang('panel.site_title')</title>
</head>

<body class="login_page_bg">
    <div class="loader">
        <div class="loader-in">
            <div class="innerx one"></div>
            <div class="innerx two"></div>
            <div class="innerx three"></div>
        </div>
    </div>
    <div>
        <header class="pf-6  mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    {{-- <div class="login-page-logo1">
                        <img src="{{ asset('images/aeon.png') }}" alt="">
                    </div> --}}
                </div>
            </div>
        </header>
    </div>
    <div id="app"  class="login_card" style="display: none">


        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="pf-5  mt-auto">
        <div class="container-fluid px-4">
            <div class=" align-items-center justify-content-between small">
                <div>Developed by <a href="https://dreamdiver.nl/">DREAM DIVER</a></div>
                {{-- <div class="text-muted">Copyright &copy; Your Website 2022</div> --}}
                {{-- <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div> --}}
            </div>
        </div>
    </footer>
</body>

</html>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap_my/myScripts.js') }}" type="text/javascript"></script>
<script>
    $(window).on('load', function() {
        preloader();
    });
</script>
