<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('master/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('master/assets/img/favicon.png') }}">
    <title>
        Pemilihan Calon Ketua OSIS
    </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('master/assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center align-items-center vh-100">
                <div class="text-primary fw-bolder text-center">
                    <h3>Terimakasih atas partisipasinya! Semoga hasilnya memuaskan.</h3>
                    <a href="{{ route('logout') }}" class="btn bg-gradient-danger mb-0 mt-2 w-25"
                        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Keluar</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('master/assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
    <!-- Scripts for this page -->
    @stack('scripts')
</body>

</html>
