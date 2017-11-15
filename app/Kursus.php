<?php

namespace App;

class Kursus extends Model
{
    public function pengajar(){
    	return $this->belongsTo(Pengajar::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
