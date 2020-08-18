<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    public  $table='kecamatans';
    protected $fillable = ['id_kota', 'nama_kecamatan'];
	public function kota(){
		return $this->belongsTo('App\Kota', 'id_kota', 'id');
	}
}
