<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataPaket extends Model
{
    public function alldata(){ 
        return DB::table('paket')->get();
    }


//     public function datadb(){
//         return DB::table('data_user')->where('level', '<>', 'admin')->get();
//     }

//     public function authlogin($user){
//         return DB::table('data_user')->where('user',$user)->first();
//     }

//     public function detailadmin($user){
//         return DB::table('data_user')->where('user', $user)->first();
//      }


// public function editfirebase($id){
//     return DB::table('firebase')
//         ->join('akun_user', 'firebase.id_user', '=', 'akun_user.id_user')
//         ->select('firebase.*', 'akun_user.nama')
//         ->where('firebase.id', $id)
//         ->first();
// }



    public function addData($data){
        return DB::table('paket')->insert($data);
      }

    public function hapusdata($id){
        DB::table('paket')->where('id', $id)->delete();
    }

    protected $table = 'paket';
    protected $primaryKey = 'id_paket';
public $incrementing = false;
    protected $fillable = [
        'id_paket',
        'nama_paket',
        'harga',
        'jumlah_sensor',
        'kontrol_app',
        'support',
        'analisisdata',
        'konsultasi',
        'gambar',
    ];

    public $timestamps = false;

    
}
