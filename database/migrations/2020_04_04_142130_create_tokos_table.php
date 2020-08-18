<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username_toko')->unique();
            $table->string('name');
            $table->string('foto_toko')->nullable();
            $table->integer('id_user')->references('id')->on('users');
            $table->integer('id_kota')->references('id')->on('cities');
            $table->integer('rata_rating');
            $table->integer('jml_transaksi_berhasil');
            $table->integer('jml_transaksi_batal');
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
        Schema::dropIfExists('tokos');
    }
}
