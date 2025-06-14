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

    <!-- Hero Section -->

            <h3 class="hero-title" style="text-align: center; color:rgb(36, 36, 36)">Galeri Kegiatan BKK</h3>
            <p class="hero-subtitle" style="text-align: center; color:rgb(36, 36, 36)">Dokumentasi berbagai kegiatan pelatihan, job fair, dan kesuksesan alumni kami dalam dunia kerja</p>

    <!-- Filter Section -->
    <section class="filter-section">
        <div class="filter-container">
            <div class="filter-tabs">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="jobfair">Job Fair</button>
                <button class="filter-btn" data-filter="pelatihan">Pelatihan</button>
                <button class="filter-btn" data-filter="alumni">Kesuksesan Alumni</button>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="gallery-container">
            <div class="gallery-grid">
                <!-- Item 1 -->
                <div class="gallery-item" data-category="jobfair">
                    <div class="gallery-card">
                        <img src="assets/bg.jpg" class="card-image" alt="Job Fair BKK 2023">
                        <div class="card-content">
                            <span class="card-category">Job Fair</span>
                            <h3 class="card-title">Job Fair BKK 2023</h3>
                            <p class="card-description">Kegiatan job fair tahunan yang dihadiri oleh 50+ perusahaan ternama dengan berbagai peluang karir menarik.</p>
                            <div class="card-footer">
                                <span class="card-date">15 Maret 2023</span>
                                <a href="#" class="card-action">Lihat Album</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="gallery-item" data-category="pelatihan">
                    <div class="gallery-card">
                        <img src="assests/bg.jpg" class="card-image" alt="Pelatihan Wawancara Kerja">
                        <div class="card-content">
                            <span class="card-category">Pelatihan</span>
                            <h3 class="card-title">Pelatihan Wawancara Kerja</h3>
                            <p class="card-description">Pelatihan komprehensif teknik wawancara kerja untuk mempersiapkan alumni menghadapi dunia kerja.</p>
                            <div class="card-footer">
                                <span class="card-date">22 Februari 2023</span>
                                <a href="#" class="card-action">Lihat Album</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="gallery-item" data-category="alumni">
                    <div class="gallery-card">
                        <img src="https://source.unsplash.com/random/600x400/?success,office,1" class="card-image" alt="Kisah Sukses Alumni">
                        <div class="card-content">
                            <span class="card-category">Alumni</span>
                            <h3 class="card-title">Kisah Sukses: Andi Pratama</h3>
                            <p class="card-description">Alumni kami yang sekarang menjadi Manager di perusahaan multinasional setelah lulus dari program BKK.</p>
                            <div class="card-footer">
                                <span class="card-date">10 Januari 2023</span>
                                <a href="#" class="card-action">Baca Kisah</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="gallery-item" data-category="jobfair">
                    <div class="gallery-card">
                        <img src="https://source.unsplash.com/random/600x400/?job,fair,2" class="card-image" alt="Job Fair BKK 2022">
                        <div class="card-content">
                            <span class="card-category">Job Fair</span>
                            <h3 class="card-title">Job Fair BKK 2022</h3>
                            <p class="card-description">Kegiatan job fair tahunan dengan tingkat penyerapan kerja mencapai 75% dari total peserta.</p>
                            <div class="card-footer">
                                <span class="card-date">20 Maret 2022</span>
                                <a href="#" class="card-action">Lihat Album</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 5 -->
                <div class="gallery-item" data-category="pelatihan">
                    <div class="gallery-card">
                        <img src="https://source.unsplash.com/random/600x400/?training,workshop,2" class="card-image" alt="Workshop CV Profesional">
                        <div class="card-content">
                            <span class="card-category">Pelatihan</span>
                            <h3 class="card-title">Workshop CV Profesional</h3>
                            <p class="card-description">Pelatihan intensif pembuatan CV yang menarik dan profesional sesuai standar perusahaan.</p>
                            <div class="card-footer">
                                <span class="card-date">5 Februari 2022</span>
                                <a href="#" class="card-action">Lihat Album</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 6 -->
                <div class="gallery-item" data-category="alumni">
                    <div class="gallery-card">
                        <img src="https://source.unsplash.com/random/600x400/?success,office,2" class="card-image" alt="Kisah Sukses Alumni">
                        <div class="card-content">
                            <span class="card-category">Alumni</span>
                            <h3 class="card-title">Kisah Sukses: Siti Rahayu</h3>
                            <p class="card-description">Alumni kami yang berhasil mendirikan startup teknologi dan menjadi entrepreneur sukses.</p>
                            <div class="card-footer">
                                <span class="card-date">15 Desember 2021</span>
                                <a href="#" class="card-action">Baca Kisah</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="load-more-container">
                <button class="load-more-btn">Muat Lebih Banyak</button>
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
