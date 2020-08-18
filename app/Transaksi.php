<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public  $table='transaksis';
	protected $fillable = ['id_user','id_toko', 'id_produk', 'id_jenis', 'id_kategori', 'id_status', 'id_alamat', 'kurir', 'subtotal', 'jumlah', 'resi_kurir', 'total_harga', 'biaya_ongkir', 'kirim_sekarang', 'rating', 'komentar'];
	public function user(){
        return $this->hasOne('App\User','id', 'id_user');
    }
    public function toko(){
        return $this->hasOne('App\Toko','id', 'id_toko');
    }
    public function produk(){
        return $this->hasOne('App\Produk','id', 'id_produk');
    }
    public function jenis(){
        return $this->hasOne('App\JenisProduk','id', 'id_jenis');
    }
    public function kategori(){
        return $this->hasOne('App\KategoriProduk','id', 'id_kategori');
    }
    public function status(){
        return $this->hasOne('App\StatusPembelian','id', 'id_status');
    }
    public function alamat(){
        return $this->hasOne('App\AlamatUser','id', 'id_alamat');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
