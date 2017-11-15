<?php

use Illuminate\Database\Seeder;

class UlasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$pengajar = \App\Pengajar::all();
    	$pengajar->each(function($pengajar){
    		factory('App\Ulasan', 6)->create([
    			'pengajar_id' => $pengajar->id,
    			'user_id' => \App\User::inRandomOrder()->first()->id,
    		]);
    	});
    }
}
