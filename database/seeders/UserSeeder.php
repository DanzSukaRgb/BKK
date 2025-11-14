<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin BKK',
            'email' => 'admin@bkk.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'PT Maju Jaya',
            'email' => 'perusahaan@bkk.com',
            'password' => Hash::make('password'),
            'role' => 'perusahaan'
        ]);

        User::create([
            'name' => 'Budi Jobseeker',
            'email' => 'user@bkk.com',
            'password' => Hash::make('password'),
            'role' => 'user'
        ]);
    }
}