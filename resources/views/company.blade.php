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
</head>
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
    </style>
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
</nav>
</body>
</html>