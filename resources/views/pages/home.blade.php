@extends('layouts.home')

@section('title')
<title>HMK-Bengkulu</title>
@endsection

@section('content')
<!-- Header -->
<header class="text-center header">
    <img src="frontend/images/logo.png" class="logo" id="logo2">
    <h1 class="text-header" id="text-header">HIMPUNAN MAHASISWA</h1>
    <h1 class="text-header" id="text-header2">KERINCI - BENGKULU</h1>
</header>
<!-- End Header -->

<main>
    <section class="section-sejarah mt-4">
        <div class="container  border-bottom border-info pb-3">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Tentang HMK-B</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($data_tentang as $data)
                <div class="col-md-8 text-justify pt-2">
                    <p id="sejarah">{{ $data-> dataTentang }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section-pengurus mt-4" id="pengurus">
        <div class="container border-bottom border-info pb-3">
            <div class="row text-center justify-content-center">
                <div class="col-md-12">
                    <h2>Struktur Kepengurusan</h2>
                </div>
            </div>
            <div class="row text-center justify-content-center pt-3">
                <div class="col-md-12 pb-2">
                    <h5>DPO</h5>
                </div>
            </div>
            <div class="row text-center justify-content-center border-bottom border-dark">
                @php
                $dpoo = 0;
                @endphp
                @foreach ($dpo as $item)
                @php
                $dpoo++;
                @endphp
                <div class="col-md-2" id="dpo{{ $dpoo }}">
                    <img src="{{ asset('storage/images/foto-pengurus/'. $item->foto) }}" alt=""
                        class="rounded-circle">
                    <p class="nama-pengurus">{{ $item -> nama }}</p>
                </div>
                @endforeach
            </div>
            <div class="row text-center justify-content-center pt-3 border-bottom border-dark">
                <div class="col-md-4" id="ketua">
                    <h5>Ketua</h5>
                    @foreach ($ketua as $item)
                    <img src="{{ asset('storage/images/foto-pengurus/'. $item-> foto) }}" alt=""
                        class="rounded-circle">
                    <p class="nama-pengurus">
                        {{ $item-> nama }}
                    </p>
                    @endforeach
                </div>
                <div class="col-md-4" id="wakil-ketua">
                    <h5>Wakil Ketua</h5>
                    @foreach ($wakil_ketua as $item)
                    <img src="{{ asset('storage/images/foto-pengurus/'. $item-> foto) }}" alt=""
                        class="rounded-circle">
                    <p class="nama-pengurus">
                        {{ $item-> nama }}
                    </p>
                    @endforeach
                </div>
            </div>
            <div class="row text-center justify-content-center pt-3">
                <div class="col-md-6" id="sekretaris">
                    <h5>Sekretaris</h5>
                    @foreach ($sekretaris as $item)
                    <img src="{{ asset('storage/images/foto-pengurus/'. $item-> foto) }}" alt=""
                        class="rounded-circle">
                    <p class="nama-pengurus">
                        {{ $item-> nama }}
                    </p>
                    @endforeach
                </div>
                <div class="col-md-6" id="bendahara">
                    <h5>Bendahara</h5>
                    @foreach ($bendahara as $item)
                    <img src="{{ asset('storage/images/foto-pengurus/'. $item-> foto) }}" alt=""
                        class="rounded-circle">
                    <p class="nama-pengurus">
                        {{ $item-> nama }}
                    </p>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="section-divisi mt-4" id="divisi">
        <div class="container pb-3">
            <div class="row text-center">
                <div class="col-md-12 ">
                    <h4>Divisi</h4>
                </div>
            </div>
            <div class="row justify-content-center border-bottom border-info">
                @php
                    $no = 0;
                @endphp
                @foreach ($divisi as $item)
                @php
                    $no++;
                @endphp
                <div class="col-md-4 col-lg-4 divisi-item" id="{{ $no }}">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('storage/images/icon/'. $item-> icon) }}" class="img-card-top" alt="...">
                        </div>
                        <h5 class="card-title text-center">{{ $item-> title }}</h5>
                        <p class="card-text text-center">{{ $item-> deskripsi }}</p>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary btn-divisi" data-toggle="modal"
                                data-target=".{{ strtolower($item-> title) }}">View Details</button>
                        </div>
                        <div class="modal fade {{ strtolower($item-> title) }}" tabindex="-1" role="dial">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>{{ $item-> title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8 col-md-4 py-3 px-5 text-center">
                                            <img src="{{ asset('storage/images/foto-profil/'. $item-> foto) }}" alt=""
                                                class="card-img-top img-card-2 rounded-circle"
                                                style="width:180px; height:180px;">
                                            <h5 class="pt-2">{{ $item-> namaKetua }}</h5>
                                            <p>Ketua</p>
                                        </div>
                                        <div class="col-sm-12 col-md-8 py-3 px-5 text anggota-card">
                                            <h5>Anggota :</h5>
                                            <ol>
                                                @foreach (explode('|', $item-> anggota) as $names)
                                                <li>{{ $names }}</li>
                                                @endforeach
                                            </ol>
                                            <h5 class="pt-2">Program Kerja :</h5>
                                            <ul>
                                                @foreach (explode('|', $item-> proker) as $names)
                                                <li>{{ $names }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section-kampus mt-3">
        <div class="container" id="carousel">
            <h2 class="text-center">
                Kampus Di Bengkulu
            </h2>
            <div id="myCarousel" class="carousel slide my-3" data-ride="carousel">
                <ol class="carousel-indicators">
                    @for ($i = 0; $i < count($kampus); $i++)
                    <li data-target="#myCarousel" data-slide-to="{{ $i }}" class="active mt-n5"></li>
                    @endfor
                </ol>
                <div class="carousel-inner">
                    @foreach ($kampus as $key => $item)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/images/gambar-kampus/'. $item-> image) }}" class="d-block w-100">
                        <h4 class="text-center text">{{ $item-> nama_kampus }}</h4>
                    </div>
                    @endforeach
                </div>
                <a href="#myCarousel" class="carousel-control-prev" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-primary" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a href="#myCarousel" class="carousel-control-next" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-primary" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <section class="section-kirim-data">
        <div class="container-fluid">
            <button class="bg-primary rounded-lg text-black" type="button" id="comment" data-toggle="modal"
                data-target=".tambah-data">
                Kirim Data
            </button>
            <div class="modal fade tambah-data" tabindex="-1" role="dial" id="modal">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Kirim Data Sebagai Anggota</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-body">
                                        <form action="{{ route('kirim-data') }}" method="POST"
                                            enctype="multipart/form-data" class="form" id="form">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama">Nama Lengkap</label>
                                                <input id="nama" type="text"
                                                    class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                    placeholder="Nama Lengkap" value="{{ old('nama') }}">
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
                                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control"
                                                    required>
                                                    <option value="Laki-Laki" @if ( old('jenis_kelamin')=='Laki-Laki' )
                                                        selected @endif>Laki-Laki</option>
                                                    <option value="Perempuan" @if ( old('jenis_kelamin')=='Perempuan' )
                                                        selected @endif>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="agama">Agama</label>
                                                <input id="agama" type="text"
                                                    class="form-control @error('agama') is-invalid @enderror"
                                                    name="agama" placeholder="Agama" value="{{ old('agama') }}">
                                                @error('agama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat_asal">Alamat Asal</label>
                                                <input id="alamat_asal" type="text"
                                                    class="form-control @error('alamat_asal') is-invalid @enderror"
                                                    name="alamat_asal" placeholder="Alamat Asal"
                                                    value="{{ old('alamat_asal') }}">
                                                @error('alamat_asal')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="asal_sekolah">Asal Sekolah</label>
                                                <input id="asal_sekolah" type="text"
                                                    class="form-control @error('asal_sekolah') is-invalid @enderror"
                                                    name="asal_sekolah" placeholder="Asal Sekolah"
                                                    value="{{ old('asal_sekolah') }}">
                                                @error('asal_sekolah')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat_bengkulu">Alamat Di Bengkulu</label>
                                                <input id="alamat_bengkulu" type="text"
                                                    class="form-control @error('alamat_bengkulu') is-invalid @enderror"
                                                    name="alamat_bengkulu" placeholder="Alamat Di Bengkulu"
                                                    value="{{ old('alamat_bengkulu') }}">
                                                @error('alamat_bengkulu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="status_tinggal">Status Tinggal</label>
                                                <input id="status_tinggal" type="text"
                                                    class="form-control @error('status_tinggal') is-invalid @enderror"
                                                    name="status_tinggal" placeholder="Status Tinggal"
                                                    value="{{ old('status_tinggal') }}">
                                                @error('status_tinggal')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="asal_kampus">Asal Kampus</label>
                                                <select id="asal_kampus" name="asal_kampus" class="form-control"
                                                    required>
                                                    @foreach ($kampus as $kampuss)
                                                    <option value="{{ $kampuss-> nama_kampus }}" @if (old('asal_kampus')==$kampuss-> nama_kampus) selected @endif >
                                                        {{ $kampuss-> nama_kampus }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jurusan">Jurusan</label>
                                                <input id="jurusan"="text"
                                                    class="form-control @error('jurusan') is-invalid @enderror"
                                                    name="jurusan" placeholder="Jurusan" value="{{ old('jurusan') }}">
                                                @error('jurusan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="angkatan">Angkatan</label>
                                                <input id="angkatan" type="number"
                                                    class="form-control @error('angkatan') is-invalid @enderror"
                                                    name="angkatan" placeholder="Angkatan"
                                                    value="{{ old('angkatan') }}">
                                                @error('angkatan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="no_hp">No. Handphone / WA </label>
                                                <input id="no_hp" type="text"
                                                    class="form-control @error('no_hp') is-invalid @enderror"
                                                    name="no_hp" placeholder="No. Handphone / WA"
                                                    value="{{ old('no_hp') }}">
                                                @error('no_hp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="media_sosial">Media Sosial ( Instagram / Facebook )</label>
                                                <input id="media_sosial" type="text"
                                                    class="form-control @error('media_sosial') is-invalid @enderror"
                                                    name="media_sosial" placeholder="Media Sosial"
                                                    value="{{ old('media_sosial') }}">
                                                @error('media_sosial')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email Aktif</label>
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" placeholder="Email" value="{{ old('email') }}">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="foto">Foto</label>
                                                <input id="foto" type="file"
                                                    class="form-control @error('foto') is-invalid @enderror" name="foto"
                                                    required>
                                                @error('foto')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">
                                                Kirim
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
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
                confirmButtonText: "Kirim",
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

        function sweet(){
            swal("Gagal Mengirim Data", "Terdapat data yang belum lengkap atau salah", "error");
        }

    </script>

    @if($errors->all())
    <script>
        sweet();
        $(function() {
            $('#modal').modal({
                show: true
            });
        });
    </script>
    @endif

@if (Session::get('success'))
<script>
    swal("Berhasil Mengirim Data", "Jika terdapat data yang belum benar bisa diperbaiki kok :)", "success");
</script>
@endif

@if (Session::get('error'))
    <script>
        swal("Gagal Mengirim Data", "Data Anda Sudah Terkirim Sebelumnya", "error");
        $(function() {
            $('#modal').modal({
                show: true
            });
        });
    </script>
@endif
@endsection 
