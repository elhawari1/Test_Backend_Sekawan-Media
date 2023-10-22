@extends('layout_admin.v_index')
@section('title', 'Pesanan')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="col-12">
                    <h1 class="m-0">Pesanan</h1>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pesanan</li>
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
                    <h3 class="card-title">Data Pesanan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Peminjam (Pegawai)</th>
                                <th>Pool</th>
                                <th>Driver</th>
                                <th>Kendaraan</th>
                                <th>Manager</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->upegawai->nama }}</td>
                                    <td>{{ $data->pool->user_pool }}</td>
                                    <td>{{ $data->driver->user_driver }}</td>
                                    <td>{{ $data->kendaraan->kode_kendaraan }}</td>
                                    <td>{{ $data->umanager->nama }}</td>
                                    <td>
                                        @if ($data->dpesanan->status_pool == 0 || $data->dpesanan->status_manager == 0)
                                            <span class="badge badge-primary">Diproses</span>
                                        @elseif ($data->dpesanan->status_pool == 1 || $data->dpesanan->status_manager == 1)
                                            <span class="badge badge-success">Disetujui</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->dpesanan->status_pool == 0 || $data->dpesanan->status_manager == 0)
                                            <a href="/pesanan/show/{{ $data->id_pesanan }}" class="btn btn-outline-primary">
                                                <i class="fa-solid fa-info"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                                data-bs-target="#updateModal{{ $data->id_pesanan }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <a href="/pesanan/destroy/{{ $data->id_pesanan }}}"
                                                class="btn btn-outline-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        @elseif ($data->dpesanan->status_pool == 1 || $data->dpesanan->status_manager == 1)
                                            <a href="/pesanan/show/{{ $data->id_pesanan }}" class="btn btn-outline-primary">
                                                <i class="fa-solid fa-info"></i>
                                            </a>
                                            <a href="/pesanan/destroy/{{ $data->id_pesanan }}}"
                                                class="btn btn-outline-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        @endif
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

    {{-- Insert Pesanan --}}
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Pesanan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/pesanan/store">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Peminjam (Pegawai)</label>
                            <select name="pegawai" class="form-control">
                                @foreach ($user as $data)
                                    @if ($data->id_role == 4)
                                        <option value="{{ $data->id_user }}">{{ $data->nik }} - {{ $data->nama }}
                                        </option>
                                    @endif
                                @endforeach
                                @if (!$user->contains('id_role', 4))
                                    <option class="btn btn-danger">Data Tidak Ada</option>
                                @endif
                            </select>

                            <label for="recipient-name" class="col-form-label">Kendaraan</label>
                            <select name="id_kendaraan" class="form-control">
                                @foreach ($kendaraan as $data)
                                    <option value="{{ $data->id_kendaraan }}">{{ $data->kode_kendaraan }}</option>
                                @endforeach
                            </select>

                            <label for="recipient-name" class="col-form-label">Driver</label>
                            <select name="id_driver" class="form-control">
                                @foreach ($driver as $data)
                                    <option value="{{ $data->id_driver }}">{{ $data->nid }} - {{ $data->user_driver }}
                                    </option>
                                @endforeach
                            </select>

                            <label for="recipient-name" class="col-form-label">Pool</label>
                            <select name="id_pool" class="form-control">
                                @foreach ($pool as $data)
                                    <option value="{{ $data->id_pool }}">{{ $data->user_pool }} - {{ $data->pool }}
                                    </option>
                                @endforeach
                            </select>

                            <label for="recipient-name" class="col-form-label">Manager</label>
                            <select name="manager" class="form-control">
                                @foreach ($user as $data)
                                    @if ($data->id_role == 3)
                                        <option value="{{ $data->id_user }}">{{ $data->nik }} - {{ $data->nama }}
                                        </option>
                                    @endif
                                @endforeach
                                @if (!$user->contains('id_role', 3))
                                    <option class="btn btn-danger">Data Tidak Ada</option>
                                @endif
                            </select>

                            <input type="hidden" name="id_pesanan" class="form-control" id="recipient-name"
                                placeholder="id_pesanan">

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

    {{-- Update Pesanan --}}
    @foreach ($pesanan as $data)
        <div class="modal fade" id="updateModal{{ $data->id_pesanan }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Pesanan <i>
                                {{ $data->upegawai->nama }}</i></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/pesanan/update/{{ $data->id_pesanan }}">
                            @csrf
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nama Pemesan</label>
                                    <select name="pegawai" class="form-control" id="selectOption">
                                        @foreach ($user as $item)
                                            @if ($item->id_role == 4)
                                                <option value="{{ $item->id_user }}"
                                                    {{ $item->pegawai == $data->pegawai ? 'selected' : '' }}>
                                                    {{ $item->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nama Pool</label>
                                    <select name="id_pool" class="form-control" id="selectOption">
                                        @foreach ($pool as $item)
                                            <option value="{{ $item->id_pool }}"
                                                {{ $item->id_pool == $data->id_pool ? 'selected' : '' }}>
                                                {{ $item->user_pool }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nama Driver</label>
                                    <select name="id_driver" class="form-control" id="selectOption">
                                        @foreach ($driver as $item)
                                            <option value="{{ $item->id_driver }}"
                                                {{ $item->id_driver == $data->id_driver ? 'selected' : '' }}>
                                                {{ $item->user_driver }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nama Kendaraan</label>
                                    <select name="id_kendaraan" class="form-control" id="selectOption">
                                        @foreach ($kendaraan as $item)
                                            <option value="{{ $item->id_kendaraan }}"
                                                {{ $item->id_kendaraan == $data->id_kendaraan ? 'selected' : '' }}>
                                                {{ $item->kode_kendaraan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nama Pemesan</label>
                                    <select name="manager" class="form-control" id="selectOption">
                                        @foreach ($user as $item)
                                            @if ($item->id_role == 3)
                                                <option value="{{ $item->id_user }}"
                                                    {{ $item->manager == $data->manager ? 'selected' : '' }}>
                                                    {{ $item->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
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
