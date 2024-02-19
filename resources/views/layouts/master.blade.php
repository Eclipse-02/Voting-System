<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('master/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('master/assets/img/favicon.png') }}">
    <title>
        Admin Panel
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('master/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('master/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('master/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('master/assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('layouts.sections.sidebar')
    <main class="main-content position-relative border-radius-lg ">
        @include('layouts.sections.navbar')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('master/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('master/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('master/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('master/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('master/assets/js/plugins/chartjs.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('master/assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
    <!-- Sweetalert -->
    @include('sweetalert::alert')
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/26f46bfed8.js" crossorigin="anonymous"></script>
    <!-- Scripts for this page -->
    @stack('scripts')
</body>

</html>
