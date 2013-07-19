<?php

class Book extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'name' => 'required',
		'university' => 'required'
	);
}