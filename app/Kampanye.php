<?php

namespace App;

class Kampanye extends Model
{
    public function validasi(){
    	$this->update(['valid' => true]);
    }
}
