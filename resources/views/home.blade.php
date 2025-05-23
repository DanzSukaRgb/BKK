<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>BKK | SMKN 6 JEMBER</title>
</head>
    <style>
        .hero-80{
            min-height: 80vh;
            background-image: url('assets/bg.webp')
        }
        .nav-link:hover{
            color: rgb(29, 87, 212);
        }
        .h1{
            margin-top:90px;
            font-size: 50px;
        }
        .logo{
            width: 50px;
            margin-right: 17px;
        }

    </style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
          <a class="navbar-brand fw-bold text-primary mt-1" href="#">
            <img src="{{asset('assets/logo.png')}}" alt="logo" class="logo">SMKN 6 JEMBER
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link fw-bold" href="#">Beranda</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="#">Profil</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="#">Perusahaan</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="#">Informasi</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="#">Kontak</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="#">Login</a></li>
            </ul>
          </div>
        </div>
      </nav>

      <section class="bg-light text-start py-5 hero-80">
        <div class="container">
          <h1 class="display-4 fw-bold h1">BURSA KERJA KHUSUS <br>SMKN 6 JEMBER</h1>
          <p class="lead mb-4">Website PKK SMK 6 Jember adalah media informasi dan pembelajaran yang mendukung pengembangan <br>kewirausahaan dan keterampilan siswa SMK,
             serta mempromosikan hasil karya dan produk mereka.</p>
          <a href="#" class="btn btn-primary">Alumni</a>
          <a href="#" class="btn btn-success">Perusahaan</a>
        </div>
      </section>
<br>
<br>
      <section class="about">
         <h1 class="text-center mt-20">Tentang kami</h1>
         <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor necessitatibus error dolorum consectetur laudantium ullam quo? Quidem expedita nulla sequi aperiam! Eveniet numquam quibusdam nulla eos deserunt, iusto provident commodi?</p>
      </section>
</body>
</html>