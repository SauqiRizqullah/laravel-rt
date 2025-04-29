<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with(['rumah', 'penghuni'])->get();
        return response()->json($pembayarans);
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with(['rumah', 'penghuni'])->findOrFail($id);
        return response()->json($pembayaran);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'rumah_id' => 'required|exists:rumah,id',
            'penghuni_id' => 'required|exists:penghunis,id',
            'bulan' => 'required|integer|between:1,12',
            'tahun' => 'required|integer',
            'jenis_iuran' => 'required|in:satpam,kebersihan',
            'jumlah' => 'required|integer',
            'status_pembayaran' => 'required|in:lunas,belum',
            'tanggal_bayar' => 'nullable|date',
        ]);

        $pembayaran = Pembayaran::create($data);
        return response()->json($pembayaran, 201);
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $data = $request->validate([
            'rumah_id' => 'sometimes|exists:rumah,id',
            'penghuni_id' => 'sometimes|exists:penghunis,id',
            'bulan' => 'sometimes|integer|between:1,12',
            'tahun' => 'sometimes|integer',
            'jenis_iuran' => 'sometimes|in:satpam,kebersihan',
            'jumlah' => 'sometimes|integer',
            'status_pembayaran' => 'sometimes|in:lunas,belum',
            'tanggal_bayar' => 'nullable|date',
        ]);

        $pembayaran->update($data);
        return response()->json($pembayaran);
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        return response()->json(['message' => 'Pembayaran deleted successfully']);
    }
}
