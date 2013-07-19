<?php

class Forum extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'last_post' => 'required',
		'forum_description' => 'required',
		'posts' => 'required'
	);
}