@extends('layouts.dokumentasi')

@section('title')
<title>Dok. HMK-Bengkulu</title>
@endsection

@section('content')
<main>
    @forelse ($items as $item)
    <div class="container my-5">
        <div class="text-center">
            <h2>{{ $item-> judul }}</h2>
        </div>
        <div id="myCarousel{{ $item-> id }}" class="carousel slide my-3" data-ride="carousel">
            <ol class="carousel-indicators">
                @for ($i = 0; $i < count(explode("|", $item->name)); $i++)
                    <li data-target="#myCarousel{{ $item-> id }}" data-slide-to="{{ $i }}" class="active mt-n5"></li>
                @endfor
            </ol>
            <div class="carousel-inner">
                @foreach (explode('|', $item-> name) as $key => $value)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/images/foto-dokumentasi/'. $value) }}" class="d-block w-100">
                </div>
                @endforeach
            </div>
            <a href="#myCarousel{{ $item-> id }}" class="carousel-control-prev" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-primary" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a href="#myCarousel{{ $item-> id }}" class="carousel-control-next" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-primary" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    @empty

    <h3 class="text-center" style="padding-top: 200px; padding-bottom: 200px;">
        Belum Ada Dokumentasi Kegiatan
    </h3>

    @endforelse
</main>
@endsection
