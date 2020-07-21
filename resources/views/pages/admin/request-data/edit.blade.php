@extends('layouts.admin')

@section('title')
    <title> Admin - Edit Request Data </title>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Request Data</h1>
        <a href="" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Edit Request Data
        </a>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('request-data.index') }}">Request Data</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $item-> nama }}</li>
            </ol>
        </nav>
    </div>

    <div class="card-show">
        <div class="card-body">
            <form action="{{ route('request-data.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="form" id="form"> 
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Lengkap" value="{{ $item-> nama }}">
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Tanggal Lahir</label>
                    <div class="input-group">
                        <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ $item-> tempat_lahir }}">
                        @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ $item-> tanggal_lahir }}">
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
                        <option value="Laki-Laki" @if ( $item-> jenis_kelamin == 'Laki-Laki' )
                            selected
                        @endif >Laki-Laki</option>
                        <option value="Perempuan" @if ( $item-> jenis_kelamin == 'Perempuan' )
                            selected
                        @endif >Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <input id="agama" type="text" class="form-control @error('agama') is-invalid @enderror" name="agama" placeholder="Agama" value="{{ $item-> agama }}">
                    @error('agama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat_asal">Alamat Asal</label>
                    <input id="alamat_asal" type="text" class="form-control @error('alamat_asal') is-invalid @enderror" name="alamat_asal" placeholder="Alamat Asal" value="{{ $item-> alamat_asal }}">
                    @error('alamat_asal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="asal_sekolah">Asal Sekolah</label>
                    <input id="asal_sekolah" type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah" placeholder="Asal Sekolah" value="{{ $item-> asal_sekolah }}">
                    @error('asal_sekolah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat_bengkulu">Alamat Di Bengkulu</label>
                    <input id="alamat_bengkulu" type="text" class="form-control @error('alamat_bengkulu') is-invalid @enderror" name="alamat_bengkulu" placeholder="Alamat Di Bengkulu" value="{{ $item-> alamat_bengkulu }}">
                    @error('alamat_bengkulu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status_tinggal">Status Tinggal</label>
                    <input id="status_tinggal" type="text" class="form-control @error('status_tinggal') is-invalid @enderror" name="status_tinggal" placeholder="Status Tinggal" value="{{ $item-> status_tinggal }}">
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
                            <option value="{{ $kampuss-> nama_kampus }}" 
                                @if ($kampuss-> nama_kampus === $item->asal_kampus)
                                    selected
                                @endif                
                                >
                                {{ $kampuss-> nama_kampus }}
                            </option>
                        @endforeach                       
                    </select>
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input id="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" placeholder="Jurusan" value="{{ $item-> jurusan }}">
                    @error('jurusan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                    <input id="angkatan" type="number" class="form-control @error('angkatan') is-invalid @enderror" name="angkatan" placeholder="Angkatan" value="{{ $item-> angkatan }}">
                    @error('angkatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_hp">No. Handphone / WA </label>
                    <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" placeholder="No. Handphone / WA" value="{{ $item-> no_hp }}">
                    @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="media_sosial">Media Sosial</label>
                    <input id="media_sosial" type="text" class="form-control @error('media_sosial') is-invalid @enderror" name="media_sosial" placeholder="Sosial Media" value="{{ $item-> media_sosial }}">
                    @error('media_sosial')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email Aktif</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ $item-> email }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <img src="{{ asset('storage/images/foto-request/'. $item-> foto) }}" style="width:200px; height:200px;" class="img-thumbnail">
                    <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
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

</script>
    
@if($errors->all())
    <script>
        swal("Gagal Menyimpan Data", "Masih terdapat data yang belum diisi dan salah", "error");
    </script>
@endif

@if (Session::get('error'))
    <script>
        swal("Gagal Mengubah Data", "Data Anda Sudah Sebelumnya", "error");
    </script>
@endif

@endsection