{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKK | SMKN 6 JEMBER - @yield('title')</title>

    <!-- Bootstrap & Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }
        .d-flex-wrapper {
            display: flex;
            flex-direction: row;
            min-height: 100vh;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #2c3e50;
            color: white;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            z-index: 1;
            overflow-y: auto;
            transition: width 0.3s ease;
        }
        .sidebar .logo-wrapper {
            text-align: center;
            padding: 15px 0;
            border-bottom: 1px solid #34495e;
        }
        .sidebar .logo {
            width: 60px;
        }
        .sidebar .brand-text {
            font-weight: bold;
            color: white;
            margin-top: 5px;
            display: block;
        }
        .sidebar .stat-item {
            padding: 15px 20px;
            display: flex;
            align-items: center;
            transition: background 0.3s ease;
        }
        .sidebar .stat-item:hover {
            background-color: #34495e;
        }
        .sidebar .stat-item i {
            margin-right: 10px;
            font-size: 1.2em;
        }
        .sidebar .nav-link {
            color: white;
            padding: 10px 20px;
            display: block;
            transition: background 0.3s ease;
        }
        .sidebar .nav-link:hover {
            background-color: #34495e;
            color: #ffffff;
        }
        .content {
            padding: 15px 20px;
            flex-grow: 1;
            background-color: #f8f9fa;
            margin-left: 250px;
            transition: margin-left 0.3s ease, padding 0.3s ease;
        }
        @media (max-width: 768px) {
            .d-flex-wrapper {
                flex-direction: column;
            }
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                padding-bottom: 15px;
                box-shadow: none;
                font-size: 0.9em;
            }
            .sidebar .logo {
                width: 50px;
            }
            .sidebar .stat-item, .sidebar .nav-link {
                padding: 10px 15px;
            }
            .content {
                padding: 10px 15px;
                margin-left: 0;
            }
        }
        @media (max-width: 576px) {
            .sidebar .stat-item i {
                font-size: 1em;
            }
            .sidebar .nav-link {
                font-size: 0.9em;
            }
            .content {
                padding: 10px 15px;
            }
        }
        @yield('styles')
    </style>
