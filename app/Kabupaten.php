<?php

namespace App;

class Kabupaten extends Model
{
    public function provinsi(){
    	return $this->belongsTo(Provinsi::class);
    }
    public function kecamatan(){
    	return $this->hasMany(Kecamatan::class);
    }
    public function kelurahan(){
    	return $this->hasManyThrough(Kecamatan::class, Kelurahan::class);
    }
}
