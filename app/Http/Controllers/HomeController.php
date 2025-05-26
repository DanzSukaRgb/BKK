<?php

namespace App\Http\Controllers;

use App\Models\KegiatanBkk;
use App\Models\Lowongan;
use App\Models\Perusahaan;
use App\Models\Alumni;
use App\Models\Lamaran;

class HomeController extends Controller
{
    public function index()
    {
        $lowongan = Lowongan::where('status', 'Aktif')
            ->where('tanggal_tutup', '>=', now())
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $kegiatan = KegiatanBkk::orderBy('tanggal', 'desc')
            ->take(3)
            ->get();

        $perusahaan = Perusahaan::take(8)->get();

        return view('home', compact('lowongan', 'kegiatan', 'perusahaan'));
    }

    public function dashboard()
    {
        $data = [
            'alumniCount' => Alumni::count(),
            'perusahaanCount' => Perusahaan::count(),
            'lowonganCount' => Lowongan::where('status', 'Aktif')->count(),
            'lamaranCount' => Lamaran::count(),
            'kegiatanCount' => KegiatanBkk::count(),
            'recentLowongan' => Lowongan::where('status', 'Aktif')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get(),
            'recentLamaran' => Lamaran::latest()->take(5)->get(),
        ];

        return view('dashboard', $data);
    }
}
