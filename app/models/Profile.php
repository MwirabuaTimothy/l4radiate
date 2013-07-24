<?php

class Profile extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'confirm_pass' => 'required'
	);
}