@extends('layouts.admin')

@section('title')
    <title> Admin - Data Alumni </title>
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
                <li class="breadcrumb-item active" aria-current="page">Data Alumni</li>
            </ol>
        </nav>
        <a href="{{ route('data-alumni.index') }}" class="btn btn-info">Refresh</a>
    </div>

    <form action="{{ route('cari2') }}" method="get">
        @csrf
        <div class="input-group mb-3">
            <div class="dropdown no-arrow">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-sort"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('sort4') }}">Nama</a>
                    <a class="dropdown-item" href="{{ route('sort8') }}">Jurusan</a>
                    <a class="dropdown-item" href="{{ route('sort5') }}">Kampus</a>
                    <a class="dropdown-item" href="{{ route('sort6') }}">Angkatan</a>
                </div>
            </div>
            <input type="text" class="form-control input-group-text" name="keyword" placeholder="Cari berdasarkan nama, angkatan, asal kampus" value="{{ old('keyword') }}">
            <button type="submit" class="btn btn-dark input-group-append">
                Cari
            </button>
        </div>
    </form>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Asal Kampus</th>
                        <th>Angkatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 0;
                    @endphp
                    @forelse ($items as $item)
                    @php
                    $no++;
                    @endphp
                    <tr class="text-center">
                        <td>{{ $no }}</td>
                        <td>{{ $item-> nama }}</td>
                        <td>{{ $item-> jurusan }}</td>
                        <td>{{ $item-> asal_kampus }}</td>
                        <td>{{ $item-> angkatan }}</td>
                        <td>
                            <a href="{{ route('data-alumni.show', $item->id) }}" class="btn btn-dark">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('data-alumni.edit', $item->id) }}" class="btn btn-info editData" data-name="{{ $item-> nama }}">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('data-alumni.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger hapusData" data-name="{{ $item-> nama }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            <a href="{{ route('data-alumni.move', $item->id) }}" class="btn btn-warning pindahData" data-name="{{ $item-> nama }}">
                                <i class="fa fa-caret-left"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <p>{{ $items->links() }}</p>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

@section('script')

<script type="text/javascript">

    $('.hapusData').on('click', function (event) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        var nama = $(this).attr('data-name');
        swal({
            title: "Hapus Data " +nama+ " ?",
            text: "Data yang dihapus tidak dapat dikembalikan.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d01010",
            confirmButtonText: "Hapus!",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                form.submit();          // submitting the form when user press yes
            } else {
                swal("Batal", "Data masih aman :)", "error");
            }
        });
    });

        $('.editData').on('click', function (event) {
            event.preventDefault(); // prevent form submit
            var form = $(this).attr('href'); // storing the form
            var nama = $(this).attr('data-name');
            swal({
                title: "Ubah Data " +nama+ " ?",
                text: "Isi datanya kembali dengan baik :)",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#0096ff",
                confirmButtonText: "Ubah",
                cancelButtonText: "Batal",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    window.location.href = form;          // submitting the form when user press yes
                }else {
                    swal("Batal", "Data batal diubah :)", "error");
                }
            });
        });

        $('.pindahData').on('click', function (event) {
            event.preventDefault(); // prevent form submit
            var form = $(this).attr('href'); // storing the form
            var nama = $(this).attr('data-name');
            swal({
                title: "Pindah Data " +nama+ " ?",
                text: "Pindahkan data alumni sebagai anggota aktif kembali",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#ff7200",
                confirmButtonText: "Pindah",
                cancelButtonText: "Batal",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    window.location.href = form;          // submitting the form when user press yes
                }else {
                    swal("Batal", "Data batal dipindah :)", "error");
                }
            });
        });
    </script>

@if (Session::get('success'))
    <script>
        swal("Berhasil Menyimpan Data", "Jika terdapat data yang belum benar bisa diperbaiki kok :)", "success");
    </script>
@endif

@if (Session::get('success2'))
    <script>
        swal("Berhasil Mengubah Data", "Jika terdapat data yang belum benar bisa diperbaiki lagi kok :)", "success");
    </script>
@endif

@if (Session::get('success3'))
    <script>
        swal("Berhasil Memindah Data", "Jika data yang dipindah salah, masih bisa diperbaiki kok :)", "success");
    </script>
@endif

@if (Session::get('success4'))
    <script>
        swal("Berhasil Menghapus Data", "Data yang dihapus sudah tidak dapat dikembalikan lagi ya!", "success");
    </script>
@endif

@endsection