<?php

use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$pelajaran = \App\Pelajaran::all();
    	$pelajaran->each(function($pelajaran){
    		factory('App\Pertanyaan', 10)->create([
    			'pelajaran_id' => $pelajaran->id,
                'user_id' => \App\User::inRandomOrder()->first()->id,
    		]);
    	});
    }
}
