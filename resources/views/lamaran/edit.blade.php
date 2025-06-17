@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Lamaran</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('lamaran.update', $lamaran->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Alumni</label>
                                <input type="text" class="form-control" value="{{ $lamaran->alumni->nama_lengkap }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Lowongan</label>
                                <input type="text" class="form-control" value="{{ $lamaran->lowongan->judul }}" readonly>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status *</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="Menunggu" {{ old('status', $lamaran->status) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="Diproses" {{ old('status', $lamaran->status) == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="Interview" {{ old('status', $lamaran->status) == 'Interview' ? 'selected' : '' }}>Interview</option>
                                <option value="Diterima" {{ old('status', $lamaran->status) == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="Ditolak" {{ old('status', $lamaran->status) == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3" id="interviewFields" style="display: {{ $lamaran->status == 'Interview' ? 'block' : 'none' }};">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="tanggal_interview" class="form-label">Tanggal Interview</label>
                                    <input type="datetime-local" class="form-control @error('tanggal_interview') is-invalid @enderror" id="tanggal_interview" name="tanggal_interview" value="{{ old('tanggal_interview', $lamaran->tanggal_interview ? $lamaran->tanggal_interview->format('Y-m-d\TH:i') : '') }}">
                                    @error('tanggal_interview')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="lokasi_interview" class="form-label">Lokasi Interview</label>
                                    <input type="text" class="form-control @error('lokasi_interview') is-invalid @enderror" id="lokasi_interview" name="lokasi_interview" value="{{ old('lokasi_interview', $lamaran->lokasi_interview) }}">
                                    @error('lokasi_interview')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan" rows="3">{{ old('catatan', $lamaran->catatan) }}</textarea>
                            @error('catatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <a href="{{ route('lamaran.index') }}" class="btn btn-secondary mt-2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('status').addEventListener('change', function() {
        const interviewFields = document.getElementById('interviewFields');
        if (this.value === 'Interview') {
            interviewFields.style.display = 'block';
        } else {
            interviewFields.style.display = 'none';
        }
    });
</script>
@endsection
