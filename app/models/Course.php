<?php

class Course extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'book' => 'required',
		'spring_semester' => 'required'
	);

	

}