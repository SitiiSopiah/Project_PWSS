@extends('layouts.app')

@section('title', 'Tambah Pemasukan')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h1 class="fw-bold">
            Tambah Pemasukan
        </h1>

        <p class="text-muted">
            Tambahkan data pemasukan
        </p>
    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('pemasukans.store') }}"
                  method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Tanggal
                    </label>

                    <input type="date"
                           name="tanggal"
                           class="form-control"
                           value="{{ old('tanggal') }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Jumlah
                    </label>

                    <input type="number"
                           name="jumlah"
                           class="form-control"
                           placeholder="Masukkan jumlah"
                           value="{{ old('jumlah') }}"
                           required>
                </div>

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Keterangan
                    </label>

                    <textarea name="keterangan"
                              class="form-control"
                              rows="4"
                              placeholder="Masukkan keterangan">{{ old('keterangan') }}</textarea>

                </div>

                <a href="{{ route('administrasi.index') }}"
                   class="btn btn-secondary">

                    Kembali

                </a>

                <button type="submit"
                        class="btn btn-success">

                    <i class="fas fa-save me-2"></i>
                    Simpan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection