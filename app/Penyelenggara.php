<?php

namespace App;

class Penyelenggara extends Model
{
    public function kegiatan(){
    	return $this->hasMany(Kegiatan::class);
    }
    public function setKegiatan($kegiatan){
    	return $this->kegiatan()->create($kegiatan);
    }
}
