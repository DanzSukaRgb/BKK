@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Detail Alumni</h2>
                    <div>
                        <a href="{{ route('alumni.edit', $alumni->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('alumni.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            @if($alumni->foto)
                                <img src="{{ asset('storage/' . $alumni->foto) }}" alt="Foto {{ $alumni->nama_lengkap }}" class="img-fluid rounded" style="max-height: 200px;">
                            @else
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 200px; height: 200px; font-size: 80px;">
                                    {{ substr($alumni->nama_lengkap, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h3>{{ $alumni->nama_lengkap }}</h3>
                            <p class="text-muted">NISN: {{ $alumni->nisn }}</p>
                            <p><i class="fas fa-venus-mars"></i> {{ $alumni->jenis_kelamin }}</p>
                            <p><i class="fas fa-birthday-cake"></i> {{ $alumni->tempat_lahir }}, {{ \Carbon\Carbon::parse($alumni->tanggal_lahir)->format('d F Y') }}</p>
                            <p><i class="fas fa-envelope"></i> {{ $alumni->email }}</p>
                            <p><i class="fas fa-phone"></i> {{ $alumni->telepon }}</p>
                            <p><i class="fas fa-graduation-cap"></i> Lulus {{ $alumni->tahun_lulus }} - {{ $alumni->jurusan }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <h4>Alamat</h4>
                            <div class="border p-3 rounded bg-light">
                                {{ $alumni->alamat }}
                            </div>
                        </div>
                    </div>

                    @if($alumni->skills || $alumni->pengalaman)
                    <div class="row">
                        @if($alumni->skills)
                        <div class="col-md-6 mb-3">
                            <h4>Skills</h4>
                            <div class="border p-3 rounded bg-light">
                                {!! nl2br(e($alumni->skills)) !!}
                            </div>
                        </div>
                        @endif
                        @if($alumni->pengalaman)
                        <div class="col-md-6 mb-3">
                            <h4>Pengalaman</h4>
                            <div class="border p-3 rounded bg-light">
                                {!! nl2br(e($alumni->pengalaman)) !!}
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    @if($alumni->cv)
                    <div class="row">
                        <div class="col-12">
                            <h4>Curriculum Vitae (CV)</h4>
                            <a href="{{ asset('storage/' . $alumni->cv) }}" target="_blank" class="btn btn-primary">
                                <i class="fas fa-download"></i> Download CV
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
