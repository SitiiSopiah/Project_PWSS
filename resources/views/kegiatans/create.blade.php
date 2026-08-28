@extends('layouts.app')

@section('title', 'Tambah Kegiatan')

@section('content')

<div class="container-fluid p-0">

    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Tambah Kegiatan
        </h2>

        <p class="text-muted">
            Tambahkan dokumentasi kegiatan Kampung Panyalahan.
        </p>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('kegiatans.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                {{-- JUDUL --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Judul Kegiatan
                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul') }}"
                        placeholder="Contoh: Kegiatan Pemungutan Sampah"
                        required>

                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- TANGGAL --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Tanggal Kegiatan
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        class="form-control @error('tanggal') is-invalid @enderror"
                        value="{{ old('tanggal') }}"
                        required>

                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- FOTO --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Foto Kegiatan
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="form-control @error('foto') is-invalid @enderror"
                        accept="image/*"
                        required>

                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <small class="text-muted">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </small>

                </div>


                {{-- KETERANGAN --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        rows="4"
                        class="form-control"
                        placeholder="Tuliskan keterangan kegiatan...">{{ old('keterangan') }}</textarea>

                </div>


                {{-- BUTTON --}}
                <div class="d-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-success">

                        <i class="fas fa-save me-2"></i>

                        Simpan Kegiatan

                    </button>

                    <a
                        href="{{ route('kegiatans.index') }}"
                        class="btn btn-secondary">

                        <i class="fas fa-arrow-left me-2"></i>

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection