<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::with('user')->latest()->get();
        return view('alumni.index', compact('alumni'));
    }

    public function create()
    {
        return view('alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:alumni',
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:alumni',
            'password' => 'required|min:8',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'telepon' => 'required',
            'tahun_lulus' => 'required',
            'jurusan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'cv' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        // Create user first
        $user = User::create([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'alumni',
        ]);

        $alumniData = $request->except(['password', 'foto', 'cv']);
        $alumniData['user_id'] = $user->id;

        if ($request->hasFile('foto')) {
            $alumniData['foto'] = $request->file('foto')->store('alumni/foto', 'public');
        }

        if ($request->hasFile('cv')) {
            $alumniData['cv'] = $request->file('cv')->store('alumni/cv', 'public');
        }

        Alumni::create($alumniData);

        return redirect()->route('alumni.index')->with('success', 'Alumni berhasil ditambahkan');
    }

    public function show(Alumni $alumni)
    {
        return view('alumni.show', compact('alumni'));
    }

    public function edit(Alumni $alumni)
    {
        return view('alumni.edit', compact('alumni'));
    }

    public function update(Request $request, Alumni $alumni)
    {
        $request->validate([
            'nisn' => 'required|unique:alumni,nisn,' . $alumni->id,
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:alumni,email,' . $alumni->id,
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'telepon' => 'required',
            'tahun_lulus' => 'required',
            'jurusan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'cv' => 'nullable|file|mimes:pdf|max:5120',
            'skills' => 'nullable',
            'pengalaman' => 'nullable',
        ]);

        $alumniData = $request->except(['foto', 'cv']);

        // Update foto if exists
        if ($request->hasFile('foto')) {
            if ($alumni->foto) {
                Storage::disk('public')->delete($alumni->foto);
            }
            $alumniData['foto'] = $request->file('foto')->store('alumni/foto', 'public');
        }

        // Update cv if exists
        if ($request->hasFile('cv')) {
            if ($alumni->cv) {
                Storage::disk('public')->delete($alumni->cv);
            }
            $alumniData['cv'] = $request->file('cv')->store('alumni/cv', 'public');
        }

        $alumni->update($alumniData);

        // Update user data if email changed
        if ($alumni->user && $alumni->user->email != $request->email) {
            $alumni->user->update([
                'email' => $request->email,
                'name' => $request->nama_lengkap,
            ]);
        }

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diperbarui');
    }

    public function destroy(Alumni $alumni)
    {
        if ($alumni->foto) {
            Storage::disk('public')->delete($alumni->foto);
        }
        if ($alumni->cv) {
            Storage::disk('public')->delete($alumni->cv);
        }

        if ($alumni->user) {
            $alumni->user->delete();
        }

        $alumni->delete();

        return redirect()->route('alumni.index')->with('success', 'Alumni berhasil dihapus');
    }
}