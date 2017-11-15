<?php

use Illuminate\Database\Seeder;

class KampanyeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Kampanye', 10)->create();
    }
}
