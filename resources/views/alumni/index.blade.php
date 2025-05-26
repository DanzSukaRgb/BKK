@extends('layouts.app')

@section('title', 'Daftar Alumni')

@section('content')
    <h2 class="text-center mb-5">Daftar Alumni</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="mb-3">
        <a href="{{ route('alumni.create') }}" class="btn btn-primary">Tambah Alumni</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jurusan</th>
                    <th>Tahun Lulus</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumni as $item)
                    <tr>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>{{ $item->tahun_lulus }}</td>
                        <td>
                            <a href="{{ route('alumni.show', $item) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('alumni.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('alumni.destroy', $item) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
