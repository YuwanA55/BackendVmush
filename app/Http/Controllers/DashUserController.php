<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFirebase;
use App\Models\AkunUser;


class DashUserController extends Controller
{

    public function __construct()
    {
        $this ->DataFire = new DataFirebase();
        $this ->Akun = new akunuser();
    }


    public function index(){
    if (!session('login')) {
        return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    if (session('status') !== 'User') {
        abort(404); // Jika bukan Admin, tampilkan 404
    }
        return view('User.dashboardnew' );
    // }
}

public function upgradee(){

        // $data = [
        //     't_akun' =>$this->Akun->alldata(),
        //     't_firebase' => $this->DataFire->alldata(),
        // ];
    return view('User.upgrade' );

}

public function permintaanstok(){

        // $data = [
        //     't_akun' =>$this->Akun->alldata(),
        //     't_firebase' => $this->DataFire->alldata(),
        // ];
    return view('tengkulak.trimaRequest' );

}

public function detailstok(){

        // $data = [
        //     't_akun' =>$this->Akun->alldata(),
        //     't_firebase' => $this->DataFire->alldata(),
        // ];
    return view('tengkulak.detailtengkulak' );

}


public function pack(){
    // if(!session('login')){
    //     return redirect('/');
    // }else{

        // $data = [
        //     't_akun' =>$this->Akun->alldata(),
        //     't_firebase' => $this->DataFire->alldata(),
        // ];
    return view('User.pack' );
// }
}


}