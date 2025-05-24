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
            'judul' => 'required',
            'deskripsi' => 'required',
            'posisi' => 'required',
            'gaji' => 'nullable',
            'jenis_pekerjaan' => 'required',
            'pendidikan' => 'required',
            'pengalaman' => 'nullable',
            'tanggal_buka' => 'required|date',
            'tanggal_tutup' => 'required|date|after:tanggal_buka',
            'kuota' => 'required|integer|min:1',
        ]);

        $lowonganData = $request->all();
        $lowonganData['slug'] = Str::slug($request->judul) . '-' . Str::random(6);
        $lowonganData['status'] = 'Aktif';

        Lowongan::create($lowonganData);

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil ditambahkan');
    }

    public function show(Lowongan $lowongan)
    {
        $lowongan->load('perusahaan');
        return view('lowongan.show', compact('lowongan'));
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'posisi' => 'required',
            'gaji' => 'nullable',
            'jenis_pekerjaan' => 'required',
            'pendidikan' => 'required',
            'pengalaman' => 'nullable',
            'tanggal_buka' => 'required|date',
            'tanggal_tutup' => 'required|date|after:tanggal_buka',
            'kuota' => 'required|integer|min:1',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $lowonganData = $request->all();

        // Only update slug if title changed
        if ($lowongan->judul != $request->judul) {
            $lowonganData['slug'] = Str::slug($request->judul) . '-' . Str::random(6);
        }

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
}