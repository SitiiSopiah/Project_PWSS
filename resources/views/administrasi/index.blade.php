@extends('layouts.app')

@section('title', 'Administrasi / Pencatatan')

@section('content')

<div class="container-fluid p-0">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Pemasukan & Pengeluaran
            </h2>

            <p class="text-muted mb-0">
                Data pemasukan dan pengeluaran Kampung Panyalahan.
            </p>
        </div>

    </div>


    {{-- RINGKASAN KEUANGAN --}}
    <div class="row g-4 mb-4">

        {{-- TOTAL PEMASUKAN --}}
        <div class="col-md-4">

            <div class="card summary-card h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-2">
                                Total Pemasukan
                            </p>

                            <h3 class="fw-bold text-success mb-0">
                                Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
                            </h3>

                        </div>

                        <div class="summary-icon income">
                            <i class="fas fa-arrow-down"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- TOTAL PENGELUARAN --}}
        <div class="col-md-4">

            <div class="card summary-card h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-2">
                                Total Pengeluaran
                            </p>

                            <h3 class="fw-bold text-danger mb-0">
                                Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
                            </h3>

                        </div>

                        <div class="summary-icon expense">
                            <i class="fas fa-arrow-up"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- SALDO AKHIR --}}
        <div class="col-md-4">

            <div class="card summary-card saldo-card h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-2">
                                Saldo Akhir
                            </p>

                            <h3 class="fw-bold text-primary mb-0">
                                Rp {{ number_format($saldoAkhir, 0, ',', '.') }}
                            </h3>

                        </div>

                        <div class="summary-icon saldo">
                            <i class="fas fa-wallet"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- MENU PEMASUKAN / PENGELUARAN --}}
    <div class="card">

        <div class="card-body p-4">


            {{-- TAB --}}
            <ul class="nav nav-tabs mb-4" id="administrasiTab">

                <li class="nav-item">

                    <button
                        class="nav-link active"
                        id="pemasukan-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#pemasukan"
                        type="button">

                        <i class="fas fa-arrow-down me-2"></i>

                        Pemasukan

                    </button>

                </li>


                <li class="nav-item">

                    <button
                        class="nav-link"
                        id="pengeluaran-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#pengeluaran"
                        type="button">

                        <i class="fas fa-arrow-up me-2"></i>

                        Pengeluaran

                    </button>

                </li>

            </ul>


            {{-- ISI TAB --}}
            <div class="tab-content">


                {{-- =========================================
                     PEMASUKAN
                ========================================= --}}

                <div
                    class="tab-pane fade show active"
                    id="pemasukan">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <div>

                            <h5 class="fw-bold mb-1">
                                Data Pemasukan
                            </h5>

                            <small class="text-muted">
                                Data hasil pembayaran pengelolaan sampah.
                            </small>

                        </div>


                        <a
                            href="{{ route('pemasukans.create') }}"
                            class="btn btn-success">

                            <i class="fas fa-plus me-1"></i>

                            Tambah Pemasukan

                        </a>

                    </div>


                    <div class="table-responsive">

                        <table class="table table-bordered table-hover align-middle">

                            <thead>

                                <tr>

                                    <th width="60">
                                        No
                                    </th>

                                    <th>
                                        Tanggal
                                    </th>

                                    <th>
                                        Sumber
                                    </th>

                                    <th>
                                        Jumlah Karung
                                    </th>

                                    <th>
                                        Total
                                    </th>

                                    <th>
                                        Keterangan
                                    </th>

                                    <th width="150">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($pemasukans as $pemasukan)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($pemasukan->tanggal)->format('d-m-Y') }}
                                    </td>

                                    <td>
                                        {{ $pemasukan->sumber }}
                                    </td>

                                    <td>
                                        {{ $pemasukan->jumlah_karung }}
                                    </td>

                                    <td class="fw-bold text-success">

                                        Rp
                                        {{ number_format($pemasukan->total, 0, ',', '.') }}

                                    </td>

                                    <td>
                                        {{ $pemasukan->keterangan ?? '-' }}
                                    </td>

                                    <td>

                                        <div class="d-flex gap-1">

                                            <a
                                                href="{{ route('pemasukans.edit', $pemasukan->id) }}"
                                                class="btn btn-warning btn-sm">

                                                <i class="fas fa-edit"></i>

                                            </a>


                                            <form
                                                action="{{ route('pemasukans.destroy', $pemasukan->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger btn-sm">

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td
                                        colspan="7"
                                        class="text-center py-5">

                                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>

                                        <p class="text-muted mb-0">
                                            Belum ada data pemasukan.
                                        </p>

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>


                {{-- =========================================
                     PENGELUARAN
                ========================================= --}}

                <div
                    class="tab-pane fade"
                    id="pengeluaran">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <div>

                            <h5 class="fw-bold mb-1">
                                Data Pengeluaran
                            </h5>

                            <small class="text-muted">
                                Data penggunaan dana Kampung Panyalahan.
                            </small>

                        </div>


                        <a
                            href="{{ route('pengeluarans.create') }}"
                            class="btn btn-danger">

                            <i class="fas fa-plus me-1"></i>

                            Tambah Pengeluaran

                        </a>

                    </div>


                    <div class="table-responsive">

                        <table class="table table-bordered table-hover align-middle">

                            <thead>

                                <tr>

                                    <th width="60">
                                        No
                                    </th>

                                    <th>
                                        Tanggal
                                    </th>

                                    <th>
                                        Keperluan
                                    </th>

                                    <th>
                                        Total
                                    </th>

                                    <th>
                                        Keterangan
                                    </th>

                                    <th width="150">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($pengeluarans as $pengeluaran)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($pengeluaran->tanggal)->format('d-m-Y') }}
                                    </td>

                                    <td>
                                        {{ $pengeluaran->keperluan }}
                                    </td>

                                    <td class="fw-bold text-danger">

                                        Rp
                                        {{ number_format($pengeluaran->total, 0, ',', '.') }}

                                    </td>

                                    <td>
                                        {{ $pengeluaran->keterangan ?? '-' }}
                                    </td>

                                    <td>

                                        <div class="d-flex gap-1">

                                            <a
                                                href="{{ route('pengeluarans.edit', $pengeluaran->id) }}"
                                                class="btn btn-warning btn-sm">

                                                <i class="fas fa-edit"></i>

                                            </a>


                                            <form
                                                action="{{ route('pengeluarans.destroy', $pengeluaran->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger btn-sm">

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td
                                        colspan="6"
                                        class="text-center py-5">

                                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>

                                        <p class="text-muted mb-0">
                                            Belum ada data pengeluaran.
                                        </p>

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<style>

