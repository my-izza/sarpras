<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_ruang',
        'gedung',
        'nama_ruang',
        'kategori',
        'luas',
        'foto_depan',
        'foto_ruang',
    ];

    // Relasi ke tabel inventaris (satu Ruang memiliki banyak inventaris)
    public function inventaris()
    {
        return $this->hasMany(Inventaris::class);
    }

    // Relasi ke tabel Service (satu ruang memiliki banyak history service)
    public function service()
    {
        return $this->hasMany(Service::class);
    }
}
