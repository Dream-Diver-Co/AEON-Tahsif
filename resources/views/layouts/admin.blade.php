<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@lang('panel.site_title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- My styles -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap_my/my_style.css') }}">
    <!-- Responsive data tables -->
    <!-- <link rel="stylesheet" href="{{ asset('plugins/Responsive-2.2.3/css/responsive.dataTables.min.css') }}"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <link rel="icon" href="/consImages/logoU.png ">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/zf/jszip-3.10.1/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/datatables.min.css"
        rel="stylesheet">



</head>

<body
    class="{{ auth()->user()->theme()['body'] ?? '' }} hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper" style="display: block">
        <!-- Navbar-->
        <nav class="main-header navbar navbar-expand {{ auth()->user()->theme()['navbar'] ?? 'navbar-light' }}">

            <!-- Left navbar links -->
            {{-- <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul> --}}

            <!-- Right navbar links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" >
                    <input type="text" placeholder="Search.." name="search" style="width: 200% !important">
                </li>
            </ul>
            <ul class="navbar-nav ">
                <li class="nav-item nav-button" >
                    <i class="fas fa-address-book"style="font-size:35px"></i>
                    <p>Contact</p>
                </li>
            </ul>
            <ul class="navbar-nav ">
                <li class="nav-item nav-button" >
                    <i class="fas fa-calendar-alt"style="font-size:35px"></i>
                    <p>Calendar</p>
                </li>
            </ul>
            <ul class="navbar-nav ">
                <li class="nav-item nav-button" >
                    <i class="fas fa-phone"style="font-size:35px"></i>
                    <p>Support</p>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mr-3">

                <li class="nav-item dropdown">
                    <div class="user-profile-area">

                        <div class="user-profile-info">
                            <p>Welcome to AEON</p>
                            <div class="profile-name">

                                @if (auth()->user())
                                    {{ auth()->user()->name }}
                                @endif


                            </div>
                            <div class="profile-dropdown">


                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" class="nav-link custom-logout-button" role="button"
                                    onclick="
                                        event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                     @lang('global.logout')
                                </a>
                                 |
                                 <a href="{{ route('profileDetail', auth()->user()->id) }}" style="color:black">Profile</a>
                            </div>


                        </div>

                        <div class="user-profile-img">
                            {{-- <img src="{{ asset('logos/profile.png') }}" width="50" height="50"> --}}
                            @php
                                if( auth()->check() && auth()->user()->user_image != null){
                                    @endphp
                                    <img src="{{ asset(auth()->user()->user_image) }}" width="50" height="50">
                                    @php
                                }else{
                                    @endphp
                                    <img src="{{ asset('logos/profile.png') }}" width="50" height="50">
                                    @php
                                }
                            @endphp
                            {{-- <img src="{{ asset(auth()->user()->user_image) }}" width="50" height="50"> --}}
                        </div>

                    </div>
                </li>



            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar {{ auth()->user()->theme()['sidebar'] ?? 'sidebar-dark-success' }}">
            {{-- redundant class --}}

            {{-- elevation-1 --}}

            {{-- end redundant --}}
            <!-- Brand Logo -->
            <a href="{{route('home')}}" class="brand-link">
                <img src="{{ asset('consImages/aeon.png') }}" alt="Unired Logo" class="brand-image"
                    style="opacity: .8">
                {{-- <span class="brand-text font-weight-light">@lang('panel.site_title')</span> --}}
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                @include('layouts.sidebar')
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper-container">
            <div class="content-wrapper">
                <!-- Main content -->
                @yield('content')
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>&copy; {{ date('Y') }} POWERED BY DREAM DIVER</strong>
            {{-- <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div> --}}
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <!-- ./wrapper -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script> -->
    <!-- <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('plugins/Responsive-2.2.3/js/dataTables.responsive.min.js') }}"></script> -->
    <!-- Bootstrap Switch -->
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2-theme-bootstrap-4/sweet-alerts.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.datatables.net/v/zf/jszip-3.10.1/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/datatables.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
    <!-- MyJs -->
    <script src="{{ asset('plugins/bootstrap_my/myScripts.js') }}" type="text/javascript"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

        //Clear form filters
        $("#reset_form").on('click', function() {
            $('form :input').val('');
            $("form :input[class*='like-operator']").val('like');
            $("div[id*='_pair']").hide();
        });

        function onSelectSetValue(input_name, input_val) {
            $("form :input[name=" + input_name + "]").val(input_val);
        }
    </script>
    @if (session('_message'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: "{{ session('_type') }}",
                title: "{{ session('_message') }}",
                showConfirmButton: false,
                timer: {
                    {
                        session('_timer') ?? 5000
                    }
                }
            });
        </script>
        @php(message_clear())
    @endif
    @yield('scripts')
</body>
