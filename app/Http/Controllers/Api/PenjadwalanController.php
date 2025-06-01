<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Api\Penjadwalan;

class PenjadwalanController extends Controller
{
    public function __construct(){
        // $this ->ApiAkun = new ApiAkun();
        $this ->Penjadwalan = new Penjadwalan();
    }

    public function index(){
        $alldata = [
            'DataPenjadwalan'=>$this->Penjadwalan->alldata(),
        ];
        return response()->json($alldata);
    }

    public function showid($username)
    {
        $data = $this->Penjadwalan->byekode($username);
    
        if (!$data) {
            return response()->json(['message' => 'Data Lahan not found'], 404);
        }
    
        return response()->json(['DataPenjadwalan' => $data], 200);
    }

    public function showtanggal($username, $tanggal)
    {
        $data = $this->Penjadwalan->byekodeer($username, $tanggal);
    
        if (!$data) {
            return response()->json(['message' => 'Data Lahan not found'], 404);
        }
    
        return response()->json(['DataPenjadwalan' => $data], 200);
    }

    public function showidd($id)
    {
        $dataa = $this->Penjadwalan->byekodee($id);
    
        if (!$dataa) {
            return response()->json(['message' => 'Data Lahan not found'], 404);
        }
    
        return response()->json(['data' => $dataa], 200);
    }
    


    public function store(Request $request)
    {
        try {
            // Membuat kode lahan secara otomatis
            $lastpenjadwalan = Penjadwalan::max('id_penjadwalan');
            $newKodepenjadwalan = 'JDW' . str_pad((int) substr($lastpenjadwalan, 3) + 1, 4, '0', STR_PAD_LEFT);
            // Melanjutkan dengan menyimpan data Firebase
            $penjadwalan = new Penjadwalan();
            $penjadwalan->id_penjadwalan = $newKodepenjadwalan;
            $penjadwalan->username = $request->input('username');
            $penjadwalan->tanggal = $request->input('tanggal');
            $penjadwalan->keterangan = $request->input('keterangan');
            $penjadwalan->sub_keterangan = $request->input('sub_keterangan');
            $penjadwalan->save();
    
            return response()->json(['message' => 'Data penjadwalan berhasil ditambah', 'DataPenjadwalan' => $penjadwalan], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambahkan data id_penjadwalan: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function updatee(Request $request, $id_penjadwalan)
    {
        try {
            $penjadwalan = Penjadwalan::where('id_penjadwalan', $id_penjadwalan)->firstOrFail();
            $penjadwalan->username = $request->input('username');
            $penjadwalan->tanggal = $request->input('tanggal');
            $penjadwalan->keterangan = $request->input('keterangan');
            $penjadwalan->sub_keterangan = $request->input('sub_keterangan');
            $penjadwalan->save();

            return response()->json(['message' => 'Data Penjadwalan berhasil diupdate', 'DataPenjadwalan' => $penjadwalan], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengupdate data: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateeuser(Request $request, $username)
    {
        try {
            $penjadwalanuser = Penjadwalan::where('username', $username)->firstOrFail();
            $penjadwalanuser->username = $request->input('username');
            $penjadwalanuser->tanggal = $request->input('tanggal');
            $penjadwalanuser->keterangan = $request->input('keterangan');
            $penjadwalanuser->sub_keterangan = $request->input('sub_keterangan');
            $penjadwalanuser->save();

            return response()->json(['message' => 'Data Penjadwalan berhasil diupdate', 'DataPenjadwalan' => $penjadwalanuser], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengupdate data: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // hapus data 
    public function delete($id_penjadwalan){
        $datajadwalan = Penjadwalan::where('id_penjadwalan', $id_penjadwalan)->first();
        if (!$datajadwalan) {
            return response()->json(['message' => 'Data Lahan not found'], 404);
        }

        $datajadwalan->delete();

        return response()->json(['message' => 'Data Penjadwalan Telah Dihapus']);
    }

}