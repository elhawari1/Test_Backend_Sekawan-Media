@extends('layout_admin.v_index')
@section('title', 'Dashboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            @foreach ($kendaraan as $data)
                                <h3>{{ $data->id_kendaraan }}</h3>
                            @endforeach
                            <p>Kendaraan</p>
                        </div>
                        <div class="icon">
                            <i class="acon fa fa-solid fa-car"></i>
                        </div>
                        <a href="/kendaraan" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            @foreach ($pesanan as $data)
                                <h3>{{ $data->id_pesanan }}</h3>
                            @endforeach
                            <p>Pesanan</p>
                        </div>
                        <div class="icon">
                            <i class="acon fa fa-solid fa-message"></i>
                        </div>
                        <a href="/pesanan" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
    </section>
@endsection
