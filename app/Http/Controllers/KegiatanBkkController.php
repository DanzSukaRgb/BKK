<?php
namespace App\Http\Controllers;

use App\Models\KegiatanBkk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanBkkController extends Controller
{
    public function index()
    {
        $kegiatan = KegiatanBkk::latest()->paginate(10);
        return view('kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required',
            'deskripsi' => 'required',
            'tanggal'   => 'required|date',
            'waktu'     => 'required',
            'tempat'    => 'required',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tipe_kegiatan' => 'nullable|in:Pelatihan,Seminar,Lokakarya,Rekrutmen',
            'narasumber' => 'nullable|string|max:255',
            'biaya' => 'nullable|string|max:100',
            'status' => 'nullable|in:Terlaksana,Ditunda,Berlangsung',
        ]);

        $kegiatanData = $request->all();

        if ($request->hasFile('gambar')) {
            $kegiatanData['gambar'] = $request->file('gambar')->store('kegiatan', 'public');
        }

        KegiatanBkk::create($kegiatanData);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function show(KegiatanBkk $kegiatan)
    {
        return view('kegiatan.show', compact('kegiatan'));
    }

    public function edit(KegiatanBkk $kegiatan)
    {
        return view('kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, KegiatanBkk $kegiatan)
    {
        $request->validate([
            'judul'     => 'required',
            'deskripsi' => 'required',
            'tanggal'   => 'required|date',
            'waktu'     => 'required',
            'tempat'    => 'required',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tipe_kegiatan' => 'nullable|in:Pelatihan,Seminar,Lokakarya,Rekrutmen',
            'narasumber' => 'nullable|string|max:255',
            'biaya' => 'nullable|string|max:100',
            'status' => 'nullable|in:Terlaksana,Ditunda,Berlangsung',
        ]);

        $kegiatanData = $request->all();

        if ($request->hasFile('gambar')) {
            if ($kegiatan->gambar) {
                Storage::disk('public')->delete($kegiatan->gambar);
            }
            $kegiatanData['gambar'] = $request->file('gambar')->store('kegiatan', 'public');
        }

        $kegiatan->update($kegiatanData);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui');
    }

    public function destroy(KegiatanBkk $kegiatan)
    {
        if ($kegiatan->gambar) {
            Storage::disk('public')->delete($kegiatan->gambar);
        }

        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus');
    }

    // Public methods
    public function publicIndex()
    {
        $kegiatan = KegiatanBkk::where('status', 'Berlangsung')
            ->where('tanggal', '>=', now()->subDay())
            ->orderBy('tanggal')
            ->paginate(9);

        return view('kegiatan.public-index', compact('kegiatan'));
    }

    public function publicShow($id)
    {
        $kegiatan = KegiatanBkk::where('status', '!=', 'Ditunda')
            ->findOrFail($id);

        $kegiatanLain = KegiatanBkk::where('id', '!=', $id)
            ->where('status', 'Berlangsung')
            ->where('tanggal', '>=', now())
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('kegiatan.public-show', compact('kegiatan', 'kegiatanLain'));
    }
}
