<?php

namespace App\Http\Controllers;

use App\Models\KegiatanBkk;
use App\Models\Lowongan;
use App\Models\Perusahaan;
use App\Models\Lamaran;
use App\Models\Alumni; // Assuming an Alumni model exists

class HomeController extends Controller
{
    public function index()
    {
        $lowongan = Lowongan::where('status', 'Aktif')
            ->where('tanggal_tutup', '>=', now())
            ->orderBy('created_at', 'desc')
            ->paginate(6); // <- ganti get() dengan paginate()
        $lowonganCount = Lowongan::count();
        $kegiatan = KegiatanBkk::orderBy('tanggal', 'desc')
            ->take(3)
            ->get();
        $kegiatanCount = KegiatanBkk::count();
        $perusahaan = Perusahaan::take(8)->get();
        $perusahaanCount = Perusahaan::count();
        $alumniCount = Alumni::count();
        $kegiatanCount = KegiatanBkk::count();
        $tracerData = \App\Models\Data::all(); // atau model yang kamu pakai
        $colors = ['#67e8f9', '#06b6d4', '#0891b2', '#0e7490', '#155e75', '#164e63'];

        return view('home', compact('lowongan', 'kegiatan', 'perusahaan','lowonganCount','perusahaanCount','alumniCount','kegiatanCount','tracerData',  'colors'));
    }

    public function dashboard()
    {
        $recentLowongan = Lowongan::where('status', 'Aktif')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get() ;

        $recentLamaran = Lamaran::latest()->take(5)->get();

        // Calculate counts for the Ringkasan tab
        $alumniCount = Alumni::count();
        $perusahaanCount = Perusahaan::count();
        $lowonganCount = Lowongan::where('status', 'Aktif')->count();
        $lamaranCount = Lamaran::count();
        $kegiatanCount = KegiatanBkk::count();

        return view('dashboard', compact(
            'recentLowongan',
            'recentLamaran',
            'alumniCount',
            'perusahaanCount',
            'lowonganCount',
            'lamaranCount',
            'kegiatanCount'
        ));
    }
}
