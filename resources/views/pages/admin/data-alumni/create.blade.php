@extends('layouts.admin')

@section('title')
    <title> Admin - Tambah Data Alumni </title>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Alumni</h1>
        <a href="{{ route('data-alumni.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Alumni
        </a>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('data-alumni.index') }}">Data Alumni</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
            </ol>
        </nav>
    </div>

    <div class="card-show">
        <div class="card-body">
            <form action="{{ route('data-alumni.store') }}" method="POST" enctype="multipart/form-data" class="form" id="form">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Lengkap..." value="{{ old('nama') }}">
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Tanggal Lahir</label>
                    <div class="input-group">
                        <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}">
                        @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                        <option value="Laki-Laki" @if ( old('jenis_kelamin') == 'Laki-Laki' )
                            selected
                        @endif >Laki-Laki</option>
                        <option value="Perempuan" @if ( old('jenis_kelamin') == 'Perempuan' )
                            selected
                        @endif >Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <input id="agama" type="text" class="form-control @error('agama') is-invalid @enderror" name="agama" placeholder="Agama..." value="{{ old('agama') }}">
                    @error('agama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat_asal">Alamat Asal</label>
                    <input id="alamat_asal" type="text" class="form-control @error('alamat_asal') is-invalid @enderror" name="alamat_asal" placeholder="Alamat Asal..." value="{{ old('alamat_asal') }}">
                    @error('alamat_asal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="asal_sekolah">Asal Sekolah</label>
                    <input id="asal_sekolah" type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah" placeholder="Asal Sekolah..." value="{{ old('asal_sekolah') }}">
                    @error('asal_sekolah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat_bengkulu">Alamat Di Bengkulu</label>
                    <input id="alamat_bengkulu" type="text" class="form-control @error('alamat_bengkulu') is-invalid @enderror" name="alamat_bengkulu" placeholder="Alamat Di Bengkulu..." value="{{ old('alamat_bengkulu') }}">
                    @error('alamat_bengkulu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status_tinggal">Status Tinggal</label>
                    <input id="status_tinggal" type="text" class="form-control @error('status_tinggal') is-invalid @enderror" name="status_tinggal" placeholder="Status Tinggal..." value="{{ old('status_tinggal') }}">
                    @error('status_tinggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="asal_kampus">Asal Kampus</label>
                    <select id="asal_kampus" name="asal_kampus" class="form-control" required>
                        @foreach ($kampus as $kampuss)
                            <option value="{{ $kampuss-> nama_kampus }}">
                                {{ $kampuss-> nama_kampus }}
                            </option>
                        @endforeach 
                    </select>
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label> 
                    <input id="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" placeholder="Jurusan..." value="{{ old('jurusan') }}">
                    @error('jurusan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                    <input id="angkatan" type="number" class="form-control @error('angkatan') is-invalid @enderror" name="angkatan" placeholder="Angkatan..." value="{{ old('angkatan') }}">
                    @error('angkatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_hp">No. Handphone / WA </label>
                    <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" placeholder="No. Handphone / WA..." value="{{ old('no_hp') }}">
                    @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="media_sosial">Media Sosial</label>
                    <input id="media_sosial" type="text" class="form-control @error('media_sosial') is-invalid @enderror" name="media_sosial" placeholder="Media Sosial..." value="{{ old('media_sosial') }}">
                    @error('media_sosial')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email Aktif</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email.." value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" required>
                    @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">
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

    $(document).ready(function(){
        swal({
            buttons: false,
            timer: 2000,
            title: "Perhatian!!",
            text: "Mohon Isi Datanya Dengan Benar Ya!!",
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
        swal("Gagal Menyimpan Data", "Data Anda Sudah Sebelumnya", "error");
    </script>
@endif

@endsection