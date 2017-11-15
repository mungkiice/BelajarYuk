<?php

use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kabupaten = \App\Kabupaten::all();
        $kabupaten->each(function($kabupaten){
        	factory('App\Kecamatan', 5)->create([
                'kabupaten_id' => $kabupaten->id
            ]);
        });
    }
}
