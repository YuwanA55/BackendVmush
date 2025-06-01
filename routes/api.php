<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\AkunController;
use App\Http\Controllers\Api\FirebaseController;
use App\Http\Controllers\Api\PaketController;
use App\Http\Controllers\Api\PembelianController;
use App\Http\Controllers\Api\PenjadwalanController;
use App\Http\Controllers\Api\TengkulakController;
use App\Http\Controllers\Api\PermintaanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API Akun
Route::get('/akun/user/tampil', [AkunController::class, 'index']);
Route::get('/akun/user/tampil/{username}', [AkunController::class, 'showid']);
Route::get('/akun/user/tampil/email/{email}', [AkunController::class, 'showemail']);
Route::post('/akun/user/tambah-akun', [AkunController::class, 'store']);
Route::put('/akun/user/edit-akun/{username}', [AkunController::class, 'updatee']);
Route::delete('/akun/user/hapus-akun/{username}', [AkunController::class, 'delete']);

// API Firebase
Route::get('/Data/Link-Firebase/tampil', [FirebaseController::class, 'index']);
Route::get('/Data/Link-Firebase/tampil/{username}', [FirebaseController::class, 'showid']);
// Route::get('/Data/Link-Firebase/tampil/{email}', [FirebaseController::class, 'showemail']);
Route::post('/Data/Link-Firebase/tambah-Data', [FirebaseController::class, 'store']);
Route::put('/Data/Link-Firebase/edit-Data/{id}', [FirebaseController::class, 'updatee']);
Route::delete('/Data/Link-Firebase/hapus-Data/{id}', [FirebaseController::class, 'delete']);

// API Paket
Route::get('/Data/Paket/tampil', [PaketController::class, 'index']);
Route::get('/Data/Paket/tampil/{id}', [PaketController::class, 'showid']);

// API Pembelian
Route::get('/Data/Pembelian/Paket/tampil', [PembelianController::class, 'index']);
Route::get('/Data/Pembelian/Paket/tampil/{username}', [PembelianController::class, 'showid']);
Route::get('/Data/Pembelian/Paket/tampil/id/{id}', [PembelianController::class, 'showidd']);
// Route::get('/Data/Link-Firebase/tampil/{email}', [PembelianController::class, 'showemail']);
Route::post('/Data/Pembelian/Paket/tambah-Data', [PembelianController::class, 'store']);
Route::put('/Data/Pembelian/Paket/edit-Data/{id}', [PembelianController::class, 'updatee']);
Route::delete('/Data/Pembelian/Paket/hapus-Data/{id}', [PembelianController::class, 'delete']);


// API Penjadwalan
Route::get('/Data/Penjadwalan/data-tampil', [PenjadwalanController::class, 'index']);
Route::get('/Data/Penjadwalan/data-tampil/{username}', [PenjadwalanController::class, 'showid']);
Route::get('/Data/Penjadwalan/data-tampil/{username}/{tanggal}', [PenjadwalanController::class, 'showtanggal']);
// Route::get('/Data/Pembelian/Paket/tampil/id/{id}', [PenjadwalanController::class, 'showidd']);
// Route::get('/Data/Link-Firebase/tampil/{email}', [PenjadwalanController::class, 'showemail']);
Route::post('/Data/Penjadwalan/tambah-Data', [PenjadwalanController::class, 'store']);
Route::put('/Data/Penjadwalan/edit-Data/{id_penjadwalan}', [PenjadwalanController::class, 'updatee']);
Route::put('/Data/Penjadwalan/edit-Data/user/{username}', [PenjadwalanController::class, 'updateeuser']);
Route::delete('/Data/Penjadwalan/hapus-Data/{id_penjadwalan}', [PenjadwalanController::class, 'delete']);
Route::delete('/Data/Penjadwalan/hapus-Data/user/{username}', [PenjadwalanController::class, 'delete']);


// API Tengkulak
Route::get('/Data/Tengkulak/data-tampil', [TengkulakController::class, 'index']);
Route::get('/Data/Tengkulak/data-tampil/{username}', [TengkulakController::class, 'showid']);
// Route::get('/Data/Pembelian/Paket/tampil/id/{id}', [TengkulakController::class, 'showidd']);
// Route::get('/Data/Link-Firebase/tampil/{email}', [TengkulakController::class, 'showemail']);
Route::post('/Data/Tengkulak/tambah-Data', [TengkulakController::class, 'store']);
// Route::put('/Data/Penjadwalan/edit-Data/{id_penjadwalan}', [TengkulakController::class, 'updatee']);
// Route::put('/Data/Penjadwalan/edit-Data/user/{username}', [TengkulakController::class, 'updateeuser']);
// Route::delete('/Data/Penjadwalan/hapus-Data/{id_penjadwalan}', [TengkulakController::class, 'delete']);
Route::delete('/Data/Tengkulak/hapus-Data/{username}', [TengkulakController::class, 'deleteuser']);


// API Permintaan Stok
Route::get('/Data/Permintaan/data-tampil', [PermintaanController::class, 'index']);
Route::get('/Data/Permintaan/data-tampil/{username}', [PermintaanController::class, 'showusername']);
Route::post('/Data/Permintaan/tambah-Data', [PermintaanController::class, 'store']);
Route::delete('/Data/Permintaan/hapus-Data/user/{username}', [PermintaanController::class, 'deleteuser']);
Route::delete('/Data/Permintaan/hapus-Data/id/{id_stok}', [PermintaanController::class, 'deleteid']);


