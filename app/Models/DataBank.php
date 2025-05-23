<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataBank extends Model
{
    public function alldatad(){
        return DB::table('bank')->get();
    }

//     public function datadb(){
//         return DB::table('data_user')->where('level', '<>', 'admin')->get();
//     }

//     public function authlogin($user){
//         return DB::table('data_user')->where('user',$user)->first();
//     }

    public function detailbank($id_bank){
        return DB::table('bank')->where('id_bank', $id_bank)->first();
     }


// public function editbank($id){
//     return DB::table('bank')
//         ->join('akun_user', 'bank.username', '=', 'akun_user.username')
//         ->select('bank.*', 'akun_user.nama')
//         ->where('bank.id', $id)
//         ->first();
// }



    public function addData($data){
        return DB::table('bank')->insert($data);
      }

    public function hapusdata($id){
        DB::table('bank')->where('id', $id)->delete();
    }

    protected $table = 'bank';
    protected $primaryKey = 'id';
public $incrementing = false;
    protected $fillable = [
        'id',
        'nama',
        'bank',
        'norek',
        'tanggal_create',
    ];

    public $timestamps = false;

    
}
