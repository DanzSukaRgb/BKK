<?php
namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::with('user')->orderBy('nama')->get();
        return view('perusahaan.index', compact('perusahaan'));
    }

    public function create()
    {
        return view('perusahaan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'            => 'required|string|max:255',
            'alamat'          => 'required|string',
            'telepon'         => 'required|string|max:20',
            'email'           => 'required|email|unique:perusahaan,email',
            'website'         => 'nullable|url',
            'deskripsi'       => 'nullable|string',
            'logo'            => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'industri'        => 'required|string|max:255',
            'jumlah_karyawan' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('perusahaan', 'public');
        }

        $validated['user_id']           = auth()->id();
        $validated['status_verifikasi'] = 'Belum Diverifikasi';

        Perusahaan::create($validated);

        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil ditambahkan');
    }

    public function show(Perusahaan $perusahaan)
    {
        return view('perusahaan.show', compact('perusahaan'));
    }

    public function edit(Perusahaan $perusahaan)
    {
        return view('perusahaan.edit', compact('perusahaan'));
    }

    public function update(Request $request, Perusahaan $perusahaan)
    {
        $validated = $request->validate([
            'nama'            => 'required|string|max:255',
            'alamat'          => 'required|string',
            'telepon'         => 'required|string|max:20',
            'email'           => 'required|email|unique:perusahaan,email,' . $perusahaan->id,
            'website'         => 'nullable|url',
            'deskripsi'       => 'nullable|string',
            'logo'            => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'industri'        => 'required|string|max:255',
            'jumlah_karyawan' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('logo')) {
            if ($perusahaan->logo) {
                Storage::disk('public')->delete($perusahaan->logo);
            }
            $validated['logo'] = $request->file('logo')->store('perusahaan', 'public');
        }

        $perusahaan->update($validated);

        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil diperbarui');
    }

    public function destroy(Perusahaan $perusahaan)
    {
        if ($perusahaan->logo) {
            Storage::disk('public')->delete($perusahaan->logo);
        }
        $perusahaan->delete();
        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil dihapus');
    }

    public function verify($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->update(['status_verifikasi' => 'Terverifikasi']);
        return back()->with('success', 'Perusahaan berhasil diverifikasi');
    }

    // Public methods
    public function publicIndex()
    {
        $perusahaan = Perusahaan::where('status_verifikasi', 'Terverifikasi')
            ->orderBy('nama')
            ->paginate(10);
        return view('perusahaan.publicIndex', compact('perusahaan'));
    }

    public function publicShow($id)
    {
        $perusahaan = Perusahaan::where('status_verifikasi', 'Terverifikasi')
            ->findOrFail($id);
        return view('perusahaan.publicShow', compact('perusahaan'));
    }
    public function dashboard()
    {
        $user       = Auth::user();
        $perusahaan = $user->perusahaan;

        if (! $perusahaan) {
            return redirect()->route('perusahaan.create')
                ->with('error', 'Data perusahaan belum ditemukan. Silakan lengkapi profil perusahaan Anda.');
        }

        $lowonganCount = Lowongan::where('perusahaan_id', $perusahaan->id)->count();
        $lamaranCount  = Lamaran::whereIn('lowongan_id', function ($query) use ($perusahaan) {
            $query->select('id')
                ->from('lowongan')
                ->where('perusahaan_id', $perusahaan->id);
        })->count();

        return view('perusahaan.dashboard', compact('perusahaan', 'lowonganCount', 'lamaranCount'));
    }
}
