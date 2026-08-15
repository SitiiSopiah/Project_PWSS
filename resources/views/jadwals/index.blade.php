@extends('layouts.app')

@section('title', 'Jadwal Pemungutan')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="page-title mb-1">
            Jadwal Pemungutan
        </h2>

        <p class="text-muted mb-0">
            Jadwal pemungutan sampah Kampung Panyalahan.
        </p>
    </div>

    <a
        href="{{ route('jadwals.create') }}"
        class="btn btn-success">

        <i class="bi bi-plus-lg"></i>
        Tambah Jadwal

    </a>

</div>


<div class="card shadow-sm">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-success">

                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Hari</th>
                        <th>Petugas</th>
                        <th>Wilayah / RT</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($jadwals as $jadwal)

                        <tr>

                            {{-- NOMOR --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- TANGGAL --}}
                            <td>
                                {{ $jadwal->tanggal->format('d-m-Y') }}
                            </td>


                            {{-- HARI --}}
                            <td>
                                Minggu
                            </td>


                            {{-- PETUGAS --}}
                            <td>
                                {{ $jadwal->petugas }}
                            </td>


                            {{-- WILAYAH --}}
                            <td>

                                <span class="badge bg-success">
                                    {{ $jadwal->wilayah_rt }}
                                </span>

                            </td>


                            {{-- AKSI --}}
                            <td>

                                {{-- EDIT --}}
                                <a
                                    href="{{ route('jadwals.edit', $jadwal->id) }}"
                                    class="btn btn-sm btn-warning">

                                    <i class="bi bi-pencil"></i>

                                </a>


                                {{-- HAPUS --}}
                                <form
                                    action="{{ route('jadwals.destroy', $jadwal->id) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">

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
                                colspan="6"
                                class="text-center py-5">

                                <i class="bi bi-calendar-x fs-1 text-muted"></i>

                                <div class="mt-2 text-muted">
                                    Belum ada jadwal.
                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection