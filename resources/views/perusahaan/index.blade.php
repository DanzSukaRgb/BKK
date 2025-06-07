@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-md-6">
            <h1>Daftar Perusahaan</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('perusahaan.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Perusahaan
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Nama</th>
                            <th>Industri</th>
                            <th>Karyawan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($perusahaan as $item)
                        <tr>
                            <td>
                                <img src="{{ $item->logo }}" alt="Logo {{ $item->nama }}" width="50" class="img-thumbnail">
                            </td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->industri }}</td>
                            <td>{{ $item->jumlah_karyawan }}</td>
                            <td>
                                <span class="badge bg-{{ $item->status_verifikasi === 'Terverifikasi' ? 'success' : 'warning' }}">
                                    {{ $item->status_verifikasi }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('perusahaan.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('perusahaan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('perusahaan.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus perusahaan ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @if($item->status_verifikasi !== 'Terverifikasi')
                                        <a href="{{ route('perusahaan.verify', $item->id) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-check"></i> Verifikasi
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
