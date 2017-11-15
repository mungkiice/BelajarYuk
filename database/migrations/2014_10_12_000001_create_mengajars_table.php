<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMengajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mengajars', function (Blueprint $table) {
            $table->integer('pelajaran_id')->unsigned();
            $table->integer('pengajar_id')->unsigned();

            $table->unique(['pelajaran_id','pengajar_id']);
            $table->foreign('pelajaran_id')->references('id')->on('pelajarans')->onDelete('cascade');
            $table->foreign('pengajar_id')->references('id')->on('pengajars')->onDelete('cascade');
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
        Schema::dropIfExists('mengajars');
    }
}
