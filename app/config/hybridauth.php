<?php
return array(	
	"base_url"   => "http://localhost:8000/social/auth",
	// "base_url" = "",
	"providers"  => array (
		"Google"     => array (
			"enabled"    => true,
			"keys"       => array ( "id" => "ID", "secret" => "SECRET" ),
			),
		"Facebook"   => array (
			"enabled"    => true,
			"keys"       => array ( "id" => "182024725307187", "secret" => "7812599b4ecfde73c953bfb051094e9c" ),
			),
		"Twitter"    => array (
			"enabled"    => true,
			"keys"       => array ( "key" => "aAy2VnQ1IgQVh3j6yd3cg", "secret" => "UzbNaaDI3COzrB4JuQTkZd1o26eEjWBzMoG1ODpTI" )
			)
	),
);