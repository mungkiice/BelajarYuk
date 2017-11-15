<?php

use Illuminate\Database\Seeder;

class AktivitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\User::all();
        $users->each(function($user){
        	$pertanyaan = $user->pertanyaan()->latest()->take(5)->get();
        	$jawaban = $user->jawaban()->latest()->take(5)->get();
        	$pertanyaan->each(function($pertanyaan) use ($user){
        		factory('App\Activity')->create([
        			'user_id' => $user->id,
        			'subject_id' => $pertanyaan->id,
        			'subject_type' => get_class($pertanyaan),
        		]);
        	});
        	$jawaban->each(function($jawaban) use ($user){
        		factory('App\Activity')->create([
        			'user_id' => $user->id,
        			'subject_id' => $jawaban->id,
        			'subject_type' => get_class($jawaban),
        		]);
        	});
        });
    }
}
