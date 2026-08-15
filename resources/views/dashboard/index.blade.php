@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<style>
    /* =====================================================
       DASHBOARD
    ===================================================== */

    .dashboard-page {
        width: 100%;
        max-width: 100%;
        min-height: calc(100vh - 90px);
        padding: 28px 35px 40px;
        background: #ffffff;
        box-sizing: border-box;
        overflow-x: hidden;
    }

    /* =====================================================
       HEADER
    ===================================================== */

    .dashboard-header {
        margin-bottom: 45px;
    }

    .dashboard-header h1 {
        margin: 0 0 8px;
        font-size: 32px;
        font-weight: 700;
        line-height: 1.2;
        color: #111820;
    }

    .dashboard-header p {
        margin: 0;
        font-size: 17px;
        color: #222222;
    }

    /* =====================================================
       DOKUMENTASI KEGIATAN
    ===================================================== */

    .documentation-section {
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
    }

    .documentation-title {
        margin: 0 0 8px;
        font-size: 25px;
        font-weight: 700;
        color: #087b35;
    }

    .documentation-description {
        margin: 0 0 20px;
        font-size: 16px;
        line-height: 1.6;
        color: #6b6b6b;
    }

    /* =====================================================
       CONTAINER CAROUSEL
    ===================================================== */

    .kegiatan-carousel {
        position: relative;
        width: 100%;
        max-width: 100%;
        min-height: 640px;

        padding: 25px;

        background: #ffffff;

        border: 1px solid #e1e5e2;
        border-radius: 16px;

        box-sizing: border-box;

        box-shadow:
            0 2px 8px rgba(0, 0, 0, 0.04);
    }

    /* =====================================================
       CARD KEGIATAN
    ===================================================== */

    .kegiatan-card {
        width: 100%;
        text-align: center;
        padding-bottom: 45px;
        box-sizing: border-box;
    }

    /* =====================================================
       FOTO KEGIATAN
    ===================================================== */

    .kegiatan-image {
        display: block;

        width: 100%;
        height: 450px;

        object-fit: cover;

        border-radius: 16px;
    }

    /* =====================================================
       JUDUL KEGIATAN
    ===================================================== */

    .kegiatan-card h3 {
        margin: 22px 0 10px;

        font-size: 24px;
        line-height: 1.3;
        font-weight: 700;

        color: #111820;
    }

    /* =====================================================
       KETERANGAN
    ===================================================== */

    .kegiatan-description {
        max-width: 950px;

        margin: 0 auto;

        font-size: 16px;
        line-height: 1.7;

        color: #666666;
    }

    /* =====================================================
       CAROUSEL INDICATOR
    ===================================================== */

    .carousel-indicators {
        position: absolute;

        right: 0;
        bottom: 20px;
        left: 0;

        display: flex;

        justify-content: center;
        align-items: center;

        margin: 0;
        padding: 0;

        z-index: 5;
    }

    .carousel-indicators button {
        width: 10px;
        height: 10px;

        margin: 0 5px;
        padding: 0;

        border: 0;
        border-radius: 50%;

        background-color: #b7b7b7;

        opacity: 1;
    }

    .carousel-indicators button.active {
        background-color: #087b35;
    }

    /* =====================================================
       HILANGKAN TOMBOL PREV NEXT
       Karena mengikuti desain gambar
    ===================================================== */

    .kegiatan-carousel .carousel-control-prev,
    .kegiatan-carousel .carousel-control-next {
        display: none;
    }

    /* =====================================================
       BELUM ADA KEGIATAN
    ===================================================== */

    .empty-kegiatan {
        width: 100%;
        max-width: 100%;

        min-height: 450px;

        padding: 50px 25px;

        background: #ffffff;

        border: 1px solid #e1e5e2;
        border-radius: 16px;

        box-sizing: border-box;

        display: flex;
        flex-direction: column;

        align-items: center;
        justify-content: center;

        text-align: center;
    }

    /* ICON */

    .empty-kegiatan .empty-icon {
        width: 75px;
        height: 75px;

        margin-bottom: 22px;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .empty-kegiatan .empty-icon i {
        font-size: 65px;
        color: #087b35;
    }

    /* JUDUL */

    .empty-kegiatan h3 {
        width: 100%;

        margin: 0 0 10px;

        font-size: 23px;
        line-height: 1.4;

        font-weight: 600;

        color: #222222;

        text-align: center;
    }

    /* TEXT */

    .empty-kegiatan p {
        width: 100%;

        margin: 0 0 25px;

        font-size: 15px;
        line-height: 1.5;

        color: #777777;

        text-align: center;
    }

    /* =====================================================
       BUTTON TAMBAH KEGIATAN
    ===================================================== */

    .btn-add-kegiatan {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        gap: 8px;

        width: auto;
        min-width: 180px;
        height: 48px;

        padding: 0 24px;

        background: #087b35;
        color: #ffffff;

        border-radius: 6px;

        text-decoration: none;

        font-size: 15px;
        font-weight: 600;

        box-sizing: border-box;

        transition: 0.2s ease;
    }

    .btn-add-kegiatan i {
        font-size: 16px;
        color: #ffffff;
    }

    .btn-add-kegiatan:hover {
        background: #075f2a;
        color: #ffffff;
    }

    /* =====================================================
       TIDAK ADA FOTO
    ===================================================== */

    .no-image {
        width: 100%;
        height: 450px;

        display: flex;
        flex-direction: column;

        align-items: center;
        justify-content: center;

        background: #f4f6f5;

        border-radius: 16px;

        color: #999999;
    }

    .no-image i {
        font-size: 65px;
        margin-bottom: 10px;
    }

    .no-image p {
        margin: 0;
        font-size: 15px;
    }

    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 1100px) {

        .dashboard-page {
            padding: 25px;
        }

        .kegiatan-image,
        .no-image {
            height: 400px;
        }
    }

    @media (max-width: 800px) {

        .dashboard-page {
            padding: 22px 20px 35px;
        }

        .dashboard-header {
            margin-bottom: 35px;
        }

        .dashboard-header h1 {
            font-size: 28px;
        }

        .dashboard-header p {
            font-size: 15px;
        }

        .documentation-title {
            font-size: 22px;
        }

        .documentation-description {
            font-size: 14px;
        }

        .kegiatan-carousel {
            min-height: auto;
            padding: 15px;
        }

        .kegiatan-image,
        .no-image {
            height: 350px;
        }

        .kegiatan-card h3 {
            font-size: 21px;
        }

        .kegiatan-description {
            font-size: 14px;
        }
    }

    @media (max-width: 600px) {

        .dashboard-page {
            padding: 20px 15px 30px;
        }

        .dashboard-header {
            margin-bottom: 30px;
        }

        .dashboard-header h1 {
            font-size: 24px;
        }

        .dashboard-header p {
            font-size: 14px;
        }

        .documentation-title {
            font-size: 20px;
        }

        .documentation-description {
            font-size: 13px;
        }

        .kegiatan-carousel {
            padding: 10px;
            border-radius: 12px;
        }

        .kegiatan-image,
        .no-image {
            height: 250px;
            border-radius: 10px;
        }

        .kegiatan-card h3 {
            font-size: 18px;
        }

        .kegiatan-description {
            font-size: 13px;
        }

        .empty-kegiatan {
            min-height: 380px;
            padding: 40px 15px;
        }

        .empty-kegiatan h3 {
            font-size: 19px;
        }

        .empty-kegiatan p {
            font-size: 14px;
        }

        .btn-add-kegiatan {
            min-width: 170px;
            height: 45px;
            font-size: 14px;
        }
    }
