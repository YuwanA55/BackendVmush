<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class akunuser extends Model
{
    public function alldatad(){
        return DB::table('akun_user')->get();
    }


    public function alldata(){
        return DB::table('akun_user')->where('status', '<>', 'Admin')->get();
    }

    public function authlogin($username){
        return DB::table('akun_user')->where('username',$username)->first();
    }

//     public function detailadmin($user){
//         return DB::table('data_user')->where('user', $user)->first();
//      }


//      public function editakunuser($user){
//         return DB::table('data_user')->where('user', $user)->first();
//      }


    public function addData($data){
        return DB::table('akun_user')->insert($data);
      }

//     public function hapusdata($id){
//         DB::table('data_user')->where('user', $id)->delete();
//     }

    protected $table = 'akun_user';
    protected $primaryKey = 'username';
public $incrementing = false;
    protected $fillable = [
        'username',
        'nama',
        'email',
        'password',
        'pwasli',
        'status',
        'nohp',
        'alamat',
        'status',
        'tanggal_create',
        'gambar',
    ];

    public $timestamps = false;

    
}
