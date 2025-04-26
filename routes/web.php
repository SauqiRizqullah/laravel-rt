<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PenghuniController;

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


Route::get('/test-api', function () {
    return response()->json([
        'message' => 'API is working!',
        'status' => 'success'
    ]);
});
