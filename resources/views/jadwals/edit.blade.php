@extends('layouts.app')

@section('title', 'Edit Jadwal')

@section('content')

<div class="mb-4">
    <h2 class="page-title">Edit Jadwal Pemungutan</h2>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form
            action="{{ route('jadwals.update', $jadwal->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Tanggal</label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control"
                    value="{{ old('tanggal', $jadwal->tanggal->format('Y-m-d')) }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Petugas</label>

                <input
                    type="text"
                    name="petugas"
                    class="form-control"
                    value="{{ old('petugas', $jadwal->petugas) }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="form-label">Wilayah / RT</label>

                <select
                    name="wilayah_rt"
                    class="form-select"
                    required>

                    <option
                        value="RT 01"
                        {{ old('wilayah_rt', $jadwal->wilayah_rt) == 'RT 01' ? 'selected' : '' }}>
                        RT 01
                    </option>

                    <option
                        value="RT 02"
                        {{ old('wilayah_rt', $jadwal->wilayah_rt) == 'RT 02' ? 'selected' : '' }}>
                        RT 02
                    </option>

                </select>
            </div>

            <button type="submit" class="btn btn-success">
                Simpan Perubahan
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