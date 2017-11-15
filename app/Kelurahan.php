<?php

namespace App;

class Kelurahan extends Model
{
    public function kota(){
    	// belongsToThrough
    }
    public function provinsi(){
    	// belongsToThrough
    }
    public function kecamatan(){
    	return $this->belongsTo(Kecamatan::class);
    }
}
