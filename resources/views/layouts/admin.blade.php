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

    </style>
    @yield('styles')
</head>
<body>
  <!-- Top Navbar -->
  <nav class="top-navbar">
    <div class="navbar-content">
      <div class="navbar-left-section">
        <!-- Mobile Toggle Button -->
        <button x-show="!isDesktopSidebarCollapsed && window.innerWidth < 992" class="sidebar-toggle" @click="isMobileSidebarOpen = !isMobileSidebarOpen">
          <i class="fas fa-bars"></i>
        </button>
        <!-- Desktop Toggle Button -->
        <button x-show="window.innerWidth >= 992" class="desktop-toggle" @click="isDesktopSidebarCollapsed = !isDesktopSidebarCollapsed; localStorage.setItem('sidebarCollapsed', isDesktopSidebarCollapsed)">
          <i class="fas fa-bars"></i>
        </button>
        <span class="navbar-brand-text d-none d-sm-inline">BKK SMKN 6 JEMBER</span>
      </div>
      <div class="navbar-right-section">
        <div class="profile-dropdown">
          <!-- Updated avatar display to match ProfileController -->
          <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('images/default-avatar.webp') }}"
               alt="Profile"
               class="profile-img"
               onerror="this.src='{{ asset('images/default-avatar.webp') }}'">
          <div class="dropdown">
            <button class="btn dropdown-toggle me-3" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="d-none d-sm-inline me-3">{{ Auth::user()->name }}</span>
              <span class="d-sm-none"><i class="fas fa-user"></i></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
              <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user me-2"></i> Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                  </button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Mobile Sidebar Overlay -->
  <div class="overlay" x-show="isMobileSidebarOpen" @click="isMobileSidebarOpen = false"></div>

  <!-- Mobile Sidebar -->
  <aside class="mobile-sidebar" x-show="isMobileSidebarOpen" x-transition>
    <div class="sidebar-header">
      <img src="{{ asset('image/logosmk (1).png') }}" alt="SMKN 6 JEMBER" class="sidebar-logo">
      <span class="brand-name">SMKN 6 JEMBER</span>
    </div>

    <div class="sidebar-stats">
      <div class="stat-item">
        <div class="stat-icon"><i class="fas fa-users"></i></div>
        <span>Alumni: {{ $alumniCount }}</span>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><i class="fas fa-building"></i></div>
        <span>Perusahaan: {{ $perusahaanCount }}</span>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><i class="fas fa-briefcase"></i></div>
        <span>Lowongan: {{ $lowonganCount }}</span>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><i class="fas fa-file-alt"></i></div>
        <span>Lamaran: {{ $lamaranCount }}</span>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><i class="fas fa-calendar-alt"></i></div>
        <span>Kegiatan: {{ $kegiatanCount }}</span>
      </div>
    </div>

    <div class="sidebar-menu">
      <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" @click="isMobileSidebarOpen = false">
        <i class="fas fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
      <a href="{{ route('alumni.index') }}" class="nav-link {{ request()->routeIs('alumni.*') ? 'active' : '' }}" @click="isMobileSidebarOpen = false">
        <i class="fas fa-users"></i>
        <span>Kelola Alumni</span>
      </a>
      <a href="{{ route('perusahaan.index') }}" class="nav-link {{ request()->routeIs('perusahaan.*') ? 'active' : '' }}" @click="isMobileSidebarOpen = false">
        <i class="fas fa-building"></i>
        <span>Kelola Perusahaan</span>
      </a>
      <a href="{{ route('lowongan.index') }}" class="nav-link {{ request()->routeIs('lowongan.*') ? 'active' : '' }}" @click="isMobileSidebarOpen = false">
        <i class="fas fa-briefcase"></i>
        <span>Kelola Lowongan</span>
      </a>
      <a href="{{ route('lamaran.index') }}" class="nav-link {{ request()->routeIs('lamaran.*') ? 'active' : '' }}" @click="isMobileSidebarOpen = false">
        <i class="fas fa-file-alt"></i>
        <span>Kelola Lamaran</span>
      </a>
      <a href="{{ route('kegiatan.index') }}" class="nav-link {{ request()->routeIs('kegiatan.*') ? 'active' : '' }}" @click="isMobileSidebarOpen = false">
        <i class="fas fa-calendar-alt"></i>
        <span>Kelola Kegiatan</span>
      </a>
    </div>
  </aside>

  <!-- Desktop Sidebar -->
  <aside class="sidebar d-none d-lg-block" x-bind:class="{ 'collapsed': isDesktopSidebarCollapsed }">
    <div class="sidebar-header">
      <img src="{{ asset('image/logosmk (1).png') }}" alt="SMKN 6 JEMBER" class="sidebar-logo">
      <span class="brand-name">SMKN 6 JEMBER</span>
    </div>

    <div class="sidebar-stats">
      <div class="stat-item">
        <div class="stat-icon"><i class="fas fa-users"></i></div>
        <span>Alumni: {{ $alumniCount }}</span>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><i class="fas fa-building"></i></div>
        <span>Perusahaan: {{ $perusahaanCount }}</span>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><i class="fas fa-briefcase"></i></div>
        <span>Lowongan: {{ $lowonganCount }}</span>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><i class="fas fa-file-alt"></i></div>
        <span>Lamaran: {{ $lamaranCount }}</span>
      </div>
      <div class="stat-item">
        <div class="stat-icon"><i class="fas fa-calendar-alt"></i></div>
        <span>Kegiatan: {{ $kegiatanCount }}</span>
      </div>
    </div>

    <div class="sidebar-menu">
      <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="fas fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
      <a href="{{ route('alumni.index') }}" class="nav-link {{ request()->routeIs('alumni.*') ? 'active' : '' }}">
        <i class="fas fa-users"></i>
        <span>Kelola Alumni</span>
      </a>
      <a href="{{ route('perusahaan.index') }}" class="nav-link {{ request()->routeIs('perusahaan.*') ? 'active' : '' }}">
        <i class="fas fa-building"></i>
        <span>Kelola Perusahaan</span>
      </a>
      <a href="{{ route('admin.tracer.import.form') }}" class="nav-link {{ request()->routeIs('tracer*') ? 'active' : '' }}">
      <i class="fas fa-file-import"></i>
        <span>Import Data</span>
      </a>
      <a href="{{ route('lowongan.index') }}" class="nav-link {{ request()->routeIs('lowongan.*') ? 'active' : '' }}">
        <i class="fas fa-briefcase"></i>
        <span>Kelola Lowongan</span>
      </a>
      <a href="{{ route('lamaran.index') }}" class="nav-link {{ request()->routeIs('lamaran.*') ? 'active' : '' }}">
        <i class="fas fa-file-alt"></i>
        <span>Kelola Lamaran</span>
      </a>
      <a href="{{ route('kegiatan.index') }}" class="nav-link {{ request()->routeIs('kegiatan.*') ? 'active' : '' }}">
        <i class="fas fa-calendar-alt"></i>
        <span>Kelola Kegiatan</span>
      </a>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="main-content" x-bind:style="{ 'margin-left': isDesktopSidebarCollapsed ? `${var(--sidebar-collapsed-width)}` : `${var(--sidebar-width)}`, 'width': `calc(100% - ${isDesktopSidebarCollapsed ? var(--sidebar-collapsed-width) : var(--sidebar-width)})` }">
    @if(Request::is('dashboard'))
    <div class="container-fluid pt-4">
      <h2 class="mb-4">Dashboard</h2>
      <!-- Your dashboard content here -->
    </div>
    @endif
    @yield('content')
  </main>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Toggle mobile sidebar (fallback for non-Alpine environments or additional logic)
    function toggleMobileSidebar() {
      const mobileSidebar = document.getElementById('mobileSidebar');
      const overlay = document.getElementById('overlay');
      mobileSidebar.classList.toggle('active');
      overlay.classList.toggle('active');
    }

    // Toggle desktop sidebar collapse/expand (fallback)
    function toggleDesktopSidebar() {
      const sidebar = document.getElementById('desktopSidebar');
      sidebar.classList.toggle('collapsed');
      localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
    }

    // Initialize sidebar state
    document.addEventListener('DOMContentLoaded', function() {
      const desktopSidebar = document.getElementById('desktopSidebar');
      const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
      if (isCollapsed) {
        desktopSidebar.classList.add('collapsed');
      }
    });

    // Close mobile sidebar when clicking outside
    document.addEventListener('click', function(event) {
      const mobileSidebar = document.getElementById('mobileSidebar');
      const toggleBtn = document.querySelector('.sidebar-toggle');
      const overlay = document.getElementById('overlay');
      if (mobileSidebar.classList.contains('active') &&
          !mobileSidebar.contains(event.target) &&
          event.target !== toggleBtn &&
          !toggleBtn.contains(event.target)) {
        mobileSidebar.classList.remove('active');
        overlay.classList.remove('active');
      }
    });

    // Responsive behavior
    window.addEventListener('resize', function() {
      const desktopSidebar = document.getElementById('desktopSidebar');
      if (window.innerWidth >= 992) {
        document.getElementById('mobileSidebar').classList.remove('active');
        document.getElementById('overlay').classList.remove('active');
        desktopSidebar.classList.remove('d-none');
      } else {
        desktopSidebar.classList.add('d-none');
      }
    });
  </script>

  @yield('scripts')
</body>
</html>
