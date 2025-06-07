<?php

namespace App\View\Composers;

use App\Models\Alumni;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use App\Models\Lamaran;
use App\Models\KegiatanBkk;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class AdminLayoutComposer
{
    public function compose(View $view)
    {
        $cacheKey = 'admin_layout_counts';
        $counts = Cache::remember($cacheKey, now()->addMinutes(60), function () {
            return [
                'alumniCount' => Alumni::count(),
                'perusahaanCount' => Perusahaan::count(),
                'lowonganCount' => Lowongan::where('status', 'Aktif')->count(),
                'lamaranCount' => Lamaran::count(),
                'kegiatanCount' => KegiatanBkk::count(),
            ];
        });

        $view->with($counts);
    }
}
