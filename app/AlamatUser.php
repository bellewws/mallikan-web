<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlamatUser extends Model
{
    public  $table='alamat_users';
	protected $fillable = ['id_user','id_provinces', 'id_cities', 'kecamatan', 'kelurahan', 'alamat', 'kodepos'];
	public function user(){
        return $this->hasOne('App\User','id', 'id_user');
    }
    public function provinces(){
        return $this->hasOne('App\Province','id', 'id_provinces');
    }
    public function cities(){
        return $this->hasOne('App\City','city_id', 'id_cities');
    }
}
