<?php

namespace App;

class Activity extends Model
{
	protected $table = 'aktivitas';
	public function subject(){
		return $this->morphTo();
	}
	public function feed($user, $take=10){
    	//by default get the latest 50 activities and group by the day
		return static::where('user_id', $user->id)
		->latest()
		->with('subject')
		->take($take)
		->get()
		->groupBy(function($activity){
			return $activity->created_at->format('Y-m-d');
		});
	}
}
