<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinReg extends Model
{
    public  $table='linregs';
    protected $fillable=['id_produk','a','b','suku_awal','beda'];

    public function jenisproduk()
    {
        return $this->belongsTo(JenisProduk::class, 'id_produk', 'id');
    }
}
