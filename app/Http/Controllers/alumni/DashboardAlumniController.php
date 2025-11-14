<?php
namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardAlumniController extends Controller
{
    public function index()
    {
        $alumni = Auth::user();

        return view('alumni.dashboard', compact('alumni'));
    }
}
