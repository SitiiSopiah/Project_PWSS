@extends('layouts.app')

@section('title', 'Data Warga')

@section('content')

<div class="container-fluid p-0">

    {{-- HEADER HALAMAN --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Data Warga
            </h2>

            <p class="text-muted mb-0">
                Data warga Kampung Panyalahan yang terdaftar dalam pengelolaan sampah.
            </p>
        </div>

        <a href="{{ route('wargas.create') }}"
           class="btn btn-success">

            <i class="fas fa-plus me-2"></i>
            Tambah Warga

        </a>

    </div>


    {{-- CARD DATA --}}
    <div class="card">

        <div class="card-body p-4">

            {{-- JUDUL TABEL --}}
            <div class="d-flex justify-content-between align-items-center mb-3">

                <div>
                    <h5 class="fw-bold mb-1">
                        Daftar Data Warga
                    </h5>

                    <small class="text-muted">
                        Data warga Kampung Panyalahan
                    </small>
                </div>

                <div class="text-muted">
                    <i class="fas fa-users me-1"></i>

                    {{ $wargas->count() }} Warga
                </div>

            </div>


            {{-- TABEL --}}
            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>

                        <tr>

                            <th width="60">
                                No
                            </th>

                            <th>
                                Nama Warga
                            </th>

                            <th>
                                Alamat
                            </th>

                            <th>
                                Wilayah / RT
                            </th>

                            <th>
                                No. HP
                            </th>

                            <th width="150">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($wargas as $warga)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="warga-icon me-2">

                                        <i class="fas fa-user"></i>

                                    </div>

                                    <strong>
                                        {{ $warga->nama }}
                                    </strong>

                                </div>
                            </td>

                            <td>
                                {{ $warga->alamat ?? '-' }}
                            </td>

                            <td>

                                <span class="badge bg-success-subtle text-success">

                                    {{ $warga->wilayah_rt ?? '-' }}

                                </span>

                            </td>

                            <td>
                                {{ $warga->no_hp ?? '-' }}
                            </td>

                            <td>

                                <div class="d-flex gap-1">

                                    {{-- EDIT --}}
                                    <a
                                        href="{{ route('wargas.edit', $warga->id) }}"
                                        class="btn btn-warning btn-sm"
                                        title="Edit">

                                        <i class="fas fa-edit"></i>

                                    </a>


                                    {{-- HAPUS --}}
                                    <form
                                        action="{{ route('wargas.destroy', $warga->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data warga ini?')">

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

                                    <i class="fas fa-users fa-3x mb-3"></i>

                                    <h5 class="fw-bold">
                                        Belum Ada Data Warga
                                    </h5>

                                    <p class="text-muted mb-3">
                                        Silakan tambahkan data warga terlebih dahulu.
                                    </p>

                                    <a
                                        href="{{ route('wargas.create') }}"
                                        class="btn btn-success">

                                        <i class="fas fa-plus me-1"></i>

                                        Tambah Warga

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

/* =========================================
   WARGA ICON
========================================= */

.warga-icon {
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


/* =========================================
   BADGE RT
========================================= */

.bg-success-subtle {
    background-color: #e1f3e7 !important;
}


/* =========================================
   EMPTY DATA
========================================= */

.empty-data {
    padding: 20px;

    color: #188c20;
}

.empty-data p {
    color: #777;
}


/* =========================================
   TABLE
========================================= */

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

.table tbody tr {
    transition: 0.15s;
}

.table tbody tr:hover {
    background: #f7fcf8;
}


/* =========================================
   BUTTON
========================================= */

.btn-sm {
    min-width: 35px;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 768px) {

    .d-flex.justify-content-between {
        flex-wrap: wrap;
        gap: 15px;
    }

}

</style>

@endsection