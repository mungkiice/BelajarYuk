<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penyelenggara_id')->unsigned()->nullable();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('foto');
            $table->string('thumbnail');
            $table->date('waktu');
            $table->string('lokasi');
            $table->timestamps();

            $table->foreign('penyelenggara_id')->references('id')->on('penyelenggaras')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('kegiatans');
    }
}
