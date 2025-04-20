<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\DataPaket;
use App\Models\AkunUser;
use App\Models\Pembelian;
use Illuminate\Support\Facades\Hash;

class PembelianController extends Controller
{
    
    public function __construct(){
        // auth
        // $this->middleware('auth');
        $this ->DataPBL = new Pembelian();
        $this ->DataPaket = new DataPaket();
        $this ->Akun = new akunuser();
    }

    public function index(){
        // if(!session('login')){
        //     return redirect('/');
        // }else{
        $alldata = [
            'alldata'=>$this->DataPBL->alldata(),
            'alluser'=>$this->Akun->alldata(),
            'allpaket'=>$this->DataPaket->alldata(),
        ];
        return view('Pembelian.data', $alldata);
    // }
    }


    public function save(){
        // if(!session('login')){
        //     return redirect('/');
        // }else{
            Request()->validate([
                'id' => 'required|max:25',
                'id_paket' => 'required|max:255',
                'username' => 'required|max:255',
                'tanggal_create' => 'required|max:50',

    
            ],[
                'id.required' => 'id wajib diisi',
                'id_paket.required' => 'id_paket wajib diisi',
                'username.required' => 'username wajib diisi',
                'tanggal_create.required' => 'tanggal_create wajib diisi',
            ]);
    
            $data = [
                'id'=> request()->id,
                'id_paket'=> request()->id_paket,
                'username'=> request()->username,
                'tanggal'=> request()->tanggal_create,
            ];
    
            $this->DataPBL->addData($data);
            return redirect()->route('datapembelian', ['alert' => 'success']);
    // }
    }
    
    

    public function editpembelian($id){
        // if(!session('login')){
        //     return redirect('/');
        // }else{
        $data = [
            'alluser'=>$this->Akun->alldata(),
            'allpaket'=>$this->DataPaket->alldata(),
            'main' => $this->DataPBL->editpembelian($id),
        ];
        return view('Pembelian.edit', $data);
    // }
    }


    public function update(Request $request, $id){
        // Validasi data jika diperlukan
        $request->validate([
            // Tambahkan aturan validasi di sini sesuai kebutuhan Anda
        ]);
    
        // Cari data lahan berdasarkan kode_lahan
        $Pembelian = Pembelian::where('id', $id)->first();
    
        // Periksa apakah data lahan ditemukan
        if (!$Pembelian) {
            return response()->json(['success' => false, 'message' => 'Data Pembelian tidak ditemukan']);
        }
    
        // Update data Pembelian
        $Pembelian->id = $request->id;
        $Pembelian->username = $request->username;
        $Pembelian->id_paket = $request->paket;
        $Pembelian->save();
    
        // Kirim respons
        return response()->json(['success' => true, 'message' => 'Data Pembelian berhasil diupdate']);
    }
    
    
public function hapusData($id){
    // if(!session('login')){
    //     return redirect('/');
    // }else{
    $DataPBL = Pembelian::where('id', $id)->first();

    if ($DataPBL) {
        try {
            // Hapus data lahan dari database
            $DataPBL->delete();

            return response()->json(['success' => true, 'message' => 'Data berhasil dihapus!']);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => 'Data tidak dapat dihapus karena berelasi dengan Data Akun!']);
        }
    } else {
        return response()->json(['error' => true, 'message' => 'Data tidak ditemukan!']);
    }
// }
}
 
    
}
