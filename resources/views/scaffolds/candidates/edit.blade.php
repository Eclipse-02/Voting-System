@extends('layouts.master')

@section('content')
    <div class="card mb-4" style="height: calc(100vh - 120px)">
        <div class="card-header pb-2">
            <h6>Candidates Table</h6>
        </div>
        <div class="card-body px-5 pt-2 pb-2">
            <form action="{{ route('candidates.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Candidate Name" value="{{ $data->name }}">
                    @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Number</label>
                    <input type="number" class="form-control" name="number" id="number" placeholder="Candidate Number" value="{{ $data->number }}">
                    @error('number')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Image</label>
                    <input type="hidden" name="old_image" id="old_image" value="{{ $data->image }}">
                    <input type="file" class="form-control" name="image" id="image">
                    @error('image')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="w-100">
                    <button type="submit" class="btn btn-primary mb-0 w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
