@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h1 class="fw-bold mb-1">
            Edit Data Warga
        </h1>

        <p class="text-muted">
            Perbarui data warga Kampung Panyalahan
        </p>

    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">
                Form Edit Warga
            </h4>

            <form action="{{ route('wargas.update', $warga->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Nama Warga
                    </label>

                    <input type="text"
                           name="nama"
                           class="form-control"
                           value="{{ old('nama', $warga->nama) }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Alamat
                    </label>

                    <textarea name="alamat"
                              class="form-control"
                              rows="3"
                              required>{{ old('alamat', $warga->alamat) }}</textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Wilayah / RT
                    </label>

                    <select name="wilayah_rt"
                            class="form-select"
                            required>

                        <option value="RT 01"
                            {{ $warga->wilayah_rt == 'RT 01' ? 'selected' : '' }}>
                            RT 01
                        </option>

                        <option value="RT 02"
                            {{ $warga->wilayah_rt == 'RT 02' ? 'selected' : '' }}>
                            RT 02
                        </option>

                    </select>

                </div>

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        No. HP
                    </label>

                    <input type="text"
                           name="no_hp"
                           class="form-control"
                           value="{{ old('no_hp', $warga->no_hp) }}">

                </div>

                <div class="d-flex gap-2">

                    <a href="{{ route('wargas.index') }}"
                       class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>
                        Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-success px-4">
                        <i class="fas fa-save me-2"></i>
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection