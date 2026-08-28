@extends('layouts.app')

@section('title', 'Jadwal Pemungutan')

@section('content')

<div class="container-fluid p-0">

```
{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Jadwal Pemungutan
        </h2>

        <p class="text-muted mb-0">
            Jadwal pemungutan sampah Kampung Panyalahan.
        </p>

    </div>

    <a href="{{ route('jadwals.create') }}"
       class="btn btn-success">

        <i class="fas fa-plus me-2"></i>

        Tambah Jadwal

    </a>

</div>


{{-- INFORMASI JADWAL --}}
<div class="row g-3 mb-4">

    {{-- HARI --}}
    <div class="col-md-4">

        <div class="info-card">

            <div class="info-icon">

                <i class="fas fa-calendar-day"></i>

            </div>

            <div>

                <small class="text-muted">
                    Hari Pemungutan
                </small>

                <h5 class="fw-bold mb-0">
                    Setiap Hari Minggu
                </h5>

            </div>

        </div>

    </div>


    {{-- WAKTU --}}
    <div class="col-md-4">

        <div class="info-card">

            <div class="info-icon">

                <i class="fas fa-clock"></i>

            </div>

            <div>

                <small class="text-muted">
                    Waktu Pemungutan
                </small>

                <h5 class="fw-bold mb-0">
                    07:00 - 12:00
                </h5>

            </div>

        </div>

    </div>


    {{-- WILAYAH --}}
    <div class="col-md-4">

        <div class="info-card">

            <div class="info-icon">

                <i class="fas fa-map-marker-alt"></i>

            </div>

            <div>

                <small class="text-muted">
                    Wilayah
                </small>

                <h5 class="fw-bold mb-0">
                    RT 01 & RT 02
                </h5>

            </div>

        </div>

    </div>

</div>


{{-- PESAN SUCCESS --}}
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        <i class="fas fa-check-circle me-2"></i>

        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- CARD TABEL --}}
<div class="card border-0 shadow-sm">

    <div class="card-body p-4">


        {{-- HEADER TABEL --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h5 class="fw-bold mb-1">
                    Daftar Jadwal Pemungutan
                </h5>

                <small class="text-muted">
                    Jadwal petugas pemungutan sampah Kampung Panyalahan.
                </small>

            </div>

            <div class="total-jadwal">

                <i class="fas fa-calendar-alt me-1"></i>

                {{ $jadwals->count() }} Jadwal

            </div>

        </div>


        {{-- TABLE --}}
        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead>

                    <tr>

                        <th width="60">
                            No
                        </th>

                        <th width="170">
                            Tanggal
                        </th>

                        <th>
                            Petugas
                        </th>

                        <th width="150">
                            Wilayah / RT
                        </th>

                        <th width="130">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($jadwals as $jadwal)

                    <tr>

                        {{-- NOMOR --}}
                        <td class="text-center">

                            {{ $loop->iteration }}

                        </td>


                        {{-- TANGGAL --}}
                        <td>

                            <div class="tanggal-wrapper">

                                <div class="tanggal-icon">

                                    <i class="fas fa-calendar-alt"></i>

                                </div>

                                <div>

                                    <strong>
                                        {{ $jadwal->tanggal->format('d-m-Y') }}
                                    </strong>

                                    <small class="d-block text-muted">
                                        Pemungutan
                                    </small>

                                </div>

                            </div>

                        </td>


                        {{-- PETUGAS --}}
                        <td>

                            @if($jadwal->petugas->count() > 0)

                                <div class="petugas-list">

                                    @foreach($jadwal->petugas as $petugas)

                                        <div class="petugas-item">

                                            <div class="petugas-icon">

                                                <i class="fas fa-user"></i>

                                            </div>

                                            <div>

                                                <strong>
                                                    {{ $petugas->nama }}
                                                </strong>

                                                @if(!empty($petugas->jabatan))

                                                    <small class="d-block text-muted">
                                                        {{ $petugas->jabatan }}
                                                    </small>

                                                @endif

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            @else

                                <span class="text-muted">
                                    Belum ada petugas
                                </span>

                            @endif

                        </td>


                        {{-- WILAYAH --}}
                        <td>

                            <span class="wilayah-badge">

                                <i class="fas fa-map-marker-alt me-1"></i>

                                {{ $jadwal->wilayah_rt }}

                            </span>

                        </td>


                        {{-- AKSI --}}
                        <td>

                            <div class="d-flex gap-2">

                                {{-- EDIT --}}
                                <a
                                    href="{{ route('jadwals.edit', $jadwal->id) }}"
                                    class="btn btn-warning btn-sm"
                                    title="Edit">

                                    <i class="fas fa-edit"></i>

                                </a>


                                {{-- HAPUS --}}
                                <form
                                    action="{{ route('jadwals.destroy', $jadwal->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        title="Hapus">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>


                    @empty

                    {{-- DATA KOSONG --}}
                    <tr>

                        <td
                            colspan="5"
                            class="text-center py-5">

                            <div class="empty-data">

                                <div class="empty-icon">

                                    <i class="fas fa-calendar-alt"></i>

                                </div>

                                <h5 class="fw-bold mt-3">

                                    Belum Ada Jadwal

                                </h5>

                                <p class="text-muted">

                                    Silakan tambahkan jadwal pemungutan terlebih dahulu.

                                </p>

                                <a
                                    href="{{ route('jadwals.create') }}"
                                    class="btn btn-success">

                                    <i class="fas fa-plus me-1"></i>

                                    Tambah Jadwal

                                </a>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
```

