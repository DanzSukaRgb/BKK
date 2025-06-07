@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-md-6">
            <h1 class="fw-bold">Daftar Lamaran</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('lamaran.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Tambah Lamaran
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Filter Lamaran</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('lamaran.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-4">
                        <select name="status" class="form-select" aria-label="Filter by status">
                            <option value="">Semua Status</option>
                            <option value="Menunggu" {{ request('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="Diterima" {{ request('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="Interview" {{ request('status') == 'Interview' ? 'selected' : '' }}>Interview</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="lowongan_id" class="form-select" aria-label="Filter by lowongan">
                            <option value="">Semua Lowongan</option>
                            @foreach(\App\Models\Lowongan::orderBy('judul')->get() as $lowongan)
                                <option value="{{ $lowongan->id }}" {{ request('lowongan_id') == $lowongan->id ? 'selected' : '' }}>
                                    {{ $lowongan->judul }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-filter me-2"></i> Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Daftar Lamaran</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>Alumni</th>
                            <th>Lowongan</th>
                            <th>Perusahaan</th>
                            <th>Tanggal Lamar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($lamaran as $item)
                        <tr>
                            <td>
                                <a href="{{ route('alumni.show', $item->alumni_id) }}" class="text-decoration-none">
                                    {{ $item->alumni->nama_lengkap }}
                                </a>
                            </td>
                            <td>{{ $item->lowongan->judul }}</td>
                            <td>{{ $item->lowongan->perusahaan->nama }}</td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                            <td>
                                <span class="badge bg-{{ $item->status == 'Diterima' ? 'success' : ($item->status == 'Ditolak' ? 'danger' : ($item->status == 'Interview' ? 'warning' : ($item->status == 'Diproses' ? 'info' : 'secondary'))) }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('lamaran.show', $item->id) }}" class="btn btn-sm btn-info" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('lamaran.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('lamaran.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus lamaran ini?')" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @if($item->alumni->cv)
                                    <a href="{{ route('lamaran.download-cv', $item->alumni_id) }}" class="btn btn-sm btn-secondary" title="Download CV">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Tidak ada lamaran ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $lamaran->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
