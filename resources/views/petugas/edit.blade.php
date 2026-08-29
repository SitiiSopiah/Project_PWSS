@extends('layouts.app')

@section('title', 'Edit Petugas')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">

        <h1 class="fw-bold">
            Edit Petugas
        </h1>

        <p class="text-muted">
            Perbarui data petugas Kampung Panyalahan.
        </p>

    </div>


    {{-- CARD --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">
                Form Edit Petugas
            </h4>


            {{-- PESAN ERROR --}}
            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>Terjadi kesalahan:</strong>

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
            <form
                action="{{ route('petugas.update', $petugas->id) }}"
                method="POST">

                @csrf
                @method('PUT')


                {{-- NAMA --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Nama Petugas
                    </label>

                    <input
                        type="text"
                        name="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama', $petugas->nama) }}"
                        placeholder="Masukkan nama petugas"
                        required>

                    @error('nama')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- NO HP --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        No. HP
                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        class="form-control @error('no_hp') is-invalid @enderror"
                        value="{{ old('no_hp', $petugas->no_hp) }}"
                        placeholder="Masukkan nomor HP">

                    @error('no_hp')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- WILAYAH RT --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Wilayah RT
                    </label>

                    <select
                        name="wilayah_rt"
                        class="form-select @error('wilayah_rt') is-invalid @enderror"
                        required>

                        <option value="">
                            -- Pilih Wilayah RT --
                        </option>

                        <option
                            value="RT 01"
                            {{ old('wilayah_rt', $petugas->wilayah_rt) == 'RT 01' ? 'selected' : '' }}>

                            RT 01

                        </option>

                        <option
                            value="RT 02"
                            {{ old('wilayah_rt', $petugas->wilayah_rt) == 'RT 02' ? 'selected' : '' }}>

                            RT 02

                        </option>

                    </select>


                    @error('wilayah_rt')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- STATUS --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select @error('status') is-invalid @enderror"
                        required>

                        <option value="">
                            -- Pilih Status --
                        </option>

                        <option
                            value="Aktif"
                            {{ old('status', $petugas->status) == 'Aktif' ? 'selected' : '' }}>

                            Aktif

                        </option>

                        <option
                            value="Tidak Aktif"
                            {{ old('status', $petugas->status) == 'Tidak Aktif' ? 'selected' : '' }}>

                            Tidak Aktif

                        </option>

                    </select>


                    @error('status')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

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
                        class="btn btn-success">

                        <i class="fas fa-save me-2"></i>

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection