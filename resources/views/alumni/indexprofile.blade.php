    @extends('alumni.admin')
    @section('content')
    <div class="container py-4">
        <h3>Profil Alumni</h3>
        <hr>

        <div class="card p-4">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ $alumni->foto ? asset('storage/alumni/foto/'.$alumni->foto) : asset('default.png') }}"
                        class="img-fluid rounded" />
                </div>

                <div class="col-md-9">
                    <h4>{{ $alumni->nama_lengkap }}</h4>
                    <p>{{ $alumni->email }}</p>

                    <table class="table">
                        <tr><th>NISN</th><td>{{ $alumni->nisn }}</td></tr>
                        <tr><th>Jenis Kelamin</th><td>{{ $alumni->jenis_kelamin }}</td></tr>
                        <tr><th>Tahun Lulus</th><td>{{ $alumni->tahun_lulus }}</td></tr>
                        <tr><th>Jurusan</th><td>{{ $alumni->jurusan }}</td></tr>
                    </table>

                    <a href="{{ route('alumni.profile.edit') }}" class="btn btn-primary">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
