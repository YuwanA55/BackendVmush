<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\DataPaket;
use App\Models\DataBank;
use App\Models\DataSewa;
use App\Models\PermintaanStok;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
      public function __construct(){
        $this ->DataPaket = new DataPaket();
        $this ->DataBank = new DataBank();
        $this ->DataSewa = new DataSewa();
        $this ->PermintaanStok = new PermintaanStok();
    }

    public function index(){
       $alldata = [
        'alldata'=>$this->DataPaket->alldata(),
        't_stok'=>$this->PermintaanStok->alldataddd(),
        't_stokPending'=>$this->PermintaanStok->alldatap(),
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


public function permintaanjamur()
    {
        if (!session('login')) {
            session(['url.intended' => url()->current()]);
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (session('status') !== 'Tengkulak') {
            abort(404);
        }

        // Fetch permintaan_stok data for the logged-in user
        $permintaan = DB::select("SELECT * FROM permintaan_stok WHERE username = ?", [session('username')]);
        \Log::info('Permintaan data: ', (array)$permintaan); // Debug log

        return view('tengkulak.reqtengkulak', ['permintaan' => $permintaan]);
    }


public function savepermintaan(){  
    // Validasi data
    Request()->validate([
        'id_stok' => 'required|max:25',
        'username' => 'required|max:255',
        'jumlah' => 'required|numeric|min:1',
        'dibutuhkan' => 'required|min:1',
        'alamat' => 'required|max:255',
        'tgl' => 'required|date',
    ], [
        'id_stok.required' => 'ID stok wajib diisi',
        'username.required' => 'Username wajib diisi',
        'alamat.required' => 'Alamat wajib diisi',
        'tgl.required' => 'Tanggal wajib diisi',
        'tgl.date' => 'Format tanggal tidak valid',
    ]);

    // Siapkan data untuk disimpan
    $data = [
        'id_stok' => request()->id_stok,
        'username' => request()->username,
        'jumlah_stok' => request()->jumlah,
        'alamat_permintaan' => request()->alamat,
        'status_permintaan' => 'Tersedia',
        'tanggal_permintaan' => request()->tgl,
        'dibutuhkan' => request()->dibutuhkan,
    ];
            
    $this->PermintaanStok->addData($data);
    return redirect()->route('permintaanjamur', ['alert' => 'success']);
}


public function hapusData($id_stok){

        $PermintaanStok = PermintaanStok::where('id_stok', $id_stok)->first();
    
        if ($PermintaanStok) {
            try {
                // Hapus data lahan dari database
                $PermintaanStok->delete();
    
                return response()->json(['success' => true, 'message' => 'Data berhasil dihapus!']);
            } catch (\Exception $e) {
                return response()->json(['error' => true, 'message' => 'Data tidak dapat dihapus karena berelasi dengan Data Pembelian!']);
            }
        } else {
            return response()->json(['error' => true, 'message' => 'Data tidak ditemukan!']);
        }
    // }
    }


    public function editjamurr($id_stok){
       $data = [
            'main'=>$this->PermintaanStok->editstokk($id_stok),
        ];

    return view('tengkulak.edittengkulak', $data);

}
    
}