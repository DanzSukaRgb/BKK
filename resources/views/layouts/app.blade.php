<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKK | SMKN 6 JEMBER - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #f8f9fa;
        }

        .navbar {
            position: fixed;
            width: 100%;
            z-index: 2;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .content {
            padding-top: 100px;
            padding-bottom: 50px;
            min-height: calc(100vh - 200px);
        }

        @yield('styles')
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary mt-1" href="{{ route('home') }}">
                <img src="{{ asset('assets/logo.png') }}" alt="logo" style="width: 50px; margin-right: 10px;">
                SMKN 6 JEMBER
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('home') }}#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('home') }}#tentang">Profil</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="">Perusahaan</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="">Informasi</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="">Lowongan</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('home') }}#kontak">Kontak</a></li>
                    @auth
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="nav-link fw-bold btn btn-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('login') }}">Login</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
