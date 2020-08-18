<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinregsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linregs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_produk')->nullable();
            $table->date('tanggal_awal')->nullable();
            $table->float('a')->nullable();
            $table->float('b')->nullable();
            $table->integer('suku_awal')->nullable();
            $table->integer('beda')->nullable();

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
        Schema::dropIfExists('linregs');
    }
}
