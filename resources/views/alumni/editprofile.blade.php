@extends('alumni.admin')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Edit Profil Alumni</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('alumni.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card p-4 shadow-sm">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">NISN</label>
                    <input type="text" name="nisn" class="form-control" value="{{ old('nisn', $alumni->nisn) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $alumni->nama_lengkap) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select">
                        <option value="Laki-laki" {{ old('jenis_kelamin', $alumni->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $alumni->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $alumni->tempat_lahir) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $alumni->tanggal_lahir) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $alumni->alamat) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $alumni->telepon) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $alumni->email) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tahun Lulus</label>
                    <input type="text" name="tahun_lulus" class="form-control" value="{{ old('tahun_lulus', $alumni->tahun_lulus) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan', $alumni->jurusan) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Skills</label>
                    <textarea name="skills" class="form-control" rows="3">{{ old('skills', $alumni->skills) }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Pengalaman</label>
                    <textarea name="pengalaman" class="form-control" rows="3">{{ old('pengalaman', $alumni->pengalaman) }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Foto Baru (Pastikan Tidak Lebih 2 MB)</label>
                    <input type="file" name="foto" class="form-control">
                    @if($alumni->foto)
                        <img src="{{ asset('storage/alumni/' . $alumni->foto) }}" class="img-thumbnail mt-2" width="150">
                    @endif
                </div>

                <div class="col-md-6">
                    <label class="form-label">Upload CV (Pastikan PDF)</label>
                    <input type="file" name="cv" class="form-control">
                    @if($alumni->cv)
                        <a href="{{ asset('storage/alumni/' . $alumni->cv) }}" target="_blank" class="btn btn-sm btn-info mt-2">Lihat CV</a>
                    @endif
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="{{ route('alumni.profile') }}" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection
