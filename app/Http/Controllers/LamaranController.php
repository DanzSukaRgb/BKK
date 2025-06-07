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
    public function index()
    {
        $lamaran = Lamaran::with(['alumni', 'lowongan'])
            ->latest()
            ->filter(request(['status', 'lowongan_id']))
            ->paginate(10);

        return view('lamaran.index', compact('lamaran'));
    }

    public function create()
    {
        $alumni = Alumni::where('user_id', Auth::id())->firstOrFail();
        $lowongan = Lowongan::where('status', 'Aktif')
            ->where('tanggal_tutup', '>=', now())
            ->orderBy('judul')
            ->get();

        return view('lamaran.create', compact('alumni', 'lowongan'));
    }

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

    public function show(Lamaran $lamaran)
    {
        $lamaran->load(['alumni', 'lowongan']);
        return view('lamaran.show', compact('lamaran'));
    }

    public function edit(Lamaran $lamaran)
    {
        $lowongan = Lowongan::orderBy('judul')->get();
        return view('lamaran.edit', compact('lamaran', 'lowongan'));
    }

    public function update(Request $request, Lamaran $lamaran)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Diterima,Ditolak',
            'catatan' => 'nullable|string',
        ]);

        $lamaran->update([
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('lamaran.index')
            ->with('success', 'Status lamaran berhasil diperbarui');
    }

    public function destroy(Lamaran $lamaran)
    {
        // Delete associated file
        Storage::disk('public')->delete($lamaran->dokumen);

        $lamaran->delete();

        return redirect()->route('lamaran.index')
            ->with('success', 'Lamaran berhasil dihapus');
    }

    public function downloadDokumen(Lamaran $lamaran)
    {
        if (!Storage::disk('public')->exists($lamaran->dokumen)) {
            abort(404);
        }

        return Storage::disk('public')->download(
            $lamaran->dokumen,
            'Lamaran_' . $lamaran->alumni->nama_lengkap . '_' . $lamaran->lowongan->judul . '.' . pathinfo($lamaran->dokumen, PATHINFO_EXTENSION)
        );
    }
}
