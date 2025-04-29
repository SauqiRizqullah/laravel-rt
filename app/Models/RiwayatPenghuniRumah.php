<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPenghuniRumah extends Model
{
    protected $fillable = [
        'penghuni_id',
        'rumah_id',
        'tanggal_masuk',
        'tanggal_keluar',
    ];

    public function rumah()
{
    return $this->belongsTo(Rumah::class);
}

public function penghuni()
{
    return $this->belongsTo(Penghuni::class);
}
}
