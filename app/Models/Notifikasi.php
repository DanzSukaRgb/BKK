<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi';
    protected $fillable = [
        'user_id',
        'judul',
        'pesan',
        'tipe',
        'dibaca',
        'link',
    ];

    // Konstanta untuk tipe notifikasi
    const TIPE_INFO = 'info';
    const TIPE_SUCCESS = 'success';
    const TIPE_WARNING = 'warning';
    const TIPE_DANGER = 'danger';

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope untuk notifikasi belum dibaca
    public function scopeUnread($query)
    {
        return $query->where('dibaca', false);
    }

    // Scope untuk notifikasi user tertentu
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    // Method untuk membuat notifikasi
    public static function buatNotifikasi($userId, $judul, $pesan, $tipe = self::TIPE_INFO, $link = null)
    {
        return self::create([
            'user_id' => $userId,
            'judul' => $judul,
            'pesan' => $pesan,
            'tipe' => $tipe,
            'dibaca' => false,
            'link' => $link,
        ]);
    }

    // Method untuk menandai sebagai dibaca
    public function markAsRead()
    {
        $this->update(['dibaca' => true]);
        return $this;
    }

    // Method untuk menandai semua notifikasi user sebagai dibaca
    public static function markAllAsRead($userId)
    {
        return self::where('user_id', $userId)
                 ->where('dibaca', false)
                 ->update(['dibaca' => true]);
    }

    // Accessor untuk ikon berdasarkan tipe
    public function getIconAttribute()
    {
        switch ($this->tipe) {
            case self::TIPE_SUCCESS:
                return 'check-circle';
            case self::TIPE_WARNING:
                return 'exclamation-triangle';
            case self::TIPE_DANGER:
                return 'times-circle';
            default:
                return 'info-circle';
        }
    }

    // Accessor untuk warna berdasarkan tipe
    public function getColorAttribute()
    {
        switch ($this->tipe) {
            case self::TIPE_SUCCESS:
                return 'success';
            case self::TIPE_WARNING:
                return 'warning';
            case self::TIPE_DANGER:
                return 'danger';
            default:
                return 'info';
        }
    }
}