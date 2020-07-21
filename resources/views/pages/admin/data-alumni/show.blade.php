@extends('layouts.admin')

@section('title')
<title> Admin - Show Data Alumni </title>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Alumni</h1>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('data-alumni.index') }}">Data Alumni</a></li>
                <li class="breadcrumb-item active" aria-current="page">Show Data</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $item-> nama }}</li>
            </ol>
        </nav>
    </div>

    <div class="card-show">
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input id="nama" type="text" class="form-control" value="{{ $item-> nama }}">
            </div>
            <div class="form-group">
                <label for="ttl">Tempat Tanggal Lahir</label>
                <input id="ttl" type="text" class="form-control" 
                    value="{{ $item-> tempat_lahir }} , {{ $item-> tanggal_lahir }}">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <input id="jenis_kelamin" type="text" class="form-control"
                    value="{{ $item-> jenis_kelamin }}">
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <input id="agama" type="text" class="form-control" value="{{ $item-> agama }}">

            </div>
            <div class="form-group">
                <label for="alamat_asal">Alamat Asal</label>
                <input id="alamat_asal" type="text" class="form-control"
                    value="{{ $item-> alamat_asal }}">

            </div>
            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah</label>
                <input id="asal_sekolah" type="text" class="form-control"
                    value="{{ $item-> asal_sekolah }}">

            </div>
            <div class="form-group">
                <label for="alamat_bengkulu">Alamat Di Bengkulu</label>
                <input id="alamat_bengkulu" type="text" class="form-control"
                    value="{{ $item-> alamat_bengkulu }}">

            </div>
            <div class="form-group">
                <label for="status_tinggal">Status Tinggal</label>
                <input id="status_tinggal" type="text" class="form-control"
                    value="{{ $item-> status_tinggal }}">

            </div>
            <div class="form-group">
                <label for="asal_kampus">Asal Kampus</label>
                <input id="asal_kampus" type="text" class="form-control" 
                    value="{{ $item-> asal_kampus }}">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input id="jurusan" type="text" class="form-control"
                    value="{{ $item-> jurusan }}">

            </div>
            <div class="form-group">
                <label for="angkatan">Angkatan</label>
                <input id="angkatan" type="number" class="form-control"
                    value="{{ $item-> angkatan }}">

            </div>
            <div class="form-group">
                <label for="no_hp">No. Handphone / WA </label>
                <input id="no_hp" type="text" class="form-control"
                    value="{{ $item-> no_hp }}">

            </div>
            <div class="form-group">
                <label for="media_sosial">Media Sosial</label>
                <input id="media_sosial" type="text" class="form-control"
                    value="{{ $item-> media_sosial }}">

            </div>
            <div class="form-group">
                <label for="email">Email Aktif</label>
                <input id="email" type="email" class="form-control" value="{{ $item-> email }}">

            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <img src="{{ asset('storage/images/foto-alumni/'. $item-> foto) }}" style="width:200px; height:200px;"
                    class="img-thumbnail">
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

@section('script')

<script type="text/javascript">

    $(document).ready(function(){
        document.getElementById("nama").setAttribute("disabled", "true");
        document.getElementById("ttl").setAttribute("disabled", "true");
        document.getElementById("jenis_kelamin").setAttribute("disabled", "true");
        document.getElementById("agama").setAttribute("disabled", "true");
        document.getElementById("alamat_asal").setAttribute("disabled", "true");
        document.getElementById("asal_sekolah").setAttribute("disabled", "true");
        document.getElementById("alamat_bengkulu").setAttribute("disabled", "true");
        document.getElementById("status_tinggal").setAttribute("disabled", "true");
        document.getElementById("asal_kampus").setAttribute("disabled", "true");
        document.getElementById("jurusan").setAttribute("disabled", "true");
        document.getElementById("angkatan").setAttribute("disabled", "true");
        document.getElementById("no_hp").setAttribute("disabled", "true");
        document.getElementById("media_sosial").setAttribute("disabled", "true");
        document.getElementById("email").setAttribute("disabled", "true");
    });

</script>

@if($errors->all())
<script>
    swal("Gagal Menyimpan Data", "Masih terdapat data yang belum diisi dan salah", "error");

</script>
@endif

@endsection
