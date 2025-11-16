@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<br>
<br>
<div class="container mt-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="mb-3 text-primary fw-bold">Lowongan Pekerjaan Terbaru</h2>
            <p class="text-muted">Temukan peluang karir terbaik untuk masa depan Anda</p>
        </div>
        <div class="col-md-4">
            <form action="{{ route('lowongan.public') }}" method="GET">
                <div class="input-group shadow-sm">
                    <input type="text" name="search" class="form-control border-end-0" placeholder="Cari lowongan..." value="{{ request('search') }}">
                    <button class="btn btn-primary px-3" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Job Listings -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse($lowongan as $job)
        <div class="col">
            <div class="card h-100 shadow-sm border-0 job-card">
                <div class="card-header bg-transparent border-0 pt-3 pb-0">
                    <div class="d-flex justify-content-between align-items-start">
                        <span class="badge bg-{{ $job->status == 'Aktif' ? 'success' : 'secondary' }} rounded-pill px-3 py-2">
                            {{ $job->status }}
                        </span>
                        <small class="text-muted">
                            {{ $job->created_at ? $job->created_at->diffForHumans() : 'Tanggal tidak tersedia' }}
                        </small>
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-dark mb-3">{{ $job->judul }}</h5>

                    <div class="job-details mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-wrapper bg-light-primary rounded-circle p-2 me-2">
                                <i class="fas fa-building text-primary"></i>
                            </div>
                            <span class="text-muted">{{ $job->perusahaan->nama }}</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon-wrapper bg-light-primary rounded-circle p-2 me-2">
                                <i class="fas fa-briefcase text-primary"></i>
                            </div>
                            <span class="text-muted">{{ $job->posisi }}</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper bg-light-primary rounded-circle p-2 me-2">
                                <i class="fas fa-calendar-alt text-primary"></i>
                            </div>
                            <span class="text-muted">
                                Tutup: {{ $job->tanggal_tutup->format('d M Y') }}
                                <small class="d-block text-muted">({{ $job->tanggal_tutup->diffForHumans() }})</small>
                            </span>
                        </div>
                    </div>

                    <div class="mt-auto pt-3">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('lowongan.show.public', $job->slug) }}" class="btn btn-outline-primary btn-sm px-3 rounded-pill">
                                <i class="fas fa-eye me-1"></i> Detail
                            </a>
                            @auth
                                @if(auth()->user()->role == 'alumni')
                                    <a href="{{ route('lowongan.show.public', $job->slug) }}#lamar" class="btn btn-primary btn-sm px-3 rounded-pill">
                                        <i class="fas fa-paper-plane me-1"></i> Lamar
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary btn-sm px-3 rounded-pill">
                                    <i class="fas fa-sign-in-alt me-1"></i> Login untuk Lamar
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <div class="empty-state-icon mb-3">
                    <i class="fas fa-briefcase fa-3x text-muted"></i>
                </div>
                <h4 class="text-muted">Tidak ada lowongan yang tersedia</h4>
                <p class="text-muted">Silakan periksa kembali nanti atau cari dengan kata kunci lain.</p>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-5 d-flex justify-content-center">
        {{ $lowongan->links() }}
    </div>
</div>

<style>
    .job-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px;
        overflow: hidden;
    }
    .job-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.1);
    }
    .icon-wrapper {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .bg-light-primary {
        background-color: rgba(13, 110, 253, 0.1);
    }
    .badge {
        font-size: 0.75rem;
        font-weight: 500;
    }
    .empty-state-icon {
        opacity: 0.5;
    }
    .pagination .page-link {
        border-radius: 50px;
        margin: 0 3px;
        border: none;
        color: #6c757d;
    }
    .pagination .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
    .btn {
        border-radius: 50px;
        font-weight: 500;
    }
    .form-control {
        border-radius: 50px 0 0 50px;
    }
    .input-group .btn {
        border-radius: 0 50px 50px 0;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
