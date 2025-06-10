@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('styles')
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Boxicons -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<style>
    :root {
        --primary-color: #4361ee;
        --secondary-color: #3f37c9;
        --accent-color: #4cc9f0;
        --dark-color: #2b2d42;
        --light-color: #f8f9fa;
        --success-color: #4caf50;
        --warning-color: #ff9800;
        --danger-color: #f44336;
        --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f5f7fb;
        color: #4a4a4a;
    }

    .container {
        max-width: 1400px;
    }

    h2 {
        font-weight: 600;
        color: var(--dark-color);
        position: relative;
        padding-bottom: 10px;
        margin-bottom: 25px;
    }

    h2::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        border-radius: 2px;
    }

    /* Card Styles */
    .gradient-card {
        background: white;
        border: none;
        border-radius: 12px;
        box-shadow: var(--card-shadow);
        transition: var(--transition);
        overflow: hidden;
        position: relative;
        height: 100%;
    }

    .gradient-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(to bottom, var(--primary-color), var(--accent-color));
    }

    .gradient-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }

    .card-body {
        padding: 20px;
        position: relative;
    }

    .card-title {
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }

    .card-title i {
        margin-right: 10px;
        font-size: 1.2em;
        color: var(--primary-color);
    }

    .card-text {
        color: #6c757d;
        font-size: 0.95em;
        line-height: 1.6;
    }

    .display-6 {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--dark-color);
        margin: 10px 0;
    }

    /* Tabs Styles */
    .nav-tabs {
        border-bottom: 1px solid #e0e0e0;
        margin-bottom: 25px;
    }

    .nav-tabs .nav-link {
        color: #6c757d;
        font-weight: 500;
        border: none;
        padding: 12px 20px;
        margin-right: 5px;
        border-radius: 8px 8px 0 0;
        transition: var(--transition);
        position: relative;
        background: transparent;
    }

    .nav-tabs .nav-link:hover {
        color: var(--primary-color);
        background: rgba(67, 97, 238, 0.05);
    }

    .nav-tabs .nav-link.active {
        color: var(--primary-color);
        background: white;
        border-bottom: 3px solid var(--primary-color);
    }

    .nav-tabs .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 1px;
        background: white;
    }

    .tab-content {
        background: white;
        padding: 25px;
        border-radius: 0 8px 8px 8px;
        box-shadow: var(--card-shadow);
    }

    /* Button Styles */
    .btn-light {
        background-color: white;
        border: 1px solid var(--primary-color);
        color: var(--primary-color);
        padding: 8px 16px;
        border-radius: 6px;
        font-weight: 500;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
    }

    .btn-light i {
        margin-right: 5px;
    }

    .btn-light:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateY(-2px);
    }

    /* Status Badges */
    .badge {
        padding: 6px 10px;
        font-weight: 500;
        border-radius: 20px;
        font-size: 0.75rem;
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
        .display-6 {
            font-size: 1.8rem;
        }
    }

    @media (max-width: 768px) {
        .gradient-card {
            margin-bottom: 20px;
        }

        .nav-tabs {
            flex-wrap: nowrap;
            overflow-x: auto;
            white-space: nowrap;
            padding-bottom: 5px;
        }

        .nav-tabs .nav-link {
            padding: 10px 15px;
            font-size: 0.9rem;
        }

        .tab-content {
            padding: 15px;
        }
    }

    @media (max-width: 576px) {
        h2 {
            font-size: 1.5rem;
        }

        .card-body {
            padding: 15px;
        }

        .display-6 {
            font-size: 1.5rem;
        }
    }

    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .tab-pane {
        animation: fadeIn 0.4s ease-out;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--primary-color);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--secondary-color);
    }
</style>
@endsection

