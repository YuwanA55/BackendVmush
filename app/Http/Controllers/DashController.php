<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFirebase;
use App\Models\AkunUser;


class DashController extends Controller
{

    public function __construct()
    {
        $this ->DataFire = new DataFirebase();
        $this ->Akun = new akunuser();
    }


    public function index(){
        // if(!session('login')){
        //     return redirect('/');
        // }else{

            $data = [
                't_akun' =>$this->Akun->alldata(),
                't_firebase' => $this->DataFire->alldata(),
            ];
        return view('admin.dashboard' ,$data);
    // }
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

}