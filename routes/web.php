<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\RiwayatPenghuniRumahController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengeluaranController;

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('posts', PostController::class);


Route::get('/penghunis', [PenghuniController::class, 'index'])->name('penghunis.index');
Route::get('/penghunis/create', [PenghuniController::class, 'create'])->name('penghunis.create');
Route::post('/penghunis', [PenghuniController::class, 'store'])->name('penghunis.store');
Route::get('/penghunis/{id}', [PenghuniController::class, 'show'])->name('penghunis.show');
Route::get('/penghunis/{id}/edit', [PenghuniController::class, 'edit'])->name('penghunis.edit');
Route::put('/penghunis/{id}', [PenghuniController::class, 'update'])->name('penghunis.update');
Route::delete('/penghunis/{id}', [PenghuniController::class, 'destroy'])->name('penghunis.destroy');

Route::get('/rumah', [RumahController::class, 'index']);
Route::post('/rumah', [RumahController::class, 'store']);
Route::get('/rumah/{id}', [RumahController::class, 'show']);
Route::put('/rumah/{id}', [RumahController::class, 'update']);

// Route::get('/riwayat-penghuni-rumah', [RiwayatPenghuniRumahController::class, 'index'])->name('riwayatpenghunirumah.index');
Route::get('/riwayat-penghuni-rumah/create', [RiwayatPenghuniRumahController::class, 'create'])->name('riwayatpenghunirumah.create');
Route::get('/rumah/{id}/riwayat', [RiwayatPenghuniRumahController::class, 'show'])->name('riwayatpenghunirumah.show');
Route::get('/riwayat-penghuni-rumah/{id}/edit', [RiwayatPenghuniRumahController::class, 'edit'])->name('riwayatpenghunirumah.edit');

Route::get('/pembayaran', [PembayaranController::class, 'index']);
Route::get('/pembayaran/{id}', [PembayaranController::class, 'show']);
Route::post('/pembayaran', [PembayaranController::class, 'store']);
Route::put('/pembayaran/{id}', [PembayaranController::class, 'update']);
Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy']);

Route::get('/pengeluaran', [PengeluaranController::class, 'index']);
Route::post('/pengeluaran', [PengeluaranController::class, 'store']);

Route::get('/test-api', function () {
    return response()->json([
        'message' => 'API is working!',
        'status' => 'success'
    ]);
});
