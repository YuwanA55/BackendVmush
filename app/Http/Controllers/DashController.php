<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFirebase;
use App\Models\AkunUser;
use App\Models\Pembelian;


class DashController extends Controller
{

    public function __construct()
    {
        $this ->DataFire = new DataFirebase();
        $this ->Akun = new akunuser();
        $this ->Pembelian = new Pembelian();
    }


public function index()
{
    if (!session('login')) {
        return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    if (session('status') !== 'Admin') {
        abort(404); // Jika bukan Admin, tampilkan 404
    }

    $data = [
        't_akun' => $this->Akun->alldata(),
        't_firebase' => $this->DataFire->alldata(),
        't_Pembelian' => $this->Pembelian->alldata(),
    ];

    return view('admin.dashboard', $data);
}

// public function detailadmin($user){
//     if(!session('login')){
//         return redirect('/');
//     }else{
//     $data = [
//         'main' => $this->akun->detailadmin($user),
//     ];
//     return view('admin.detailadmin', $data);
// }
// }

// public function edittadmin($user){
//     if(!session('login')){
//         return redirect('/');
//     }else{
//     $data = [
//         'mainn' => $this->akun->detailadmin($user),
//     ];
//     return view('admin.editadmin', $data);
// }
// }


public function apistatus(){

    return view('Api.api');
}

}