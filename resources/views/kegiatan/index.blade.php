@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Daftar Kegiatan BKK</h1>
        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Kegiatan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Tempat</th>
                            <th>Tipe Kegiatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kegiatan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ $item->gambar }}" alt="{{ $item->judul }}"
                                     class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover;">
                            </td>
                            <td>{{ $item->judul }}</td>
                            <td>
                                {{ $item->tanggal->format('d M Y') }}<br>
                                <small>{{ $item->waktu }}</small>
                            </td>
                            <td>{{ $item->tempat }}</td>
                            <td>{{ $item->tipe_kegiatan }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('kegiatan.show', $item->id) }}"
                                       class="btn btn-sm btn-info" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('kegiatan.edit', $item->id) }}"
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                                title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data kegiatan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $kegiatan->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
