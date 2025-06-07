@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ route('kegiatan.public') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar Kegiatan
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ $kegiatan->gambar }}" alt="{{ $kegiatan->judul }}"
                             class="img-fluid rounded" style="max-height: 400px;">
                    </div>

                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h2>{{ $kegiatan->judul }}</h2>
                            <span class="badge bg-primary">{{ $kegiatan->tipe_kegiatan }}</span>
                        </div>
                        <span class="badge bg-{{ $kegiatan->status == 'Berlangsung' ? 'success' : ($kegiatan->status == 'Terlaksana' ? 'info' : 'warning') }}">
                            {{ $kegiatan->status }}
                        </span>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p><i class="fas fa-calendar-alt me-2"></i>
                                <strong>Tanggal:</strong> {{ $kegiatan->tanggal->format('l, d F Y') }}
                            </p>
                            <p><i class="fas fa-clock me-2"></i>
                                <strong>Waktu:</strong> {{ $kegiatan->waktu }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><i class="fas fa-map-marker-alt me-2"></i>
                                <strong>Tempat:</strong> {{ $kegiatan->tempat }}
                            </p>
                            @if($kegiatan->narasumber)
                            <p><i class="fas fa-user-tie me-2"></i>
                                <strong>Narasumber:</strong> {{ $kegiatan->narasumber }}
                            </p>
                            @endif
                        </div>
                    </div>

                    @if($kegiatan->biaya)
                    <div class="alert alert-info mb-4">
                        <strong>Biaya:</strong> {{ $kegiatan->biaya }}
                    </div>
                    @endif

                    <hr>

                    <h4 class="mb-3">Deskripsi Kegiatan</h4>
                    <div class="border p-3 rounded bg-light">
                        {!! nl2br(e($kegiatan->deskripsi)) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h4 class="mb-0">Kegiatan Lainnya</h4>
                </div>
                <div class="card-body">
                    @forelse($kegiatanLain as $item)
                    <div class="mb-3 pb-3 border-bottom">
                        <h5><a href="{{ route('kegiatan.show.public', $item->id) }}">{{ $item->judul }}</a></h5>
                        <small class="text-muted">
                            <i class="fas fa-calendar-alt"></i> {{ $item->tanggal->format('d M Y') }}
                        </small>
                    </div>
                    @empty
                    <div class="text-muted">Tidak ada kegiatan lainnya</div>
                    @endforelse
                </div>
            </div>

            @if($kegiatan->status == 'Berlangsung')
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Daftar Sekarang</h4>
                </div>
                <div class="card-body">
                    @auth
                        <form action="#" method="POST">
                            @csrf
                            <input type="hidden" name="kegiatan_id" value="{{ $kegiatan->id }}">

                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Daftar Kegiatan</button>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-info">
                            <p class="mb-3">Silakan login untuk mendaftar kegiatan ini.</p>
                            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary">Daftar</a>
                        </div>
                    @endauth
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
