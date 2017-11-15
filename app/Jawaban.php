<?php

namespace App;

class Jawaban extends Model
{
    use RecordsActivity;
	// protected $with = ['subject','favorites'];
	
    public function aktivitas(){
        return $this->morphMany(Aktivitas::class, 'subject');
    }
    public function subject(){
    	return $this->morphTo();
    }
    public function pertanyaan(){
    	return $this->belongsTo(Pertanyaan::class);
    }
    public function path(){
    	return $this->pertanyaan->path()."#reply-{$this->id}";
    }
}
