<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ApiAkun extends Model
{

    public function alldata(){
        return DB::table('akun_user')->get();
    }

    // public function showpere($kode_peremajaan){
    //     return DB::table('data_kopi')->where('kode_peremajaan', $kode_peremajaan)->get();
    // } 
    
    // public function kopiuser($user) {
    //     return DB::table('data_kopi')
    //         ->join('data_peremajaan', 'data_kopi.kode_peremajaan', '=', 'data_peremajaan.kode_peremajaan')
    //         ->join('data_lahan', 'data_peremajaan.kode_lahan', '=', 'data_lahan.kode_lahan')
    //         ->join('data_user', 'data_lahan.user', '=', 'data_user.user')
    //         ->where('data_user.user', $user)
    //         ->select('data_kopi.*', 'data_peremajaan.*', 'data_lahan.*', 'data_user.*')
    //         ->get();
    // }


    public function byekode($id_user){
        return DB::table('akun_user')->where('id_user', $id_user)->first();
    } 
    public function byekodeemail($email){
        return DB::table('akun_user')->where('email', $email)->first();
    } 

    public function ubahdata($id_user, $data){
        DB::table('akun_user')->where('id_user', $id_user)->update($data);
     }
    
    // public function ubahdata($user, $data){
    //     DB::table('data_kopi')->where('user', $user)->update($data);
    //  }

    protected $table = 'akun_user';
    protected $primaryKey = 'id_user';
public $incrementing = false;
    protected $fillable = [
        'id_user',
        'nama',
        'email',
        'password',
        'status',
        'gambar',
        'alamat',
        'nohp',
        'tanggal_create',
        'status_akun',
    ];

    public $timestamps = false;

}