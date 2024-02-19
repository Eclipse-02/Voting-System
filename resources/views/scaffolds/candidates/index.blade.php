@extends('layouts.master')

@section('content')
    <div class="row">
        @foreach ($data as $i)
            <div class="col-lg-4 col-sm-12">
                <div class="card card-flush h-100">
                    <img src="{{ asset('storage/images/' . $i->image) }}" class="card-img-top" style="height: 200px">
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
                            <div class="text-gray-400 fw-bolder text-center">Vision</div>
                            <div class="d-flex flex-column text-gray-600">
                                @foreach ($i->vision as $j)
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>
                                        @if ($j->count() > 1){{ ++$m }}.@endif {{ $j->desc }}
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
                            <div class="text-gray-400 fw-bolder text-center">Mission</div>
                            <div class="d-flex flex-column text-gray-600">
                                @foreach ($i->mission as $j)
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>
                                        @if ($j->count() > 1){{ ++$n }}.@endif {{ $j->desc }}
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
                        <form action="{{ route('candidates.destroy', $i->id) }}" method="POST">

                            <a href="{{ route('visions.index', $i->id) }}" class="btn bg-gradient-info w-100 my-1">Modify Vision</a>
                            <a href="{{ route('missions.index', $i->id) }}" class="btn bg-gradient-info w-100 my-1">Modify Mission</a>
                            <a href="{{ route('candidates.edit', $i->id) }}" class="btn bg-gradient-warning w-100 my-1">Edit Candidate</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn bg-gradient-danger w-100 my-1">Delete Candidate</button>
                        </form>
                    </div>
                    <!--end::Card footer-->
                </div>
            </div>
        @endforeach
        <div class="col-md-4">
            <!--begin::Card-->
            <div class="card h-100">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-center">
                    <!--begin::Button-->
                    <button type="button" class="btn d-flex flex-column flex-center justify-content-center mb-0"
                        data-bs-toggle="modal" data-bs-target="#create_modal">
                        <!--begin::Label-->
                        <div class="fw-bolder fs-3 text-gray-600 text-hover-primary">Create New Candidate</div>
                        <!--end::Label-->
                    </button>
                    <!--begin::Button-->
                </div>
                <!--begin::Card body-->
            </div>
            <!--begin::Card-->
        </div>
    </div>

    <div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Candidate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Candidate Name">
                            @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Number</label>
                            <input type="number" class="form-control" name="number" id="number" placeholder="Candidate Number">
                            @error('number')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Image</label>
                            <input type="file" class="form-control" name="image" id="number">
                            @error('image')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="w-100">
                            <button type="submit" class="btn bg-gradient-primary mb-0 w-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
