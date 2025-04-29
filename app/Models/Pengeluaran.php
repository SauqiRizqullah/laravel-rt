<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pengeluaran',
        'jumlah',
        'bulan',
        'tahun',
        'tanggal_pengeluaran',
        'deskripsi',
    ];
}
