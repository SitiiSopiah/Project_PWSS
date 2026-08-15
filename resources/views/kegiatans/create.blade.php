@extends('layouts.app')

@section('title', 'Tambah Kegiatan')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Tambah Kegiatan
        </h2>

        <p class="text-muted mb-0">
            Tambahkan dokumentasi kegiatan Bank Sampah.
        </p>

    </div>

    <a
        href="{{ route('kegiatans.index') }}"
        class="btn btn-secondary">

        <i class="bi bi-arrow-left me-1"></i>

        Kembali

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

        <li class="breadcrumb-item">

            <a
                href="{{ route('kegiatans.index') }}"
                class="text-decoration-none">

                Data Kegiatan

            </a>

        </li>

        <li class="breadcrumb-item active">

            Tambah Kegiatan

        </li>

    </ol>

</nav>


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

            <i class="bi bi-plus-circle text-success me-2"></i>

            Form Tambah Kegiatan

        </h5>

        <small class="text-muted">

            Isi informasi kegiatan dan upload foto dokumentasi.

        </small>

    </div>


    <div class="card-body">

        <form
            action="{{ route('kegiatans.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf


            {{-- JUDUL --}}
            <div class="mb-4">

                <label
                    for="judul"
                    class="form-label fw-semibold">

                    Judul Kegiatan

                    <span class="text-danger">*</span>

                </label>

                <input
                    type="text"
                    id="judul"
                    name="judul"
                    class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul') }}"
                    placeholder="Contoh: Pemungutan Sampah Warga"
                    required>

                @error('judul')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- TANGGAL --}}
            <div class="mb-4">

                <label
                    for="tanggal"
                    class="form-label fw-semibold">

                    Tanggal

                    <span class="text-danger">*</span>

                </label>

                <input
                    type="date"
                    id="tanggal"
                    name="tanggal"
                    class="form-control @error('tanggal') is-invalid @enderror"
                    value="{{ old('tanggal', date('Y-m-d')) }}"
                    required>

                @error('tanggal')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- FOTO --}}
            <div class="mb-4">

                <label
                    for="foto"
                    class="form-label fw-semibold">

                    Foto Kegiatan

                </label>

                <input
                    type="file"
                    id="foto"
                    name="foto"
                    class="form-control @error('foto') is-invalid @enderror"
                    accept="image/*">

                @error('foto')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

                <div class="form-text">

                    Format: JPG, JPEG, PNG, atau WEBP.
                    Maksimal 2 MB.

                </div>

            </div>


            {{-- KETERANGAN --}}
            <div class="mb-4">

                <label
                    for="keterangan"
                    class="form-label fw-semibold">

                    Keterangan

                </label>

                <textarea
                    id="keterangan"
                    name="keterangan"
                    rows="4"
                    class="form-control @error('keterangan') is-invalid @enderror"
                    placeholder="Masukkan keterangan kegiatan">{{ old('keterangan') }}</textarea>

                @error('keterangan')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <hr class="my-4">


            {{-- BUTTON --}}
            <div class="d-flex justify-content-end gap-2">

                <a
                    href="{{ route('kegiatans.index') }}"
                    class="btn btn-secondary">

                    <i class="bi bi-x-circle me-1"></i>

                    Batal

                </a>

                <button
                    type="submit"
                    class="btn btn-success">

                    <i class="bi bi-save me-1"></i>

                    Simpan Kegiatan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection