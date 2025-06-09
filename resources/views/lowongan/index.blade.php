@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-md-6">
            <h1></h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('lowongan.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Lowongan
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('lowongan.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Cari lowongan..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <select name="jenis_pekerjaan" class="form-select">
                            <option value="">Semua Jenis Pekerjaan</option>
                            @foreach(['Full-time', 'Part-time', 'Kontrak', 'Freelance'] as $jenis)
                            <option value="{{ $jenis }}" {{ request('jenis_pekerjaan') == $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <select name="pendidikan" class="form-select">
                            <option value="">Semua Pendidikan</option>
                            @foreach(['SMA/SMK', 'D3', 'S1', 'S2'] as $pendidikan)
                            <option value="{{ $pendidikan }}" {{ request('pendidikan') == $pendidikan ? 'selected' : '' }}>{{ $pendidikan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Perusahaan</th>
                            <th>Posisi</th>
                            <th>Tanggal Tutup</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lowongan as $item)
                        <tr>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->perusahaan->nama }}</td>
                            <td>{{ $item->posisi }}</td>
                            <td>{{ $item->tanggal_tutup->format('d M Y') }}</td>
                            <td>
                                <span class="badge bg-{{ $item->status == 'Aktif' ? 'success' : 'secondary' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('lowongan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('lowongan.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('lowongan.show.public', $item->slug) }}" class="btn btn-sm btn-info" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $lowongan->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
