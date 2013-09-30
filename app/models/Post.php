<?php

class Post extends Eloquent{

	public function topic(){
		return $this->belongsTo('Topic');
	}

	public function comments(){
		return $this->hasMany('Comment');
	}
	protected $fillable = array(
		'title',
		'content',
		'topic_id'
		);

}