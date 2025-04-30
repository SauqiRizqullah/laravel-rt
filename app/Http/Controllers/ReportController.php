<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function summaryTahunan(Request $request)
{
    $tahun = $request->input('tahun', now()->year);

    $months = collect(range(1, 12))->map(function ($month) use ($tahun) {
        $totalPemasukan = Pembayaran::whereMonth('tanggal_bayar', $month)
            ->whereYear('tanggal_bayar', $tahun)
            ->sum('jumlah');

        $totalPengeluaran = Pengeluaran::whereMonth('tanggal_pengeluaran', $month)
            ->whereYear('tanggal_pengeluaran', $tahun)
            ->sum('jumlah');

        return [
            'bulan' => Carbon::create()->month($month)->format('F'),
            'pemasukan' => $totalPemasukan,
            'pengeluaran' => $totalPengeluaran,
            'saldo' => $totalPemasukan - $totalPengeluaran,
        ];
    });

    return response()->json($months);
}

public function detailPerBulan($bulan, Request $request)
{
    $tahun = $request->query('tahun', date('Y'));

    $pemasukan = Pembayaran::with('penghuni') // pastikan relasi 'penghuni' ada di model
        ->whereMonth('tanggal_bayar', $bulan)
        ->whereYear('tanggal_bayar', $tahun)
        ->get();

    $pengeluaran = Pengeluaran::whereMonth('tanggal_pengeluaran', $bulan)
        ->whereYear('tanggal_pengeluaran', $tahun)
        ->get();

    return response()->json([
        'pemasukan' => $pemasukan,
        'pengeluaran' => $pengeluaran,
    ]);
}

}
