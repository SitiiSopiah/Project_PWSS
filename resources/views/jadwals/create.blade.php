@extends('layouts.app')

@section('title', 'Tambah Jadwal')

@section('content')

<div class="container-fluid p-0">

```
{{-- HEADER --}}
<div class="mb-4">

    <h2 class="fw-bold mb-1">
        Tambah Jadwal Pemungutan
    </h2>

    <p class="text-muted mb-0">
        Tambahkan jadwal pemungutan sampah Kampung Panyalahan.
    </p>

</div>


{{-- CARD FORM --}}
<div class="card shadow-sm border-0">

    <div class="card-body p-4">

        <form
            action="{{ route('jadwals.store') }}"
            method="POST">

            @csrf


            {{-- TANGGAL --}}
            <div class="mb-4">

                <label
                    for="tanggal"
                    class="form-label fw-semibold">

                    Tanggal Pemungutan

                </label>

                <input
                    type="date"
                    name="tanggal"
                    id="tanggal"
                    class="form-control @error('tanggal') is-invalid @enderror"
                    value="{{ old('tanggal') }}"
                    required>

                @error('tanggal')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

                <small class="text-muted">
                    Pemungutan dilakukan setiap hari Minggu.
                </small>

            </div>


            {{-- PETUGAS --}}
            <div class="mb-4">

                <label class="form-label fw-semibold">

                    Petugas Pemungutan

                </label>

                <div class="petugas-container">

                    @forelse($petugas as $data)

                        <div class="petugas-item">

                            <div class="form-check">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="petugas[]"
                                    value="{{ $data->id }}"
                                    id="petugas{{ $data->id }}"
                                    {{ in_array($data->id, old('petugas', [])) ? 'checked' : '' }}>

                                <label
                                    class="form-check-label"
                                    for="petugas{{ $data->id }}">

                                    <span class="petugas-avatar">

                                        <i class="fas fa-user"></i>

                                    </span>

                                    <span>

                                        <strong>
                                            {{ $data->nama }}
                                        </strong>

                                        @if(!empty($data->jabatan))

                                            <small class="text-muted d-block">
                                                {{ $data->jabatan }}
                                            </small>

                                        @endif

                                    </span>

                                </label>

                            </div>

                        </div>

                    @empty

                        <div class="text-center p-4">

                            <i class="fas fa-user-tie fa-2x text-muted mb-2"></i>

                            <p class="text-muted mb-2">
                                Belum ada data petugas.
                            </p>

                            <a
                                href="{{ route('petugas.create') }}"
                                class="btn btn-outline-success btn-sm">

                                <i class="fas fa-plus me-1"></i>

                                Tambah Petugas

                            </a>

                        </div>

                    @endforelse

                </div>

                @error('petugas')

                    <div class="text-danger small mt-2">
                        {{ $message }}
                    </div>

                @enderror

                <small class="text-muted d-block mt-2">
                    Pilih satu atau beberapa petugas yang bertugas pada jadwal ini.
                </small>

            </div>


            {{-- WILAYAH --}}
            <div class="mb-4">

                <label
                    for="wilayah_rt"
                    class="form-label fw-semibold">

                    Wilayah / RT

                </label>

                <select
                    name="wilayah_rt"
                    id="wilayah_rt"
                    class="form-select @error('wilayah_rt') is-invalid @enderror"
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

                @error('wilayah_rt')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- TOMBOL --}}
            <div class="d-flex gap-2">

                <button
                    type="submit"
                    class="btn btn-success px-4">

                    <i class="fas fa-save me-2"></i>

                    Simpan Jadwal

                </button>

                <a
                    href="{{ route('jadwals.index') }}"
                    class="btn btn-secondary px-4">

                    <i class="fas fa-arrow-left me-2"></i>

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>
```

</div>

<style>

.petugas-container {

    border: 1px solid #dee2e6;

    border-radius: 10px;

    padding: 10px;

    background: #fafafa;

    max-height: 300px;

    overflow-y: auto;

}

.petugas-item {

    background: white;

    border: 1px solid #e5e5e5;

    border-radius: 8px;

    padding: 12px 15px;

    margin-bottom: 8px;

    transition: .2s;

}

.petugas-item:last-child {

    margin-bottom: 0;

}

.petugas-item:hover {

    background: #f1f9f3;

    border-color: #198754;

}

.petugas-item .form-check {

    margin: 0;

}

.petugas-item .form-check-label {

    width: 100%;

    display: flex;

    align-items: center;

    gap: 12px;

    cursor: pointer;

}

.petugas-item .form-check-input {

    width: 18px;

    height: 18px;

    cursor: pointer;

}

.petugas-avatar {

    width: 38px;

    height: 38px;

    border-radius: 50%;

    background: #e4f4e8;

    color: #198754;

    display: flex;

    align-items: center;

    justify-content: center;

    flex-shrink: 0;

}

</style>

@endsection
