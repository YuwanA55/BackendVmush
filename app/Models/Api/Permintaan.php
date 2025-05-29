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

public function byekodeer($usertengku)
{
    return DB::table('permintaan_stok')
        ->join('tengkulak', 'permintaan_stok.usertengku', '=', 'tengkulak.usertengku')
        ->select(
            'permintaan_stok.usertengku',
            'tengkulak.nama',
            'permintaan_stok.jumlah_stok', // Alias untuk jumlah_stok
            'tengkulak.alamat',
            'tengkulak.nohp',
            'tengkulak.gambar',
            'permintaan_stok.tanggal'
        )
        ->where('permintaan_stok.usertengku', $usertengku)
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
        'usertengku',
        'jumlah_stok',
        'alamat_permintaan',
        'status',
        'tanggal',
    ];

    public $timestamps = false;

}