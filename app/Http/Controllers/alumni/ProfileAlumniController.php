<?php
namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileAlumniController extends Controller
{
    // ================================
    // TAMPILKAN PROFIL
    // ================================
    public function index()
    {
        $alumni = Alumni::where('user_id', Auth::id())->first();

        return view('alumni.indexprofile', compact('alumni'));
    }

    // ================================
    // FORM EDIT PROFIL
    // ================================
    public function edit()
    {
        $alumni = Alumni::where('user_id', Auth::id())->first();

        return view('alumni.editprofile', compact('alumni'));
    }

    // ================================
    // UPDATE PROFIL ALUMNI
    // ================================
    public function update(Request $request)
    {
        $alumni = Alumni::where('user_id', Auth::id())->firstOrFail();

        // VALIDASI SESUAI MIGRATION
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

        // UPDATE DATA UTAMA
        $alumni->nisn          = $request->nisn;
        $alumni->nama_lengkap  = $request->nama_lengkap;
        $alumni->jenis_kelamin = $request->jenis_kelamin;
        $alumni->tempat_lahir  = $request->tempat_lahir;
        $alumni->tanggal_lahir = $request->tanggal_lahir;
        $alumni->alamat        = $request->alamat;
        $alumni->telepon       = $request->telepon;
        $alumni->email         = $request->email;
        $alumni->tahun_lulus   = $request->tahun_lulus;
        $alumni->jurusan       = $request->jurusan;
        $alumni->skills        = $request->skills;
        $alumni->pengalaman    = $request->pengalaman;

        // ================================
        // FOTO PROFIL (opsional)
        // ================================
        if ($request->hasFile('foto')) {
            if ($alumni->foto && Storage::exists('public/alumni/' . $alumni->foto)) {
                Storage::delete('public/alumni/' . $alumni->foto);
            }

            $fotoName = time() . '_' . $request->foto->getClientOriginalName();
            $request->foto->storeAs('public/alumni', $fotoName);
            $alumni->foto = $fotoName;
        }

        // ================================
        // FILE CV (opsional)
        // ================================
        if ($request->hasFile('cv')) {
            if ($alumni->cv && Storage::exists('public/alumni/' . $alumni->cv)) {
                Storage::delete('public/alumni/' . $alumni->cv);
            }

            $cvName = time() . '_' . $request->cv->getClientOriginalName();
            $request->cv->storeAs('public/alumni', $cvName);
            $alumni->cv = $cvName;
        }

        $alumni->save();

        return redirect()->route('alumni.profile')->with('success', 'Profil alumni berhasil diperbarui.');
    }
}