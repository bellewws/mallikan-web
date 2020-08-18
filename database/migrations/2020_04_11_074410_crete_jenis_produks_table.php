<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreteJenisProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_produks', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('jenis',255);
            $table->integer('id_kategori')->references('id')->on('kategori_produks');
            $table->string('foto_jenis',255);
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
        Schema::dropIfExists('jenis_produks');
    }
}
