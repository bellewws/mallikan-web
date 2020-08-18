<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    public  $table='kategori_produks';
    protected $fillable = ['kategori', 'foto_kategori'];
}
