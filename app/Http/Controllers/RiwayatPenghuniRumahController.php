<?php

namespace App\Http\Controllers;


use App\Models\RiwayatPenghuniRumah;
use Illuminate\Http\Request;

class RiwayatPenghuniRumahController extends Controller
{
    public function index()
    {
        return response()->json(RiwayatPenghuniRumah::all());
    }

    public function create()
    {
        return response()->json(['message' => 'Show form to create RiwayatPenghuniRumah']);
    }

    public function show($id)
    {
        return response()->json(RiwayatPenghuniRumah::findOrFail($id));
    }

    public function edit($id)
    {
        return response()->json(['message' => "Show form to edit RiwayatPenghuniRumah with ID {$id}"]);
    }
}
