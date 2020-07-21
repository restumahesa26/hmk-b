@extends('layouts.admin')

@section('title')
    <title> Admin - Edit Data Dokumentasi </title>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Tentang HMK-B</h1>
        <a href="" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Edit Data
        </a>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('data-dokumentasi.index') }}">Data Dokumentasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $item-> judul }}</li>
            </ol>
        </nav>
    </div>

    <div class="card-show">
        <div class="card-body">
            <form action="{{ route('data-dokumentasi.update', $item-> id) }}" method="POST" enctype="multipart/form-data" class="form" id="form">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="judul">Masukkan Judul Dokumentasi</label>
                    <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Judul Dokumentasi" value="{{ $item-> judul }}">
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="judul">Gambar</label>
                    <div class="form-control-file">
                        @foreach (explode("|", $item-> name) as $name)
                            <img src="{{ asset('storage/images/foto-dokumentasi/'.$name) }}" style="width:200px; height:200px;" class="img-thumbnail">
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Pilih Gambar</label>
                    <input type="file" name="name[]" class="form-control-file" id="name" multiple>
                    @error('name.*')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block" style="margin-top:10px" onclick="submitForm()">
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

@endsection