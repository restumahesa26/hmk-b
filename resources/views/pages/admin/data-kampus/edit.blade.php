@extends('layouts.admin')

@section('title')
    <title> Admin - Edit Data Kampus </title>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Kampus</h1>
        <a href="" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Edit Daftar Kampus
        </a>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kampus.index') }}">Data Anggota Aktif</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $item-> nama_kampus }}</li>
            </ol>
        </nav>
    </div>

    <div class="card-show">
        <div class="card-body">
            <form action="{{ route('kampus.update', $item-> id) }}" method="POST" enctype="multipart/form-data" class="form" id="form">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="nama_kampus">Nama Kampus</label>
                    <input id="nama_kampus" type="text" class="form-control @error('nama_kampus') is-invalid @enderror" name="nama_kampus" placeholder="Nama Kampus" value="{{ $item-> nama_kampus }}">
                    @error('nama_kampus')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Foto</label>
                    <img src="{{ asset('storage/images/gambar-kampus/'. $item-> image) }}" style="width:1000px; height:700px;" class="text-center">
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                    @error('image')
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
        swal("Gagal Menyimpan Data", "Data Kampus Sudah Ada Sebelumnya", "error");
    </script>
@endif

@endsection