<?php
namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Lowongan;
use App\Models\Lamaran;

class DashboardAlumniController extends Controller
{
    public function index()
    {
        $alumni = Auth::user();

        // Hitung total lowongan aktif (semua lowongan)
        $lowonganCount = Lowongan::where('status', 'Aktif')->count();

        // Hitung total lamaran yang dibuat oleh alumni ini
        $lamaranCount = Lamaran::where('alumni_id', $alumni->id)->count();

        return view('alumni.dashboard', compact('alumni', 'lowonganCount', 'lamaranCount'));
    }
}