<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Perusahaan;

class ProfileController extends Controller
{
    // Tampilkan profil
    public function index()
    {
        $perusahaan = Auth::user()->perusahaan;
        return view('layouts.perusahaan.profile.index', compact('perusahaan'));
    }

    // Form edit profil
    public function edit()
    {
        $perusahaan = Auth::user()->perusahaan;
        return view('layouts.perusahaan.profile.edit', compact('perusahaan'));
    }

    // Update profil
    public function update(Request $request)
    {
        $perusahaan = Auth::user()->perusahaan;

        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'deskripsi' => 'nullable|string',
            'industri' => 'required|string|max:100',
            'jumlah_karyawan' => 'required|integer|min:1',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->only([
            'nama','alamat','telepon','email','website','deskripsi','industri','jumlah_karyawan'
        ]);

        // Upload logo jika ada
        if ($request->hasFile('logo')) {
            // Hapus logo lama
            if ($perusahaan->logo && Storage::exists('public/'.$perusahaan->logo)) {
                Storage::delete('public/'.$perusahaan->logo);
            }

            $path = $request->file('logo')->store('perusahaan', 'public');
            $data['logo'] = $path;
        }

        $perusahaan->update($data);
        $perusahaan->refresh();
        return redirect()->route('perusahaan.profile.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
