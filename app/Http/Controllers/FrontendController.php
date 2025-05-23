<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\DataPaket;
use App\Models\DataBank;
use App\Models\DataSewa;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
      public function __construct(){
        $this ->DataPaket = new DataPaket();
        $this ->DataBank = new DataBank();
        $this ->DataSewa = new DataSewa();
    }

    public function index(){
       $alldata = [
        'alldata'=>$this->DataPaket->alldata(),
        ];
        return view('Frontend.Frontend', $alldata);
    // }
    }

public function pembayaran($id_paket)
{
    if (!session('login')) {
        // Simpan URL tujuan untuk redirect setelah login
        session(['url.intended' => url()->current()]);
        return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    if (session('status') !== 'User') {
        abort(404); // Jika bukan Admin, tampilkan 404
    }

    $data = [
        'main' => $this->DataPaket->editfipaketfr($id_paket),
    ];

    return view('Frontend.Pembayaran', $data);
}


      public function tagihann($id_paket, $id_bank){
      $data = [
            'main' => $this->DataPaket->editfipaketfr($id_paket),
            'mainbank' => $this->DataBank->detailbank($id_bank),
        ];

        return view('Frontend.tagihan', $data);

    }

    public function savesewa($username){
            // Validasi input
            Request()->validate([
                'id_sewa' => 'required|max:255',
                'id_paket' => 'required|max:255',
                'username' => 'required|max:255',
                'keterangan' => 'max:250',
                'status' => '',
                'tgl' => '',
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
                $gambar->move(public_path('GambarPembayaran/'), $namaGambar); // Memindahkan file gambar ke folder yang ditentukan
                $gambarUrl = asset('GambarPembayaran/' . $namaGambar); // Menghasilkan URL gambar
            }
            
            // Data yang akan disimpan
            $data = [
                'id_sewa' => request()->id_sewa,
                'id_paket' => request()->id_paket,
                'username' => request()->username,
                'keterangan' => request()->keterangan,
                'status_sewa' => 'Pending',
                'tanggal_pembelian' => request()->tgl,
                'gambar_sewa' => $gambarUrl, // Menggunakan URL gambar jika ada, jika tidak tetap null
            ];
            
            // Menyimpan data ke database
            $this->DataSewa->addData($data);
            return redirect()->route('penyewaan', ['username' => $username, 'alert' => 'success']);
        
    }

    
}