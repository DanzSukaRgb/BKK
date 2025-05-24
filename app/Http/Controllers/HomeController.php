<?php
namespace App\Http\Controllers;

use App\Models\KegiatanBkk;
use App\Models\Lowongan;

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

        return view('home', compact('lowongan', 'kegiatan'));
    }
}
