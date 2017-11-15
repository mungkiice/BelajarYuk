<?php

namespace App;

class Kegiatan extends Model
{
    public function penyelenggara(){
    	return $this->belongsTo(Penyelenggara::class);
    }
}
