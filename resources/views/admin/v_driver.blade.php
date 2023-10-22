@extends('layout_admin.v_index')
@section('title', 'Driver')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="col-12">
                    <h1 class="m-0">Driver</h1>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Driver</li>
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
                    <h3 class="card-title">Data Kendaraan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NID</th>
                                <th>User Driver</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($driver as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nid }}</td>
                                    <td>{{ $data->user_driver }}</td>
                                    <td>
                                        @if ($data->status == 0)
                                            <span class="badge badge-success">Idle</span>
                                        @elseif ($data->status == 1)
                                            <span class="badge badge-danger">On Work</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#updateModal{{ $data->id_driver }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <a href="/kendaraan/destroy/{{ $data->id_driver }}}" class="btn btn-outline-danger">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Driver</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/driver/store">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">NID</label>
                            <input type="text" name="nid" class="form-control" id="recipient-name" placeholder="NID">
                            <label for="recipient-name" class="col-form-label">User Driver</label>
                            <input type="text" name="user_driver" class="form-control" id="recipient-name"
                                placeholder="User driver">
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

    {{-- Update Data --}}
    @foreach ($driver as $data)
        <div class="modal fade" id="updateModal{{ $data->id_driver }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Driver {{ $data->id_driver }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/driver/update/{{ $data->id_driver }}">
                            @csrf
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">NID</label>
                                <input type="text" name="nid" class="form-control" id="recipient-name"
                                    value="{{ $data->nid }}">
                                <label for="recipient-name" class="col-form-label">User Driver</label>
                                <input type="text" name="user_driver" class="form-control" id="recipient-name"
                                    value="{{ $data->user_driver }}">
                                <div class="container text-center pt-3">
                                    <div class="row align-items-start">
                                        <div class="col">
                                            <label for="recipient-name" class="col-form-label">Status</label>
                                        </div>
                                        <div class="col">
                                            @if ($data->status == 0)
                                                <span class="badge badge-success">Idle</span>
                                            @elseif ($data->status == 1)
                                                <span class="badge badge-danger">On Work</span>
                                            @endif
                                        </div>
                                        <div class="col">
                                            @if ($data->status == 1)
                                                <a href="/driver/idle/{{ $data->id_pesanan }}"
                                                    class="btn-sm btn-success"><i class="icon fa fa-check"
                                                        title="Idle"></i></a>
                                            @elseif ($data->status == 0)
                                                <a href="/driver/onwork/{{ $data->id_pesanan }}"
                                                    class="btn-sm btn-danger"><i class="icon fa fa-times"
                                                        title="On Work"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>


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
