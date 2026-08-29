@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <h1 class="fw-bold">
        Dashboard
    </h1>

    <p>
        Selamat datang di Sistem Pengelolaan Sampah
        Kampung Panyalahan
    </p>

    <hr>

    <h2 class="text-success mb-4">
        Dokumentasi Kegiatan
    </h2>

    @if($kegiatans->count() > 0)

        <div class="row">

            @foreach($kegiatans as $kegiatan)

                <div class="col-md-4 mb-4">

                    <div class="card">

                        @if($kegiatan->foto)

                            <img
                                src="{{ asset('storage/' . $kegiatan->foto) }}"
                                class="card-img-top"
                                style="height:220px; object-fit:cover;"
                            >

                        @endif

                        <div class="card-body">

                            <h5>
                                {{ $kegiatan->judul }}
                            </h5>

                            <p>
                                {{ $kegiatan->keterangan }}
                            </p>

                            <small>
                                {{ $kegiatan->tanggal }}
                            </small>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="card">

            <div class="card-body text-center p-5">

                <i class="fas fa-images fa-4x text-success mb-3"></i>

                <h3>
                    Belum Ada Dokumentasi Kegiatan
                </h3>

                <p class="text-muted">
                    Silakan tambahkan kegiatan terlebih dahulu.
                </p>

                <a href="{{ route('kegiatans.create') }}"
                   class="btn btn-success">

                    + Tambah Kegiatan

                </a>

            </div>

        </div>

    @endif

</div>

@endsection