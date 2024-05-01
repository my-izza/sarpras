<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Relasi ke tabel inventaris (satu histori terkait dengan satu inventaris)
    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class);
    }
}
