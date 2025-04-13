<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\AkunController;

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
Route::get('/akun/tampil', [AkunController::class, 'index']);
Route::get('/akun/tampil/{id_user}', [AkunController::class, 'showid']);
Route::get('/akun/tampil/email/{email}', [AkunController::class, 'showemail']);
Route::post('/akun/tambah-akun', [AkunController::class, 'store']);
Route::put('/akun/edit-akun/{id_user}', [AkunController::class, 'updatee']);
Route::delete('/akun/hapus-akun/{id_user}', [AkunController::class, 'delete']);
