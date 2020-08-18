<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'toko_id', 'transaksi_id', 'produk_id', 'parent_id', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toko()
    {
        return $this->hasOne('App\Toko','id', 'toko_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function transaksi(){
        return $this->hasOne('App\Transaksi','id', 'transaksi_id');
    }
}
