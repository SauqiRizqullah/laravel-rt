<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PembayaranSeeder extends Seeder
{
    public function run(): void
    {
        // Data jumlah iuran
        $jumlahSatpam = 100000;
        $jumlahKebersihan = 15000;

        // Helper loop tahun dan bulan
        $months = range(1, 12);

        // 1. Fidqy: id 2, rumah id 2, bayar semuanya lunas setiap tanggal 10 bulan tsb
        foreach (range(2024, 2025) as $tahun) {
            foreach ($months as $bulan) {
                // Satpam
                Pembayaran::create([
                    'rumah_id' => 2,
                    'penghuni_id' => 2,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'jenis_iuran' => 'satpam',
                    'jumlah' => $jumlahSatpam,
                    'status_pembayaran' => 'lunas',
                    'tanggal_bayar' => Carbon::create($tahun, $bulan, 10),
                ]);
                // Kebersihan
                Pembayaran::create([
                    'rumah_id' => 2,
                    'penghuni_id' => 2,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'jenis_iuran' => 'kebersihan',
                    'jumlah' => $jumlahKebersihan,
                    'status_pembayaran' => 'lunas',
                    'tanggal_bayar' => Carbon::create($tahun, $bulan, 10),
                ]);
            }
        }

        // 2. Lala: id 3, rumah id 3, lunas tiap tanggal 7 bulan tsb
        foreach ($months as $bulan) {
            Pembayaran::create([
                'rumah_id' => 3,
                'penghuni_id' => 3,
                'bulan' => $bulan,
                'tahun' => 2024,
                'jenis_iuran' => 'satpam',
                'jumlah' => $jumlahSatpam,
                'status_pembayaran' => 'lunas',
                'tanggal_bayar' => Carbon::create(2024, $bulan, 7),
            ]);
            Pembayaran::create([
                'rumah_id' => 3,
                'penghuni_id' => 3,
                'bulan' => $bulan,
                'tahun' => 2024,
                'jenis_iuran' => 'kebersihan',
                'jumlah' => $jumlahKebersihan,
                'status_pembayaran' => 'lunas',
                'tanggal_bayar' => Carbon::create(2024, $bulan, 7),
            ]);
        }

        // 3. Sauqi: id 1, rumah id 1
        foreach (range(2024, 2025) as $tahun) {
            // Satpam dibayar setahun sekaligus di 10 Januari
            for ($bulan = 1; $bulan <= 12; $bulan++) {
                Pembayaran::create([
                    'rumah_id' => 1,
                    'penghuni_id' => 1,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'jenis_iuran' => 'satpam',
                    'jumlah' => $jumlahSatpam,
                    'status_pembayaran' => 'lunas',
                    'tanggal_bayar' => Carbon::create($tahun, 1, 10), // Semua bulan dibayar di Jan 10
                ]);
            }

            // Kebersihan dibayar bulanan setiap tgl 10
            foreach ($months as $bulan) {
                Pembayaran::create([
                    'rumah_id' => 1,
                    'penghuni_id' => 1,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'jenis_iuran' => 'kebersihan',
                    'jumlah' => $jumlahKebersihan,
                    'status_pembayaran' => 'lunas',
                    'tanggal_bayar' => Carbon::create($tahun, $bulan, 10),
                ]);
            }
        }
    }
}
