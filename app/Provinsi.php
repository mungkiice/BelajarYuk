<?php

namespace App;

class Provinsi extends Model
{
    public function kota(){
    	return $this->hasMany(Kabupaten::class, 'provinsi_id');
    }
    public function kecamatan(){
    	return $this->hasManyThrough(Kabupaten::class, Kecamatan::class, 'provinsi_id');
    }
}
