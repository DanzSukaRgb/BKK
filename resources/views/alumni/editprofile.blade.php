@extends('alumni.admin')

@section('content')
<div class="container py-4">
    <h3>Edit Profil Alumni</h3>
    <hr>

    <form action="{{ route('alumni.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card p-4">
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>NISN</label>
                    <input type="text" name="nisn" class="form-control" value="{{ $alumni->nisn }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="{{ $alumni->nama_lengkap }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="Laki-laki" {{ $alumni->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $alumni->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ $alumni->tempat_lahir }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $alumni->tanggal_lahir }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $alumni->alamat }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="{{ $alumni->telepon }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $alumni->email }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Tahun Lulus</label>
                    <input type="text" name="tahun_lulus" class="form-control" value="{{ $alumni->tahun_lulus }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="{{ $alumni->jurusan }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Skills</label>
                    <textarea name="skills" class="form-control">{{ $alumni->skills }}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Pengalaman</label>
                    <textarea name="pengalaman" class="form-control">{{ $alumni->pengalaman }}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Foto Baru</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Upload CV</label>
                    <input type="file" name="cv" class="form-control">
                </div>

            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="{{ route('alumni.profile') }}" class="btn btn-secondary">Batal</a>

        </div>
    </form>
</div>
@endsection
