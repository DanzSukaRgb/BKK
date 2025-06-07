<?php

namespace Database\Factories;

use App\Models\Alumni;
use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LamaranFactory extends Factory
{
    protected $model = Lamaran::class;

    public function definition(): array
    {
        return [
            'alumni_id' => Alumni::factory(),
            'lowongan_id' => Lowongan::factory(),
            'pesan' => $this->faker->paragraph,
            'dokumen' => 'lamaran/' . $this->faker->uuid . '.pdf',
            'status' => $this->faker->randomElement(['Menunggu', 'Diterima', 'Ditolak']),
            'catatan' => $this->faker->optional()->paragraph,
        ];
    }
}
