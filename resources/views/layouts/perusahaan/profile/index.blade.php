@extends('layouts.perusahaan.admin')

@section('title', 'Profil Perusahaan')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-primary fw-bold">Profil Perusahaan</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm mb-4">
        <div class="card-body d-flex flex-column flex-md-row align-items-center">
    <!-- Logo -->
    <div class="col-md-3 text-center mb-3 mb-md-0">
        <img src="{{ $perusahaan->logo ?? asset('images/default-company.png') }}" alt="Logo" class="img-fluid" style="max-height: 150px;">
    </div>

    <!-- Teks Profil dengan jarak kiri -->
    <div class="flex-grow-1 ms-md-4"><br>
        <h3 class="fw-bold">{{ $perusahaan->nama }}</h3>
        <p class="text-muted"><i class="fas fa-industry me-2"></i>{{ $perusahaan->industri }}</p>
        <p><i class="fas fa-map-marker-alt me-2"></i>{{ $perusahaan->alamat }}</p>
        <p><i class="fas fa-envelope me-2"></i>{{ $perusahaan->email }}</p>
        <p><i class="fas fa-phone me-2"></i>{{ $perusahaan->telepon }}</p>
        <p>
            <i class="fas fa-globe me-2"></i>
            @if($perusahaan->website)
                <a href="{{ $perusahaan->website }}" target="_blank">{{ $perusahaan->website }}</a>
            @else
                -
            @endif
        </p>
        <p><i class="fas fa-users me-2"></i>Jumlah Karyawan: {{ $perusahaan->jumlah_karyawan }}</p>
        <p>
            <i class="fas fa-check-circle me-2"></i>Status Verifikasi:
            <span class="{{ $perusahaan->status_verifikasi == 'Terverifikasi' ? 'text-success' : 'text-warning' }}">
                {{ $perusahaan->status_verifikasi }}
            </span>
        </p>
    </div>
</div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Deskripsi Perusahaan</h5>
        </div>
        <div class="card-body">
            <p>{{ $perusahaan->deskripsi ?? 'Tidak ada deskripsi tersedia.' }}</p>
        </div>
    </div>

    <div class="text-end">
        <a href="{{ route('perusahaan.profile.edit') }}" class="btn btn-success btn-lg">
            <i class="fas fa-edit me-2"></i>Edit Profil
        </a>
    </div>
</div>
@endsection
