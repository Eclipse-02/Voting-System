@extends('layouts.master')

@section('content')
    <div class="card mb-4">
        <div class="card-header pb-2">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <h6>Missions Data</h6>
                </div>
                <div class="col-sm-12 col-lg-6 text-end">
                    <a href="{{ route('candidates.index') }}" class="btn btn-primary mb-0">Return</a>
                </div>
            </div>
        </div>
        <form action="{{ route('missions.store', $data->id) }}" method="POST">
            @csrf

            <input type="hidden" name="candidate_id" value="{{ $data->id }}">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="table">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 75%">
                                    Description
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($missions as $i)
                            <tr>
                                <td>
                                    <input type="hidden" name="id" value="{{ $i->id }}">
                                    <input type="text" class="form-control" id="desc" name="desc[]" placeholder="Description" value="{{ $i->desc }}">
                                </td>
                                <td class="align-middle text-center">
                                    <button type="button" class="btn bg-gradient-danger mb-0 remove-tr" value="{{ $i->id }}">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="desc" name="desc[]" placeholder="Description">
                                </td>
                                <td class="align-middle text-center">
                                    <button type="button" class="btn bg-gradient-danger mb-0 remove-tr">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    @error('dtl_desc.*')
                        <!--start::Error-->
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        <!--end::Error-->
                    @enderror
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <button type="button" id="add" class="btn bg-gradient-info mb-0 w-100">Add</button>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <button type="submit" class="btn bg-gradient-primary mb-0 w-100">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function() {

            const c_id = {{ $data->id }};

            $("#add").click(function(){
                $("#table").append('<tr><td><input type="text" class="form-control" id="desc" name="desc[]" placeholder="Description"></td><td class="align-middle text-center"><button type="button" class="btn bg-gradient-danger mb-0 remove-tr">Delete</button></td></tr>');
            });

            $(document).on('click', '.remove-tr', function(){  
                $(this).parents('tr').remove();
                var v_id = $(this).val();
                var token = $("meta[name='csrf-token']").attr("content");

                console.log(v_id);

                if (v_id) {
                    $.ajax({
    
                    url: `http://127.0.0.1:8000/candidates/${c_id}/missions/${v_id}`,
                    type: "DELETE",
                    cache: false,
                    data: {
                        "_token": token
                    }
                    });
                }
            });

        })
    </script>
@endpush