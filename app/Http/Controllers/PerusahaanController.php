<?php
namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::orderBy('nama')->get();
        return view('perusahaan.index', compact('perusahaan'));
    }

    public function create()
    {
        return view('perusahaan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required',
            'alamat'    => 'required',
            'telepon'   => 'required',
            'email'     => 'required|email',
            'website'   => 'nullable|url',
            'deskripsi' => 'nullable',
            'logo'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('perusahaan', 'public');
        }

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
            'nama'      => 'required',
            'alamat'    => 'required',
            'telepon'   => 'required',
            'email'     => 'required|email',
            'website'   => 'nullable|url',
            'deskripsi' => 'nullable',
            'logo'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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
}
