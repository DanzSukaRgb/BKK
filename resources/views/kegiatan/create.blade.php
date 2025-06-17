@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Tambah Kegiatan BKK</h1>
        <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Kegiatan</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                   id="judul" name="judul" value="{{ old('judul') }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                   id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="time" class="form-control @error('waktu') is-invalid @enderror"
                                   id="waktu" name="waktu" value="{{ old('waktu') }}" required>
                            @error('waktu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tempat" class="form-label">Tempat</label>
                            <input type="text" class="form-control @error('tempat') is-invalid @enderror"
                                   id="tempat" name="tempat" value="{{ old('tempat') }}" required>
                            @error('tempat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar/Flyer</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                   id="gambar" name="gambar" accept="image/*">
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Format: JPEG, PNG (Maksimal 2MB)</small>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tipe_kegiatan" class="form-label">Tipe Kegiatan</label>
                    <select class="form-select @error('tipe_kegiatan') is-invalid @enderror" name="tipe_kegiatan" id="tipe_kegiatan">
                        <option value="">-- Pilih Tipe Kegiatan --</option>
                        <option value="Pelatihan" {{ old('tipe_kegiatan') == 'Pelatihan' ? 'selected' : '' }}>Pelatihan</option>
                        <option value="Seminar" {{ old('tipe_kegiatan') == 'Seminar' ? 'selected' : '' }}>Seminar</option>
                        <option value="Lokakarya" {{ old('tipe_kegiatan') == 'Lokakarya' ? 'selected' : '' }}>Lokakarya</option>
                        <option value="Rekrutmen" {{ old('tipe_kegiatan') == 'Rekrutmen' ? 'selected' : '' }}>Rekrutmen</option>
                    </select>
                    @error('tipe_kegiatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Kegiatan</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                              id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Kegiatan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
