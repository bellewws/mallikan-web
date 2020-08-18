<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public  $table='produks';
    protected $fillable = ['id_kategori','id_jenis', 'id_toko', 'id_user', 'deskripsi', 'foto_produk', 'jumlah_stok', 'harga', 'rating', 'terjual'];
    protected $appends = ['rating'];

    public function jenis(){
        return $this->hasOne('App\JenisProduk','id', 'id_jenis');
    }

    public function toko(){
        return $this->hasOne('App\Toko','id', 'id_toko');
    }

    public function transaksi() {
        return $this->hasMany('App\Transaksi', 'id_produk', 'id');
    }

    public function getRatingAttribute()
    {
        return $this->transaksi()->avg('rating') ?: 0;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
