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
                    class="nav-link active"
                    href="{{ route('pemasukans.index') }}">

                    Pemasukan

                </a>

            </li>

            <li class="nav-item">

                <a
                    class="nav-link"
                    href="{{ route('pengeluarans.index') }}">

                    Pengeluaran

                </a>

            </li>

        </ul>

    </div>

</div>


{{-- TOTAL PEMASUKAN --}}

<div class="row mb-4">

    <div class="col-md-4">

        <div class="card shadow-sm">

            <div class="card-body">

                <div class="text-muted mb-2">
                    Total Pemasukan
                </div>

                <h3 class="fw-bold text-success mb-0">

                    Rp {{ number_format($totalPemasukan, 0, ',', '.') }}

                </h3>

            </div>

        </div>

    </div>

</div>


{{-- HEADER DATA --}}

<div class="d-flex justify-content-between align-items-center mb-3">

    <h4 class="fw-bold mb-0">
        Data Pemasukan
    </h4>

    <a
        href="{{ route('pemasukans.create') }}"
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

                        <th width="60">
                            No
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Keterangan
                        </th>

                        <th>
                            Jumlah (Rp)
                        </th>

                        <th width="120">
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
                            {{ $pemasukan->tanggal->format('d-m-Y') }}
                        </td>

                        <td>
                            {{ $pemasukan->keterangan ?? '-' }}
                        </td>

                        <td class="fw-semibold">

                            Rp {{ number_format($pemasukan->jumlah, 0, ',', '.') }}

                        </td>

                        <td>

                            <a
                                href="{{ route('pemasukans.edit', $pemasukan->id) }}"
                                class="btn btn-sm btn-warning">

                                <i class="bi bi-pencil"></i>

                            </a>


                            <form
                                action="{{ route('pemasukans.destroy', $pemasukan->id) }}"
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

                            Belum ada data pemasukan.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection