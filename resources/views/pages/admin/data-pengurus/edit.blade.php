@extends('layouts.admin')

@section('title')
    <title> Admin - Edit Data Pengurus </title>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengurus</h1>
        <a href="" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Edit Data Pengurus
        </a>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('data-pengurus.index') }}">Data Pengurus</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $item-> posisi }}</li>
            </ol>
        </nav>
    </div>

    <div class="card-show">
        <div class="card-body">
            <form action="{{ route('data-pengurus.update', $item-> id) }}" method="POST" enctype="multipart/form-data" class="form" id="form">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama" value="{{ $item-> nama }}">
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="posisi">Posisi</label>
                    <select id="posisi" name="posisi" class="form-control">
                        @if ($item-> posisi == 'DPO')
                            <option value="DPO">DPO</option>
                        @endif
                        @if ($item-> posisi == 'Ketua')
                            <option value="Ketua">Ketua</option>
                        @endif
                        @if ($item-> posisi == 'Wakil Ketua')
                            <option value="Wakil Ketua">Wakil Ketua</option>
                        @endif
                        @if ($item-> posisi == 'Sekretaris')
                            <option value="Sekretaris">Sekretaris</option>
                        @endif
                        @if ($item-> posisi == 'Bendahara')
                            <option value="Bendahara">Bendahara</option>
                        @endif
                    </select>
                </div> 
                <div class="form-group">
                    <label for="fotoProfil">Foto</label>
                    <img src="{{ asset('storage/images/foto-pengurus/'. $item->foto) }}" style="width:200px; height:200px;" class="img-thumbnail rounded-circle">
                    <input id="fotoProfil" type="file" class="form-control @error('fotoProfil') is-invalid @enderror" name="fotoProfil">
                    @error('fotoProfil')
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
        swal("Gagal Menyimpan Data", "Pengurus Sudah Ada", "error");
    </script>
@endif

@if (Session::get('error2'))
    <script>
        swal("Gagal Menyimpan Data", "Seseorang Tidak Boleh Mengisi Dua Posisi", "error");
    </script>
@endif

@endsection