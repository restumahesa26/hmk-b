@extends('layouts.admin')

@section('title')
    <title> Admin - Request Data </title>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Request Data</h1>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Request Data</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Asal Kampus</th>
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
                        <td>
                            <img src="{{ asset('storage/images/foto-request/'. $item-> foto) }}" style="width:200px; height:200px;">
                        </td>
                        <td>{{ $item-> nama }}</td>
                        <td>{{ $item-> asal_kampus }}</td>
                        <td>
                            <a href="{{ route('request-data.show', $item-> id) }}" class="btn btn-dark">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('request-data.edit', $item-> id) }}" class="btn btn-primary editData">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <a href="{{ route('request-data.move-aktif', $item-> id) }}" class="btn btn-success pindahData1">
                                <i class="fa fa-check"></i>
                            </a>
                            <a href="{{ route('request-data.move-alumni', $item-> id) }}" class="btn btn-info pindahData2">
                                <i class="fa fa-check"></i>
                            </a>
                            <form action="{{ route('request-data.destroy', $item-> id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="hapusData()">
                                    <i class="fa fa-ban"></i>
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
                title: "Tolak Request Data?",
                text: "Data Yang Ditolak Tidak Bisa Disetujui Lagi Ya :)",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d01010",
                confirmButtonText: "Tolak!",
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

        $('.pindahData1').on('click', function (event) {
            event.preventDefault(); // prevent form submit
            var form = $(this).attr('href'); // storing the form
            swal({
                title: "Setujui Sebagai Anggota Aktif?",
                text: "Pindahkan Data Sebagai Anggota Aktif",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#1c8d14",
                confirmButtonText: "Pindah",
                cancelButtonText: "Batal",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    window.location.href = form;          // submitting the form when user press yes
                }else {
                    swal("Batal", "Data batal disetujui :)", "error");
                }
            });
        });

        $('.pindahData2').on('click', function (event) {
            event.preventDefault(); // prevent form submit
            var form = $(this).attr('href'); // storing the form
            swal({
                title: "Setujui Sebagai Alumni?",
                text: "Pindahkan Data Sebagai Alumni",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#1c8d14",
                confirmButtonText: "Pindah",
                cancelButtonText: "Batal",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    window.location.href = form;          // submitting the form when user press yes
                }else {
                    swal("Batal", "Data batal disetujui :)", "error");
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
        swal("Berhasil Disetujui Sebagai Anggota Aktif", "Jika masih terdapat kesalahan pada data, masih bisa diperbaiki kok :)", "success");
    </script>
@endif

@if (Session::get('success4'))
    <script>
        swal("Berhasil Disetujui Sebagai Alumni", "Jika masih terdapat kesalahan pada data, masih bisa diperbaiki kok :)", "success");
    </script>
@endif

@if (Session::get('success5'))
    <script>
        swal("Request Data Ditolak", "Kalau data yang ditolak salah, mohon dikirim ulang lagi ya datanya :)", "success");
    </script>
@endif

@if (Session::get('error'))
    <script>
        swal("Gagal Memindah Data", "Data Anda Sudah Sebelumnya", "error");
    </script>
@endif

@endsection