</style>


<div class="dashboard-page">

    {{-- =================================================
         HEADER
    ================================================== --}}

    <div class="dashboard-header">

        <h1>
            1. Dashboard
        </h1>

        <p>
            Selamat datang di Sistem Pengelolaan Sampah Kampung Panyalahan
        </p>

    </div>


    {{-- =================================================
         DOKUMENTASI KEGIATAN
    ================================================== --}}

    <div class="documentation-section">

        <h2 class="documentation-title">
            Dokumentasi Kegiatan
        </h2>

        <p class="documentation-description">
            Berikut adalah dokumentasi kegiatan pengelolaan sampah
            yang telah dilaksanakan oleh tim di lapangan.
        </p>


        {{-- =================================================
             JIKA ADA DATA KEGIATAN
        ================================================== --}}

        @if(isset($kegiatans) && $kegiatans->count() > 0)

            <div
                id="kegiatanCarousel"
                class="carousel slide kegiatan-carousel"
                data-bs-ride="carousel"
                data-bs-interval="4000"
            >

                {{-- ================================
                     FOTO KEGIATAN
                ================================= --}}

                <div class="carousel-inner">

                    @foreach($kegiatans as $index => $kegiatan)

                        <div
                            class="carousel-item {{ $index === 0 ? 'active' : '' }}"
                        >

                            <div class="kegiatan-card">

                                {{-- FOTO --}}

                                @if(!empty($kegiatan->foto))

                                    <img
                                        src="{{ asset('storage/' . $kegiatan->foto) }}"
                                        class="kegiatan-image"
                                        alt="{{ $kegiatan->judul }}"
                                    >

                                @else

                                    <div class="no-image">

                                        <i class="bi bi-image"></i>

                                        <p>
                                            Tidak ada foto kegiatan
                                        </p>

                                    </div>

                                @endif


                                {{-- JUDUL --}}

                                <h3>
                                    {{ $kegiatan->judul }}
                                </h3>


                                {{-- KETERANGAN --}}

                                @if(!empty($kegiatan->keterangan))

                                    <p class="kegiatan-description">
                                        {{ $kegiatan->keterangan }}
                                    </p>

                                @else

                                    <p class="kegiatan-description">
                                        Dokumentasi kegiatan pengelolaan
                                        sampah Kampung Panyalahan.
                                    </p>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- ================================
                     INDICATOR
                ================================= --}}

                @if($kegiatans->count() > 1)

                    <div class="carousel-indicators">

                        @foreach($kegiatans as $index => $kegiatan)

                            <button
                                type="button"
                                data-bs-target="#kegiatanCarousel"
                                data-bs-slide-to="{{ $index }}"
                                class="{{ $index === 0 ? 'active' : '' }}"
                                aria-label="Slide {{ $index + 1 }}"
                            ></button>

                        @endforeach

                    </div>

                @endif

            </div>


        {{-- =================================================
             JIKA BELUM ADA DATA
        ================================================== --}}

        @else

            <div class="empty-kegiatan">

                <div class="empty-icon">

                    <i class="bi bi-images"></i>

                </div>


                <h3>
                    Belum Ada Dokumentasi Kegiatan
                </h3>


                <p>
                    Silakan tambahkan kegiatan terlebih dahulu.
                </p>


                <a
                    href="{{ route('kegiatans.create') }}"
                    class="btn-add-kegiatan"
                >

                    <i class="bi bi-plus-circle"></i>

                    Tambah Kegiatan

                </a>

            </div>

        @endif

    </div>

</div>

@endsection