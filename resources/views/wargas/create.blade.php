@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">

        <h1 class="fw-bold mb-1">
            Tambah Data Warga
        </h1>

        <p class="text-muted">
            Tambahkan data warga Kampung Panyalahan
        </p>

    </div>

    {{-- Card --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">
                Form Data Warga
            </h4>

            <form action="{{ route('wargas.store') }}"
                  method="POST">

                @csrf

                {{-- Nama --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Nama Warga
                    </label>

                    <input type="text"
                           name="nama"
                           class="form-control"
                           placeholder="Masukkan nama warga"
                           value="{{ old('nama') }}"
                           required>

                    @error('nama')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                {{-- Alamat --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Alamat
                    </label>

                    <textarea name="alamat"
                              class="form-control"
                              rows="3"
                              placeholder="Masukkan alamat warga"
                              required>{{ old('alamat') }}</textarea>

                    @error('alamat')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                {{-- RT --}}
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

                        <option value="RT 01"
                            {{ old('wilayah_rt') == 'RT 01' ? 'selected' : '' }}>
                            RT 01
                        </option>

                        <option value="RT 02"
                            {{ old('wilayah_rt') == 'RT 02' ? 'selected' : '' }}>
                            RT 02
                        </option>

                    </select>

                    @error('wilayah_rt')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                {{-- No HP --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        No. HP
                    </label>

                    <input type="text"
                           name="no_hp"
                           class="form-control"
                           placeholder="Contoh: 081234567890"
                           value="{{ old('no_hp') }}">

                    @error('no_hp')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                {{-- Button --}}
                <div class="d-flex gap-2">

                    <a href="{{ route('wargas.index') }}"
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