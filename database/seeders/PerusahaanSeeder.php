<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory()
            ->count(5)
            ->asPerusahaan()
            ->create();

        foreach ($users as $user) {
            Perusahaan::factory()
                ->for($user)
                ->create();
        }
    }
}
