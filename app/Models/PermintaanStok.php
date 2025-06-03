<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PermintaanStok extends Model
{
        public function alldataddd(){
        return DB::table('permintaan_stok')->get();
    }

    public function alldatap(){
        return DB::table('permintaan_stok')
        ->where('permintaan_stok.status_permintaan', 'Pending')
        ->get();
    }

    public function alldata(){ 
        return DB::table('permintaan_stok')
            ->join('akun_user', 'permintaan_stok.username', '=', 'akun_user.username')
            ->join('paket', 'permintaan_stok.id_paket', '=', 'paket.id_paket')
            ->select('permintaan_stok.*', 'akun_user.nama','paket.nama_paket')
            ->get();
    }
    

        public function alldatad(){
        return DB::table('penyewaan')
        ->join('akun_user', 'penyewaan.username', '=', 'akun_user.username')
        ->join('paket', 'penyewaan.id_paket', '=', 'paket.id_paket')
        ->where('permintaan_stok.id_stok', $id_stok)
        ->get();
    }


    public function editfipaketfr($id_stok){
    return DB::table('permintaan_stok')
    ->join('akun_user', 'permintaan_stok.username', '=', 'akun_user.username')
    ->select('permintaan_stok.*', 'akun_user.nama', 'akun_user.nohp')
    ->where('permintaan_stok.id_stok', $id_stok)
    ->first();
}

//     public function datadb(){
//         return DB::table('data_user')->where('level', '<>', 'admin')->get();
//     }

//     public function authlogin($user){
//         return DB::table('data_user')->where('user',$user)->first();
//     }

    public function editstokk($id_stok){
        return DB::table('permintaan_stok')->where('id_stok', $id_stok)->first();
     }


public function editpermintaan_stok($id){
    return DB::table('permintaan_stok')
        ->join('akun_user', 'permintaan_stok.username', '=', 'akun_user.username')
        ->join('paket', 'permintaan_stok.id_paket', '=', 'paket.id_paket')
        ->select('permintaan_stok.*', 'akun_user.nama', 'paket.nama_paket')
        ->where('permintaan_stok.id', $id)
        ->first();
}



public function addData($data)
{
    $inserted = DB::table('permintaan_stok')->insert($data);
    return $inserted; // Mengembalikan true jika berhasil, false jika gagal
}


    public function hapusdata($id){
        DB::table('permintaan_stok')->where('id', $id)->delete();
    }

    protected $table = 'permintaan_stok';
    protected $primaryKey = 'id_stok';
public $incrementing = false;
    protected $fillable = [
        'id_stok',
        'username',
        'jumlah_stok',
        'alamat_permintaan',
        'status_permintaan',
        'tanggal_permintaan',
        'dibutuhkan',
        'user'
    ];

    protected $casts = [
        // BENAR: ini adalah tanggal & waktu permintaan dibuat
        'tanggal_permintaan' => 'datetime', 
        
        // DIPERBAIKI: ini hanya tanggal kapan barang dibutuhkan
        'dibutuhkan'         => 'date',     
    ];

    public $timestamps = false;

    
}