</head>
<body>
    <div class="d-flex-wrapper">
        <div class="sidebar">
            <div class="logo-wrapper">
                <img src="{{ asset('assets/logo.png') }}" alt="logo" class="logo">
                <span class="brand-text">SMKN 6 JEMBER</span>
            </div>

            <div class="stat-item">
                <i class="fas fa-users"></i>
                <span>Alumni: {{ $alumniCount }}</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-building"></i>
                <span>Perusahaan: {{ $perusahaanCount }}</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-briefcase"></i>
                <span>Lowongan Aktif: {{ $lowonganCount }}</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-file-alt"></i>
                <span>Lamaran: {{ $lamaranCount }}</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-calendar-alt"></i>
                <span>Kegiatan: {{ $kegiatanCount }}</span>
            </div>

            <hr class="bg-light">

            <a href="{{ route('alumni.index') }}" class="nav-link"><i class="fas fa-users"></i> Kelola Alumni</a>
            <a href="{{ route('perusahaan.index') }}" class="nav-link"><i class="fas fa-building"></i> Kelola Perusahaan</a>
            <a href="{{ route('lowongan.index') }}" class="nav-link"><i class="fas fa-briefcase"></i> Kelola Lowongan</a>
            <a href="{{ route('lamaran.index') }}" class="nav-link"><i class="fas fa-file-alt"></i> Kelola Lamaran</a>
            <a href="{{ route('kegiatan.index') }}" class="nav-link"><i class="fas fa-calendar-alt"></i> Kelola Kegiatan</a>
        </div>

        <section class="content">
            @yield('content')
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html> --}}
<!DOCTYPE html>
<html lang="id">
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
    }

    .d-flex-wrapper {
      display: flex;
      min-height: 100vh;
      flex-direction: row;
    }

    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 250px;
      background-color: #2c3e50;
      color: white;
      z-index: 1000;
      overflow-y: auto;
      transition: transform 0.3s ease;
    }

    .sidebar .logo-wrapper {
      text-align: center;
      padding: 15px 0;
      border-bottom: 1px solid #34495e;
    }

    .sidebar .logo {
      width: 60px;
    }

    .sidebar .brand-text {
      font-weight: bold;
      color: white;
      margin-top: 5px;
      display: block;
    }

    .sidebar .stat-item {
      padding: 15px 20px;
      display: flex;
      align-items: center;
      transition: background 0.3s ease;
    }

    .sidebar .stat-item:hover {
      background-color: #34495e;
    }

    .sidebar .stat-item i {
      margin-right: 10px;
      font-size: 1.2em;
    }

    .sidebar .nav-link {
      color: white;
      padding: 10px 20px;
      display: block;
      transition: background 0.3s ease;
    }

    .sidebar .nav-link:hover {
      background-color: #34495e;
      color: #ffffff;
    }

    .content {
      padding: 15px 20px;
      flex-grow: 1;
      background-color: #f8f9fa;
      margin-left: 250px;
      transition: margin-left 0.3s ease;
      width: 100%;
    }

    .sidebar-toggle {
      display: none;
      background-color: #2c3e50;
      color: white;
      border: none;
      font-size: 1.5em;
      padding: 10px 15px;
      position: fixed;
      top: 10px;
      left: 10px;
      z-index: 1100;
      border-radius: 5px;
    }

    /* Mobile responsive */
    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
      }

      .sidebar.active {
        transform: translateX(0);
      }

      .sidebar-toggle {
        display: block;
      }

      .content {
        margin-left: 0;
        padding-top: 60px;
      }
    }

    @media (max-width: 576px) {
      .sidebar .nav-link {
        font-size: 0.9em;
      }

      .sidebar .stat-item i {
        font-size: 1em;
      }

      .sidebar .logo {
        width: 50px;
      }
    }

    @yield('styles')
  </style>
</head>
<body>

  <button class="sidebar-toggle" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i>
  </button>

  <div class="d-flex-wrapper">
    <div class="sidebar" id="sidebar">
      <div class="logo-wrapper">
        <img src="{{ asset('assets/logo.png') }}" alt="logo" class="logo">
        <span class="brand-text">SMKN 6 JEMBER</span>
      </div>

      <div class="stat-item">
        <i class="fas fa-users"></i>
        <span>Alumni: {{ $alumniCount }}</span>
      </div>
      <div class="stat-item">
        <i class="fas fa-building"></i>
        <span>Perusahaan: {{ $perusahaanCount }}</span>
      </div>
      <div class="stat-item">
        <i class="fas fa-briefcase"></i>
        <span>Lowongan Aktif: {{ $lowonganCount }}</span>
      </div>
      <div class="stat-item">
        <i class="fas fa-file-alt"></i>
        <span>Lamaran: {{ $lamaranCount }}</span>
      </div>
      <div class="stat-item">
        <i class="fas fa-calendar-alt"></i>
        <span>Kegiatan: {{ $kegiatanCount }}</span>
      </div>

      <hr class="bg-light">

      <a href="{{ route('alumni.index') }}" class="nav-link"><i class="fas fa-users"></i> Kelola Alumni</a>
      <a href="{{ route('perusahaan.index') }}" class="nav-link"><i class="fas fa-building"></i> Kelola Perusahaan</a>
      <a href="{{ route('lowongan.index') }}" class="nav-link"><i class="fas fa-briefcase"></i> Kelola Lowongan</a>
      <a href="{{ route('lamaran.index') }}" class="nav-link"><i class="fas fa-file-alt"></i> Kelola Lamaran</a>
      <a href="{{ route('kegiatan.index') }}" class="nav-link"><i class="fas fa-calendar-alt"></i> Kelola Kegiatan</a>
    </div>

    <section class="content">
      @yield('content')
    </section>
  </div>

  <script>
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('active');
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @yield('scripts')

</body>
</html>
