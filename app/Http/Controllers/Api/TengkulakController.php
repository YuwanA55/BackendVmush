<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Api\ApiTengkulak;
// use App\Models\Api\ApiTengkulak;
// use App\Http\Controllers\Api\Hash;
use Illuminate\Support\Facades\Hash;


class TengkulakController extends Controller
{
    public function __construct(){
        // $this ->ApiTengkulak = new ApiTengkulak();
         $this ->ApiTengkulak = new ApiTengkulak();
    }

        public function index(){
        $alldata = [
            'DataAkun'=>$this->ApiTengkulak->alldata(),
        ];
        return response()->json($alldata);
    }

public function showid($username){
    $data = $this->ApiTengkulak->byekode($username);

    if (!$data) {
        return response()->json(['message' => 'Data email not found'], 404);
    }

    $datakunn = [
        'DataAkun' => [$data], // Wrap the result in an array
    ];
    
    return response()->json($datakunn);
}
  

public function showemail($email){
    $data = $this->ApiTengkulak->byekodeemail($email);

    if (!$data) {
        return response()->json(['message' => 'Data email not found'], 404);
    }

    $datakunn = [
        'DataAkun' => [$data], // Wrap the result in an array
    ];
    
    return response()->json($datakunn);
}

    public function store(Request $request)
    {
        try {
            $gambarUrl = ''; 
        
            // Cek apakah ada file gambar yang diunggah
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar'); // Mengambil file gambar dari request
                $ekstensi = $gambar->getClientOriginalExtension();
                // Membuat nama file yang unik dengan menambahkan tanggal saat ini (tahun-bulan-hari)
                $namaGambar = date('Ymd') . '_' . uniqid() . '.' . $ekstensi;
                $gambar->move(public_path('GambarProfile/'), $namaGambar); // Memindahkan file gambar ke folder yang ditentukan
                $gambarUrl = asset('GambarProfile/' . $namaGambar); // Menghasilkan URL gambar
            }
    
            // Melanjutkan dengan menyimpan data produk kopi
            $ApiTengkulak = new ApiTengkulak();
            $ApiTengkulak->username = $request->input('username');
            $ApiTengkulak->nama = $request->input('nama');
            $ApiTengkulak->email = $request->input('email');
            $ApiTengkulak->password = Hash::make($request->input('password'));
            $ApiTengkulak->pwasli = $request->input('password');
            $ApiTengkulak->status = 'Tengkulak';
            $ApiTengkulak->gambar = $gambarUrl;
            $ApiTengkulak->alamat = $request->input('alamat');
            $ApiTengkulak->nohp = $request->input('nohp');
            $ApiTengkulak->tanggal_create = now();
            $ApiTengkulak->status_akun = "Aktif";
            $ApiTengkulak->save();
    
            return response()->json(['message' => 'Data Akun berhasil ditambah', 'data' => $ApiTengkulak], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambahkan data Kopi: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


        // edit
        public function updatee(Request $request, $username)
        {
            try {
                // Temukan data pengguna berdasarkan user
                $ApiTengkulak = ApiTengkulak::where('username', $username)->first();
        
                // Simpan path gambar lama untuk nantinya dihapus (jika ada)
                $gambarLamaPath = public_path('GambarProfile/' . basename($ApiTengkulak->gambar));
        
                // Periksa apakah ada gambar baru yang diunggah
                if ($request->hasFile('gambar')) {
                    // Jika ada, hapus gambar lama jika ada
                    if (file_exists($gambarLamaPath)) {
                        unlink($gambarLamaPath); // Hapus file gambar lama
                    }
        
                    // Menghasilkan nama unik untuk gambar baru
                    $namaGambarBaru = time() . '_' . Str::random(10) . '.' . $request->file('gambar')->getClientOriginalExtension();
        
                    // Menyimpan gambar baru ke dalam folder dataprofile
                    $request->file('gambar')->move(public_path('GambarProfile'), $namaGambarBaru);
        
                    // Simpan path gambar baru
                    $ApiTengkulak->gambar = asset('GambarProfile/' . $namaGambarBaru);
                }
        
                // Update data pengguna dengan data yang diterima dari request
                $ApiTengkulak->username = $request->input('username');
                $ApiTengkulak->nama = $request->input('nama');
                $ApiTengkulak->email = $request->input('email');
                $ApiTengkulak->password = $request->input('password');
                $ApiTengkulak->status = 'Tengkulak';
                $ApiTengkulak->alamat = $request->input('alamat');
                $ApiTengkulak->nohp = $request->input('nohp');
                $ApiTengkulak->status_akun = "Aktif";
                $ApiTengkulak->save();
        
                return response()->json(['message' => 'Data Pengguna berhasil diupdate', 'data' => $ApiTengkulak], Response::HTTP_OK);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Gagal mengupdate data pengguna: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

            // hapus
    public function delete($username){
        try {
            // Temukan data pengguna berdasarkan ID
            $ApiTengkulak = ApiTengkulak::findOrFail($username);
    
            // Hapus gambar dari folder dataprofile
            $gambarPath = public_path('GambarProfile/' . basename($ApiTengkulak->gambar));
            if (file_exists($gambarPath)) {
                unlink($gambarPath); // Hapus file gambar jika ada
            }
    
            // Hapus data pengguna dari database
            $ApiTengkulak->delete();
    
            return response()->json(['message' => 'Data Pengguna berhasil dihapus'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus data pengguna tidak ada: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}