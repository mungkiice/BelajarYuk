<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->text('bio');
            $table->enum('gender',['Laki-Laki', 'Perempuan']); 
            $table->string('no_telp');
            $table->string('alamat');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('kecamatan_id')->unsigned();
            $table->integer('kabupaten_id')->unsigned();
            $table->string('onesignal_player_id')->nullable();
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('kabupaten_id')->references('id')->on('kabupatens')->onDelete('cascade');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
