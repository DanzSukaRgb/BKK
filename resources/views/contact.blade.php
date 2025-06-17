@extends('layouts.app')

@section('content')
<br><br><br>
<section id="lokasi" class="lokasi-section py-5 bg-light">
    <div class="container">
        <!-- Section Heading -->
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 position-relative d-inline-block">
                Kontak Kami
                <span class="position-absolute bottom-0 start-0 w-100 h-2 bg-primary bg-opacity-25 rounded" style="transform: scaleX(0); transform-origin: left; transition: transform 0.3s ease;"></span>
            </h2>
            <p class="lead text-muted mx-auto" style="max-width: 600px;">
                Hubungi kami untuk informasi lebih lanjut atau pertanyaan yang Anda miliki
            </p>
        </div>
        <div class="row g-4 align-items-stretch">
            <!-- Google Maps -->
            <div class="col-lg-6 d-flex">
                <div class="card border-0 shadow-sm w-100 d-flex flex-column">
                    <div class="ratio ratio-4x3 flex-grow-1">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1412.5328379938078!2d113.4347124269006!3d-8.155450754436908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68b08077adae9%3A0x32c15952de1123cb!2sSMK%20Negeri%206%20Jember!5e0!3m2!1sid!2sid!4v1750121694154!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;"
                        allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-map-marker-alt text-danger me-2"></i>
                            <small class="text-muted">JL. PB. SUDIRMAN NO. 114 TANGGUL-JEMBER</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-6 d-flex">
                <div class="card border-0 shadow-sm w-100 d-flex flex-column">
                    <div class="card-body p-4 p-md-5 flex-grow-1">
                        <h3 class="h4 fw-bold mb-4">Kirim Pesan</h3>
                        <form method="POST" action="#">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control py-2" id="nama" name="nama" required placeholder="Masukkan nama lengkap Anda">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control py-2" id="email" name="email" required placeholder="contoh@email.com">
                            </div>
                            <div class="mb-4">
                                <label for="pesan" class="form-label">Pesan</label>
                                <textarea class="form-control" id="pesan" name="pesan" rows="4" required placeholder="Tulis pesan Anda di sini..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                                <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Additional Contact Info -->
        <div class="row mt-5 g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="icon-lg bg-primary bg-opacity-10 text-primary rounded-circle mb-3 mx-auto">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h5 class="h6 fw-bold">Alamat</h5>
                        <p class="text-muted mb-0">JL. PB. SUDIRMAN NO. 114 TANGGUL-JEMBER</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="icon-lg bg-success bg-opacity-10 text-success rounded-circle mb-3 mx-auto">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h5 class="h6 fw-bold">Telepon</h5>
                        <p class="text-muted mb-0">0336441347</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="icon-lg bg-info bg-opacity-10 text-info rounded-circle mb-3 mx-auto">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h5 class="h6 fw-bold">Email</h5>
                        <p class="text-muted mb-0">smkn6.jember@yahoo.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Custom styles to enhance Bootstrap */
    .icon-lg {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 0.75rem;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1) !important;
    }

    .form-control {
        border-radius: 0.5rem;
        border: 1px solid #dee2e6;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .btn-primary {
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
    }

    h2:hover span {
        transform: scaleX(1);
    }
</style>

<script>
    // Simple animation for the heading underline
    document.addEventListener('DOMContentLoaded', function() {
        const heading = document.querySelector('h2');
        heading.addEventListener('mouseenter', function() {
            const underline = this.querySelector('span');
            underline.style.transform = 'scaleX(1)';
        });
        heading.addEventListener('mouseleave', function() {
            const underline = this.querySelector('span');
            underline.style.transform = 'scaleX(0)';
        });
    });
</script>
@endsection
