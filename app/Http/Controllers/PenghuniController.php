<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    public function index()
    {
        return response()->json(Penghuni::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'foto_ktp' => 'nullable|image',
            'status' => 'required|in:tetap,kontrak',
            'no_telepon' => 'required|string',
            'menikah' => 'required|boolean',
        ]);

        if ($request->hasFile('foto_ktp')) {
            $path = $request->file('foto_ktp')->store('ktp', 'public');
            $validated['foto_ktp'] = $path;
        }

        $penghuni = Penghuni::create($validated);
        return response()->json($penghuni, 201);
    }

    public function show($id)
    {
        return response()->json(Penghuni::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $penghuni = Penghuni::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'foto_ktp' => 'nullable|image',
            'status' => 'sometimes|required|in:tetap,kontrak',
            'no_telepon' => 'sometimes|required|string',
            'menikah' => 'sometimes|required|boolean',
        ]);

        if ($request->hasFile('foto_ktp')) {
            $path = $request->file('foto_ktp')->store('ktp', 'public');
            $validated['foto_ktp'] = $path;
        }

        $penghuni->update($validated);
        return response()->json($penghuni);
    }

    public function destroy($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        $penghuni->delete();

        return response()->json(['message' => 'Penghuni deleted']);
    }
}
