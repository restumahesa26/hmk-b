@extends('layouts.admin')

@section('title')
    <title> Admin - Data Divisi </title>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Divisi</h1>
        @if ($count < 6) 
            <a href="{{ route('data-divisi.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Divisi
            </a>           
        @endif
    </div>

    <div class="d-sm-flex align-items-center justify-content-between">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Divisi</li>
            </ol>
        </nav>
    </div>

@if ($count < 6) 
    <div class="alert alert-danger">
        <h5 class="text-danger">!! Data Divisi Belum Lengkap !!</h5>
    </div>
@endif

<div class="row">
    <div class="table-responsive">
        <table class="table table-bordered table-hover" width="100%" cellspacing="0">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Deskripsi</th>
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
                    <th>{{ $no }}</th>
                    <td class="">
                        <img src="{{ asset('storage/images/icon/'. $item-> icon) }}" style="width:200px; height:200px;"
                            class="img-card">
                    </td>
                    <td>{{ $item-> title }}</td>
                    <td>{{ $item-> deskripsi }}</td>
                    <td>
                        <a href="{{ route('data-divisi.edit', $item->id) }}" class="btn btn-info editData">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('data-divisi.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" onclick="hapusData()">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
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
    </div>
</div>
</div>
<!-- /.container-fluid -->
@endsection

@section('script')

<script type="text/javascript">

        function hapusData() {
            event.preventDefault(); // prevent form submit
            var form = event.target.form; // storing the form
            swal({
                title: "Hapus Data?",
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
        }

        $('.editData').on('click', function (event) {
            event.preventDefault(); // prevent form submit
            var form = $(this).attr('href'); // storing the form
            swal({
                title: "Ubah Data?",
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
        swal("Berhasil Menghapus Data", "Data yang dihapus sudah tidak dapat dikembalikan lagi ya!", "success");
    </script>
@endif

@endsection