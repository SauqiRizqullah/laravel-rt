<?php

namespace Database\Seeders;

use App\Models\Pengeluaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PengeluaranSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_pengeluaran' => 'Perbaikan Pompa Air',
                'jumlah' => 750000,
                'tanggal_pengeluaran' => '2024-02-15',
                'deskripsi' => 'Ganti pompa air utama karena rusak',
            ],
            [
                'nama_pengeluaran' => 'Pembelian Alat Kebersihan',
                'jumlah' => 300000,
                'tanggal_pengeluaran' => '2024-05-02',
                'deskripsi' => 'Sapu, pel, cairan pembersih, dan ember',
            ],
            [
                'nama_pengeluaran' => 'Servis AC',
                'jumlah' => 450000,
                'tanggal_pengeluaran' => '2024-09-20',
                'deskripsi' => 'Servis AC di 3 kamar karena kurang dingin',
            ],
            [
                'nama_pengeluaran' => 'Bayar Listrik Area Umum',
                'jumlah' => 600000,
                'tanggal_pengeluaran' => '2025-01-10',
                'deskripsi' => 'Bayar listrik lorong, taman, dan dapur luar',
            ],
            [
                'nama_pengeluaran' => 'Perbaikan Genteng Bocor',
                'jumlah' => 900000,
                'tanggal_pengeluaran' => '2025-07-03',
                'deskripsi' => 'Perbaikan genteng bocor akibat hujan deras',
            ],
        ];

        // Duplikasikan jadi 10 data total dengan variasi bulan/tahun
        for ($i = 0; $i < 2; $i++) {
            foreach ($data as $item) {
                $tanggal = Carbon::parse($item['tanggal_pengeluaran'])->addMonths($i * 3); // Geser tanggal setiap 3 bulan

                Pengeluaran::create([
                    'nama_pengeluaran' => $item['nama_pengeluaran'],
                    'jumlah' => $item['jumlah'],
                    'bulan' => $tanggal->month,
                    'tahun' => $tanggal->year,
                    'tanggal_pengeluaran' => $tanggal,
                    'deskripsi' => $item['deskripsi'],
                ]);
            }
        }
    }
}
