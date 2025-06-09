<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perusahaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    .hero-80 {
        min-height: 91vh;
        background-image: url('{{ asset('assets/bg.webp') }}');
    }
    .navbar {
        position: fixed;
        width: 100%;
        z-index: 1;
    }
    .nav-link:hover {
        color: rgb(29, 87, 212);
    }
    .logo {
            width: 50px;
            margin-right: 17px;
    }
    .card-title{
        color: rgb(42, 75, 223);
    }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary mt-1" href="#">
            <img src="{{ asset('assets/logo.png') }}" alt="logo" class="logo">SMKN 6 JEMBER
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link fw-bold" href="{{route('home')}}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="#tentang">Profil</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="{{route('company')}}">Perusahaan</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="#kegiatan">Informasi</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="#lowongan">Lowongan</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="#kontak">Kontak</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="{{route('login')}}">Login</a></li>
            </ul>
        </div>
    </div>
</nav><br>
<!-- Content -->
<div class="container py-5" style="margin-top: 80px;">
    <h2 class="text-center mb-4">Data Perusahaan</h2>
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="company-icon me-3"><i class="fas fa-building fa-2x"></i></div>
                        <div>
                            <h5 class="card-title mb-0">PT. Tech Solutions</h5>
                            <p class="text-muted small mb-0">Technology & Software</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1"><i class="fas fa-users me-2"></i>250+ Employees</p>
                        <p class="mb-1"><i class="fas fa-map-marker-alt me-2"></i>Jakarta, Indonesia</p>
                        <p class="mb-1"><i class="fas fa-phone me-2"></i>+62 21 5555 8888</p>
                        <p class="mb-1"><i class="fas fa-envelope me-2"></i>contact@techsolutions.com</p>
                    </div>
                    <button class="btn btn-primary w-100">
                        View Details <i class="fas fa-chevron-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Card 2 (copy & modify as needed) -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="company-icon me-3"><i class="fas fa-building fa-2x"></i></div>
                        <div>
                            <h5 class="card-title mb-0">PT. Media Nusantara</h5>
                            <p class="text-muted small mb-0">Media & Broadcasting</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1"><i class="fas fa-users me-2"></i>500+ Employees</p>
                        <p class="mb-1"><i class="fas fa-map-marker-alt me-2"></i>Surabaya, Indonesia</p>
                        <p class="mb-1"><i class="fas fa-phone me-2"></i>+62 31 9999 1234</p>
                        <p class="mb-1"><i class="fas fa-envelope me-2"></i>info@medianusantara.com</p>
                    </div>
                    <button class="btn btn-primary w-100">
                        View Details <i class="fas fa-chevron-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="company-icon me-3"><i class="fas fa-building fa-2x"></i></div>
                        <div>
                            <h5 class="card-title mb-0">PT. Green Energy</h5>
                            <p class="text-muted small mb-0">Energy & Environment</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1"><i class="fas fa-users me-2"></i>120+ Employees</p>
                        <p class="mb-1"><i class="fas fa-map-marker-alt me-2"></i>Bandung, Indonesia</p>
                        <p class="mb-1"><i class="fas fa-phone me-2"></i>+62 22 4444 5678</p>
                        <p class="mb-1"><i class="fas fa-envelope me-2"></i>support@greenenergy.co.id</p>
                    </div>
                    <button class="btn btn-primary w-100">
                        View Details <i class="fas fa-chevron-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="company-icon me-3"><i class="fas fa-building fa-2x"></i></div>
                        <div>
                            <h5 class="card-title mb-0">PT. Green Energy</h5>
                            <p class="text-muted small mb-0">Energy & Environment</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1"><i class="fas fa-users me-2"></i>120+ Employees</p>
                        <p class="mb-1"><i class="fas fa-map-marker-alt me-2"></i>Bandung, Indonesia</p>
                        <p class="mb-1"><i class="fas fa-phone me-2"></i>+62 22 4444 5678</p>
                        <p class="mb-1"><i class="fas fa-envelope me-2"></i>support@greenenergy.co.id</p>
                    </div>
                    <button class="btn btn-primary w-100">
                        View Details <i class="fas fa-chevron-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="company-icon me-3"><i class="fas fa-building fa-2x"></i></div>
                        <div>
                            <h5 class="card-title mb-0">PT. Green Energy</h5>
                            <p class="text-muted small mb-0">Energy & Environment</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1"><i class="fas fa-users me-2"></i>120+ Employees</p>
                        <p class="mb-1"><i class="fas fa-map-marker-alt me-2"></i>Bandung, Indonesia</p>
                        <p class="mb-1"><i class="fas fa-phone me-2"></i>+62 22 4444 5678</p>
                        <p class="mb-1"><i class="fas fa-envelope me-2"></i>support@greenenergy.co.id</p>
                    </div>
                    <button class="btn btn-primary w-100">
                        View Details <i class="fas fa-chevron-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="company-icon me-3"><i class="fas fa-building fa-2x"></i></div>
                        <div>
                            <h5 class="card-title mb-0">PT. Green Energy</h5>
                            <p class="text-muted small mb-0">Energy & Environment</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1"><i class="fas fa-users me-2"></i>120+ Employees</p>
                        <p class="mb-1"><i class="fas fa-map-marker-alt me-2"></i>Bandung, Indonesia</p>
                        <p class="mb-1"><i class="fas fa-phone me-2"></i>+62 22 4444 5678</p>
                        <p class="mb-1"><i class="fas fa-envelope me-2"></i>support@greenenergy.co.id</p>
                    </div>
                    <button class="btn btn-primary w-100">
                        View Details <i class="fas fa-chevron-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Tambah card lain jika diperlukan -->
    </div>
</div>
</body>
</html>