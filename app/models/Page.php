<?php

class Page extends Eloquent{

	public function posts(){
		return $this->hasMany('Post');
	}


	protected $fillable = array(
		'title'
		);
}