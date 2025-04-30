<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penghuni;

class PenghuniSeeder extends Seeder
{
    public function run(): void
    {
        Penghuni::insert([
            ['nama' => 'Sauqi', 'status' => 'tetap', 'no_telepon' => '081234567890', 'menikah' => false],
            ['nama' => 'Fidqy', 'status' => 'kontrak', 'no_telepon' => '081234567891', 'menikah' => true],
            ['nama' => 'Lala', 'status' => 'tetap', 'no_telepon' => '081234567892', 'menikah' => false],
        ]);
    }
}
