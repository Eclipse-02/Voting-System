<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('master/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('master/assets/img/favicon.png') }}">
    <title>
        Selamat Datang!
    </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('master/assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
    <style>
      #particles-js{
        width: 100%;
        height: 100%;
        background-color: black;
        background-image: url('');
        background-size: cover;
        background-position: 50% 50%;
        background-repeat: no-repeat;
      }
    </style>
</head>

<body>

  <div id="particles-js">
    <div class="container-fluid" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
      <div class="row">
        <div class="col-6">
          <div class="d-flex align-items-center h-100">
            <h1 class="text-light fw-bold">Selamat Datang Di Pemilihan Ketua Osis SMK Wikrama 1 Garut 2024</h1>
          </div>
        </div>
        <div class="col-6">
          <div class="d-flex align-items-center h-100">
            <a href="{{ route('login') }}" class="btn bg-gradient-primary w-100">Pilih Sekarang</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script type="text/javascript">
  $(function() {
    particlesJS.load('particles-js', 'js/particles.json', function() {
      console.log('callback - particles.js config loaded');
    });
  })
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('master/assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
  <!-- Scripts for this page -->
  @stack('scripts')
</body>

</html>
