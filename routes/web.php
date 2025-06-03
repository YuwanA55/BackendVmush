<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunUserController;
use App\Http\Controllers\DataFirebaseCtrl;
use App\Http\Controllers\DashController;
use App\Http\Controllers\DashUserController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\FrontendController;

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

Route::get('/', [FrontendController::class, 'index']);
Route::get('/pembayaran/{id_paket}', [FrontendController::class, 'pembayaran']);
Route::get('/pembayaran/{id_paket}/tagihandata/{id_bank}', [FrontendController::class, 'tagihann']);
Route::post('/pembayaran/tagihandata/{username}/save-data', [FrontendController::class, 'savesewa']);

Route::get('/permintaan/jamur', [FrontendController::class, 'permintaanjamur'])->name('permintaanjamur');
Route::get('/permintaan/jamur/edit/{id_tok}', [FrontendController::class, 'editjamurr']);
Route::post('/permintaan/jamur/tambah-data', [FrontendController::class, 'savepermintaan'])->name('savepermintaan');
Route::delete('/permintaan/jamur/hapus-data/{id_stok}', [FrontendController::class, 'hapusData']);





// Route::get('/tagihandata', function () {
//     return view('Frontend.tagihan');
// });


Route::get('/detailtengkulak', function () {
    return view('tengkulak.detailtengkulak');
});

// Route::get('/permintaan/jamur', function () {
//     return view('tengkulak.reqtengkulak');
// });

Route::get('/PermintaanStok', function () {
    return view('tengkulak.trimaRequest');
});


Route::get('/login', [AuthController::class, 'submit'])->name('login');
Route::get('/logintengku', [AuthController::class, 'submittengku'])->name('logintengku');

Route::post('/authlogin',[AuthController::class,'auth']);
Route::get('/akses/logout',[AuthController::class,'logout']);

Route::get('/reset/sandi',[AuthController::class,'editsandi']);


Route::get('/register',[AuthController::class,'registerrr']);
Route::get('/register/tengkulak',[AuthController::class,'registertengku']);
Route::post('/register/tambah-data/user',[AuthController::class,'savee']);
Route::post('/register/tambah-data',[AuthController::class,'saveetengku']);

Route::get('/dashboard/admin', [DashController::class, 'index']);
Route::get('/dashboard/admin/detail/{username}', [DashController::class, 'detailadmin']);


Route::get('/api/link', [DashController::class, 'apistatus']);
Route::get('/api/link/update', [DashController::class, 'apistatus11']);

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

// DATA Bank /edit belum
Route::get('/dashboard/admin/databank/data', [BankController::class, 'index'])->name('databank');
Route::post('/dashboard/admin/databank/data-save', [BankController::class, 'save']);
Route::get('/dashboard/admin/databank/edit/{id}', [BankController::class, 'editfirebasee']);
Route::post('/dashboard/admin/databank/simpan-Link/{id}',  [BankController::class, 'update'])->name('simpan.bank');
Route::delete('/dashboard/admin/databank/hapus/{id}', [BankController::class, 'hapusData']);

// DATA Paket
Route::get('/dashboard/admin/Produk/Paket', [PaketController::class, 'index'])->name('datapaket');
Route::post('/dashboard/admin/Produk/Paket-save', [PaketController::class, 'save']);
// Route::get('/dashboard/admin/DataLink/Firebase/edit/{id}', [DataFirebaseCtrl::class, 'editfirebasee']);
// Route::post('/dashboard/admin/DataLink/simpan-Link/{id}',  [DataFirebaseCtrl::class, 'update'])->name('simpan.link');
Route::delete('/dashboard/admin/Produk/hapus/{id_paket}', [PaketController::class, 'hapusData']);

// DATA Pembelian
Route::get('/dashboard/admin/Penyewaan/Paket', [PembelianController::class, 'index'])->name('datapembelian');
Route::post('/dashboard/admin/Penyewaan/Paket/save', [PembelianController::class, 'save']);
Route::get('/dashboard/admin/Penyewaan/paket/edit/{id_sewa}', [PembelianController::class, 'editpembelian']);
Route::post('/dashboard/admin/Penyewaan/simpan-paket/{id_sewa}',  [PembelianController::class, 'update'])->name('simpan.paket');
Route::delete('/dashboard/admin/Penyewaan/Paket/hapus/{id}', [PembelianController::class, 'hapusData']);



// Dashboard User
Route::get('/dashboard/user/detail-akun/{username}', [DashUserController::class, 'detailadminmm']);
Route::get('/dashboard', [DashUserController::class, 'index'])->name('userrr');
Route::get('/dashboard/user/upgrade', [DashUserController::class, 'upgradee']);

Route::get('/dashboard/user/pengambilanstok', [DashUserController::class, 'permintaanstok'])->name('stokpermintaan');
Route::get('/dashboard/user/pengambilanstok/detail/{id_stok}', [DashUserController::class, 'detailstok'])->name('user.permintaandetail');
Route::post('/dashboard/user/pengambilanstok/take-requeststok', [DashUserController::class, 'takeRequeststok'])->name('user.permintaanstok');
Route::post('/dashboard/user/pengambilanstok/check-user-status', [DashUserController::class, 'checkUserStatusstok']);
Route::post('/dashboard/user/permintaanstok/complete-stok', [DashUserController::class, 'markAsCompleted'])
         ->name('user.permintaanstok.complete'); // Menambahkan nama rute
Route::post('/dashboard/user/permintaanstok/delete-stok', [DashUserController::class, 'markAsCompletedeleted'])
         ->name('user.permintaanstok.delete'); // Menambahkan nama rute

Route::get('/dashboard/user/pengambilanstok/history', [DashUserController::class, 'historyystok']);

Route::get('/dashboard/user/{username}/HistoryPenyewaan', [DashUserController::class, 'historyy'])->name('penyewaan');
// Route::get('/dashboard/user/pack', [DashUserController::class, 'pack']);


Route::get('/hapussampah', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";

});