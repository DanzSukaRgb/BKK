<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(3)
            ->create([
                'role' => 'perusahaan',
            ]);
    }
}
