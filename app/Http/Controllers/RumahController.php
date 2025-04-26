<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use Illuminate\Http\Request;

class RumahController extends Controller
{
    public function index()
    {
        return Rumah::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_rumah' => 'required|string',
            'status_rumah' => 'required|in:dihuni,tidak',
            'current_penghuni_id' => 'nullable|exists:penghuni,id',
        ]);

        $rumah = Rumah::create($validated);

        return response()->json($rumah, 201);
    }

    public function show($id)
    {
        $rumah = Rumah::findOrFail($id);
        return response()->json($rumah);
    }

    public function update(Request $request, $id)
    {
        $rumah = Rumah::findOrFail($id);

        $validated = $request->validate([
            'nomor_rumah' => 'sometimes|string',
            'status_rumah' => 'sometimes|in:dihuni,tidak',
            'current_penghuni_id' => 'nullable|exists:penghuni,id',
        ]);

        $rumah->update($validated);

        return response()->json($rumah);
    }
}
