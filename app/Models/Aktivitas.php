<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'image_path',
        'tgl_pelaksanaan',
        'waktu_pelaksanaan',
        'alamat',
        'kuota',
        'kategori',
        'status',
        'alasan_ditolak',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function daftar_kegiatans()
    {
        return $this->belongsToMany(DaftarKegiatan::class, 'daftar');
    }
}
