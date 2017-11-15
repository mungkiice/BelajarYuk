<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKampanyesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kampanyes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('penggalang');
            $table->string('no_telp');
            $table->string('alamat');
            $table->string('judul');
            $table->text('konten');
            $table->string('foto');
            $table->boolean('valid')->default(false);
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
        Schema::dropIfExists('kampanyes');
    }
}
