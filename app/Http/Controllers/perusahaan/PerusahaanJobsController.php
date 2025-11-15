<?php
namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PerusahaanJobsController extends Controller
{
    // Menampilkan daftar lowongan
    public function index()
    {
        $user       = auth()->user();
        $perusahaan = $user->perusahaan;

        $lowongans = Lowongan::where('perusahaan_id', $perusahaan->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $lowonganCount = Lowongan::where('perusahaan_id', $perusahaan->id)->count();

        return view('layouts.perusahaan.lowongan.index', compact('lowongans', 'lowonganCount'));
    }

    // Form tambah lowongan
    public function create()
    {
        return view('layouts.perusahaan.lowongan.create');
    }

    // Simpan lowongan baru
    public function store(Request $request)
    {
        $request->validate([
            'judul'            => 'required|string|max:255',
            'posisi'           => 'required|string|max:100',
            'deskripsi'        => 'required|string',
            'gaji'             => 'nullable|string|max:100',
            'jenis_pekerjaan'  => 'required|in:Full-time,Part-time,Kontrak,Freelance',
            'pendidikan'       => 'required|in:SMA/SMK,D3,S1,S2',
            'pengalaman'       => 'nullable|string',
            'skill_dibutuhkan' => 'nullable|string',
            'tanggal_buka'     => 'required|date',
            'tanggal_tutup'    => 'required|date|after:tanggal_buka',
            'kuota'            => 'required|integer|min:1',
        ]);

        $data                  = $request->all();
        $data['slug']          = Str::slug($request->judul) . '-' . Str::random(6);
        $data['status']        = 'Aktif';
        $data['user_id']       = Auth::id();
        $data['perusahaan_id'] = Auth::user()->perusahaan_id;

        // Skill diubah menjadi array
        $data['skill_dibutuhkan'] = $request->skill_dibutuhkan
            ? array_map('trim', explode(',', $request->skill_dibutuhkan))
            : [];

        Lowongan::create($data);

        return redirect()->route('perusahaan.jobs.index')->with('success', 'Lowongan berhasil ditambahkan.');
    }

    // Form edit lowongan
    public function edit(Lowongan $lowongan)
    {
        if ($lowongan->perusahaan_id != Auth::user()->perusahaan_id) {
            abort(403, 'Akses ditolak');
        }

        return view('layouts.perusahaan.lowongan.edit', compact('lowongan'));
    }

    // Update lowongan
    public function update(Request $request, Lowongan $lowongan)
    {
        if ($lowongan->perusahaan_id != Auth::user()->perusahaan_id) {
            abort(403, 'Akses ditolak');
        }

        $request->validate([
            'judul'            => 'required|string|max:255',
            'posisi'           => 'required|string|max:100',
            'deskripsi'        => 'required|string',
            'gaji'             => 'nullable|string|max:100',
            'jenis_pekerjaan'  => 'required|in:Full-time,Part-time,Kontrak,Freelance',
            'pendidikan'       => 'required|in:SMA/SMK,D3,S1,S2',
            'pengalaman'       => 'nullable|string',
            'skill_dibutuhkan' => 'nullable|string',
            'tanggal_buka'     => 'required|date',
            'tanggal_tutup'    => 'required|date|after:tanggal_buka',
            'kuota'            => 'required|integer|min:1',
        ]);

        $data = $request->all();

        // Update slug jika judul berubah
        if ($lowongan->judul != $request->judul) {
            $data['slug'] = Str::slug($request->judul) . '-' . Str::random(6);
        } else {
            $data['slug'] = $lowongan->slug;
        }

        $data['skill_dibutuhkan'] = $request->skill_dibutuhkan
            ? array_map('trim', explode(',', $request->skill_dibutuhkan))
            : [];

        $lowongan->update($data);

        return redirect()->route('perusahaan.jobs.index')->with('success', 'Lowongan berhasil diperbarui.');
    }

    // Hapus lowongan
    public function destroy(Lowongan $lowongan)
    {
        if ($lowongan->perusahaan_id != Auth::user()->perusahaan_id) {
            abort(403, 'Akses ditolak');
        }

        $lowongan->delete();

        return redirect()->route('perusahaan.jobs.index')->with('success', 'Lowongan berhasil dihapus.');
    }
    public function dashboard()
    {
        $user       = Auth::user();
        $perusahaan = $user->perusahaan;

        // Hitung jumlah lowongan aktif perusahaan
        $lowonganCount = Lowongan::where('perusahaan_id', $perusahaan->id)->count();

        return view('perusahaan.dashboard', compact('perusahaan', 'lowonganCount'));
    }
}