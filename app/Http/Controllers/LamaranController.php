<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LamaranController extends Controller
{
    // Daftar lamaran untuk perusahaan
    public function index()
    {
        $user = auth()->user();

        $lamaran = Lamaran::with(['alumni', 'lowongan'])
            ->whereHas('lowongan', function ($query) use ($user) {
                $query->where('perusahaan_id', $user->perusahaan_id);
            })
            ->latest()
            ->filter(request(['status', 'lowongan_id']))
            ->paginate(10);

        return view('layouts.perusahaan.lamaran.index', compact('lamaran'));
    }

    // Membuat lamaran baru (untuk alumni)
    public function create()
    {
        $alumni = Alumni::where('user_id', Auth::id())->firstOrFail();
        $lowongan = Lowongan::where('status', 'Aktif')
            ->where('tanggal_tutup', '>=', now())
            ->orderBy('judul')
            ->get();

        return view('layouts.perusahaan.lamaran.create', compact('alumni', 'lowongan'));
    }

    // Menyimpan lamaran baru (untuk alumni)
    public function store(Request $request, $id)
    {
        $request->validate([
            'lowongan_id' => 'required|exists:lowongan,id',
            'pesan' => 'required|string',
            'dokumen' => 'required|file|mimes:pdf,doc,docx|max:5120', // 5MB max
        ]);

        $lowongan = Lowongan::findOrFail($id);

        if ($lowongan->status !== 'Aktif' || $lowongan->tanggal_tutup < now()) {
            return back()->with('error', 'Lowongan ini sudah tidak menerima lamaran.');
        }

        $hasApplied = Lamaran::where('alumni_id', auth()->user()->alumni->id)
            ->where('lowongan_id', $lowongan->id)
            ->exists();

        if ($hasApplied) {
            return back()->with('error', 'Anda sudah melamar lowongan ini.');
        }

        $lamaran = new Lamaran();
        $lamaran->alumni_id = auth()->user()->alumni->id;
        $lamaran->lowongan_id = $request->lowongan_id;
        $lamaran->pesan = $request->pesan;
        $lamaran->status = 'Menunggu';

        if ($request->hasFile('dokumen')) {
            $path = $request->file('dokumen')->store('dokumen', 'public');
            $lamaran->dokumen = $path;
        }

        $lamaran->save();

        return redirect()->back()->with('success', 'Lamaran berhasil dikirim.');
    }

    // Menampilkan detail lamaran
    public function show(Lamaran $lamaran)
    {
        $this->authorizePerusahaan($lamaran);
        $lamaran->load(['alumni', 'lowongan']);
        return view('layouts.perusahaan.lamaran.show', compact('lamaran'));
    }

    // Edit lamaran (ubah status / catatan)
    public function edit(Lamaran $lamaran)
    {
        $this->authorizePerusahaan($lamaran);
        $lowongan = Lowongan::where('perusahaan_id', auth()->user()->perusahaan_id)
            ->orderBy('judul')
            ->get();

        return view('layouts.perusahaan.lamaran.edit', compact('lamaran', 'lowongan'));
    }

    // Update lamaran (ubah status / catatan)
    public function update(Request $request, Lamaran $lamaran)
    {
        $this->authorizePerusahaan($lamaran);

        $request->validate([
            'status' => 'required|in:Menunggu,Diterima,Ditolak,Interview,Diproses',
            'catatan' => 'nullable|string',
        ]);

        $lamaran->update([
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('perusahaan.lamaran.index')
            ->with('success', 'Status lamaran berhasil diperbarui');
    }

    // Hapus lamaran
    public function destroy(Lamaran $lamaran)
    {
        $this->authorizePerusahaan($lamaran);

        Storage::disk('public')->delete($lamaran->dokumen);
        $lamaran->delete();

        return redirect()->route('perusahaan.lamaran.index')
            ->with('success', 'Lamaran berhasil dihapus');
    }

    // Download dokumen lamaran
    public function downloadDokumen(Lamaran $lamaran)
    {
        $this->authorizePerusahaan($lamaran);

        if (!Storage::disk('public')->exists($lamaran->dokumen)) {
            abort(404);
        }

        return Storage::disk('public')->download(
            $lamaran->dokumen,
            'Lamaran_' . $lamaran->alumni->nama_lengkap . '_' . $lamaran->lowongan->judul . '.' . pathinfo($lamaran->dokumen, PATHINFO_EXTENSION)
        );
    }

    // Helper: validasi akses perusahaan
    private function authorizePerusahaan(Lamaran $lamaran)
    {
        if ($lamaran->lowongan->perusahaan_id !== auth()->user()->perusahaan_id) {
            abort(403, 'Anda tidak berhak mengakses lamaran ini.');
        }
    }
}
