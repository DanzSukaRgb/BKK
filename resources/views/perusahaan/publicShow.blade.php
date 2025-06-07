@extends('layouts.app')

@section('content')
<br><br><br>
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ route('perusahaan.public') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar Perusahaan
            </a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="row align-items-center">
                        <div class="col-md-3 text-center">
                            <img src="{{ $perusahaan->logo }}" alt="{{ $perusahaan->nama }}" class="img-fluid rounded" style="max-height: 100px;">
                        </div>
                        <div class="col-md-9">
                            <h2 class="mb-0">{{ $perusahaan->nama }}</h2>
                            <p class="text-muted mb-0">
                                <i class="fas fa-industry"></i> {{ $perusahaan->industri ?? 'Tidak disebutkan' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="mb-3">Informasi Kontak</h5>
                            <p><i class="fas fa-map-marker-alt"></i> <strong>Alamat:</strong> {{ $perusahaan->alamat }}</p>
                            <p><i class="fas fa-phone"></i> <strong>Telepon:</strong> {{ $perusahaan->telepon }}</p>
                            <p><i class="fas fa-envelope"></i> <strong>Email:</strong> {{ $perusahaan->email }}</p>
                            @if($perusahaan->website)
                            <p><i class="fas fa-globe"></i> <strong>Website:</strong> <a href="{{ $perusahaan->website }}" target="_blank">{{ $perusahaan->website }}</a></p>
                            @endif
                            <p><i class="fas fa-users"></i> <strong>Jumlah Karyawan:</strong> {{ $perusahaan->jumlah_karyawan ?? 'Tidak disebutkan' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-3">Status</h5>
                            <p>
                                <span class="badge bg-success">
                                    Terverifikasi
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h5 class="mb-3">Tentang Perusahaan</h5>
                            <div class="border p-3 rounded bg-light">
                                {!! $perusahaan->deskripsi ? nl2br(e($perusahaan->deskripsi)) : 'Tidak ada deskripsi perusahaan.' !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <h5 class="mb-3">Lowongan Tersedia</h5>
                    @if($perusahaan->lowongan->isNotEmpty())
                        <div class="list-group">
                            @foreach($perusahaan->lowongan as $lowongan)
                            <a href="{{ route('lowongan.show.public', $lowongan->slug) }}" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ $lowongan->judul }}</h6>
                                    <small>
                                        {{ $lowongan->created_at ? $lowongan->created_at->diffForHumans() : 'Tanggal tidak tersedia' }}
                                    </small>
                                </div>
                                <p class="mb-1">{{ Str::limit($lowongan->deskripsi, 100) }}</p>
                                <small class="text-muted">
                                    Batas waktu: {{ optional($lowongan->tanggal_tutup)->format('d F Y') ?? 'Tidak ditentukan' }}
                                </small>

                            </a>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-info">
                            Saat ini tidak ada lowongan yang tersedia dari perusahaan ini.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
