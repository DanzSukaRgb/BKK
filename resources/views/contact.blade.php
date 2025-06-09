@extends('layouts.app')

@section('content')
<section id="lokasi" class="lokasi-section py-5">
    <div class="container"><br><br><br><br>
        <h2 class="text-center mb-5 text-primary">Kontak Kami</h2>
        <div class="row align-items-start">
            <!-- Peta Google Maps -->
            <div class="col-md-6 mb-4">
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4686155740765!2d113.43264387405587!3d-8.155450181697379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd68b08077adae9%3A0x32c15952de1123cb!2sSMK%20Negeri%206%20Jember!5e0!3m2!1sid!2sid!4v1749458184051!5m2!1sid!2sid"
                        width="100%" height="460" style="border:0; border-radius:10px;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- Form Kontak -->
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h5 class="mb-3">Hubungi Kami</h5>
                    <form method="POST" action="#">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
