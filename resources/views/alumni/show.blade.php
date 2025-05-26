@extends('layouts.app')

@section('title', 'Detail Alumni')

@section('content')
    <h2 class="text-center mb-5">Detail Alumni</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            @if ($alumni->foto)
                <img src="{{ asset('storage/' . $alumni->foto) }}" alt="{{ $alumni->nama_lengkap }}" class="img-fluid rounded mb-3" style="max-width: 200px;">
            @else
                <img src="{{ asset('assets/placeholder.png') }}" alt="No Photo" class="img-fluid rounded mb-3" style="max-width: 200px;">
            @endif
            <h5 class="card-title">{{ $alumni->nama_lengkap }}</h5>
            <p><strong>NISN:</strong> {{ $alumni->nisn }}</p>
            <p><strong>Email:</strong> {{ $alumni->email }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $alumni->jenis_kelamin }}</p>
            <p><strong>Tempat Lahir:</strong> {{ $alumni->tempat_lahir }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $alumni->tanggal_lahir }}</p>
            <p><strong>Alamat:</strong> {{ $alumni->alamat }}</p>
            <p><strong>Telepon:</strong> {{ $alumni->telepon }}</p>
            <p><strong>Jurusan:</strong> {{ $alumni->jurusan }}</p>
            <p><strong>Tahun Lulus:</strong> {{ $alumni->tahun_lulus }}</p>
            @if ($alumni->skills)
                <p><strong>Skills:</strong> {{ $alumni->skills }}</p>
            @endif
            @if ($alumni->pengalaman)
                <p><strong>Pengalaman:</strong> {{ $alumni->pengalaman }}</p>
            @endif
            @if ($alumni->cv)
                <p><strong>CV:</strong> <a href="{{ asset('storage/' . $alumni->cv) }}" target="_blank">Download CV</a></p>
            @endif
            <a href="{{ route('alumni.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
