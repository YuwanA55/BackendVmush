<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunUserController;
use App\Http\Controllers\DataFirebaseCtrl;
use App\Http\Controllers\DashController;
use App\Http\Controllers\DashUserController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Frontend.Frontend');
});

Route::get('/login', [AuthController::class, 'submit']);
Route::post('/authlogin',[AuthController::class,'auth']);
Route::get('/akses/logout',[AuthController::class,'logout']);

Route::get('/dashboard/admin', [DashController::class, 'index']);
Route::get('/api/link', [DashController::class, 'apistatus']);

// DATA AKUN
Route::get('/dashboard/admin/akun/user', [AkunUserController::class, 'index'])->name('akunuser');
Route::post('/dashboard/admin/akun/user-save', [AkunUserController::class, 'save']);
// Route::get('/akun/edit/{user}', [AkunController::class, 'editakunuser']);
// Route::post('/simpan-akun/{user}',  [AkunController::class, 'update'])->name('simpan.user');
Route::delete('/dashboard/admin/akun/user/hapus-akun/{username}', [AkunUserController::class, 'hapusData']);

// DATA Firebase
Route::get('/dashboard/admin/DataLink/Firebase', [DataFirebaseCtrl::class, 'index'])->name('datafirebase');
Route::post('/dashboard/admin/DataLink/Firebase/save', [DataFirebaseCtrl::class, 'save']);
Route::get('/dashboard/admin/DataLink/Firebase/edit/{id}', [DataFirebaseCtrl::class, 'editfirebasee']);
Route::post('/dashboard/admin/DataLink/simpan-Link/{id}',  [DataFirebaseCtrl::class, 'update'])->name('simpan.link');
Route::delete('/dashboard/admin/DataLink/Firebase/hapus/{id}', [DataFirebaseCtrl::class, 'hapusData']);

// DATA Paket
Route::get('/dashboard/admin/Produk/Paket', [PaketController::class, 'index'])->name('datapaket');
Route::post('/dashboard/admin/Produk/Paket-save', [PaketController::class, 'save']);
// Route::get('/dashboard/admin/DataLink/Firebase/edit/{id}', [DataFirebaseCtrl::class, 'editfirebasee']);
// Route::post('/dashboard/admin/DataLink/simpan-Link/{id}',  [DataFirebaseCtrl::class, 'update'])->name('simpan.link');
Route::delete('/dashboard/admin/Produk/hapus/{id_paket}', [PaketController::class, 'hapusData']);

// DATA Pembelian
Route::get('/dashboard/admin/Pembelian/Paket', [PembelianController::class, 'index'])->name('datapembelian');
Route::post('/dashboard/admin/Pembelian/Paket/save', [PembelianController::class, 'save']);
Route::get('/dashboard/admin/Pembelian/paket-edit/{id}', [PembelianController::class, 'editpembelian']);
Route::post('/dashboard/admin/Pembelian/simpan-paket/{id}',  [PembelianController::class, 'update'])->name('simpan.paket');
Route::delete('/dashboard/admin/Pembelian/Paket/hapus/{id}', [PembelianController::class, 'hapusData']);



// Dashboard User
Route::get('/dashboard', [DashUserController::class, 'index']);
Route::get('/dashboard/user/upgrade', [DashUserController::class, 'upgradee']);
// Route::get('/dashboard/user/pack', [DashUserController::class, 'pack']);


Route::get('/hapussampah', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";

});
