@extends('layouts.app')

@section('title', 'Data Pencatatan')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Data Pencatatan
        </h2>

        <p class="text-muted mb-0">
            Kelola hasil pencatatan pemungutan sampah
            Bank Sampah Kampung Panyalahan.
        </p>

    </div>

    <a
        href="{{ route('pencatatans.create') }}"
        class="btn btn-success">

        <i class="bi bi-plus-circle me-1"></i>

        Tambah Pencatatan

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

            Data Pencatatan

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

                    <i class="bi bi-clipboard-data text-success me-2"></i>

                    Daftar Pencatatan

                </h5>

                <small class="text-muted">

                    Data hasil pemungutan sampah dari warga.

                </small>

            </div>

            <span class="badge bg-success rounded-pill">

                {{ $pencatatans->count() }} Data

            </span>

        </div>

    </div>


    {{-- TABLE --}}
    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-success">

                    <tr>

                        <th style="width: 60px;">
                            No
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Wilayah / RT
                        </th>

                        <th>
                            Jumlah Karung
                        </th>

                        <th>
                            Total Pemasukan
                        </th>

                        <th>
                            Pengelola
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

                    @forelse($pencatatans as $pencatatan)

                        <tr>

                            {{-- NO --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- TANGGAL --}}
                            <td>

                                {{ $pencatatan->tanggal->format('d-m-Y') }}

                            </td>


                            {{-- WILAYAH --}}
                            <td>

                                <span class="badge bg-info text-dark">

                                    {{ $pencatatan->wilayah_rt }}

                                </span>

                            </td>


                            {{-- JUMLAH KARUNG --}}
                            <td>

                                <span class="fw-semibold">

                                    {{ $pencatatan->jumlah_karung }}

                                </span>

                                karung

                            </td>


                            {{-- TOTAL PEMASUKAN --}}
                            <td>

                                <span class="fw-semibold text-success">

                                    Rp
                                    {{ number_format($pencatatan->total_pemasukan, 0, ',', '.') }}

                                </span>

                            </td>


                            {{-- USER --}}
                            <td>

                                @if($pencatatan->user)

                                    {{ $pencatatan->user->name }}

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- KETERANGAN --}}
                            <td>

                                {{ $pencatatan->keterangan ?? '-' }}

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <a
                                    href="{{ route('pencatatans.edit', $pencatatan->id) }}"
                                    class="btn btn-sm btn-warning"
                                    title="Edit">

                                    <i class="bi bi-pencil-square"></i>

                                </a>


                                <form
                                    action="{{ route('pencatatans.destroy', $pencatatan->id) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus data pencatatan ini?')">

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
                                colspan="8"
                                class="text-center py-5">

                                <i
                                    class="bi bi-clipboard-x"
                                    style="font-size: 50px; color: #adb5bd;">
                                </i>

                                <h6 class="fw-bold mt-3">

                                    Belum Ada Data Pencatatan

                                </h6>

                                <p class="text-muted">

                                    Silakan tambahkan data pencatatan.

                                </p>

                                <a
                                    href="{{ route('pencatatans.create') }}"
                                    class="btn btn-success">

                                    <i class="bi bi-plus-circle me-1"></i>

                                    Tambah Pencatatan

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