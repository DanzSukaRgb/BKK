<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;
    protected $table = 'lamaran'; // Fix table name
    protected $fillable = [
        'alumni_id',
        'lowongan_id',
        'surat_lamaran',
        'status',
        'catatan',
        'tanggal_interview',
        'lokasi_interview',
    ];

    protected $casts = [
        'tanggal_interview' => 'datetime',
    ];
    public function scopeFilter($query, array $filters)
{
    if (!empty($filters['status'])) {
        $query->where('status', $filters['status']);
    }

    if (!empty($filters['lowongan_id'])) {
        $query->where('lowongan_id', $filters['lowongan_id']);
    }

    return $query;
}

    // Status constants
    const STATUS_MENUNGGU  = 'Menunggu';
    const STATUS_DITERIMA  = 'Diterima';
    const STATUS_DITOLAK   = 'Ditolak';
    const STATUS_DIPROSES  = 'Diproses';
    const STATUS_INTERVIEW = 'Interview';

    // Relasi dengan Alumni
    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }

    // Relasi dengan Lowongan
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }

    // Scope untuk filter status
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope untuk lamaran alumni tertentu
    public function scopeByAlumni($query, $alumniId)
    {
        return $query->where('alumni_id', $alumniId);
    }

    // Scope untuk lamaran lowongan tertentu
    public function scopeByLowongan($query, $lowonganId)
    {
        return $query->where('lowongan_id', $lowonganId);
    }

    // Method untuk cek apakah lamaran bisa diubah
    public function canBeUpdated()
    {
        return in_array($this->status, [self::STATUS_MENUNGGU, self::STATUS_DIPROSES]);
    }

    // Method untuk cek apakah lamaran bisa dihapus
    public function canBeDeleted()
    {
        return $this->status === self::STATUS_MENUNGGU;
    }
}
