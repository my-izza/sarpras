<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_barang',
        'nama_barang',
        'gambar',
        'kategori',
        'merk',
        'type',
        'harga',

    ];

    // Relasi ke tabel inventaris (satu barang memiliki banyak inventaris)
    public function inventaris()
    {
        return $this->hasMany(Inventaris::class);
    }

    // Relasi ke tabel Service (satu barang memiliki banyak history service)
    public function serviceHistories()
    {
        return $this->hasMany(Service::class);
    }
}
