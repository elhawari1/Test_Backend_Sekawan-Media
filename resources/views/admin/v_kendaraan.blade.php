@extends('layout_admin.v_index')
@section('title', 'Kendaraan')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="col-12">
                    <h1 class="m-0">Kendaraan</h1>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kendaraan</li>
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
                                <th>Kode Kendaraan</th>
                                <th>Type</th>
                                <th>Model</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kendaraan as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->kode_kendaraan }}</td>
                                    <td>{{ $data->type }}</td>
                                    <td>{{ $data->merk }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#updateModal{{ $data->id_kendaraan }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <a href="/kendaraan/destroy/{{ $data->id_kendaraan }}}"
                                            class="btn btn-outline-danger">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Kendaraan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/kendaraan/store">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Kode Kendaraan</label>
                            <input type="text" name="kode_kendaraan" class="form-control" id="recipient-name"
                                placeholder="Kode Kendaraan Di awali (K-)">
                            <label for="recipient-name" class="col-form-label">Type</label>
                            <input type="text" name="type" class="form-control" id="recipient-name"
                                placeholder="Name Type">
                            <label for="recipient-name" class="col-form-label">Merk</label>
                            <input type="text" name="merk" class="form-control" id="recipient-name"
                                placeholder="Name Merk">
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
    @foreach ($kendaraan as $data)
        <div class="modal fade" id="updateModal{{ $data->id_kendaraan }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Kendaraan {{ $data->id_kendaraan }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/kendaraan/update/{{ $data->id_kendaraan }}">
                            @csrf
                            <div class="mb-3">

                                <label for="recipient-name" class="col-form-label">Type</label>
                                <input type="text" name="type" class="form-control" id="recipient-name"
                                    value="{{ $data->type }}">
                                <label for="recipient-name" class="col-form-label">Merk</label>
                                <input type="text" name="merk" class="form-control" id="recipient-name"
                                    value="{{ $data->merk }}">
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
