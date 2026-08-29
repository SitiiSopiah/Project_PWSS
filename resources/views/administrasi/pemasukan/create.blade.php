@extends('layouts.app')

@section('title', 'Tambah Pemasukan')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">

        <h1 class="fw-bold mb-1">
            Tambah Pemasukan
        </h1>

        <p class="text-muted mb-0">
            Tambahkan data pemasukan Kampung Panyalahan.
        </p>

    </div>


    {{-- CARD FORM --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">
                Form Data Pemasukan
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


            <form action="{{ route('pemasukans.store') }}"
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


                {{-- SUMBER --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Sumber
                    </label>

                    <input
                        type="text"
                        name="sumber"
                        class="form-control"
                        placeholder="Contoh: Pemungutan RT 01"
                        value="{{ old('sumber') }}"
                        required>

                </div>


                {{-- JUMLAH KARUNG --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Jumlah Karung
                    </label>

                    <div class="input-group">

                        <input
                            type="number"
                            name="jumlah_karung"
                            id="jumlah_karung"
                            class="form-control"
                            placeholder="Masukkan jumlah karung"
                            value="{{ old('jumlah_karung') }}"
                            min="0"
                            required>

                        <span class="input-group-text">
                            Karung
                        </span>

                    </div>

                    <small class="text-muted">
                        Setiap karung dikenakan biaya Rp2.000.
                    </small>

                </div>


                {{-- TOTAL --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Total Pemasukan
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            Rp
                        </span>

                        <input
                            type="number"
                            name="total"
                            id="total"
                            class="form-control"
                            placeholder="Total pemasukan"
                            value="{{ old('total') }}"
                            min="0"
                            required>

                    </div>

                    <small class="text-muted">
                        Total dapat dihitung otomatis dari jumlah karung.
                    </small>

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
                        placeholder="Masukkan keterangan">{{ old('keterangan') }}</textarea>

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
                        class="btn btn-success px-4">

                        <i class="fas fa-save me-2"></i>

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- HITUNG OTOMATIS --}}
<script>

document.getElementById('jumlah_karung').addEventListener('input', function () {

    let jumlah = parseInt(this.value) || 0;

    let total = jumlah * 2000;

    document.getElementById('total').value = total;

});

</script>


@endsection