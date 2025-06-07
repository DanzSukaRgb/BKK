<?php

namespace Database\Seeders;

use App\Models\Lowongan;
use Illuminate\Database\Seeder;

class LowonganSeeder extends Seeder
{
    public function run(): void
    {
        Lowongan::factory()
            ->count(20)
            ->create();
    }
}
