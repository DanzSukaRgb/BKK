@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-md-6">
            <h1>Daftar Alumni</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('alumni.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Alumni
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
                            <th>Foto</th>
                            <th>NISN</th>
                            <th>Nama Lengkap</th>
                            <th>Jurusan</th>
                            <th>Tahun Lulus</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumni as $item)
                        <tr>
                            <td>
                                @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto {{ $item->nama_lengkap }}" width="50" class="img-thumbnail">
                                @else
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    {{ substr($item->nama_lengkap, 0, 1) }}
                                </div>
                                @endif
                            </td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>{{ $item->tahun_lulus }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('alumni.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('alumni.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('alumni.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus alumni ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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
