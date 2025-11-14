<!DOCTYPE html>
<html lang="id" x-data="{ isMobileSidebarOpen: false, isDesktopSidebarCollapsed: localStorage.getItem('sidebarCollapsed') === 'true' }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKK | SMKN 6 JEMBER - @yield('title')</title>

    <!-- Bootstrap & Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Custom Styles (Serasi dengan Dashboard Perusahaan) -->
    <style>
        :root {
            --primary-color: #4361ee;
            --accent-color: #4cc9f0;
            --light-gray: #f5f7fb;
            --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --sidebar-bg: #fff;
            --sidebar-hover: #f0f0f0;
            --sidebar-width: 250px;
            --sidebar-collapsed-width: 70px;
            --top-navbar-height: 60px;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --dark-color: #2b2d42;
        }

        /* Body */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-gray);
            color: #4a4a4a;
            margin: 0;
            padding-top: var(--top-navbar-height);
            transition: margin-left 0.3s ease;
        }

        /* Titles */
        h1,
        h4 {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
        }

        h1::after,
        h4::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: var(--top-navbar-height);
            left: 0;
            width: var(--sidebar-width);
            height: calc(100vh - var(--top-navbar-height));
            background-color: var(--sidebar-bg);
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            z-index: 1000;
            transition: width 0.3s ease;
            border-right: 1px solid rgba(0, 0, 0, 0.1);
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        .sidebar-header {
            text-align: center;
            padding: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .sidebar-logo {
            width: 80px;
            margin-bottom: 0.5rem;
        }

        .brand-name {
            font-weight: 600;
            font-size: 1rem;
            display: block;
        }

        .sidebar-menu {
            margin-top: 1rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: #333;
            text-decoration: none;
            transition: 0.2s;
        }

        .nav-link i {
            margin-right: 0.75rem;
            width: 1.25rem;
            text-align: center;
            color: var(--primary-color);
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: var(--sidebar-hover);
            color: #333;
        }

        /* Top Navbar */
        .top-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--top-navbar-height);
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            z-index: 1100;
        }

        .profile-dropdown img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 0.5rem;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 1rem;
            transition: margin-left 0.3s ease;
        }

        .sidebar.collapsed~.main-content {
            margin-left: var(--sidebar-collapsed-width);
        }

        /* Dashboard Cards */
        .dashboard-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 20px;
            transition: var(--transition);
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .dashboard-card .card-title {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .dashboard-card .card-title i {
            margin-right: 10px;
            font-size: 1.25rem;
            color: var(--primary-color);
        }

        .dashboard-card .card-value {
            font-size: 2.2rem;
            font-weight: 700;
            margin-top: 5px;
            color: var(--dark-color);
        }

        /* Table */
        .table thead th {
            font-weight: 600;
            color: var(--dark-color);
        }

        .badge {
            font-size: 0.85em;
            padding: 0.45em 0.75em;
            border-radius: 12px;
        }

        /* Mobile Sidebar */
        .mobile-sidebar {
            position: fixed;
            top: var(--top-navbar-height);
            left: -100%;
            width: 250px;
            height: calc(100vh - var(--top-navbar-height));
            background-color: var(--sidebar-bg);
            z-index: 1050;
            transition: left 0.3s ease;
            overflow-y: auto;
            border-right: 1px solid rgba(0, 0, 0, 0.1);
        }

        .mobile-sidebar.active {
            left: 0;
        }

        .overlay {
            position: fixed;
            top: var(--top-navbar-height);
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            display: none;
        }

        .overlay.active {
            display: block;
        }

        @media (max-width: 991px) {
            .main-content {
                margin-left: 0;
            }

            .sidebar {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Top Navbar -->
    <nav class="top-navbar">
        <div class="d-flex align-items-center">
            <button class="btn btn-light d-lg-none me-2" @click="isMobileSidebarOpen = !isMobileSidebarOpen"><i
                    class="fas fa-bars"></i></button>
            <span class="fw-bold">BKK SMKN 6 JEMBER</span>
        </div>
        <div class="profile-dropdown dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <span>{{ Auth::user()->name ?? 'Alumni' }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li><a class="dropdown-item" href="{{route('home')}}">Home</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit"
                            class="dropdown-item">Logout</button></form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Mobile Sidebar Overlay -->
    <div class="overlay" x-show="isMobileSidebarOpen" @click="isMobileSidebarOpen = false"></div>

    <!-- Mobile Sidebar -->
    <aside class="mobile-sidebar" x-show="isMobileSidebarOpen" x-transition>
        <div class="sidebar-header">
            <img src="{{ asset('image/logosmk (1).png') }}" alt="Logo" class="sidebar-logo">
            <span class="brand-name">SMKN 6 JEMBER</span>
        </div>
        <div class="sidebar-menu">
            <a href="#" class="nav-link"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
            <a href="#" class="nav-link"><i class="fas fa-file-alt"></i>Lowongan</a>
            <a href="#" class="nav-link"><i class="fas fa-briefcase"></i>Lamaran</a>
            <a href="#" class="nav-link"><i class="fas fa-user"></i>Profil</a>
        </div>
    </aside>

    <!-- Desktop Sidebar -->
    <aside class="sidebar d-none d-lg-block" x-bind:class="{ 'collapsed': isDesktopSidebarCollapsed }">
        <div class="sidebar-header">
            <img src="{{ asset('image/logosmk (1).png') }}" alt="Logo" class="sidebar-logo">
            <span class="brand-name">SMKN 6 JEMBER</span>
        </div>
        <div class="sidebar-menu">
            <a href="#" class="nav-link active"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
            <a href="#" class="nav-link"><i class="fas fa-file-alt"></i>Lowongan</a>
            <a href="#" class="nav-link"><i class="fas fa-briefcase"></i>Lamaran</a>
            <a href="#" class="nav-link"><i class="fas fa-user"></i>Profil</a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container-fluid">
            <h1 class="mb-4">Selamat Datang, Alumni!</h1>
            <div class="row g-4">
                <!-- Card 1: Lowongan Tersedia -->
                <div class="col-md-6">
                    <div class="dashboard-card">
                        <h5 class="card-title"><i class="fas fa-briefcase"></i>Lowongan Tersedia</h5>
                        <div class="card-value">15</div>
                    </div>
                </div>

                <!-- Card 2: Jumlah Lamaran -->
                <div class="col-md-6">
                    <div class="dashboard-card">
                        <h5 class="card-title"><i class="fas fa-envelope"></i>Jumlah Lamaran</h5>
                        <div class="card-value">3</div>
                    </div>
                </div>
            </div>


            <!-- Table Daftar Lowongan -->
            <div class="mt-5">
                <h4>Daftar Lowongan</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
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
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
