<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';
    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'telepon',
        'email',
        'website',
        'deskripsi',
        'logo',
        'industri',
        'jumlah_karyawan',
        'status_verifikasi',
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Lowongan
    public function lowongan()
    {
        return $this->hasMany(Lowongan::class);
    }

    // Accessor untuk logo
    protected function logo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset('storage/' . $value) : asset('images/default-company.png'),
        );
    }

    // Scope untuk perusahaan terverifikasi
    public function scopeVerified($query)
    {
        return $query->where('status_verifikasi', 'Terverifikasi');
    }

    // Scope untuk pencarian
    public function scopeSearch($query, $keyword)
    {
        return $query->where('nama', 'like', "%$keyword%")
                    ->orWhere('industri', 'like', "%$keyword%")
                    ->orWhere('alamat', 'like', "%$keyword%");
    }
}
