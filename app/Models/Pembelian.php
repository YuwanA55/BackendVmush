<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pembelian extends Model
{
    public function alldata(){ 
        return DB::table('pembelian')
            ->join('akun_user', 'pembelian.username', '=', 'akun_user.username')
            ->join('paket', 'pembelian.id_paket', '=', 'paket.id_paket')
            ->select('pembelian.*', 'akun_user.nama','paket.nama_paket')
            ->get();
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


public function editpembelian($id){
    return DB::table('pembelian')
        ->join('akun_user', 'pembelian.username', '=', 'akun_user.username')
        ->join('paket', 'pembelian.id_paket', '=', 'paket.id_paket')
        ->select('pembelian.*', 'akun_user.nama', 'paket.nama_paket')
        ->where('pembelian.id', $id)
        ->first();
}



    public function addData($data){
        return DB::table('pembelian')->insert($data);
      }

    public function hapusdata($id){
        DB::table('pembelian')->where('id', $id)->delete();
    }

    protected $table = 'pembelian';
    protected $primaryKey = 'id';
public $incrementing = false;
    protected $fillable = [
        'id',
        'id_paket',
        'username',
        'status',
        'tanggal',
    ];

    public $timestamps = false;

    
}
