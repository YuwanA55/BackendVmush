<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Api\Paket;
// use App\Models\Api\ApiFirebase;

class PaketController extends Controller
{
    public function __construct(){
        // $this ->ApiAkun = new ApiAkun();
        $this ->Paket = new Paket();
    }

    public function index(){
        $alldata = [
            'Data Link Firebase'=>$this->Paket->alldata(),
        ];
        return response()->json($alldata);
    }

    public function showid($id_paket)
    {
        $data = $this->Paket->byekode($id_paket);
    
        if (!$data) {
            return response()->json(['message' => 'Data Lahan not found'], 404);
        }
    
        return response()->json(['data' => $data], 200);
    }
    


    // public function store(Request $request)
    // {
    //     try {
    //         // Membuat kode lahan secara otomatis
    //         $lastFirebase = ApiFirebase::max('id');
    //         $newKodeFirebase = 'FRB' . str_pad((int) substr($lastFirebase, 3) + 1, 4, '0', STR_PAD_LEFT);
    //         // Melanjutkan dengan menyimpan data Firebase
    //         $ApiAkun = new ApiFirebase();
    //         $ApiAkun->id = $newKodeFirebase;
    //         $ApiAkun->username = $request->input('username');
    //         $ApiAkun->Link = $request->input('Link');
    //         $ApiAkun->tanggal_create = now();
    //         $ApiAkun->save();
    
    //         return response()->json(['message' => 'Data Akun berhasil ditambah', 'data' => $ApiAkun], Response::HTTP_CREATED);
    //     } catch (\Exception $e) {
    //         return response()->json(['message' => 'Gagal menambahkan data Link Firebase: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
    //     }
    // }


    // public function updatee(Request $request, $id)
    // {
    //     try {
    //         $ApiAkunn = ApiFirebase::where('id', $id)->firstOrFail();
            
    //         $ApiAkunn->username = $request->input('username');
    //         $ApiAkunn->Link = $request->input('Link');
    //         $ApiAkunn->save();

    //         return response()->json(['message' => 'Data Link Firebase berhasil diupdate', 'data' => $ApiAkunn], Response::HTTP_OK);
    //     } catch (\Exception $e) {
    //         return response()->json(['message' => 'Gagal mengupdate data: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
    //     }
    // }


    // hapus data 
    // public function delete($id){
    //     $datafr = ApiFirebase::where('id', $id)->first();
    //     if (!$datafr) {
    //         return response()->json(['message' => 'Data Lahan not found'], 404);
    //     }

    //     $datafr->delete();

    //     return response()->json(['message' => 'Data Link deleted']);
    // }

}