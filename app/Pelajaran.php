<?php

namespace App;

class Pelajaran extends Model
{
    public function pengajar(){
    	return $this->belongsToMany(Pengajar::Class, 'mengajars');
    }
    public function pertanyaan(){
    	return $this->hasMany(Pertanyaan::class);
    }
    public function getRouteKeyName(){
    	return 'nama';
    }
}
