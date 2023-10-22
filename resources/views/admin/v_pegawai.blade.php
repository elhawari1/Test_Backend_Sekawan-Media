@extends('layout_admin.v_index')
@section('title', 'Pegawai')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="col-12">
                    <h1 class="m-0">Pegawai</h1>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pegawai</li>
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
                    <h3 class="card-title">Data Pegawai</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>User Pegawai</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $data)
                                @if ($data->id_role == 4)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->username }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                                data-bs-target="#updateModal{{ $data->id_user }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <a href="/pegawai/destroy/{{ $data->id_user }}}"
                                                class="btn btn-outline-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Pegawai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/pegawai/store">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">NIK</label>
                            <input type="text" name="nik" class="form-control" id="recipient-name" placeholder="NIK">
                            <label for="recipient-name" class="col-form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="recipient-name"
                                placeholder="Nama">
                            <label for="recipient-name" class="col-form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="recipient-name"
                                placeholder="User pegawai">
                            <input type="hidden" name="password" class="form-control" id="recipient-name"
                                placeholder="Password">
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
    @foreach ($user as $data)
        <div class="modal fade" id="updateModal{{ $data->id_user }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Pegawai {{ $data->nik }} -
                            {{ $data->username }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/pegawai/update/{{ $data->id_user }}">
                            @csrf
                            <div class="mb-3">

                                <label for="recipient-name" class="col-form-label">NIK</label>
                                <input type="text" name="nik" class="form-control" id="recipient-name"
                                    value="{{ $data->nik }}" readonly>
                                <label for="recipient-name" class="col-form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="recipient-name"
                                    value="{{ $data->nama }}">
                                <label for="recipient-name" class="col-form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="recipient-name"
                                    value="{{ $data->username }}">
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
