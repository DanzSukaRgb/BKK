@extends('alumni.admin')

@section('title', 'Dashboard Alumni')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root {
        --primary-color: #4361ee;
        --accent-color: #4cc9f0;
        --dark-color: #2b2d42;
        --light-color: #f8f9fa;
        --card-shadow: 0 4px 20px rgba(0,0,0,0.08);
        --transition: all 0.3s cubic-bezier(0.25,0.8,0.25,1);
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: #f5f7fb;
        color: #4a4a4a;
    }

    h2 {
        font-weight: 600;
        color: var(--dark-color);
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 10px;
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

    .gradient-card {
        background: white;
        border-radius: 12px;
        box-shadow: var(--card-shadow);
        transition: var(--transition);
        overflow: hidden;
        position: relative;
        padding: 20px;
    }

    .gradient-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
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
        margin: 10px 0;
    }

    @media (max-width: 768px) {
        .gradient-card { margin-bottom: 20px; }
        .display-6 { font-size: 1.8rem; }
    }
</style>
@endsection

@section('content')
<div class="container py-4">
    <h2>Dashboard Alumni</h2>

    <div class="row g-4">
        <!-- Lowongan Tersedia -->
        <div class="col-md-3">
            <div class="gradient-card">
                <h5 class="card-title"><i class="fas fa-briefcase"></i>Lowongan Tersedia</h5>
                <p class="display-6">15</p>
                <p class="card-text text-success"><i class="fas fa-arrow-up me-1"></i>+3 dari minggu lalu</p>
            </div>
        </div>

        <!-- Perusahaan Favorit -->
        <div class="col-md-3">
            <div class="gradient-card">
                <h5 class="card-title"><i class="fas fa-star"></i>Perusahaan Favorit</h5>
                <p class="display-6">3</p>
                <p class="card-text text-warning">Favorit Anda</p>
            </div>
        </div>
    </div>

    <!-- Daftar Lowongan -->
    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="gradient-card">
                <h5 class="card-title"><i class="fas fa-briefcase"></i>Daftar Lowongan</h5>
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Perusahaan</th>
                                <th>Posisi</th>
                                <th>Lokasi</th>
                                <th>Batas Waktu</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PT Maju Jaya</td>
                                <td>Web Developer</td>
                                <td>Jember</td>
                                <td>30 Nov 2025</td>
                                <td><span class="badge bg-success">Buka</span></td>
                            </tr>
                            <tr>
                                <td>PT Sejahtera</td>
                                <td>Marketing</td>
                                <td>Jember</td>
                                <td>15 Des 2025</td>
                                <td><span class="badge bg-success">Buka</span></td>
                            </tr>
                            <tr>
                                <td>CV Kreatif</td>
                                <td>Graphic Designer</td>
                                <td>Jember</td>
                                <td>10 Nov 2025</td>
                                <td><span class="badge bg-danger">Tutup</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
