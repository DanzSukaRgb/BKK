<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>BKK | SMKN 6 JEMBER</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero-80 {
            min-height:99vh;
            background-image: url('{{ asset('assets/bg.jpg') }}');
            background-size:cover;
            background-repeat: no-repeat;
        }
        .navbar {
            position: fixed;
            width: 100%;
            z-index: 1000;
        }
        .nav-link:hover {
            color: rgb(29, 87, 212);
        }
        .h1 {
            padding-top: 180px;
            font-size: 50px;
            color:#f8f9fa;
        }
        .p{
            color: #e4e4e4;
            font-weight: 500;
        }
        .logo {
            width: 50px;
            margin-right: 17px;
        }
        .about {
            margin-left: 60px;
            text-align: justify;
        }
        .scroll-wrapper {
            overflow-x: auto;
            white-space: nowrap;
            scroll-behavior: auto;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .scroll-wrapper::-webkit-scrollbar {
            display: none;
        }
        .scroll-content > .company-card {
            display: inline-block;
            margin-right: 10px;
            vertical-align: top;
            width: 180px;
        }
        .card-img-top {
            width: 100%;
            height: auto;
            border-radius: 14px;
        }
        .company-card {
            width: 160px;
            flex: 0 0 auto;
        }
        .shadow-blue {
            box-shadow: 0 0.5rem 1rem rgba(33, 109, 190, 0.4);
        }
        .footer {
            background-color: #333e49;
            padding: 70px 0;
        }
        .footer-col {
            width: 25%;
            padding: 0 15px;
            color: #e0e0e0;
        }
        .footer-col h4 {
            font-size: 18px;
            color: #ffffff;
            text-transform: capitalize;
            margin-bottom: 30px;
            font-weight: 500;
            position: relative;
        }
        .footer-col h4::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            background-color: #beccd6;
            height: 2px;
            box-sizing: border-box;
            width: 50px;
        }
        .footer-col ul li:not(:last-child) {
            margin-bottom: 10px;
        }
        .footer-col ul li a {
            font-size: 16px;
            text-transform: capitalize;
            color: #ffffff;
            text-decoration: none;
            font-weight: 300;
            color: #bbbbbb;
            display: block;
            transition: all 0.3s ease;
        }
        .footer-col ul li a:hover {
            color: #ffffff;
            padding-left: 8px;
        }
        .footer-col .social-links a {
            display: inline-block;
            height: 40px;
            width: 40px;
            background-color: rgba(255,255,255,0.2);
            margin: 0 10px 10px 0;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            color: #ffffff;
            transition: all 0.5s ease;
        }
        .footer-col .social-links a:hover {
            color: #24262b;
            background-color: #ffffff;
        }
        .contact-info {
            font-size: 14px;
            text-align: start;
        }
        .login-page-wrapper {
            min-height: calc(100vh - 56px);
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            padding:150px;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .register-page-wrapper {
            min-height: calc(100vh - 56px);
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            padding:150px;
        }

        .register-card {
            width: 100%;
            max-width: 500px;
            padding: 30px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
    @yield('styles')
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
                    <li class="nav-item"><a class="nav-link fw-bold" href="/#tentang">Profil</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('perusahaan.public') }}">Perusahaan</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="/#kegiatan">Informasi</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="{{route('kegiatan.public')}}">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('lowongan.public') }}">Lowongan</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="{{route('contact')}}">Kontak</a></li>
                    @guest
        <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('login') }}">Login</a></li>
    @endguest
    @auth

    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Tautan Cepat</h4>
                    <ul>
                        <li><a href="#beranda">Beranda</a></li>
                        <li><a href="#lowongan">Lowongan</a></li>
                        <li><a href="#kontak">Kontak</a></li>
                        <li><a href="#kegiatan">Informasi</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get Help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Order Status</a></li>
                        <li><a href="#">Payment Option</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Informasi Kontak</h4>
                    <div class="contact-info">
                        <p><i class="fas fa-map-marker-alt"></i> JL. PB. SUDIRMAN NO. 114 TANGGUL-JEMBER, Tanggul Kulon, Kec. Tanggul, Kab. Jember Prov. Jawa Timur</p>
                        <p><i class="fas fa-phone-alt"></i> 0336441347</p>
                        <p><i class="fas fa-envelope"></i> smkn6.jember@yahoo.com</p>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/smkn6jember/"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('scrollContainer');
            const content = container.querySelector('.scroll-content');

            // Gandakan konten untuk efek scroll infinite
            content.innerHTML += content.innerHTML;

            const scrollSpeed = 3; // kecepatan scroll pixel per tick
            const tickInterval = 15; // ms per tick
            // const pauseDuration = 3000; // lama berhenti dalam ms

            let scrolling = true;

            function autoScroll() {
                if (!scrolling) return;

                if (container.scrollLeft >= content.scrollWidth / 2) {
                    container.scrollLeft = 0;
                } else {
                    container.scrollLeft += scrollSpeed;
                }
            }

            let intervalId = setInterval(autoScroll, tickInterval);

            function toggleScroll() {
                if (scrolling) {
                    scrolling = false;
                    clearInterval(intervalId);
                    setTimeout(() => {
                        scrolling = true;
                        intervalId = setInterval(autoScroll, tickInterval);
                    }, pauseDuration);
                }
            }

            setInterval(toggleScroll, pauseDuration + 1500);
        });
    </script>
</body>
</html>
