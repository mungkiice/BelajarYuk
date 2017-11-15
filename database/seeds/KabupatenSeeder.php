<?php

use Illuminate\Database\Seeder;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinsi = \App\Provinsi::all();
        $provinsi->each(function($provinsi){
        	factory('App\Kabupaten', 10)->create(['provinsi_id' => $provinsi->id]);
        });
    }
}
