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
}
