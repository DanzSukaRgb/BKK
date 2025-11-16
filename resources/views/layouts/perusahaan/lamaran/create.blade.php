@extends('layouts.perusahaan.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Tambah Lamaran Baru</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('perusahaan.lamaran.store', auth()->user()->perusahaan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                            <label for="pesan" class="form-label">Pesan / Surat Lamaran *</label>
                            <textarea class="form-control @error('pesan') is-invalid @enderror" id="pesan" name="pesan" rows="4" required>{{ old('pesan') }}</textarea>
                            @error('pesan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="dokumen" class="form-label">Upload Dokumen (PDF/DOC) *</label>
                            <input type="file" class="form-control @error('dokumen') is-invalid @enderror" id="dokumen" name="dokumen" required>
                            @error('dokumen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('perusahaan.lamaran.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
