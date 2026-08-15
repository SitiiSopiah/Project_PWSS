@extends('layouts.app')

@section('title', 'Data Fasilitas')

@section('content')

{{-- =========================
     HEADER HALAMAN
========================= --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            Data Fasilitas
        </h2>

        <p class="text-muted mb-0">
            Kelola data fasilitas Bank Sampah Kampung Panyalahan.
        </p>
    </div>

    <a href="{{ route('fasilitas.create') }}"
       class="btn btn-success">

        <i class="bi bi-plus-circle me-1"></i>
        Tambah Fasilitas

    </a>

</div>


{{-- =========================
     BREADCRUMB
========================= --}}
<nav aria-label="breadcrumb" class="mb-4">

    <ol class="breadcrumb">

        <li class="breadcrumb-item">

            <a href="{{ route('jadwals.index') }}"
               class="text-decoration-none">

                Dashboard

            </a>

        </li>

        <li class="breadcrumb-item active"
            aria-current="page">

            Data Fasilitas

        </li>

    </ol>

</nav>


{{-- =========================
     NOTIFIKASI SUCCESS
========================= --}}
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show"
         role="alert">

        <i class="bi bi-check-circle me-2"></i>

        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- =========================
     NOTIFIKASI ERROR
========================= --}}
@if(session('error'))

    <div class="alert alert-danger alert-dismissible fade show"
         role="alert">

        <i class="bi bi-exclamation-circle me-2"></i>

        {{ session('error') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- =========================
     CARD DATA FASILITAS
========================= --}}
<div class="card border-0 shadow-sm">

    {{-- CARD HEADER --}}
    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="fw-bold mb-1">

                    <i class="bi bi-box-seam text-success me-2"></i>

                    Daftar Fasilitas

                </h5>

                <small class="text-muted">

                    Data fasilitas yang digunakan dalam
                    pengelolaan sampah.

                </small>

            </div>


            {{-- JUMLAH DATA --}}

            <span class="badge bg-success rounded-pill">

                {{ $fasilitas->count() }} Fasilitas

            </span>

        </div>

    </div>


    {{-- CARD BODY --}}
    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                {{-- =========================
                     HEADER TABEL
                ========================== --}}
                <thead class="table-success">

                    <tr>

                        <th style="width: 70px;">
                            No
                        </th>

                        <th>
                            Nama Fasilitas
                        </th>

                        <th style="width: 120px;">
                            Jumlah
                        </th>

                        <th style="width: 160px;">
                            Kondisi
                        </th>

                        <th>
                            Keterangan
                        </th>

                        <th style="width: 150px;">
                            Aksi
                        </th>

                    </tr>

                </thead>


                {{-- =========================
                     ISI TABEL
                ========================== --}}
                <tbody>

                    @forelse($fasilitas as $item)

                        <tr>

                            {{-- NOMOR --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- NAMA FASILITAS --}}
                            <td>

                                <div class="fw-semibold">

                                    {{ $item->nama_fasilitas }}

                                </div>

                            </td>


                            {{-- JUMLAH --}}
                            <td>

                                <span class="badge bg-primary">

                                    {{ $item->jumlah }}

                                </span>

                            </td>


                            {{-- KONDISI --}}
                            <td>

                                @if($item->kondisi == 'Baik')

                                    <span class="badge bg-success">

                                        <i class="bi bi-check-circle me-1"></i>

                                        Baik

                                    </span>

                                @elseif($item->kondisi == 'Rusak Ringan')

                                    <span class="badge bg-warning text-dark">

                                        <i class="bi bi-exclamation-circle me-1"></i>

                                        Rusak Ringan

                                    </span>

                                @elseif($item->kondisi == 'Rusak')

                                    <span class="badge bg-danger">

                                        <i class="bi bi-x-circle me-1"></i>

                                        Rusak

                                    </span>

                                @else

                                    <span class="badge bg-secondary">

                                        {{ $item->kondisi }}

                                    </span>

                                @endif

                            </td>


                            {{-- KETERANGAN --}}
                            <td>

                                @if($item->keterangan)

                                    {{ $item->keterangan }}

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td>

                                {{-- EDIT --}}
                                <a
                                    href="{{ route('fasilitas.edit', $item->id) }}"
                                    class="btn btn-sm btn-warning"
                                    title="Edit Fasilitas">

                                    <i class="bi bi-pencil-square"></i>

                                </a>


                                {{-- HAPUS --}}
                                <form
                                    action="{{ route('fasilitas.destroy', $item->id) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus data fasilitas ini?')">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        title="Hapus Fasilitas">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>


                    @empty

                        {{-- =========================
                             JIKA DATA KOSONG
                        ========================== --}}
                        <tr>

                            <td
                                colspan="6"
                                class="text-center py-5">

                                <div class="mb-3">

                                    <i
                                        class="bi bi-box-seam"
                                        style="font-size: 50px; color: #adb5bd;">
                                    </i>

                                </div>


                                <h6 class="fw-bold">

                                    Belum Ada Data Fasilitas

                                </h6>


                                <p class="text-muted mb-3">

                                    Belum ada fasilitas yang
                                    ditambahkan ke dalam sistem.

                                </p>


                                <a
                                    href="{{ route('fasilitas.create') }}"
                                    class="btn btn-success">

                                    <i class="bi bi-plus-circle me-1"></i>

                                    Tambah Fasilitas

                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- =========================
         CARD FOOTER
    ========================== --}}
    @if($fasilitas->count() > 0)

        <div class="card-footer bg-white text-muted">

            <small>

                <i class="bi bi-info-circle me-1"></i>

                Total {{ $fasilitas->count() }} data fasilitas.

            </small>

        </div>

    @endif

</div>

@endsection