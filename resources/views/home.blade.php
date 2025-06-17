@extends('layouts.app')

@section('content')
    <section class="hero-section">
        <div class="container">
            <h1 class="hero-title">BURSA KERJA KHUSUS <br>SMKN 6 JEMBER</h1>
            <p class="hero-subtitle">Temukan pekerjaan sesuai kompetensi anda.</p>
            <div class="hero-buttons">
                <a href="#" class="btn btn-primary">Alumni</a>
                <a href="{{ route('perusahaan.public') }}" class="btn btn-success">Perusahaan</a>
            </div>
        </div>
    </section>
{{--  --}}
    <section class="about-section">
        <div class="container">
            <h2 class="section-title " id="tentang" style="font-weight: 600;">Tentang Kami</h2>
            <div class="about-content">
                <div class="about-text">
                    <p style="font-weight: 500;">
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
            <h2 class="section-title">Perusahaan Mitra</h2>
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
<br>
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

    <!-- Hero Section -->
<br><br>
            <h1 class="hero-title1" style="text-align: center; color:#4b4b4b; font-weight:bold;">Galeri Kegiatan BKK</h1>
            <p class="hero-subtitle1" style="text-align: center; color:#4b4b4b; font-weight:500;">Dokumentasi berbagai kegiatan pelatihan, job fair, dan kesuksesan alumni kami dalam dunia kerja</p>
    <!-- Filter Section -->
    <section class="filter-section">
        <div class="filter-container">
    <section class="filter-section">
            <div class="filter-tabs">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="pelatihan">Pelatihan</button>
                <button class="filter-btn" data-filter="seminar">Seminar</button>
                <button class="filter-btn" data-filter="lokakarya">Lokakarya</button>
                <button class="filter-btn" data-filter="rekrutmen">Rekrutmen</button>
            </div>
        </div>
    </section>
