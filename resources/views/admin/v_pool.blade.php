@extends('layout_admin.v_index')
@section('title', 'Pool')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="col-12">
                    <h1 class="m-0">Pool</h1>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pool</li>
                    </ol>
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-outline-success float-sm-right items-end" data-bs-toggle="modal"
                        data-bs-target="#insertModal">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Pool</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User Pool</th>
                                <th>Pool</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pool as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->user_pool }}</td>
                                    <td>{{ $data->pool }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#updateModal{{ $data->id_pool }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <a href="/pool/destroy/{{ $data->id_pool }}}" class="btn btn-outline-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>


    {{-- Insert Data --}}
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Pool</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/pool/store">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">User Pool</label>
                            <input type="text" name="user_pool" class="form-control" id="recipient-name"
                                placeholder="User Pool">
                            <label for="recipient-name" class="col-form-label">Pool</label>
                            <input type="text" name="pool" class="form-control" id="recipient-name"
                                placeholder="Pool">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($pool as $data)
        <div class="modal fade" id="updateModal{{ $data->id_pool }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Pool {{ $data->id_pool }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/pool/update/{{ $data->id_pool }}">
                            @csrf
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">User Pool</label>
                                <input type="text" name="user_pool" class="form-control" id="recipient-name"
                                    value="{{ $data->user_pool }}">
                                <label for="recipient-name" class="col-form-label">Pool</label>
                                <input type="text" name="pool" class="form-control" id="recipient-name"
                                    value="{{ $data->pool }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection
