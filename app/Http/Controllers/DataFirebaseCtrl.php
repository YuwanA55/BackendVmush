<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\DataFirebase;
use App\Models\AkunUser;
use Illuminate\Support\Facades\Hash;

class DataFirebaseCtrl extends Controller
{
    
    public function __construct(){
        // auth
        // $this->middleware('auth');
        $this ->DataFire = new DataFirebase();
        $this ->Akun = new akunuser();
    }

    public function index(){
        // if(!session('login')){
        //     return redirect('/');
        // }else{
        $alldata = [
            'alldata'=>$this->DataFire->alldata(),
            'alluser'=>$this->Akun->alldata(),
        ];
        return view('Firebase.data', $alldata);
    // }
    }


    public function save(){
        // if(!session('login')){
        //     return redirect('/');
        // }else{
            Request()->validate([
                'id' => 'required|max:25',
                'id_user' => 'required|max:25',
                'Link' => 'required|max:250',
                'tanggal_create' => 'required|max:50',

    
            ],[
                'id.required' => 'id wajib diisi',
                'id_user.required' => 'id_user wajib diisi',
                'Link.required' => 'Link wajib diisi',
                'tanggal_create.required' => 'tanggal_create wajib diisi',
            ]);
    
            $data = [
                'id'=> request()->id,
                'id_user'=> request()->id_user,
                'Link'=> request()->Link,
                'tanggal_create'=> request()->tanggal_create,
            ];
    
            $this->DataFire->addData($data);
            return redirect()->route('datafirebase', ['alert' => 'success']);
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
        $firebase->id_user = $request->id_user;
        $firebase->Link = $request->Link;
        $firebase->save();
    
        // Kirim respons
        return response()->json(['success' => true, 'message' => 'Data firebase berhasil diupdate']);
    }
    
    
public function hapusData($id){
    // if(!session('login')){
    //     return redirect('/');
    // }else{
    $firebase = DataFirebase::where('id', $id)->first();

    if ($firebase) {
        try {
            // Hapus data lahan dari database
            $firebase->delete();

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
