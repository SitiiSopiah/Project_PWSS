@extends('layouts.app')

@section('title', 'Tambah Jadwal')

@section('content')

<div class="mb-4">
    <h2 class="page-title">Tambah Jadwal Pemungutan</h2>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('jadwals.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">Tanggal</label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control"
                    value="{{ old('tanggal') }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Petugas</label>

                <input
                    type="text"
                    name="petugas"
                    class="form-control"
                    value="{{ old('petugas') }}"
                    placeholder="Contoh: Andi, Budi, Dani"
                    required>

                <small class="text-muted">
                    Masukkan nama petugas yang bertugas.
                </small>
            </div>

            <div class="mb-4">
                <label class="form-label">Wilayah / RT</label>

                <select
                    name="wilayah_rt"
                    class="form-select"
                    required>

                    <option value="">-- Pilih Wilayah --</option>
                    <option value="RT 01">RT 01</option>
                    <option value="RT 02">RT 02</option>

                </select>
            </div>

            <button type="submit" class="btn btn-success">
                Simpan
            </button>

            <a
                href="{{ route('jadwals.index') }}"
                class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection