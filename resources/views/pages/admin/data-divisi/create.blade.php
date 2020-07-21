@extends('layouts.admin')

@section('title')
    <title> Admin - Tambah Data Divisi </title>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Divisi</h1>
        <a href="{{ route('data-divisi.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Divisi
        </a>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('data-divisi.index') }}">Data Divisi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
            </ol>
        </nav>
    </div>

    <div class="card-show">
        <div class="card-body">
            <form action="{{ route('data-divisi.store') }}" method="POST" enctype="multipart/form-data" class="form" id="form">
                @csrf
                <div class="form-group">
                    <label for="icon">Icon</label>
                    <input id="icon" type="file" class="form-control @error('icon') is-invalid @enderror" name="icon"
                        placeholder="Icon" value="{{ old('icon') }}" required>
                    @error('icon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <select id="title" name="title" class="form-control">
                        @if ($kwu < 1)
                            <option value="Kewirausahaan">Kewirausahaan</option>
                        @endif
                        @if ($psdm < 1)
                            <option value="PSDM">PSDM</option>
                        @endif
                        @if ($kestari < 1)
                            <option value="Kestari">Kestari</option>
                        @endif
                        @if ($minbak < 1)
                            <option value="Minbak">Minbak</option>
                        @endif
                        @if ($rohani < 1)
                            <option value="Kerohanian">Kerohanian</option>
                        @endif
                        @if ($infokom < 1)
                            <option value="Infokom">Infokom</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                        name="deskripsi" placeholder="Deskripsi" value="{{ old('deskripsi') }}">
                    @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="namaKetua">Nama Ketua</label>
                    <input id="namaKetua" type="text" class="form-control @error('namaKetua') is-invalid @enderror"
                        name="namaKetua" placeholder="Nama Ketua" value="{{ old('namaKetua') }}">
                    @error('namaKetua')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Foto Ketua</label>
                    <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                        placeholder="Foto Ketua" value="{{ old('foto') }}" required>
                    @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <table id="anggotaTable" class="mb-3">
                        <tr>
                            <td>Nama Anggota</td>
                        </tr>
                        <tr>
                            <td><button type="button" name="add" class="add btn btn-info">Tambah</button></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="anggota[]" placeholder="Masukkan Nama" class="form-control"></td>
                        </tr>
                    </table>
                    @error('anggota.*')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <table id="prokerTable" class="mb-3">
                        <tr>
                            <td>Program Kerja</td>
                        </tr>
                        <tr>
                            <td><button type="button" name="add" class="add2 btn btn-info">Tambah</button></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="proker[]" placeholder="Masukkan Proker" class="form-control"></td>
                        </tr>
                    </table>
                    @error('proker.*')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block" onclick="submitForm()">
                    Simpan
                </button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

@section('script')

<script type="text/javascript">

    $('.form').on('submit', function(event){
        event.preventDefault(); // prevent form submit
        var form = $(this).attr('action'); // storing the form
        swal({
            title: "Simpan Data?",
            text: "Yakin data yang dimasukkan sudah benar",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#0096ff",
            confirmButtonText: "Simpan",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                document.getElementById("form").submit();          // submitting the form when user press yes
            } else {
                swal("Batal", "Data batal dikirim", "error");
            }
        });
    });

</script>
    
@if($errors->all())
    <script>
        swal("Gagal Menyimpan Data", "Masih terdapat data yang belum diisi dan salah", "error");
    </script>
@endif

@if (Session::get('error'))
    <script>
        swal("Gagal Menyimpan Data", "Divisi Tersebut Sudah Ada", "error");
    </script>
@endif

@if (Session::get('error2'))
    <script>
        swal("Gagal Menyimpan Data", "Seseorang Tidak Boleh Mengisi Dua Posisi", "error");
    </script>
@endif

@endsection