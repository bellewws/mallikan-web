<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori')->references('id')->on('kategoris');
            $table->integer('id_jenis')->references('id')->on('jenis_produks');
            $table->integer('id_toko')->references('id')->on('tokos');
            $table->integer('id_user')->references('id')->on('users');
            $table->string('deskripsi',255);
            $table->string('foto_produk');
            $table->integer('jumlah_stok');
            $table->integer('harga');
            $table->integer('terjual')->nullable();
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
        Schema::dropIfExists('produks');
    }
}
