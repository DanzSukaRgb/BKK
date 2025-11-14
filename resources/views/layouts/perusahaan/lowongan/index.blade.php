@extends('perusahaan.dashboard')

@section('title', 'Daftar Lowongan')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Daftar Lowongan</h3>
        <a href="{{ route('perusahaan.jobs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Lowongan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle mb-0 bg-white">
            <thead class="table-primary">
                <tr>
                    <th>Judul</th>
                    <th>Posisi</th>
                    <th>Pendidikan</th>
                    <th>Jenis Pekerjaan</th>
                    <th>Status</th>
                    <th>Tanggal Tutup</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lowongans as $lowongan)
                    <tr>
                        <td>{{ $lowongan->judul }}</td>
                        <td>{{ $lowongan->posisi }}</td>
                        <td>{{ $lowongan->pendidikan }}</td>
                        <td>{{ $lowongan->jenis_pekerjaan }}</td>
                        <td>
                            @if($lowongan->status == 'Aktif')
                                <span class="badge bg-success">{{ $lowongan->status }}</span>
                            @else
                                <span class="badge bg-secondary">{{ $lowongan->status }}</span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($lowongan->tanggal_tutup)->format('d-m-Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('perusahaan.jobs.edit', $lowongan) }}" class="btn btn-sm btn-warning me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('perusahaan.jobs.destroy', $lowongan) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada lowongan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $lowongans->links('vendor.pagination.bootstrap-5') }}
    </div>
</div>
@endsection
