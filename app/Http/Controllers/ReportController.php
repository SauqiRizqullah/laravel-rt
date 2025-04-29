<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function summaryTahunan()
    {
        $months = collect(range(1, 12))->map(function ($month) {
            $totalPemasukan = Pembayaran::whereMonth('tanggal_bayar', $month)->sum('jumlah');
            $totalPengeluaran = Pengeluaran::whereMonth('tanggal_pengeluaran', $month)->sum('jumlah');
            return [
                'bulan' => Carbon::create()->month($month)->format('F'),
                'pemasukan' => $totalPemasukan,
                'pengeluaran' => $totalPengeluaran,
                'saldo' => $totalPemasukan - $totalPengeluaran,
            ];
        });

        return response()->json($months);
    }

    public function detailPerBulan($bulan)
{
    $pemasukan = Pembayaran::whereMonth('tanggal_bayar', $bulan)->get();
    $pengeluaran = Pengeluaran::whereMonth('tanggal_pengeluaran', $bulan)->get();

    return response()->json([
        'pemasukan' => $pemasukan,
        'pengeluaran' => $pengeluaran,
    ]);
}
}
