@extends('perusahaan.dashboard')

@section('title', 'Edit Profil Perusahaan')

@section('content')
<div class="container py-4">
    <h2>Edit Profil Perusahaan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perusahaan.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Perusahaan</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $perusahaan->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat', $perusahaan->alamat) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" name="telepon" id="telepon" class="form-control" value="{{ old('telepon', $perusahaan->telepon) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $perusahaan->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="url" name="website" id="website" class="form-control" value="{{ old('website', $perusahaan->website) }}">
        </div>

        <div class="mb-3">
            <label for="industri" class="form-label">Industri</label>
            <input type="text" name="industri" id="industri" class="form-control" value="{{ old('industri', $perusahaan->industri) }}" required>
        </div>

        <div class="mb-3">
            <label for="jumlah_karyawan" class="form-label">Jumlah Karyawan</label>
            <input type="number" name="jumlah_karyawan" id="jumlah_karyawan" class="form-control" value="{{ old('jumlah_karyawan', $perusahaan->jumlah_karyawan) }}" required min="1">
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Perusahaan</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5">{{ old('deskripsi', $perusahaan->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo Perusahaan</label>
            <input type="file" name="logo" id="logo" class="form-control">
            @if($perusahaan->logo)
                <img src="{{ $perusahaan->logo }}" alt="Logo" class="img-thumbnail mt-2" width="150">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('perusahaan.profile.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
