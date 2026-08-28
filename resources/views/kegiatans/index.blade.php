@extends('layouts.app')

@section('title', 'Upload Kegiatan')

@section('content')

<div class="container-fluid p-0">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Upload Kegiatan
            </h2>

            <p class="text-muted mb-0">
                Dokumentasi kegiatan Kampung Panyalahan.
            </p>

        </div>

        <a
            href="{{ route('kegiatans.create') }}"
            class="btn btn-success">

            <i class="fas fa-plus me-2"></i>

            Tambah Kegiatan

        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">

            <i class="fas fa-check-circle me-2"></i>

            {{ session('success') }}

        </div>

    @endif


    <div class="row">

        @forelse($kegiatans as $kegiatan)

            <div class="col-md-4 mb-4">

                <div class="card border-0 shadow-sm h-100">

                    @if($kegiatan->foto)

                        <img
                            src="{{ asset('storage/' . $kegiatan->foto) }}"
                            class="card-img-top kegiatan-image"
                            alt="{{ $kegiatan->judul }}">

                    @else

                        <div class="no-image">

                            <i class="fas fa-image fa-3x"></i>

                        </div>

                    @endif


                    <div class="card-body">

                        <h5 class="fw-bold">
                            {{ $kegiatan->judul }}
                        </h5>

                        <small class="text-muted">

                            <i class="fas fa-calendar-alt me-1"></i>

                            {{ $kegiatan->tanggal->format('d-m-Y') }}

                        </small>

                        @if($kegiatan->keterangan)

                            <p class="text-muted mt-3 mb-0">
                                {{ $kegiatan->keterangan }}
                            </p>

                        @endif

                    </div>


                    <div class="card-footer bg-white border-0">

                        <div class="d-flex gap-2">

                            <a
                                href="{{ route('kegiatans.edit', $kegiatan->id) }}"
                                class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                                Edit

                            </a>


                            <form
                                action="{{ route('kegiatans.destroy', $kegiatan->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')">

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm">

                                    <i class="fas fa-trash"></i>

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center py-5">

                        <i class="fas fa-images fa-4x text-success mb-3"></i>

                        <h4 class="fw-bold">
                            Belum Ada Kegiatan
                        </h4>

                        <p class="text-muted">
                            Belum ada dokumentasi kegiatan yang diupload.
                        </p>

                        <a
                            href="{{ route('kegiatans.create') }}"
                            class="btn btn-success">

                            <i class="fas fa-plus me-1"></i>

                            Tambah Kegiatan

                        </a>

                    </div>

                </div>

            </div>

        @endforelse

    </div>

</div>


<style>

.kegiatan-image {

    width: 100%;

    height: 230px;

    object-fit: cover;

}

.no-image {

    height: 230px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #e8f5ec;

    color: #198754;

}

</style>

@endsection