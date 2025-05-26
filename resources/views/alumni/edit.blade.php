@extends('layouts.app')

@section('title', 'Edit Alumni')

@section('content')
    <h2 class="text-center mb-5">Edit Alumni</h2>
    <form action="{{ route('alumni.update', $alumni) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{ old('nisn', $alumni->nisn) }}">
                @error('nisn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $alumni->nama_lengkap) }}">
                @error('nama_lengkap')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $alumni->email) }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin', $alumni->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin', $alumni->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $alumni->tempat_lahir) }}">
                @error('tempat_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $alumni->tanggal_lahir) }}">
                @error('tanggal_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $alumni->alamat) }}">
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon', $alumni->telepon) }}">
                @error('telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                <input type="number" class="form-control @error('tahun_lulus') is-invalid @enderror" id="tahun_lulus" name="tahun_lulus" value="{{ old('tahun_lulus', $alumni->tahun_lulus) }}">
                @error('tahun_lulus')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" value="{{ old('jurusan', $alumni->jurusan) }}">
                @error('jurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="skills" class="form-label">Skills (Opsional)</label>
                <textarea class="form-control @error('skills') is-invalid @enderror" id="skills" name="skills">{{ old('skills', $alumni->skills) }}</textarea>
                @error('skills')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="pengalaman" class="form-label">Pengalaman (Opsional)</label>
                <textarea class="form-control @error('pengalaman') is-invalid @enderror" id="pengalaman" name="pengalaman">{{ old('pengalaman', $alumni->pengalaman) }}</textarea>
                @error('pengalaman')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="foto" class="form-label">Foto (Opsional)</label>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                @if ($alumni->foto)
                    <img src="{{ asset('storage/' . $alumni->foto) }}" alt="Current Photo" class="img-fluid mt-2" style="max-width: 100px;">
                @endif
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="cv" class="form-label">CV (Opsional)</label>
                <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv" name="cv">
                @if ($alumni->cv)
                    <a href="{{ asset('storage/' . $alumni->cv) }}" target="_blank" class="mt-2 d-block">Lihat CV Saat Ini</a>
                @endif
                @error('cv')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('alumni.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