/* =========================================
   SUMMARY CARD
========================================= */

.summary-card {
    border: none;
    border-radius: 12px;
    transition: 0.2s;
}

.summary-card:hover {
    transform: translateY(-2px);
}

.summary-icon {
    width: 52px;
    height: 52px;

    border-radius: 12px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 20px;
}

.summary-icon.income {
    background: #dff4e7;
    color: #188c20;
}

.summary-icon.expense {
    background: #fde3e3;
    color: #dc3545;
}

.summary-icon.saldo {
    background: #e2edff;
    color: #0d6efd;
}


/* =========================================
   TAB
========================================= */

.nav-tabs {
    border-bottom: 1px solid #dee2e6;
}

.nav-tabs .nav-link {
    color: #555;

    font-weight: 600;

    padding: 12px 20px;

    border: none;

    border-bottom: 3px solid transparent;
}

.nav-tabs .nav-link:hover {
    color: #188c20;
}

.nav-tabs .nav-link.active {
    color: #188c20;

    background: white;

    border: none;

    border-bottom: 3px solid #188c20;
}


/* =========================================
   TABLE
========================================= */

.table thead th {
    white-space: nowrap;
}

.table tbody tr:hover {
    background: #f8fffa;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 768px) {

    .summary-card {
        margin-bottom: 5px;
    }

    .d-flex.justify-content-between {
        gap: 15px;
    }

}

</style>

@endsection