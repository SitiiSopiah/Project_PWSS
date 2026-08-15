@extends('layouts.app')

@section('title', 'Tambah Fasilitas')

@section('content')

{{-- HEADER ATAS --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Tambah Fasilitas
        </h2>

        <p class="text-muted mb-0">
            Tambahkan data fasilitas Bank Sampah Kampung Panyalahan.
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

                Tambah Fasilitas

            </li>

        </ol>

    </nav>

</div>


{{-- VALIDATION ERROR --}}
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


{{-- FORM CARD --}}
<div class="card border-0 shadow-sm">

    {{-- CARD HEADER --}}
    <div class="card-header bg-white py-3">

        <h5 class="fw-bold mb-1">

            <i class="bi bi-plus-circle text-success me-2"></i>

            Form Tambah Fasilitas

        </h5>

        <small class="text-muted">

            Isi data fasilitas dengan lengkap dan benar.

        </small>

    </div>


    {{-- CARD BODY --}}
    <div class="card-body">

        <form
            action="{{ route('fasilitas.store') }}"
            method="POST">

            @csrf


            {{-- NAMA FASILITAS --}}
            <div class="mb-4">

                <label
                    for="nama_fasilitas"
                    class="form-label fw-semibold">

                    Nama Fasilitas

                    <span class="text-danger">
                        *
                    </span>

                </label>

                <input
                    type="text"
                    id="nama_fasilitas"
                    name="nama_fasilitas"
                    class="form-control @error('nama_fasilitas') is-invalid @enderror"
                    value="{{ old('nama_fasilitas') }}"
                    placeholder="Contoh: Tempat Sampah"
                    required>

                @error('nama_fasilitas')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- JUMLAH --}}
            <div class="mb-4">

                <label
                    for="jumlah"
                    class="form-label fw-semibold">

                    Jumlah

                    <span class="text-danger">
                        *
                    </span>

                </label>

                <input
                    type="number"
                    id="jumlah"
                    name="jumlah"
                    class="form-control @error('jumlah') is-invalid @enderror"
                    value="{{ old('jumlah') }}"
                    min="0"
                    placeholder="Contoh: 10"
                    required>

                @error('jumlah')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

                <div class="form-text">

                    Masukkan jumlah fasilitas yang tersedia.

                </div>

            </div>


            {{-- KONDISI --}}
            <div class="mb-4">

                <label
                    for="kondisi"
                    class="form-label fw-semibold">

                    Kondisi

                    <span class="text-danger">
                        *
                    </span>

                </label>

                <select
                    id="kondisi"
                    name="kondisi"
                    class="form-select @error('kondisi') is-invalid @enderror"
                    required>

                    <option value="">
                        -- Pilih Kondisi --
                    </option>

                    <option
                        value="Baik"
                        {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>

                        Baik

                    </option>

                    <option
                        value="Rusak Ringan"
                        {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>

                        Rusak Ringan

                    </option>

                    <option
                        value="Rusak"
                        {{ old('kondisi') == 'Rusak' ? 'selected' : '' }}>

                        Rusak

                    </option>

                </select>

                @error('kondisi')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

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
                    placeholder="Contoh: Digunakan untuk menampung sampah warga">{{ old('keterangan') }}</textarea>

                @error('keterangan')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

                <div class="form-text">

                    Keterangan bersifat opsional.

                </div>

            </div>


            {{-- GARIS --}}
            <hr class="my-4">


            {{-- BUTTON --}}
            <div class="d-flex justify-content-end gap-2">

                <a
                    href="{{ route('fasilitas.index') }}"
                    class="btn btn-secondary">

                    <i class="bi bi-x-circle me-1"></i>

                    Batal

                </a>


                <button
                    type="submit"
                    class="btn btn-success">

                    <i class="bi bi-save me-1"></i>

                    Simpan Fasilitas

                </button>

            </div>

        </form>

    </div>

</div>

@endsection