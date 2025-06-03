<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Api\Permintaan;

class PermintaanController extends Controller
{
        public function __construct(){
        // $this ->ApiAkun = new ApiAkun();
        $this ->Permintaan = new Permintaan();
    }

    public function index(){
        $alldata = [
            'DataPermintaan'=>$this->Permintaan->alldata(),
        ];
        return response()->json($alldata);
    }

    public function showusername($user)
    {
        $data = $this->Permintaan->byekodeer($user);
    
        if (!$data) {
            return response()->json(['message' => 'Data permintaan not found'], 404);
        }
    
        return response()->json(['DataPermintaan' => $data], 200);
    }


        public function showuseridd($id_stok)
    {
        $data = $this->Permintaan->byekodeeeer($id_stok);
    
        if (!$data) {
            return response()->json(['message' => 'Data permintaan not found'], 404);
        }
    
        return response()->json(['DataPermintaan' => $data], 200);
    }

       public function store(Request $request)
    {
        try {
    
            $lastFirebase = Permintaan::max('id_stok');
            $newKodeFirebase = 'STK' . str_pad((int) substr($lastFirebase, 3) + 1, 4, '0', STR_PAD_LEFT);

            // Melanjutkan dengan menyimpan data produk kopi
            $Permintaan = new Permintaan();
            $Permintaan->id_stok = $newKodeFirebase;
            $Permintaan->username = $request->input('username');
            $Permintaan->jumlah_stok = $request->input('jumlah_stok');
            $Permintaan->alamat_permintaan = $request->input('alamat_permintaan');
            $Permintaan->status_permintaan = 'Pending';
            $Permintaan->tanggal_permintaan = now();
            $Permintaan->dibutuhkan = $request->input('dibutuhkan');
            $Permintaan->user = '';
            $Permintaan->save();
    
            return response()->json(['message' => 'Data Akun berhasil ditambah', 'data' => $Permintaan], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambahkan data Kopi: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function updatepermintaan(Request $request, $id_stok)
    {
        try {
            $Permintaan = Permintaan::where('id_stok', $id_stok)->firstOrFail();
            $Permintaan->status_permintaan = $request->input('status_permintaan');
            $Permintaan->save();

            return response()->json(['message' => 'Data Permintaan berhasil diupdate', 'DataPenjadwalan' => $Permintaan], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengupdate data: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

        // hapus data 
    public function deleteuser($username){
        $datafr = Permintaan::where('username', $username)->first();
        if (!$datafr) {
            return response()->json(['message' => 'Data Lahan not found'], 404);
        }

        $datafr->delete();

        return response()->json(['message' => 'Data Permintaan deleted']);
    }


        public function deleteid($id_stok){
        $datafr = Permintaan::where('id_stok', $id_stok)->first();
        if (!$datafr) {
            return response()->json(['message' => 'Data Lahan not found'], 404);
        }

        $datafr->delete();

        return response()->json(['message' => 'Data Permintaan deleted']);
    }

}