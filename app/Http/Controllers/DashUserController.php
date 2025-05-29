<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFirebase;
use App\Models\AkunUser;
use App\Models\DataSewa;
use Illuminate\Support\Facades\DB;


class DashUserController extends Controller
{

    public function __construct()
    {
        $this ->DataFire = new DataFirebase();
        $this ->Akun = new akunuser();
        $this ->DataSewa = new DataSewa();
    }


public function index()
{
    if (!session('login')) {
        return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    if (session('status') !== 'User') {
        abort(404); // Jika bukan User, tampilkan 404
    }

    $username = session('username');
    $permintaan = DB::select("SELECT * FROM `firebase` WHERE username = ?", [$username]);

    if (empty($permintaan)) {
        return view('User.dashboardnew', ['permintaan' => [], 'error' => 'No Firebase data found for user: ' . $username]);
    }

    return view('User.dashboardnew', ['permintaan' => $permintaan]);
}


public function upgradee(){

        // $data = [
        //     't_akun' =>$this->Akun->alldata(),
        //     't_firebase' => $this->DataFire->alldata(),
        // ];
    return view('User.upgrade' );

}

public function permintaanstok(){

$permintaan = DB::select("SELECT ps.*, au.gambar, au.alamat, au.nama, au.nohp, au.email, au.status
FROM permintaan_stok ps
JOIN akun_user au ON ps.username = au.username
WHERE ps.status_permintaan = 'Pending';");

  return view('tengkulak.trimaRequest', ['permintaan' => $permintaan]);

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


public function historyy($username){
    $data = [
        'main' => $this->DataSewa->sewabyuserr($username),
    ];
    return view('User.historypembelian', $data);
}


}