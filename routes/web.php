<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\RiwayatPenghuniRumahController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\KasController;

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('posts', PostController::class);


Route::get('/penghunis', [PenghuniController::class, 'index'])->name('penghunis.index');
Route::post('/penghunis', [PenghuniController::class, 'store'])->name('penghunis.store');
Route::get('/penghunis/{id}', [PenghuniController::class, 'show'])->name('penghunis.show');
Route::put('/penghunis/{id}', [PenghuniController::class, 'update'])->name('penghunis.update');
Route::delete('/penghunis/{id}', [PenghuniController::class, 'destroy'])->name('penghunis.destroy');

Route::get('/rumah', [RumahController::class, 'index']);
Route::post('/rumah', [RumahController::class, 'store']);
Route::get('/rumah/{id}', [RumahController::class, 'show']);
Route::put('/rumah/{id}', [RumahController::class, 'update']);

Route::get('/riwayat', [RiwayatPenghuniRumahController::class, 'index'])->name('riwayatpenghunirumah.index');
Route::post('/riwayat', [RiwayatPenghuniRumahController::class, 'store'])->name('riwayatpenghunirumah.store');
Route::get('/riwayat/{id}', [RiwayatPenghuniRumahController::class, 'show'])->name('riwayatpenghunirumah.show');
Route::put('/riwayat/{id}', [RiwayatPenghuniRumahController::class, 'update'])->name('riwayatpenghunirumah.update');
Route::delete('/riwayat/{id}', [RiwayatPenghuniRumahController::class, 'destroy'])->name('riwayatpenghunirumah.destroy');


Route::get('/pembayaran', [PembayaranController::class, 'index']);
Route::get('/pembayaran/{id}', [PembayaranController::class, 'show']);
Route::post('/pembayaran', [PembayaranController::class, 'store']);
Route::put('/pembayaran/{id}', [PembayaranController::class, 'update']);
Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy']);

Route::get('/pengeluaran', [PengeluaranController::class, 'index']);
Route::get('/pengeluaran/{id}', [PengeluaranController::class, 'show']);
Route::post('/pengeluaran', [PengeluaranController::class, 'store']);
Route::put('/pengeluaran/{id}', [PengeluaranController::class, 'update']);
Route::delete('/pengeluaran/{id}', [PengeluaranController::class, 'destroy']);

// Route untuk total kas RT


Route::get('/api/total-kas', [KasController::class, 'total']);

Route::get('/test-api', function () {
    return response()->json([
        'message' => 'API is working!',
        'status' => 'success'
    ]);
});
