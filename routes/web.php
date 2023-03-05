<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/loginProcess', [LoginController::class, 'create'])->name('login.process');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
Route::get('/tambahdata', [PelangganController::class, 'create'])->name('create.pelanggan');
Route::post('/prosestambah', [PelangganController::class, 'store'])->name('store.pelanggan');
Route::get('/ubah/{id}', [PelangganController::class, 'show'])->name('show.pelanggan');
Route::post('/edit/{id}', [PelangganController::class, 'update'])->name('update.pelanggan');
Route::get('/hapus/{id}', [PelangganController::class, 'destroy'])->name('destroy.pelanggan');


Route::get('/outlet', [OutletController::class, 'index'])->name('outlet');
Route::get('/addoutlet', [OutletController::class, 'create'])->name('create.outlet');
Route::post('/procsesadd', [OutletController::class, 'store'])->name('store.outlet');
Route::get('ubah/{id}', [OutletController::class, 'show'])->name('show.outlet');
Route::post('/edit/{id}', [OutletController::class, 'update'])->name('update.outlet');
Route::get('/hapus/{id}', [OutletController::class, 'destroy'])->name('destroy.outlet');


Route::get('/paket', [PaketController::class, 'index'])->name('paket');
Route::get('/addpaket', [PaketController::class, 'create'])->name('create.paket');
Route::post('prosesadd', [PaketController::class, 'store'])->name('store.paket');
Route::get('/ubah/{id}', [PaketController::class, 'show'])->name('show.paket');
Route::post('/edit/{id}', [PaketController::class, 'update'])->name('update.paket');
Route::get('/hapus/{id}', [PaketController::class, 'destroy'])->name('destroy.paket');


Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/addtransaksi', [TransaksiController::class, 'create'])->name('c.transaksi');
Route::post('/prosessadd', [TransaksiController::class, 'store'])->name('s.transaksi');
