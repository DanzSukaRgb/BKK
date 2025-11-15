<?php

namespace Database\Seeders;

use Database\Seeders\UserSeeder as SeedersUserSeeder;
use Illuminate\Database\Seeder;
use UserSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SeedersUserSeeder::class,
            AdminSeeder::class,
            AlumniSeeder::class,
            PerusahaanSeeder::class,
            LowonganSeeder::class,
            LamaranSeeder::class,
        ]);
    }
}