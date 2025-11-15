<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin BKK',
            'email' => 'admin@sch.id',
            'password' => Hash::make('12345678'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'PT Maju Jaya',
            'email' => 'roji@sch.id',
            'password' => Hash::make('12345678'),
            'role' => 'perusahaan'
        ]);

        User::create([
            'name' => 'Budi Jobseeker',
            'email' => 'bayu@sch.id',
            'password' => Hash::make('12345678'),
            'role' => 'alumni'
        ]);
    }
}