<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lowongan extends Model
{
    use HasFactory;

    protected $table = 'lowongan'; // tambahkan baris ini

    protected $fillable = [
        'perusahaan_id',
        'judul',
        'deskripsi',
        'posisi',
        'gaji',
        'jenis_pekerjaan',
        'pendidikan',
        'pengalaman',
        'skill_dibutuhkan',
        'tanggal_buka',
        'tanggal_tutup',
        'kuota',
        'status',
        'slug',
    ];

    protected $casts = [
        'tanggal_buka'     => 'date',
        'tanggal_tutup'    => 'date',
        'skill_dibutuhkan' => 'array',
    ];

    // Relasi dengan Perusahaan
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    // Relasi dengan Lamaran
    public function lamaran()
    {
        return $this->hasMany(Lamaran::class);
    }

    // Boot method untuk generate slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($lowongan) {
            $lowongan->slug = Str::slug($lowongan->judul) . '-' . Str::random(6);
        });

        static::updating(function ($lowongan) {
            if ($lowongan->isDirty('judul')) {
                $lowongan->slug = Str::slug($lowongan->judul) . '-' . Str::random(6);
            }
        });
    }

    // Scope untuk lowongan aktif
    public function scopeAktif($query)
    {
        return $query->where('status', 'Aktif')
            ->where('tanggal_tutup', '>=', Carbon::today());
    }

    // Scope untuk pencarian
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where('judul', 'like', '%' . $search . '%')
                ->orWhere('deskripsi', 'like', '%' . $search . '%')
                ->orWhere('posisi', 'like', '%' . $search . '%')
                ->orWhereHas('perusahaan', fn($query) =>
                    $query->where('nama', 'like', '%' . $search . '%')
                )
        );

        $query->when($filters['jenis_pekerjaan'] ?? false, fn($query, $jenis) =>
            $query->where('jenis_pekerjaan', $jenis)
        );

        $query->when($filters['pendidikan'] ?? false, fn($query, $pendidikan) =>
            $query->where('pendidikan', $pendidikan)
        );

        $query->when($filters['industri'] ?? false, fn($query, $industri) =>
            $query->whereHas('perusahaan', fn($query) =>
                $query->where('industri', $industri)
            )
        );
    }

    // Accessor untuk status lowongan
    public function getStatusLabelAttribute()
    {
        if ($this->status == 'Aktif' && $this->tanggal_tutup >= now()) {
            return 'Aktif';
        } else {
            return 'Tidak Aktif';
        }
    }

    // Accessor untuk sisa hari
    public function getSisaHariAttribute()
    {
        return now()->diffInDays($this->tanggal_tutup, false);
    }
}