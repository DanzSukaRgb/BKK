<?php
namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
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
        $alumni   = Alumni::orderBy('nama_lengkap')->get();
        $lowongan = Lowongan::where('status', 'Aktif')
            ->where('tanggal_tutup', '>=', now())
            ->orderBy('judul')
            ->get();

        return view('lamaran.create', compact('alumni', 'lowongan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alumni_id'     => 'required|exists:alumni,id',
            'lowongan_id'   => 'required|exists:lowongan,id',
            'surat_lamaran' => 'required',
        ]);

        // Check if alumni already applied for this job
        $existingLamaran = Lamaran::where('alumni_id', $request->alumni_id)
            ->where('lowongan_id', $request->lowongan_id)
            ->first();

        if ($existingLamaran) {
            return back()->with('error', 'Alumni sudah melamar di lowongan ini sebelumnya');
        }

        Lamaran::create([
            'alumni_id'     => $request->alumni_id,
            'lowongan_id'   => $request->lowongan_id,
            'surat_lamaran' => $request->surat_lamaran,
            'status'        => 'Menunggu',
        ]);

        return redirect()->route('lamaran.index')->with('success', 'Lamaran berhasil dikirim');
    }

    public function show(Lamaran $lamaran)
    {
        $lamaran->load(['alumni', 'lowongan']);
        return view('lamaran.show', compact('lamaran'));
    }

    public function edit(Lamaran $lamaran)
    {
        $alumni   = Alumni::orderBy('nama_lengkap')->get();
        $lowongan = Lowongan::orderBy('judul')->get();
        return view('lamaran.edit', compact('lamaran', 'alumni', 'lowongan'));
    }

    public function update(Request $request, Lamaran $lamaran)
    {
        $request->validate([
            'status'  => 'required|in:Menunggu,Diterima,Ditolak',
            'catatan' => 'nullable',
        ]);

        $lamaran->update([
            'status'  => $request->status,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('lamaran.index')->with('success', 'Status lamaran berhasil diperbarui');
    }

    public function destroy(Lamaran $lamaran)
    {
        $lamaran->delete();
        return redirect()->route('lamaran.index')->with('success', 'Lamaran berhasil dihapus');
    }

    public function downloadCv(Alumni $alumni)
    {
        if (! $alumni->cv || ! Storage::disk('public')->exists($alumni->cv)) {
            abort(404);
        }

        return Storage::disk('public')->download($alumni->cv, 'CV_' . $alumni->nama_lengkap . '.pdf');
    }
}
