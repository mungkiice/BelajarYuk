<?php

use Illuminate\Database\Seeder;

class JawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengajar = \App\Pengajar::all();
        $pengajar->each(function ($pengajar){
            factory('App\Jawaban', 5)->create([
                'pertanyaan_id' => \App\Pertanyaan::inRandomOrder()->first()->id,
                'subject_id' => $pengajar->id,
                'subject_type' => 'App\Pengajar'
            ]);
        });
    	$pertanyaan = \App\Pertanyaan::all();
    	$pertanyaan->each(function($pertanyaan){
    		factory('App\Jawaban', 10)->create([
    			'pertanyaan_id' => $pertanyaan->id,
                'subject_id' => \App\User::inRandomOrder()->first()->id,
                'subject_type' => 'App\User'
    		]);
    	});
    }
}
