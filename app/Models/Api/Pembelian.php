<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pembelian extends Model
{

    public function alldata(){
        return DB::table('pembelian')->get();
    }


    public function byekode($username){
        return DB::table('pembelian')->where('username', $username)->get(); // ambil semua data
    }

    public function byekodee($id){
        return DB::table('pembelian')->where('id', $id)->get(); // ambil semua data
    }

    // public function byekodeemail($email){
    //     return DB::table('akun_user')->where('email', $email)->first();
    // } 

    // public function ubahdata($username, $data){
    //     DB::table('akun_user')->where('username', $username)->update($data);
    //  }
    

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