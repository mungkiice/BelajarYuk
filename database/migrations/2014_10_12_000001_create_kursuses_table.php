<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKursusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kursuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pengajar_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('keterangan');
            $table->enum('sesi',[1, 2, 3]);
            $table->integer('total_pembayaran');
            $table->timestamps();

            $table->foreign('pengajar_id')->references('id')->on('pengajars')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('kursuses');
    }
}
