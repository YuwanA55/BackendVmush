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
        // if(!session('login')){
        //     return redirect('/');
        // }else{

            // $data = [
            //     't_akun' =>$this->Akun->alldata(),
            //     't_firebase' => $this->DataFire->alldata(),
            // ];
        return view('User.DashUser' );
    // }
}

public function upgradee(){
    // if(!session('login')){
    //     return redirect('/');
    // }else{

        // $data = [
        //     't_akun' =>$this->Akun->alldata(),
        //     't_firebase' => $this->DataFire->alldata(),
        // ];
    return view('User.upgrade' );
// }
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