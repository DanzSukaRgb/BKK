<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'perusahaan_id',
        'judul',
        'slug',
        'deskripsi',
        'deadline'
    ];

    public function perusahaan()
    {
        return $this->belongsTo(User::class, 'perusahaan_id');
    }
}
