<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Tabel perusahaan
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->text('alamat');
            $table->string('telepon');
            $table->string('email');
            $table->string('website')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('logo')->nullable();
            $table->string('industri');
            $table->integer('jumlah_karyawan');
            $table->timestamps();
        });

        // Tabel alumni
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nisn');
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('email');
            $table->string('tahun_lulus');
            $table->string('jurusan');
            $table->string('foto')->nullable();
            $table->text('skills')->nullable();
            $table->text('pengalaman')->nullable();
            $table->string('cv')->nullable();
            $table->timestamps();
        });

        // Tabel lowongan
        Schema::create('lowongan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perusahaan_id')->constrained('perusahaan')->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('posisi');
            $table->string('gaji')->nullable();
            $table->string('jenis_pekerjaan');
            $table->string('pendidikan');
            $table->string('pengalaman')->nullable();
            $table->date('tanggal_buka');
            $table->date('tanggal_tutup');
            $table->integer('kuota')->default(1);
            $table->string('status')->default('Aktif');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // Tabel lamaran
        Schema::create('lamaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_id')->constrained('alumni')->onDelete('cascade');
            $table->foreignId('lowongan_id')->constrained('lowongan')->onDelete('cascade');
            $table->text('surat_lamaran');
            $table->string('status')->default('Menunggu');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });

        // Tabel kegiatan BKK
        Schema::create('kegiatan_bkk', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('tempat');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });

        // Tabel notifikasi
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('judul');
            $table->text('pesan');
            $table->enum('tipe', ['info', 'success', 'warning', 'danger'])->default('info');
            $table->boolean('dibaca')->default(false);
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lamaran');
        Schema::dropIfExists('lowongan');
        Schema::dropIfExists('alumni');
        Schema::dropIfExists('perusahaan');
        Schema::dropIfExists('kegiatan_bkk');
        Schema::dropIfExists('notifikasi');
    }
};
