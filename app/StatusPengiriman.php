<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPengiriman extends Model
{
    public  $table='status_pengirimans';
    protected $fillable = ['status'];
}
