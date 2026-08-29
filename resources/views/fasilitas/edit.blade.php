@extends('layouts.app')

@section('title', 'Edit Fasilitas')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            Edit Fasilitas
        </h2>

        <p class="text-muted mb-0">
            Perbarui data fasilitas Bank Sampah Kampung Panyalahan.
        </p>
    </div>

    <a
        href="{{ route('fasilitas.index') }}"
        class="btn btn-secondary">

        <i class="bi bi-arrow-left me-1"></i>
        Kembali

    </a>

</div>


{{-- BREADCRUMB --}}
<div class="mb-4">

    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">

            <li class="breadcrumb-item">

                <a
                    href="{{ route('jadwals.index') }}"
                    class="text-decoration-none">

                    Dashboard

                </a>

            </li>

            <li class="breadcrumb-item">

                <a
                    href="{{ route('fasilitas.index') }}"
                    class="text-decoration-none">

                    Data Fasilitas

                </a>

            </li>

            <li
                class="breadcrumb-item active"
                aria-current="page">

                Edit Fasilitas

            </li>

        </ol>

    </nav>

</div>


{{-- ERROR --}}
@if($errors->any())

    <div class="alert alert-danger">

        <div class="fw-bold mb-2">

            <i class="bi bi-exclamation-triangle me-1"></i>

            Terjadi kesalahan:

        </div>

        <ul class="mb-0">

            @foreach($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif


{{-- FORM --}}
<div class="card border-0 shadow-sm">

    <div class="card-header bg-white py-3">

        <h5 class="fw-bold mb-1">

            <i class="bi bi-pencil-square text-warning me-2"></i>

            Form Edit Fasilitas

        </h5>

        <small class="text-muted">

            Perbarui informasi fasilitas yang dipilih.

        </small>

    </div>


    <div class="card-body">

        <form action="{{ route('fasilitas.update', ['fasilitas' => $fasilitas->id]) }}"
            method="POST">

            @csrf
            @method('PUT')

            {{-- NAMA FASILITAS --}}
            <div class="mb-3">
    <label class="form-label fw-semibold">
        Nama Fasilitas
    </label>

    <input
        type="text"
        name="nama_fasilitas"
        class="form-control"
        placeholder="Masukkan nama fasilitas"
        value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas) }}"
        required>
</div>

            {{-- JUMLAH --}}
            <div class="mb-3">
    <label class="form-label fw-semibold">
        Jumlah
    </label>

    <input
        type="number"
        name="jumlah"
        class="form-control"
        value="{{ old('jumlah', $fasilitas->jumlah) }}"
        min="1"
        required>
</div>

            {{-- KONDISI --}}
            <div class="mb-3">
    <label class="form-label fw-semibold">
        Kondisi
    </label>

    <select name="kondisi" class="form-select" required>

        <option value="Baik"
            {{ old('kondisi', $fasilitas->kondisi) == 'Baik' ? 'selected' : '' }}>
            Baik
        </option>

        <option value="Rusak Ringan"
            {{ old('kondisi', $fasilitas->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>
            Rusak Ringan
        </option>

        <option value="Rusak Berat"
            {{ old('kondisi', $fasilitas->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>
            Rusak Berat
        </option>

    </select>
</div>

            {{-- KETERANGAN --}}
            <div class="mb-4">
    <label class="form-label fw-semibold">
        Keterangan
    </label>

    <textarea
        name="keterangan"
        class="form-control"
        rows="4">{{ old('keterangan', $fasilitas->keterangan) }}</textarea>
</div>

            {{-- BUTTON --}}
            <div class="d-flex gap-2">

                <a href="{{ route('fasilitas.index') }}"
                class="btn btn-secondary">

                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali

                </a>

                <button type="submit"
                        class="btn btn-success">

                    <i class="fas fa-save me-2"></i>
                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection