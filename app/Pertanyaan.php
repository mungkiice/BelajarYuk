<?php

namespace App;

class Pertanyaan extends Model
{
	use RecordsActivity;
    // protected $with = ['user', 'jawaban', 'pelajaran'];

    public function aktivitas(){
        return $this->morphMany(Aktivitas::class, 'subject');
    }
    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function jawaban(){
    	return $this->hasMany(Jawaban::class);
    }
    public function pelajaran(){
    	return $this->belongsTo(Pelajaran::class);
    }
    public function addJawaban($jawaban){
        return $this->jawaban()->create($jawaban);
    }
    public function path(){
    	return "";
    }
}
