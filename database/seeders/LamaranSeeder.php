<?php

namespace Database\Seeders;

use App\Models\Alumni;
use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Database\Seeder;

class LamaranSeeder extends Seeder
{
    public function run(): void
    {
        $alumni = Alumni::all();
        $lowongan = Lowongan::where('status', 'Aktif')
            ->where('tanggal_tutup', '>=', now())
            ->get();

        foreach ($alumni as $alumnus) {
            $lamaranCount = rand(0, 3);

            $appliedJobs = $lowongan
                ->random($lamaranCount)
                ->pluck('id');

            foreach ($appliedJobs as $jobId) {
                Lamaran::factory()
                    ->for($alumnus)
                    ->for(Lowongan::find($jobId))
                    ->create();
            }
        }
    }
}
