<?php

use Illuminate\Database\Seeder;

class PengajarSeeder extends Seeder
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
    		$kecamatan = $kabupaten->kecamatan;
            $kecamatan->each(function($kecamatan) use ($kabupaten){
                factory('App\Pengajar', 6)->create([
                    'kabupaten_id' => $kabupaten->id,
                    'kecamatan_id' => $kecamatan->id,
                ]);
            });
        });
    }
}
