@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Detail Perusahaan</h2>
                    <div>
                        <a href="{{ route('perusahaan.edit', $perusahaan->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('perusahaan.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <img src="{{ $perusahaan->logo }}" alt="Logo {{ $perusahaan->nama }}" class="img-fluid rounded" style="max-height: 200px;">
                        </div>
                        <div class="col-md-8">
                            <h3>{{ $perusahaan->nama }}</h3>
                            <p class="text-muted">{{ $perusahaan->industri ?? 'Tidak disebutkan' }}</p>
                            <p><i class="fas fa-map-marker-alt"></i> {{ $perusahaan->alamat }}</p>
                            <p><i class="fas fa-phone"></i> {{ $perusahaan->telepon }}</p>
                            <p><i class="fas fa-envelope"></i> {{ $perusahaan->email }}</p>
                            @if($perusahaan->website)
                            <p><i class="fas fa-globe"></i> <a href="{{ $perusahaan->website }}" target="_blank">{{ $perusahaan->website }}</a></p>
                            @endif
                            <p><i class="fas fa-users"></i> {{ $perusahaan->jumlah_karyawan ?? '0' }} karyawan</p>
                            <p>
                                Status:
                                <span class="badge bg-{{ $perusahaan->status_verifikasi === 'Terverifikasi' ? 'success' : 'warning' }}">
                                    {{ $perusahaan->status_verifikasi }}
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>Deskripsi Perusahaan</h4>
                            <div class="border p-3 rounded bg-light">
                                {!! $perusahaan->deskripsi ? nl2br(e($perusahaan->deskripsi)) : 'Tidak ada deskripsi' !!}
                            </div>
                            <a href="{{route('perusahaan.index')}}" class="btn btn-secondary mt-4">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
