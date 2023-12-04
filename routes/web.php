<?php

use App\Http\Controllers\JenisbarangController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TesApiController;
use App\Models\Jenisbarang;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/pengguna', [PenggunaController::class, 'tampildata'])->name('pengguna.tampildata');
Route::post('/tambahpegawai', [PenggunaController::class, 'tambahpegawai'])->name('pengguna.tambahpegawai');
Route::post('/editpegawai', [PenggunaController::class, 'updatepegawai'])->name('pengguna.editpegawai');
Route::delete('/data/{id}', [PenggunaController::class, 'hapuspegawai'])->name('data.destroy');
Route::get('/jenisbarang', [JenisbarangController::class, 'index'])->name('jenisbarang.tampildata');
Route::post('/tambahjenis', [JenisbarangController::class, 'tambahjenis'])->name('jenisbarang.tambahjenis');
Route::post('/editjenis', [JenisbarangController::class, 'updatejenis'])->name('jenisbarang.editjenis');
Route::delete('/hapusjenis/{id}', [JenisbarangController::class, 'hapusjenis'])->name('hapusjenis.destroy');



Route::get('/tesApi', [TesApiController::class, 'index']);
