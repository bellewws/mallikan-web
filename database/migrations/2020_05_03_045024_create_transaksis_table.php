<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode')->nullable();
            $table->integer('id_user')->references('id')->on('users');
            $table->integer('id_toko')->references('id')->on('tokos');
            $table->integer('id_produk')->references('id')->on('produks');
            $table->integer('id_jenis')->references('id')->on('jenis_produks');
            $table->integer('id_kategori')->references('id')->on('kategori_produks');
            $table->integer('id_status')->references('id')->on('status_pembelians');
            $table->integer('id_alamat')->references('id')->on('alamat_users')->nullable();
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->boolean('kirim_sekarang')->nullable();
            $table->date('tgl_kirim')->nullable();
            // $table->string('jam_kirim')->nullable();
            $table->string('kurir')->nullable();
            $table->string('resi_kurir')->nullable();
            $table->integer('biaya_ongkir')->nullable();
            $table->integer('total_harga');
            $table->integer('rating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
