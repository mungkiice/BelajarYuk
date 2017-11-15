<?php

use Illuminate\Database\Seeder;

class MengajarSeeder extends Seeder
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
            $pelajaran = \App\Pelajaran::inRandomOrder()->take(3)->get();
            $pelajaran->each(function($pelajaran) use ($pengajar){
                factory('App\Mengajar')->create([
                    'pengajar_id' => $pengajar->id,
                    'pelajaran_id' => $pelajaran->id,
                ]);
            });
        });
    }
}
