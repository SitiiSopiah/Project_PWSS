@extends('layouts.app')

@section('title', 'Data Fasilitas')

@section('content')

<div class="container-fluid p-0">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Data Fasilitas
            </h2>

            <p class="text-muted mb-0">
                Data fasilitas pengelolaan sampah Kampung Panyalahan.
            </p>

        </div>

        <a href="{{ route('fasilitas.create') }}"
           class="btn btn-success">

            <i class="fas fa-plus me-2"></i>

            Tambah Fasilitas

        </a>

    </div>


    {{-- PESAN SUKSES --}}
    @if(session('success'))

        <div class="alert alert-success">

            <i class="fas fa-check-circle me-2"></i>

            {{ session('success') }}

        </div>

    @endif


    {{-- CARD --}}
    <div class="card">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <div>

                    <h5 class="fw-bold mb-1">
                        Daftar Data Fasilitas
                    </h5>

                    <small class="text-muted">
                        Fasilitas yang digunakan dalam kegiatan pengelolaan sampah.
                    </small>

                </div>

                <div class="text-muted">

                    <i class="fas fa-building me-1"></i>

                    {{ $fasilitas->count() }} Data

                </div>

            </div>


            {{-- TABLE --}}
            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>

                        <tr>

                            <th width="60">
                                No
                            </th>

                            <th>
                                Nama Fasilitas
                            </th>

                            <th>
                                Jumlah
                            </th>

                            <th>
                                Kondisi
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

                        @forelse($fasilitas as $data)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="fasilitas-icon me-2">
                                        <i class="fas fa-building"></i>
                                    </div>

                                    <strong>
                                        {{ $data->nama_fasilitas }}
                                    </strong>

                                </div>
                            </td>

                            <td>

                                <span class="badge bg-success">

                                    {{ $data->jumlah }}

                                </span>

                            </td>

                            <td>

                                @if(strtolower($data->kondisi) == 'baik')

                                    <span class="badge bg-success">
                                        Baik
                                    </span>

                                @elseif(strtolower($data->kondisi) == 'rusak')

                                    <span class="badge bg-danger">
                                        Rusak
                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark">
                                        {{ $data->kondisi }}
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ $data->keterangan ?? '-' }}
                            </td>

                            <td>

                                <div class="d-flex gap-1">

                                    {{-- EDIT --}}
                                    <a href="{{ route('fasilitas.edit', $data->id) }}"
                                        class="btn btn-warning btn-sm"
                                        title="Edit">

                                        <i class="fas fa-edit"></i>

                                    </a>


                                    {{-- HAPUS --}}
                                    <form
                                        action="{{ route('fasilitas.destroy', $data->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data fasilitas ini?')">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm"
                                            title="Hapus">

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

                                <div class="empty-data">

                                    <i class="fas fa-building fa-3x mb-3"></i>

                                    <h5 class="fw-bold">
                                        Belum Ada Data Fasilitas
                                    </h5>

                                    <p class="text-muted">
                                        Silakan tambahkan fasilitas terlebih dahulu.
                                    </p>

                                    <a
                                        href="{{ route('fasilitas.create') }}"
                                        class="btn btn-success">

                                        <i class="fas fa-plus me-1"></i>

                                        Tambah Fasilitas

                                    </a>

                                </div>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<style>

.fasilitas-icon {
    width: 36px;
    height: 36px;

    background: #e1f3e7;

    color: #188c20;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;
}

.table {
    margin-bottom: 0;
}

.table thead th {
    background: #d8eee5;

    color: #17202a;

    font-weight: 600;

    white-space: nowrap;
}

.table tbody td {
    padding: 13px 12px;
}

.table tbody tr:hover {
    background: #f7fcf8;
}

.empty-data {
    padding: 20px;

    color: #188c20;
}

</style>

@endsection