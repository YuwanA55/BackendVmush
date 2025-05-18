<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
// use App\Models\DataFirebase;
use App\Models\DataBank;
use Illuminate\Support\Facades\Hash;

class BankController extends Controller
{
    
    public function __construct(){
        $this ->DataBank = new DataBank();
    }

    public function index(){
        $alldata = [
            'alldata'=>$this->DataBank->alldatad(),
        ];
        return view('bank.data', $alldata);
    }

    public function save(){

            Request()->validate([
                'nama' => 'required|max:255',
                'bank' => 'required|max:250',
                'norek' => 'required|max:250',
                'tanggal_create' => 'required|max:50',

    
            ],[
                'nama.required' => 'nama wajib diisi',
                'bank.required' => 'bank wajib diisi',
                'tanggal_create.required' => 'tanggal_create wajib diisi',
            ]);
    
            $data = [
                'nama'=> request()->nama,
                'bank'=> request()->bank,
                'norek'=> request()->norek,
                'tanggal_create'=> request()->tanggal_create,
            ];
    
            $this->DataBank->addData($data);
            return redirect()->route('databank', ['alert' => 'success']);
    // }
    }
    
    

    public function editfirebasee($id){
        // if(!session('login')){
        //     return redirect('/');
        // }else{
        $data = [
            'alluser'=>$this->Akun->alldata(),
            'main' => $this->DataFire->editfirebase($id),
        ];
        return view('Firebase.editdata', $data);
    // }
    }


    public function update(Request $request, $id){
        // Validasi data jika diperlukan
        $request->validate([
            // Tambahkan aturan validasi di sini sesuai kebutuhan Anda
        ]);
    
        // Cari data lahan berdasarkan kode_lahan
        $firebase = DataFirebase::where('id', $id)->first();
    
        // Periksa apakah data lahan ditemukan
        if (!$firebase) {
            return response()->json(['success' => false, 'message' => 'Data firebase tidak ditemukan']);
        }
    
        // Update data firebase
        $firebase->id = $request->id;
        $firebase->username = $request->username;
        $firebase->Link = $request->Link;
        $firebase->save();
    
        // Kirim respons
        return response()->json(['success' => true, 'message' => 'Data firebase berhasil diupdate']);
    }
    
    
public function hapusData($id){
    $DataBank = DataBank::where('id', $id)->first();

    if ($DataBank) {
        try {
            // Hapus data lahan dari database
            $DataBank->delete();

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
