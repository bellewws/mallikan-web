<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    public  $table='tokos';
	protected $fillable = ['username_toko','name', 'id_user', 'id_kota', 'rata_rating', 'jml_transaksi_berhasil', 'jml_transaksi_gagal', 'foto_toko'];
	public function kota(){
        return $this->hasOne('App\City','city_id', 'id_kota');
    }
    public function user(){
        return $this->hasOne('App\User','id', 'id_user');
    }
}
