@extends('layouts.app')

@section('content')
<div class="kegiatan-page">
    <!-- Hero Section -->
    <section class="hero-section bg-primary text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-start">
                    <h1 class="display-4 fw-bold mb-3">Daftar Kegiatan BKK</h1>
                    <p class="lead mb-4">Tempertemukan peluang dengan bakat - Temukan kegiatan terbaru dari Bursa Kerja Khusus kami</p>
                    <div class="d-flex  gap-3">
                        <a href="#kegiatan-list" class="btn btn-primary btn-lg px-4">
                            <i class="fas fa-calendar-alt me-2"></i> Jelajahi Kegiatan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container py-5" id="kegiatan-list">
        <!-- Filter Section -->


        <!-- Kegiatan List -->
        <div class="row g-4">
            @forelse($kegiatan as $item)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-hover">
                    <div class="position-relative">
                        <img src="{{ $item->gambar ?: 'https://via.placeholder.com/600x400?text=BKK+Kegiatan' }}"
                             class="card-img-top"
                             alt="{{ $item->judul }}"
                             style="height: 220px; object-fit: cover;">
                        <div class="badge-overlay">
                            <span class="badge bg-{{ $item->tipe_kegiatan == 'Workshop' ? 'info' : ($item->tipe_kegiatan == 'Seminar' ? 'warning' : 'success') }}">
                                {{ $item->tipe_kegiatan }}
                            </span>
                        </div>
                        <div class="date-overlay bg-primary text-white">
                            <div class="day">{{ $item->tanggal->format('d') }}</div>
                            <div class="month">{{ $item->tanggal->format('M') }}</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted small">
                                <i class="fas fa-clock me-1"></i> {{ $item->waktu }}
                            </span>
                            <span class="text-muted small">
                                <i class="fas fa-map-marker-alt me-1"></i> {{ $item->lokasi ?? 'Online' }}
                            </span>
                        </div>
                        <h3 class="h5 card-title">{{ $item->judul }}</h3>
                        <p class="card-text text-muted">{{ Str::limit($item->deskripsi, 120) }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pt-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('kegiatan.show.public', $item->id) }}"
                               class="btn btn-outline-primary btn-sm stretched-link">
                                Detail Kegiatan
                            </a>
                            <span class="badge bg-light text-dark small">
                                {{ $item->kuota_peserta ?? '0' }} Peserta
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center py-5">
                        <img src="{{ asset('img/empty-state.svg') }}" alt="No activities" style="height: 150px;" class="mb-4">
                        <h4 class="text-muted mb-3">Belum ada kegiatan tersedia</h4>
                        <p class="text-muted">Silakan kembali lagi nanti untuk melihat kegiatan terbaru kami</p>
                    </div>
                </div>
            </div>
        </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($kegiatan->hasPages())
        <div class="row mt-5">
            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        {{ $kegiatan->links() }}
                    </ul>
                </nav>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
    .hero-section {
        background-image: url('assets/karer.png');
        padding: 5rem 0;
        margin-bottom: 3rem;
    }

    .shadow-hover {
        transition: all 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
    }

    .shadow-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }

    .badge-overlay {
        position: absolute;
        top: 15px;
        right: 15px;
    }

    .date-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 60px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-weight: bold;
    }

    .date-overlay .day {
        font-size: 1.5rem;
        line-height: 1;
    }

    .date-overlay .month {
        font-size: 0.8rem;
        text-transform: uppercase;
    }

    .card-img-top {
        border-top-left-radius: 10px !important;
        border-top-right-radius: 10px !important;
    }

    .pagination .page-item.active .page-link {
        background-color: #3a7bd5;
        border-color: #3a7bd5;
    }

    .pagination .page-link {
        color: #3a7bd5;
    }
</style>
@endsection