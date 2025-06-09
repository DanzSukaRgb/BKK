@extends('layouts.app')
{{--  --}}
@section('content')
<br><br><br>
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="text-center mb-4">Kegiatan BKK</h1>
            <p class="text-center lead">Daftar kegiatan terbaru dari Bursa Kerja Khusus kami</p>
        </div>
    </div>

    <div class="row">
        @forelse($kegiatan as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ $item->gambar }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <span class="badge bg-primary mb-2">{{ $item->tipe_kegiatan }}</span>
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <p class="text-muted">
                        <i class="fas fa-calendar-alt"></i> {{ $item->tanggal->format('d M Y') }}
                        <i class="fas fa-clock ms-2"></i> {{ $item->waktu }}
                    </p>
                    <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                </div>
                <div class="card-footer bg-white">
                    <a href="{{ route('kegiatan.show.public', $item->id) }}" class="btn btn-primary btn-sm">
                        Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                Tidak ada kegiatan yang tersedia saat ini.
            </div>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $kegiatan->links() }}
    </div>
</div>
@endsection
