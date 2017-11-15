<?php

namespace App;

class Ulasan extends Model
{
	protected $with = ['pengajar', 'user'];

    public function pengajar(){
    	return $this->belongsTo(Pengajar::class);
    }
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
