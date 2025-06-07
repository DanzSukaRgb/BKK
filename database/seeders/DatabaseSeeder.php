<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            AlumniSeeder::class,
            PerusahaanSeeder::class,
            LowonganSeeder::class,
            LamaranSeeder::class,
        ]);
    }
}
