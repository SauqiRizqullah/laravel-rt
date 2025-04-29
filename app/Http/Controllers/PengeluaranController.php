<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /// Get all Pengeluaran
    public function index()
    {
        return Pengeluaran::all();
    }

    // Store new Pengeluaran
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pengeluaran' => 'required|string',
            'jumlah' => 'required|integer',
            'bulan' => 'required|integer',
            'tahun' => 'required|integer',
            'tanggal_pengeluaran' => 'nullable|date',
            'deskripsi' => 'nullable|string',
        ]);

        $pengeluaran = Pengeluaran::create($validated);

        return response()->json($pengeluaran, 201);
    }

    // Get Pengeluaran by ID (optional if needed later)
    public function show($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return response()->json($pengeluaran);
    }

    public function destroy($id)
{
    $pengeluaran = Pengeluaran::findOrFail($id);
    $pengeluaran->delete();

    return response()->json(['message' => 'Pengeluaran berhasil dihapus']);
}

public function update(Request $request, $id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);

        $validated = $request->validate([
            'nama_pengeluaran' => 'required|string',
            'jumlah' => 'required|integer',
            'bulan' => 'required|integer',
            'tahun' => 'required|integer',
            'tanggal_pengeluaran' => 'nullable|date',
            'deskripsi' => 'nullable|string',
        ]);

        $pengeluaran->update($validated);

        return response()->json($pengeluaran);
    }
}
