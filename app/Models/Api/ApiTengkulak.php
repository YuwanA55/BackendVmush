<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ApiTengkulak extends Model
{

    public function alldata(){
        return DB::table('tengkulak')->get();
    }


    public function byekode($usertengku){
        return DB::table('tengkulak')->where('usertengku', $usertengku)->first();
    } 
    public function byekodeemail($email){
        return DB::table('tengkulak')->where('email', $email)->first();
    } 

    public function ubahdata($username, $data){
        DB::table('tengkulak')->where('username', $username)->update($data);
     }
    

    protected $table = 'tengkulak';
protected $primaryKey = 'id_tengku';
public $incrementing = false;
protected $fillable = [
    'id_tengku',
    'usertengku',
    'nama',
    'password',
    'pwasli',
    'alamat',
    'nohp',
    'status',
    'gambar',
    'tanggal_create',
];

    public $timestamps = false;

}