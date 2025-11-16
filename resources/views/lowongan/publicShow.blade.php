@extends('layouts.app')

@section('content')
    <br><br><br>
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-12">
                <a href="{{ route('lowongan.public') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Lowongan
                </a>
            </div>
        </div>

        <div class="row">
            <!-- Kolom Detail Lowongan -->
            <div class="col-md-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h2 class="mb-1">{{ $lowongan->judul }}</h2>
                                <h4 class="text-primary">{{ $lowongan->perusahaan->nama }}</h4>
                            </div>
                            <span class="badge bg-{{ $lowongan->status == 'Aktif' ? 'success' : 'secondary' }}">
                                {{ $lowongan->status }}
                            </span>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p><i class="fas fa-briefcase me-2"></i> <strong>Posisi:</strong> {{ $lowongan->posisi }}
                                </p>
                                <p><i class="fas fa-clock me-2"></i> <strong>Jenis:</strong>
                                    {{ $lowongan->jenis_pekerjaan }}</p>
                                <p><i class="fas fa-graduation-cap me-2"></i> <strong>Pendidikan:</strong>
                                    {{ $lowongan->pendidikan }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><i class="fas fa-money-bill-wave me-2"></i> <strong>Gaji:</strong>
                                    {{ $lowongan->gaji ?? 'Negosiasi' }}</p>
                                <p><i class="fas fa-calendar-alt me-2"></i> <strong>Buka:</strong>
                                    {{ $lowongan->tanggal_buka->format('d M Y') }}</p>
                                <p><i class="fas fa-calendar-times me-2"></i> <strong>Tutup:</strong>
                                    {{ $lowongan->tanggal_tutup->format('d M Y') }}</p>
                            </div>
                        </div>

                        <hr>

                        <div class="mb-4">
                            <h4>Deskripsi Pekerjaan</h4>
                            <div class="border p-3 rounded bg-light">
                                {!! nl2br(e($lowongan->deskripsi)) !!}
                            </div>
                        </div>

                        @if ($lowongan->pengalaman)
                            <div class="mb-4">
                                <h4>Pengalaman Dibutuhkan</h4>
                                <div class="border p-3 rounded bg-light">
                                    {!! nl2br(e($lowongan->pengalaman)) !!}
                                </div>
                            </div>
                        @endif

                        @if (is_array($lowongan->skill_dibutuhkan) && count($lowongan->skill_dibutuhkan) > 0)
                            <div class="mb-4">
                                <h4>Skill Dibutuhkan</h4>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach ($lowongan->skill_dibutuhkan as $skill)
                                        <span class="badge bg-primary">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Form Lamar -->
                <div class="card shadow-sm mb-4" id="lamar">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Lamar Lowongan Ini</h4>
                    </div>
                    <div class="card-body">
                        @auth
                            @php
                                $alumni = auth()->user()->alumni ?? null;
                            @endphp

                            @if (auth()->user()->isAlumni())
                                @if (!$alumni)
                                    <div class="alert alert-warning">
                                        Silakan lengkapi profil alumni Anda sebelum melamar lowongan.
                                        <a href="" class="btn btn-sm btn-primary">Lengkapi Profil</a>
                                    </div>
                                @elseif($lowongan->status == 'Aktif' && $lowongan->tanggal_tutup >= now())
                                    @php
                                        $hasApplied = App\Models\Lamaran::where('alumni_id', $alumni->id)
                                            ->where('lowongan_id', $lowongan->id)
                                            ->exists();
                                    @endphp

                                    @if ($hasApplied)
                                        <div class="alert alert-info">
                                            Anda sudah melamar lowongan ini. Status lamaran Anda:
                                            <strong>{{ $alumni->lamaran->firstWhere('lowongan_id', $lowongan->id)->status ?? '-' }}</strong>
                                        </div>
                                    @else
                                        <form action="{{ route('lamaran.store', $lowongan->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}">

                                            <div class="mb-3">
                                                <label for="pesan" class="form-label">Pesan/Cover Letter</label>
                                                <textarea class="form-control @error('pesan') is-invalid @enderror" id="pesan" name="pesan" rows="5"
                                                    required>{{ old('pesan') }}</textarea>
                                                @error('pesan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="dokumen" class="form-label">Unggah Dokumen Pendukung (CV,
                                                    Portofolio, dll)</label>
                                                <input type="file"
                                                    class="form-control @error('dokumen') is-invalid @enderror" id="dokumen"
                                                    name="dokumen" accept=".pdf,.doc,.docx" required>
                                                @error('dokumen')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <small class="text-muted">Format: PDF, DOC, DOCX (Maksimal 5MB)</small>
                                            </div>

                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Kirim Lamaran</button>
                                            </div>
                                        </form>
                                    @endif
                                @else
                                    <div class="alert alert-warning">
                                        Lowongan ini sudah tidak menerima lamaran.
                                    </div>
                                @endif
                            @else
                                <div class="alert alert-warning">
                                    Hanya alumni yang dapat melamar lowongan.
                                </div>
                            @endif
                        @else
                            <div class="alert alert-info">
                                <p class="mb-3">Silakan login sebagai alumni untuk melamar lowongan ini.</p>
                                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                <a href="{{ route('register') }}" class="btn btn-outline-primary">Daftar</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Kolom Perusahaan & Lowongan Lainnya -->
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h4 class="mb-0">Tentang Perusahaan</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src="{{ $lowongan->perusahaan->logo }}" alt="{{ $lowongan->perusahaan->nama }}"
                                class="img-fluid rounded" style="max-height: 100px;">
                        </div>
                        <h5>{{ $lowongan->perusahaan->nama }}</h5>
                        <p class="text-muted"><i class="fas fa-industry me-2"></i> {{ $lowongan->perusahaan->industri }}
                        </p>
                        <p><i class="fas fa-map-marker-alt me-2"></i> {{ $lowongan->perusahaan->alamat }}</p>
                        <p><i class="fas fa-phone me-2"></i> {{ $lowongan->perusahaan->telepon }}</p>
                        <p><i class="fas fa-envelope me-2"></i> {{ $lowongan->perusahaan->email }}</p>
                        @if ($lowongan->perusahaan->website)
                            <p><i class="fas fa-globe me-2"></i> <a href="{{ $lowongan->perusahaan->website }}"
                                    target="_blank">{{ $lowongan->perusahaan->website }}</a></p>
                        @endif
                        <a href="{{ route('perusahaan.show.public', $lowongan->perusahaan->id) }}"
                            class="btn btn-outline-primary btn-sm mt-2">
                            Lihat Profil Perusahaan
                        </a>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h4 class="mb-0">Lowongan Lainnya</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($lowongan->perusahaan->lowongan->where('id', '!=', $lowongan->id)->take(3) as $otherJob)
                            <div class="mb-3 pb-3 border-bottom">
                                <h6><a
                                        href="{{ route('lowongan.show.public', $otherJob->slug) }}">{{ $otherJob->judul }}</a>
                                </h6>
                                <small class="text-muted">{{ $otherJob->posisi }} •
                                    {{ $otherJob->jenis_pekerjaan }}</small>
                            </div>
                        @endforeach
                        @if ($lowongan->perusahaan->lowongan->count() <= 1)
                            <div class="text-muted">Tidak ada lowongan lainnya dari perusahaan ini</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
