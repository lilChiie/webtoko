<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ListProdukController;



Route::get('/produk', [ApiController::class, 'index'])->name('api.produk');
Route::get('/list', [ApiController::class, 'getProduct'])->name('listbarang');


Route::get('/listproduk', [ListProdukController::class, 'show'])->name('listbarang');
Route::post('/listproduk', [ListProdukController::class, 'simpan'])->name('produk.simpan');
Route::delete('/listproduk/{id}', [ListProdukController::class, 'delete'])->name('produk.delete');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
