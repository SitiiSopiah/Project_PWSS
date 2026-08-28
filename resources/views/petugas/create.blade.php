@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h1 class="fw-bold mb-1">
            Tambah Data Petugas
        </h1>

        <p class="text-muted">
            Tambahkan petugas pengelolaan sampah Kampung Panyalahan
        </p>

    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">
                Form Data Petugas
            </h4>

            <form action="{{ route('petugas.store') }}"
                  method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Nama Petugas
                    </label>

                    <input type="text"
                           name="nama"
                           class="form-control"
                           placeholder="Masukkan nama petugas"
                           value="{{ old('nama') }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        No. HP
                    </label>

                    <input type="text"
                           name="no_hp"
                           class="form-control"
                           placeholder="Contoh: 081234567890"
                           value="{{ old('no_hp') }}">

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Wilayah / RT
                    </label>

                    <select name="wilayah_rt"
                            class="form-select"
                            required>

                        <option value="">
                            -- Pilih RT --
                        </option>

                        <option value="RT 01">
                            RT 01
                        </option>

                        <option value="RT 02">
                            RT 02
                        </option>

                    </select>

                </div>

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select name="status"
                            class="form-select"
                            required>

                        <option value="Aktif">
                            Aktif
                        </option>

                        <option value="Tidak Aktif">
                            Tidak Aktif
                        </option>

                    </select>

                </div>

                <div class="d-flex gap-2">

                    <a href="{{ route('petugas.index') }}"
                       class="btn btn-secondary">

                        <i class="fas fa-arrow-left me-2"></i>
                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-success px-4">

                        <i class="fas fa-save me-2"></i>
                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection