<?php
namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileAlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::where('user_id', Auth::id())->first();
        return view('alumni.indexprofile', compact('alumni'));
    }

    public function edit()
    {
        $alumni = Alumni::where('user_id', Auth::id())->first();
        return view('alumni.editprofile', compact('alumni'));
    }

    public function update(Request $request)
    {
        $alumni = Alumni::where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'nisn'          => 'required|string|max:30',
            'nama_lengkap'  => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required|string',
            'telepon'       => 'required|string|max:20',
            'email'         => 'required|email',
            'tahun_lulus'   => 'required|string|max:10',
            'jurusan'       => 'required|string|max:100',
            'skills'        => 'nullable|string',
            'pengalaman'    => 'nullable|string',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cv'            => 'nullable|mimes:pdf|max:5000',
        ]);

        // Update data utama
        $alumni->update([
            'nisn'          => $request->nisn,
            'nama_lengkap'  => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat'        => $request->alamat,
            'telepon'       => $request->telepon,
            'email'         => $request->email,
            'tahun_lulus'   => $request->tahun_lulus,
            'jurusan'       => $request->jurusan,
            'skills'        => $request->skills,
            'pengalaman'    => $request->pengalaman,
        ]);

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            if ($alumni->foto && Storage::exists('public/alumni/' . $alumni->foto)) {
                Storage::delete('public/alumni/' . $alumni->foto);
            }
            $fotoName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->storeAs('public/alumni', $fotoName);
            $alumni->foto = $fotoName;
        }

        // Upload CV baru jika ada
        if ($request->hasFile('cv')) {
            if ($alumni->cv && Storage::exists('public/alumni/' . $alumni->cv)) {
                Storage::delete('public/alumni/' . $alumni->cv);
            }
            $cvName = time() . '_' . $request->file('cv')->getClientOriginalName();
            $request->file('cv')->storeAs('public/alumni', $cvName);
            $alumni->cv = $cvName;
        }

        $alumni->save();

        return redirect()->route('alumni.profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
