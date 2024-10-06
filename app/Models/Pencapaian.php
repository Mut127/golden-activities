<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencapaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'aktivitas_id',
        'daftar_kegiatan_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function aktivitas()
    {
        return $this->belongsTo(Aktivitas::class);
    }
    public function daftar_kegiatans()
    {
        return $this->belongsTo(DaftarKegiatan::class);
    }
}
