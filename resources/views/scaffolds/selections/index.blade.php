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

    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center align-items-center my-3">
                <div class="text-primary fw-bolder text-center">
                    <h3>Calon Ketua OSIS</h3>
                </div>
            </div>
            @foreach ($data as $i)
                <div class="col-lg-4 col-sm-12">
                    <div class="card card-flush h-100">
                        <img src="{{ asset('storage/images/' . $i->image) }}" class="card-img-top"
                            style="height: 200px">
                        <!--begin::Card header-->
                        <div class="card-header flex-column justify-content-center my-3">
                            <!--begin::Card title-->
                            <div class="card-title text-center">
                                <h3>#{{ $i->number }}</h3>
                                <h3>{{ $i->name }}</h3>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Description-->
                            <!--end::Description-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-1">
                            <div class="mb-2">
                                <div class="text-gray-400 fw-bolder text-center">Visi</div>
                                <div class="d-flex flex-column text-gray-600">
                                    @foreach ($i->vision as $j)
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>
                                            @if ($j->count() > 1)
                                                -
                                            @endif {{ $j->desc }}
                                        </div>
                                    @endforeach
                                    @if (count($i->vision) < 1)
                                        <div class="d-flex align-items-center justify-content-center py-2">
                                            No details have been created
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="text-gray-400 fw-bolder text-center">Misi</div>
                                <div class="d-flex flex-column text-gray-600">
                                    @foreach ($i->mission as $j)
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>
                                            @if ($j->count() > 1)
                                                -
                                            @endif {{ $j->desc }}
                                        </div>
                                    @endforeach
                                    @if (count($i->mission) < 1)
                                        <div class="d-flex align-items-center justify-content-center py-2">
                                            No details have been created
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer flex-wrap pt-0">
                            <button type="button" class="btn bg-gradient-primary mb-0 w-100" data-bs-toggle="modal" data-bs-target="#pilih_{{ $i->number }}">
                                Pilih Calon
                            </button>
                        </div>
                        <!--end::Card footer-->
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="pilih_{{ $i->number }}" tabindex="-1" role="dialog" aria-labelledby="pilihLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pilihLabel">Apakah anda yakin?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin memilih calon nomor <span class="fw-bolder">#{{ $i->number }} {{ $i->name }}</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tidak</button>
                                <a href="{{ route('selections.store') }}" class="btn bg-gradient-primary" onclick="event.preventDefault();
                                document.getElementById('store-vote').submit();">Ya</a>
                                <form id="store-vote" action="{{ route('selections.store') }}" method="POST" class="d-none">
                                    @csrf
                                    <input type="hidden" name="vote_num" value="{{ $i->number }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if ($data->count() < 1)
                <div class="col-lg-12 d-flex justify-content-center align-items-center vh-100">
                    <div class="text-primary fw-bolder text-center">
                        <h3>Belum ada kandidat yang mengajukan...</h3>
                        <a href="{{ route('logout') }}" class="btn bg-gradient-danger mb-0 mt-2 w-25"
                            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Keluar</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script src="{{ asset('master/assets/js/core/bootstrap.min.js') }}"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('master/assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
    <!-- Scripts for this page -->
    @stack('scripts')
</body>

</html>
