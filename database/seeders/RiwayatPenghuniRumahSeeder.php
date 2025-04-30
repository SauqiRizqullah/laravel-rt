<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RiwayatPenghuniRumah;

class RiwayatPenghuniRumahSeeder extends Seeder
{
    public function run(): void
    {
        RiwayatPenghuniRumah::insert([
            ['penghuni_id' => 1, 'rumah_id' => 1, 'tanggal_masuk' => '2024-01-01'],
            ['penghuni_id' => 2, 'rumah_id' => 2, 'tanggal_masuk' => '2024-01-01'],
            ['penghuni_id' => 3, 'rumah_id' => 3, 'tanggal_masuk' => '2024-01-01'],
        ]);
    }
}
