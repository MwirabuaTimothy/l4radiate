<?php 

namespace OAuth2\Provider;

use OAuth2\Provider\Google;

class Youtube extends Google {

	public $name = 'youtube';

	public $human = 'YouTube';

	public function __construct(array $options = array())
	{
		// Now make sure we have the default scope to get user data
		empty($options['scope']) and $options['scope'] = array('https://www.google.com/m8/feeds', 'http://gdata.youtube.com');

		// Array it if its string
		$options['scope'] = (array) $options['scope'];

		parent::__construct($options);
	}
}
