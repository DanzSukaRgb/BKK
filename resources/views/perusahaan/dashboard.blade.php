@extends('layouts.perusahaan.admin')

@section('title', 'Dashboard Perusahaan')

@section('styles')
    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #4361ee;
            --accent-color: #4cc9f0;
            --dark-color: #2b2d42;
            --light-color: #f8f9fa;
            --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
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
            margin: 10px 0;
        }

        @media (max-width: 768px) {
            .gradient-card {
                margin-bottom: 20px;
            }

            .display-6 {
                font-size: 1.8rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container py-4">
        <h2>Dashboard Perusahaan</h2>

        <div class="row g-4">
            <!-- Lowongan Aktif -->
            <div class="col-md-6">
                <div class="gradient-card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-briefcase"></i>Lowongan Aktif</h5>
                        <p class="display-6">{{$lowonganCount}}</p>
                    </div>
                </div>
            </div>

            <!-- Lamaran Masuk -->
            <div class="col-md-6">
                <div class="gradient-card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-file-alt"></i>Lamaran Masuk</h5>
                        <p class="display-6">45</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-4">
            <!-- Quick Actions -->
            <div class="col-12">
                <div class="gradient-card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-bolt"></i>Quick Actions</h5>
                        <div class="d-flex flex-wrap gap-2 mt-3">
                            <a href="{{route('perusahaan.jobs.create')}}" class="btn btn-light"><i class="fas fa-plus-circle me-2"></i>Tambah
                                Lowongan</a>
                            <a href="#" class="btn btn-light"><i class="fas fa-file-alt me-2"></i>Lihat Lamaran</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Lowongan Table -->
        <div class="row g-4 mt-4">
            <div class="col-12">
                <div class="gradient-card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-briefcase"></i>Lowongan Terbaru</h5>
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Judul Lowongan</th>
                                    <th>Departemen</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Frontend Developer</td>
                                    <td>IT</td>
                                    <td>10 Nov 2025</td>
                                    <td><span class="badge bg-success">Aktif</span></td>
                                </tr>
                                <tr>
                                    <td>Backend Developer</td>
                                    <td>IT</td>
                                    <td>8 Nov 2025</td>
                                    <td><span class="badge bg-success">Aktif</span></td>
                                </tr>
                                <tr>
                                    <td>HR Manager</td>
                                    <td>HR</td>
                                    <td>5 Nov 2025</td>
                                    <td><span class="badge bg-warning">Draft</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
