<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class LowonganController extends Controller
{
    public function index()
    {
        $lowongan = Lowongan::with('perusahaan')
            ->latest()
            ->filter(request(['search', 'jenis_pekerjaan', 'pendidikan']))
            ->paginate(10);

        return view('lowongan.index', compact('lowongan'));
    }

    public function create()
    {
        $perusahaan = Perusahaan::orderBy('nama')->get();
        return view('lowongan.create', compact('perusahaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'perusahaan_id' => 'required|exists:perusahaan,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'posisi' => 'required|string|max:100',
            'gaji' => 'nullable|string|max:100',
            'jenis_pekerjaan' => 'required|in:Full-time,Part-time,Kontrak,Freelance',
            'pendidikan' => 'required|in:SMA/SMK,D3,S1,S2',
            'pengalaman' => 'nullable|string',
            'skill_dibutuhkan' => 'nullable|string',
            'tanggal_buka' => 'required|date',
            'tanggal_tutup' => 'required|date|after:tanggal_buka',
            'kuota' => 'required|integer|min:1',
        ]);

        $lowonganData = $request->all();
        $lowonganData['slug'] = Str::slug($request->judul) . '-' . Str::random(6);
        $lowonganData['status'] = 'Aktif';

        $lowonganData['skill_dibutuhkan'] = $request->skill_dibutuhkan
            ? array_map('trim', explode(',', $request->skill_dibutuhkan))
            : [];

        Lowongan::create($lowonganData);

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil ditambahkan');
    }

    public function edit(Lowongan $lowongan)
    {
        $perusahaan = Perusahaan::orderBy('nama')->get();
        return view('lowongan.edit', compact('lowongan', 'perusahaan'));
    }

    public function update(Request $request, Lowongan $lowongan)
    {
        $request->validate([
            'perusahaan_id' => 'required|exists:perusahaan,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'posisi' => 'required|string|max:100',
            'gaji' => 'nullable|string|max:100',
            'jenis_pekerjaan' => 'required|in:Full-time,Part-time,Kontrak,Freelance',
            'pendidikan' => 'required|in:SMA/SMK,D3,S1,S2',
            'pengalaman' => 'nullable|string',
            'skill_dibutuhkan' => 'nullable|string',
            'tanggal_buka' => 'required|date',
            'tanggal_tutup' => 'required|date|after:tanggal_buka',
            'kuota' => 'required|integer|min:1',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $lowonganData = $request->except('slug');

        if ($lowongan->judul != $request->judul) {
            $lowonganData['slug'] = Str::slug($request->judul) . '-' . Str::random(6);
        }

        $lowonganData['skill_dibutuhkan'] = $request->skill_dibutuhkan
            ? array_map('trim', explode(',', $request->skill_dibutuhkan))
            : [];

        $lowongan->update($lowonganData);

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil diperbarui');
    }

    public function destroy(Lowongan $lowongan)
    {
        $lowongan->delete();
        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil dihapus');
    }

    public function toggleStatus(Lowongan $lowongan)
    {
        $lowongan->update([
            'status' => $lowongan->status == 'Aktif' ? 'Nonaktif' : 'Aktif'
        ]);

        return back()->with('success', 'Status lowongan berhasil diubah');
    }

    public function publicIndex()
    {
        $lowongan = Lowongan::with('perusahaan')
            ->where('status', 'Aktif')
            ->where('tanggal_tutup', '>=', Carbon::today())
            ->filter(request(['search', 'jenis_pekerjaan', 'pendidikan', 'industri']))
            ->latest()
            ->paginate(12);

        return view('lowongan.publicIndex', compact('lowongan'));
    }

    public function publicShow($slug)
    {
        $lowongan = Lowongan::where('slug', $slug)
            ->where('status', 'Aktif')
            ->where('tanggal_tutup', '>=', Carbon::today())
            ->firstOrFail();

        return view('lowongan.publicShow', compact('lowongan'));
    }
}
