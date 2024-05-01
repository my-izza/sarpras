<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $fillable = [
        'barcode',
        'no_inventaris',
        'room_id',
        'item_id',
        'gambar',
        'aset',
        'tgl_peroleh',
        'total_barang',
        'total_harga',
        'deskripsi'
    ];

    // Relasi ke tabel barang (satu inventaris dimiliki oleh satu barang)
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // Relasi ke tabel ruang (satu inventaris dimiliki oleh satu ruang)
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Relasi ke tabel histori (satu inventaris memiliki banyak histori)
    public function histori()
    {
        return $this->hasMany(Service::class);
    }
}
