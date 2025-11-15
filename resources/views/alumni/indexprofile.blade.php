@extends('alumni.admin')

@section('content')
    <div class="container py-5">
        <h3 class="mb-4 text-primary fw-bold">Profil Anda</h3>

        <div class="card shadow-sm p-4">
            <div class="row g-4">
                {{-- Foto Profil --}}
                <div class="col-md-3 text-center">
                    <img src="{{ $alumni->foto ? asset('storage/alumni/' . $alumni->foto) : asset('default.png') }}"
                        alt="Foto {{ $alumni->nama_lengkap }}" class="img-thumbnail"
                        style="width: 250px; height: 250px; object-fit: cover;">
                </div>

                {{-- Info Utama --}}
                <div class="col-md-9">
                    <h4 class="fw-bold">{{ $alumni->nama_lengkap }}</h4>
                    <p class="text-muted">{{ $alumni->email }}</p>

                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>NISN:</strong> {{ $alumni->nisn }}</li>
                                <li class="list-group-item"><strong>Jenis Kelamin:</strong> {{ $alumni->jenis_kelamin }}
                                </li>
                                <li class="list-group-item"><strong>Tahun Lulus:</strong> {{ $alumni->tahun_lulus }}</li>
                                <li class="list-group-item"><strong>Jurusan:</strong> {{ $alumni->jurusan }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Tempat Lahir:</strong> {{ $alumni->tempat_lahir }}</li>
                                <li class="list-group-item"><strong>Tanggal Lahir:</strong> {{ $alumni->tanggal_lahir }}
                                </li>
                                <li class="list-group-item"><strong>Telepon:</strong> {{ $alumni->telepon }}</li>
                            </ul>
                        </div>
                    </div>

                    {{-- Skills & Pengalaman --}}
                    <div class="mt-4">
                        <h5 class="fw-bold">Skills</h5>
                        <p>{{ $alumni->skills ?? '-' }}</p>

                        <h5 class="fw-bold mt-3">Pengalaman</h5>
                        <p>{{ $alumni->pengalaman ?? '-' }}</p>
                    </div>

                    {{-- CV --}}
                    <div class="mt-3">
                        @if ($alumni->cv)
                            <a href="{{ asset('storage/alumni/' . $alumni->cv) }}" class="btn btn-outline-secondary"
                                target="_blank">
                                <i class="fas fa-file-pdf"></i> Lihat CV
                            </a>
                        @endif
                    </div>

                    {{-- Tombol Edit --}}
                    <div class="mt-4">
                        <a href="{{ route('alumni.profile.edit') }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
