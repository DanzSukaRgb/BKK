@extends('layouts.perusahaan.admin')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="fw-bold">Detail Lamaran</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('perusahaan.lamaran.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Lamaran
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Informasi Lamaran</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Detail Alumni</h5>
                    <p><strong>Nama:</strong> {{ $lamaran->alumni->nama_lengkap }}</p>
                    <p><strong>Email:</strong> {{ $lamaran->alumni->email }}</p>
                    <p><strong>NISN:</strong> {{ $lamaran->alumni->nisn }}</p>
                    <p><strong>Jurusan:</strong> {{ $lamaran->alumni->jurusan }}</p>
                    <p><strong>Tahun Lulus:</strong> {{ $lamaran->alumni->tahun_lulus }}</p>
                    @if($lamaran->alumni->cv)
                        <p>
                            <strong>CV:</strong>
                            <a href="{{ route('perusahaan.lamaran.download', $lamaran->id) }}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-download me-2"></i> Download CV
                            </a>
                        </p>
                    @endif
                </div>
                <div class="col-md-6">
                    <h5>Detail Lowongan</h5>
                    <p><strong>Judul:</strong> {{ $lamaran->lowongan->judul }}</p>
                    <p><strong>Perusahaan:</strong> {{ $lamaran->lowongan->perusahaan->nama }}</p>
                    <p><strong>Posisi:</strong> {{ $lamaran->lowongan->posisi }}</p>
                    <p><strong>Jenis Pekerjaan:</strong> {{ $lamaran->lowongan->jenis_pekerjaan }}</p>
                    <p><strong>Pendidikan:</strong> {{ $lamaran->lowongan->pendidikan }}</p>
                </div>
            </div>

            <hr class="my-4">

            <h5>Detail Lamaran</h5>
            <p><strong>Tanggal Lamaran:</strong> {{ $lamaran->created_at->format('d M Y H:i') }}</p>
            <p><strong>Status:</strong>
                <span class="badge bg-{{ $lamaran->status == 'Diterima' ? 'success' : ($lamaran->status == 'Ditolak' ? 'danger' : ($lamaran->status == 'Interview' ? 'warning' : ($lamaran->status == 'Diproses' ? 'info' : 'secondary'))) }}">
                    {{ $lamaran->status }}
                </span>
            </p>
            <p><strong>Pesan/Cover Letter:</strong></p>
            <div class="border p-3 rounded bg-light">
                {!! nl2br(e($lamaran->pesan)) !!}
            </div>
            @if($lamaran->dokumen)
                <p class="mt-3">
                    <strong>Dokumen:</strong>
                    <a href="{{ Storage::url($lamaran->dokumen) }}" class="btn btn-sm btn-secondary" target="_blank">
                        <i class="fas fa-file-download me-2"></i> Download Dokumen
                    </a>
                </p>
            @endif
            @if($lamaran->catatan)
                <p class="mt-3"><strong>Catatan:</strong></p>
                <div class="border p-3 rounded bg-light">
                    {!! nl2br(e($lamaran->catatan)) !!}
                </div>
            @endif
        </div>
        <div class="card-footer bg-white">
            <div class="btn-group">
                <a href="{{ route('perusahaan.lamaran.edit', $lamaran->id) }}" class="btn btn-warning" style="border-radius: 5px;">
                    <i class="fas fa-edit me-2"></i> Edit
                </a>
                <form action="{{ route('perusahaan.lamaran.destroy', $lamaran->id) }}" method="POST" class="d-inline" style="margin-left: 10px">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus lamaran ini?')">
                        <i class="fas fa-trash me-2"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
