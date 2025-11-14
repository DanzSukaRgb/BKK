@extends('perusahaan.dashboard')

@section('title', 'Tambah Jobs')

@section('content')
<div class="container mt-4">
    <h2>Tambah Jobs</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perusahaan.jobs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" required>
        </div>

        <div class="mb-3">
            <label for="posisi" class="form-label">Posisi</label>
            <input type="text" class="form-control" id="posisi" name="posisi" value="{{ old('posisi') }}" required>
        </div>

        <div class="mb-3">
            <label for="pendidikan" class="form-label">Pendidikan</label>
            <select class="form-control" id="pendidikan" name="pendidikan" required>
                <option value="">-- Pilih Pendidikan --</option>
                <option value="SMA/SMK" {{ old('pendidikan') == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                <option value="D3" {{ old('pendidikan') == 'D3' ? 'selected' : '' }}>D3</option>
                <option value="S1" {{ old('pendidikan') == 'S1' ? 'selected' : '' }}>S1</option>
                <option value="S2" {{ old('pendidikan') == 'S2' ? 'selected' : '' }}>S2</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jenis_pekerjaan" class="form-label">Jenis Pekerjaan</label>
            <select class="form-control" id="jenis_pekerjaan" name="jenis_pekerjaan" required>
                <option value="">-- Pilih Jenis Pekerjaan --</option>
                <option value="Full-time" {{ old('jenis_pekerjaan') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                <option value="Part-time" {{ old('jenis_pekerjaan') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                <option value="Kontrak" {{ old('jenis_pekerjaan') == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                <option value="Freelance" {{ old('jenis_pekerjaan') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_buka" class="form-label">Tanggal Buka</label>
            <input type="date" class="form-control" id="tanggal_buka" name="tanggal_buka" value="{{ old('tanggal_buka') }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_tutup" class="form-label">Tanggal Tutup</label>
            <input type="date" class="form-control" id="tanggal_tutup" name="tanggal_tutup" value="{{ old('tanggal_tutup') }}" required>
        </div>

        <div class="mb-3">
            <label for="kuota" class="form-label">Kuota</label>
            <input type="number" class="form-control" id="kuota" name="kuota" value="{{ old('kuota') }}" min="1" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="skill_dibutuhkan" class="form-label">Skill Dibutuhkan (pisahkan dengan koma)</label>
            <input type="text" class="form-control" id="skill_dibutuhkan" name="skill_dibutuhkan" value="{{ old('skill_dibutuhkan') }}">
        </div>

        <div class="mb-3">
            <label for="pengalaman" class="form-label">Pengalaman</label>
            <input type="text" class="form-control" id="pengalaman" name="pengalaman" value="{{ old('pengalaman') }}">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('perusahaan.jobs.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
