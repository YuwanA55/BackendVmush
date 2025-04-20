<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\akun;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(){

        // $this ->akun = new akun();
    }

    public function submit(){

        return view('Login.login');
}

    // public function auth()
    // {
    //     request()->validate([
    //         'user' => 'required',
    //         'pass' => 'required',
    //     ]);
    
    //     $data = $this->akun->authlogin(request()->user);
    
    //     if (!$data) {
    //         return redirect('/')->with('error', 'Username atau password salah.');
    //     } else {
    //         if (Hash::check(request()->pass, $data->pass) && $data->level === 'Admin') {
    //             session()->put([
    //                 'user' => $data->user,
    //                 'nama' => $data->nama,
    //                 'email' => $data->email,
    //                 'nohp' => $data->nohp,
    //                 'pass' => $data->pass,
    //                 'lokasi' => $data->lokasi,
    //                 'level' => $data->level,
    //                 'tanggal_create' => $data->tanggal_create,
    //                 'gambar' => $data->gambar,
    //                 'login' => true,     
    //             ]);
    //             return redirect('/dashboard'); //ke dashboard
    //         } else {
    //             // Jika level bukan admin atau password tidak cocok
    //             return redirect('/')->with('error', 'Username atau password salah.');
    //         }
    //     }
    // }


    public function logout(){
        session()->flush();
        return redirect('/');// Ke front end
    }

    
    //ke buat akun
    // public function kebuatakun(){
    //     return view('registrasi');
    // }

    // public function buatakun(Request $request){
    //     $request->validate([
    //         'nama' => 'required',
    //         'username' => 'required',
    //         'password' => 'required|min:8|confirmed',
    //         'status' => 'required',
    //     ]);
    //     $nama = $request->nama;
    //     $username = $request->username;
    //     $pass = $request->password;
    //     $status = $request->status;

    //     $data = petugas::create([
    //         'nama_petugas' => $nama,
    //         'username' => $username,
    //         'password' => Hash::make($pass),
    //         'status' => $status,
    //     ]);

    //     return redirect('/login');
    // }

    

}
