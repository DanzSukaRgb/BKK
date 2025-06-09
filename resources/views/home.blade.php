@extends('layouts.app')

@section('content')
    <section class="bg-light text-start py-5 hero-80" id="beranda">
        <div class="container">
            <h1 class="display-4 fw-bold h1">BURSA KERJA KHUSUS <br>SMKN 6 JEMBER</h1>
            <p class="lead mb-4 p">Temukan pekerjaan sesuai kompetensi anda.</p>
            <a href="#" class="btn btn-primary">Alumni</a>
            <a href="{{route("perusahaan.public")}}" class="btn btn-success">Perusahaan</a>
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
    </section>
@endsection
