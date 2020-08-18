<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    public  $table='pembayarans';
    protected $fillable = ['nomor','foto'];
}
