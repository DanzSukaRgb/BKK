<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->count(1)
            ->asAdmin()
            ->create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
            ]);
    }
}
