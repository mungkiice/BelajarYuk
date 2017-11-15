<?php

namespace App;

class Kecamatan extends Model
{
    public function kota(){
    	return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
    public function provinsi(){
    	// belongsToThrough
    }
    public function kelurahan(){
    	return $this->hasMany(Kelurahan::class);
    }
}
