<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StatusController;
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
Route::get('/ubahpelanggan/{id}', [PelangganController::class, 'show'])->name('show.pelanggan');
Route::post('/editpelanggan/{id}', [PelangganController::class, 'update'])->name('update.pelanggan');
Route::get('/hapuspelanggan/{id}', [PelangganController::class, 'destroy'])->name('destroy.pelanggan');


Route::get('/outlet', [OutletController::class, 'index'])->name('outlet');
Route::get('/addoutlet', [OutletController::class, 'create'])->name('create.outlet');
Route::post('/procsesadd', [OutletController::class, 'store'])->name('store.outlet');
Route::get('ubahoutlet/{id}', [OutletController::class, 'show'])->name('show.outlet');
Route::post('/editoutlet/{id}', [OutletController::class, 'update'])->name('update.outlet');
Route::get('/hapusoutlet/{id}', [OutletController::class, 'destroy'])->name('destroy.outlet');


Route::get('/paket', [PaketController::class, 'index'])->name('paket');
Route::get('/addpaket', [PaketController::class, 'create'])->name('create.paket');
Route::post('prosesadd', [PaketController::class, 'store'])->name('store.paket');
Route::get('/ubahpaket/{id}', [PaketController::class, 'show'])->name('show.paket');
Route::post('/editpaket/{id}', [PaketController::class, 'update'])->name('update.paket');
Route::get('/hapuspaket/{id}', [PaketController::class, 'destroy'])->name('destroy.paket');


Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/addtransaksi', [TransaksiController::class, 'create'])->name('c.transaksi');
Route::post('/prosessadd', [TransaksiController::class, 'store'])->name('s.transaksi');
Route::get('/ubah/{id}', [TransaksiController::class, 'show'])->name('show.transaksi');
Route::post('/update/{id}', [TransaksiController::class, 'update'])->name('update.transaksi');
Route::get('/invoice/{id}', [InvoiceController::class, 'index'])->name('invoice');

Route::get('/editstatustransaksi/{id}', [StatusController::class, 'edit'])->name('statustransaksi');
Route::post('/updatestatustransaksi/{id}', [StatusController::class, 'update'])->name('update.statustransaksi');

Route::get('/editpembayaran/{id}', [PembayaranController::class, 'edit'])->name('pembayaran');
Route::post('/updatepembayaran/{id}', [PembayaranController::class, 'update'])->name('update.pembayaran');

Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
Route::post('/printlaporan', [LaporanController::class, 'print'])->name('print.laporan');

Route::get('/register', [RegisterController::class, 'index'])->name('registerpelanggan');
Route::post('/insert', [RegisterController::class, 'store'])->name('insert.register');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');