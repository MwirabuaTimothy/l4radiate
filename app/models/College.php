<?php

class College extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'name' => 'required',
		'university' => 'required'
	);
}