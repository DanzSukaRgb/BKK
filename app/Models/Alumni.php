<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table    = 'alumni';
    protected $fillable = [
        'user_id', 'nisn', 'nama_lengkap', 'jenis_kelamin', 'tempat_lahir',
        'tanggal_lahir', 'alamat', 'telepon', 'email', 'tahun_lulus',
        'jurusan', 'foto', 'skills', 'pengalaman', 'cv',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lamaran()
    {
        return $this->hasMany(Lamaran::class);
    }
}
