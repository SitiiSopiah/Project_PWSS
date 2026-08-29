@extends('layouts.app')

@section('title', 'Data Petugas')

@section('content')

<div class="container-fluid p-0">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Data Petugas
            </h2>

            <p class="text-muted mb-0">
                Data petugas pengelolaan sampah Kampung Panyalahan.
            </p>
        </div>

        <a href="{{ route('petugas.create') }}"
           class="btn btn-success">

            <i class="fas fa-plus me-2"></i>
            Tambah Petugas

        </a>

    </div>


    {{-- CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            {{-- HEADER TABLE --}}
            <div class="d-flex justify-content-between align-items-center mb-3">

                <div>
                    <h5 class="fw-bold mb-1">
                        Daftar Data Petugas
                    </h5>

                    <small class="text-muted">
                        Petugas pengelolaan sampah Kampung Panyalahan
                    </small>
                </div>

                <div class="text-muted">

                    <i class="fas fa-user-tie me-1"></i>

                    {{ $petugas->count() }} Petugas

                </div>

            </div>


            {{-- SUCCESS --}}
            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    <i class="fas fa-check-circle me-2"></i>

                    {{ session('success') }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            {{-- ERROR --}}
            @if(session('error'))

                <div class="alert alert-danger alert-dismissible fade show">

                    <i class="fas fa-exclamation-circle me-2"></i>

                    {{ session('error') }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            {{-- TABLE --}}
            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>

                        <tr>

                            <th width="60" class="text-center">
                                No
                            </th>

                            <th>
                                Nama Petugas
                            </th>

                            <th>
                                Wilayah / RT
                            </th>

                            <th>
                                No. HP
                            </th>

                            <th>
                                Status
                            </th>

                            <th width="150" class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($petugas as $data)

                        <tr>

                            {{-- NO --}}
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>


                            {{-- NAMA --}}
                            <td>

                                <div class="d-flex align-items-center">

                                    <div class="petugas-icon me-2">

                                        <i class="fas fa-user-tie"></i>

                                    </div>

                                    <strong>
                                        {{ $data->nama }}
                                    </strong>

                                </div>

                            </td>


                            {{-- WILAYAH --}}
                            <td>

                                @if($data->wilayah_rt)

                                    <span class="badge bg-success-subtle text-success">

                                        <i class="fas fa-map-marker-alt me-1"></i>

                                        {{ $data->wilayah_rt }}

                                    </span>

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- NO HP --}}
                            <td>

                                @if($data->no_hp)

                                    <i class="fas fa-phone text-success me-1"></i>

                                    {{ $data->no_hp }}

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if($data->status == 'Aktif')

                                    <span class="badge bg-success">
                                        <i class="fas fa-check-circle me-1"></i>
                                        Aktif
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        {{ $data->status }}
                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <div class="d-flex justify-content-center gap-1">

                                    {{-- EDIT --}}
                                    <a
                                        href="{{ route('petugas.edit', $data->id) }}"
                                        class="btn btn-warning btn-sm"
                                        title="Edit">

                                        <i class="fas fa-edit"></i>

                                    </a>


                                    {{-- HAPUS --}}
                                    <form
                                        action="{{ route('petugas.destroy', $data->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data petugas {{ $data->nama }}?')">

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

                            <td colspan="6"
                                class="text-center py-5">

                                <div class="empty-data">

                                    <i class="fas fa-user-tie fa-3x mb-3"></i>

                                    <h5 class="fw-bold">
                                        Belum Ada Data Petugas
                                    </h5>

                                    <p class="text-muted">
                                        Silakan tambahkan data petugas terlebih dahulu.
                                    </p>

                                    <a
                                        href="{{ route('petugas.create') }}"
                                        class="btn btn-success">

                                        <i class="fas fa-plus me-1"></i>

                                        Tambah Petugas

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

/* ICON PETUGAS */
.petugas-icon {

    width: 38px;
    height: 38px;

    background: #e1f3e7;

    color: #188c20;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

}


/* TABLE HEADER */
.table thead th {

    background: #d8eee5;

    color: #17202a;

    font-weight: 600;

    white-space: nowrap;

    padding: 14px 12px;

}


/* TABLE BODY */
.table tbody td {

    padding: 13px 12px;

}


/* HOVER */
.table tbody tr:hover {

    background: #f7fcf8;

}


/* BADGE RT */
.bg-success-subtle {

    background-color: #e1f3e7 !important;

}


/* EMPTY */
.empty-data {

    padding: 20px;

    color: #188c20;

}


/* BUTTON */
.btn-success {

    background-color: #188c20;

    border-color: #188c20;

}


.btn-success:hover {

    background-color: #126b18;

    border-color: #126b18;

}

</style>

@endsection