<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paket extends Model
{

    public function alldata(){
        return DB::table('paket')->get();
    }


    public function byekode($id_paket){
        return DB::table('paket')->where('id_paket', $id_paket)->get(); // ambil semua data
    }    
    

    protected $table = 'paket';
    protected $primaryKey = 'id_paket';
public $incrementing = false;
    protected $fillable = [
        'id_paket',
        'nama_paket',
        'harga',
        'jumlah_sensor',
        'kontrol_app',
        'support',
        'analisisdata',
        'konsultasi',
        'gambar',
    ];

    public $timestamps = false;


}