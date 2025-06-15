<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>BKK | SMKN 6 JEMBER</title>
    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #198754;
            --dark-color: #333e49;
            --light-color: #f8f9fa;
            --text-color: #333;
            --text-light: #e4e4e4;
            --shadow-blue: 0 0.5rem 1rem rgba(33, 109, 190, 0.4);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            overflow-x: hidden;
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            background-image: url('assets/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            padding: 60px 0;
            position: relative;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .hero-section .container {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 3rem;
            font-weight:700;
            color: var(--light-color);
            margin-bottom: 1.5rem;
            line-height: 1.2;
            font-weight: bold;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--text-light);
            font-weight: 500;
            margin-bottom: 2rem;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        /* About Section */
        .about-section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 3rem;
            color: var(--text-color);
        }

        .about-content {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
            align-items: flex-start;
        }

        .about-text {
            flex: 1;
            min-width: 300px;
            line-height: 1.8;
            font-size: 1rem;
            text-align: justify;
        }

        .about-image {
            flex: 0 0 auto;
            max-width: 270px;
        }

        .about-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        /* Company Section */
        .company-section {
            padding: 80px 0;
            background-color: var(--light-color);
        }

        .company-scroller {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: none;
            scrollbar-width: none;
            padding: 20px 0;
        }

        .company-scroller::-webkit-scrollbar {
            display: none;
        }

        .company-track {
            display: flex;
            gap: 15px;
            width: max-content;
            animation: scroll 30s linear infinite;
        }

        .company-card {
            flex: 0 0 180px;
            padding: 15px;
            background: white;
            border-radius: 14px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .company-logo {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        /* Stats Section */
        .stats-section {
            padding: 80px 0;
            background-color: var(--light-color);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .stat-card {
            background: white;
            color: var(--text-color);
            padding: 30px 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: var(--shadow-blue);
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1rem;
            margin: 0;
        }

        /* Activities Section */
        .activities-section {
            padding: 80px 0;
            background-color: var(--light-color);
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-subtitle {
            color: #666;
            font-size: 1.1rem;
        }

        .activities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .activity-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: var(--transition);
        }

        .activity-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .activity-card .card-body {
            padding: 25px;
        }

        .activity-card .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .activity-card .card-text {
            color: #666;
            margin-bottom: 20px;
        }

        /* Gallery Section */
        .gallery-section {
            padding: 80px 0;
            background-color: white;
        }

        .filter-section {
            padding: 0 0 40px 0;
        }

        .filter-tabs {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filter-btn {
            background: transparent;
            border: 1px solid #e2e8f0;
            color: #64748b;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .filter-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .filter-btn.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }

        .gallery-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .gallery-item {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .gallery-item.hidden {
            opacity: 0;
            transform: translateY(20px);
            pointer-events: none;
        }

        .gallery-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 1px 2px 0 rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            height: 100%;
        }

        .gallery-card:hover {
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
            transform: translateY(-4px);
            border-color: rgba(13, 110, 253, 0.2);
        }

        .card-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-card:hover .card-image {
            transform: scale(1.02);
        }

        .card-content {
            padding: 20px;
        }

        .card-category {
            display: inline-block;
            background: rgba(13, 110, 253, 0.1);
            color: var(--primary-color);
            font-size: 12px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 50px;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .card-description {
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 16px;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-date {
            color: #64748b;
            font-size: 13px;
            font-weight: 500;
        }

        .card-action {
            background: transparent;
            border: 1px solid #e2e8f0;
            color: var(--primary-color);
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .card-action:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-1px);
            text-decoration: none;
        }

        .load-more-container {
            text-align: center;
            margin-top: 30px;
        }

        .load-more-btn {
            background: var(--primary-color);
            border: none;
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }

        .load-more-btn:hover {
            background: #0b5ed7;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
        }

        /* Navbar */
        .navbar {
            position: fixed;
            width: 100%;
            z-index: 1000;
            transition: var(--transition);
            background-color: transparent !important;
            padding: 20px 0;
        }

        .navbar.scrolled {
            background-color: white !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
        }

        .nav-link {
            color: rgba(41, 41, 41, 0.8) !important;
            transition: var(--transition);
            font-weight: 500;
            padding: 8px 15px !important;
        }

        .navbar.scrolled .nav-link {
            color: rgba(0, 0, 0, 0.7) !important;
        }

        .navbar-brand {
            color: rgb(21, 72, 139) !important;
            font-weight: 700;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .navbar.scrolled .navbar-brand {
            color: var(--primary-color) !important;
        }

        .nav-link:hover {
            color: rgb(0, 0, 0) !important;
        }

        .navbar.scrolled .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .logo {
            width: 40px;
            height: auto;
            margin-right: 10px;
            transition: var(--transition);
        }

        .navbar.scrolled .logo {
            filter: none;
        }

        /* Footer */
        .footer {
            background-color: var(--dark-color);
            padding: 70px 0 30px;
            color: #e0e0e0;
        }

        .footer-col {
            margin-bottom: 40px;
        }

        .footer-col h4 {
            font-size: 1.125rem;
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
            width: 50px;
        }

        .footer-col ul {
            list-style: none;
            padding: 0;
        }

        .footer-col ul li:not(:last-child) {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            font-size: 0.875rem;
            text-transform: capitalize;
            color: #bbbbbb;
            text-decoration: none;
            font-weight: 300;
            display: block;
            transition: var(--transition);
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
            transition: var(--transition);
        }

        .footer-col .social-links a:hover {
            color: var(--dark-color);
            background-color: #ffffff;
        }

        .contact-info {
            font-size: 0.875rem;
        }

        .contact-info p {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
        }

        .contact-info i {
            margin-right: 10px;
            margin-top: 3px;
        }

        /* Filter Section */
        .filter-section {
            margin-top:50px;
            background: #ffffff;
        }

        .filter-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .filter-tabs {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 0;
        }

        .filter-btn {
            background: transparent;
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            cursor: pointer;
            white-space: nowrap;
        }

        .filter-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateY(-1px);
        }

        .filter-btn.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            box-shadow: var(--shadow-md);
        }

        /* Gallery Section */
        .gallery-section {
            padding: 2rem 0 4rem;
            background: #ffffff;
        }

        .gallery-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .gallery-item {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .gallery-item.hidden {
            display: none !important;
        }

        .gallery-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            height: 100%;
        }

        .gallery-card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
            border-color: rgba(37, 99, 235, 0.2);
        }

        .card-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-card:hover .card-image {
            transform: scale(1.02);
        }

        .card-content {
            padding: 1.5rem;
        }

        .card-category {
            display: inline-block;
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary-color);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            margin-bottom: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .card-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .card-description {
            color: var(--text-secondary);
            font-size: 0.875rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-date {
            color: var(--text-secondary);
            font-size: 0.8rem;
            font-weight: 500;
        }

        .card-action {
            background: transparent;
            border: 1px solid var(--border-color);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .card-action:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-1px);
            text-decoration: none;
        }

        /* Load More Button */
        .load-more-container {
            text-align: center;
        }

        .load-more-btn {
            background: var(--primary-color);
            border: none;
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: var(--shadow-md);
        }

        .load-more-btn:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* Modal Styles */
        .modal-content {
            border: none;
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 600;
            color: var(--text-primary);
        }

        .btn-close {
            background: none;
            border: none;
            opacity: 0.6;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-image {
            border-radius: 12px;
            max-height: 400px;
            object-fit: cover;
        }

        .modal-description {
            color: var(--text-secondary);
            line-height: 1.6;
            margin-top: 1rem;
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
            padding: 1rem 1.5rem;
        }

        .btn-secondary {
            background: var(--surface-color);
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            border-radius: 8px;
            font-weight: 500;
        }
        .auth-page-wrapper {
            min-height: 100vh;
            background: linear-gradient(to right, #e0ecff, #f7f9fc);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .auth-card {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 400px;
        }

        .auth-card h4 {
            font-weight: 600;
            color: #0d6efd;
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #084cd6;
            border-color: #084cd6;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #842029;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
        }

        .invalid-feedback {
            font-size: 0.9rem;
            color: #dc3545;
        }

        .text-decoration-none {
            color: #0d6efd;
            transition: 0.2s;
        }

        .text-decoration-none:hover {
            color: #063aab;
            text-decoration: underline;
        }

        .form-check-label {
            color: #555;
        }

        /* Animation */
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* Responsive Adjustments */
        @media (max-width: 1200px) {
            .hero-title {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.2rem;
                padding-top: 120px;
            }

            .about-content {
                flex-direction: column;
                align-items: center;
            }

            .about-text {
                min-width: 100%;
                order: 2;
            }

            .about-image {
                order: 1;
                margin-bottom: 30px;
            }

            .navbar-collapse {
                background-color: white;
                padding: 20px;
                border-radius: 10px;
                margin-top: 10px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            }

            .navbar-collapse .nav-link {
                color: #333 !important;
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 1.75rem;
                margin-bottom: 2rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .stat-number {
                font-size: 2rem;
            }

            .footer-col {
                width: 50%;
            }
        }


        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.8rem;
                padding-top: 100px;
            }

            .hero-buttons .btn {
                width: 100%;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .footer-col {
                width: 100%;
            }

            .company-card {
                flex: 0 0 150px;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 400px) {
            .hero-title {
                font-size: 1.5rem;
            }

            .activities-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/logo.png') }}" alt="logo" class="logo">SMKN 6 JEMBER
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#tentang">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('perusahaan.public') }}">Perusahaan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('kegiatan.public')}}">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('lowongan.public') }}">Lowongan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Kontak</a></li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            {{-- Link ke Dashboard Admin --}}
                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    <i class="fas fa-user-tie me-2"></i> Admin
                                </a>
                            </li>

                            {{-- Tombol Logout --}}
                            <li>
                                <a class="dropdown-item" href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>

                    </li>
                @endguest
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
                <div class="col-lg-3 col-md-6 footer-col">
                    <h4>Tautan Cepat</h4>
                    <ul>
                        <li><a href="{{route('home')}}">Beranda</a></li>
                        <li><a href="/#tentang">Profil</a></li>
                        <li><a href="{{ route('perusahaan.public') }}">Perusahaan</a></li>
                        <li><a href="{{route('kegiatan.public')}}">Kegiatan</a></li>
                        <li><a href="{{ route('lowongan.public') }}">Lowongan</a></li>
                        <li><a href="{{route('contact')}}">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-col">
                    <h4>Bantuan</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="#">Panduan</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-col">
                    <h4>Informasi Kontak</h4>
                    <div class="contact-info">
                        <p><i class="fas fa-map-marker-alt"></i> JL. PB. SUDIRMAN NO. 114 TANGGUL-JEMBER, Tanggul Kulon, Kec. Tanggul, Kab. Jember Prov. Jawa Timur</p>
                        <p><i class="fas fa-phone-alt"></i> 0336441347</p>
                        <p><i class="fas fa-envelope"></i> smkn6.jember@yahoo.com</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-col">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com/facebook/?locale=id_ID"><i class="fab fa-facebook"></i></a>
                        <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/smkn6jember/"><i class="fab fa-instagram"></i></a>
                        <a href="https://id.linkedin.com/"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-4">
                    <p class="mb-0">&copy; 2023 BKK SMKN 6 Jember. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile menu close when clicked
        const navLinks = document.querySelectorAll('.nav-link');
        const navbarCollapse = document.querySelector('.navbar-collapse');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                    bsCollapse.hide();
                }
            });
        });

        // Auto-scrolling for company logos
        document.addEventListener('DOMContentLoaded', () => {
            const track = document.querySelector('.company-track');
            if (track) {
                // Duplicate content for seamless looping
                track.innerHTML += track.innerHTML;

                // Animation for auto-scrolling
                let animation;
                const speed = 1;
                let position = 0;

                function animate() {
                    position -= speed;
                    if (position <= -track.scrollWidth / 2) {
                        position = 0;
                    }
                    track.style.transform = `translateX(${position}px)`;
                    animation = requestAnimationFrame(animate);
                }

                animate();

                // Pause on hover
                track.addEventListener('mouseenter', () => {
                    cancelAnimationFrame(animation);
                });

                track.addEventListener('mouseleave', () => {
                    animate();
                });
            }
        });

        // Gallery filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const galleryItems = document.querySelectorAll('.gallery-item');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    const filterValue = this.getAttribute('data-filter');

                    // Filter items with smooth animation
                    galleryItems.forEach((item, index) => {
                        setTimeout(() => {
                            if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                                item.classList.remove('hidden');
                            } else {
                                item.classList.add('hidden');
                            }
                        }, index * 50);
                    });
                });
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
