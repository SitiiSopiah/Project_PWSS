@extends('layouts.app')

@section('title', 'Data Kegiatan')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Data Kegiatan
        </h2>

        <p class="text-muted mb-0">
            Kelola dokumentasi kegiatan Bank Sampah Kampung Panyalahan.
        </p>

    </div>

    <a
        href="{{ route('kegiatans.create') }}"
        class="btn btn-success">

        <i class="bi bi-plus-circle me-1"></i>

        Tambah Kegiatan

    </a>

</div>


{{-- BREADCRUMB --}}
<nav aria-label="breadcrumb" class="mb-4">

    <ol class="breadcrumb">

        <li class="breadcrumb-item">

            <a
                href="{{ route('jadwals.index') }}"
                class="text-decoration-none">

                Dashboard

            </a>

        </li>

        <li
            class="breadcrumb-item active"
            aria-current="page">

            Data Kegiatan

        </li>

    </ol>

</nav>


{{-- SUCCESS --}}
@if(session('success'))

    <div
        class="alert alert-success alert-dismissible fade show"
        role="alert">

        <i class="bi bi-check-circle me-2"></i>

        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- CARD --}}
<div class="card border-0 shadow-sm">

    {{-- CARD HEADER --}}
    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="fw-bold mb-1">

                    <i class="bi bi-images text-success me-2"></i>

                    Daftar Kegiatan

                </h5>

                <small class="text-muted">

                    Dokumentasi kegiatan Bank Sampah.

                </small>

            </div>

            <span class="badge bg-success rounded-pill">

                {{ $kegiatans->count() }} Kegiatan

            </span>

        </div>

    </div>


    {{-- BODY --}}
    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-success">

                    <tr>

                        <th style="width: 60px;">
                            No
                        </th>

                        <th style="width: 120px;">
                            Foto
                        </th>

                        <th>
                            Judul
                        </th>

                        <th style="width: 130px;">
                            Tanggal
                        </th>

                        <th>
                            Keterangan
                        </th>

                        <th style="width: 140px;">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($kegiatans as $kegiatan)

                        <tr>

                            {{-- NO --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- FOTO --}}
                            <td>

                                @if($kegiatan->foto)

                                    <img
                                        src="{{ asset('storage/' . $kegiatan->foto) }}"
                                        alt="{{ $kegiatan->judul }}"
                                        width="90"
                                        height="65"
                                        class="rounded"
                                        style="object-fit: cover;">

                                @else

                                    <div
                                        class="bg-light rounded d-flex align-items-center justify-content-center"
                                        style="width: 90px; height: 65px;">

                                        <i
                                            class="bi bi-image text-muted"
                                            style="font-size: 25px;">
                                        </i>

                                    </div>

                                @endif

                            </td>


                            {{-- JUDUL --}}
                            <td>

                                <span class="fw-semibold">

                                    {{ $kegiatan->judul }}

                                </span>

                            </td>


                            {{-- TANGGAL --}}
                            <td>

                                {{ $kegiatan->tanggal->format('d-m-Y') }}

                            </td>


                            {{-- KETERANGAN --}}
                            <td>

                                @if($kegiatan->keterangan)

                                    {{ $kegiatan->keterangan }}

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
                                    href="{{ route('kegiatans.edit', $kegiatan->id) }}"
                                    class="btn btn-sm btn-warning"
                                    title="Edit">

                                    <i class="bi bi-pencil-square"></i>

                                </a>


                                {{-- HAPUS --}}
                                <form
                                    action="{{ route('kegiatans.destroy', $kegiatan->id) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        title="Hapus">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="text-center py-5">

                                <i
                                    class="bi bi-images"
                                    style="font-size: 50px; color: #adb5bd;">
                                </i>

                                <h6 class="fw-bold mt-3">

                                    Belum Ada Data Kegiatan

                                </h6>

                                <p class="text-muted">

                                    Silakan tambahkan dokumentasi kegiatan.

                                </p>

                                <a
                                    href="{{ route('kegiatans.create') }}"
                                    class="btn btn-success">

                                    <i class="bi bi-plus-circle me-1"></i>

                                    Tambah Kegiatan

                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection