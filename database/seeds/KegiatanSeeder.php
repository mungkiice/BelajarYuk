<?php

use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$penyelenggara = \App\Penyelenggara::all();
    	$penyelenggara->each(function($penyelenggara){
    		factory('App\Kegiatan', 2)->create([
    			'penyelenggara_id' => $penyelenggara->id,
    		]);
    	});
    }
}
