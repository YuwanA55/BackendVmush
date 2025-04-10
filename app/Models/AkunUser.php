<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class akunuser extends Model
{
    public function alldata(){
        return DB::table('akun_user')->get();
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


//      public function editakunuser($user){
//         return DB::table('data_user')->where('user', $user)->first();
//      }


//     public function addData($data){
//         return DB::table('data_user')->insert($data);
//       }

//     public function hapusdata($id){
//         DB::table('data_user')->where('user', $id)->delete();
//     }

//     protected $table = 'data_user';
//     protected $primaryKey = 'user';
// public $incrementing = false;
//     protected $fillable = [
//         'user',
//         'nama',
//         'email',
//         'nohp',
//         'pass',
//         'lokasi',
//         'level',
//         'tanggal_create',
//         'gambar',
//     ];

//     public $timestamps = false;

    
}
