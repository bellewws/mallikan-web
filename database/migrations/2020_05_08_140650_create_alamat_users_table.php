<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('penerima')->nullable();
            $table->integer('id_user')->references('id')->on('users');
            $table->integer('id_provinces')->references('id')->on('provinces');
            $table->integer('id_cities')->references('id')->on('cities');
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('alamat');
            $table->string('kodepos')->nullable();
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
        Schema::dropIfExists('alamat_users');
    }
}
