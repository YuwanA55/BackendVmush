<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Penjadwalan extends Model
{

    public function alldata(){
        return DB::table('penjadwalan')->get();
    }


    public function byekode($username){
        return DB::table('penjadwalan')->where('username', $username)->get(); // ambil semua data
    }

        public function byekodeer($username, $tanggal){
        return DB::table('penjadwalan')
        ->where('username', $username)
        ->where('tanggal', $tanggal)
        ->get(); // ambil semua data
    }

    public function byekodee($id){
        return DB::table('penjadwalan')->where('id', $id)->get(); // ambil semua data
    }

    // public function byekodeemail($email){
    //     return DB::table('akun_user')->where('email', $email)->first();
    // } 

    // public function ubahdata($username, $data){
    //     DB::table('akun_user')->where('username', $username)->update($data);
    //  }
    

    protected $table = 'penjadwalan';
    protected $primaryKey = 'id_penjadwalan';
public $incrementing = false;
    protected $fillable = [
        'id_penjadwalan',
        'username',
        'tanggal',
        'keterangan',
        'sub_keterangan',
    ];

    public $timestamps = false;

}