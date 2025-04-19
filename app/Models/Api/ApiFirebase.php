<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ApiFirebase extends Model
{

    public function alldata(){
        return DB::table('firebase')->get();
    }


    public function byekode($username){
        return DB::table('firebase')->where('username', $username)->get(); // ambil semua data
    }    
    // public function byekodeemail($email){
    //     return DB::table('akun_user')->where('email', $email)->first();
    // } 

    // public function ubahdata($username, $data){
    //     DB::table('akun_user')->where('username', $username)->update($data);
    //  }
    

    protected $table = 'firebase';
    protected $primaryKey = 'id';
public $incrementing = false;
    protected $fillable = [
        'id',
        'username',
        'Link',
        'tanggal_create',
    ];

    public $timestamps = false;

}