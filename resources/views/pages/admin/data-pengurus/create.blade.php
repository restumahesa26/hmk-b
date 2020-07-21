@extends('layouts.admin')

@section('title')
    <title> Admin - Tambah Data Pengurus </title>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengurus</h1>
        <a href="{{ route('data-pengurus.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Pengurus
        </a>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('data-pengurus.index') }}">Data Pengurus</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
            </ol>
        </nav>
    </div>

    <div class="card-show">
        <div class="card-body">
            <form action="{{ route('data-pengurus.store') }}" method="POST" enctype="multipart/form-data" class="form" id="form">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama" value="{{ old('nama') }}">
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                 <div class="form-group">
                    <label for="posisi">Posisi</label>
                    <select id="posisi" name="posisi" class="form-control">
                        @if ($dpo < 5)
                            <option value="DPO" @if ( old('posisi') == 'DPO' )
                                selected
                            @endif >DPO</option>
                        @endif
                        @if ($ketua < 1)
                            <option value="Ketua" @if ( old('posisi') == 'Ketua' )
                                selected
                            @endif >Ketua</option>
                        @endif
                        @if ($wakil_ketua < 1)
                            <option value="Wakil Ketua" @if ( old('posisi') == 'Wakil Ketua' )
                                selected
                            @endif >Wakil Ketua</option>
                        @endif
                        @if ($bendahara < 1)
                            <option value="Sekretaris" @if ( old('posisi') == 'Sekretaris' )
                                selected
                            @endif >Sekretaris</option>
                        @endif
                        @if ($sekretaris < 1)
                            <option value="Bendahara" @if ( old('posisi') == 'Bendahara' )
                                selected
                            @endif >Bendahara</option>
                        @endif
                    </select>
                </div> 
                <div class="form-group">
                    <label for="fotoProfil">Foto</label>
                    <input id="fotoProfil" type="file" class="form-control @error('fotoProfil') is-invalid @enderror" name="fotoProfil" required>
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