@extends('layouts.app')

@section('title', 'Edit Jadwal')

@section('content')

<div class="mb-4">
    <h2 class="page-title">Edit Jadwal Pemungutan</h2>
</div>

<div class="card shadow-sm">

    <div class="card-body">

        {{-- PESAN ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger">

                <strong>Terjadi kesalahan:</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif


        <form
            action="{{ route('jadwals.update', $jadwal->id) }}"
            method="POST">

            @csrf
            @method('PUT')


            {{-- TANGGAL --}}
            <div class="mb-3">

                <label class="form-label">
                    Tanggal
                </label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control"
                    value="{{ old('tanggal', \Carbon\Carbon::parse($jadwal->tanggal)->format('Y-m-d')) }}"
                    required>

            </div>


            {{-- PETUGAS --}}
            <div class="mb-3">

                <label class="form-label">
                    Petugas
                </label>

                <select
                    name="petugas[]"
                    class="form-select @error('petugas') is-invalid @enderror"
                    multiple
                    required
                    style="height: 120px;">

                    @php
                        $selectedPetugas = old(
                            'petugas',
                            $jadwal->petugas->pluck('id')->toArray()
                        );
                    @endphp

                    @foreach($petugas as $p)

                        <option
                            value="{{ $p->id }}"
                            {{ in_array($p->id, $selectedPetugas) ? 'selected' : '' }}>

                            {{ $p->nama }}

                        </option>

                    @endforeach

                </select>

                <small class="text-muted">
                    Tekan Ctrl untuk memilih lebih dari satu petugas.
                </small>

                @error('petugas')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- WILAYAH / RT --}}
            <div class="mb-4">

                <label class="form-label">
                    Wilayah / RT
                </label>

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


            {{-- BUTTON --}}
            <button
                type="submit"
                class="btn btn-success">

                <i class="fas fa-save me-2"></i>
                Simpan Perubahan

            </button>

            <a
                href="{{ route('jadwals.index') }}"
                class="btn btn-secondary">

                <i class="fas fa-arrow-left me-2"></i>
                Kembali

            </a>

        </form>

    </div>

</div>

@endsection