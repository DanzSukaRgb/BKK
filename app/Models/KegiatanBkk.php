<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanBkk extends Model
{
    use HasFactory;

    protected $table    = 'kegiatan_bkk';
    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'waktu',
        'tempat',
        'gambar',
        'tipe_kegiatan',
        'peserta',
        'narasumber',
        'biaya',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'peserta' => 'array',
    ];

    // Tipe kegiatan constants
    const TIPE_PELATIHAN = 'Pelatihan';
    const TIPE_SEMINAR   = 'Seminar';
    const TIPE_LOKAKARYA = 'Lokakarya';
    const TIPE_REKRUTMEN = 'Rekrutmen';

    // Status constants
    const STATUS_TERLAKSANA  = 'Terlaksana';
    const STATUS_DITUNDA     = 'Ditunda';
    const STATUS_BERLANGSUNG = 'Berlangsung';

    // Accessor untuk gambar
    protected function gambar(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? asset('storage/' . $value) : asset('images/default-event.jpg'),
        );
    }

    // Scope untuk kegiatan yang akan datang
    public function scopeUpcoming($query)
    {
        return $query->where('tanggal', '>=', now())
            ->where('status', self::STATUS_BERLANGSUNG)
            ->orderBy('tanggal');
    }

    // Scope untuk kegiatan berdasarkan tipe
    public function scopeTipe($query, $tipe)
    {
        return $query->where('tipe_kegiatan', $tipe);
    }

    // Method untuk cek apakah kegiatan sudah lewat
    public function isPast()
    {
        return $this->tanggal < now();
    }

    // Method untuk format tanggal lengkap
    public function tanggalLengkap()
    {
        return $this->tanggal->format('l, d F Y') . ' pukul ' . $this->waktu;
    }
}
