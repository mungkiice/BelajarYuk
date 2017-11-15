<?php

use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kecamatan = \App\Kecamatan::all();
        $kecamatan->each(function($kecamatan){
        	factory('App\Kelurahan', 3)->create(['kecamatan_id' => $kecamatan->id]);
        });
    }
}
