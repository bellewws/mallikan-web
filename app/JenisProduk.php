<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisProduk extends Model
{
    public  $table='jenis_produks';
    protected $fillable = ['id_kategori', 'jenis', 'foto_jenis'];

    
    public function linreg()
    {
        return $this->hasMany('App\LinReg');
    }
}

