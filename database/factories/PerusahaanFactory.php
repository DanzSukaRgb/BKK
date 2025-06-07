<?php

namespace Database\Factories;

use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerusahaanFactory extends Factory
{
    protected $model = Perusahaan::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'nama' => $this->faker->company,
            'alamat' => $this->faker->address,
            'telepon' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'website' => $this->faker->url,
            'deskripsi' => $this->faker->paragraphs(3, true),
            'logo' => 'default-logo.png',
            'industri' => $this->faker->randomElement(['Teknologi', 'Kesehatan', 'Pendidikan', 'Keuangan']),
            'jumlah_karyawan' => $this->faker->numberBetween(10, 1000),
            'status_verifikasi' => $this->faker->randomElement(['Terverifikasi', 'Belum Diverifikasi']),
        ];
    }
}
