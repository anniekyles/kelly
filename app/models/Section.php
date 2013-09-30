<?php

class Section extends Eloquent{

	public function page(){
		return $this->belongsTo('Page');
	}

	protected $fillable = array(
		'title',
		'content',
		'page_id'
		);

}