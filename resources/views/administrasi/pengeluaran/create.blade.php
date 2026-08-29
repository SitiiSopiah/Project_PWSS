@extends('layouts.app')

@section('title', 'Tambah Pengeluaran')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">

        <h1 class="fw-bold mb-1">
            Tambah Pengeluaran
        </h1>

        <p class="text-muted mb-0">
            Tambahkan data pengeluaran Kampung Panyalahan.
        </p>

    </div>


    {{-- CARD FORM --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">
                Form Data Pengeluaran
            </h4>


            {{-- ERROR VALIDASI --}}
            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        Data belum dapat disimpan.
                    </strong>

                    <ul class="mb-0 mt-2">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form action="{{ route('pengeluarans.store') }}"
                  method="POST">

                @csrf


                {{-- TANGGAL --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        class="form-control"
                        value="{{ old('tanggal') }}"
                        required>

                </div>


                {{-- JUMLAH --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Jumlah Pengeluaran
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            Rp
                        </span>

                        <input
                            type="number"
                            name="jumlah"
                            class="form-control"
                            placeholder="Masukkan jumlah pengeluaran"
                            value="{{ old('jumlah') }}"
                            min="0"
                            required>

                    </div>

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
                        placeholder="Contoh: Pembelian alat kebersihan">{{ old('keterangan') }}</textarea>

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
                        class="btn btn-danger px-4">

                        <i class="fas fa-save me-2"></i>

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection