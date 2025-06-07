@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Tambah Lamaran Baru</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.lamaran.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="alumni_id" class="form-label">Alumni *</label>
                            <select class="form-select @error('alumni_id') is-invalid @enderror" id="alumni_id" name="alumni_id" required>
                                <option value="">Pilih Alumni</option>
                                @foreach($alumni as $item)
                                    <option value="{{ $item->id }}" {{ old('alumni_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_lengkap }} ({{ $item->nisn }})
                                    </option>
                                @endforeach
                            </select>
                            @error('alumni_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lowongan_id" class="form-label">Lowongan *</label>
                            <select class="form-select @error('lowongan_id') is-invalid @enderror" id="lowongan_id" name="lowongan_id" required>
                                <option value="">Pilih Lowongan</option>
                                @foreach($lowongan as $item)
                                    <option value="{{ $item->id }}" {{ old('lowongan_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->judul }}
                                    </option>
                                @endforeach
                            </select>
                            @error('lowongan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="surat_lamaran" class="form-label">Surat Lamaran *</label>
                            <input type="text" class="form-control @error('surat_lamaran') is-invalid @enderror" id="surat_lamaran" name="surat_lamaran" value="{{ old('surat_lamaran') }}" required>
                            @error('surat_lamaran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
