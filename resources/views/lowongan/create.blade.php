@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Tambah Lowongan Baru</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('lowongan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="perusahaan_id" class="form-label">Perusahaan *</label>
                            <select class="form-select @error('perusahaan_id') is-invalid @enderror" id="perusahaan_id" name="perusahaan_id" required>
                                <option value="">Pilih Perusahaan</option>
                                @foreach($perusahaan as $company)
                                <option value="{{ $company->id }}" {{ old('perusahaan_id') == $company->id ? 'selected' : '' }}>{{ $company->nama }}</option>
                                @endforeach
                            </select>
                            @error('perusahaan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Lowongan *</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Pekerjaan *</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="posisi" class="form-label">Posisi *</label>
                                <input type="text" class="form-control @error('posisi') is-invalid @enderror" id="posisi" name="posisi" value="{{ old('posisi') }}" required>
                                @error('posisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gaji" class="form-label">Gaji</label>
                                <input type="text" class="form-control @error('gaji') is-invalid @enderror" id="gaji" name="gaji" value="{{ old('gaji') }}">
                                @error('gaji')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="jenis_pekerjaan" class="form-label">Jenis Pekerjaan *</label>
                                <select class="form-select @error('jenis_pekerjaan') is-invalid @enderror" id="jenis_pekerjaan" name="jenis_pekerjaan" required>
                                    <option value="">Pilih Jenis Pekerjaan</option>
                                    <option value="Full-time" {{ old('jenis_pekerjaan') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                    <option value="Part-time" {{ old('jenis_pekerjaan') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                    <option value="Kontrak" {{ old('jenis_pekerjaan') == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                                    <option value="Freelance" {{ old('jenis_pekerjaan') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                                </select>
                                @error('jenis_pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="pendidikan" class="form-label">Pendidikan *</label>
                                <select class="form-select @error('pendidikan') is-invalid @enderror" id="pendidikan" name="pendidikan" required>
                                    <option value="">Pilih Pendidikan</option>
                                    <option value="SMA/SMK" {{ old('pendidikan') == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                                    <option value="D3" {{ old('pendidikan') == 'D3' ? 'selected' : '' }}>D3</option>
                                    <option value="S1" {{ old('pendidikan') == 'S1' ? 'selected' : '' }}>S1</option>
                                    <option value="S2" {{ old('pendidikan') == 'S2' ? 'selected' : '' }}>S2</option>
                                </select>
                                @error('pendidikan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="pengalaman" class="form-label">Pengalaman</label>
                            <input type="text" class="form-control @error('pengalaman') is-invalid @enderror" id="pengalaman" name="pengalaman" value="{{ old('pengalaman') }}">
                            @error('pengalaman')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_buka" class="form-label">Tanggal Buka *</label>
                                <input type="date" class="form-control @error('tanggal_buka') is-invalid @enderror" id="tanggal_buka" name="tanggal_buka" value="{{ old('tanggal_buka', date('Y-m-d')) }}" required>
                                @error('tanggal_buka')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_tutup" class="form-label">Tanggal Tutup *</label>
                                <input type="date" class="form-control @error('tanggal_tutup') is-invalid @enderror" id="tanggal_tutup" name="tanggal_tutup" value="{{ old('tanggal_tutup') }}" required>
                                @error('tanggal_tutup')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="kuota" class="form-label">Kuota *</label>
                            <input type="number" class="form-control @error('kuota') is-invalid @enderror" id="kuota" name="kuota" value="{{ old('kuota') }}" min="1" required>
                            @error('kuota')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('lowongan.index') }}" class="btn btn-secondary mt-2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @extends('layouts.admin')

@section('title', 'Buat Lowongan')

@section('content')
<div class="container">
    <h2>Buat Lowongan Baru</h2>
    <form method="POST" action="{{ route('admin.lowongan.store') }}">
        @csrf
        <div class="mb-3">
            <label for="perusahaan_id" class="form-label">Perusahaan</label>
            <select name="perusahaan_id" id="perusahaan_id" class="form-control" required>
                <option value="">Pilih Perusahaan</option>
                @foreach($perusahaan as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
            @error('perusahaan_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul') }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="posisi" class="form-label">Posisi</label>
            <input type="text" name="posisi" id="posisi" class="form-control" value="{{ old('posisi') }}" required>
            @error('posisi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="gaji" class="form-label">Gaji</label>
            <input type="text" name="gaji" id="gaji" class="form-control" value="{{ old('gaji') }}">
            @error('gaji')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jenis_pekerjaan" class="form-label">Jenis Pekerjaan</label>
            <select name="jenis_pekerjaan" id="jenis_pekerjaan" class="form-control" required>
                <option value="">Pilih Jenis Pekerjaan</option>
                <option value="Full-time" {{ old('jenis_pekerjaan') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                <option value="Part-time" {{ old('jenis_pekerjaan') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                <option value="Kontrak" {{ old('jenis_pekerjaan') == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                <option value="Freelance" {{ old('jenis_pekerjaan') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
            </select>
            @error('jenis_pekerjaan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="pendidikan" class="form-label">Pendidikan</label>
            <select name="pendidikan" id="pendidikan" class="form-control" required>
                <option value="">Pilih Pendidikan</option>
                <option value="SMA/SMK" {{ old('pendidikan') == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                <option value="D3" {{ old('pendidikan') == 'D3' ? 'selected' : '' }}>D3</option>
                <option value="S1" {{ old('pendidikan') == 'S1' ? 'selected' : '' }}>S1</option>
                <option value="S2" {{ old('pendidikan') == 'S2' ? 'selected' : '' }}>S2</option>
            </select>
            @error('pendidikan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="pengalaman" class="form-label">Pengalaman</label>
            <input type="text" name="pengalaman" id="pengalaman" class="form-control" value="{{ old('pengalaman') }}">
            @error('pengalaman')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="skill_dibutuhkan" class="form-label">Skill Dibutuhkan</label>
            <input type="text" name="skill_dibutuhkan" id="skill_dibutuhkan" class="form-control" value="{{ old('skill_dibutuhkan') }}">
            @error('skill_dibutuhkan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal_buka" class="form-label">Tanggal Buka</label>
            <input type="date" name="tanggal_buka" id="tanggal_buka" class="form-control" value="{{ old('tanggal_buka') }}" required>
            @error('tanggal_buka')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal_tutup" class="form-label">Tanggal Tutup</label>
            <input type="date" name="tanggal_tutup" id="tanggal_tutup" class="form-control" value="{{ old('tanggal_tutup') }}" required>
            @error('tanggal_tutup')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kuota" class="form-label">Kuota</label>
            <input type="number" name="kuota" id="kuota" class="form-control" value="{{ old('kuota') }}" required>
            @error('kuota')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection --}}
