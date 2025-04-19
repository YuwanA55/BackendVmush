<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\AkunController;
use App\Http\Controllers\Api\FirebaseController;
use App\Http\Controllers\Api\PaketController;
use App\Http\Controllers\Api\PembelianController;

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