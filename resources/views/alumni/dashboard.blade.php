@extends('layouts.alumni')

@section('content')
  
<!DOCTYPE html>
<html lang="id" x-data="{ isMobileSidebarOpen: false, isDesktopSidebarCollapsed: localStorage.getItem('sidebarCollapsed') === 'true' }">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BKK | SMKN 6 JEMBER - @yield('title')</title>

  <!-- Bootstrap & Font -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <!-- Alpine.js -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!-- Custom Styles -->
  <style>
    :root {
      --sidebar-bg: white; /* Changed to white for sidebar background */
      --sidebar-hover: #f0f0f0; /* Light gray for hover effects */
      --primary-color: #3498db;
      --success-color: #2ecc71;
      --warning-color: #f39c12;
      --danger-color: #e74c3c;
      --light-gray: #f8f9fa;
      --sidebar-width: 250px;
      --sidebar-collapsed-width: 70px;
      --top-navbar-height: 60px;
    }

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background-color: var(--light-gray);
      transition: margin-left 0.3s ease;
      padding-top: var(--top-navbar-height);
      font-size: clamp(0.9rem, 2.5vw, 1rem);
    }

    /* Dashboard Wrapper */
    .dashboard-wrapper {
      display: flex;
      min-height: calc(100vh - var(--top-navbar-height));
    }

    /* Sidebar Styles */
    .sidebar {
      width: var(--sidebar-width);
      background-color: var(--sidebar-bg);
      color: #333; /* Dark text for readability on white background */
      position: fixed;
      height: calc(100vh - var(--top-navbar-height));
      z-index: 1000;
      transition: all 0.3s ease;
      box-shadow: 2px 0 10px rgba(0,0,0,0.1);
      overflow-y: auto;
      top: var(--top-navbar-height);
      border-right: 1px solid rgba(0,0,0,0.1); /* Added border to distinguish from main content */
    }

    .sidebar.collapsed {
      width: var(--sidebar-collapsed-width);
    }

    .sidebar.collapsed .sidebar-header {
      padding: 1rem 0;
    }

    .sidebar.collapsed .brand-name,
    .sidebar.collapsed .nav-link span,
    .sidebar.collapsed .stat-item span {
      display: none;
    }

    .sidebar.collapsed .sidebar-logo {
      width: 2.5rem;
    }

    .sidebar.collapsed .nav-link {
      text-align: center;
      padding: 0.75rem 0;
    }

    .sidebar.collapsed .nav-link i {
      margin-right: 0;
      width: 100%;
      font-size: 1.3rem;
    }

    .sidebar.collapsed .stat-item {
      justify-content: center;
      padding: 0.625rem 0;
    }

    .sidebar-header {
      padding: clamp(0.75rem, 3vw, 1.25rem);
      text-align: center;
      border-bottom: 1px solid rgba(0,0,0,0.1); /* Darker border for visibility */
      transition: all 0.3s ease;
    }

    .sidebar-logo {
      max-width: 100%;
      width: clamp(2.5rem, 10vw, 4.375rem);
      height: auto;
      margin-bottom: 0.625rem;
      transition: all 0.3s ease;
    }

    .brand-name {
      font-weight: 600;
      font-size: clamp(0.9rem, 2.5vw, 1.1rem);
      color: #333; /* Dark text for readability */
      display: block;
      transition: all 0.3s ease;
    }

    .sidebar-stats {
      padding: clamp(0.625rem, 2vw, 0.9375rem) 0;
      border-bottom: 1px solid rgba(0,0,0,0.1); /* Darker border */
    }

    .stat-item {
      padding: clamp(0.5rem, 2vw, 0.625rem) clamp(0.75rem, 3vw, 1.25rem);
      display: flex;
      align-items: center;
      transition: all 0.3s ease;
      white-space: nowrap;
      overflow: hidden;
      color: #333; /* Dark text for stat items */
    }

    .stat-item:hover {
      background-color: var(--sidebar-hover); /* Light gray hover */
    }

    .stat-icon {
      width: 1.875rem;
      text-align: center;
      margin-right: 0.625rem;
      color: var(--primary-color); /* Keep primary color for contrast */
      flex-shrink: 0;
    }

    .sidebar-menu {
      padding: clamp(0.625rem, 2vw, 0.9375rem) 0;
    }

    .nav-link {
      color: #333; /* Dark text for readability */
      padding: clamp(0.5rem, 2vw, 0.75rem) clamp(0.75rem, 3vw, 1.25rem);
      display: flex;
      align-items: center;
      transition: all 0.3s ease;
      text-decoration: none;
      white-space: nowrap;
      overflow: hidden;
    }

    .nav-link:hover, .nav-link.active {
      background-color: var(--sidebar-hover);
      color: #333;
    }

    .nav-link i {
      width: 1.5625rem;
      text-align: center;
      margin-right: 0.625rem;
      flex-shrink: 0;
      transition: all 0.3s ease;
      color: var(--primary-color); /* Keep primary color for icons */
    }

    /* Mobile Sidebar */
    .mobile-sidebar {
      position: fixed;
      top: var(--top-navbar-height);
      left: -100%;
      width: min(80%, 18.75rem);
      height: calc(100vh - var(--top-navbar-height));
      background-color: var(--sidebar-bg);
      z-index: 1050;
      transition: all 0.3s ease;
      overflow-y: auto;
      color: #333; /* Dark text for mobile sidebar */
      border-right: 1px solid rgba(0,0,0,0.1); /* Added border */
    }

    .mobile-sidebar.active {
      left: 0;
    }

    .mobile-sidebar .brand-name {
      color: #333;
    }

    .mobile-sidebar .nav-link {
      color: #333;
    }

    .mobile-sidebar .stat-item {
      color: #333;
    }

    .mobile-sidebar .nav-link i {
      color: var(--primary-color);
    }

    /* Main Content Area */
    .main-content {
      margin-left: var(--sidebar-width);
      width: calc(100% - var(--sidebar-width));
      padding: clamp(0.75rem, 2.5vw, 1.25rem);
      transition: all 0.3s ease;
      min-height: calc(100vh - var(--top-navbar-height));
    }

    .sidebar.collapsed ~ .main-content {
      margin-left: var(--sidebar-collapsed-width);
      width: calc(100% - var(--sidebar-collapsed-width));
    }

    /* Top Navbar */
    .top-navbar {
      background-color: white;
      padding: 0;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1100;
      height: var(--top-navbar-height);
      display: flex;
      align-items: center;
      width: 100%;
      border: none;
    }

    /* Navbar content */
    .navbar-content {
      display: flex;
      width: 100%;
      justify-content: space-between;
      align-items: center;
      height: 100%;
      padding: 0 0 0 clamp(0.75rem, 3vw, 1.25rem);
      background-color: white;
    }

    /* Left section of navbar */
    .navbar-left-section {
      display: flex;
      align-items: center;
      gap: 0;
      height: 100%;
    }

    /* Right section of navbar */
    .navbar-right-section {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      height: 100%;
    }

    /* Mobile Toggle Button */
    .sidebar-toggle {
      background: none;
      color: #333; /* Changed to dark color for visibility */
      border: none;
      font-size: clamp(1.2rem, 3vw, 1.5rem);
      cursor: pointer;
      padding: 0.5rem;
      min-width: 2.75rem;
      min-height: 2.75rem;
      border-radius: 0.375rem;
      transition: all 0.3s ease;
    }

    .sidebar-toggle:hover {
      background-color: var(--light-gray);
    }

    /* Desktop toggle button */
    .desktop-toggle {
      background: none;
      color: #333; /* Changed to dark color for visibility */
      border: none;
      font-size: 1.5rem;
      cursor: pointer;
      padding: 0.5rem;
      min-width: 2.75rem;
      min-height: 2.75rem;
      border-radius: 0.375rem;
      transition: all 0.3s ease;
      display: none;
    }

    .desktop-toggle:hover {
      background-color: var(--light-gray);
    }

    /* Brand text */
    .navbar-brand-text {
      font-weight: 600;
      color: #333; /* Changed to dark color for visibility */
      font-size: clamp(1rem, 2.5vw, 1.125rem);
      margin-left: 0;
    }

    /* Profile Dropdown */
    .profile-dropdown {
      display: flex;
      align-items: center;
    }

    .profile-img {
      max-width: 100%;
      width: clamp(1.875rem, 5vw, 2.1875rem);
      height: clamp(1.875rem, 5vw, 2.1875rem);
      border-radius: 50%;
      object-fit: cover;
      margin-right: 0.625rem;
      border: 2px solid #e9ecef;
      transition: all 0.3s ease;
    }

    .profile-img:hover {
      border-color: var(--primary-color);
    }

    .dropdown-toggle::after {
      display: none;
    }

    .dropdown-toggle {
      background: none;
      border: none;
      color: #333; /* Changed to dark color for visibility */
      font-weight: 500;
      padding: 0.25rem 0.5rem;
      border-radius: 0.375rem;
      transition: all 0.3s ease;
    }

    .dropdown-toggle:hover, .dropdown-toggle:focus {
      background-color: var(--light-gray);
      color: #333;
    }

    /* Overlay */
    .overlay {
      position: fixed;
      top: var(--top-navbar-height);
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0,0,0,0.5);
      z-index: 1040;
      display: none;
    }

    .overlay.active {
      display: block;
    }

    /* Responsive Styles */
    @media (min-width: 1200px) {
      :root {
        --sidebar-width: 280px;
      }
      .main-content {
        padding: 1.5rem;
      }
    }

    @media (min-width: 992px) {
      .desktop-toggle {
        display: inline-block;
      }

      .mobile-sidebar,
      .overlay {
        display: none !important;
      }

      .sidebar-toggle {
        display: none;
      }

      .navbar-content {
        padding-left: 0;
      }

      .sidebar.collapsed ~ .top-navbar .navbar-content {
        padding-left: 0;
      }
    }

    @media (max-width: 991px) {
      .main-content {
        margin-left: 0;
        width: 100%;
      }

      .sidebar {
        display: none;
      }

      .navbar-content {
        padding-left: 0 !important;
      }

      .desktop-toggle {
        display: none;
      }
    }

    @media (max-width: 576px) {
      .main-content {
        padding: 0.5rem;
      }

      .sidebar-header {
        padding: 0.5rem;
      }

      .nav-link, .stat-item {
        padding: 0.5rem 0.75rem;
      }

      .brand-name {
        font-size: clamp(0.8rem, 2vw, 0.9rem);
      }

      .sidebar-logo {
        width: clamp(2rem, 8vw, 3rem);
      }

      .navbar-content {
        padding: 0 0.75rem;
      }

      .profile-dropdown {
        font-size: 0.875rem;
      }

      .navbar-brand-text {
        display: none;
      }


    }

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
    @yield('styles')
</head>
<body>
  
  <!-- Main Content -->
  <main class="main-content" x-bind:style="{ 'margin-left': isDesktopSidebarCollapsed ? `${var(--sidebar-collapsed-width)}` : `${var(--sidebar-width)}`, 'width': `calc(100% - ${isDesktopSidebarCollapsed ? var(--sidebar-collapsed-width) : var(--sidebar-width)})` }">

    <div class="container-fluid pt-4">
      <h2 class="mb-4">Dashboard</h2>

      <!-- Lowongan Aktif Card -->
                <div class="col">
                    <div class="gradient-card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-briefcase"></i>
                                Lowongan Aktif
                            </h5>
                            <p class="display-6">8</p>
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
                            <p class="display-6">15</p>
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
                            <p class="display-6">10</p>
                            <p class="card-text text-success">
                                <i class="fas fa-arrow-up me-1"></i>
                                <small>2.3% dari bulan lalu</small>
                            </p>
                        </div>
                    </div>
                </div>

    </div>
  </main>
</body>
</html>

@endsection