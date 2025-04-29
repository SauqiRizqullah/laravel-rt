<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function total()
    {
        $totalPembayaran = Pembayaran::where('status_pembayaran', 'lunas')->sum('jumlah');
        $totalPengeluaran = Pengeluaran::sum('jumlah');
        $totalKas = $totalPembayaran - $totalPengeluaran;

        return response()->json([
            'total_kas' => $totalKas
        ]);
    }
}
