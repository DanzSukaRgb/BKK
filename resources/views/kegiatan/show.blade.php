@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detail Kegiatan</h1>
        <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ $kegiatan->gambar }}" alt="{{ $kegiatan->judul }}"
                             class="img-fluid rounded" style="max-height: 400px;">
                    </div>

                    <h2 class="mb-3">{{ $kegiatan->judul }}</h2>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p><i class="fas fa-calendar-alt me-2"></i>
                                <strong>Tanggal:</strong> {{ $kegiatan->tanggal->format('d F Y') }}
                            </p>
                            <p><i class="fas fa-clock me-2"></i>
                                <strong>Waktu:</strong> {{ $kegiatan->waktu }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><i class="fas fa-map-marker-alt me-2"></i>
                                <strong>Tempat:</strong> {{ $kegiatan->tempat }}
                            </p>
                        </div>
                    </div>
                      <p><strong>Tipe Kegiatan:</strong> {{ $kegiatan->tipe_kegiatan ?? '-' }}</p>

                    <hr>

                    <h4 class="mb-3">Deskripsi Kegiatan</h4>
                    <div class="border p-3 rounded bg-light">
                        {!! nl2br(e($kegiatan->deskripsi)) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="mb-0">Aksi</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex gap-2">
                        <a href="{{ route('kegiatan.edit', $kegiatan->id) }}"
                           class="btn btn-warning btn-block">
                            <i class="fas fa-edit "></i> Edit Kegiatan
                        </a>
                        <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block"
                                    onclick="return confirm('Yakin ingin menghapus kegiatan ini?')">
                                <i class="fas fa-trash "></i> Hapus Kegiatan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
