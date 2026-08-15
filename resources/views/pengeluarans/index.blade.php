@extends('layouts.app')

@section('title', 'Pemasukan & Pengeluaran')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="page-title mb-1">
            Pemasukan & Pengeluaran
        </h2>

        <p class="text-muted mb-0">
            Kelola pencatatan keuangan bank sampah.
        </p>
    </div>

</div>


{{-- TAB --}}

<div class="card shadow-sm mb-4">

    <div class="card-body pb-0">

        <ul class="nav nav-tabs">

            <li class="nav-item">

                <a
                    class="nav-link"
                    href="{{ route('pemasukans.index') }}">

                    Pemasukan

                </a>

            </li>

            <li class="nav-item">

                <a
                    class="nav-link active"
                    href="{{ route('pengeluarans.index') }}">

                    Pengeluaran

                </a>

            </li>

        </ul>

    </div>

</div>


{{-- TOTAL --}}

<div class="row mb-4">

    <div class="col-md-4">

        <div class="card shadow-sm">

            <div class="card-body">

                <div class="text-muted mb-2">
                    Total Pengeluaran
                </div>

                <h3 class="fw-bold text-danger mb-0">

                    Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}

                </h3>

            </div>

        </div>

    </div>

</div>


{{-- HEADER --}}

<div class="d-flex justify-content-between align-items-center mb-3">

    <h4 class="fw-bold mb-0">
        Data Pengeluaran
    </h4>

    <a
        href="{{ route('pengeluarans.create') }}"
        class="btn btn-success">

        <i class="bi bi-plus-lg"></i>
        Tambah

    </a>

</div>


{{-- TABEL --}}

<div class="card shadow-sm">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-success">

                    <tr>

                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Jumlah (Rp)</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($pengeluarans as $pengeluaran)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $pengeluaran->tanggal->format('d-m-Y') }}
                        </td>

                        <td>
                            {{ $pengeluaran->keterangan ?? '-' }}
                        </td>

                        <td class="fw-semibold">

                            Rp {{ number_format($pengeluaran->jumlah, 0, ',', '.') }}

                        </td>

                        <td>

                            <a
                                href="{{ route('pengeluarans.edit', $pengeluaran->id) }}"
                                class="btn btn-sm btn-warning">

                                <i class="bi bi-pencil"></i>

                            </a>

                            <form
                                action="{{ route('pengeluarans.destroy', $pengeluaran->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-sm btn-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td
                            colspan="5"
                            class="text-center py-5 text-muted">

                            Belum ada data pengeluaran.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection