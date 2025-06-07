<?php

namespace Database\Factories;

use App\Models\Alumni;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumniFactory extends Factory
{
    protected $model = Alumni::class;

    public function definition(): array
    {
        return [
            'nisn' => $this->faker->unique()->numerify('##########'),
            'nama_lengkap' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date(),
            'alamat' => $this->faker->address,
            'telepon' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'tahun_lulus' => $this->faker->year,
            'jurusan' => $this->faker->randomElement(['Teknik Informatika', 'Akuntansi', 'Administrasi Bisnis', 'Teknik Mesin']),
            'foto' => 'default.jpg',
            'skills' => implode(',', $this->faker->words(5)),
            'pengalaman' => $this->faker->paragraph,
            'cv' => 'cv-sample.pdf',
        ];
    }
}
