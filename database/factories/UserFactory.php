<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        $roles = ['alumni', 'perusahaan', 'admin'];
        $role = $this->faker->randomElement($roles);

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Default password is 'password'
            'role' => $role,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function asAdmin()
    {
        return $this->state([
            'role' => 'admin',
        ]);
    }

    public function asAlumni()
    {
        return $this->state([
            'role' => 'alumni',
        ]);
    }

    public function asPerusahaan()
    {
        return $this->state([
            'role' => 'perusahaan',
        ]);
    }
}
