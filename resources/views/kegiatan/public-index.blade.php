@extends('layouts.app')

@section('content')
<div class="kegiatan-page" style="margin-top: 3px;">
    <!-- Hero Section -->
    <section class="hero-section bg-primary text-white py-4 py-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 text-center text-lg-start">
                    <h1 class="display-5 display-lg-4 fw-bold mb-3">Daftar Kegiatan BKK</h1>
                    <p class="lead mb-4">Tempertemukan peluang dengan bakat - Temukan kegiatan terbaru dari Bursa Kerja Khusus kami</p>
                    <div class="d-flex justify-content-center justify-content-lg-start gap-3">
                        <a href="#kegiatan-list" class="btn btn-light btn-lg px-3 px-lg-4">
                            <i class="fas fa-calendar-alt me-2"></i> Jelajahi Kegiatan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container py-4 py-lg-5" id="kegiatan-list">
        <!-- Kegiatan List -->
        <div class="row g-3 g-lg-4">
            @forelse($kegiatan as $item)
            <div class="col-12 col-sm-10 col-md-6 col-lg-4 col-xl-4">
                <div class="card h-100 border-0 shadow shadow-hover mx-auto" style="max-width: 500px;">
                    <div class="position-relative">
                        <img src="{{ $item->gambar ?: 'https://via.placeholder.com/600x400?text=BKK+Kegiatan' }}"
                             class="card-img-top"
                             alt="{{ $item->judul }}"
                             style="height: 200px; object-fit: cover;">
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
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-2">
                            <span class="text-muted small mb-1 mb-sm-0">
                                <i class="fas fa-clock me-1"></i> {{ $item->waktu }}
                            </span>
                            <span class="text-muted small">
                                <i class="fas fa-map-marker-alt me-1"></i> {{ $item->tempat ?? 'Online' }}
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
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center py-4 py-lg-5">
                        <img src="{{ asset('image/activity.png') }}" alt="No activities" class="img-fluid mb-3 mb-lg-4" style="max-height: 200px;">
                        <h4 class="text-muted mb-3">Belum ada kegiatan tersedia</h4>
                        <p class="text-muted">Silakan kembali lagi nanti untuk melihat kegiatan terbaru kami</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($kegiatan->hasPages())
        <div class="row mt-4 mt-lg-5">
            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center flex-wrap">
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
        background-image: url('image/karir.png');
        background-size: cover;
        background-position: center;
        margin-bottom: 2rem;
    }

    .shadow {
        box-shadow: 0 4px 6px rgba(58, 123, 213, 0.1) !important;
    }

    .shadow-hover {
        transition: all 0.3s ease;
    }

    .shadow-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }

    .badge-overlay {
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .date-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-weight: bold;
    }

    .date-overlay .day {
        font-size: 1.25rem;
        line-height: 1;
    }

    .date-overlay .month {
        font-size: 0.7rem;
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

    /* Responsive adjustments */
    @media (max-width: 576px) {
        .hero-section {
            padding: 3rem 0;
            margin-bottom: 1.5rem;
        }

        .card {
            width: 100% !important;
            max-width: 100% !important;
        }

        .card-img-top {
            height: 180px !important;
        }

        .date-overlay {
            width: 45px;
            height: 45px;
        }

        .date-overlay .day {
            font-size: 1.1rem;
        }

        .date-overlay .month {
            font-size: 0.65rem;
        }
    }

    @media (max-width: 768px) {
        .hero-section h1 {
            font-size: 2rem !important;
        }

        .card-body {
            padding: 1rem;
        }
    }

    @media (max-width: 992px) {
        .card {
            margin-bottom: 1rem;
        }
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
