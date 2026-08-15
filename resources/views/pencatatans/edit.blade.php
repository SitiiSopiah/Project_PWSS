@extends('layouts.app')

@section('title', 'Edit Pencatatan')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Edit Pencatatan
        </h2>

        <p class="text-muted mb-0">
            Perbarui data hasil pencatatan pemungutan sampah.
        </p>

    </div>

    <a
        href="{{ route('pencatatans.index') }}"
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
                href="{{ route('pencatatans.index') }}"
                class="text-decoration-none">

                Data Pencatatan

            </a>

        </li>

        <li
            class="breadcrumb-item active"
            aria-current="page">

            Edit Pencatatan

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

            <i class="bi bi-pencil-square text-warning me-2"></i>

            Form Edit Pencatatan

        </h5>

        <small class="text-muted">

            Perbarui informasi pencatatan yang dipilih.

        </small>

    </div>


    <div class="card-body">

        <form
            action="{{ route('pencatatans.update', $pencatatan->id) }}"
            method="POST">

            @csrf

            @method('PUT')


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
                    value="{{ old('tanggal', $pencatatan->tanggal->format('Y-m-d')) }}"
                    required>

                @error('tanggal')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- WILAYAH --}}
            <div class="mb-4">

                <label
                    for="wilayah_rt"
                    class="form-label fw-semibold">

                    Wilayah / RT

                    <span class="text-danger">*</span>

                </label>

                <select
                    id="wilayah_rt"
                    name="wilayah_rt"
                    class="form-select @error('wilayah_rt') is-invalid @enderror"
                    required>

                    <option value="">
                        -- Pilih Wilayah --
                    </option>

                    <option
                        value="RT 01"
                        {{ old('wilayah_rt', $pencatatan->wilayah_rt) == 'RT 01' ? 'selected' : '' }}>

                        RT 01

                    </option>

                    <option
                        value="RT 02"
                        {{ old('wilayah_rt', $pencatatan->wilayah_rt) == 'RT 02' ? 'selected' : '' }}>

                        RT 02

                    </option>

                </select>

                @error('wilayah_rt')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- JUMLAH KARUNG --}}
            <div class="mb-4">

                <label
                    for="jumlah_karung"
                    class="form-label fw-semibold">

                    Jumlah Karung

                    <span class="text-danger">*</span>

                </label>

                <input
                    type="number"
                    id="jumlah_karung"
                    name="jumlah_karung"
                    class="form-control @error('jumlah_karung') is-invalid @enderror"
                    value="{{ old('jumlah_karung', $pencatatan->jumlah_karung) }}"
                    min="0"
                    required>

                @error('jumlah_karung')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- TOTAL PEMASUKAN --}}
            <div class="mb-4">

                <label
                    for="total_pemasukan"
                    class="form-label fw-semibold">

                    Total Pemasukan

                    <span class="text-danger">*</span>

                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        Rp
                    </span>

                    <input
                        type="number"
                        id="total_pemasukan"
                        name="total_pemasukan"
                        class="form-control @error('total_pemasukan') is-invalid @enderror"
                        value="{{ old('total_pemasukan', $pencatatan->total_pemasukan) }}"
                        min="0"
                        required>

                </div>

                @error('total_pemasukan')

                    <div class="text-danger small mt-1">
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
                    placeholder="Masukkan keterangan">{{ old('keterangan', $pencatatan->keterangan) }}</textarea>

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
                    href="{{ route('pencatatans.index') }}"
                    class="btn btn-secondary">

                    <i class="bi bi-x-circle me-1"></i>

                    Batal

                </a>

                <button
                    type="submit"
                    class="btn btn-success">

                    <i class="bi bi-save me-1"></i>

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection