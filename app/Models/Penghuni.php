<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    protected $fillable = [
        'nama', 'foto_ktp', 'status', 'no_telepon', 'menikah',
    ];
}
