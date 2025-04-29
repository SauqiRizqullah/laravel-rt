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
        $rules = [
            'nama' => 'required|string|max:255',
            'foto_ktp' => 'nullable|image',
            'status' => 'required|in:tetap,kontrak',
            'no_telepon' => ['required', 'regex:/^08[0-9]{8,10}$/'],
            'menikah' => 'required|boolean',
        ];

        $messages = [
            'no_telepon.regex' => 'Nomor telepon harus diawali dengan 08 dan memiliki 10 hingga 12 digit.',
        ];

        $validated = $request->validate($rules, $messages);

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

    $rules = [
        'nama' => 'sometimes|required|string|max:255',
        'foto_ktp' => 'nullable|image',
        'status' => 'sometimes|required|in:tetap,kontrak',
        'no_telepon' => ['sometimes', 'required', 'regex:/^08[0-9]{8,10}$/'],
        'menikah' => 'sometimes|required|boolean',
    ];

    $messages = [
        'no_telepon.regex' => 'Nomor telepon harus diawali dengan 08 dan memiliki 10 hingga 12 digit.',
    ];

    $validated = $request->validate($rules, $messages);

    // Jika ada file baru, simpan dan timpa
    if ($request->hasFile('foto_ktp')) {
        $path = $request->file('foto_ktp')->store('ktp', 'public');
        $validated['foto_ktp'] = $path;
    }

    // Jika tidak ada foto baru, maka foto lama tetap dipakai (tidak dimasukkan ke dalam $validated)
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
