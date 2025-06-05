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
        .h1 {
            padding-top: 160px;
            font-size: 50px;
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
                    <li class="nav-item"><a class="nav-link fw-bold" href="#beranda">Beranda</a></li>
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

    <section class="bg-light text-start py-5 hero-80" id="beranda">
        <div class="container">
            <h1 class="display-4 fw-bold h1">BURSA KERJA KHUSUS <br>SMKN 6 JEMBER</h1>
            <p class="lead mb-4">Temukan pekerjaan sesuai kompetensi anda.</p>
            <a href="#" class="btn btn-primary">Alumni</a>
            <a href="#" class="btn btn-success">Perusahaan</a>
        </div>
    </section>

    <br><br>
    <h2 class="text-center" id="tentang">Tentang Kami</h2>
    <section class="about d-flex align-items-start mt-4" style="display: flex; gap: 30px; max-width: 1100px; margin: auto; padding: 20px;">
        <div class="text" style="text-align: justify; max-width: 700px; line-height: 1.8; font-size: 16px;">
            <p>
                Website PKK SMK 6 Jember bertujuan untuk menjadi sarana informasi dan pembelajaran yang mendukung pengembangan kewirausahaan dan keterampilan siswa SMK. Platform ini dirancang untuk memperluas wawasan siswa dalam bidang Pendidikan Kewirausahaan dan Keterampilan (PKK), serta menjadi pusat referensi materi, panduan, dan kegiatan pembelajaran yang interaktif. <br>
                Melalui website ini, siswa dapat mengakses materi pembelajaran, video tutorial, informasi lomba, serta mempublikasikan karya dan inovasi mereka guna meningkatkan semangat berwirausaha dan kesiapan menghadapi dunia kerja atau membangun usaha mandiri.
            </p>
        </div>
        <img src="{{ asset('assets/logo.png') }}" alt="Gambar PKK" style="width: 270px; height: auto; border-radius: 8px; margin-left:90px;" />
    </section>
    <br><br><br><br>
    <section class="company py-5" style="background-color: #f8f9fa;" id="perusahaan">
        <div class="container-fluid">
            <h2 class="text-center mb-4">Perusahaan</h2>
            <div id="scrollContainer" class="scroll-wrapper">
                <div class="scroll-content">
                    @foreach([1,2,3,4,5,6,7] as $index)
                        <div class="card company-card">
                            <img src="{{ asset('assets/per' . $index . '.png') }}" class="card-img-top" alt="Perusahaan {{ $index }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <br><br><br><br>
    <h3 class="text-center">Info Singkat BKK</h3>
    <section class="text-white py-5">
        <div class="container">
          <div class="row text-center">
            <div class="col-md-4 mb-4">
              <div class="card bg-light text-dark shadow-blue border-0">
                <div class="card-body">
                  <h3 class="display-5 fw-bold">1,200+</h3>
                  <p class="mb-0">Alumni Terdaftar</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card bg-light text-dark shadow-blue border-0">
                <div class="card-body">
                  <h3 class="display-5 fw-bold">85+</h3>
                  <p class="mb-0">Perusahaan Mitra</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card bg-light text-dark shadow-blue border-0">
                <div class="card-body">
                  <h3 class="display-5 fw-bold">120</h3>
                  <p class="mb-0">Lowongan Aktif</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card bg-light text-dark shadow-blue border-0">
                <div class="card-body">
                  <h3 class="display-5 fw-bold">1,200+</h3>
                  <p class="mb-0">Alumni Bekerja</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card bg-light text-dark shadow-blue border-0">
                <div class="card-body">
                  <h3 class="display-5 fw-bold">85+</h3>
                  <p class="mb-0">Alumni Wirausaha</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card bg-light text-dark shadow-blue border-0">
                <div class="card-body">
                  <h3 class="display-5 fw-bold">120</h3>
                  <p class="mb-0">Kegiatan Rekruitmen</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <section class="bg-gray-50 py-12" id="lowongan">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Lowongan Kerja</h2>
                <p class="mt-2 text-gray-600">Gabung bersama tim kami dan kembangkan kariermu.</p>
            </div>
            <div class="container my-4">
                <div class="row">
                    @foreach($lowongan as $job)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm h-100">
                                <img src="{{ $job->logo ?? asset('assets/per2.png') }}" class="card-img-top" alt="Logo {{ $job->company_name ?? 'Perusahaan' }}" style="width:120px; padding-left:20px; padding-top:20px;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $job->company_name ?? 'PT Teknologi Hebat' }}</h5>
                                    <p class="card-text">Posisi: {{ $job->position ?? 'Full Stack Developer' }}</p>
                                    <a href="#" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <br><br><br><br>
    <section class="bg-light py-12" id="kegiatan">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Kegiatan Terbaru</h2>
                <p class="mt-2 text-gray-600">Ikuti kegiatan terbaru dari Bursa Kerja Khusus SMKN 6 Jember.</p>
            </div>
            <div class="container my-4">
                <div class="row">
                    @foreach($kegiatan as $activity)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $activity->title ?? 'Kegiatan' }}</h5>
                                    <p class="card-text">Tanggal: {{ $activity->tanggal ?? now()->format('Y-m-d') }}</p>
                                    <p class="card-text">{{ $activity->description ?? 'Deskripsi kegiatan tidak tersedia.' }}</p>
                                    <a href="#" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

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
                        <a href="#"><i class="fab fa-instagram"></i></a>
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
         // lama berhenti dalam ms

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
