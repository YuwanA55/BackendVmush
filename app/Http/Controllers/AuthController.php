<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AkunUser;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(){

        $this ->akunuser = new akunuser();
    }

    public function submit(){

        return view('Login.login');
}

public function auth()
{
    request()->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $data = $this->akunuser->authlogin(request()->username);

    if (!$data) {
        return redirect('/login')->with('error', 'Username atau password salah.');
    }

    if (Hash::check(request()->password, $data->password)) {
        // Simpan data ke session
        session()->put([
            'username' => $data->username,
            'nama' => $data->nama,
            'email' => $data->email,
            'status' => $data->status,
            'gambar' => $data->gambar,
            'alamat' => $data->alamat,
            'nohp' => $data->nohp,
            'tanggal_create' => $data->tanggal_create,
            'login' => true,
        ]);

        // Redirect berdasarkan status
        if ($data->status === 'Admin') {
            return redirect('/dashboard/admin');
        } elseif ($data->status === 'User') {
            return redirect('/dashboard');
        }
    }

    return redirect('/login')->with('error', 'Username atau password salah.');
}


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
