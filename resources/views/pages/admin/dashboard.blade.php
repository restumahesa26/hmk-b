@extends('layouts.admin')

@section('title')
    <title> Admin - Dashboard </title>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Anggota Aktif</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data_anggota_aktif }} Orang</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Alumni</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data_alumni }} Orang</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Anggota</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total }} Orang</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests
                            </div>
                            @if ($data < 1)
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Tidak Ada Permintaan</div>
                            @else
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data }}</div>
                            @endif
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('request-data.index') }}"><i class="fas fa-comments fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            <a href="{{ url('register') }}" class="btn btn-info bg-gradient-info"><h4>Tambah Admin</h4></a>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection