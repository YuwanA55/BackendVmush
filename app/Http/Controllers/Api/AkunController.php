<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Api\ApiAkun;

class AkunController extends Controller
{
    public function __construct(){
        $this ->ApiAkun = new ApiAkun();
    }

    public function index(){
        $alldata = [
            'Data Akun'=>$this->ApiAkun->alldata(),
        ];
        return response()->json($alldata);
    }

    public function showid($username){

        $datakunn = [
            $this->ApiAkun->byekode($username),
        ];
        if (!$datakunn) {
            return response()->json(['message' => 'Data email not found'], 404);
        }
        return response()->json($datakunn);
    }

    public function showemail($email){

        $datakunn = [
            $this->ApiAkun->byekodeemail($email),
        ];
        if (!$datakunn) {
            return response()->json(['message' => 'Data email not found'], 404);
        }
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
            $ApiAkun = new ApiAkun();
            $ApiAkun->username = $request->input('username');
            $ApiAkun->nama = $request->input('nama');
            $ApiAkun->email = $request->input('email');
            $ApiAkun->password = Hash::make($request->input('password'));
            $ApiAkun->pwasli = $request->input('password');
            $ApiAkun->status = $request->input('status');
            $ApiAkun->gambar = $gambarUrl;
            $ApiAkun->alamat = $request->input('alamat');
            $ApiAkun->nohp = $request->input('nohp');
            $ApiAkun->tanggal_create = now();
            $ApiAkun->status_akun = "Aktif";
            $ApiAkun->save();
    
            return response()->json(['message' => 'Data Akun berhasil ditambah', 'data' => $ApiAkun], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambahkan data Kopi: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


        // edit
        public function updatee(Request $request, $username)
        {
            try {
                // Temukan data pengguna berdasarkan user
                $ApiAkun = ApiAkun::where('username', $username)->first();
        
                // Simpan path gambar lama untuk nantinya dihapus (jika ada)
                $gambarLamaPath = public_path('GambarProfile/' . basename($ApiAkun->gambar));
        
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
                    $ApiAkun->gambar = asset('GambarProfile/' . $namaGambarBaru);
                }
        
                // Update data pengguna dengan data yang diterima dari request
                $ApiAkun->username = $request->input('username');
                $ApiAkun->nama = $request->input('nama');
                $ApiAkun->email = $request->input('email');
                $ApiAkun->password = $request->input('password');
                $ApiAkun->status = $request->input('status');
                $ApiAkun->alamat = $request->input('alamat');
                $ApiAkun->nohp = $request->input('nohp');
                $ApiAkun->status_akun = "Aktif";
                $ApiAkun->save();
        
                return response()->json(['message' => 'Data Pengguna berhasil diupdate', 'data' => $ApiAkun], Response::HTTP_OK);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Gagal mengupdate data pengguna: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

            // hapus
    public function delete($username){
        try {
            // Temukan data pengguna berdasarkan ID
            $ApiAkun = ApiAkun::findOrFail($username);
    
            // Hapus gambar dari folder dataprofile
            $gambarPath = public_path('GambarProfile/' . basename($ApiAkun->gambar));
            if (file_exists($gambarPath)) {
                unlink($gambarPath); // Hapus file gambar jika ada
            }
    
            // Hapus data pengguna dari database
            $ApiAkun->delete();
    
            return response()->json(['message' => 'Data Pengguna berhasil dihapus'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus data pengguna tidak ada: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}