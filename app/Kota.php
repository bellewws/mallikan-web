<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    public  $table='kotas';
	protected $fillable = ['id_provinsi','id_kota','nama_kota'];
}
