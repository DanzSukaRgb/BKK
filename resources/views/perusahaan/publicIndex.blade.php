@extends('layouts.app')

@section('content')
<br><br><br>

<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="text-center">Daftar Perusahaan Mitra</h1>
            <p class="text-center text-muted">Temukan perusahaan-perusahaan yang bekerja sama dengan kami</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <form action="{{ route('perusahaan.public') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari perusahaan..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    @if(request('search'))
                    <a href="{{ route('perusahaan.public') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times"></i>
                    </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse($perusahaan as $company)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-white text-center py-3">
                    <img src="{{ $company->logo }}" alt="{{ $company->nama }}" class="img-fluid" style="max-height: 80px;">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $company->nama }}</h5>
                    <p class="card-text text-muted">
                        <i class="fas fa-industry"></i> {{ $company->industri ?? 'Tidak disebutkan' }}
                    </p>
                    <p class="card-text">
                        <i class="fas fa-map-marker-alt"></i> {{ Str::limit($company->alamat, 50) }}
                    </p>
                </div>
                <div class="card-footer bg-white">
                    <a href="{{ route('perusahaan.show.public', $company->id) }}" class="btn btn-outline-primary btn-sm">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                Tidak ada perusahaan yang ditemukan.
            </div>
        </div>
        @endforelse
    </div>

    <div class="row">
        <div class="col-12">
            {{ $perusahaan->links() }}
        </div>
    </div>
</div>
@endsection
