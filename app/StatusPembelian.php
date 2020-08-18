<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPembelian extends Model
{
    public  $table='status_pembelians';
    protected $fillable = ['status'];
}
