<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rumah;

class RumahSeeder extends Seeder
{
    public function run(): void
    {
        Rumah::insert([
            ['nomor_rumah' => 'C1 / 14', 'status_rumah' => 'dihuni', 'current_penghuni_id' => 1],
            ['nomor_rumah' => 'C2 / 4', 'status_rumah' => 'dihuni', 'current_penghuni_id' => 2],
            ['nomor_rumah' => 'Anggrek 2 16', 'status_rumah' => 'dihuni', 'current_penghuni_id' => 3],
        ]);
    }
}
