<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AkunUser;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(){

        $this ->akunuser = new akunuser();
        $this ->Akun = new akunuser();
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
            // Cek jika ada URL tujuan yang disimpan
            $redirectUrl = session('url.intended', '/dashboard');
            return redirect($redirectUrl);
        } elseif ($data->status === 'Tengkulak') {
            // Cek jika ada URL tujuan yang disimpan
            $redirectUrl = session('url.intended', '/permintaan/jamur');
            return redirect($redirectUrl);
        }
    }

    return redirect('/login')->with('error', 'Username atau password salah.');
}



    public function logout(){
        session()->flush();
        return redirect('/');// Ke front end
    }


    public function registerrr(){

        return view('Login.register');
    }
    
    public function savee(){
            // Validasi input
            Request()->validate([
                'username' => 'required|max:255',
                'nama' => 'required|max:50',
                'email' => 'required|email|max:50',
                'nohp' => 'required|max:50',
                'pass' => 'required',
                'alamat' => 'required',
                'tgl' => 'required',
                'upload' => 'mimes:jpg,png,JPEG,gif|max:5120', // Menambahkan validasi untuk jenis file gambar dan maksimum ukuran file
            ], [
                'username.max' => 'Panjang maksimum untuk user adalah 255 karakter.',
                'upload.max' => 'Ukuran maksimum file gambar adalah 5MB.',
            ]);
            
            // Inisialisasi variabel untuk menyimpan URL gambar
            $gambarUrl = null;
    
            // Cek apakah ada file gambar yang diunggah
            if (request()->hasFile('upload')) {
                $gambar = request()->file('upload'); // Mengambil file gambar dari request
                $ekstensi = $gambar->getClientOriginalExtension();
                // Membuat nama file yang unik dengan menambahkan tanggal saat ini (tahun-bulan-hari)
                $namaGambar = date('Ymd') . '_' . uniqid() . '.' . $ekstensi;
                $gambar->move(public_path('GambarProfile/'), $namaGambar); // Memindahkan file gambar ke folder yang ditentukan
                $gambarUrl = asset('GambarProfile/' . $namaGambar); // Menghasilkan URL gambar
            }
            
            // Data yang akan disimpan
            $data = [
                'username' => request()->username,
                'nama' => request()->nama,
                'email' => request()->email,
                'password' => Hash::make(request()->pass),
                'pwasli' => request()->pass,
                'nohp' => request()->nohp,
                'alamat' => request()->alamat,
                'status' => 'User',
                'tanggal_create' => request()->tgl,
                'status_akun' => 'Aktif',
                'gambar' => $gambarUrl, // Menggunakan URL gambar jika ada, jika tidak tetap null
            ];
            
            // Menyimpan data ke database
            $this->Akun->addData($data);
            return redirect()->route('login', ['alert' => 'success']); // Menggunakan with() untuk mengirim pesan flash
        
    }



    // Tengku
        public function submittengku(){

        return view('Login.logintengku');
}

    public function registertengku(){

        return view('Login.registertengku');
    }


        public function saveetengku(){
            // Validasi input
            Request()->validate([
                'username' => 'required|max:255',
                'nama' => 'required|max:200',
                'email' => 'required|email|max:50',
                'nohp' => 'required|max:50',
                'pass' => 'required',
                'alamat' => 'required',
                'tgl' => 'required',
                'upload' => 'mimes:jpg,png,JPEG,gif|max:5120', // Menambahkan validasi untuk jenis file gambar dan maksimum ukuran file
            ], [
                'username.max' => 'Panjang maksimum untuk user adalah 255 karakter.',
                'upload.max' => 'Ukuran maksimum file gambar adalah 5MB.',
            ]);
            
            // Inisialisasi variabel untuk menyimpan URL gambar
            $gambarUrl = null;
    
            // Cek apakah ada file gambar yang diunggah
            if (request()->hasFile('upload')) {
                $gambar = request()->file('upload'); // Mengambil file gambar dari request
                $ekstensi = $gambar->getClientOriginalExtension();
                // Membuat nama file yang unik dengan menambahkan tanggal saat ini (tahun-bulan-hari)
                $namaGambar = date('Ymd') . '_' . uniqid() . '.' . $ekstensi;
                $gambar->move(public_path('GambarProfile/'), $namaGambar); // Memindahkan file gambar ke folder yang ditentukan
                $gambarUrl = asset('GambarProfile/' . $namaGambar); // Menghasilkan URL gambar
            }
            
            // Data yang akan disimpan
            $data = [
                'username' => request()->username,
                'nama' => request()->nama,
                'email' => request()->email,
                'password' => Hash::make(request()->pass),
                'pwasli' => request()->pass,
                'nohp' => request()->nohp,
                'alamat' => request()->alamat,
                'status' => 'Tengkulak',
                'tanggal_create' => request()->tgl,
                'status_akun' => 'Aktif',
                'gambar' => $gambarUrl, // Menggunakan URL gambar jika ada, jika tidak tetap null
            ];
            
            // Menyimpan data ke database
            $this->Akun->addData($data);
            return redirect()->route('login', ['alert' => 'success']); // Menggunakan with() untuk mengirim pesan flash
        
    }
    
        public function editsandi(){

        return view('Login.resetpw');
    }

}
