<?php

use Illuminate\Database\Seeder;

class PenyelenggaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Penyelenggara', 10)->create();
    }
}
