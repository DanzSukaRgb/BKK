@extends('layouts.perusahaan.admin')

@section('title', 'Edit Lowongan')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Lowongan</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perusahaan.jobs.update', $lowongan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $lowongan->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="posisi" class="form-label">Posisi</label>
            <input type="text" class="form-control" id="posisi" name="posisi" value="{{ old('posisi', $lowongan->posisi) }}" required>
        </div>

        <div class="mb-3">
            <label for="pendidikan" class="form-label">Pendidikan</label>
            <select class="form-select" id="pendidikan" name="pendidikan" required>
                @foreach(['SMA/SMK', 'D3', 'S1', 'S2'] as $pendidikan)
                    <option value="{{ $pendidikan }}" {{ $lowongan->pendidikan == $pendidikan ? 'selected' : '' }}>{{ $pendidikan }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jenis_pekerjaan" class="form-label">Jenis Pekerjaan</label>
            <select class="form-select" id="jenis_pekerjaan" name="jenis_pekerjaan" required>
                @foreach(['Full-time', 'Part-time', 'Kontrak', 'Freelance'] as $jenis)
                    <option value="{{ $jenis }}" {{ $lowongan->jenis_pekerjaan == $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="kuota" class="form-label">Kuota</label>
            <input type="number" class="form-control" id="kuota" name="kuota" value="{{ old('kuota', $lowongan->kuota) }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_buka" class="form-label">Tanggal Buka</label>
            <input type="date" class="form-control" id="tanggal_buka" name="tanggal_buka" value="{{ old('tanggal_buka', $lowongan->tanggal_buka->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_tutup" class="form-label">Tanggal Tutup</label>
            <input type="date" class="form-control" id="tanggal_tutup" name="tanggal_tutup" value="{{ old('tanggal_tutup', $lowongan->tanggal_tutup->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $lowongan->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="skill_dibutuhkan" class="form-label">Skill Dibutuhkan (pisahkan dengan koma)</label>
            <input type="text" class="form-control" id="skill_dibutuhkan" name="skill_dibutuhkan" value="{{ old('skill_dibutuhkan', is_array($lowongan->skill_dibutuhkan) ? implode(',', $lowongan->skill_dibutuhkan) : $lowongan->skill_dibutuhkan) }}">
        </div>

        <div class="mb-3">
            <label for="pengalaman" class="form-label">Pengalaman</label>
            <input type="text" class="form-control" id="pengalaman" name="pengalaman" value="{{ old('pengalaman', $lowongan->pengalaman) }}">
        </div>

        <button type="submit" class="btn btn-success">Update Lowongan</button>
        <a href="{{ route('perusahaan.jobs.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
