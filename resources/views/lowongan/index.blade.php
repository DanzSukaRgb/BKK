@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-primary">Lowongan Pekerjaan Terbaru</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      <!-- Job Listing 1 -->
      <div class="col">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <span class="badge bg-info text-dark">Baru</span>
              <small class="text-muted">07 Feb 2024</small>
            </div>
            <h5 class="card-title fw-bold">Drafter Gambar Bangunan & Interior</h5>
            <p class="card-text text-muted mb-1"><i class="fas fa-building me-2"></i>Metamoreosa Studio</p>
            <p class="card-text text-muted mb-3"><i class="fas fa-file-alt me-2"></i>No. 2/Low/BKK/II/24</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="#" class="btn btn-outline-primary btn-sm">Detail</a>
              <a href="#" class="btn btn-primary btn-sm">Lamar</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Job Listing 2 -->
      <div class="col">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <span class="badge bg-warning text-dark">TKJ</span>
              <small class="text-muted">23 Sep 2023</small>
            </div>
            <h5 class="card-title fw-bold">Content Creator</h5>
            <p class="card-text text-muted mb-1"><i class="fas fa-building me-2"></i>PT. Duta Karya Bestari</p>
            <p class="card-text text-muted mb-3"><i class="fas fa-file-alt me-2"></i>No. 358/Low/BKK/IX/23</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="#" class="btn btn-outline-primary btn-sm">Detail</a>
              <a href="#" class="btn btn-primary btn-sm">Lamar</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Job Listing 3 -->
      <div class="col">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <span class="badge bg-danger text-white">Pemesinan</span>
              <small class="text-muted">15 Sep 2023</small>
            </div>
            <h5 class="card-title fw-bold">Operator Mesin CNC</h5>
            <p class="card-text text-muted mb-1"><i class="fas fa-building me-2"></i>PT. Inti Teknika Solusi</p>
            <p class="card-text text-muted mb-3"><i class="fas fa-file-alt me-2"></i>No. 355/Low/BKK/IX/23</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="#" class="btn btn-outline-primary btn-sm">Detail</a>
              <a href="#" class="btn btn-primary btn-sm">Lamar</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Job Listing 4 -->
      <div class="col">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <span class="badge bg-success text-white">Otomotif</span>
              <small class="text-muted">16 Feb 2023</small>
            </div>
            <h5 class="card-title fw-bold">Staff Gudang</h5>
            <p class="card-text text-muted mb-1"><i class="fas fa-building me-2"></i>PT. Toyomatsu</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="#" class="btn btn-outline-primary btn-sm">Detail</a>
              <a href="#" class="btn btn-primary btn-sm">Lamar</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Job Listing 5 -->
      <div class="col">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <span class="badge bg-purple text-white">Elektronika</span>
              <small class="text-muted">03 Jun 2025</small>
            </div>
            <h5 class="card-title fw-bold">Teknisi Elektronik</h5>
            <p class="card-text text-muted mb-1"><i class="fas fa-building me-2"></i>PT. Teknik Jaya</p>
            <p class="card-text text-muted mb-3"><i class="fas fa-file-alt me-2"></i>No. 400/Low/BKK/X/24</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="#" class="btn btn-outline-primary btn-sm">Detail</a>
              <a href="#" class="btn btn-primary btn-sm">Lamar</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Job Listing 6 -->
      <div class="col">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-2">
              <span class="badge bg-pink text-white">DKV</span>
              <small class="text-muted">04 Jun 2025</small>
            </div>
            <h5 class="card-title fw-bold">Designer Grafis</h5>
            <p class="card-text text-muted mb-1"><i class="fas fa-building me-2"></i>PT. Inovasi Muda</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="#" class="btn btn-outline-primary btn-sm">Detail</a>
              <a href="#" class="btn btn-primary btn-sm">Lamar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Pagination -->
    <nav aria-label="Job listings pagination" class="mt-5">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
</div>

<style>
    .bg-purple {
        background-color: #6f42c1;
    }
    .bg-pink {
        background-color: #d63384;
    }
    .card {
        transition: transform 0.2s ease-in-out;
        border-radius: 10px;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .badge {
        font-size: 0.75rem;
        padding: 0.35em 0.65em;
    }
</style>

@endsection