</div>

<style>

/* =========================
   INFO CARD
========================= */

.info-card {

    background: white;

    border-radius: 12px;

    padding: 18px;

    display: flex;

    align-items: center;

    gap: 15px;

    border: 1px solid #e8e8e8;

    box-shadow: 0 2px 8px rgba(0,0,0,.04);

    height: 100%;

}

.info-icon {

    width: 48px;

    height: 48px;

    border-radius: 10px;

    background: #e1f3e7;

    color: #188c20;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 20px;

    flex-shrink: 0;

}


/* =========================
   TOTAL JADWAL
========================= */

.total-jadwal {

    color: #198754;

    background: #e8f6ec;

    padding: 8px 14px;

    border-radius: 8px;

    font-size: 14px;

    font-weight: 600;

}


/* =========================
   TABLE
========================= */

.table {

    margin-bottom: 0;

}

.table thead th {

    background: #d8eee5;

    color: #17202a;

    font-weight: 600;

    white-space: nowrap;

    padding: 14px 12px;

}

.table tbody td {

    padding: 14px 12px;

}

.table tbody tr {

    transition: .2s;

}

.table tbody tr:hover {

    background: #f7fcf8;

}


/* =========================
   TANGGAL
========================= */

.tanggal-wrapper {

    display: flex;

    align-items: center;

    gap: 10px;

}

.tanggal-icon {

    width: 38px;

    height: 38px;

    border-radius: 8px;

    background: #e1f3e7;

    color: #188c20;

    display: flex;

    align-items: center;

    justify-content: center;

}


/* =========================
   PETUGAS
========================= */

.petugas-list {

    display: flex;

    flex-direction: column;

    gap: 7px;

}

.petugas-item {

    display: flex;

    align-items: center;

    gap: 9px;

}

.petugas-icon {

    width: 34px;

    height: 34px;

    border-radius: 50%;

    background: #e1f3e7;

    color: #188c20;

    display: flex;

    align-items: center;

    justify-content: center;

    flex-shrink: 0;

    font-size: 14px;

}


/* =========================
   WILAYAH
========================= */

.wilayah-badge {

    display: inline-block;

    background: #e1f3e7;

    color: #188c20;

    padding: 7px 11px;

    border-radius: 7px;

    font-size: 13px;

    font-weight: 600;

}


/* =========================
   EMPTY DATA
========================= */

.empty-data {

    padding: 20px;

}

.empty-icon {

    width: 70px;

    height: 70px;

    margin: auto;

    border-radius: 50%;

    background: #e1f3e7;

    color: #188c20;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 28px;

}


/* =========================
   BUTTON
========================= */

.btn {

    border-radius: 7px;

}

</style>

@endsection
