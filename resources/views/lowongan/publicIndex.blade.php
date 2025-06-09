@extends('layouts.app')

@section('content')
<br><br><br>

<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-8"><br>
            <h2 class="mb-4 text-primary">Lowongan Pekerjaan Terbaru</h2>
        </div>
        <div class="col-md-4"><br>
            <form action="{{ route('lowongan.public') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari lowongan..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse($lowongan as $job)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="badge bg-{{ $job->status == 'Aktif' ? 'success' : 'secondary' }}">
                            {{ $job->status }}
                        </span>
                        <small class="text-muted">
                            {{ $job->created_at ? $job->created_at->diffForHumans() : 'Tanggal tidak tersedia' }}
                        </small>

                    </div>
                    <h5 class="card-title fw-bold">{{ $job->judul }}</h5>
                    <p class="card-text text-muted mb-1">
                        <i class="fas fa-building me-2"></i>{{ $job->perusahaan->nama }}
                    </p>
                    <p class="card-text text-muted mb-1">
                        <i class="fas fa-briefcase me-2"></i>{{ $job->posisi }}
                    </p>
                    <p class="card-text text-muted mb-3">
                        <i class="fas fa-calendar-alt me-2"></i>
                        Tutup: {{ $job->tanggal_tutup->format('d M Y') }}
                        ({{ $job->tanggal_tutup->diffForHumans() }})
                    </p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('lowongan.show.public', $job->slug) }}" class="btn btn-outline-primary btn-sm">Detail</a>
                        @auth
                            @if(auth()->user()->role == 'alumni')
                                <a href="{{ route('lowongan.show.public', $job->slug) }}#lamar" class="btn btn-primary btn-sm">Lamar</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login untuk Lamar</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                Tidak ada lowongan yang tersedia saat ini.
            </div>
        </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $lowongan->links() }}
    </div>
</div>

<style>
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
