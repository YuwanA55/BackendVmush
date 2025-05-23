<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataSewa extends Model
{
    public function alldatad(){
        return DB::table('penyewaan')
        ->join('akun_user', 'penyewaan.username', '=', 'akun_user.username')
        ->join('paket', 'penyewaan.id_paket', '=', 'paket.id_paket')
        ->get();
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


public function sewabyuser($id_sewa){
    return DB::table('penyewaan')
        ->join('akun_user', 'penyewaan.username', '=', 'akun_user.username')
        ->join('paket', 'penyewaan.id_paket', '=', 'paket.id_paket')
        ->where('penyewaan.id_sewa', $id_sewa) // Tambahkan nama tabel di sini
        ->first();
}

public function sewabyuserr($username){
    return DB::table('penyewaan')
        ->join('akun_user', 'penyewaan.username', '=', 'akun_user.username')
        ->join('paket', 'penyewaan.id_paket', '=', 'paket.id_paket')
        ->where('penyewaan.username', $username)
        ->get(); // Ganti first() dengan get()
}


    public function addData($data){
        return DB::table('penyewaan')->insert($data);
      }

//     public function hapusdata($id){
//         DB::table('data_user')->where('user', $id)->delete();
//     }

    protected $table = 'penyewaan';
    protected $primaryKey = 'id_sewa';
public $incrementing = false;
    protected $fillable = [
        'id_sewa',
        'id_paket',
        'username',
        'gambar_sewa',
        'tanggal_pembelian',
        'keterangan',
        'status_sewa',
        'tanggal_sewa',
        'tanggal_akhir',
    ];

    public $timestamps = false;

    
}
