@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('styles')
<style>
    /* Style sama seperti sebelumnya, langsung pakai aja */
    .gradient-card {
        background: linear-gradient(135deg, #2c3e50, #34495e);
        color: white;
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        width: 100%;
        box-sizing: border-box;
    }
    .gradient-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    .tab-content {
        background: #f8f9fa;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .nav-tabs .nav-link {
        color: #2c3e50;
        font-weight: 500;
        transition: background 0.3s ease, color 0.3s ease;
        padding: 10px 20px;
    }
    .nav-tabs .nav-link:hover {
        background-color: #e9ecef;
        color: #34495e;
    }
    .nav-tabs .nav-link.active {
        color: #34495e;
        border-color: #34495e;
        background-color: #f8f9fa;
    }
    .card-body {
        font-size: 0.95em;
        padding: 15px 20px;
    }
    .card-title, .card-text {
        margin-bottom: 10px;
    }
    .btn-light {
        background-color: #f8f9fa;
        border-color: #34495e;
        color: #2c3e50;
        padding: 5px 15px;
    }
    .btn-light:hover {
        background-color: #34495e;
        color: white;
    }
    @media (max-width: 768px) {
        .gradient-card {
            margin-bottom: 15px;
        }
        .nav-tabs {
            flex-wrap: nowrap;
            overflow-x: auto;
            white-space: nowrap;
        }
        .container {
            padding-left: 0;
            padding-right: 0;
        }
        .nav-tabs .nav-link {
            padding: 5px 15px;
        }
        .card-body {
            padding: 10px 15px;
        }
    }
    @media (max-width: 576px) {
        .nav-tabs .nav-link {
            font-size: 0.9em;
            padding: 5px 10px;
        }
        .gradient-card .card-body {
            padding: 10px 15px;
        }
        .card-title {
            font-size: 1em;
        }
        .card-text {
            font-size: 0.85em;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <h2 class="mb-4">Dashboard</h2>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-3" id="dashboardTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="lowongan-tab" data-bs-toggle="tab" data-bs-target="#lowongan" type="button" role="tab">Lowongan Terbaru</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="lamaran-tab" data-bs-toggle="tab" data-bs-target="#lamaran" type="button" role="tab">Lamaran Terbaru</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="summary-tab" data-bs-toggle="tab" data-bs-target="#summary" type="button" role="tab">Ringkasan</button>
        </li>
    </ul>

    <div class="tab-content" id="dashboardTabsContent">
        <!-- Tab: Lowongan Terbaru -->
        <div class="tab-pane fade show active" id="lowongan" role="tabpanel" aria-labelledby="lowongan-tab">
            <div class="row">
                @forelse ($recentLowongan as $lowongan)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card gradient-card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $lowongan->judul }}</h5>
                                <p class="card-text">{{ Str::limit($lowongan->deskripsi, 100) }}</p>
                                <p class="card-text">
                                    <small>
                                        Dibuat
                                        {{ $lowongan->created_at ? $lowongan->created_at->diffForHumans() : 'Tanggal tidak tersedia' }}
                                    </small>
                                </p>

                                {{-- <a href="{{ route('lowongan.show', $lowongan->id) }}" class="btn btn-light btn-sm">Lihat Detail</a> --}}
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Tidak ada lowongan terbaru.</p>
                @endforelse
            </div>
        </div>

        <!-- Tab: Lamaran Terbaru -->
        <div class="tab-pane fade" id="lamaran" role="tabpanel" aria-labelledby="lamaran-tab">
            <div class="row">
                @forelse ($recentLamaran as $lamaran)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card gradient-card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $lamaran->nama_pelamar }}</h5>
                                <p class="card-text">Posisi: {{ $lamaran->lowongan->judul ?? '-' }}</p>
                                <p class="card-text"><small>Dikirim {{ $lamaran->created_at->diffForHumans() }}</small></p>
                                <a href="{{ route('lamaran.show', $lamaran->id) }}" class="btn btn-light btn-sm">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Tidak ada lamaran terbaru.</p>
                @endforelse
            </div>
        </div>

        <!-- Tab: Ringkasan -->
        <div class="tab-pane fade" id="summary" role="tabpanel" aria-labelledby="summary-tab">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card gradient-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Alumni</h5>
                            <p class="card-text display-6">{{ $alumniCount }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card gradient-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Perusahaan</h5>
                            <p class="card-text display-6">{{ $perusahaanCount }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card gradient-card">
                        <div class="card-body">
                            <h5 class="card-title">Lowongan Aktif</h5>
                            <p class="card-text display-6">{{ $lowonganCount }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card gradient-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Lamaran</h5>
                            <p class="card-text display-6">{{ $lamaranCount }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card gradient-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Kegiatan</h5>
                            <p class="card-text display-6">{{ $kegiatanCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End tab-content -->
</div>
@endsection
