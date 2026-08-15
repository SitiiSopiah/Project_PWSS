@extends('layouts.app')

@section('title', 'Edit Pemasukan')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="page-title mb-1">
            Edit Pemasukan
        </h2>

        <p class="text-muted mb-0">
            Perbarui data pemasukan bank sampah.
        </p>
    </div>

    <a
        href="{{ route('pemasukans.index') }}"
        class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>
        Kembali

    </a>

</div>


<div class="card shadow-sm">

    <div class="card-body">

        <form
            action="{{ route('pemasukans.update', $pemasukan->id) }}"
            method="POST">

            @csrf

            @method('PUT')


            {{-- TANGGAL --}}

            <div class="mb-3">

                <label
                    for="tanggal"
                    class="form-label">

                    Tanggal

                </label>

                <input
                    type="date"
                    id="tanggal"
                    name="tanggal"
                    class="form-control @error('tanggal') is-invalid @enderror"
                    value="{{ old('tanggal', $pemasukan->tanggal->format('Y-m-d')) }}"
                    required>

                @error('tanggal')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- JUMLAH --}}

            <div class="mb-3">

                <label
                    for="jumlah"
                    class="form-label">

                    Jumlah

                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        Rp
                    </span>

                    <input
                        type="number"
                        id="jumlah"
                        name="jumlah"
                        class="form-control @error('jumlah') is-invalid @enderror"
                        value="{{ old('jumlah', $pemasukan->jumlah) }}"
                        min="0"
                        required>

                </div>

                @error('jumlah')

                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- KETERANGAN --}}

            <div class="mb-4">

                <label
                    for="keterangan"
                    class="form-label">

                    Keterangan

                </label>

                <textarea
                    id="keterangan"
                    name="keterangan"
                    rows="4"
                    class="form-control @error('keterangan') is-invalid @enderror"
                    placeholder="Contoh: Pembayaran sampah warga RT 01">{{ old('keterangan', $pemasukan->keterangan) }}</textarea>

                @error('keterangan')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- BUTTON --}}

            <button
                type="submit"
                class="btn btn-success">

                <i class="bi bi-save"></i>
                Simpan Perubahan

            </button>

            <a
                href="{{ route('pemasukans.index') }}"
                class="btn btn-secondary">

                Batal

            </a>

        </form>

    </div>

</div>

@endsection