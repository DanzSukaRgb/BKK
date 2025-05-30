<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(5)
            ->create([
                'role' => 'alumni',
            ]);
    }
}