@section('content')
<div class="container py-4">
    <h2>Admin Dashboard</h2>

    <!-- Tabs -->
    <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="lowongan-tab" data-bs-toggle="tab" data-bs-target="#lowongan" type="button" role="tab">
                <i class="fas fa-briefcase me-2"></i>Lowongan Terbaru
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="lamaran-tab" data-bs-toggle="tab" data-bs-target="#lamaran" type="button" role="tab">
                <i class="fas fa-file-alt me-2"></i>Lamaran Terbaru
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="summary-tab" data-bs-toggle="tab" data-bs-target="#summary" type="button" role="tab">
                <i class="fas fa-chart-pie me-2"></i>Ringkasan
            </button>
        </li>
    </ul>

    <div class="tab-content" id="dashboardTabsContent">
        <!-- Tab: Lowongan Terbaru -->
        <div class="tab-pane fade show active" id="lowongan" role="tabpanel" aria-labelledby="lowongan-tab">
            @if($recentLowongan->count() > 0)
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach ($recentLowongan as $lowongan)
                        <div class="col">
                            <div class="gradient-card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="fas fa-briefcase"></i>
                                        {{ $lowongan->judul }}
                                    </h5>
                                    <p class="card-text">{{ Str::limit($lowongan->deskripsi, 120) }}</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="badge bg-primary">
                                            <i class="fas fa-clock me-1"></i>
                                            {{ $lowongan->created_at ? $lowongan->created_at->diffForHumans() : 'N/A' }}
                                        </span>
                                        {{-- <a href="{{ route('lowongan.show', $lowongan->id) }}" class="btn btn-light btn-sm">
                                            <i class="fas fa-eye me-1"></i>Detail
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Tidak ada lowongan terbaru.</p>
                </div>
            @endif
        </div>

        <!-- Tab: Lamaran Terbaru -->
        <div class="tab-pane fade" id="lamaran" role="tabpanel" aria-labelledby="lamaran-tab">
            @if($recentLamaran->count() > 0)
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach ($recentLamaran as $lamaran)
                        <div class="col">
                            <div class="gradient-card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="fas fa-user-tie"></i>
                                        {{ $lamaran->nama_pelamar }}
                                    </h5>
                                    <p class="card-text mb-1">
                                        <i class="fas fa-briefcase me-2 text-muted"></i>
                                        {{ $lamaran->lowongan->judul ?? '-' }}
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="fas fa-envelope me-2 text-muted"></i>
                                        {{ $lamaran->email }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="badge bg-success">
                                            <i class="fas fa-clock me-1"></i>
                                            {{ $lamaran->created_at->diffForHumans() }}
                                        </span>
                                        <a href="{{ route('lamaran.show', $lamaran->id) }}" class="btn btn-light btn-sm">
                                            <i class="fas fa-eye me-1"></i>Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Tidak ada lamaran terbaru.</p>
                </div>
            @endif
        </div>

        <!-- Tab: Ringkasan -->
        <div class="tab-pane fade" id="summary" role="tabpanel" aria-labelledby="summary-tab">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <!-- Total Alumni Card -->
                <div class="col">
                    <div class="gradient-card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-user-graduate"></i>
                                Total Alumni
                            </h5>
                            <p class="display-6">{{ $alumniCount }}</p>
                            <p class="card-text text-success">
                                <i class="fas fa-arrow-up me-1"></i>
                                <small>5.2% dari bulan lalu</small>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Total Perusahaan Card -->
                <div class="col">
                    <div class="gradient-card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-building"></i>
                                Total Perusahaan
                            </h5>
                            <p class="display-6">{{ $perusahaanCount }}</p>
                            <p class="card-text text-success">
                                <i class="fas fa-arrow-up me-1"></i>
                                <small>3.1% dari bulan lalu</small>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Lowongan Aktif Card -->
                <div class="col">
                    <div class="gradient-card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-briefcase"></i>
                                Lowongan Aktif
                            </h5>
                            <p class="display-6">{{ $lowonganCount }}</p>
                            <p class="card-text text-success">
                                <i class="fas fa-arrow-up me-1"></i>
                                <small>7.8% dari bulan lalu</small>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Total Lamaran Card -->
                <div class="col">
                    <div class="gradient-card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-file-alt"></i>
                                Total Lamaran
                            </h5>
                            <p class="display-6">{{ $lamaranCount }}</p>
                            <p class="card-text text-success">
                                <i class="fas fa-arrow-up me-1"></i>
                                <small>12.4% dari bulan lalu</small>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Total Kegiatan Card -->
                <div class="col">
                    <div class="gradient-card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-calendar-alt"></i>
                                Total Kegiatan
                            </h5>
                            <p class="display-6">{{ $kegiatanCount }}</p>
                            <p class="card-text text-success">
                                <i class="fas fa-arrow-up me-1"></i>
                                <small>2.3% dari bulan lalu</small>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions Card -->
                <div class="col">
                    <div class="gradient-card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-bolt"></i>
                                Quick Actions
                            </h5>
                            <div class="d-grid gap-2 mt-3">
                                <button class="btn btn-light text-start">
                                    <i class="fas fa-plus-circle me-2"></i>Tambah Lowongan
                                </button>
                                <button class="btn btn-light text-start">
                                    <i class="fas fa-calendar-plus me-2"></i>Jadwalkan Kegiatan
                                </button>
                                <button class="btn btn-light text-start">
                                    <i class="fas fa-chart-line me-2"></i>Lihat Analitik
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
