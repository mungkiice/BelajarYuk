<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyelenggarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyelenggaras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->enum('gender',['laki-laki', 'perempuan']); 
            $table->string('instansi');
            $table->string('no_telp');
            $table->string('alamat');
            $table->string('no_ktp')->unique();
            $table->string('email');
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
        Schema::dropIfExists('penyelenggaras');
    }
}
