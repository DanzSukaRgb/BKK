@extends('layouts.app')

@section('content')
    <section class="hero-section">
        <div class="container">
            <h1 class="hero-title">BURSA KERJA KHUSUS <br>SMKN 6 JEMBER</h1>
            <p class="hero-subtitle">Temukan pekerjaan sesuai kompetensi anda.</p>
            <div class="hero-buttons">
                <a href="#" class="btn btn-primary">Alumni</a>
                <a href="{{route("perusahaan.public")}}" class="btn btn-success">Perusahaan</a>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="container">
            <h2 class="section-title" id="tentang">Tentang Kami</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>
                        Website PKK SMK 6 Jember bertujuan untuk menjadi sarana informasi dan pembelajaran yang mendukung pengembangan kewirausahaan dan keterampilan siswa SMK. Platform ini dirancang untuk memperluas wawasan siswa dalam bidang Pendidikan Kewirausahaan dan Keterampilan (PKK), serta menjadi pusat referensi materi, panduan, dan kegiatan pembelajaran yang interaktif. <br>
                        Melalui website ini, siswa dapat mengakses materi pembelajaran, video tutorial, informasi lomba, serta mempublikasikan karya dan inovasi mereka guna meningkatkan semangat berwirausaha dan kesiapan menghadapi dunia kerja atau membangun usaha mandiri.
                    </p>
                </div>
                <div class="about-image">
                    <img src="{{ asset('assets/logo2.png') }}" alt="Gambar PKK" />
                </div>
            </div>
        </div>
    </section>

    <section class="company-section" id="perusahaan">
        <div class="container">
            <h2 class="section-title">Perusahaan</h2>
            <div class="company-scroller">
                <div class="company-track">
                    @foreach([1,2,3,4,5,6,7] as $index)
                        <div class="company-card">
                            <img src="{{ asset('assets/per' . $index . '.png') }}" class="company-logo" alt="Perusahaan {{ $index }}">
                        </div>
                    @endforeach
                    <!-- Duplicate for infinite loop effect -->
                    @foreach([1,2,3,4,5,6,7] as $index)
                        <div class="company-card">
                            <img src="{{ asset('assets/per' . $index . '.png') }}" class="company-logo" alt="Perusahaan {{ $index }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="stats-section">
        <div class="container">
            <h3 class="section-title">Info Singkat BKK</h3>
            <div class="stats-grid">
                <div class="stat-card">
                    <h3 class="stat-number">1,200+</h3>
                    <p class="stat-label">Alumni Terdaftar</p>
                </div>
                <div class="stat-card">
                    <h3 class="stat-number">85+</h3>
                    <p class="stat-label">Perusahaan Mitra</p>
                </div>
                <div class="stat-card">
                    <h3 class="stat-number">120</h3>
                    <p class="stat-label">Lowongan Aktif</p>
                </div>
                <div class="stat-card">
                    <h3 class="stat-number">1,200+</h3>
                    <p class="stat-label">Alumni Bekerja</p>
                </div>
                <div class="stat-card">
                    <h3 class="stat-number">85+</h3>
                    <p class="stat-label">Alumni Wirausaha</p>
                </div>
                <div class="stat-card">
                    <h3 class="stat-number">120</h3>
                    <p class="stat-label">Kegiatan Rekruitmen</p>
                </div>
            </div>
        </div>
    </section>

    <section class="activities-section" id="kegiatan">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Kegiatan Terbaru</h2>
                <p class="section-subtitle">Ikuti kegiatan terbaru dari Bursa Kerja Khusus SMKN 6 Jember.</p>
            </div>
            <div class="activities-grid">
                @foreach($kegiatan as $activity)
                    <div class="activity-card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $activity->title ?? 'Kegiatan' }}</h5>
                            <p class="card-text">Tanggal: {{ $activity->tanggal ?? now()->format('Y-m-d') }}</p>
                            <p class="card-text">{{ $activity->description ?? 'Deskripsi kegiatan tidak tersedia.' }}</p>
                            <a href="#" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
