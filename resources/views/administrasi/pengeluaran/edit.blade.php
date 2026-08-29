@extends('layouts.app')

@section('title', 'Edit Pengeluaran')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h1 class="fw-bold">
            Edit Pengeluaran
        </h1>

        <p class="text-muted">
            Perbarui data pengeluaran Kampung Panyalahan
        </p>
    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">
                Form Edit Pengeluaran
            </h4>

            {{-- PESAN ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pengeluarans.update', $pengeluaran->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                {{-- TANGGAL --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        class="form-control"
                        value="{{ old('tanggal', $pengeluaran->tanggal ? \Carbon\Carbon::parse($pengeluaran->tanggal)->format('Y-m-d') : '') }}"
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
                        placeholder="Masukkan jumlah pengeluaran"
                        value="{{ old('jumlah', $pengeluaran->jumlah) }}"
                        min="0"
                        step="0.01"
                        required>

                </div>

                {{-- KETERANGAN --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        class="form-control"
                        rows="4"
                        placeholder="Masukkan keterangan">{{ old('keterangan', $pengeluaran->keterangan) }}</textarea>

                </div>

                {{-- BUTTON --}}
                <div class="d-flex gap-2">

                    <a
                        href="{{ route('administrasi.index') }}"
                        class="btn btn-secondary">

                        <i class="fas fa-arrow-left me-2"></i>
                        Kembali

                    </a>

                    <button
                        type="submit"
                        class="btn btn-danger">

                        <i class="fas fa-save me-2"></i>
                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection