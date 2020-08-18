<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    public  $table='kelurahans';
    protected $fillable = ['id_kecamatan', 'nama_kelurahan'];
	public function kecamatan(){
		return $this->belongsTo('App\Kecamatan', 'id_kecamatan');
	}
}
