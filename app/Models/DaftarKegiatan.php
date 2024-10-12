<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tgl_lahir',
        'alamat',
        'jk',
        'number',
        'status',
        'user_id',
        'aktivitas_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function aktivitas()
    {
        return $this->belongsTo(Aktivitas::class);
    }
    public function pencapaian()
    {
        return $this->hasMany(Pencapaian::class);
    }
}