</section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="gallery-container">
            <div class="gallery-grid">
                @forelse ($kegiatan as $item)
                    <div class="gallery-item" data-category="{{ strtolower($item->tipe_kegiatan ?? 'umum') }}">
            <div class="gallery-card">
                <div class="image-container">
                    <img src="{{ $item->gambar }}" class="card-image" alt="{{ $item->judul }}" loading="lazy">
                    <a href="{{ route('kegiatan.show.public', $item->id) }}" class="image-button">
                        <i class="fas fa-eye me-1"></i> Lihat Detail
                    </a>

                    <div class="image-overlay"></div>
                </div>


                <div class="card-content">
                    <span class="card-category">{{ $item->tipe_kegiatan ?? 'Umum' }}</span>
                    <h3 class="card-title">{{ $item->judul }}</h3>
                    <p class="card-description">{{ Str::limit($item->deskripsi, 100) }}</p>
                    <div class="card-footer">
                        <span class="card-date">
                            <i class="fas fa-calendar-alt"></i>
                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
                @empty
                    <div class="no-kegiatan">
                        <p>Belum ada kegiatan yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            <div class="load-more-container">
                <a href="{{ route('kegiatan.public') }}" class="load-more-btn" style="text-decoration: none;">Muat Lebih Banyak</a>
            </div>
        </div>
    </section>


    <!-- Modal for Image Preview -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="galleryModalLabel">Judul Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="" id="modalImage" class="img-fluid modal-image" alt="">
                    <p class="modal-description" id="modalDescription">Deskripsi kegiatan akan muncul di sini</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <section class="why-choose-us bg-light py-5" id="keunggulan">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title">Mengapa Memilih BKK SMKN 6 Jember?</h2>
                <div class="divider mx-auto"></div>
                <p class="section-subtitle">Keunggulan yang kami tawarkan untuk kesuksesan karir Anda</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card shadow-sm p-4 h-100">
                        <div class="benefit-icon mb-3">
                            <i class="fas fa-handshake fa-3x text-primary"></i>
                        </div>
                        <h4 class="benefit-title">Jaringan Perusahaan Luas</h4>
                        <p class="benefit-text">Lebih dari 85 perusahaan mitra terpercaya dari berbagai industri.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card shadow-sm p-4 h-100">
                        <div class="benefit-icon mb-3">
                            <i class="fas fa-user-tie fa-3x text-primary"></i>
                        </div>
                        <h4 class="benefit-title">Bimbingan Karir</h4>
                        <p class="benefit-text">Pelatihan dan konsultasi karir dari profesional berpengalaman.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card shadow-sm p-4 h-100">
                        <div class="benefit-icon mb-3">
                            <i class="fas fa-chart-line fa-3x text-primary"></i>
                        </div>
                        <h4 class="benefit-title">Tingkat Penempatan Tinggi</h4>
                        <p class="benefit-text">80% alumni mendapatkan pekerjaan dalam 3 bulan setelah lulus.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card shadow-sm p-4 h-100">
                        <div class="benefit-icon mb-3">
                            <i class="fas fa-calendar-check fa-3x text-primary"></i>
                        </div>
                        <h4 class="benefit-title">Job Fair Rutin</h4>
                        <p class="benefit-text">Event rekrutmen berkala dengan perusahaan-perusahaan ternama.</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="#testimoni" class="btn btn-primary btn-lg px-4">
                    <i class="fas fa-comments me-2"></i> Lihat Pertanyaan (FAQ)
                </a>
            </div>
        </div>
    </section>
    <section class="faq-section py-5 bg-white">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 class="section-title">Pertanyaan yang Sering Diajukan</h2>
                <p class="section-subtitle">Temukan jawaban atas pertanyaan umum seputar BKK SMKN 6 Jember</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <!-- FAQ Item 1 -->
                        <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
                            <h3 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed fw-semibold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fas fa-question-circle text-primary me-3"></i>
                                    Apa itu BKK dan apa manfaatnya untuk siswa?
                                </button>
                            </h3>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body pt-0">
                                    <p>Bursa Kerja Khusus (BKK) adalah unit kerja di SMKN 6 Jember yang berfungsi sebagai mediator antara alumni dengan dunia kerja. Manfaatnya meliputi:</p>
                                    <ul>
                                        <li>Memperoleh informasi lowongan kerja terpercaya</li>
                                        <li>Pelatihan keterampilan kerja dan wawancara</li>
                                        <li>Koneksi dengan perusahaan mitra</li>
                                        <li>Bimbingan karier setelah lulus</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
                            <h3 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed fw-semibold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fas fa-user-graduate text-primary me-3"></i>
                                    Bagaimana cara mendaftar sebagai peserta BKK?
                                </button>
                            </h3>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body pt-0">
                                    <p>Pendaftaran bisa dilakukan dengan cara:</p>
                                    <ol>
                                        <li>Kunjungi kantor BKK SMKN 6 Jember dengan membawa:
                                            <ul>
                                                <li>Fotokopi ijazah terakhir</li>
                                                <li>Pas foto 3x4 (2 lembar)</li>
                                                <li>CV sederhana</li>
                                            </ul>
                                        </li>
                                        <li>Isi formulir pendaftaran</li>
                                        <li>Ikuti orientasi singkat tentang program BKK</li>
                                    </ol>
                                    <p class="mb-0">Pendaftaran online juga tersedia melalui <a href="#">website ini</a>.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
                            <h3 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed fw-semibold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="fas fa-briefcase text-primary me-3"></i>
                                    Apakah ada biaya untuk mengikuti program BKK?
                                </button>
                            </h3>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body pt-0">
                                    <p><strong>Tidak ada biaya</strong> untuk mengikuti program inti BKK. Semua layanan dasar seperti:</p>
                                    <ul>
                                        <li>Konsultasi karier</li>
                                        <li>Akses lowongan kerja</li>
                                        <li>Workshop dasar</li>
                                    </ul>
                                    <p>disediakan gratis untuk seluruh alumni SMKN 6 Jember. Untuk pelatihan sertifikasi khusus mungkin ada biaya tambahan yang sudah disubsidi.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
                            <h3 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed fw-semibold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <i class="fas fa-building text-primary me-3"></i>
                                    Perusahaan apa saja yang menjadi mitra BKK?
                                </button>
                            </h3>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body pt-0">
                                    <p>BKK SMKN 6 Jember bekerja sama dengan 85+ perusahaan dari berbagai sektor:</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="fw-semibold mt-3">Industri Teknologi:</h6>
                                            <ul>
                                                <li>PT Telkom Indonesia</li>
                                                <li>PT Astra Otoparts</li>
                                                <li>PT Jatim Autocomp Indonesia</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-semibold mt-3">Hospitality & Retail:</h6>
                                            <ul>
                                                <li>Hotel Santika Premiere</li>
                                                <li>PT Ramayana Lestari</li>
                                                <li>PT Matahari Department Store</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p class="mb-0">Lihat daftar lengkapnya di halaman <a href="#">Perusahaan Mitra</a>.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 5 -->
                        <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
                            <h3 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed fw-semibold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <i class="fas fa-calendar-check text-primary me-3"></i>
                                    Kapan biasanya ada job fair atau rekrutmen khusus?
                                </button>
                            </h3>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                <div class="accordion-body pt-0">
                                    <p>BKK menyelenggarakan berbagai event rekrutmen sepanjang tahun:</p>
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Periode</th>
                                                <th>Jenis Event</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Januari-Februari</td>
                                                <td>Job Fair Nasional</td>
                                            </tr>
                                            <tr>
                                                <td>Juni-Juli</td>
                                                <td>Rekrutmen Massal Alumni Baru</td>
                                            </tr>
                                            <tr>
                                                <td>Oktober</td>
                                                <td>Company Visit Day</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>Jadwal lengkap bisa dilihat di <a href="#">kalender kegiatan</a> kami.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <div class="alert alert-info d-inline-flex align-items-center">
                            <i class="fas fa-info-circle me-2"></i>
                            Masih ada pertanyaan? Hubungi kami di <a href="mailto:bkk@smkn6jember.sch.id" class="alert-link">bkk@smkn6jember.sch.id</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Career CTA Section -->
    <section class="career-cta-section text-white position-relative overflow-hidden">
    <div class="container position-relative z-index-2">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h2 class="display-4 fw-bold mb-4">Siap Memulai Karir Impian Anda?</h2>
                <p class="lead mb-5">Bergabunglah dengan ratusan alumni SMKN 6 Jember yang telah sukses mendapatkan pekerjaan melalui program BKK kami. Dapatkan akses ke lowongan terbaru, pelatihan karir, dan bimbingan profesional.</p>

                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('lowongan.public') }}" class="btn btn-light btn-lg px-4 py-3 fw-bold rounded-pill">
                        <i class="fas fa-briefcase me-2"></i>Lihat Lowongan
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-4 py-3 fw-bold rounded-pill">
                        <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript for Gallery Filter -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Filter functionality
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

            // Modal functionality
            const galleryModal = new bootstrap.Modal(document.getElementById('galleryModal'));
            const modalTitle = document.getElementById('galleryModalLabel');
            const modalImage = document.getElementById('modalImage');
            const modalDescription = document.getElementById('modalDescription');

            document.querySelectorAll('.card-image').forEach(img => {
                img.addEventListener('click', function() {
                    const card = this.closest('.gallery-card');
                    modalTitle.textContent = card.querySelector('.card-title').textContent;
                    modalImage.src = this.src;
                    modalDescription.textContent = card.querySelector('.card-description').textContent;
                    galleryModal.show();
                });
            });

            // Load more functionality
            document.querySelector('.load-more-btn').addEventListener('click', function() {
                // Simulate loading more items
                this.innerHTML = 'Memuat...';
                setTimeout(() => {
                    this.innerHTML = 'Muat Lebih Banyak';
                    // Add your load more logic here
                }, 1000);
            });
        });
    </script>
@endsection
