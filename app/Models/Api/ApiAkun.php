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


    public function byekode($username){
        return DB::table('akun_user')->where('username', $username)->first();
    } 
    public function byekodeemail($email){
        return DB::table('akun_user')->where('email', $email)->first();
    } 

    public function ubahdata($username, $data){
        DB::table('akun_user')->where('username', $username)->update($data);
     }
    

    protected $table = 'akun_user';
    protected $primaryKey = 'username';
public $incrementing = false;
    protected $fillable = [
        'username',
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