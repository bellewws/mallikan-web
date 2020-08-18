<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrediksiHarga extends Model
{
    public  $table='prediksi_harga';
    protected $fillable=['id_produk','harga_produk','tanggal_harga'];

    public function jenisproduk()
    {
        return $this->belongsTo(JenisProduk::class, 'id_produk', 'id');
    }
}
