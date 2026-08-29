@extends('layouts.app')

@section('title', 'Tambah Data Petugas')

@section('content')

<div class="container-fluid p-0">

    {{-- HEADER --}}
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Tambah Data Petugas
        </h2>

        <p class="text-muted mb-0">
            Tambahkan petugas pengelolaan sampah Kampung Panyalahan.
        </p>

    </div>


    {{-- CARD FORM --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            {{-- JUDUL FORM --}}
            <div class="d-flex align-items-center mb-4">

                <div class="form-icon me-3">

                    <i class="fas fa-user-plus"></i>

                </div>

                <div>

                    <h4 class="fw-bold mb-1">
                        Form Data Petugas
                    </h4>

                    <small class="text-muted">
                        Isi data petugas dengan lengkap.
                    </small>

                </div>

            </div>


            {{-- ERROR VALIDASI --}}
            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        <i class="fas fa-exclamation-circle me-1"></i>
                        Terdapat kesalahan:
                    </strong>

                    <ul class="mb-0 mt-2">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- FORM --}}
            <form action="{{ route('petugas.store') }}"
                  method="POST">

                @csrf


                {{-- NAMA PETUGAS --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Nama Petugas
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">

                            <i class="fas fa-user"></i>

                        </span>

                        <input
                            type="text"
                            name="nama"
                            class="form-control"
                            placeholder="Masukkan nama petugas"
                            value="{{ old('nama') }}"
                            required>

                    </div>

                </div>


                {{-- NO HP --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        No. HP
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">

                            <i class="fas fa-phone"></i>

                        </span>

                        <input
                            type="text"
                            name="no_hp"
                            class="form-control"
                            placeholder="Contoh: 081234567890"
                            value="{{ old('no_hp') }}">

                    </div>

                </div>


                {{-- WILAYAH RT --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Wilayah / RT
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">

                            <i class="fas fa-map-marker-alt"></i>

                        </span>

                        <select
                            name="wilayah_rt"
                            class="form-select"
                            required>

                            <option value="">
                                -- Pilih Wilayah --
                            </option>

                            <option
                                value="RT 01"
                                {{ old('wilayah_rt') == 'RT 01' ? 'selected' : '' }}>

                                RT 01

                            </option>

                            <option
                                value="RT 02"
                                {{ old('wilayah_rt') == 'RT 02' ? 'selected' : '' }}>

                                RT 02

                            </option>

                        </select>

                    </div>

                </div>


                {{-- STATUS --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">

                            <i class="fas fa-toggle-on"></i>

                        </span>

                        <select
                            name="status"
                            class="form-select"
                            required>

                            <option value="">
                                -- Pilih Status --
                            </option>

                            <option
                                value="Aktif"
                                {{ old('status', 'Aktif') == 'Aktif' ? 'selected' : '' }}>

                                Aktif

                            </option>

                            <option
                                value="Tidak Aktif"
                                {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>

                                Tidak Aktif

                            </option>

                        </select>

                    </div>

                </div>


                {{-- BUTTON --}}
                <div class="d-flex gap-2">

                    <a
                        href="{{ route('petugas.index') }}"
                        class="btn btn-secondary">

                        <i class="fas fa-arrow-left me-2"></i>

                        Kembali

                    </a>


                    <button
                        type="submit"
                        class="btn btn-success px-4">

                        <i class="fas fa-save me-2"></i>

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<style>

/* ICON FORM */
.form-icon {

    width: 48px;
    height: 48px;

    background: #e1f3e7;

    color: #188c20;

    border-radius: 12px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 20px;

}


/* INPUT ICON */
.input-group-text {

    background: #f5f8f6;

    border-color: #dee2e6;

    color: #188c20;

    width: 45px;

    justify-content: center;

}


/* INPUT */
.form-control,
.form-select {

    min-height: 45px;

}


/* FOCUS */
.form-control:focus,
.form-select:focus {

    border-color: #188c20;

    box-shadow: 0 0 0 0.2rem rgba(24, 140, 32, 0.12);

}


/* BUTTON */
.btn-success {

    background-color: #188c20;

    border-color: #188c20;

}


.btn-success:hover {

    background-color: #126b18;

    border-color: #126b18;

}

</style>

@endsection