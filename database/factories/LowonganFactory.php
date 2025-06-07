<?php

namespace Database\Factories;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LowonganFactory extends Factory
{
    protected $model = Lowongan::class;

    public function definition(): array
    {
        return [
            'perusahaan_id' => Perusahaan::factory(),
            'judul' => $this->faker->jobTitle,
            'deskripsi' => $this->faker->paragraphs(3, true),
            'posisi' => $this->faker->jobTitle,
            'gaji' => $this->faker->randomElement([
                'Rp 3.000.000 - Rp 5.000.000',
                'Rp 5.000.000 - Rp 8.000.000',
                'Rp 8.000.000 - Rp 12.000.000',
                'Negosiasi'
            ]),
            'jenis_pekerjaan' => $this->faker->randomElement([
                'Full-time',
                'Part-time',
                'Kontrak',
                'Freelance'
            ]),
            'pendidikan' => $this->faker->randomElement([
                'SMA/SMK',
                'D3',
                'S1',
                'S2'
            ]),
            'pengalaman' => $this->faker->randomElement([
                'Minimal 1 tahun',
                'Minimal 2 tahun',
                'Fresh Graduate dipersilahkan',
                null
            ]),
            'skill_dibutuhkan' => json_encode($this->faker->words(5)),
            'tanggal_buka' => now(),
            'tanggal_tutup' => $this->faker->dateTimeBetween('+1 week', '+3 months'),
            'kuota' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['Aktif', 'Nonaktif']),
        ];
    }
}
