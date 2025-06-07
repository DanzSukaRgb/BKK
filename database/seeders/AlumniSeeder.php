<?php

namespace Database\Seeders;

use App\Models\Alumni;
use App\Models\User;
use Illuminate\Database\Seeder;

class AlumniSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory()
            ->count(10)
            ->asAlumni()
            ->create();

        foreach ($users as $user) {
            Alumni::factory()
                ->for($user)
                ->create();
        }
    }
}
