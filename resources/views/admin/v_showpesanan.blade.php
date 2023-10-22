@extends('layout_admin.v_index')
@section('title', 'Detail Pesanan')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="col-12">
                    <h1 class="m-0">Detail Pesanan</h1>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Pesanan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Detail <b>Oderan</b></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">

                        <table class="table" style="border: none">
                            <tr>
                                <th width="15%">No</th>
                                <th width="1%">:</th>
                                <td>{{ $dpesanan->id_detail_pesanan }}</td>
                            </tr>

                            <tr>
                                <th width="100px">Pemesan</th>
                                <th width="1%">:</th>
                                <td>{{ $dpesanan->pesanan->upegawai->nik }} {{ $dpesanan->pesanan->upegawai->nama }}</td>
                            </tr>

                            <tr>
                                <th width="100px">Keterangan Pesanan</th>
                                <th width="1%">:</th>
                                <td>{{ $dpesanan->pesanan->pool->user_pool }}-
                                    {{ $dpesanan->pesanan->driver->user_driver }} -
                                    {{ $dpesanan->pesanan->kendaraan->kode_kendaraan }} </td>
                            </tr>

                            <tr>
                                <th width="100px">Keterangan Pool</th>
                                <th width="1%">:</th>
                                <td>{{ $dpesanan->pesanan->pool->user_pool }} -
                                    @if ($dpesanan->status_pool == 0)
                                        <span class="badge badge-primary">Proses</span>
                                    @elseif ($dpesanan->status_pool == 1)
                                        <span class="badge badge-success">Disetujui</span>
                                    @endif
                                    @if ($dpesanan->status_pool == 0)
                                        -
                                        <a href="/pesanan/pool/setuju/{{ $dpesanan->id_detail_pesanan }}"
                                            class="btn-sm btn-success"><i class="icon fa fa-check" title="Diterima"></i></a>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th width="100px">Keterangan Manager</th>
                                <th width="1%">:</th>
                                <td>({{ $dpesanan->pesanan->umanager->nik }}) {{ $dpesanan->pesanan->umanager->nama }} -
                                    @if ($dpesanan->status_manager == 0)
                                        <span class="badge badge-primary">Proses</span>
                                    @elseif ($dpesanan->status_manager == 1)
                                        <span class="badge badge-success">Disetujui</span>
                                    @elseif ($dpesanan->status_manager == 2)
                                        <span class="badge badge-success">Ditolak</span>
                                    @endif
                                    @if ($dpesanan->status_manager == 0)
                                        -
                                        <a href="/pesanan/manager/setuju/{{ $dpesanan->id_detail_pesanan }}"
                                            class="btn-sm btn-success"><i class="icon fa fa-check" title="Diterima"></i></a>
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <a href="/pesanan" class="btn btn-danger tbn-sm">Back</a>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
