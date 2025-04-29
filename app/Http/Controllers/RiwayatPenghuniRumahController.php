<?php

namespace App\Http\Controllers;


use App\Models\RiwayatPenghuniRumah;
use Illuminate\Http\Request;

class RiwayatPenghuniRumahController extends Controller
{
    public function index()
    {
        return response()->json(
            RiwayatPenghuniRumah::with(['rumah', 'penghuni'])->get()
        );
    }

    public function create()
    {
        return response()->json(['message' => 'Show form to create RiwayatPenghuniRumah']);
    }

    public function show($id)
    {
        return response()->json(RiwayatPenghuniRumah::findOrFail($id));
    }

    public function update(Request $request, $id)
{
    $riwayat = RiwayatPenghuniRumah::findOrFail($id);

    $validated = $request->validate([
        'rumah_id' => 'sometimes|exists:rumah,id',
        'penghuni_id' => 'sometimes|exists:penghunis,id',
        'tanggal_masuk' => 'sometimes|date',
        'tanggal_keluar' => [
            'nullable',
            'date',
            function ($attribute, $value, $fail) use ($request) {
                $masuk = $request->input('tanggal_masuk') ?? $request->route('id') ? RiwayatPenghuniRumah::find($request->route('id'))->tanggal_masuk : null;
                if ($masuk && $value <= $masuk) {
                    $fail('Tanggal keluar harus lebih besar dari tanggal masuk.');
                }
            }
        ],
    ]);

    $riwayat->update($validated);

    return response()->json($riwayat);
}


    public function store(Request $request)
{
    $validated = $request->validate([
        'penghuni_id' => 'required|exists:penghunis,id',
        'rumah_id' => 'required|exists:rumah,id',
        'tanggal_masuk' => 'required|date',
        'tanggal_keluar' => 'nullable|date|after:tanggal_masuk',
    ]);

    $riwayat = RiwayatPenghuniRumah::create($validated);

    return response()->json($riwayat, 201);
}

public function destroy($id)
{
    $riwayat = RiwayatPenghuniRumah::findOrFail($id);
    $riwayat->delete();

    return response()->json(['message' => 'Riwayat berhasil dihapus']);
}
}
