<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permintaan extends Model
{

    public function alldata(){
        return DB::table('permintaan_stok')->get();
    }


    public function byekode($username){
        return DB::table('permintaan_stok')->where('username', $username)->get(); // ambil semua data
    }

public function byekodeer($username)
{
    return DB::table('permintaan_stok')
        ->join('akun_user', 'permintaan_stok.username', '=', 'akun_user.username')
        ->select(
            'permintaan_stok.username',
            'permintaan_stok.alamat_permintaan',
            'akun_user.nama',
            'permintaan_stok.jumlah_stok', // Alias untuk jumlah_stok
            'akun_user.alamat',
            'akun_user.nohp',
            'akun_user.gambar',
            'permintaan_stok.tanggal_permintaan'
        )
        ->where('permintaan_stok.username', $username)
        ->get();
}

    public function byekodee($id){
        return DB::table('permintaan_stok')->where('id', $id)->get(); // ambil semua data
    }

    // public function byekodeemail($email){
    //     return DB::table('akun_user')->where('email', $email)->first();
    // } 

    // public function ubahdata($username, $data){
    //     DB::table('akun_user')->where('username', $username)->update($data);
    //  }
    

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

    public $timestamps = false;

}