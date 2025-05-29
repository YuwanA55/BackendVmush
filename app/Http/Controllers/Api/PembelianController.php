<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Api\Pembelian;

class PembelianController extends Controller
{
    public function __construct(){
        // $this ->ApiAkun = new ApiAkun();
        $this ->Pembelian = new Pembelian();
    }

    public function index(){
        $alldata = [
            'Data Link Firebase'=>$this->Pembelian->alldata(),
        ];
        return response()->json($alldata);
    }

    public function showid($username)
    {
        $data = $this->Pembelian->byekode($username);
    
        if (!$data) {
            return response()->json(['message' => 'Data Lahan not found'], 404);
        }
    
        return response()->json(['data' => $data], 200);
    }

    public function showidd($id)
    {
        $dataa = $this->Pembelian->byekodee($id);
    
        if (!$dataa) {
            return response()->json(['message' => 'Data Lahan not found'], 404);
        }
    
        return response()->json(['data' => $dataa], 200);
    }
    


    public function store(Request $request)
    {
        try {
            // Membuat kode lahan secara otomatis
            $lastFirebase = Pembelian::max('id');
            $newKodeFirebase = 'PBL' . str_pad((int) substr($lastFirebase, 3) + 1, 4, '0', STR_PAD_LEFT);
            // Melanjutkan dengan menyimpan data Firebase
            $Pembelian = new Pembelian();
            $Pembelian->id = $newKodeFirebase;
            $Pembelian->id_paket = $request->input('id_paket');
            $Pembelian->username = $request->input('username');
            $Pembelian->status = '';
            $Pembelian->tanggal = now();
            $Pembelian->save();
    
            return response()->json(['message' => 'Data Pembelian berhasil ditambah', 'data' => $Pembelian], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambahkan data Link Firebase: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function updatee(Request $request, $id)
    {
        try {
            $Pembelian = Pembelian::where('id', $id)->firstOrFail();
            $Pembelian->id_paket = $request->input('id_paket');
            $Pembelian->username = $request->input('username');
            $Pembelian->status = '';
            $Pembelian->save();

            return response()->json(['message' => 'Data Pembelian berhasil diupdate', 'data' => $Pembelian], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengupdate data: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // hapus data 
    public function delete($id){
        $datapem = Pembelian::where('id', $id)->first();
        if (!$datapem) {
            return response()->json(['message' => 'Data Lahan not found'], 404);
        }

        $datapem->delete();

        return response()->json(['message' => 'Data Pembelian Telah Dihapus']);
    }

}