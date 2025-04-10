<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunUserController;
use App\Http\Controllers\DataFirebaseCtrl;
use App\Http\Controllers\DashController;
use App\Http\Controllers\DashUserController;

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

// Route::get('/', [AuthController::class, 'submit']);
// Route::post('/authlogin',[AuthController::class,'auth']);
// Route::get('/akses/logout',[AuthController::class,'logout']);

Route::get('/dashboard', [DashController::class, 'index']);

// DATA AKUN
Route::get('/akun/user', [AkunUserController::class, 'index'])->name('akunuser');
// Route::post('/data/akun/save', [AkunController::class, 'save']);
// Route::get('/akun/edit/{user}', [AkunController::class, 'editakunuser']);
// Route::post('/simpan-akun/{user}',  [AkunController::class, 'update'])->name('simpan.user');
// Route::delete('/hapus-akun/{user}', [AkunController::class, 'hapusData']);

// DATA Firebase
Route::get('/DataLink/Firebase', [DataFirebaseCtrl::class, 'index'])->name('datafirebase');
Route::post('/DataLink/Firebase/save', [DataFirebaseCtrl::class, 'save']);
Route::get('/DataLink/Firebase/edit/{id}', [DataFirebaseCtrl::class, 'editfirebasee']);
Route::post('/DataLink/simpan-Link/{id}',  [DataFirebaseCtrl::class, 'update'])->name('simpan.link');
Route::delete('/DataLink/Firebase/hapus/{id}', [DataFirebaseCtrl::class, 'hapusData']);



// Dashboard User
Route::get('/dashboard/user', [DashUserController::class, 'index']);
Route::get('/dashboard/user/upgrade', [DashUserController::class, 'index']);