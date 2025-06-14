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


    <!-- Filter Section -->
    <section class="hero-section">
        <div class="hero-content">

        </div>
        <h1 class="hero-title">Galeri Kegiatan BKK</h1>
        <p class="hero-subtitle">Dokumentasi berbagai kegiatan pelatihan, job fair, dan kesuksesan alumni kami dalam dunia kerja</p>
        <div class="filter-container">
    <section class="filter-section">
            <div class="filter-tabs">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="jobfair">Job Fair</button>
                <button class="filter-btn" data-filter="pelatihan">Pelatihan</button>
                <button class="filter-btn" data-filter="alumni">Kesuksesan Alumni</button>
            </div>
        </div>
    </section>
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

    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #64748b;
            --surface-color: #f8fafc;
            --border-color: #e2e8f0;
            --text-primary: #0f172a;
            --text-secondary: #64748b;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
            color: var(--text-primary);
            line-height: 1.6;
        }

        /* Header Section */
        .hero-section {
            background: white;
            padding: 4rem 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23e2e8f0" fill-opacity="0.3"><circle cx="30" cy="30" r="1"/></g></svg>') repeat;
            opacity: 0.5;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1rem;
            letter-spacing: -0.025em;
        }

        .hero-subtitle {
            font-size: 1.125rem;
            color: var(--text-secondary);
            font-weight: 400;
            line-height: 1.7;
        }

        /* Filter Section */
        .filter-section {
            padding: 3rem 0 2rem;
            background: #ffffff;
        }

        .filter-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .filter-tabs {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 0;
        }

        .filter-btn {
            background: transparent;
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            cursor: pointer;
            white-space: nowrap;
        }

        .filter-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateY(-1px);
        }

        .filter-btn.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            box-shadow: var(--shadow-md);
        }

        /* Gallery Section */
        .gallery-section {
            padding: 2rem 0 4rem;
            background: #ffffff;
        }

        .gallery-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .gallery-item {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .gallery-item.hidden {
            opacity: 0;
            transform: translateY(20px);
            pointer-events: none;
        }

        .gallery-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
            height: 100%;
        }

        .gallery-card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
            border-color: rgba(37, 99, 235, 0.2);
        }

        .card-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-card:hover .card-image {
            transform: scale(1.02);
        }

        .card-content {
            padding: 1.5rem;
        }

        .card-category {
            display: inline-block;
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary-color);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            margin-bottom: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .card-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .card-description {
            color: var(--text-secondary);
            font-size: 0.875rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-date {
            color: var(--text-secondary);
            font-size: 0.8rem;
            font-weight: 500;
        }

        .card-action {
            background: transparent;
            border: 1px solid var(--border-color);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .card-action:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-1px);
            text-decoration: none;
        }

        /* Load More Button */
        .load-more-container {
            text-align: center;
        }

        .load-more-btn {
            background: var(--primary-color);
            border: none;
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: var(--shadow-md);
        }

        .load-more-btn:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* Modal Styles */
        .modal-content {
            border: none;
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 600;
            color: var(--text-primary);
        }

        .btn-close {
            background: none;
            border: none;
            opacity: 0.6;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-image {
            border-radius: 12px;
            max-height: 400px;
            object-fit: cover;
        }

        .modal-description {
            color: var(--text-secondary);
            line-height: 1.6;
            margin-top: 1rem;
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
            padding: 1rem 1.5rem;
        }

        .btn-secondary {
            background: var(--surface-color);
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            border-radius: 8px;
            font-weight: 500;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .filter-tabs {
                gap: 0.25rem;
            }

            .filter-btn {
                padding: 0.625rem 1.25rem;
                font-size: 0.8rem;
            }

            .card-content {
                padding: 1.25rem;
            }
        }

        @media (max-width: 480px) {
            .hero-section {
                padding: 3rem 0;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .card-image {
                height: 180px;
            }
        }
    </style>


@endsection
