<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\DataPaket;
use Illuminate\Support\Facades\Hash;

class PaketController extends Controller
{
    public function __construct(){
        // auth
        // $this->middleware('auth');
        $this ->DataPaket = new DataPaket();
    }

    public function index(){
        // if(!session('login')){
        //     return redirect('/');
        // }else{
        $alldata = [
            'alldata'=>$this->DataPaket->alldata(),
        ];
        return view('Paket.data', $alldata);
    // }
    }

    public function save(){
        // if(!session('login')){
        //     return redirect('/');
        // }else{
            Request()->validate([
                'id_paket' => 'required|max:25',
                'nama_paket' => 'required|max:255',
                'harga' => 'required|max:250',
                'jumlah_sensor' => '',
                'kontrol_app' => '',
                'support' => '',
                'analisisdata' => '',
                'konsultasi' => '',

    
            ],[
                'id_paket.required' => 'id wajib diisi',
                'nama_paket.required' => 'nama_paket wajib diisi',
                'harga.required' => 'harga wajib diisi',
                'jumlah_sensor.required' => 'jumlah_sensor wajib diisi',
                'kontrol_app.required' => 'kontrol_app wajib diisi',
                'support.required' => 'support wajib diisi',
                'analisisdata.required' => 'analisisdata wajib diisi',
                'konsultasi.required' => 'konsultasi wajib diisi',
            ]);
    
            $data = [
                'id_paket'=> request()->id_paket,
                'nama_paket'=> request()->nama_paket,
                'harga'=> request()->harga,
                'jumlah_sensor'=> request()->jumlah_sensor,
                'kontrol_app'=> request()->kontrol_app,
                'support'=> request()->support,
                'analisisdata'=> request()->analisisdata,
                'konsultasi'=> request()->konsultasi,
            ];
    
            $this->DataPaket->addData($data);
            return redirect()->route('datapaket', ['alert' => 'success']);
    // }
    }

    public function hapusData($id_paket){
        // if(!session('login')){
        //     return redirect('/');
        // }else{
        $DataPaket = DataPaket::where('id_paket', $id_paket)->first();
    
        if ($DataPaket) {
            try {
                // Hapus data lahan dari database
                $DataPaket->delete();
    
                return response()->json(['success' => true, 'message' => 'Data berhasil dihapus!']);
            } catch (\Exception $e) {
                return response()->json(['error' => true, 'message' => 'Data tidak dapat dihapus karena berelasi dengan Data Pembelian!']);
            }
        } else {
            return response()->json(['error' => true, 'message' => 'Data tidak ditemukan!']);
        }
    // }
    }
     

    
}