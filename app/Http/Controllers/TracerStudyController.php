<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Lowongan;
use App\Models\KegiatanBkk;

class TracerStudyController extends Controller
{
    public function index()
    {
        $tracerData = Data::all();
        $colors = [
            '#67e8f9', '#06b6d4', '#0891b2', '#0e7490', '#155e75', '#164e63',
        ];

        // Contoh tambahan jika kamu ingin tampilkan konten lain
        $lowongan = Lowongan::latest()->take(3)->get();
        $kegiatan = KegiatanBkk::latest()->take(3)->get();

        return view('home', compact('tracerData', 'colors', 'lowongan', 'kegiatan'));
    }
}